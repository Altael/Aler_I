<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Landing</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind = window.tailwind || {};
        tailwind.config = {
            theme: {
                screens: {
                    md: '800px',
                    lg: '1280px',
                    xl: '1728px'
                },
                extend: {
                    colors: {
                        primary: 'rgba(248, 151, 23, 1)',
                        'primary-hover': 'rgba(186, 119, 30, 1)',
                        'primary-disabled': 'rgba(248, 151, 23, 1)',
                        bg: 'rgba(22, 22, 22, 1)',
                        bg2: 'rgba(32, 32, 32, 1)',
                        bg3: 'rgba(19, 19, 19, 1)',
                        bg4: 'rgba(40, 40, 40, 1)',
                        bg5: 'rgba(57, 57, 57, 1)',
                        'menu-active-bg': 'rgba(15, 15, 15, 1)',
                        'menu-active-text': 'rgba(255, 255, 255, 1)',
                        'menu-text': 'rgba(178, 178, 178, 1)',
                        'job-1': 'rgba(37, 131, 67, 1)',
                        'job-2': 'rgba(38, 129, 240, 1)',
                        'job-3': 'rgba(153, 51, 241, 1)',
                        'job-4': 'rgba(196, 61, 46, 1)',
                        'form-bg': 'rgba(48, 48, 48, 1)',
                        'form-bg-active': 'rgba(77, 77, 77, 1)',
                        'form-text': 'rgba(121, 121, 121, 1)',
                        'button-bg': 'rgb(38 38 38)',
                        'button-bg-hover': 'rgb(62 62 62)',
                    },
                    keyframes: {
                        carousel: {
                            '0%, 26%, 100%': {transform: 'translateX(0%)'},
                            '33%, 59%': {transform: 'translateX(-100%)'},
                            '66%, 92%': {transform: 'translateX(-200%)'},
                        },
                    },
                    animation: {
                        carousel: 'carousel 20s infinite ease-in-out',
                    },
                },
            },
        };
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 110px;
        }

        body {
            font-family: "Inter", sans-serif;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        body::-webkit-scrollbar {
            display: none;
        }

        dialog::backdrop {
            content: "";
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(2px);
        }
    </style>
</head>
<body class="bg-bg text-white antialiased">

<input id="mobile-menu-toggle" type="checkbox" class="peer/mobile-menu fixed top-0 left-0 opacity-0 pointer-events-none">
<header class="bg-bg3 flex items-center justify-between px-[20px] md:px-[50px] py-[20px] xl:py-0 w-full sticky top-0 z-[60]">
    <img class="w-[111px] md:w-[122px] xl:w-[152px]" src="img/logo.svg" alt="Schcherban Bau">
    <nav class="items-center hidden xl:flex">
        <a href="#home" class="block text-menu-text hover:text-menu-active-text hover:bg-black border-t border-3 border-transparent hover:border-primary text-[16px]/[24px] px-[24px] py-[28px]">Home</a>
        <a href="#ueber-uns" class="block text-menu-text hover:text-menu-active-text hover:bg-black border-t border-3 border-transparent hover:border-primary text-[16px]/[24px] px-[24px] py-[28px]">Über uns</a>
        <a href="#vorteile" class="block text-menu-text hover:text-menu-active-text hover:bg-black border-t border-3 border-transparent hover:border-primary text-[16px]/[24px] px-[24px] py-[28px]">Vorteile</a>
        <div class="relative group">
            <a href="#leistungen" class="block text-menu-text hover:text-menu-active-text hover:bg-black group-hover:[&:not(:hover)]:bg-menu-active-bg border-t border-3 border-transparent group-hover:border-primary text-[16px]/[24px] px-[24px] py-[28px]">
                <span class="flex items-center gap-[8px]">
                    <span>Leistungen</span>
                    <img src="img/icons/chevron-down.svg" alt="" class="chev-down size-[8px] group-hover:hidden">
                    <img src="img/icons/chevron-up.svg" alt="" class="chev-up size-[8px] hidden group-hover:block">
                </span>
            </a>
            <div class="absolute top-full left-0 min-w-[240px] bg-menu-active-bg opacity-0 pointer-events-none translate-y-[8px] transition-all duration-200 z-50 group-hover:opacity-100 group-hover:pointer-events-auto group-hover:translate-y-0">
                <a href="#innenausbau" class="block px-[20px] py-[19px] text-menu-text hover:text-white hover:bg-black">
                    <span class="flex items-center gap-[8px]">
                        <span class="size-[8px] rounded-full bg-job-1"></span>
                        <span>Innenausbau</span>
                    </span>
                </a>
                <div class="h-px bg-bg2"></div>
                <a href="#moebel-montage" class="block px-[20px] py-[19px] text-menu-text hover:text-white hover:bg-black">
                    <span class="flex items-center gap-[8px]">
                        <span class="size-[8px] rounded-full bg-job-2"></span>
                        <span>Möbel & Montage</span>
                    </span>
                </a>
                <div class="h-px bg-bg2"></div>
                <a href="#komplettservice" class="block px-[20px] py-[19px] text-menu-text hover:text-white hover:bg-black">
                    <span class="flex items-center gap-[8px]">
                        <span class="size-[8px] rounded-full bg-job-3"></span>
                        <span>Komplettservice</span>
                    </span>
                </a>
                <div class="h-px bg-bg2"></div>
                <a href="#vorbereitung-demontage" class="block px-[20px] py-[19px] text-menu-text hover:text-white hover:bg-black">
                    <span class="flex items-center gap-[8px]">
                        <span class="size-[8px] rounded-full bg-job-4"></span>
                        <span>Vorbereitung & Demontage</span>
                    </span>
                </a>
            </div>
        </div>
        <a href="#arbeitsablauf" class="block text-menu-text hover:text-menu-active-text hover:bg-black border-t border-3 border-transparent hover:border-primary text-[16px]/[24px] px-[24px] py-[28px]">Arbeitsablauf</a>
        <a href="#projekte" class="block text-menu-text hover:text-menu-active-text hover:bg-black border-t border-3 border-transparent hover:border-primary text-[16px]/[24px] px-[24px] py-[28px]">Projekte</a>
        <a href="#kontakt" class="block text-menu-text hover:text-menu-active-text hover:bg-black border-t border-3 border-transparent hover:border-primary text-[16px]/[24px] px-[24px] py-[28px]">Kontakt</a>
    </nav>
    <nav class="flex items-center gap-[24px]">
        <a href="#" class="hidden md:flex items-center gap-[8px] bg-button-bg hover:bg-button-bg-hover px-[16px] py-[8px] rounded-[45px]">
            <img src="img/icons/whatsapp.svg" alt="WhatsApp">
            <span class="text-[rgb(37_211_102)] hover:text-[rgb(37_211_102)] font-bold">WHATSAPP</span>
        </a>
        <button type="button" onclick="showThankYouDialog()" class="bg-primary hover:bg-primary-hover text-black font-bold font-[Roboto] py-[8px] px-[16px] md:px-[24px] rounded-[45px] text-[12px]/[24px] md:text-[14px] uppercase">Jetzt anfragen</button>
        <div class="relative hidden md:block">
            <input id="language-toggle" type="checkbox" class="peer/language fixed top-0 left-0 opacity-0 pointer-events-none">
            <label for="language-toggle" class="bg-button-bg hover:bg-button-bg-hover flex items-center justify-center h-[40px] min-w-[56px] px-[12px] rounded-[45px] cursor-pointer">
                <img class="w-[28px]" src="img/icons/flags/de.svg" alt="DE">
            </label>
            <div class="absolute top-full right-0 mt-[8px] w-[222px] bg-menu-active-bg opacity-0 pointer-events-none translate-y-[8px] transition-all duration-200 peer-checked/language:opacity-100 peer-checked/language:pointer-events-auto peer-checked/language:translate-y-0 z-50 divide-y divide-bg2">
                <a class="cursor-pointer flex items-center gap-[8px] px-[16px] py-[21px] text-menu-text hover:text-white hover:bg-black">
                    <img src="img/icons/flags/de.svg" alt="Deutsch" class="w-[28px]">
                    <span>Deutsch</span>
                </a>
                <a class="cursor-pointer flex items-center gap-[8px] px-[16px] py-[21px] text-menu-text hover:text-white hover:bg-black">
                    <img src="img/icons/flags/gb.svg" alt="English" class="w-[28px]">
                    <span>English</span>
                </a>
            </div>
        </div>
        <label for="mobile-menu-toggle" class="xl:hidden bg-button-bg hover:bg-button-bg-hover flex items-center justify-center h-[40px] w-[56px] rounded-[45px] cursor-pointer peer-checked/mobile-menu:hidden" aria-label="Menü öffnen">
            <img class="size-[32px]" src="img/icons/menu.svg" alt="Menü">
        </label>
        <label for="mobile-menu-toggle" class="hidden xl:hidden bg-button-bg hover:bg-button-bg-hover flex items-center justify-center h-[40px] w-[56px] rounded-[45px] cursor-pointer peer-checked/mobile-menu:block" aria-label="Menü schließen">
            <img class="size-[32px]" src="img/icons/close.svg" alt="Schließen">
        </label>
    </nav>
</header>
<label for="mobile-menu-toggle" class="overscroll-contain overflow-auto fixed top-[80px] right-0 bottom-0 left-0 z-40 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300 peer-checked/mobile-menu:opacity-100 peer-checked/mobile-menu:pointer-events-auto" aria-label="Menü schließen"></label>
<aside id="mobile-menu-panel" class="overscroll-contain overflow-auto fixed top-[80px] right-0 bottom-0 z-50 w-[250px] bg-bg3 pb-[24px] flex flex-col gap-[20px] translate-x-full transition-transform duration-300 peer-checked/mobile-menu:translate-x-0">
    <nav class="flex flex-col divide-y divide-bg2">
        <a href="#home" class="block text-menu-text hover:text-menu-active-text hover:bg-black text-[16px]/[24px] px-[12px] py-[14px]">Home</a>
        <a href="#ueber-uns" class="block text-menu-text hover:text-menu-active-text hover:bg-black text-[16px]/[24px] px-[12px] py-[14px]">Über uns</a>
        <a href="#vorteile" class="block text-menu-text hover:text-menu-active-text hover:bg-black text-[16px]/[24px] px-[12px] py-[14px]">Vorteile</a>
        <div>
            <input id="mobile-services-toggle" type="checkbox" class="peer/services sr-only">
            <label for="mobile-services-toggle" class="flex items-center justify-between text-menu-text hover:text-menu-active-text hover:bg-black px-[12px] py-[14px] cursor-pointer peer-checked/services:[&_.chev-down]:hidden peer-checked/services:[&_.chev-up]:block">
                <span>Leistungen</span>
                <span class="relative size-[8px]">
                    <img src="img/icons/chevron-down.svg" alt="" class="chev-down absolute inset-0 size-[8px]">
                    <img src="img/icons/chevron-up.svg" alt="" class="chev-up absolute inset-0 size-[8px] hidden">
                </span>
            </label>
            <div class="max-h-0 overflow-hidden transition-all duration-300 peer-checked/services:max-h-[320px] bg-menu-active-bg">
                <a href="#innenausbau" class="block px-[20px] py-[14px] text-menu-text hover:text-white hover:bg-black">
                    <span class="flex items-center gap-[8px]">
                        <span class="size-[8px] rounded-full bg-job-1"></span>
                        <span>Innenausbau</span>
                    </span>
                </a>
                <div class="h-px bg-bg2"></div>
                <a href="#moebel-montage" class="block px-[20px] py-[14px] text-menu-text hover:text-white hover:bg-black">
                    <span class="flex items-center gap-[8px]">
                        <span class="size-[8px] rounded-full bg-job-2"></span>
                        <span>Möbel & Montage</span>
                    </span>
                </a>
                <div class="h-px bg-bg2"></div>
                <a href="#komplettservice" class="block px-[20px] py-[14px] text-menu-text hover:text-white hover:bg-black">
                    <span class="flex items-center gap-[8px]">
                        <span class="size-[8px] rounded-full bg-job-3"></span>
                        <span>Komplettservice</span>
                    </span>
                </a>
                <div class="h-px bg-bg2"></div>
                <a href="#vorbereitung-demontage" class="block px-[20px] py-[14px] text-menu-text hover:text-white hover:bg-black">
                    <span class="flex items-center gap-[8px]">
                        <span class="size-[8px] rounded-full bg-job-4"></span>
                        <span>Vorbereitung & Demontage</span>
                    </span>
                </a>
            </div>
        </div>
        <a href="#arbeitsablauf" class="block text-menu-text hover:text-menu-active-text hover:bg-black text-[16px]/[24px] px-[12px] py-[14px]">Arbeitsablauf</a>
        <a href="#projekte" class="block text-menu-text hover:text-menu-active-text hover:bg-black text-[16px]/[24px] px-[12px] py-[14px]">Projekte</a>
        <a href="#kontakt" class="block text-menu-text hover:text-menu-active-text hover:bg-black text-[16px]/[24px] px-[12px] py-[14px]">Kontakt</a>
    </nav>
    <div class="mt-auto px-[12px] flex flex-col gap-[12px]">
        <a href="#" class="flex items-center justify-center gap-[8px] bg-button-bg hover:bg-button-bg-hover px-[16px] py-[8px] rounded-[45px]">
            <img src="img/icons/whatsapp.svg" alt="WhatsApp">
            <span class="text-[rgb(37_211_102)] font-bold">WHATSAPP</span>
        </a>
        <div class="relative">
            <input id="mobile-language-toggle" type="checkbox" class="peer/mobile-language fixed top-0 left-0 opacity-0 pointer-events-none">
            <label for="mobile-language-toggle" class="bg-button-bg hover:bg-button-bg-hover flex items-center justify-center h-[40px] w-full rounded-[45px] cursor-pointer">
                <img class="w-[28px]" src="img/icons/flags/de.svg" alt="DE">
            </label>
            <div class="absolute bottom-full right-0 mb-[8px] w-[222px] max-w-full bg-menu-active-bg opacity-0 pointer-events-none translate-y-[8px] transition-all duration-200 peer-checked/mobile-language:opacity-100 peer-checked/mobile-language:pointer-events-auto peer-checked/mobile-language:translate-y-0 z-50 divide-y divide-bg2">
                <a href="#" class="flex items-center gap-[8px] px-[16px] py-[21px] text-menu-text hover:text-white hover:bg-black">
                    <img src="img/icons/flags/de.svg" alt="Deutsch" class="w-[28px]">
                    <span>Deutsch</span>
                </a>
                <a href="#" class="flex items-center gap-[8px] px-[16px] py-[21px] text-menu-text hover:text-white hover:bg-black">
                    <img src="img/icons/flags/gb.svg" alt="English" class="w-[28px]">
                    <span>English</span>
                </a>
            </div>
        </div>
    </div>
</aside>

<section id="home" class="relative h-[664px] xl:h-[768px] w-full overflow-hidden">
    <video class="absolute inset-0 h-full w-full object-cover grayscale opacity-10" autoplay muted loop playsinline><source src="img/small.mp4" type="video/mp4"/></video>
    <div class="relative h-full w-full mx-auto flex items-end justify-center">
        <img src="img/owner.png" alt="Shcherbau" class="grayscale object-cover object-bottom h-[130%] w-auto max-w-none"/>
    </div>
    <div class="absolute inset-0 bg-[linear-gradient(180deg,rgba(0,0,0,0)_0%,rgba(248,151,23,0.12)_100%)]"></div>
    <div class="absolute inset-0 bg-[linear-gradient(180deg,rgba(0,0,0,0),rgba(0,0,0,0.7)_100%)]"></div>
    <div class="absolute top-[35%] px-[20px] pb-[24px] flex flex-col items-center gap-[14px] text-center w-full">
        <h1 class="font-bold text-[36px] md:text-[50px] xl:text-[70px] font-bold uppercase max-w-[1139px]">Professionelle Renovierung in <span class="text-primary">München</span> und <span class="text-primary">Umgebung</span></h1>
        <span class="text-center text-[16px]/[25px] mt-[34px]">Kein Stress, keine Abstimmung mit mehreren Firmen – wir kümmern uns um alles, vom ersten Schritt bis zum fertigen Raum.<br>Ein Projekt. Ein Ansprechpartner. Ein Ergebnis, das überzeugt.</span>
    </div>
</section>

<section id="ueber-uns" class="py-[50px] md:py-[90px] flex flex-col items-center gap-[90px] px-[20px] max-w-[640px] mx-auto">
    <h2 class="text-primary uppercase font-bold text-center text-[36px] md:text-[58px]/[59px]">Über uns</h2>

    <p class="text-[16px]/[25px] max-w-[900px] mx-auto text-center">
        Shcherban Bau ist ein Bau- und Renovierungsunternehmen mit Sitz in München und Umgebung. Wir sind spezialisiert auf Innenausbau, Trockenbau, Bodenverlegung sowie auf die komplette Umsetzung von Renovierungsprojekten aus einer Hand.
        <br><br>
        Unser Team besteht aus erfahrenen Handwerkern, die seit vielen Jahren im Bereich Renovierung und Innenausbau in Deutschland tätig sind. In unserer Arbeit legen wir großen Wert auf Qualität, Ordnung, klare Organisation und zuverlässige Ergebnisse.
        <br><br>
        Wir begleiten unsere Kunden in allen Projektphasen – von der ersten Beratung und Planung bis zur vollständigen Fertigstellung. Dank unserer Erfahrung kennen wir die Besonderheiten des deutschen Bauprozesses und sorgen für eine professionelle und reibungslose Umsetzung jedes Projekts.
    </p>

    <div class="flex justify-center gap-[10px]">
        <img src="img/icons/paint.svg" alt="Malerarbeiten">
        <img src="img/icons/wrench.svg" alt="Montage und Reparatur">
        <img src="img/icons/mallet.svg" alt="Innenausbauarbeiten">
    </div>
</section>

<section id="leistungen" class="py-[50px] md:py-[90px] px-[20px] flex flex-col items-center gap-[90px] bg-bg2">
    <h2 class="text-primary uppercase font-bold text-center text-[36px] md:text-[58px]">Leistungen</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
        <div class="relative w-[306px] h-[436px] flex items-end justify-center rounded-[10px] overflow-hidden">
            <img src="img/job-list-1.jpg" alt="Leistungen Hintergrund" class="absolute inset-0 w-full h-full object-cover grayscale">
            <div class="absolute inset-0 bg-gradient-to-b from-black/0 to-black"></div>
            <div class="px-[16px] pb-[24px] z-10 flex flex-col items-center gap-[14px]">
                <div class="bg-job-1 size-[13px] rounded-full"></div>
                <h3 class="font-bold text-[18px]/[24px]">Innenausbau</h3>
                <span class="text-center text-[12px]/[20px] max-w-[270px]">Präzise Ausführung von Trockenbau, Wand- und Deckenverkleidungen sowie professioneller Innenraumgestaltung.</span>
            </div>
        </div>
        <div class="relative w-[306px] h-[436px] flex items-end justify-center rounded-[10px] overflow-hidden">
            <img src="img/job-list-2.jpg" alt="Leistungen Hintergrund" class="absolute inset-0 w-full h-full object-cover grayscale">
            <div class="absolute inset-0 bg-gradient-to-b from-black/0 to-black"></div>
            <div class="px-[16px] pb-[24px] z-10 flex flex-col items-center gap-[14px]">
                <div class="bg-job-2 size-[13px] rounded-full"></div>
                <h3 class="font-bold text-[18px]/[24px]">Möbel & Montage</h3>
                <span class="text-center text-[12px]/[20px] max-w-[270px]">Fachgerechte Montage von Möbeln, Küchen, Einbauschränken und individuellen Einrichtungslösungen.</span>
            </div>
        </div>
        <div class="relative w-[306px] h-[436px] flex items-end justify-center rounded-[10px] overflow-hidden">
            <img src="img/job-list-3.jpg" alt="Leistungen Hintergrund" class="absolute inset-0 w-full h-full object-cover grayscale">
            <div class="absolute inset-0 bg-gradient-to-b from-black/0 to-black"></div>
            <div class="px-[16px] pb-[24px] z-10 flex flex-col items-center gap-[14px]">
                <div class="bg-job-3 size-[13px] rounded-full"></div>
                <h3 class="font-bold text-[18px]/[24px]">Komplettservice</h3>
                <span class="text-center text-[12px]/[20px] max-w-[270px]">Renovierungen aus einer Hand – von der Planung bis zur schlüsselfertigen Umsetzung Ihres Projekts.</span>
            </div>
        </div>
        <div class="relative w-[306px] h-[436px] flex items-end justify-center rounded-[10px] overflow-hidden">
            <img src="img/job-list-4.jpg" alt="Leistungen Hintergrund" class="absolute inset-0 w-full h-full object-cover grayscale">
            <div class="absolute inset-0 bg-gradient-to-b from-black/0 to-black"></div>
            <div class="px-[16px] pb-[24px] z-10 flex flex-col items-center gap-[14px]">
                <div class="bg-job-4 size-[13px] rounded-full"></div>
                <h3 class="font-bold text-[18px]/[24px]">Vorbereitung & Demontage</h3>
                <span class="text-center text-[12px]/[20px] max-w-[270px]">Sichere Demontage alter Bauteile und fachgerechte Vorbereitung der Räume für den weiteren Ausbau.</span>
            </div>
        </div>
    </div>
</section>

<section id="vorteile" class="py-[50px] md:py-[90px] px-[20px] flex flex-col items-center gap-[70px]">
    <div>
        <h2 class="text-primary uppercase font-bold text-center text-[36px] md:text-[58px]">Vorteile</h2>
        <h3 class="text-center text-[16px]/[25px] mt-[24px]">Effizient – klar – zuverlässig</h3>
    </div>
    <div class="flex gap-[32px] flex-wrap justify-center">
        <div class="flex flex-col items-center gap-[16px] min-w-[208px]">
            <img src="img/icons/star.svg" alt="Qualität">
            <span class="uppercase text-[18px]/[32px] font-bold">Qualität</span>
        </div>
        <div class="flex flex-col items-center gap-[16px] min-w-[208px]">
            <img src="img/icons/gear.svg" alt="Erfahrung">
            <span class="uppercase text-[18px]/[32px] font-bold">Erfahrung</span>
        </div>
        <div class="flex flex-col items-center gap-[16px] min-w-[208px]">
            <img src="img/icons/shield.svg" alt="Zuverlässigkeit">
            <span class="uppercase text-[18px]/[32px] font-bold">Zuverlässigkeit</span>
        </div>
        <div class="flex flex-col items-center gap-[16px] min-w-[208px]">
            <img src="img/icons/power.svg" alt="Termintreue">
            <span class="uppercase text-[18px]/[32px] font-bold">Termintreue</span>
        </div>
        <div class="flex flex-col items-center gap-[16px] min-w-[208px]">
            <img src="img/icons/safe.svg" alt="Tresorsymbol für Komplettservice">
            <span class="uppercase text-[18px]/[32px] font-bold">Alles aus einer Hand</span>
        </div>
    </div>
    <button class="bg-primary text-black font-bold font-[Roboto] uppercase py-[8px] px-[24px] rounded-[45px]">Jetzt anfragen</button>
</section>

<article id="innenausbau" class="bg-bg2 py-[50px] md:py-[80px] xl:py-[100px] px-[20px] md:px-[80px]">
    <div class="max-w-[1328px] mx-auto flex flex-col xl:flex-row gap-[50px] justify-between items-center">
        <div class="flex flex-col items-start gap-[40px] max-w-[600px]">
            <h2 class="text-job-1 text-center md:text-start w-full uppercase text-[36px] md:text-[58px]/[58px] font-bold">Innenausbau</h2>
            <div class="text-[16px]/[25px]">
                <p>
                    Im Bereich Innenausbau in München bieten wir professionelle Lösungen für Wohnungen, Häuser und Gewerberäume. Unser Leistungsspektrum umfasst Trockenbau, Spachtelarbeiten, Wand- und Deckenverkleidungen, Bodenverlegung sowie Türen- und Fenstermontage. Wir arbeiten nach deutschen Qualitätsstandards und legen großen Wert auf präzise Ausführung, saubere Baustellen und termingerechte Fertigstellung.
                </p>
                <ul class="list-disc list-inside mt-[24px]">
                    <li>Trockenbau</li>
                    <li>Spachtelarbeiten</li>
                    <li>Laminat- und Vinylverlegung</li>
                    <li>Türenmontage</li>
                    <li>Sockelleistenmontage</li>
                </ul>
            </div>
            <button class="bg-job-1 text-white font-bold font-[Roboto] py-[8px] px-[24px] rounded-[45px] uppercase">Jetzt anfragen</button>
        </div>
        <img class="h-[522px] xl:w-[522px] object-cover grayscale rounded-[30px]" src="img/job-list-1.jpg" alt="Innenausbau">
    </div>
</article>

<article id="moebel-montage" class="py-[50px] md:py-[80px] xl:py-[100px] px-[20px] md:px-[80px]">
    <div class="max-w-[1328px] mx-auto flex flex-col-reverse xl:flex-row-reverse gap-[50px] justify-between items-center">
        <div class="flex flex-col items-start gap-[40px] max-w-[600px]">
            <h2 class="text-job-2 text-center md:text-start w-full uppercase text-[36px] md:text-[58px]/[58px] font-bold">moebel-montage</h2>
            <div class="text-[16px]/[25px]">
                <p>
                    Unser Montageservice in München umfasst die fachgerechte Montage von Möbeln, Küchen und Einbaulösungen. Wir übernehmen den Aufbau von Schränken, Regalen und kompletten Möbelsystemen – präzise, zuverlässig und nach Herstellerangaben. Mit unserer Erfahrung garantieren wir eine saubere und professionelle Umsetzung für Privat- und Geschäftskunden.
                </p>
                <ul class="list-disc list-inside mt-[24px]">
                    <li>Küchenmontage</li>
                    <li>Möbelaufbau</li>
                    <li>Einbauschränke</li>
                    <li>Arbeitsplattenmontage</li>
                    <li>Endmontage</li>
                </ul>
            </div>
            <button class="bg-job-2 text-white font-bold font-[Roboto] py-[8px] px-[24px] rounded-[45px] uppercase">Jetzt anfragen</button>
        </div>
        <img class="h-[522px] xl:max-w-[522px] object-cover grayscale rounded-[30px]" src="img/job-list-2.jpg" alt="Innenausbau">
    </div>
</article>

<article id="komplettservice" class="bg-bg2 py-[50px] md:py-[80px] xl:py-[100px] px-[20px] md:px-[80px]">
    <div class="max-w-[1328px] mx-auto flex flex-col xl:flex-row gap-[50px] justify-between items-center">
        <div class="flex flex-col items-start gap-[40px] max-w-[600px]">
            <h2 class="text-job-3 text-center md:text-start w-full uppercase text-[36px] md:text-[58px]/[58px] font-bold">KOMPLETTSERVICE</h2>
            <div class="text-[16px]/[25px]">
                <p>
                    Mit unserem Komplettservice für Renovierungen in München übernehmen wir die gesamte Organisation Ihres Projekts. Von der Planung über die Baukoordination bis zur fertigen Umsetzung erhalten Sie alle Leistungen aus einer Hand. Für Elektro- und Sanitärarbeiten arbeiten wir mit lizenzierten deutschen Fachbetrieben zusammen, sodass Sie ein professionelles und rechtssicheres Ergebnis erhalten.
                </p>
                <ul class="list-disc list-inside mt-[24px]">
                    <li>Projektplanung</li>
                    <li>Baukoordination</li>
                    <li>Materialbeschaffung</li>
                    <li>Bauüberwachung</li>
                    <li>Projektbegleitung</li>
                </ul>
            </div>
            <button class="bg-job-3 text-white font-bold font-[Roboto] py-[8px] px-[24px] rounded-[45px] uppercase">Jetzt anfragen</button>
        </div>
        <img class="h-[522px] xl:max-w-[522px] object-cover grayscale rounded-[30px]" src="img/job-list-3.jpg" alt="Innenausbau">
    </div>
</article>

<article id="vorbereitung-demontage" class="py-[50px] md:py-[80px] xl:py-[100px] px-[20px] md:px-[80px]">
    <div class="max-w-[1328px] mx-auto flex flex-col-reverse xl:flex-row-reverse gap-[50px] justify-between items-center">
        <div class="flex flex-col items-start gap-[40px] max-w-[600px]">
            <h2 class="text-job-4 text-center md:text-start w-full uppercase text-[36px] md:text-[58px]/[58px] font-bold">VORBEREITUNG & DEMONTAGE</h2>
            <div class="text-[16px]/[25px]">
                <p>
                    Vor jeder Renovierung sind fachgerechte Vorbereitungs- und Demontagearbeiten entscheidend. Wir übernehmen den professionellen Rückbau alter Bauteile, das Entfernen von Bodenbelägen sowie die Vorbereitung der Räume für den weiteren Ausbau. Dazu gehören auch vorbereitende Elektro- und Sanitärarbeiten. Alle Arbeiten werden sauber, sicher und nach geltenden Vorschriften ausgeführt.
                </p>
                <ul class="list-disc list-inside mt-[24px]">
                    <li>Demontage von Trennwänden</li>
                    <li>Entfernung alter Bodenbeläge</li>
                    <li>Baustellenvorbereitung</li>
                    <li>Elektrovorbereitung</li>
                    <li>Entsorgung</li>
                    <li>Sanitäranschlüsse – über Partnerfirma</li>
                </ul>
            </div>
            <button class="bg-job-4 text-white font-bold font-[Roboto] py-[8px] px-[24px] rounded-[45px] uppercase">Jetzt anfragen</button>
        </div>
        <img class="h-[522px] w-[522px] object-cover grayscale rounded-[30px]" src="img/job-list-4.jpg" alt="Innenausbau">
    </div>
</article>

<section id="arbeitsablauf" class="bg-bg2 py-[50px] md:py-[90px] px-[20px] flex flex-col items-center gap-[70px]">
    <div>
        <h2 class="text-primary uppercase font-bold text-center text-[36px] md:text-[58px]">Arbeitsablauf</h2>
        <h3 class="text-center text-[16px]/[25px] mt-[24px]">Effizient – klar – zuverlässig</h3>
    </div>
    <div class="flex flex-col md:flex-row flex-wrap md:gap-y-[16px] items-center justify-center md:w-[766px] xl:w-[1324px]">
        <div class="size-[208px] rounded-[50px] bg-bg/45 flex flex-col items-center justify-center gap-[12px]">
            <div class="size-[40px] rounded-full bg-bg4 flex justify-center items-center text-primary text-[22px] font-bold">1</div>
            <span class="uppercase text-menu-text font-bold text-[22px]/[62px]">Anfrage</span>
        </div>
        <img src="img/icons/path-d.svg" alt="Arbeitsablauf" class="hidden md:block">
        <img src="img/icons/path-r.svg" alt="Arbeitsablauf" class="block md:hidden">
        <div class="size-[208px] rounded-[50px] bg-bg/60 flex flex-col items-center justify-center gap-[12px]">
            <div class="size-[40px] rounded-full bg-bg4 flex justify-center items-center text-primary text-[22px] font-bold">2</div>
            <span class="uppercase text-menu-text font-bold text-[22px]/[62px]">Besichtigung</span>
        </div>
        <img src="img/icons/path-u.svg" alt="Arbeitsablauf" class="hidden md:block">
        <img src="img/icons/path-l.svg" alt="Arbeitsablauf" class="block md:hidden">
        <div class="size-[208px] rounded-[50px] bg-bg/70 flex flex-col items-center justify-center gap-[12px]">
            <div class="size-[40px] rounded-full bg-bg4 flex justify-center items-center text-primary text-[22px] font-bold">3</div>
            <span class="uppercase text-menu-text font-bold text-[22px]/[62px]">Angebot</span>
        </div>
        <img src="img/icons/path-d.svg" alt="Arbeitsablauf"  class="hidden xl:block">
        <img src="img/icons/path-r.svg" alt="Arbeitsablauf"  class="block md:hidden">
        <div class="size-[208px] rounded-[50px] bg-bg/80 flex flex-col items-center justify-center gap-[12px]">
            <div class="size-[40px] rounded-full bg-bg4 flex justify-center items-center text-primary text-[22px] font-bold">4</div>
            <span class="uppercase text-menu-text font-bold text-[22px]/[62px]">Ausführung</span>
        </div>
        <img src="img/icons/path-u.svg" alt="Arbeitsablauf" class="hidden md:block">
        <img src="img/icons/path-l.svg" alt="Arbeitsablauf" class="block md:hidden">
        <div class="size-[208px] rounded-[50px] bg-bg/100 flex flex-col items-center justify-center gap-[12px]">
            <div class="size-[40px] rounded-full bg-primary flex justify-center items-center text-bg text-[22px] font-bold">5</div>
            <span class="uppercase text-menu-text font-bold text-[22px]/[62px]">Abnahme</span>
        </div>
    </div>
    <p class="text-menu-text bg-bg italic text-center">Klare Planung, strukturierte Abläufe und Qualitätskontrolle stehen bei uns an erster Stelle.</p>
    <button class="bg-primary text-black font-bold font-[Roboto] uppercase py-[8px] px-[24px] rounded-[45px]">Jetzt anfragen</button>
</section>

<section id="projekte" class="py-[50px] md:py-[90px] px-[20px] flex flex-col items-center gap-[70px]">
    <div>
        <h2 class="text-primary uppercase font-bold text-center text-[36px] md:text-[58px]">PROJEKTE</h2>
        <h3 class="text-center text-[16px]/[25px] mt-[24px]">Wir realisieren Renovierungen unterschiedlicher Art – von Einzelarbeiten bis zu Komplettprojekten aus einer Hand.</h3>
    </div>
    <img src="img/gallery.png" alt="gallery">
</section>

<section class="py-[50px] md:py-[80px] px-[20px] bg-bg2">
    <div class="flex flex-col gap-[48px] relative w-full max-w-[1600px] mx-auto overflow-hidden">
        <h2 class="uppercase text-center text-primary font-bold text-[27px] md:text-[58px]">Kundenbewertungen</h2>
        <div class="flex content-stretch animate-carousel md:animate-none md:gap-[20px] xl:gap-[24px] md:text-body lg:text-body-lg">

            <div class="shrink-0 md:flex-1 h-auto w-full">
                <div class="p-[25px] lg:pl-[24px] bg-bg5 rounded-[20px] flex flex-col gap-[40px] mx-auto w-fit h-full">
                    <div class="flex gap-[4px]">
                        <img src="img/icons/star-review.svg" class="w-[16px] h-[16px]" alt="star">
                        <img src="img/icons/star-review.svg" class="w-[16px] h-[16px]" alt="star">
                        <img src="img/icons/star-review.svg" class="w-[16px] h-[16px]" alt="star">
                        <img src="img/icons/star-review.svg" class="w-[16px] h-[16px]" alt="star">
                        <img src="img/icons/star-review.svg" class="w-[16px] h-[16px]" alt="star">
                    </div>
                    <div class="max-w-[304px] md:max-w-max">"Professionelle Arbeit, pünktlich und sauber. Unser Badezimmer ist ein Traum geworden!"</div>
                    <div class="text-menu-text">Anna M.</div>
                </div>
            </div>

            <div class="shrink-0 md:flex-1 h-auto w-full">
                <div class="p-[25px] lg:pl-[24px] bg-bg5 rounded-[20px] flex flex-col gap-[40px] mx-auto w-fit h-full">
                    <div class="flex gap-[4px]">
                        <img src="img/icons/star-review.svg" class="w-[16px] h-[16px]" alt="star">
                        <img src="img/icons/star-review.svg" class="w-[16px] h-[16px]" alt="star">
                        <img src="img/icons/star-review.svg" class="w-[16px] h-[16px]" alt="star">
                        <img src="img/icons/star-review.svg" class="w-[16px] h-[16px]" alt="star">
                        <img src="img/icons/star-review.svg" class="w-[16px] h-[16px]" alt="star">
                    </div>
                    <div class="max-w-[304px] md:max-w-max">"Von der Planung bis zur Umsetzung alles perfekt. Sehr zu empfehlen!"</div>
                    <div class="text-menu-text">Thomas K.</div>
                </div>
            </div>

            <div class="shrink-0 md:flex-1 h-auto w-full">
                <div class="p-[25px] lg:pl-[24px] bg-bg5 rounded-[20px] flex flex-col gap-[40px] mx-auto w-fit h-full">
                    <div class="flex gap-[4px]">
                        <img src="img/icons/star-review.svg" class="w-[16px] h-[16px]" alt="star">
                        <img src="img/icons/star-review.svg" class="w-[16px] h-[16px]" alt="star">
                        <img src="img/icons/star-review.svg" class="w-[16px] h-[16px]" alt="star">
                        <img src="img/icons/star-review.svg" class="w-[16px] h-[16px]" alt="star">
                        <img src="img/icons/star-review.svg" class="w-[16px] h-[16px]" alt="star">
                    </div>
                    <div class="max-w-[304px] md:max-w-max">"Kompetente Beratung und erstklassige Handwerkskunst. Vielen Dank!"</div>
                    <div class="text-menu-text">Sarah L.</div>
                </div>
            </div>

        </div>
    </div>
</section>

<nav id="kontakt" class="py-[50px] md:py-[90px] px-[20px] max-w-[1328px] mx-auto flex flex-col lg:flex-row justify-between items-start gap-[58px]">
    <div class="flex flex-col gap-[50px] md:gap-[72px]">
        <div class="flex flex-col gap-[16px] items-start">
            <img src="img/logo-mini.svg" alt="schcherban">
            <p class="md:max-w-[372px] text-[14px]/[20px]">Ihr vertrauenswürdiger Handwerker in München Unser kleines Team bietet eine breite Palette an Bau- und Renovierungsdienstleistungen an, darunter Hausrenovierungen, Fassadensanierungen, Trockenbau und vieles mehr.</p>
        </div>
        <div class="flex flex-col gap-[40px]">
            <div class="flex flex-col gap-[16px] text-[16px]/[20px]">
                <h3 class="text-[18px]/[24px] font-bold">Kontakt</h3>
                <a class="flex gap-[8px]" href="tel:+491758841812"><img src="img/icons/phone.svg" alt="phone">+49 175 8841812</a>
                <a class="flex gap-[8px]" href="mailto:info@emailneedtochange.de"><img src="img/icons/mail.svg" alt="mail">info@emailneedtochange.de</a>
            </div>
            <div class="flex flex-col gap-[16px] text-[16px]/[20px]">
                <h3 class="text-[18px]/[24px] font-bold">Company</h3>
                <a class="flex gap-[8px]" href="#"><img src="img/icons/location.svg" alt="location">Rambaldistraße 20, 81929 München</a>
                <span class="flex gap-[8px]"><img src="img/icons/bank.svg" alt="bank">224/5139/6998</span>
                <span class="flex gap-[8px]"><img src="img/icons/calendar.svg" alt="calendar">Mo - Fr, 8:00 Uhr bis 18:00 Uhr.</span>
            </div>
        </div>
    </div>
    <form class="text-form-text md:max-w-[522px] flex flex-col gap-[20px]">
        <input type="text" placeholder="Name / Vor- und Nachname *" class="px-[20px] py-[12px] bg-form-bg-active placeholder-shown:bg-form-bg text-white focus:outline-none focus:ring-2 ring-white focus:bg-form-active rounded-[30px] w-full placeholder:text-form-text">
        <input type="text" placeholder="E-Mail-Adresse*" class="px-[20px] py-[12px] bg-form-bg-active placeholder-shown:bg-form-bg text-white focus:outline-none focus:ring-2 ring-white focus:bg-form-active rounded-[30px] w-full placeholder:text-form-text">
        <input type="text" placeholder="Telefonnummer" class="px-[20px] py-[12px] bg-form-bg-active placeholder-shown:bg-form-bg text-white focus:outline-none focus:ring-2 ring-white focus:bg-form-active rounded-[30px] w-full placeholder:text-form-text">
        <textarea placeholder="hr Anliegen / Projektbeschreibung" rows="5" class="px-[20px] py-[12px] bg-form-bg-active placeholder-shown:bg-form-bg text-white focus:outline-none focus:ring-2 ring-white focus:bg-form-active rounded-[30px] w-full placeholder:text-form-text"></textarea>
        <input type="file" multiple class="hidden">
        <div class="flex flex-wrap items-start gap-[8px]">
            <button class="px-[20px] py-[12px] bg-form-bg-active rounded-[30px] flex items-center gap-[10px] text-white">
                <img src="img/icons/upload.svg" alt="Datei hochladen">
                <span>Datei hochladen</span>
            </button>
            <div class="relative size-[50px] border border-[rgb(127_168_140)] overflow-hidden">
                <img src="img/job-list-1.jpg" alt="Vorschaubild 1" class="w-full h-full object-cover">
                <button type="button" class="absolute top-0 right-0 size-[18px] bg-black/19 flex items-center justify-center" aria-label="Bild entfernen">
                    <img src="img/icons/close.svg" class="size-[16px]" alt="delete">
                </button>
            </div>
            <div class="relative size-[50px] border border-[rgb(127_168_140)] overflow-hidden">
                <img src="img/gallery.png" alt="Vorschaubild 2" class="w-full h-full object-cover">
                <button type="button" class="absolute top-0 right-0 size-[18px] bg-black/19 flex items-center justify-center" aria-label="Bild entfernen">
                    <img src="img/icons/close.svg" class="size-[16px]" alt="delete">
                </button>
            </div>
            <div class="relative size-[50px] border border-[rgb(127_168_140)] overflow-hidden">
                <img src="img/owner.png" alt="Vorschaubild 3" class="w-full h-full object-cover">
                <button type="button" class="absolute top-0 right-0 size-[18px] bg-black/19 flex items-center justify-center" aria-label="Bild entfernen">
                    <img src="img/icons/close.svg" class="size-[16px]" alt="delete">
                </button>
            </div>
        </div>

        <label class="flex items-start gap-[10px] cursor-pointer select-none">
            <input type="checkbox" name="terms" class="peer sr-only" required>
            <span class="relative block w-[24px] h-[24px] shrink-0 rounded-[4px] bg-[rgba(102,102,102,1)] border border-white after:content-[''] after:absolute after:inset-[4px] after:bg-primary after:rounded-[2px] after:opacity-0 peer-checked:after:opacity-100"></span>
            <span class="text-white">Ich habe die Allgemeinen Geschäftsbedingungen gelesen und verstanden.</span>
        </label>
        <button class="bg-primary text-black disabled:bg-[rgb(133_85_21)] uppercase font-bold font-[Roboto] py-[8px] px-[24px] rounded-[45px]">Jetzt anfragen</button>
        <p class="italic text-[14px]/[18px] text-[rgb(216_238_223)]">
            Mit dem Absenden des Formulars erkläre ich mich mit der Verarbeitung meiner Daten gemäß der Datenschutzerklärung einverstanden.
            Ihre Daten werden ausschließlich zur Bearbeitung Ihrer Anfrage verwendet und nicht an Dritte weitergegeben.
        </p>
    </form>
</nav>

<footer class="border-t border-[rgb(41_37_36)] py-[32px] text-center">
    <p class="text-[12px]/[20px]">© 2026 Shcherban Bau. Alle Rechte vorbehalten.</p>
</footer>

<dialog id="thank-you-dialog" class="overscroll-contain overflow-auto backdrop:overscroll-contain backdrop:overflow-auto fixed left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 m-0 w-[603px] h-[434px] max-w-[calc(100%-32px)] bg-bg2 text-white p-0 rounded-[20px] border border-white/10 backdrop:bg-black/60">
    <div class="h-full w-full flex flex-col items-center justify-center text-center px-[30px] py-[40px]">
        <img src="img/logo-mini.svg" alt="Shcherban Bau" class="w-[96px]">
        <img class="mt-[28px] size-[35px]" src="img/icons/check.svg" alt="">
        <h2 class="mt-[24px] font-bold text-[40px]/[44px] uppercase">Vielen Dank!</h2>
        <p class="mt-[12px] text-[16px]/[25px] max-w-[470px]">Wir haben Ihre Nachricht erhalten und melden uns in Kürze bei Ihnen.</p>
        <button type="button" onclick="closeThankYouDialog()" class="mt-[28px] bg-primary text-black font-bold font-[Roboto] py-[8px] px-[24px] rounded-[45px]">Busgeld</button>
    </div>
</dialog>

<script>
    let dialogScrollY = 0;
    let dialogBodyPosition = '';
    let dialogBodyTop = '';
    let dialogBodyLeft = '';
    let dialogBodyRight = '';
    let dialogBodyWidth = '';

    function lockBodyForDialog() {
        dialogScrollY = window.scrollY || window.pageYOffset || 0;
        dialogBodyPosition = document.body.style.position;
        dialogBodyTop = document.body.style.top;
        dialogBodyLeft = document.body.style.left;
        dialogBodyRight = document.body.style.right;
        dialogBodyWidth = document.body.style.width;

        document.body.style.position = 'fixed';
        document.body.style.top = `-${dialogScrollY}px`;
        document.body.style.left = '0';
        document.body.style.right = '0';
        document.body.style.width = '100%';
    }

    function unlockBodyForDialog() {
        const html = document.documentElement;
        const previousScrollBehavior = html.style.scrollBehavior;
        html.style.scrollBehavior = 'auto';
        document.body.style.position = dialogBodyPosition;
        document.body.style.top = dialogBodyTop;
        document.body.style.left = dialogBodyLeft;
        document.body.style.right = dialogBodyRight;
        document.body.style.width = dialogBodyWidth;
        window.scrollTo(0, dialogScrollY);
        requestAnimationFrame(() => {
            html.style.scrollBehavior = previousScrollBehavior;
        });
    }

    function showThankYouDialog() {
        const dialog = document.getElementById('thank-you-dialog');

        if (dialog && typeof dialog.showModal === 'function') {
            lockBodyForDialog();
            dialog.showModal();
        }
    }

    function closeThankYouDialog() {
        const dialog = document.getElementById('thank-you-dialog');

        if (dialog && dialog.open) {
            dialog.close();
        }
    }

    (function () {
        const dialog = document.getElementById('thank-you-dialog');
        if (!dialog) return;

        function preventBackgroundScrollWhenDialogOpen(event) {
            if (!dialog.open) {
                return;
            }

            const path = event.composedPath ? event.composedPath() : null;
            const insideDialog = path
                ? path.includes(dialog)
                : dialog.contains(event.target);

            if (insideDialog) {
                return;
            }

            event.preventDefault();
            event.stopPropagation();
        }

        window.addEventListener('wheel', preventBackgroundScrollWhenDialogOpen, { passive: false });
        window.addEventListener('touchmove', preventBackgroundScrollWhenDialogOpen, { passive: false });

        dialog.addEventListener('close', unlockBodyForDialog);
    })();

    (function () {
        const menuToggle = document.getElementById('mobile-menu-toggle');
        const menuPanel = document.getElementById('mobile-menu-panel');
        if (!menuToggle || !menuPanel) return;

        function onScroll(event) {
            if (!menuToggle.checked) {
                return;
            }

            const path = event.composedPath ? event.composedPath() : null;
            const insideMenu = path
                ? path.includes(menuPanel)
                : menuPanel.contains(event.target);

            if (insideMenu) {
                return;
            }

            event.preventDefault();
            event.stopPropagation();
        }

        window.addEventListener('wheel', onScroll, { passive: false });
        window.addEventListener('touchmove', onScroll, { passive: false });

    })();

</script>

</body>
</html>
