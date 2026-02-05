import fs from 'fs';
import path from 'path';
import axios from 'axios';
import dotenv from 'dotenv';
import { Client, GatewayIntentBits, Partials, Events } from 'discord.js';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

dotenv.config({ path: path.join(__dirname, '.env') });

// api info for LM Studio (OpenAI-compatible)
const TOKEN = process.env.DISCORD_TOKEN;
const API_URL = process.env.LMS_API_URL ?? 'http://localhost:1234/v1/chat/completions';
const ALLOWED_USER_IDS = (process.env.ALLOWED_USER_IDS ?? '')
  .split(',')
  .map(id => id.trim())
  .filter(Boolean);

const LOG_FILE_PATH = path.join(__dirname, 'log.json');

async function getContextMessagesFromChannel(message, limit) {
  const fetched = await message.channel.messages.fetch({ limit: limit + 1 });
  const recent = Array.from(fetched.values())
    .filter(item => item.id !== message.id)
    .sort((a, b) => a.createdTimestamp - b.createdTimestamp);

  const mapped = recent.map(item => ({
    role: item.author.id === message.client.user.id ? 'assistant' : 'user',
    content: item.content
  }));

  const normalized = [];
  for (const item of mapped) {
    if (item.role !== 'user' && item.role !== 'assistant') continue;
    if (normalized.length === 0 && item.role === 'assistant') continue;
    const lastRole = normalized.length ? normalized[normalized.length - 1].role : null;
    if (lastRole === item.role) continue;
    normalized.push({ role: item.role, content: item.content });
  }
  return normalized.slice(-limit);
}

function appendLogEntry(entry) {
  let logEntries = [];
  if (fs.existsSync(LOG_FILE_PATH)) {
    try {
      logEntries = JSON.parse(fs.readFileSync(LOG_FILE_PATH, 'utf8'));
      if (!Array.isArray(logEntries)) {
        logEntries = [];
      }
    } catch (err) {
      console.error('Error reading log.json:', err);
      logEntries = [];
    }
  }
  logEntries.push(entry);
  try {
    fs.writeFileSync(LOG_FILE_PATH, JSON.stringify(logEntries, null, 2));
  } catch (err) {
    console.error('Error writing log.json:', err);
  }
}

// set what the bot is allowed to listen to
const client = new Client({
  intents: [
    GatewayIntentBits.Guilds,
    GatewayIntentBits.GuildMessages,
    GatewayIntentBits.DirectMessages,
    GatewayIntentBits.MessageContent
  ],
  partials: [Partials.Channel]
});

// Function to send a request to the LM Studio API and get a response
async function generateResponse(prompt, contextMessages) {
  const systemPrompt = process.env.LMS_SYSTEM ?? '';
  const data = {
    model: process.env.LMS_MODEL,
    messages: [
      ...(systemPrompt ? [{ role: 'system', content: systemPrompt }] : []),
      ...(contextMessages ?? []),
      { role: 'user', content: prompt }
    ],
    stream: false
  };

  try {
    const response = await axios.post(API_URL, data, {
      headers: { 'Content-Type': 'application/json' }
    });
    console.log('Raw Response Content:', JSON.stringify(response.data));

    const assistantMessage = response.data?.choices?.[0]?.message?.content;
    if (!assistantMessage) {
      return { text: 'Error: Invalid API response', error: 'Invalid API response' };
    }

    return { text: assistantMessage, error: null };
  } catch (err) {
    const errorDetails = err?.response?.data || err.message;
    console.error('LM Studio API error:', errorDetails);
    return { text: 'Error: Invalid API response', error: errorDetails };
  }
}

// When the bot is ready
client.once(Events.ClientReady, () => {
  console.log(`Logged in as ${client.user.tag}`);
});

// When the bot detects a new message
client.on(Events.MessageCreate, async message => {
  // Don't let the bot reply to itself
  if (message.author.id === client.user.id) return;

  // Returns if the user is a bot
  if (message.author.bot === true) return;

  if (!ALLOWED_USER_IDS.includes(message.author.id)) return;

  // In DMs, respond to every message. In guilds, only when mentioned.
  const isDm = message.channel?.isDMBased?.() === true;
  const shouldRespond = isDm || message.mentions.has(client.user);
  if (shouldRespond) {
    let prompt = message.content;
    prompt = `${message.author.displayName ?? message.author.username} says: ${prompt}`;

    // try and catch are used to check if the bot has permission to send in the channel.
    try {
      await message.channel.sendTyping();
      if (prompt) {
        const contextMessages = await getContextMessagesFromChannel(message, 30);
        const response = await generateResponse(prompt, contextMessages);
        await message.channel.send(response.text);
        appendLogEntry({
          timestamp: new Date().toISOString(),
          user: message.author.displayName ?? message.author.username,
          received: message.content,
          responded: response.text,
          error: response.error
        });
      }
    } catch (err) {
      if (err?.code === 50013) {
        console.error(`Error: Bot does not have permission to type in ${message.channel?.name}`);
        appendLogEntry({
          timestamp: new Date().toISOString(),
          user: message.author.displayName ?? message.author.username,
          received: message.content,
          responded: null,
          error: 'Missing permissions to send message'
        });
        return;
      }
      console.error('Discord error:', err);
      appendLogEntry({
        timestamp: new Date().toISOString(),
        user: message.author.displayName ?? message.author.username,
        received: message.content,
        responded: null,
        error: err?.message ?? String(err)
      });
    }
  }
});

// Run the bot
client.login(TOKEN);
