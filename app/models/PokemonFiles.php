<?php

namespace app\models;

class PokemonFiles extends \lithium\data\Model {
	
	const FATEFUL_FLAG    = 0x1;
	const FEMALE_FLAG     = 0x2;
	const GENDERLESS_FLAG = 0x4;
	
	protected static $dexToName = array(
		1 => 'Bulbasaur',
		2 => 'Ivysaur',
		3 => 'Venusaur',
		4 => 'Charmander',
		5 => 'Charmeleon',
		6 => 'Charizard',
		7 => 'Squirtle',
		8 => 'Wartortle',
		9 => 'Blastoise',
		10 => 'Caterpie',
		11 => 'Metapod',
		12 => 'Butterfree',
		13 => 'Weedle',
		14 => 'Kakuna',
		15 => 'Beedrill',
		16 => 'Pidgey',
		17 => 'Pidgeotto',
		18 => 'Pidgeot',
		19 => 'Rattata',
		20 => 'Raticate',
		21 => 'Spearow',
		22 => 'Fearow',
		23 => 'Ekans',
		24 => 'Arbok',
		25 => 'Pikachu',
		26 => 'Raichu',
		27 => 'Sandshrew',
		28 => 'Sandslash',
		29 => 'Nidoran♀',
		30 => 'Nidorina',
		31 => 'Nidoqueen',
		32 => 'Nidoran♂',
		33 => 'Nidorino',
		34 => 'Nidoking',
		35 => 'Clefairy',
		36 => 'Clefable',
		37 => 'Vulpix',
		38 => 'Ninetales',
		39 => 'Jigglypuff',
		40 => 'Wigglytuff',
		41 => 'Zubat',
		42 => 'Golbat',
		43 => 'Oddish',
		44 => 'Gloom',
		45 => 'Vileplume',
		46 => 'Paras',
		47 => 'Parasect',
		48 => 'Venonat',
		49 => 'Venomoth',
		50 => 'Diglett',
		51 => 'Dugtrio',
		52 => 'Meowth',
		53 => 'Persian',
		54 => 'Psyduck',
		55 => 'Golduck',
		56 => 'Mankey',
		57 => 'Primeape',
		58 => 'Growlithe',
		59 => 'Arcanine',
		60 => 'Poliwag',
		61 => 'Poliwhirl',
		62 => 'Poliwrath',
		63 => 'Abra',
		64 => 'Kadabra',
		65 => 'Alakazam',
		66 => 'Machop',
		67 => 'Machoke',
		68 => 'Machamp',
		69 => 'Bellsprout',
		70 => 'Weepinbell',
		71 => 'Victreebel',
		72 => 'Tentacool',
		73 => 'Tentacruel',
		74 => 'Geodude',
		75 => 'Graveler',
		76 => 'Golem',
		77 => 'Ponyta',
		78 => 'Rapidash',
		79 => 'Slowpoke',
		80 => 'Slowbro',
		81 => 'Magnemite',
		82 => 'Magneton',
		83 => 'Farfetch\'d',
		84 => 'Doduo',
		85 => 'Dodrio',
		86 => 'Seel',
		87 => 'Dewgong',
		88 => 'Grimer',
		89 => 'Muk',
		90 => 'Shellder',
		91 => 'Cloyster',
		92 => 'Gastly',
		93 => 'Haunter',
		94 => 'Gengar',
		95 => 'Onix',
		96 => 'Drowzee',
		97 => 'Hypno',
		98 => 'Krabby',
		99 => 'Kingler',
		100 => 'Voltorb',
		101 => 'Electrode',
		102 => 'Exeggcute',
		103 => 'Exeggutor',
		104 => 'Cubone',
		105 => 'Marowak',
		106 => 'Hitmonlee',
		107 => 'Hitmonchan',
		108 => 'Lickitung',
		109 => 'Koffing',
		110 => 'Weezing',
		111 => 'Rhyhorn',
		112 => 'Rhydon',
		113 => 'Chansey',
		114 => 'Tangela',
		115 => 'Kangaskhan',
		116 => 'Horsea',
		117 => 'Seadra',
		118 => 'Goldeen',
		119 => 'Seaking',
		120 => 'Staryu',
		121 => 'Starmie',
		122 => 'Mr. Mime',
		123 => 'Scyther',
		124 => 'Jynx',
		125 => 'Electabuzz',
		126 => 'Magmar',
		127 => 'Pinsir',
		128 => 'Tauros',
		129 => 'Magikarp',
		130 => 'Gyarados',
		131 => 'Lapras',
		132 => 'Ditto',
		133 => 'Eevee',
		134 => 'Vaporeon',
		135 => 'Jolteon',
		136 => 'Flareon',
		137 => 'Porygon',
		138 => 'Omanyte',
		139 => 'Omastar',
		140 => 'Kabuto',
		141 => 'Kabutops',
		142 => 'Aerodactyl',
		143 => 'Snorlax',
		144 => 'Articuno',
		145 => 'Zapdos',
		146 => 'Moltres',
		147 => 'Dratini',
		148 => 'Dragonair',
		149 => 'Dragonite',
		150 => 'Mewtwo',
		151 => 'Mew',
		152 => 'Chikorita',
		153 => 'Bayleef',
		154 => 'Meganium',
		155 => 'Cyndaquil',
		156 => 'Quilava',
		157 => 'Typhlosion',
		158 => 'Totodile',
		159 => 'Croconaw',
		160 => 'Feraligatr',
		161 => 'Sentret',
		162 => 'Furret',
		163 => 'Hoothoot',
		164 => 'Noctowl',
		165 => 'Ledyba',
		166 => 'Ledian',
		167 => 'Spinarak',
		168 => 'Ariados',
		169 => 'Crobat',
		170 => 'Chinchou',
		171 => 'Lanturn',
		172 => 'Pichu',
		173 => 'Cleffa',
		174 => 'Igglybuff',
		175 => 'Togepi',
		176 => 'Togetic',
		177 => 'Natu',
		178 => 'Xatu',
		179 => 'Mareep',
		180 => 'Flaaffy',
		181 => 'Ampharos',
		182 => 'Bellossom',
		183 => 'Marill',
		184 => 'Azumarill',
		185 => 'Sudowoodo',
		186 => 'Politoed',
		187 => 'Hoppip',
		188 => 'Skiploom',
		189 => 'Jumpluff',
		190 => 'Aipom',
		191 => 'Sunkern',
		192 => 'Sunflora',
		193 => 'Yanma',
		194 => 'Wooper',
		195 => 'Quagsire',
		196 => 'Espeon',
		197 => 'Umbreon',
		198 => 'Murkrow',
		199 => 'Slowking',
		200 => 'Misdreavus',
		201 => 'Unown',
		202 => 'Wobbuffet',
		203 => 'Girafarig',
		204 => 'Pineco',
		205 => 'Forretress',
		206 => 'Dunsparce',
		207 => 'Gligar',
		208 => 'Steelix',
		209 => 'Snubbull',
		210 => 'Granbull',
		211 => 'Qwilfish',
		212 => 'Scizor',
		213 => 'Shuckle',
		214 => 'Heracross',
		215 => 'Sneasel',
		216 => 'Teddiursa',
		217 => 'Ursaring',
		218 => 'Slugma',
		219 => 'Magcargo',
		220 => 'Swinub',
		221 => 'Piloswine',
		222 => 'Corsola',
		223 => 'Remoraid',
		224 => 'Octillery',
		225 => 'Delibird',
		226 => 'Mantine',
		227 => 'Skarmory',
		228 => 'Houndour',
		229 => 'Houndoom',
		230 => 'Kingdra',
		231 => 'Phanpy',
		232 => 'Donphan',
		233 => 'Porygon2',
		234 => 'Stantler',
		235 => 'Smeargle',
		236 => 'Tyrogue',
		237 => 'Hitmontop',
		238 => 'Smoochum',
		239 => 'Elekid',
		240 => 'Magby',
		241 => 'Miltank',
		242 => 'Blissey',
		243 => 'Raikou',
		244 => 'Entei',
		245 => 'Suicune',
		246 => 'Larvitar',
		247 => 'Pupitar',
		248 => 'Tyranitar',
		249 => 'Lugia',
		250 => 'Ho-Oh',
		251 => 'Celebi',
		252 => 'Treecko',
		253 => 'Grovyle',
		254 => 'Sceptile',
		255 => 'Torchic',
		256 => 'Combusken',
		257 => 'Blaziken',
		258 => 'Mudkip',
		259 => 'Marshtomp',
		260 => 'Swampert',
		261 => 'Poochyena',
		262 => 'Mightyena',
		263 => 'Zigzagoon',
		264 => 'Linoone',
		265 => 'Wurmple',
		266 => 'Silcoon',
		267 => 'Beautifly',
		268 => 'Cascoon',
		269 => 'Dustox',
		270 => 'Lotad',
		271 => 'Lombre',
		272 => 'Ludicolo',
		273 => 'Seedot',
		274 => 'Nuzleaf',
		275 => 'Shiftry',
		276 => 'Taillow',
		277 => 'Swellow',
		278 => 'Wingull',
		279 => 'Pelipper',
		280 => 'Ralts',
		281 => 'Kirlia',
		282 => 'Gardevoir',
		283 => 'Surskit',
		284 => 'Masquerain',
		285 => 'Shroomish',
		286 => 'Breloom',
		287 => 'Slakoth',
		288 => 'Vigoroth',
		289 => 'Slaking',
		290 => 'Nincada',
		291 => 'Ninjask',
		292 => 'Shedinja',
		293 => 'Whismur',
		294 => 'Loudred',
		295 => 'Exploud',
		296 => 'Makuhita',
		297 => 'Hariyama',
		298 => 'Azurill',
		299 => 'Nosepass',
		300 => 'Skitty',
		301 => 'Delcatty',
		302 => 'Sableye',
		303 => 'Mawile',
		304 => 'Aron',
		305 => 'Lairon',
		306 => 'Aggron',
		307 => 'Meditite',
		308 => 'Medicham',
		309 => 'Electrike',
		310 => 'Manectric',
		311 => 'Plusle',
		312 => 'Minun',
		313 => 'Volbeat',
		314 => 'Illumise',
		315 => 'Roselia',
		316 => 'Gulpin',
		317 => 'Swalot',
		318 => 'Carvanha',
		319 => 'Sharpedo',
		320 => 'Wailmer',
		321 => 'Wailord',
		322 => 'Numel',
		323 => 'Camerupt',
		324 => 'Torkoal',
		325 => 'Spoink',
		326 => 'Grumpig',
		327 => 'Spinda',
		328 => 'Trapinch',
		329 => 'Vibrava',
		330 => 'Flygon',
		331 => 'Cacnea',
		332 => 'Cacturne',
		333 => 'Swablu',
		334 => 'Altaria',
		335 => 'Zangoose',
		336 => 'Seviper',
		337 => 'Lunatone',
		338 => 'Solrock',
		339 => 'Barboach',
		340 => 'Whiscash',
		341 => 'Corphish',
		342 => 'Crawdaunt',
		343 => 'Baltoy',
		344 => 'Claydol',
		345 => 'Lileep',
		346 => 'Cradily',
		347 => 'Anorith',
		348 => 'Armaldo',
		349 => 'Feebas',
		350 => 'Milotic',
		351 => 'Castform',
		352 => 'Kecleon',
		353 => 'Shuppet',
		354 => 'Banette',
		355 => 'Duskull',
		356 => 'Dusclops',
		357 => 'Tropius',
		358 => 'Chimecho',
		359 => 'Absol',
		360 => 'Wynaut',
		361 => 'Snorunt',
		362 => 'Glalie',
		363 => 'Spheal',
		364 => 'Sealeo',
		365 => 'Walrein',
		366 => 'Clamperl',
		367 => 'Huntail',
		368 => 'Gorebyss',
		369 => 'Relicanth',
		370 => 'Luvdisc',
		371 => 'Bagon',
		372 => 'Shelgon',
		373 => 'Salamence',
		374 => 'Beldum',
		375 => 'Metang',
		376 => 'Metagross',
		377 => 'Regirock',
		378 => 'Regice',
		379 => 'Registeel',
		380 => 'Latias',
		381 => 'Latios',
		382 => 'Kyogre',
		383 => 'Groudon',
		384 => 'Rayquaza',
		385 => 'Jirachi',
		386 => 'Deoxys',
		387 => 'Turtwig',
		388 => 'Grotle',
		389 => 'Torterra',
		390 => 'Chimchar',
		391 => 'Monferno',
		392 => 'Infernape',
		393 => 'Piplup',
		394 => 'Prinplup',
		395 => 'Empoleon',
		396 => 'Starly',
		397 => 'Staravia',
		398 => 'Staraptor',
		399 => 'Bidoof',
		400 => 'Bibarel',
		401 => 'Kricketot',
		402 => 'Kricketune',
		403 => 'Shinx',
		404 => 'Luxio',
		405 => 'Luxray',
		406 => 'Budew',
		407 => 'Roserade',
		408 => 'Cranidos',
		409 => 'Rampardos',
		410 => 'Shieldon',
		411 => 'Bastiodon',
		412 => 'Burmy',
		413 => 'Wormadam',
		414 => 'Mothim',
		415 => 'Combee',
		416 => 'Vespiquen',
		417 => 'Pachirisu',
		418 => 'Buizel',
		419 => 'Floatzel',
		420 => 'Cherubi',
		421 => 'Cherrim',
		422 => 'Shellos',
		423 => 'Gastrodon',
		424 => 'Ambipom',
		425 => 'Drifloon',
		426 => 'Drifblim',
		427 => 'Buneary',
		428 => 'Lopunny',
		429 => 'Mismagius',
		430 => 'Honchkrow',
		431 => 'Glameow',
		432 => 'Purugly',
		433 => 'Chingling',
		434 => 'Stunky',
		435 => 'Skuntank',
		436 => 'Bronzor',
		437 => 'Bronzong',
		438 => 'Bonsly',
		439 => 'Mime Jr.',
		440 => 'Happiny',
		441 => 'Chatot',
		442 => 'Spiritomb',
		443 => 'Gible',
		444 => 'Gabite',
		445 => 'Garchomp',
		446 => 'Munchlax',
		447 => 'Riolu',
		448 => 'Lucario',
		449 => 'Hippopotas',
		450 => 'Hippowdon',
		451 => 'Skorupi',
		452 => 'Drapion',
		453 => 'Croagunk',
		454 => 'Toxicroak',
		455 => 'Carnivine',
		456 => 'Finneon',
		457 => 'Lumineon',
		458 => 'Mantyke',
		459 => 'Snover',
		460 => 'Abomasnow',
		461 => 'Weavile',
		462 => 'Magnezone',
		463 => 'Lickilicky',
		464 => 'Rhyperior',
		465 => 'Tangrowth',
		466 => 'Electivire',
		467 => 'Magmortar',
		468 => 'Togekiss',
		469 => 'Yanmega',
		470 => 'Leafeon',
		471 => 'Glaceon',
		472 => 'Gliscor',
		473 => 'Mamoswine',
		474 => 'Porygon-Z',
		475 => 'Gallade',
		476 => 'Probopass',
		477 => 'Dusknoir',
		478 => 'Froslass',
		479 => 'Rotom',
		480 => 'Uxie',
		481 => 'Mesprit',
		482 => 'Azelf',
		483 => 'Dialga',
		484 => 'Palkia',
		485 => 'Heatran',
		486 => 'Regigigas',
		487 => 'Giratina',
		488 => 'Cresselia',
		489 => 'Phione',
		490 => 'Manaphy',
		491 => 'Darkrai',
		492 => 'Shaymin',
		493 => 'Arceus',
		494 => 'Victini',
		495 => 'Snivy',
		496 => 'Servine',
		497 => 'Serperior',
		498 => 'Tepig',
		499 => 'Pignite',
		500 => 'Emboar',
		501 => 'Oshawott',
		502 => 'Dewott',
		503 => 'Samurott',
		504 => 'Patrat',
		505 => 'Watchog',
		506 => 'Lillipup',
		507 => 'Herdier',
		508 => 'Stoutland',
		509 => 'Purrloin',
		510 => 'Liepard',
		511 => 'Pansage',
		512 => 'Simisage',
		513 => 'Pansear',
		514 => 'Simisear',
		515 => 'Panpour',
		516 => 'Simipour',
		517 => 'Munna',
		518 => 'Musharna',
		519 => 'Pidove',
		520 => 'Tranquill',
		521 => 'Unfezant',
		522 => 'Blitzle',
		523 => 'Zebstrika',
		524 => 'Roggenrola',
		525 => 'Boldore',
		526 => 'Gigalith',
		527 => 'Woobat',
		528 => 'Swoobat',
		529 => 'Drilbur',
		530 => 'Excadrill',
		531 => 'Audino',
		532 => 'Timburr',
		533 => 'Gurdurr',
		534 => 'Conkeldurr',
		535 => 'Tympole',
		536 => 'Palpitoad',
		537 => 'Seismitoad',
		538 => 'Throh',
		539 => 'Sawk',
		540 => 'Sewaddle',
		541 => 'Swadloon',
		542 => 'Leavanny',
		543 => 'Venipede',
		544 => 'Whirlipede',
		545 => 'Scolipede',
		546 => 'Cottonee',
		547 => 'Whimsicott',
		548 => 'Petilil',
		549 => 'Lilligant',
		550 => 'Basculin',
		551 => 'Sandile',
		552 => 'Krokorok',
		553 => 'Krookodile',
		554 => 'Darumaka',
		555 => 'Darmanitan',
		556 => 'Maractus',
		557 => 'Dwebble',
		558 => 'Crustle',
		559 => 'Scraggy',
		560 => 'Scrafty',
		561 => 'Sigilyph',
		562 => 'Yamask',
		563 => 'Cofagrigus',
		564 => 'Tirtouga',
		565 => 'Carracosta',
		566 => 'Archen',
		567 => 'Archeops',
		568 => 'Trubbish',
		569 => 'Garbodor',
		570 => 'Zorua',
		571 => 'Zoroark',
		572 => 'Minccino',
		573 => 'Cinccino',
		574 => 'Gothita',
		575 => 'Gothorita',
		576 => 'Gothitelle',
		577 => 'Solosis',
		578 => 'Duosion',
		579 => 'Reuniclus',
		580 => 'Ducklett',
		581 => 'Swanna',
		582 => 'Vanillite',
		583 => 'Vanillish',
		584 => 'Vanilluxe',
		585 => 'Deerling',
		586 => 'Sawsbuck',
		587 => 'Emolga',
		588 => 'Karrablast',
		589 => 'Escavalier',
		590 => 'Foongus',
		591 => 'Amoonguss',
		592 => 'Frillish',
		593 => 'Jellicent',
		594 => 'Alomomola',
		595 => 'Joltik',
		596 => 'Galvantula',
		597 => 'Ferroseed',
		598 => 'Ferrothorn',
		599 => 'Klink',
		600 => 'Klang',
		601 => 'Klinklang',
		602 => 'Tynamo',
		603 => 'Eelektrik',
		604 => 'Eelektross',
		605 => 'Elgyem',
		606 => 'Beheeyem',
		607 => 'Litwick',
		608 => 'Lampent',
		609 => 'Chandelure',
		610 => 'Axew',
		611 => 'Fraxure',
		612 => 'Haxorus',
		613 => 'Cubchoo',
		614 => 'Beartic',
		615 => 'Cryogonal',
		616 => 'Shelmet',
		617 => 'Accelgor',
		618 => 'Stunfisk',
		619 => 'Mienfoo',
		620 => 'Mienshao',
		621 => 'Druddigon',
		622 => 'Golett',
		623 => 'Golurk',
		624 => 'Pawniard',
		625 => 'Bisharp',
		626 => 'Bouffalant',
		627 => 'Rufflet',
		628 => 'Braviary',
		629 => 'Vullaby',
		630 => 'Mandibuzz ',
		631 => 'Heatmor',
		632 => 'Durant',
		633 => 'Deino',
		634 => 'Zweilous',
		635 => 'Hydreigon',
		636 => 'Larvesta',
		637 => 'Volcarona',
		638 => 'Cobalion',
		639 => 'Terrakion',
		640 => 'Virizion',
		641 => 'Tornadus',
		642 => 'Thundurus',
		643 => 'Reshiram',
		644 => 'Zekrom ',
		645 => 'Landorus',
		646 => 'Kyurem',
		647 => 'Keldeo',
		648 => 'Meloetta',
		649 => 'Genesect',
		650 => 'Chespin',
		651 => 'Quilladin',
		652 => 'Chesnaught',
		653 => 'Fennekin',
		654 => 'Braixen',
		655 => 'Delphox',
		656 => 'Froakie',
		657 => 'Frogadier',
		658 => 'Greninja',
		659 => 'Bunnelby',
		660 => 'Diggersby',
		661 => 'Fletchling',
		662 => 'Fletchinder',
		663 => 'Talonflame',
		664 => 'Scatterbug',
		665 => 'Spewpa',
		666 => 'Vivillon',
		667 => 'Litleo',
		668 => 'Pyroar',
		669 => 'Flabébé',
		670 => 'Floette',
		671 => 'Florges',
		672 => 'Skiddo',
		673 => 'Gogoat',
		674 => 'Pancham',
		675 => 'Pangoro',
		676 => 'Furfrou',
		677 => 'Espurr',
		678 => 'Meowstic',
		679 => 'Honedge',
		680 => 'Doublade',
		681 => 'Aegislash',
		682 => 'Spritzee',
		683 => 'Aromatisse',
		684 => 'Swirlix',
		685 => 'Slurpuff',
		686 => 'Inkay',
		687 => 'Malamar',
		688 => 'Binacle',
		689 => 'Barbaracle',
		690 => 'Skrelp',
		691 => 'Dragalge',
		692 => 'Clauncher',
		693 => 'Clawitzer',
		694 => 'Helioptile',
		695 => 'Heliolisk',
		696 => 'Tyrunt',
		697 => 'Tyrantrum',
		698 => 'Amaura',
		699 => 'Aurorus',
		700 => 'Sylveon',
		701 => 'Hawlucha',
		702 => 'Dedenne',
		703 => 'Carbink',
		704 => 'Goomy',
		705 => 'Sliggoo',
		706 => 'Goodra',
		707 => 'Klefki',
		708 => 'Phantump',
		709 => 'Trevenant',
		710 => 'Pumpkaboo',
		711 => 'Gourgeist',
		712 => 'Bergmite',
		713 => 'Avalugg',
		714 => 'Noibat',
		715 => 'Noivern',
		716 => 'Xerneas',
		717 => 'Yveltal',
		718 => 'Zygarde',
		719 => 'Diancie',
		720 => 'Hoopa',
		721 => 'Volcanion'
		);
	
