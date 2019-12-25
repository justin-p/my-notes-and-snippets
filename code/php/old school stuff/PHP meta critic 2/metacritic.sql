drop database if exists metacritic;
create database metacritic;
use metacritic;

create table developer (
  id INT unsigned not null auto_increment primary key,
  name VARCHAR(100) not null
);

create table publisher (
  id INT unsigned not null auto_increment primary key,
  name VARCHAR(100) not null
);

create table game (
  id INT unsigned not null auto_increment primary key,
  name VARCHAR(100) not null,
  platform VARCHAR(50) not null,
  released DATE,
  developer_id INT unsigned not null references developer(id),
  publisher_id INT unsigned not null references publisher(id)
);

create table website (
  id INT unsigned not null auto_increment primary key,
  name VARCHAR(50) not null,
  url VARCHAR(255)
);

create table review (
  id INT unsigned not null auto_increment primary key,
  grade INT unsigned not null,
  description TEXT,
  url VARCHAR(255),
  game_id INT unsigned not null references game(id),
  website_id INT unsigned not null references website(id)
);

insert into website(id, name, url) values (1, 'IGN', 'http://www.ign.com/');
insert into website(id, name, url) values (2, 'Eurogamer', 'http://www.eurogamer.net/');
insert into website(id, name, url) values (3, 'Game Informer', 

'http://gameinformer.com/');
insert into website(id, name, url) values (4, 'VideoGamer', 

'http://www.videogamer.com/');
insert into website(id, name, url) values (5, 'GameSpot', 'http://www.gamespot.com/');
insert into website(id, name, url) values (6, 'Absolute Games', 'http://www.ag.ru/');
insert into website(id, name, url) values (7, 'Vandal Online', 

'http://www.vandal.net/');
insert into website(id, name, url) values (8, 'GameShark', 'http://www.gameshark.com/');
insert into website(id, name, url) values (9, '1UP', 'http://www.1up.com/');

insert into publisher(id, name) values (1, 'Electronic Arts');
insert into publisher(id, name) values (2, 'Microsoft');
insert into publisher(id, name) values (3, 'Sony');
insert into publisher(id, name) values (4, 'Nintendo');
insert into publisher(id, name) values (5, 'Codemasters');

insert into developer(id, name) values (1, 'Level 5');
insert into developer(id, name) values (2, 'Blue Omega');
insert into developer(id, name) values (3, 'Media Molecule');
insert into developer(id, name) values (4, 'Number None');
insert into developer(id, name) values (5, 'BioWare');
insert into developer(id, name) values (6, 'Triumph Studios');

insert into game(id, name, platform, released, developer_id, publisher_id) values (1, 'Dragon Age: Origins', 'PC', '2009-11-03', 5, 1);
insert into game(id, name, platform, released, developer_id, publisher_id) values (2, 'Professor Layton and the Curious Village', 'Nintendo DS', '2008-08-11', 1, 4);
insert into game(id, name, platform, released, developer_id, publisher_id) values (3, 'Braid', 'Xbox 360', '2008-08-06', 4, 2);
insert into game(id, name, platform, released, developer_id, publisher_id) values (4, 'Damnation', 'Playstation 3', '2009-05-26', 2, 5);
insert into game(id, name, platform, released, developer_id, publisher_id) values (5, 'Mass Effect', 'Xbox 360', '2007-11-20', 5, 2);
insert into game(id, name, platform, released, developer_id, publisher_id) values (6, 'LittleBigPlanet', 'Playstation 3', '2008-10-28', 3, 3);
insert into game(id, name, platform, released, developer_id, publisher_id) values (7, 'Overlord', 'PC', '2007-06-26', 6, 5);

