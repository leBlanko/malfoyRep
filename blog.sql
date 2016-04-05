-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 05 Avril 2016 à 09:31
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date` int(11) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `date`, `votes`) VALUES
(1, 'The Flash', 'Barry Allen est un jeune scientifique travaillant pour la police de Central City. Lorsqu''il avait 11 ans, il a vu sa mère se faire tuer par une entité mystérieuse, son père a été accusé et il purge une peine pour un crime qu''il n''a pas commis.\r\n\r\nUn jour lors d''un accident provoqué par l''explosion d''un accélérateur de particules dans les laboratoires de Harrison Wells, fait de Barry une personne exceptionnelle capable de courir à des vitesses extrêmes. Pour le monde entier, il est un scientifique qui travaille pour la police, mais secrètement, il utilise sa vitesse pour combattre le crime et trouver d''autre personnes comme lui, des méta-humains. Toutefois, son but premier est de trouver qui a tué sa mère et de rendre justice pour son père.', 1447694124, 30),
(2, 'The Arrow', 'Après un violent naufrage, le milliardaire Oliver Queen, playboy, porté disparu et présumé mort depuis cinq ans, est découvert vivant sur une île isolée dans le Pacifique. Quand il rentre chez lui, à Starling City, sa mère dévouée Moira, sa sœur bien-aimée Théa et son meilleur ami Tommy l''accueillent chez lui, mais ils sentent qu''Oliver a changé. Alors qu''Oliver cache la vérité sur l''homme qu''il est devenu, il cherche désespérément à faire amende honorable pour ses actions passées et tente de se réconcilier avec son ex-petite amie, Laurel Lance.\r\n\r\nIl crée alors secrètement le personnage de l’Archer Vert qui va réparer les torts de sa famille, lutter contre les maux de la société et redonner à la ville de Starling son ancienne gloire. En tant qu''héritier de la multinationale Queen Consolidated, Oliver joue également le rôle d''un coureur de jupons riche, insouciant et négligeant afin de cacher son identité secrète. Cependant, le père de Laurel, l''inspecteur Quentin Lance, est déterminé à arrêter le justicier dans sa ville. Dans les épisodes il sera aidé de Felicity une informaticienne et de John Diggle qui faisait partie de l''armée.', 1447694521, 19),
(3, 'DC''s Legend of tomorrow', 'Rip Hunter, un agent faisant partie de la confédération des maîtres du temps est envoyé dans le passé pour recruter un groupe de super-héros et de super-vilains capable d''affronter une menace planétaire : le criminel Vandal Savage avec son armée de super soldats ayant modifié le futur. Ils ont pris le contrôle de toutes les infrastructures et fait des humains des esclaves. Ce groupe est composé de Captain Cold, Heat Wave, The Atom, Hawkman, Hawkgirl, White Canary et Firestorm.\r\nLe groupe de super-héros aura donc pour mission de contrer Savage à la source en revenant dans le passé.\r\n\r\nComme beaucoup le savent déjà, Legends of Tomorrow fait le pari audacieux de réunir à l''écran et en équipe des héros et des méchants emblématiques découverts dans les séries Arrow et The Flash. Souvent récurrents, ces personnages ont l''avantage d''être déjà connus et donc très appréciés du public. C''est d''ailleurs le cas de la charmante Sarah Lance ici transformée en White Canary. Si les spéculations allaient bon train quant à la façon dont la jeune femme serait ressuscitée suite à son assassinat dans l''épisode 1 de la saison 3 de Arrow, les images ne nous laissent plus aucun doute : la demoiselle a fait un petit tour par la source Lazarus. Renaissant de ses cendres sous les traits de White Canary, Sarah deviendra sans aucun doute la touche glamour du show. Décrite dans le trailer sous les termes "d''assassin décédé", White Canary devrait être essentielle à l''équilibre de la team. Autre figure bien connue des adeptes de Arrow, le génialissime Ray Palmer sera également de la partie. Toujours aussi drôle et doté d''une intelligence toujours plus affutée, Atom utilisera son costume afin de faire des ravages. Désormais capable de se transformer en version miniature de lui-même, Ray sera, de toute évidence, le leader charismatique de l''équipe.', 1454417429, 43),
(4, 'Supergirl', 'Lors de l''explosion de la planète Krypton, Kara El fut envoyée avec son cousin nouveau-né Kal El sur Terre, la jeune fille devant protéger l''enfant. Mais la navette de Kara se perdit dans la Zone fantôme, bloquée dans le temps pendant 25 ans. Une fois sur Terre, Kara était encore adolescente quand Kal était devenu adulte, connu sous le nom de Superman. Il confia Kara à la famille Danvers, des scientifiques familiers avec la technologie kryptonienne.\r\n\r\nDouze ans plus tard, Kara cache encore ses pouvoirs et travaille comme assistante pour Cat Grant, une magnat de la presse de National City. Frustrée, le crash annoncé d''un avion où se trouve sa sœur adoptive Alex lui donne l''occasion de montrer au monde qu''elle a les mêmes pouvoirs que Superman.', 1455980896, 19),
(5, 'Daredevil', 'Matt Murdock est un petit garçon solitaire, timide et faible, souvent malmené par les caïds de son quartier. Un jour, il surprend son père en train de racketter et s''enfuit. Peu de temps après, il perd la vue à la suite d''une exposition à des déchets radioactifs. Toutefois, à son réveil, tous ses autres sens sont exacerbés et il en découvre un sixième : un sens radar semblable à celui des chauve-souris qui lui permet de voir sans ses yeux. Et alors qu''il s''est réconcilié avec son père, qui a fait amende honorable et a repris sa carrière de boxeur, il assiste à l''assassinat de celui-ci, battu à mort par un individu qui dépose une rose rouge sur son corps. Le jeune Matt promet alors de lutter pour la justice.\r\n\r\nDès lors, Matt Murdock devient avocat le jour et, la nuit, il combat le crime sous le nom de Daredevil, le justicier aveugle. Il exerce alors sa propre justice, allant jusqu''à tuer ceux qui ont été acquittés à tort. Il se lie d''amitié avec un prêtre, seul au courant de son secret, et à qui il confie souvent les péchés que son sens de la justice lui fait commettre.\r\n\r\nUn jour, alors qu''il boit un café avec son ami, collègue et associé, Murdock rencontre une jeune femme. Il la suit et va jusqu''à se battre avec elle, dans un combat d''abord un peu agressif puis complice, pour savoir son nom : Elektra. Plus tard, dans la rue, il se retourne et se retrouve nez à nez avec Elektra. Il l''invite à son appartement. Il attend qu''il pleuve pour voir enfin le visage de la jeune femme ; c''est le coup de foudre.\r\n\r\nDans le même temps, le Tireur, réputé pour ne jamais rater sa cible, fait sa loi en ville. Lors d''une soirée, Murdock est invité à un hôtel récemment acheté par Nikolas Natchios, le père d''Elektra, et associé du Caïd. Il y rencontre de nouveau Elektra qui doit partir précipitamment. Sous le costume de Daredevil, il suit sa voiture pour s''assurer qu''elle ne va au devant d''aucun danger. C''est sans compter sur le Tireur qui tue les deux chauffeurs de la limousine du père d''Elektra. Daredevil essaye de sauver celui-ci mais le Tireur arrive à atteindre Nikolas Natchios avec l''arme de Daredevil.', 1455981367, 19),
(6, 'Jessica Jones', 'Jessica Campbell Jones (dont le véritable nom de famille n''est pas dévoilé) était une jeune fille impopulaire, voire inconnue pour ses camarades dans le lycée qu''elle fréquentait. Elle craquait à l''époque pour Peter Parker. Au cours d''un voyage en voiture, une dispute de la famille de Jessica provoque un accident avec un camion de l''armée. Un conteneur de produits radioactifs est projetée à ce moment sur Jessica. Elle est la seule survivante de ce drame mais elle est plongée dans le coma.\r\n\r\nElle reprend conscience dans un hôpital quelques mois après, lorsque Galactus apparaît sur Terre. Ressentant toujours la culpabilité du survivant, Jessica est adoptée par les Jones.\r\n\r\nElle tente de reprendre le cours de sa vie, mais cela est perturbé par l''apparition de ses nouveaux pouvoirs. Après avoir battu le super-vilain Le Scorpion, elle se baptise Jewel et se lance à cœur perdu dans le super-héroïsme. Elle fera ainsi brièvement partie des Vengeurs et commencera une amitié en dents de scie avec Carol Danvers.', 1455981554, 19);

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'tito.tati@me.com'),
(2, 'test@test.fr');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `sid` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mdp`, `sid`) VALUES
(1, 'Malfoy', 'Tony', 'malfoy.tony@gmail.com', 'ab4f63f9ac65152575886860dde480a1', '5c760ee8f284d680390f81dc6f5beb07'),
(6, 'lannoy', 'jp', 'jp.lannoy@nilsine.fr', '5f4dcc3b5aa765d61d8327deb882cf99', '5c760ee8f284d680390f81dc6f5beb07');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`,`mdp`,`sid`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;