	// Encryption Data
	public function getEncryptionKey($entity){                       return unpack('V1out',substr($entity->file->bin,0x00,4))['out']; }
	public function getPlaceholder($entity){                         return unpack('v1out',substr($entity->file->bin,0x04,2))['out']; }
	public function getChecksum($entity){                            return unpack('v1out',substr($entity->file->bin,0x06,2))['out']; }
	// Block A
	public function getDexId($entity){                               return unpack('v1out',substr($entity->file->bin,0x08,2))['out']; }
	public function getHeldItem($entity){                            return unpack('v1out',substr($entity->file->bin,0x0A,2))['out']; }
	public function getOriginalTrainerId($entity){                   return unpack('v1out',substr($entity->file->bin,0x0C,2))['out']; }
	public function getOriginalTrainerSecretId($entity){             return unpack('v1out',substr($entity->file->bin,0x0E,2))['out']; }
	public function getOriginalTrainerIds($entity){                  return array($entity->getOriginalTrainerID(), $entity->getOriginalTrainerSecretID()); }
	public function getExperience($entity){                          return unpack('V1out',substr($entity->file->bin,0x10,4))['out']; }
	public function getAbility($entity){                             return unpack('C1out',substr($entity->file->bin,0x14,1))['out']; }
	public function getAbilityNumber($entity){                       return unpack('C1out',substr($entity->file->bin,0x15,1))['out']; }
	public function getTrainingBag($entity){                         return unpack('C1out',substr($entity->file->bin,0x16,1))['out']; }
	public function getTrainingBagHitsRemaining($entity){            return unpack('C1out',substr($entity->file->bin,0x17,1))['out']; }
	public function getPersonality($entity){                         return unpack('V1out',substr($entity->file->bin,0x18,4))['out']; }
	public function getNature($entity){                              return unpack('C1out',substr($entity->file->bin,0x1C,1))['out']; }
	public function getFormsFlags($entity){                          return unpack('C1out',substr($entity->file->bin,0x1D,1))['out']; }
	public function getFatefulEncounter($entity){                    return $entity->getFormsFlags() & self::FATEFUL_FLAG; }
	public function getFemale($entity){                              return $entity->getFormsFlags() & self::FEMALE_FLAG; }
	public function getGenderless($entity){                          return $entity->getFormsFlags() & self::GENDERLESS_FLAG; }
	public function getForm($entity){                                return ($entity->getFormsFlags() & ( ~ ( self::FEMALE_FLAG & self::FATEFUL_FLAG & self::GENDERLESS_FLAG ) ) >> 0x3); }
	public function getGenderMarker($entity){                        return ($entity->getGenderless() ? 'U' : ($entity->getFemale() ? 'F' : 'M')); }
	public function getHPEffortValue($entity){                       return unpack('C1out',substr($entity->file->bin,0x1E,1))['out']; }
	public function getAttackEffortValue($entity){                   return unpack('C1out',substr($entity->file->bin,0x1F,1))['out']; }
	public function getDefenseEffortValue($entity){                  return unpack('C1out',substr($entity->file->bin,0x20,1))['out']; }
	public function getSpeedEffortValue($entity){                    return unpack('C1out',substr($entity->file->bin,0x21,1))['out']; }
	public function getSpecialAttackEffortValue($entity){            return unpack('C1out',substr($entity->file->bin,0x22,1))['out']; }
	public function getSpecialDefenseEffortValue($entity){           return unpack('C1out',substr($entity->file->bin,0x23,1))['out']; }
	public function getContestStatsCool($entity){                    return unpack('C1out',substr($entity->file->bin,0x24,1))['out']; }
	public function getContestStatsBeauty($entity){                  return unpack('C1out',substr($entity->file->bin,0x25,1))['out']; }
	public function getContestStatsCute($entity){                    return unpack('C1out',substr($entity->file->bin,0x26,1))['out']; }
	public function getContestStatsSmart($entity){                   return unpack('C1out',substr($entity->file->bin,0x27,1))['out']; }
	public function getContestStatsTough($entity){                   return unpack('C1out',substr($entity->file->bin,0x28,1))['out']; }
	public function getContestStatsSheen($entity){                   return unpack('C1out',substr($entity->file->bin,0x29,1))['out']; }
	public function getMarkings($entity){                            return unpack('C1out',substr($entity->file->bin,0x2A,1))['out']; }
	public function getPokerus($entity){                             return unpack('C1out',substr($entity->file->bin,0x2B,1))['out']; }
	public function getSuperTrainingFlags($entity){                  return unpack('V1out',substr($entity->file->bin,0x2C,4))['out']; }
	public function getRibbons($entity){                             return                substr($entity->file->bin,0x30,6); }
	public function getContestMemoryRibbonCount($entity){            return unpack('C1out',substr($entity->file->bin,0x38,1))['out']; }
	public function getBattleMemoryRibbonCount($entity){             return unpack('C1out',substr($entity->file->bin,0x39,1))['out']; }
	public function getDistributionTrainingFlags($entity){           return unpack('C1out',substr($entity->file->bin,0x3A,1))['out']; }
	// Block B
	public function getNickname($entity){                            return mb_convert_encoding(mb_strstr(substr($entity->file->bin,0x40,26),mb_convert_encoding("\0", "UTF-16LE"),true,"UTF-16LE"),"UTF-8", "UTF-16LE"); }
	public function getMove1($entity){                               return unpack('v1out',substr($entity->file->bin,0x5A,2))['out']; }
	public function getMove2($entity){                               return unpack('v1out',substr($entity->file->bin,0x5C,2))['out']; }
	public function getMove3($entity){                               return unpack('v1out',substr($entity->file->bin,0x5E,2))['out']; }
	public function getMove4($entity){                               return unpack('v1out',substr($entity->file->bin,0x60,2))['out']; }
	public function getMove1PP($entity){                             return unpack('C1out',substr($entity->file->bin,0x62,1))['out']; }
	public function getMove2PP($entity){                             return unpack('C1out',substr($entity->file->bin,0x63,1))['out']; }
	public function getMove3PP($entity){                             return unpack('C1out',substr($entity->file->bin,0x64,1))['out']; }
	public function getMove4PP($entity){                             return unpack('C1out',substr($entity->file->bin,0x65,1))['out']; }
	public function getMove1PPUp($entity){                           return unpack('C1out',substr($entity->file->bin,0x66,1))['out']; }
	public function getMove2PPUp($entity){                           return unpack('C1out',substr($entity->file->bin,0x67,1))['out']; }
	public function getMove3PPUp($entity){                           return unpack('C1out',substr($entity->file->bin,0x68,1))['out']; }
	public function getMove4PPUp($entity){                           return unpack('C1out',substr($entity->file->bin,0x69,1))['out']; }
	public function getRelearnMove1($entity){                        return unpack('v1out',substr($entity->file->bin,0x6A,2))['out']; }
	public function getRelearnMove2($entity){                        return unpack('v1out',substr($entity->file->bin,0x6C,2))['out']; }
	public function getRelearnMove3($entity){                        return unpack('v1out',substr($entity->file->bin,0x6E,2))['out']; }
	public function getRelearnMove4($entity){                        return unpack('v1out',substr($entity->file->bin,0x70,2))['out']; }
	public function getSuperSecretTrainingFlag($entity){             return unpack('C1out',substr($entity->file->bin,0x72,1))['out']; }
	public function getIndividualValueSpread($entity){               return unpack('V1out',substr($entity->file->bin,0x74,4))['out']; }
	public function getHPIndividualValue($entity){                   return ($entity->getIndividualValueSpread()>>0) & 31; }
	public function getAttackIndividualValue($entity){               return ($entity->getIndividualValueSpread()>>5) & 31; }
	public function getDefenseIndividualValue($entity){              return ($entity->getIndividualValueSpread()>>10) & 31; }
	public function getSpeedIndividualValue($entity){                return ($entity->getIndividualValueSpread()>>15) & 31; }
	public function getSpecialAttackIndividualValue($entity){        return ($entity->getIndividualValueSpread()>>20) & 31; }
	public function getSpecialDefenseIndividualValue($entity){       return ($entity->getIndividualValueSpread()>>25) & 31; }
	public function getIsEgg($entity){                               return ($entity->getIndividualValueSpread()>>30) & 1; }
	public function getIsNicknamed($entity){                         return ($entity->getIndividualValueSpread()>>31) & 1; }
	// Block C
	public function getCurrentTrainerName($entity){                  return mb_convert_encoding(mb_strstr(substr($entity->file->bin,0x78,26),mb_convert_encoding("\0", "UTF-16LE"),true,"UTF-16LE"),"UTF-8", "UTF-16LE"); }
	public function getCurrentTrainerIsFemale($entity){              return unpack('C1out',substr($entity->file->bin,0x92,1))['out']; }
	public function getCurrentTrainerIsNotOriginalTrainer($entity){  return unpack('C1out',substr($entity->file->bin,0x93,1))['out']; }
	public function getGeolocation1($entity){                        return unpack('v1out',substr($entity->file->bin,0x94,2))['out']; }
	public function getGeolocation2($entity){                        return unpack('v1out',substr($entity->file->bin,0x96,2))['out']; }
	public function getGeolocation3($entity){                        return unpack('v1out',substr($entity->file->bin,0x98,2))['out']; }
	public function getGeolocation4($entity){                        return unpack('v1out',substr($entity->file->bin,0x9A,2))['out']; }
	public function getGeolocation5($entity){                        return unpack('v1out',substr($entity->file->bin,0x9C,2))['out']; }
	public function getCurrentTrainerFriendship($entity){            return unpack('C1out',substr($entity->file->bin,0xA2,1))['out']; }
	public function getCurrentTrainerAffection($entity){             return unpack('C1out',substr($entity->file->bin,0xA3,1))['out']; }
	public function getCurrentTrainerMemoryIntensity($entity){       return unpack('C1out',substr($entity->file->bin,0xA4,1))['out']; }
	public function getCurrentTrainerMemoryLine($entity){            return unpack('C1out',substr($entity->file->bin,0xA5,1))['out']; }
	public function getCurrentTrainerMemoryFeeling($entity){         return unpack('C1out',substr($entity->file->bin,0xA6,1))['out']; }
	public function getCurrentTrainerMemoryTextVar($entity){         return unpack('v1out',substr($entity->file->bin,0xA8,2))['out']; }
	public function getFullness($entity){                            return unpack('C1out',substr($entity->file->bin,0xAE,1))['out']; }
	public function getEnjoyment($entity){                           return unpack('C1out',substr($entity->file->bin,0xAF,1))['out']; }
	// Block D
	public function getOriginalTrainerName($entity){                 return mb_convert_encoding(mb_strstr(substr($entity->file->bin,0xB0,26),mb_convert_encoding("\0", "UTF-16LE"),true,"UTF-16LE"),"UTF-8", "UTF-16LE"); }
	public function getOriginalTrainerFriendship($entity){           return unpack('C1out',substr($entity->file->bin,0xCA,1))['out']; }
	public function getOriginalTrainerAffection($entity){            return unpack('C1out',substr($entity->file->bin,0xCB,1))['out']; }
	public function getOriginalTrainerMemoryIntensity($entity){      return unpack('C1out',substr($entity->file->bin,0xCC,1))['out']; }
	public function getOriginalTrainerMemoryLine($entity){           return unpack('C1out',substr($entity->file->bin,0xCD,1))['out']; }
	public function getOriginalTrainerMemoryTextVar($entity){        return unpack('v1out',substr($entity->file->bin,0xCE,2))['out']; }
	public function getOriginalTrainerMemoryFeeling($entity){        return unpack('C1out',substr($entity->file->bin,0xD0,1))['out']; }
	public function getDateEggRecieved($entity){                     $date = unpack('C1year/C1month/C1day',substr($entity->file->bin,0xD1,3)); return \DateTime::createFromFormat("y-m-d H:M:S","$date[year]-$date[month]-$date[day] 00:00:00", new \DateTimeZone("UTC"));}
	public function getDateMet($entity){                             $date = unpack('C1year/C1month/C1day',substr($entity->file->bin,0xD4,3)); return \DateTime::createFromFormat("y-m-d H:M:S","$date[year]-$date[month]-$date[day] 00:00:00", new \DateTimeZone("UTC"));}
	public function getEggLocation($entity){                         return unpack('v1out',substr($entity->file->bin,0xD8,2))['out']; }
	public function getMetAtLocation($entity){                       return unpack('v1out',substr($entity->file->bin,0xDA,2))['out']; }
	public function getPokeball($entity){                            return unpack('C1out',substr($entity->file->bin,0xDC,1))['out']; }
	public function getEncounterLevelOriginalTrainerGender($entity){ return unpack('C1out',substr($entity->file->bin,0xDD,1))['out']; }
	public function getEncounterLevel($entity){                      return $entity->getEncounterLevelOriginalTrainerGender() & 127; }
	public function getOriginalTrainerIsFemale($entity){             return $entity->getEncounterLevelOriginalTrainerGender() & 128; }
	public function getEncounterType($entity){                       return unpack('C1out',substr($entity->file->bin,0xDE,1))['out']; }
	public function getOriginalTrainerGameId($entity){               return unpack('C1out',substr($entity->file->bin,0xDF,1))['out']; }
	public function getCountryId($entity){                           return unpack('C1out',substr($entity->file->bin,0xE0,1))['out']; }
	public function getRegionId($entity){                            return unpack('C1out',substr($entity->file->bin,0xE1,1))['out']; }
	public function get3DSRegionId($entity){                         return unpack('C1out',substr($entity->file->bin,0xE2,1))['out']; }
	public function getOriginalTrainerLanguageId($entity){           return unpack('C1out',substr($entity->file->bin,0xE3,1))['out']; }
	

