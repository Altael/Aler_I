const express = require('express');
const app = express();
const port = 3000;

const Database = require("@replit/database");
const db = new Database();

const Discord = require('discord.js');

const client = new Discord.Client({ ws: { intents: new Discord.Intents(Discord.Intents.ALL) }});

const bash = require('bash.im');

app.get('/', (req, res) => res.send('Hello World!'));

app.listen(port, () => console.log(`Example app listening at http://localhost:${port}`));

const moment = require('moment');

// ================= START BOT CODE ===================

const fetchUser = async id => client.users.fetch(id);
const fetchGuild = async id => client.guilds.fetch(id);
const get_bash = async () => bash();

let aler = null;
let aleri = null;

let mute_role = null;
let quorum_server = null;

let rss = null;

const prefix = "алер";

function mute(user, minutes) {
    member = rss.member(user);
    member.roles.add("842791694717550662");
    setTimeout(() => {
        member.roles.remove("842791694717550662");
    }, minutes * 60 * 1000);
}

client.on('ready', () => {

    function scanNihils() {
        setTimeout(() => {
            console.log(`<--CYCLE-->`);
            db.get('nihils').then(nihils => {
                nihils.forEach((nihil, key) => {
                    let upTo = moment(nihil.date, 'DD.MM.YYYY HH:mm').subtract(3,'hours').diff(moment(), 'minutes');
                    if(upTo <= 180 && !nihil.sent) {
                        client.channels.fetch('842793670766886992').then(channel => {
                            channel.send(`${aler} Мешки с мясом, в ${moment(nihil.date, 'DD.MM.YYYY HH:mm').format('HH:mm')} откроется **` + {mine: 'майнерский', crab: 'краберский'}[nihil.type] + `** нихилус _space_ в ${nihil.place} (ID ${key}). Вы знаете что делать.`);
                        });
                        console.log(nihil);
                        db.get("nihils").then(nihils => console.log(nihils[key]));
                        nihils[key].sent = true;
                        db.set('nihils', nihils);
                        db.get("nihils").then(nihils => console.log(nihils[key]));
                    }
                    if(upTo <= 0) {
                        nihils[key].done = true;
                        db.set('nihils', nihils);
                    }
                });
                scanNihils();
            });
        }, 1000 * 10);
    }
    scanNihils();

    client.guilds.fetch("744569424199286865").then( quorum => {
        quorum_server = quorum
        quorum.roles.fetch("817849583630811167").then(mute => {
            mute_role = mute;
        });
        /*quorum.members.prune({
          days: 30
        });*/
    });

    console.log(`Logged in as ${client.user.tag}!`);

    fetchUser("306097930480123914").then(user => {
        aler = user;
    });

    fetchUser("841253571131211806").then(user => {
        aleri = user;
    });

    fetchGuild("835257021007396870").then(guild => {
        rss = guild;
    });
});