insert into review(game_id, grade, description, url, website_id) values (5, 80, "Where it doesn't quite hit the mark for me is in the action stakes. Although it underpins the game with all sorts of excellent ideas that ought to make it a deeper, more intelligent and immersive experience, the simple truth is that the minute-to-minute combat simply isn't as intense and involving as you'd expect from a game in 2007.", 'http://www.eurogamer.net/article.php?article_id=87875', 2);
insert into review(game_id, grade, description, url, website_id) values (6, 95, "LittleBigPlanet is already a milestone. Never before had a game have such a user content creation focus, nor had offered them such solid yet simple to use tools for achieving it. This risky Sony project has survived and surpassed the hype, becoming a very great game.", 'http://www.vandal.net/analisis/ps3/littlebigplanet/6692', 7);
insert into review(game_id, grade, description, url, website_id) values (4, 30, "This isn’t a premier blend of pulp fiction. It’s just a pulpy mess.", 'http://gameinformer.com/NR/exeres/D3984509-1ED7-4E97-914D-99D3FAA5C169.htm', 3);
insert into review(game_id, grade, description, url, website_id) values (1, 95, "Incredible storytelling, great characters, and exciting battles are just a few of the things that make this fantasy role-playing game so extraordinary.", 'http://www.gamespot.com/pc/rpg/dragonage/review.html', 5);
insert into review(game_id, grade, description, url, website_id) values (2, 80, "It’s not quite as powerful a game as some diehards might lead you to believe it is, and the cheating exploits are a little to obvious to ignore. But even so, Professor Layton is undeniably fun with a great style, and if the next game in the series is as challenging and addictive as his debut, bring it on.", 'http://ds.ign.com/articles/851/851856p1.html', 1);
insert into review(game_id, grade, description, url, website_id) values (5, 91, "Mass Effect is a gorgeous, thought-provoking adventure that is as captivating as action-packed. While it hasn't undergone the polish it deserves, that doesn't prevent it from emerging as one of the best examples of the artistry to be achieved in the development of a game.", 'http://www.gameshark.com/reviews/2832/Mass-Effect-Review.htm', 8);
insert into review(game_id, grade, description, url, website_id) values (1, 90, "RPG lovers shouldn't let escape this title that offers a strong story and an impressive conversational mode.", 'http://www.vandal.net/analisis/pc/dragon-age-origins/4096', 7);
insert into review(game_id, grade, description, url, website_id) values (7, 70, "Overlord is an entertaining game that should keep you smiling for its duration, but certain control complexities and a distinct lack of evil keep it from being a truly great next-gen adventure.", 'http://www.pro-g.co.uk/pc/overlord/review.html', 4);
insert into review(game_id, grade, description, url, website_id) values (6, 100, "Yes, it's the most charming game that I've ever played, and it's one of the most enjoyable. But the real beauty of LBP is even less tangible: creative empowerment at its finest and an unparalleled motivator to want to create.", 'http://www.1up.com/do/reviewPage?cId=3170945&p=37', 9);
insert into review(game_id, grade, description, url, website_id) values (5, 94, "The cinematic design is nothing short of masterful. This is a game that takes the aspects of film that make cinema so compelling and crosses it with the interactivity of games with unprecedented success. Linear storytelling feels quaint by comparison.", 'http://xbox360.ign.com/articles/833/833640p1.html', 1);
insert into review(game_id, grade, description, url, website_id) values (4, 38, "Summing up, the first game of the moviemakers of Blue Omega is not as good as they expected. They have to work hard to polish the errors committed in this game, which better argument is the Steampunk aesthetics so enjoyed in underground genres.", 'http://www.vandal.net/analisis/ps3/damnation/8515', 7);
insert into review(game_id, grade, description, url, website_id) values (4, 25, "The gameplay isn't fun, the levels are too long, the sound is bad, and the story isn't interesting. There are more problems, but I'll leave my written flogging at that. Avoid this game at all costs.", 'http://ps3.ign.com/articles/988/988063p1.html', 1);
insert into review(game_id, grade, description, url, website_id) values (1, 80, "Its role-playing is superb, but not revolutionary. It is a fantasy RPG so obviously crafted for the PC that it seems pointless to consider playing it on an alternative platform. It is an experience as compelling as it is archaic.", 'http://www.videogamer.com/pc/dragon_age/review.html', 4);
insert into review(game_id, grade, description, url, website_id) values (1, 90, "In addition to capturing the joy of battle, Dragon Age also provides an engrossing backdrop for the action. Even more than Mass Effect, the nation of Ferelden feels like a fully realized setting with its own history, conflicts, and power groups. This is one of the main reasons the game is so addicting; completing quests isn’t just about grinding experience and amassing loot – it actually feels like you have an impact on the world.", 'http://gameinformer.com/games/dragon_age_origins/b/pc/archive/2009/10/05/review.aspx', 3);
insert into review(game_id, grade, description, url, website_id) values (2, 100, "One of the finest debuts of a new IP in some time and does an incredible job of combining two areas the DS seems to have been made for: puzzles and adventure gaming. The addictive gameplay, twisting story, charming characters and beautifully drawn animation makes this a game that neither puzzle fans, nor adventure game fans should miss.", 'http://www.gameshark.com/reviews/2924/Professor-Layton-and-the-Curious-Village-Review.htm', 8);
insert into review(game_id, grade, description, url, website_id) values (3, 95, "A moving story, serene visuals, and brilliant puzzles make Braid an adventure that you absolutely should experience.", 'http://www.gamespot.com/xbox360/action/braid/review.html', 8);
insert into review(game_id, grade, description, url, website_id) values (2, 90, "This is utter loveliness, embodying everything the DS has come to mean to me. Puzzles, high spirits, and an embracing of beautiful 2D artwork over complicated 3D fuss.", 'http://www.eurogamer.net/article.php?article_id=92943', 2);
insert into review(game_id, grade, description, url, website_id) values (5, 90, "I suppose the brilliance is that, however many times I watched a scene or fought a battle, Mass Effect never truly lost its magic.", 'http://www.1up.com/do/reviewPage?cId=3164453', 9);
insert into review(game_id, grade, description, url, website_id) values (7, 80, "The evil, yet light-hearted, humor and richly detailed world combine for a game that is worth diving into.", 'http://pc.ign.com/articles/802/802246p1.html', 1);
insert into review(game_id, grade, description, url, website_id) values (3, 100, "Excellent but intellectually limited as a puzzle-platformer, Braid is made truly divine with emotional depth and a bittersweet humanity -- a monumentally relevant game that speaks highly of its creators and their potential audience's tolerance for new ideas. To say nothing of an absolutely brilliant, emotionally devastating 'ending' that proves that time isn't really that malleable after all.", 'http://www.1up.com/do/reviewPage?cId=3169204&p=4', 9);
insert into review(game_id, grade, description, url, website_id) values (7, 80, "More than the script (generally witty and sharp, if occasionally undercut by an iffy voice-actor) or the graphic design (a brother to Fable's faux-fantasy charm), the constant capering of your charges is what gives the game its personality. That is, they have a lot of personality and so does the game.", 'http://www.eurogamer.net/article.php?article_id=78212', 2);
insert into review(game_id, grade, description, url, website_id) values (1, 100, "Ultimately, Dragon Age: Origins is quite possibly the best game ever to come out of Bioware.", 'http://www.gameshark.com/reviews/3404/Dragon-Age-Origins-Review.htm', 8);
insert into review(game_id, grade, description, url, website_id) values (3, 88, "Imaginative, innovative, and engrossing, Braid is a spectacular achievement. If only the experience lasted a little longer and there weren't as many puzzles with singular solutions.", 'http://xboxlive.ign.com/articles/896/896371p1.html', 1);
insert into review(game_id, grade, description, url, website_id) values (2, 85, "And with a game this entertaining, that transcends demographics so stylishly, that offers such addictive just-one-more challenge -- well, the only real puzzle here is why anyone wouldn't want to give it a go.", 'http://www.1up.com/do/reviewPage?cId=3166174', 9);
insert into review(game_id, grade, description, url, website_id) values (3, 100, "Beautifully crafted and wonderfully realized, it is a shining example of the intersection between art and technology, love and loss, desire and despondence. It is, in one word, beautiful.", 'http://www.gameshark.com/reviews/3050/Braid-Review.htm', 8);
insert into review(game_id, grade, description, url, website_id) values (3, 90, "It's a game like nothing you've ever played before and something we can't recommend highly enough.", 'http://www.videogamer.com/xbox360/braid/review.html', 4);
insert into review(game_id, grade, description, url, website_id) values (1, 80, "In its desperation to infuse this setting with ""maturity"" - be it of the sober, political kind, or the game's painfully clumsy gore and sex - BioWare has forgotten the key ingredient of any fantasy: the fantastical. Without it, you're still left with a competent, often compelling, impressively detailed and immense RPG, but it's one that casts no spell.", 'http://www.eurogamer.net/articles/dragon-age-origins-review', 2);
insert into review(game_id, grade, description, url, website_id) values (7, 80, "Your flunkies also embody Overlord's one weak point: Loosen the iron grip, and they'll stupidly drown themselves chasing after a bug...or race headlong into overwhelming odds. Maybe the boneheaded A.I. is intentional; maybe they're supposed to be feral lemmings, and the game's forcing you to slow down for tactics -- but I ain't buying it.", 'http://www.1up.com/do/reviewPage?cId=3160587', 9);
insert into review(game_id, grade, description, url, website_id) values (5, 85, "It's surprising that so many small annoyances and glitches made their way into a game of such general high quality. Still, most players will be able to look past them and enjoy Mass Effect for what it is: A terrific role-playing game with great production values and fun, exciting action.", 'http://www.gamespot.com/xbox360/rpg/masseffect/review.html?sid=6183119', 5);
insert into review(game_id, grade, description, url, website_id) values (1, 100, "The folks at BioWare have shown that they're always looking for ways to make their games better -- each of their RPGs builds upon the previous title. Dragon Age displays this refinement, and while the story may not be completely original, it's told in a way that enthralls and enchants the player. It's the best RPG of the year -- and maybe the best of the HD era.", 'http://www.1up.com/do/reviewPage?cId=3176746&p=1', 9);
insert into review(game_id, grade, description, url, website_id) values (3, 100, "Braid is beautiful, entertaining and inspiring. It stretches both intellect and emotion, and these elements dovetail beautifully rather than chaffing against each other. Still wondering if games can be art? Here's your answer.", 'http://www.eurogamer.net/article.php?article_id=205102', 2);
insert into review(game_id, grade, description, url, website_id) values (4, 35, "This third-person shooter is a trip into hell.", 'http://www.gamespot.com/ps3/action/damnation/review.html', 5);
insert into review(game_id, grade, description, url, website_id) values (6, 90, "We're just happy to see a flagship game for a modern system that's about running from left to right and jumping over things. New ideas are great, great old ideas are better, and LittleBigPlanet has both: it's the future and the past of videogames, rolled into one.", 'http://www.eurogamer.net/article.php?article_id=259015', 2);
insert into review(game_id, grade, description, url, website_id) values (1, 90, "Incredibly deep and expansive, Dragon Age: Origins is one of those titles that can easily swallow up dozens of hours of play and keep you coming back for more.", 'http://pc.ign.com/articles/104/1041792p1.html', 1);
insert into review(game_id, grade, description, url, website_id) values (5, 98, "It's an adventure that is so captivating that you'll be counting the days for the sequel. It takes interactive storytelling to new heights, and brings the player closer to content than ever before. It's easily one of the year's best titles and one of the most impressive games to date.", 'http://gameinformer.com/NR/exeres/DAF818DF-1429-458B-9033-C5E4C5DF02C3.htm', 3);
insert into review(game_id, grade, description, url, website_id) values (2, 90, "Professor Layton and the Curious Village mixes an interesting story, challenging logic puzzles, and exploration into an extremely entertaining package that you won't want to put down.", 'http://www.gamespot.com/ds/puzzle/laytonkyoujunofushiginamachi/review.html?sid=6186070', 5);
insert into review(game_id, grade, description, url, website_id) values (6, 90, "LittleBigPlanet may well save the PS3 (if it indeed needs saving), it may be the most creative game of all time, it could well usher in a new era of user-generated gaming, and has a chance of bringing about a 2D platforming renaissance, but all those things are down to you. The game Media Molecule has created won't do these things alone, but if gamers create the levels we think they're capable of, we might be looking at one of the most important games this console generation has seen.", 'http://www.videogamer.com/ps3/little_big_planet/review.html', 4);
insert into review(game_id, grade, description, url, website_id) values (6, 95, "LittleBigPlanet is a gaming epiphany – one of the rare titles that opens new horizons on the landscape and changes the way you think about interactive entertainment.", 'http://gameinformer.com/NR/exeres/EFD79395-C3A1-46BF-92EF-0CA25F3488A3.htm', 3);
insert into review(game_id, grade, description, url, website_id) values (2, 90, "The story gets more mature with the solving of each puzzle, the puzzles themselves will have even the brainiest flummoxed and the art design is up there with anything, and I mean anything, on the console. It's the perfect DS game, it's the perfect puzzle game, it's what everyone should be playing on the tube instead of Brain Training, or some generic Sudoku clone.", 'http://www.videogamer.com/ds/professor_layton/review.html', 4);
insert into review(game_id, grade, description, url, website_id) values (6, 91, "Play. Create. Share. These three simple words make up developer Media Molecule’s little big blueprint for a charming and unique game that wonderfully brings out the creative side in people. Apparently there are already plans for a sequel, but I can’t imagine how the developers can possibly top this.", 'http://www.gameshark.com/reviews/3123/LittleBigPlanet-Review.htm', 8);
insert into review(game_id, grade, description, url, website_id) values (6, 95, "Media Molecule has created a brilliant platformer, and then given you the tools to recreate the whole thing over again, or better yet, to create your own ideas from scratch. It's not perfect - the controls could be tighter, automatically shifting between planes can be problematic, the editor isn't quite as robust as you might hope - but what's there is nothing short of astounding.", 'http://ps3.ign.com/articles/919/919111p1.html', 1);
insert into review(game_id, grade, description, url, website_id) values (1, 92, "You don’t need a thousand words to make you fall in love with Dragon Age: Origins. It has everything that is sought by the most jaded fans of the genre: at least 60 hours of adventuring, colorful, lively characters, flexible combat system, complex situations and quests, dialogues that are pleasant to read and even more pleasant to listen to… Dragon Age, like a good storyteller, captivates within minutes. It doesn’t rush the story, relishes in small details, goes into ornate lyrical digressions, and maintains the intrigue, keeping you at the edge of your seat.", 'http://www.ag.ru/reviews/dragon_age_origins', 6);
insert into review(game_id, grade, description, url, website_id) values (6, 90, "Little Big Planet is a novel, imaginative, and highly customisable platform game.", 'http://www.gamespot.com/ps3/action/littlebigplanet/review.html', 5);
insert into review(game_id, grade, description, url, website_id) values (2, 75, "What’s really frustrating about this game is that although the puzzles themselves are fun to figure out, all the big mysteries presented by the story are solved for you via cutscenes. The fact that you aren’t allowed to actually solve the questions that have been on your mind all game long is simply a mistake.", 'http://gameinformer.com/NR/exeres/A0E33D81-DCB6-45EC-B167-F45F6C3C8ACA.htm', 3);
insert into review(game_id, grade, description, url, website_id) values (7, 75, "The pure joy of commanding a small army of malicious minions more than makes up for Overlord's minor shortcomings.", 'http://www.gamespot.com/pc/action/overlord/review.html?sid=6173258', 5);