	public $validates = array(
		'fileSize' => array(
			array(
				'inList',
				'message' => 'Unrecognized file size.',
				'required' => true,
				'list' => array(
					232, // Box Data
					260  // Party Data
					)
				)
			),
		'checksumValidates' => array(
				array('boolean'),
				array(
					'inList',
					'message' => 'Invalid Checksum.  Try another file.',
					'required' => true,
					'list' => array( true )
				)
			)
		);
	protected $_schema = array(
		'_id'                                => array('type' => 'id'),
		'file'                               => array('type' => 'binary',  'default' => null, 'null' => false),
		'fileSize'                           => array('type' => 'integer', 'default' => null, 'null' => false),
		'dexId'                              => array('type' => 'integer', 'null' => true),
		'heldItem'                           => array('type' => 'integer', 'null' => true),
		'originalTrainerId'                  => array('type' => 'integer', 'null' => true),
		'originalTrainerSecretId'            => array('type' => 'integer', 'null' => true),
		'experience'                         => array('type' => 'integer', 'null' => true),
		'ability'                            => array('type' => 'integer', 'null' => true),
		'abilityNumber'                      => array('type' => 'integer', 'null' => true),
		'trainingBag'                        => array('type' => 'integer', 'null' => true),
		'trainingBagHitsRemaining'           => array('type' => 'integer', 'null' => true),
		'personality'                        => array('type' => 'integer', 'null' => true),
		'nature'                             => array('type' => 'integer', 'null' => true),
		'fatefulEncounter'                   => array('type' => 'integer', 'null' => true),
		'form'                               => array('type' => 'integer', 'null' => true),
		'female'                             => array('type' => 'boolean', 'null' => true),
		'genderless'                         => array('type' => 'boolean', 'null' => true),
		'HPEffortValue'                      => array('type' => 'integer', 'null' => true),
		'AttackEffortValue'                  => array('type' => 'integer', 'null' => true),
		'DefenseEffortValue'                 => array('type' => 'integer', 'null' => true),
		'SpeedEffortValue'                   => array('type' => 'integer', 'null' => true),
		'SpecialAttackEffortValue'           => array('type' => 'integer', 'null' => true),
		'SpecialDefenseEffortValue'          => array('type' => 'integer', 'null' => true),
		'contestStatsCool'                   => array('type' => 'integer', 'null' => true),
		'contestStatsBeauty'                 => array('type' => 'integer', 'null' => true),
		'contestStatsCute'                   => array('type' => 'integer', 'null' => true),
		'contestStatsSmart'                  => array('type' => 'integer', 'null' => true),
		'contestStatsTough'                  => array('type' => 'integer', 'null' => true),
		'contestStatsSheen'                  => array('type' => 'integer', 'null' => true),
		'markings'                           => array('type' => 'integer', 'null' => true),
		'pokerus'                            => array('type' => 'integer', 'null' => true),
		'superTrainingFlags'                 => array('type' => 'integer', 'null' => true),
		'ribbons'                            => array('type' => 'string',  'null' => true),
		'contestMemoryRibbonCount'           => array('type' => 'integer', 'null' => true),
		'battleMemoryRibbonCount'            => array('type' => 'integer', 'null' => true),
		'distributionTrainingFlags'          => array('type' => 'integer', 'null' => true),
		'nickname'                           => array('type' => 'string',  'null' => true),
		'move1'                              => array('type' => 'integer', 'null' => true),
		'move2'                              => array('type' => 'integer', 'null' => true),
		'move3'                              => array('type' => 'integer', 'null' => true),
		'move4'                              => array('type' => 'integer', 'null' => true),
		'move1PP'                            => array('type' => 'integer', 'null' => true),
		'move2PP'                            => array('type' => 'integer', 'null' => true),
		'move3PP'                            => array('type' => 'integer', 'null' => true),
		'move4PP'                            => array('type' => 'integer', 'null' => true),
		'move1PPUp'                          => array('type' => 'integer', 'null' => true),
		'move2PPUp'                          => array('type' => 'integer', 'null' => true),
		'move3PPUp'                          => array('type' => 'integer', 'null' => true),
		'move4PPUp'                          => array('type' => 'integer', 'null' => true),
		'relearnMove1'                       => array('type' => 'integer', 'null' => true),
		'relearnMove2'                       => array('type' => 'integer', 'null' => true),
		'relearnMove3'                       => array('type' => 'integer', 'null' => true),
		'relearnMove4'                       => array('type' => 'integer', 'null' => true),
		'superSecretTrainingFlag'            => array('type' => 'integer', 'null' => true),
		'hpIndividualValue'                  => array('type' => 'integer', 'null' => true),
		'attackIndividualValue'              => array('type' => 'integer', 'null' => true),
		'defenseIndividualValue'             => array('type' => 'integer', 'null' => true),
		'speedIndividualValue'               => array('type' => 'integer', 'null' => true),
		'specialAttackIndividualValue'       => array('type' => 'integer', 'null' => true),
		'specialDefenseIndividualValue'      => array('type' => 'integer', 'null' => true),
		'isEgg'                              => array('type' => 'boolean', 'null' => true),
		'isNicknamed'                        => array('type' => 'boolean', 'null' => true),
		'currentTrainerName'                 => array('type' => 'string',  'null' => true),
		'currentTrainerIsFemale'             => array('type' => 'boolean', 'null' => true),
		'geolocation1'                       => array('type' => 'integer', 'null' => true),
		'geolocation2'                       => array('type' => 'integer', 'null' => true),
		'geolocation3'                       => array('type' => 'integer', 'null' => true),
		'geolocation4'                       => array('type' => 'integer', 'null' => true),
		'geolocation5'                       => array('type' => 'integer', 'null' => true),
		'currentTrainerFriendship'           => array('type' => 'integer', 'null' => true),
		'currentTrainerAffection'            => array('type' => 'integer', 'null' => true),
		'currentTrainerIsNotOriginalTrainer' => array('type' => 'boolean', 'null' => true),
		'currentTrainerMemoryIntensity'      => array('type' => 'integer', 'null' => true),
		'currentTrainerMemoryLine'           => array('type' => 'integer', 'null' => true),
		'currentTrainerMemoryFeeling'        => array('type' => 'integer', 'null' => true),
		'currentTrainerMemoryTextVar'        => array('type' => 'integer', 'null' => true),
		'fullness'                           => array('type' => 'integer', 'null' => true),
		'enjoyment'                          => array('type' => 'integer', 'null' => true),
		'originalTrainerName'                => array('type' => 'string',  'null' => true),
		'originalTrainerFriendship'          => array('type' => 'integer', 'null' => true),
		'originalTrainerAffection'           => array('type' => 'integer', 'null' => true),
		'originalTrainerMemoryIntensity'     => array('type' => 'integer', 'null' => true),
		'originalTrainerMemoryLine'          => array('type' => 'integer', 'null' => true),
		'originalTrainerMemoryTextVar'       => array('type' => 'integer', 'null' => true),
		'originalTrainerMemoryFeeling'       => array('type' => 'integer', 'null' => true),
		'dateEggRecieved'                    => array('type' => 'date',    'null' => true),
		'dateMet'                            => array('type' => 'date',    'null' => true),
		'eggLocation'                        => array('type' => 'integer', 'null' => true),
		'metAtLocation'                      => array('type' => 'integer', 'null' => true),
		'pokeball'                           => array('type' => 'integer', 'null' => true),
		'encounterLevel'                     => array('type' => 'integer', 'null' => true),
		'originalTrainerIsFemale'            => array('type' => 'boolean', 'null' => true),
		'encounterType'                      => array('type' => 'integer', 'null' => true),
		'originalTrainerGameId'              => array('type' => 'integer', 'null' => true),
		'countryId'                          => array('type' => 'integer', 'null' => true),
		'regionId'                           => array('type' => 'integer', 'null' => true),
		'3dsRegionId'                        => array('type' => 'integer', 'null' => true),
		'originalTrainerLanguageId'          => array('type' => 'integer', 'null' => true)
		);
		