client.on('message', msg => {
    if(msg.author === client.user) {
        return;
    }

    const channel = msg.channel;

    if (msg.content.toLowerCase().startsWith(prefix)) {
        let hand_send = false;
        let args = msg.content.split(' ');
        args.shift();
        let command = '';
        if(!args.length) {
            command = 'шутник'
        } else {
            command = args.shift().toLowerCase();
        }
        let reactions = [];

        switch(command) {
            case 'bankai':
                hand_send = true;
                if(msg.author === aler) {
                    msg.channel.send(`@everyone When hope is gone... 
  undo this lock... 
  and send me forth... 
  on a moonlit walk... 
  Restraint level - zero...`);
                    quorum_server.members.fetch().then(members => {
                        members.forEach(member => {
                            member.roles.add(mute_role);
                            msg.channel.send(`${member} теперь амогус`)
                        })
                    });
                }
                break;
            case 'restore':
                hand_send = true;
                quorum_server.members.fetch().then(members => {
                    members.forEach(member => {
                        member.roles.remove(mute_role);
                    })
                });
                break;
            case 'нихеры':
                hand_send = true;
                if(args.length && args[0] === 'убрать' && msg.author === aler) {
                    db.get('nihils').then(nihils => {
                        nihils.splice(args[1], 1);
                        db.set('nihils', nihils);
                    });
                    msg.channel.send('А че, не будет нихера? Ну и хуй с ним...');
                } else {
                    db.get('nihils').then(nihils => {
                        if(nihils.length) {
                            nihils.forEach((nihil, key) => {
                                if(!nihil.done || args[0] === 'все') {
                                    msg.channel.send({mine: 'Майнерский', crab: 'Краберский'}[nihil.type] + ` нихил ${nihil.date} в ${nihil.place} (ID: ${key}).`);
                                }
                            });
                        } else {
                            msg.channel.send(`Нету нихеров, колдун`);
                        }
                    });
                }
                break;
            case 'нихер':
                if(msg.member.roles.cache.some( role => {
                    return role.id === '835260063568232458'
                })) {
                    hand_send = true;
                    let type = '';
                    switch(args[0]) {
                        case 'крабий':
                            type = 'crab';
                            break;
                        case 'майний':
                            type = 'mine';
                            break;
                    }
                    db.get('nihils').then(nihils => {
                        nihils.push({
                            type: type,
                            date: args[1] + ' ' + args[2],
                            place: args[3],
                            sent: false,
                            done: false
                        })
                        db.set('nihils', nihils);
                        msg.channel.send(`Все записал колдун. ` + {mine: 'Майнерский', crab: 'Краберский'}[type] + ` нихил ${args[1]} ${args[2]} в ${args[3]}.`);
                    });
                } else {
                    reactions = [
                        `Мордой не вышел такие команды использовать, колдун.`
                    ];
                }
                break;
            case 'анекдот':
                hand_send = true;
                get_bash().then(response => {
                    channel.send(response.body);
                });
                break;
            case 'расскажи':
                reactions = [
                    `Колдун, команда "анекдот"`
                ];
                break;
            case 'сюда':
            case 'кис':
            case 'иди':
                reactions = [
                    'Сам иди, колдун',
                    'Не пойду'
                ];
                break;
            case 'мут':
                let target = msg.mentions.users.length ? msg.mentions.users.first() : msg.author;
                if(msg.author === aler) {
                    mute(target, 5);
                    if(target.id === "625606312813789200") {
                        reactions = ['Опять Джаз. Он даже меня заебал'];
                    } else {
                        reaction = ['Заебешь. Сам мьють']
                    }
                } else {
                    mute(msg.author, 5);
                    if(target.id === aleri.id) {
                        reactions = [
                            `Ублюдок, мать твою, а ну, иди сюда, говно собачье! Что, решил меня замьютить?! Ты, засранец вонючий, мать твою! А ну, иди сюда, попробуй меня замьютить! Я тебя сам замьючу, ублюдок! Онанист чёртов, будь ты проклят! Иди, идиот, мьютить тебя и всю твою семью! Говно собачье, жлоб вонючий, дерьмо, сука, падла! Иди сюда, мерзавец, негодяй, гад! Иди сюда, ты, говно, жопа!`
                        ]
                    } else {
                        reactions = [
                            'Ответ отрицательный. Мут тебя, чтоб знал',
                        ];
                    }
                }
                break;
            case 'запомни':
                db.get('convo').then( convo => {
                    let key = args.shift().toLowerCase();
                    let phrase = args.join(' ')
                    if(!(key in convo)) {
                        convo[key] = [];
                    }
                    convo[key].push(phrase);
                    db.set('convo', convo);
                });
                reactions = ['Запомнил, епте'];
                break;
            default:
                hand_send = true;
                db.get('convo').then( convo => {
                    if(command in convo) {
                        reactions = convo[command];
                    } else {
                        if(msg.author === aler) {
                            reactions = [`Джаз опять выебывается?`, `Кого замьютить?`, `Готов вкалывать`, `Опять работа?`]
                        } else {
                            reactions = [
                                `Летит флот виндикаторов, видит на гайке висит вентура и кричит в локал:
- Эй, сквад виндикаторов, айда за гайку драться!
Послал ФК сквад виндикаторов за гайку. Ждет 5 минут, думает - "ну, уже разъебали его". Тут обратно проваливается вентура и снова кричит в локал:
- Эй, сквад виндикаторов, айда за гайку драться!
ФК охуел, послал еще один сквад. Ждет 5 минут, ждет 10, думает - "ну теперь точно пизда вентуре". Снова возвращается вентура и не успевает она ничего написать в локал, как в гайку проходит виндикатор, весь побитый, на хуле и кричит:
- Не ходите, это ловушка - их там двое!`,
                                `Меряет мужик шляпу, а она ему как раз`,
                                `Объявление в Жите:
— …По поводу празднования дня капсулера организуется выход в глубину нулей для крабинга, майнинга и пвп.
Сбор всех любителей этого дела назначен на 6.30. «Этого дела» брать по два литра.`,
                                `У сороконожки 20 писек`,
                                `Преподаватель читает курсовую
- Что-то в вашей работе много воды, коллега
- На всякий пожарный, - отвечает студент`,
                                `В школу пришли клоуны.
И устроили шутинг.`,
                                `Have you heard about the guy who lost left side of his body? 
Sister said he was all right. Doctor said there's nothing much left.`
                            ];
                        }
                    }
                    msg.reply(reactions[Math.floor(Math.random()*reactions.length)]);
                });
        }

        if(!hand_send) {
            msg.reply(reactions[Math.floor(Math.random()*reactions.length)]);
        }

        aler.send(`Колдун ${msg.author} произнес заклинание \n${msg.content} \n${msg.url}`);
    }

    if(
        msg.mentions.has(aler, {ignoreEveryone: true, ignoreRoles: true}) ||
        msg.mentions.has(aleri, {ignoreEveryone: true, ignoreRoles: true})
    ) {

    }

    //Модерация киллмыл
    if(msg.channel.id === '835260956123594763') {
        if(msg.attachments.first() !== undefined) {

        } else {
            msg.delete();
            msg.channel.send(`Этот канал только для килмыл, колдун ${msg.author}. Чтобы поговорить о том какой пиздатый ты сделал фраг иди в <#842671839862980639>`).then(warn => {
                setTimeout(() => {
                    warn.delete();
                }, 5000);
            });
        }
    }

    //Модерация проеба денег
    if(msg.channel.id === '859485955186098206') {
        if(msg.attachments.first() !== undefined || msg.author === aler) {

        } else {
            msg.delete();
            msg.channel.send(`Этот канал только для скринов проеба денег, колдун ${msg.author}.Заебал`).then(warn => {
                setTimeout(() => {
                    warn.delete();
                }, 5000);
            });
        }
    }

    //Модерария нефлудилки
    if(msg.channel.id === '837217684080820266' && msg.author !== aler && msg.author.id !== "274986504583905280") {
        msg.reply(`Колдун, я понимаю что ты админ, но иди спамь в <#835259826429886474>`).then(warn => {
            setTimeout(() => {
                warn.delete();
            }, 5000);
        });
        msg.delete();
    }

    //837245688671633438 SMOrc
});

client.login(process.env.TOKEN);