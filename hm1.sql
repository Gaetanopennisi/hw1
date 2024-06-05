CREATE TABLE `panini` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descrizione` text NOT NULL,
  `immagine` varchar(255) NOT NULL,
  `tipologia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `panini` (`id`, `nome`, `descrizione`, `immagine`, `tipologia`) VALUES
(1, 'Cheeseburger', 'Ci sono due tipi di persone: chi ama il cheeseburger e chi ama il cheeseburger. Carne 100% bovina da allevamenti italiani, cipolla a dadini, ketchup, senape e formaggio per un gusto semplice e irresistibile.', 'img_hw1/cheeseburger--hero-isolated2.png', 'panini'),
(2, 'Chickenburger', 'A un prezzo così conveniente è davvero difficile rinunciare a tutta la bontà del Chickenburger. Lasciati tentare dal suo pollo croccante 100% italiano e dalla gustosissima salsa Caesar.', 'img_hw1/chickenburger--hero-isolated_02.png', 'panini'),
(3, 'Double Cheeseburger', 'Saranno i due hamburger di carne 100% bovina da allevamenti italiani che abbracciano il formaggio filante, sarà per la cipolla a cubetti, sarà il cetriolo, il ketchup e la senape… il Double Cheeseburger è il Grande Classico che non vi stancherà mai.', 'img_hw1/double-cheeseburger--isolated2.png', 'panini'),
(4, 'Double Chicken BBQ', 'Un must per tutti gli amanti del pollo. Due croccanti fette di pollo impanato fanno da base per il formaggio filante, per la lattuga fresca e per la salsa barbecue. Nasce così un Grande Classico dal gusto affumicato davvero irresistibile.', 'img_hw1/double-chicken-bbq--hero-isolated2.png', 'panini'),
(5, 'Filet-O-Fish', 'A volte per sorprendere bastano tre semplici ingredienti: merluzzo impanato, formaggio, salsa tartara. Il risultato? Un Grande Classico che unisce il sapore del mare al gusto unico di McDonald’s.', 'img_hw1/filet-o-fish--hero-isolated2.png', 'panini'),
(6, 'My Selection Chicken Pecorino Toscano DOP & Salsa Yuzu', '100% petto di pollo italiano avvolto in una croccante panatura, Pecorino Toscano DOP, pancetta italiana affumicata e salsa all’agrume yuzu.', 'img_hw1/isolated--mys-pecorino-salsayuzu_02.png', 'panini'),
(7, 'McChicken', 'Tutta la semplicità del petto di pollo avvolto in una panatura croccante, insieme all’insalata iceberg e all’inconfondibile salsa McChicken.', 'img_hw1/mcchicken--hero-isolated2.png', 'panini'),
(8, 'McMuffin Bacon Egg', 'Tutto il gusto delle uova fresche 100% italiane, del bacon croccante e del formaggio fuso, per un Grande Classico che ti fa fare il pieno di energia.', 'img_hw1/mcmuffin-bacon-egg_isolated2.png', 'panini'),
(10, 'Crispy McWrap', 'Carne 100% bovina da allevamenti italiani, croccante bacon 100% da pancetta italiana, formaggio e l’inconfondibile salsa, avvolti in una gustosa tortilla.', 'img_hw1/crispy-mcwrap-isolated-v22.png', 'panini'),
(11, 'Patate regolari', 'Perfette per uno snack, da gustare da sole o accompagnate da una delle nostre salse, oppure nel tuo Happy Meal, le patatine regolari sono sempre irresistibili.', 'img_hw1/patatine_isolated_02.png', 'patatine'),
(12, 'Patatine Medie', 'Le patatine di McDonald’s le riconosci subito, anche a occhi chiusi. Sono lunghe, dorate, croccanti e servite nella loro iconica confezione rossa. Goditele accompagnate con una salsa o anche da sole, una dopo l’altra o a quattro, cinque o sei in una sola volta.', 'img_hw1/patate-regolari_isolated_02.png', 'patatine'),
(13, 'Le Ricche Cheddar', 'Le patatine di sempre più tutto il gusto della salsa calda al Cheddar. Lasciati tentare da Le Ricche: dorate e incredibilmente golose.', 'img_hw1/lericche-cheddar--isolated_2_02.png', 'patatine'),
(14, 'Insalata mista', 'Il verde dell’insalata, il rosso dei pomodori, le carote, il mais e le olive nere. Nell’insalata mista trovi un mix di verdure fresche, sane e genuine per una pausa pranzo all’insegna della leggerezza.', 'img_hw1/insalata-mista--isolated_02.png', 'insalate'),
(15, 'Insalata con petto di pollo croccante, Pomodoro di Pachino IGP e Parmigiano Reggiano DOP', 'Insalata con 100% petto di pollo italiano in una croccante panatura, Pomodoro di Pachino IGP dal sapore dolce e intenso e l’inimitabile Parmigiano Reggiano DOP. Un mix perfetto di freschezza e gusto.', 'img_hw1/insalata-pollo-croccante-isolated2.png', 'insalate'),
(16, 'Insalata verde con Pomodoro di Pachino IGP', 'Un fresco mix di lattughino verde e rosso, songino e spinacino baby e tutto il sapore dolce e intenso del Pomodoro di Pachino IGP. Perfetta per una pausa pranzo veloce o per accompagnare i nostri irresistibili menu.', 'img_hw1/insalata-verde-isolated2.png', 'insalate'),
(17, 'Le Ricche Cheese&Bacon', 'Le patatine di sempre, con tutto il gusto della salsa calda al Cheddar e del bacon croccante. Lasciati tentare da Le Ricche: dorate e incredibilmente golose.', 'img_hw1/lericche-bacon--isolated_0_02.png', 'patatine'),
(18, 'Acqua Lilia', 'Acqua minerale disponibile naturale e frizzante.', 'img_hw1/acqua-lilla_isolated.png', 'bevande'),
(19, 'Coca-Cola Zero', 'Coca-Cola Zero alla spina disponibile nei formati 0,25L, 0,4L, 0,5L.', 'img_hw1/isolated--cocacola-zero-medium-branded.png', 'bevande'),
(20, 'Coca-Cola', 'Coca-Cola alla spina disponibile nei formati 0,25L, 0,4L, 0,5L.', 'img_hw1/isolated--cocacola-medium-branded.png', 'bevande'),
(21, 'Fanta', 'Fanta alla spina disponibile nei formati 0,25L, 0,4L, 0,5L.', 'img_hw1/isolated--fanta-medium-branded_0.png', 'bevande'),
(22, 'Sprite', 'Sprite alla spina disponibile nei formati 0,25L, 0,4L, 0,5L.', 'img_hw1/isolated--sprite-medium-branded_1.png', 'bevande'),
(23, 'Lipton Ice Tea Pesca', 'Lipton Ice Tea Pesca alla spina disponibile nei formati 0,25L, 0,4L, 0,5L.', 'img_hw1/isolated--lipton-pesca-medium-branded.png', 'bevande'),
(24, 'Lipton Ice Tea Limone', 'Lipton Ice Tea Limone alla spina disponibile nei formati 0,25L, 0,4L, 0,5L.', 'img_hw1/isolated--lipton-limone-medium-branded.png', 'bevande'),
(25, 'Succo bio di mela', 'La freschezza e la leggerezza delle mele bio, in un formato comodo che piace a tutti.', 'img_hw1/isolated-succo-mela.png', 'bevande'),
(26, 'Tropicana', 'Tutto il gusto originale del succo Tropicana, realizzato con il 100% di arance bionde spremute.\r\nDisponibile in bottiglia nel formato 0,25L.', 'img_hw1/tropicana-isolated.png', 'bevande'),
(27, 'Cono', 'Il Cono McDonald’s è così da sempre: semplice, cremoso e irresistibile. Una golosa spirale di gelato al fiordilatte, fatto con latte intero 100% italiano, su una cialda croccante, per chi ha sempre voglia di gelato.', 'img_hw1/cono-isolated.png', 'gelati'),
(28, 'McFlurry Baci Perugina', 'La semplicità del gelato al fiordilatte, fatto con latte 100% italiano, più tutta la golosità dei Baci Perugina? Ecco il McFlurry Baci Perugina: un gusto inconfondibile che trovi solo da McDonald’s, per una pausa di puro piacere.', 'img_hw1/mcflurry-baci--isolated_0.png', 'gelati'),
(29, 'McFlurry Oreo', 'Lasciati incantare da un cremoso vortice di gelato, preparato con latte intero 100% italiano, e fatti conquistare dai suoi biscotti al cacao croccante. Non ti è venuta voglia di McFlurry reo?', 'img_hw1/mcflurry-oreo--isolated_0.png', 'gelati'),
(30, 'McFlurry Pistacchio', 'll gusto unico di McFlurry in una nuova versione super golosa, con pistacchio e granella croccante. Tieniti pronto ad un gelato davvero travolgente.', 'img_hw1/mcflurry-pistacchio--isolated.png', 'gelati'),
(31, 'McFlurry Smarties', 'Il bello di McFlurry Smarties? Che a ogni assaggio i colorati confetti di cioccolato trasformano il soffice gelato al fiordilatte, fatto con latte intero 100% italiano, in un sogno a occhi aperti, ma da vivere a bocca chiusa.', 'img_hw1/mcflurry-smarties--isolated_0.png', 'gelati'),
(32, 'McFlurry Snickers', 'McDonald’s fatto con latte intero 100% italiano. Con il nuovo McFlurry Snickers la tua pausa avrà tutto un altro sapore.', 'img_hw1/mcflurry-snickers--isolated_0.png', 'gelati'),
(33, 'Sundae Caramello', 'Dai una cucchiaiata e osservi il caramello filare sopra il soffice gelato al fiordilatte, preparato con latte intero 100% italiano. Lo assaggi e ti accorgi della sua cremosità avvolgente, di quel mix di dolcezza che vorresti non finisse mai.', 'img_hw1/sundae-caramello--isolated.png', 'gelati'),
(34, 'Sundae Caramello', 'Dai una cucchiaiata e osservi il caramello filare sopra il soffice gelato al fiordilatte, preparato con latte intero 100% italiano. Lo assaggi e ti accorgi della sua cremosità avvolgente, di quel mix di dolcezza che vorresti non finisse mai.', 'img_hw1/sundae-cioccolato--isolated.png', 'gelati');



CREATE TABLE `preferiti` (
  `identificativo` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `nome_alimento` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `descrizione` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;





ALTER TABLE `panini`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `preferiti`
  ADD PRIMARY KEY (`identificativo`);


ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);




ALTER TABLE `panini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;


ALTER TABLE `preferiti`
  MODIFY `identificativo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;


ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