	public function validateChecksum($entity)
	{
		return (array_sum(unpack("v*",substr($entity->file->bin,0x08,224))) % 65536) === $entity->getChecksum();
	}
	public function cachePokemonData($entity)
	{
		$entity->dexId                              = $entity->getDexId();
		$entity->heldItem                           = $entity->getHeldItem();
		$entity->originalTrainerId                  = $entity->getOriginalTrainerId();
		$entity->originalTrainerSecretId            = $entity->getOriginalTrainerSecretId();
		$entity->experience                         = $entity->getExperience();
		$entity->ability                            = $entity->getAbility();
		$entity->abilityNumber                      = $entity->getAbilityNumber();
		$entity->trainingBag                        = $entity->getTrainingBag();
		$entity->trainingBagHitsRemaining           = $entity->getTrainingBagHitsRemaining();
		$entity->personality                        = $entity->getPersonality();
		$entity->nature                             = $entity->getNature();
		$entity->fatefulEncounter                   = $entity->getFatefulEncounter();
		$entity->form                               = $entity->getForm();
		$entity->female                             = $entity->getFemale();
		$entity->genderless                         = $entity->getGenderless();
		$entity->HPEffortValue                      = $entity->getHPEffortValue();
		$entity->AttackEffortValue                  = $entity->getAttackEffortValue();
		$entity->DefenseEffortValue                 = $entity->getDefenseEffortValue();
		$entity->SpeedEffortValue                   = $entity->getSpeedEffortValue();
		$entity->SpecialAttackEffortValue           = $entity->getSpecialAttackEffortValue();
		$entity->SpecialDefenseEffortValue          = $entity->getSpecialDefenseEffortValue();
		$entity->contestStatsCool                   = $entity->getContestStatsCool();
		$entity->contestStatsBeauty                 = $entity->getContestStatsBeauty();
		$entity->contestStatsCute                   = $entity->getContestStatsCute();
		$entity->contestStatsSmart                  = $entity->getContestStatsSmart();
		$entity->contestStatsTough                  = $entity->getContestStatsTough();
		$entity->contestStatsSheen                  = $entity->getContestStatsSheen();
		$entity->markings                           = $entity->getMarkings();
		$entity->pokerus                            = $entity->getPokerus();
		$entity->superTrainingFlags                 = $entity->getSuperTrainingFlags();
		$entity->ribbons                            = $entity->getRibbons();
		$entity->contestMemoryRibbonCount           = $entity->getContestMemoryRibbonCount();
		$entity->battleMemoryRibbonCount            = $entity->getBattleMemoryRibbonCount();
		$entity->distributionTrainingFlags          = $entity->getDistributionTrainingFlags();
		$entity->nickname                           = $entity->getNickname();
		$entity->move1                              = $entity->getMove1();
		$entity->move2                              = $entity->getMove2();
		$entity->move3                              = $entity->getMove3();
		$entity->move4                              = $entity->getMove4();
		$entity->move1PP                            = $entity->getMove1PP();
		$entity->move2PP                            = $entity->getMove2PP();
		$entity->move3PP                            = $entity->getMove3PP();
		$entity->move4PP                            = $entity->getMove4PP();
		$entity->move1PPUp                          = $entity->getMove1PPUp();
		$entity->move2PPUp                          = $entity->getMove2PPUp();
		$entity->move3PPUp                          = $entity->getMove3PPUp();
		$entity->move4PPUp                          = $entity->getMove4PPUp();
		$entity->relearnMove1                       = $entity->getRelearnMove1();
		$entity->relearnMove2                       = $entity->getRelearnMove2();
		$entity->relearnMove3                       = $entity->getRelearnMove3();
		$entity->relearnMove4                       = $entity->getRelearnMove4();
		$entity->superSecretTrainingFlag            = $entity->getSuperSecretTrainingFlag();
		$entity->hpIndividualValue                  = $entity->getHPIndividualValue();
		$entity->attackIndividualValue              = $entity->getAttackIndividualValue();
		$entity->defenseIndividualValue             = $entity->getDefenseIndividualValue();
		$entity->speedIndividualValue               = $entity->getSpeedIndividualValue();
		$entity->specialAttackIndividualValue       = $entity->getSpecialAttackIndividualValue();
		$entity->specialDefenseIndividualValue      = $entity->getSpecialDefenseIndividualValue();
		$entity->isEgg                              = $entity->getIsEgg();
		$entity->isNicknamed                        = $entity->getIsNicknamed();
		$entity->currentTrainerName                 = $entity->getCurrentTrainerName();
		$entity->currentTrainerIsFemale             = $entity->getCurrentTrainerIsFemale();
		$entity->geolocation1                       = $entity->getGeolocation1();
		$entity->geolocation2                       = $entity->getGeolocation2();
		$entity->geolocation3                       = $entity->getGeolocation3();
		$entity->geolocation4                       = $entity->getGeolocation4();
		$entity->geolocation5                       = $entity->getGeolocation5();
		$entity->currentTrainerFriendship           = $entity->getCurrentTrainerFriendship();
		$entity->currentTrainerAffection            = $entity->getCurrentTrainerAffection();
		$entity->currentTrainerIsNotOriginalTrainer = $entity->getCurrentTrainerIsNotOriginalTrainer();
		$entity->currentTrainerMemoryIntensity      = $entity->getCurrentTrainerMemoryIntensity();
		$entity->currentTrainerMemoryLine           = $entity->getCurrentTrainerMemoryLine();
		$entity->currentTrainerMemoryFeeling        = $entity->getCurrentTrainerMemoryFeeling();
		$entity->currentTrainerMemoryTextVar        = $entity->getCurrentTrainerMemoryTextVar();
		$entity->fullness                           = $entity->getFullness();
		$entity->enjoyment                          = $entity->getEnjoyment();
		$entity->originalTrainerName                = $entity->getOriginalTrainerName();
		$entity->originalTrainerFriendship          = $entity->getOriginalTrainerFriendship();
		$entity->originalTrainerAffection           = $entity->getOriginalTrainerAffection();
		$entity->originalTrainerMemoryIntensity     = $entity->getOriginalTrainerMemoryIntensity();
		$entity->originalTrainerMemoryLine          = $entity->getOriginalTrainerMemoryLine();
		$entity->originalTrainerMemoryTextVar       = $entity->getOriginalTrainerMemoryTextVar();
		$entity->originalTrainerMemoryFeeling       = $entity->getOriginalTrainerMemoryFeeling();
		$entity->dateEggRecieved                    = $entity->getDateEggRecieved();
		$entity->dateMet                            = $entity->getDateMet();
		$entity->eggLocation                        = $entity->getEggLocation();
		$entity->metAtLocation                      = $entity->getMetAtLocation();
		$entity->pokeball                           = $entity->getPokeball();
		$entity->encounterLevel                     = $entity->getEncounterLevel();
		$entity->originalTrainerIsFemale            = $entity->getOriginalTrainerIsFemale();
		$entity->encounterType                      = $entity->getEncounterType();
		$entity->originalTrainerGameId              = $entity->getOriginalTrainerGameId();
		$entity->countryId                          = $entity->getCountryId();
		$entity->regionId                           = $entity->getRegionId();
		$entity->threedsRegionId                    = $entity->get3DSRegionId();
		$entity->originalTrainerLanguageId          = $entity->getOriginalTrainerLanguageId();
	}
	public function getSpecies($entity)
	{
		return self::$dexToName[$entity->getDexId()];
	}
}