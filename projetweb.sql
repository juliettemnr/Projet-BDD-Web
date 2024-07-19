-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2022 at 03:13 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `choix`
--

CREATE TABLE `choix` (
  `Choix_id` int(11) NOT NULL,
  `Paragraphe_id` int(11) NOT NULL,
  `Envoi_id` int(11) NOT NULL,
  `Choix_texte` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `choix`
--

INSERT INTO `choix` (`Choix_id`, `Paragraphe_id`, `Envoi_id`, `Choix_texte`) VALUES
(3, 1, 2, 'Commencer l\'histoire'),
(4, 2, 3, 'Continuer'),
(5, 3, 4, 'Traverser la riviere'),
(7, 4, 6, 'Retenter de traverser la riviere'),
(8, 4, 7, 'Reflechir à une autre stratégie'),
(9, 3, 5, 'Observer votre environnement'),
(10, 5, 8, 'Prendre le pont'),
(11, 5, 6, 'Tenter de traverser la riviere'),
(12, 6, 8, 'Vous dites à Gretel de vous suivre'),
(14, 8, 9, 'Continuer'),
(15, 9, 10, 'Marcher'),
(16, 10, 11, 'Prendre votre mitratilleuse '),
(17, 10, 12, 'Ne rien faire'),
(18, 11, 13, 'Vous passez à l\'action'),
(19, 11, 14, 'Regarder autour de vous'),
(20, 12, 14, 'Regarder autour de vous'),
(21, 12, 17, 'Penser à votre vie'),
(22, 14, 15, 'Attaquer'),
(23, 13, 15, 'Changer de stratégie'),
(24, 13, 16, 'Rester sur sa lancer'),
(25, 15, 18, 'Changer d\'arme'),
(26, 15, 19, 'Se souvenir'),
(27, 16, 20, 'Avancer'),
(28, 16, 22, 'Se cacher'),
(29, 18, 20, 'Avancer'),
(30, 18, 19, 'Se souvenir'),
(32, 19, 25, 'Ne rien faire'),
(34, 26, 27, 'Parler à votre soeur'),
(35, 26, 28, 'Observer la scene de crime'),
(36, 27, 29, 'fouiller le cadavre'),
(37, 28, 29, 'Fouiller le cadavre'),
(38, 28, 30, 'Fouiller la bibliotheque'),
(39, 29, 31, 'Prendre la clef'),
(40, 29, 32, 'Sortir de la pièce'),
(41, 30, 33, 'prendre le livre de magie'),
(42, 30, 34, 'Se baisser sous l\'étagere'),
(43, 14, 17, 'Regarder les papillons '),
(44, 27, 28, 'Observer la scene de crime'),
(48, 79, 80, 'pppp'),
(49, 81, 82, 'dd'),
(50, 7, 8, 'Prendre le pont '),
(51, 22, 23, 'Se retourner'),
(52, 22, 25, 'Attendre'),
(53, 23, 26, 'Continuer'),
(54, 20, 22, 'Se cacher'),
(55, 83, 84, 'L\'appeler'),
(56, 83, 85, 'Vous rapprocher'),
(57, 84, 87, 'Siffler'),
(58, 84, 90, 'Chanter'),
(59, 83, 86, 'Penser à elle'),
(61, 90, 91, 'vient'),
(62, 91, 92, 'avec tes belles jambes'),
(63, 111, 89, 'à moi'),
(64, 111, 98, 'ma vie'),
(65, 111, 107, 'mon vit'),
(66, 98, 99, 'Captive'),
(67, 98, 106, 'Furtive'),
(68, 98, 110, 'craintive'),
(69, 99, 100, 'dans ta tour'),
(70, 99, 101, 'dans tes yeux'),
(72, 101, 102, 'Qui m\'as l\'âme ravie'),
(73, 102, 103, 'd\'un sourire gracieux'),
(74, 102, 104, 'd\'un sourire radieux'),
(76, 103, 104, 'Continuer'),
(77, 101, 106, 'que mon âme envie'),
(78, 101, 108, 'Que mon cheval envie'),
(80, 110, 83, 'Recommencer'),
(81, 108, 83, 'Recommencer'),
(82, 92, 83, 'Recommencer'),
(83, 93, 94, 'mon vit'),
(86, 93, 112, 'Mon impuissance'),
(87, 90, 93, 'mord'),
(88, 86, 83, 'Recommencer'),
(89, 87, 83, 'Recommencer'),
(91, 85, 97, 'Se rapprocher encore'),
(92, 97, 83, 'Recommencer'),
(93, 105, 83, 'Recommencer'),
(94, 107, 83, 'Recommencer'),
(95, 109, 83, 'Recommencer pauvre âne...'),
(96, 112, 83, 'Recommencer'),
(98, 89, 83, 'Recommencer'),
(99, 90, 111, 'tiens'),
(116, 121, 122, 'non'),
(117, 84, 84, 'Crier'),
(118, 91, 90, 'Heu je voulais dire \"tiens\"');

-- --------------------------------------------------------

--
-- Table structure for table `histoire`
--

CREATE TABLE `histoire` (
  `Histoire_id` int(11) NOT NULL,
  `Histoire_Titre` varchar(250) NOT NULL,
  `Histoire_Theme` int(250) NOT NULL,
  `Histoire_id1erParagraphe` int(11) NOT NULL,
  `Histoire_Image` varchar(30) NOT NULL,
  `NombreVictoire` int(11) NOT NULL,
  `NombreDefaite` int(11) NOT NULL,
  `Cache` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `histoire`
--

INSERT INTO `histoire` (`Histoire_id`, `Histoire_Titre`, `Histoire_Theme`, `Histoire_id1erParagraphe`, `Histoire_Image`, `NombreVictoire`, `NombreDefaite`, `Cache`) VALUES
(0, 'La revanche d\'Hansel et Gretel', 1, 1, 'hansel.png', 0, 2, 1),
(3, 'Le magicien en déraison', 2, 83, 'magicien.png', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `paragraphe`
--

CREATE TABLE `paragraphe` (
  `Paragraphe_Type` int(50) NOT NULL,
  `Paragraphe_id` int(11) NOT NULL,
  `Paragraphe_Texte` text NOT NULL,
  `Paragraphe_titre` varchar(50) NOT NULL,
  `Histoire_id` int(11) NOT NULL,
  `PointDeVie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paragraphe`
--

INSERT INTO `paragraphe` (`Paragraphe_Type`, `Paragraphe_id`, `Paragraphe_Texte`, `Paragraphe_titre`, `Histoire_id`, `PointDeVie`) VALUES
(0, 1, 'Laissez-nous vous raconter une histoire, une histoire que vous pensez à tort bien connaître...\r\n\r\nDans une maison délabrée, au cœur d\'une ville pleine de mystères, vivait un artiste, son fils et sa fille. Le fils s\'appelait Hansel et la fille, Gretel. L\'artiste, doué mais naïf, était depuis peu tombé amoureux d\'une magnifique dame. Elle lui promettait d\'exposer ses œuvres partout dans le monde. Hansel et Gretel, circonspects, découvrirent que cette femme était en vérité une trafiquante d\'armes qui comptait utiliser les sculptures de leur père pour y dissimuler ses marchandises. Hélas, la femme, se sachant découverte par les marmots, les fit passer pour des menteurs et, jouant de ses charmes, convainquit l\'artiste de s\'en débarrasser. Ce dernier n\'ayant pas le courage de se salir les mains, il décida à la place de perdre en pleine nuit les enfants dans la grande forêt à côté de la ville. Elle avait une effroyable réputation. Bien des gens n\'en revenaient jamais...\r\n\r\nHansel et Gretel n\'étaient pas sans ressource. Ils utilisèrent le GPS de leur smartphone pour retrouver le chemin de la maison. Seulement, dès la nuit suivante, ils furent de nouveau abandonnés dans la forêt, et privés de téléphone cette fois. Ils n\'eurent donc d\'autre choix que d\'errer entre des arbres sinistres, en quête d\'un refuge. Terrifiés, fourbus, transis, ils découvrirent une accueillante masure dans une clairière. Pleins d\'espoir, ils frappèrent à sa porte. Ce fut une vieillarde qui leur ouvrit, une vieillarde qui s\'avéra être une sorcière. Sitôt les petits égarés à l\'intérieur, elle enferma Hansel dans une cage et contraignit Gretel à l\'engraisser. Elle voulait manger le premier et s\'assurer que la seconde prendrait part à cette ignominie.\r\n\r\n\r\nHeureusement, la sorcière sous-estima Gretel qui, feintant au début la docilité, sut trouver l\'occasion propice pour la pousser dans le four où elle périt brûlée vive. Gretel délivra son frère, qui dénicha une carte de la région dans les affaires de la sorcière. Ils purent retrouver le chemin de chez eux.\r\nDurant leur absence de quelques jours, l\'artiste, rongé par les remords, avait fini par mener sa propre enquête au sujet de son amante. Ses recherches l\'avaient mené dans un hangar débordant d\'armes. Ivre de rage, il s\'était servit de l\'une d\'elles pour abattre la félonne. Il croyait avoir tout perdu... Quelle ne fut pas sa joie lorsqu\'il retrouva ses enfants !\r\nIroniquement, le réseau de relations mis en place par la criminelle permit vraiment à l\'artiste de devenir célèbre. Il put rénover sa maison et couvrir sa progéniture adorée de cadeaux.\r\n\r\nChangés par ces événements, les gamins ont pris goût à l\'aventure. Or, sur la carte qu\'ils ont trouvée, des indications ont de quoi les intriguer. La sorcière semble appartenir à une coterie. Ne faudrait-il pas en avoir le cœur net ? Le stock d\'armes de la trafiquante n\'attend que de servir...\r\n', 'Une histoire étrange ...', 0, 0),
(0, 2, 'Vous vous réveillez en sursaut, troublé, perdu...\r\nDans votre esprit, c\'est le chaos, et autour de vous, le noir complet.\r\nPar réflexe, vous appelez votre sœur, Gretel, mais seul le silence vous répond. Vous voulez bouger, mais vous vous sentez terriblement faible. Que s\'est-il passé ? Quel est cet endroit ? Il vous faut comprendre alors vous tentez de rassembler vos pensées. C\'est le mieux que vous puissiez faire dans votre état.\r\nVous réalisez alors qu\'une de vos mains est posée sur un morceau de papier. Vous tâtonnez et reconnaissez la carte. C\'est par elle que tout a commencé...\r\n', 'Perdu dans le noir', 0, 0),
(0, 3, 'Vous ne tardez pas à apercevoir le cours d\'eau. Au fond d\'une ravine, large d\'un bon mètre, ses flots vivaces miroitent sous les quelques rayons du soleil qui traversent la voûte végétale. En amont et en aval, les arbres semblent se refermer sur la rivière.\r\nGretel considère avec méfiance les ronces qui garnissent les bords de la ravine.\r\n« Il y a un pont sur la carte ?\r\n— Non, mais elle m\'a pas l\'air super détaillée.\r\n— On ferait bien de trouver quelque chose, j\'ai pas envie de ruiner ma robe. »\r\n', 'Au bord d\'une rivière', 0, 0),
(0, 4, 'plouf vous tomber dans l’eau et vous etes tremper. Heureusement, vous savez nager et vous revener sur la rive', 'Plouf !', 0, -10),
(0, 5, 'Vous baissez les yeux sur vous...\r\nVous portez un t-shirt blanc, un bermuda bleu marine et des baskets blanches, sans oublier votre sac à dos noir dont les bretelles commencent à vous scier les épaules.\r\nVous avez les mains libres.\r\n\r\nVous êtes au bord de la rivière. En amont et en aval, les arbres semblent se refermer sur elle. Gretel observe les branches. Envisage-t-elle de franchir l\'obstacle par là ?', 'hmmmm', 0, 0),
(0, 6, 'Peut-être qu\'en prenant votre élan, vous pouvez sauter de l\'autre côté. Vous commencez à reculer, mais votre sœur vous arrête.\r\n« N\'y pense même pas ! Chargé comme tu es, tu vas juste réussir à te casser la figure.\r\n— Ben comme ça, on pourra encore mieux passer pour de pauvres petits égarés.\r\n— Oui mais non. Papa risque de se poser des questions s\'il nous voit revenir tout amochés. »\r\n\r\nVous êtes au bord de la rivière. En amont et en aval, les arbres semblent se refermer sur elle. Gretel observe les branches. Envisage-t-elle de franchir l\'obstacle par là ?', 'Prendre son élan', 0, 0),
(0, 7, 'Vous essayez d’observer le monde qui vous entoure mais rien. Des formes esoteriques vous surplombent. Vous avez peur. Mais attendez, ce n’est pas un pont que vous voyez ?', 'Un dernier espoir ...', 0, 0),
(0, 8, 'Peu après, vous vous trouvez tous les deux devant un petit pont en bois rudimentaire fait de quelques rondins noués ensembles. Au-delà serpente un semblant de sentier. Vous approchez du but, c\'est certain.\r\n« Gretel, et si ce n\'est pas une sorcière ?\r\n— C\'en est une. Madame Grébière, c\'est un nom de sorcière.\r\n— Pour l\'instant, c\'est juste un nom sur une carte. N\'oublie pas le plan, pas un coup de feu sans qu\'on soit sûrs.\r\n— Je sais, je suis pas bête. Mais tu verras, on sera vite fixés. »\r\n', 'Allons-y !', 0, 0),
(0, 9, 'À peine engagé sur le sentier, vous commencez à apercevoir une masure émerger d\'entre les arbres. Toit de chaume, mur en bois, elle vous rappelle, par son style tout droit sorti d\'un autre temps, celle où vous et votre sœur avez cherché refuge.\r\nVos doutes s\'accroissent mais Gretel paraît toujours aussi déterminée, alors vous tentez de donner le change. Vous rangez la carte et la boussole avant de vous raclez la gorge et d\'hasarder :\r\n« Ho, regarde sœurette, une maisonnette ! On va pouvoir trouver de l\'aide ! »\r\nMais quel pathétique jeu d\'acteur !\r\n« Super frérot, On est sauvé ! Vite, frappons à la porte ! »\r\nLe côté positif, c\'est que Gretel n\'est pas plus crédible que vous dans son rôle d\'enfant perdu. Peut-être auriez-vous dû vous entraîner à jouer la comédie au lieu d\'uniquement apprendre à tirer.\r\nQuoi qu\'il en soit, vous voilà tous les deux devant la porte.\r\n', 'Bravo !', 0, 10),
(0, 10, 'Vous échangez un regard, puis Gretel frappe à la porte. Maintenant, il est trop tard pour faire marche arrière. L\'attente promet d\'être courte, vous entendez déjà des pas s\'approcher...\r\n\r\nLa porte s\'ouvre, dévoilant une femme moins âgée que vous ne vous y attendiez. Le seul élément notable de son apparence est l\'horrible robe violette dont elle est affublée. Cependant, le grand sourire qu\'elle vous adresse suffit à vous faire frémir. Elle vous détaille de la tête aux pieds, vous et votre sœur, puis demande :\r\n« Que puis-je pour vous mes adorables bouts de chou ? »\r\nVous vous lancez, surpris par votre soudaine spontanéité.\r\n« Bonjour Madame. On est perdus. On ne tient pas à déranger, mais est-ce qu\'on pourrait se servir de votre téléphone pour appeler nos parents ?\r\n— Mais bien sûr, entrez, entrez donc ! »\r\n\r\nTout autant que l\'extérieur, l\'intérieur de la bicoque ressemble à ce que vous avez pu voir chez la sorcière. Les étagères croulant de livres et d\'objets glauques, la boule de cristal sur la table, le four démesuré trônant dans le coin cuisine, le grabat dans le coin opposé, les fenêtres aux lourds rideaux empêchant la lumière du jour d\'entrer, les chandelles pour éclairer, l\'odeur désagréable, la saleté... c\'est presque un copier/coller. Est-ce le style à la mode chez les sorcières ? Après tout, pourquoi pas. Il faut avouer que l\'effet, sur les visiteurs, est plutôt efficace.\r\n« Hum, où est le téléphone ? » demande innocemment Gretel.\r\n\r\nEn guise de réponse, la femme éclate d\'un rire diabolique. Même ce rire, cette attitude semble correspondre à un code, à une convenance. Le plus drôle, c\'est que la femme se force, comme si elle n\'était pas encore totalement habituée auxdites convenances. Déjà elle enchaîne :\r\n« Mais nulle part ma chérie ! Il se trouve que j\'ai besoin de jeunes cœurs bien frais pour mes exercices ! C\'est tellement gentil à vous de venir m\'en apporter ! »\r\nVotre sœur se tourne vers vous, l\'air très satisfaite.\r\n« Tu vois, ça n\'a pas trainé. On aurait dû parier.\r\n— On y pensera la prochaine fois. »\r\nLa femme, ou plutôt la sorcière, car il n\'y a plus de doute sur sa nature, est stupéfaite.\r\n« Hé, mais... mais c\'est pas censé ce passer comme ça ! »\r\n', 'Devant une maisonette', 0, 0),
(0, 11, '« Quoi ?! Attendez un instant, depuis quand les gosses ont le droit de se défendre ?!\r\n— On change les règles ! ricane Gretel.\r\n— Oui, on s\'est dit que ça serait fun de bousculer vos habitudes !\r\n— Et vous pensez que vous pouvez me faire quelque chose avec ces machins ridicules ?! Je n\'ai qu\'à tendre le doigt pour... pour vous désintégrer, oui, c\'est ça ! Pour vous désintégrer ! »\r\nElle brandit les mains et des étincelles commencent à danser sur ses doigts. Malgré cette attitude menaçante, elle ne semble pas du tout pressée d\'entamer les hostilités.\r\n', 'Action !', 0, 10),
(0, 12, 'Vous vous dites qu\'elle doit avoir un bon fond et qu\'il reste de l\'espoir. Mais vous etes trop gentil pour ce monde. Vous vous laissez surprendre et ne pouvez plus réagir.\r\n\r\nVous avez encore une chance de vous rattraper ...', 'Trop bon, trop ...', 0, -20),
(0, 13, 'Début du combat.\r\nVous avancez de 2 pas.\r\nVous attaquez Mme Grébière avec une probabilité de 50%. Échec.\r\nGretel émerge de derrière vous.\r\nGretel s\'éloigne de 1.\r\nMme Grébière s\'éloigne de 2 pas.\r\nMme Grébière attaque Gretel avec une probabilité de 20%. Succès\r\n', 'Un combat difficile', 0, -5),
(0, 14, 'Vous observez les mouches voler en plein combat. Vous etes decidemment une vraie tête en l\'air !', 'Attention à vous', 0, -20),
(0, 15, 'Gretel attaque Mme Grébière avec 50% de chance d\'ignorer la couverture. Succès.\r\nL\'attaque a une probabilité de 100%. Succès.\r\nMme Grébière subit 20 points de dégâts.\r\nMme Grébière s\'éloigne de 2 pas.\r\nMme Grébière attaque Gretel avec une probabilité de 20%. Succès\r\n', 'Touché dans le coeur', 0, -5),
(0, 16, 'Parfois quand on reste sur sa lancer cela fonctionne aussi bien.\r\n\r\nHead shoot, vous avez presque remporter le combat.\r\n\r\nComme on dit, \"on ne change pas une equipe qui gagne\" !', 'Statu quo', 0, 0),
(2, 17, 'Votre etourdi a eu raison de vous. \r\nIl n\'y a rien à faire, l\'aventure n\'est pas faite pour vous.\r\n Et si vous retentiez votre chance ?', 'Mort subite ...', 0, 0),
(0, 18, 'Vous changez d\'arme.\r\nMme Grébière subit 20 points de dégâts.\r\nVous subissez 20 points de dégâts.\r\nMme Grébière s\'éloigne de 4 pas.\r\n', 'Le changement, c\'est bien aussi', 0, 5),
(0, 19, 'Vous tentez de vous souvenir.\r\nMme Grébière passe derrière vous.\r\n\r\nLes sorcières préfèrent se tenir à distance afin de lancer tranquillement leurs maudits éclairs. Il faut être près d\'elles pour les rendre moins efficaces sans forcément aller directement au contact.\r\n', 'Se souvenir', 0, 0),
(0, 20, 'Mme Grébière s\'éloigne de 4 pas.\r\nVous avancez de 1 pas.\r\n', 'Avancer', 0, 0),
(0, 22, 'Mme grebiere est juste derriere vous', 'Se cacher', 0, -15),
(0, 23, 'Vous vous retournez.\r\nCoup critique ! Mme Grébière subit 40 points de dégâts.\r\nMme Grébière est hors combat.\r\n', 'Reculer', 0, 5),
(2, 25, 'vous etes rattrapés par mme grebiere qui vous tue de sang froid (game over)', 'Dommage !', 0, 0),
(0, 26, 'Vous l\'avez fait...\r\nVous êtes allés volontairement chez une sorcière et vous l\'avez abattue...\r\nCertes, ce n\'était à priori qu\'une apprentie, mais le geste, le symbole est fort. Alors que vous regardez le corps de Mme Grébière, le sentiment du devoir accompli vous envahi. Un large sourire se dessine sur vos lèvres.\r\n\r\n', 'Vraiment trop fort l\'artiste', 0, 0),
(0, 27, 'Votre sœur est plus expansive. Elle se met à rire, puis déclare :\r\n« C\'était trop fort ! Et c\'était que le début !\r\n— Ouais, que le début, vous confirmez, plein de conviction.\r\n— Et puis, y\'a pas à dire, le fusil à pompe, c\'est cool ! Il me fait triper ! »\r\n', 'Conversation', 0, 0),
(0, 28, 'Vous détachez vos yeux de la sorcière morte pour les porter sur la pièce. Les murs sont criblés de balles. Le sol est jonché de douilles et de cartouches.\r\n« C\'est sûr, le machin est efficace, vous répondez, mais va falloir qu\'on continue à sérieusement s\'entraîner. On peut pas se permettre de louper autant de tirs contre une cible plus expérimentée.\r\n— T\'en fais pas. On a pris le rythme, les séances d\'entraînement, on va continuer à les enchaîner. Le tout sans que papa puisse se douter de ce qu\'on fait, il gobe tous nos mensonges. Mais pour l\'instant, on a une maison à fouiller. On va peut-être trouver quelque chose d\'intéressant. »\r\n', 'Observer la scene de crime', 0, 0),
(0, 29, 'C\'est bien la première fois que vous fouillez un mort. Vous procédez avec précaution, tâchant de tenir à l\'écart le dégoût que vous inspire cette tâche.\r\nVos mains se referment bientôt sur une petite clef en cuivre que la sorcière portait autour du cou. Elle devait avoir de l\'importance pour elle.\r\n', 'fouiller le cadavre', 0, -5),
(0, 30, 'Les étagères croulent de vieux livres et d\'étranges accessoires. C\'est là que se trouve le manuel pour apprenti sorcière, tout du moins le premier volume. Vous ne poussez pas plus loin vos investigations car Gretel s\'occupe de cet endroit.', 'Regarder les meubles', 0, 0),
(1, 31, 'au moment de prendre la clef qlq1 entre et vous charge d’une quête importante. Votre soeur vous regarde d’un air inquiet.\r\n\r\nVous avez gagné la partie !\r\n', 'C\'est gagné !', 0, 0),
(0, 32, 'vous sortez et apparcevez un inconnu, il rentre dans la piece et prend la clef en courant. Vous regrettez de ne pas l’avoir prise. Qu’est-ce qu’elle pouvait bien signifier. Vous essayez de rattraper l’homme malgré tout. Votre soeur essaye de vous retenir', 'Partir de la pièce', 0, 0),
(2, 33, 'Vous observer un livre de magie et vous donne envie de vous mettre à la sorcellerie. Vous reciter un sort et malheureusement vous vous transformez en crapaud. Votre sœur vous regarde et vous cuisine à la marmite. C’est fini pour vous', 'Votre soif de connaissance a eu raison de vous', 0, 0),
(2, 34, 'Votre sœur en profite pour prendre un marteau et vous mettre un coup sur la tête.\r\n\r\nVous etes KO.\r\n', 'Quelle soeur !', 0, 0),
(0, 79, 'aaaaaaaaaaaa', 'aa', 0, 0),
(1, 80, 'zzzzzzzzzzzz', 'yeaaah', 28, 0),
(0, 81, 'plouf', 'lalala', 29, 0),
(1, 82, 'a', 'a', 29, 0),
(0, 83, 'Vous tombez à genoux, hors d\'haleine, dans l\'entrée de cette splendide clairière. Vous êtes épuisé, mais on le serait à moins après êtes passés par autant d\'épreuves et de pièges, et avoir déjoué l\'attention des sbires de la famille de Suzanne, de puissants sorciers. Cet espace est entouré de ronces infranchissables, et il est également fermé par une grille derrière vous. Ce soir elle était heureusement restée ouverte, comme une invitation.\r\n\r\nVous pouvez voir Suzanne, en haut de sa tour, et à côté de cette dernière un arbre gigantesque.', 'Le debut d\'un amour envoutant ?', 3, 0),
(0, 84, '« Hey, Suzanne, c\'est moi ! ». Va-t-elle daigner abaisser son regard vers vous ?', 'Un appel classique', 3, 0),
(0, 85, 'Vous commencez à vous rapprocher de la tour. Le vent se lève à cet instant et fait bouger le gros arbre qui se trouve non loin de là.', 'Vous êtes un poète timide', 3, 0),
(2, 86, 'La belle Suzanne occupe toutes vos pensées, à la limite de la déraison. Vous n\'arrivez plus à formuler correctement vos sorts, vous perdez tous vos moyens depuis que vos regards se sont un jour croisés, et qu\'elle a fait naître un sourire dans votre cœur de pierre.', 'L\'amour vous fait perdre la tête', 3, 0),
(0, 87, 'Vous sifflez, tel un pinson. Elle vous interpelle :\r\n« À combien de mots es-tu environ ?\r\n— Un peu plus de 400, mais un peu moins de 450 !\r\n— Mots dans des phrases, ou mots en vrac ?\r\n— Je crains d\'avoir tant déraisonné que je ne puis aligner mes mots correctement. Mots en vrac alors.\r\n— Cela est bien, continue donc ainsi mon doux ami ! »', 'Un sifflement un peu beauf', 3, -5),
(0, 88, '« Belle, qui...\r\nBelle, qui tiens mon cœur... » commencez-vous. Elle lève les yeux de son grimoire, pouffant de rire. « N\'importe quoi ! » . Elle vous téléporte au loin.Belle, qui tiens...', 'Il va falloir revoir votre approche !', 3, 0),
(0, 89, '« Belle, qui tiens...\r\n« Belle, qui tiens à moi... » commencez-vous.\r\n\r\nLa belle en question lève les yeux de son grimoire, et fait non de la tête : « Pas encore bel homme, vous allez vite en besogne ! ».', 'Vous allez trop vite en amour !', 3, -5),
(0, 90, '\"Belle qui...', 'Vous chantez', 3, 0),
(0, 91, '« Belle, qui vient', 'Attention à ce que vous allez dire', 3, 0),
(0, 92, '« Belle, qui vient avec tes belles jambes... » commencez-vous.\r\n\r\nLa belle en question lève les yeux de son grimoire et sourit mais : « Vous êtes un vil flatteur, bel homme, révisez vos classiques ». Elle vous téléporte au loin.', 'Elle était timide, dommage !', 3, 0),
(0, 93, '« Belle, qui mord...', 'Pensez à votre coeur', 3, 0),
(2, 94, '« Belle, qui mord mon vit... »\r\ncommencez-vous.\r\n\r\nUn éclair fuse.\r\nAlerte rouge, je répète, Alerte rouge. Le megaphone continue à hurler en lisière de la forêt : Une explosion atomique vient d\'être détectée dans le bois du Rossignolet-Joli, nous déplorons ne pouvoir trouver aucun survivant à 3 lieues à la ronde !\r\n\r\nVous avez atteint le sommet de la déraison, mais malheureusement pour vous, vous êtes mort. Bravo !?\r\n\r\nL\'explosion a même cassé le mécanisme de redémarrage.', 'Vous êtes mort de déraison', 3, 0),
(0, 97, 'Vous êtes tout près de l\'édifice maintenant. L\'arbre déploie une liane qui vient aussitôt vous capturer. C\'est son père qui va être content !', 'Il fallait être plus silencieux', 3, 0),
(0, 98, '« Belle, qui tiens ma vie', 'Laissez la poésie vous envahir', 3, 0),
(0, 99, '« Belle, qui tiens ma vie\r\nCaptive', 'Amour amor', 3, 0),
(2, 100, '« ... Captive dans ta tour ... » terminez-vous.\r\n\r\nLa belle est indépendante et certainement pas captive mon petit Mario. Un éclair jaillit de ses mains et vient vous frapper en pleine poitrine !', 'Gros macho !', 3, 0),
(0, 101, '« Belle, qui tiens ma vie\r\nCaptive dans tes yeux', 'C\'est beau', 3, 0),
(0, 102, '« Belle, qui tiens ma vie\r\nCaptive dans tes yeux\r\nQui m\'as l\'âme ravie', 'WOW', 3, 10),
(0, 103, '« Belle, qui tiens ma vie\r\nCaptive dans tes yeux\r\nQui m\'as l\'âme ravie\r\nd\'un sourire gracieux', 'Alors là bravo', 3, 10),
(1, 104, '« Belle qui tiens ma vie\r\nCaptive dans tes yeux,\r\nQui m\'as l\'âme ravie\r\nD\'un sourire gracieux,\r\nViens tôt me secourir\r\nOu me faudra mourir. »\r\nElle lève les yeux de son grimoire, l\'air d\'être émue. Elle disparaît un moment de votre champ de vision, faisant battre votre cœur d\'autant plus vite. Et elle réapparaît juste devant vous, sortant par la petite porte de la tour.\r\n\r\nVos doux mots l\'ont touchée. À vous d\'écrire le reste de cette belle histoire qui débute !', 'Quel beau poète', 3, 0),
(0, 105, '« Belle, qui tiens ma vie\r\nCaptive dans tes yeux\r\nQue mon âme envie »\r\ncommencez-vous. Elle lève les yeux de son grimoire, pouffant de rire. « N\'importe quoi ! » Elle vous téléporte au loin.', 'Avec un peu plus de tact !', 3, -5),
(0, 106, '« Belle, qui tiens ma vie\r\nFurtive dans tes yeux\r\nEt que mon âme envie\r\nElle lève les yeux de son grimoire, l\'air émue. Mais elle vous laisse en plan, vos doux mots ne l\'ont pas assez touchée visiblement.', 'Vous subissez la friendzone...', 3, -10),
(0, 107, '« Belle, qui tiens mon vit... » commencez-vous, et aussitôt la belle en question se téléporte devant vous. Et vous colle un magistral soufflet. C\'est mort, elle ne goûte apparemment pas la vulgarité (ou pas pour le moment en tout cas) !', 'Trop vulgaire ', 3, -5),
(0, 108, '« Belle, qui tiens ma vie\r\nCaptive dans tes yeux\r\nQue mon cheval envie »\r\ncommencez-vous. Elle lève les yeux de son grimoire, pouffant de rire. « N\'importe quoi ! » . Elle vous téléporte au loin.', 'Un cheval mais pourquoi ?', 3, 0),
(0, 109, '« Et que mon âne envie ... » terminez-vous, et aussitôt la belle en question se téléporte devant vous. Et vous colle un magistral soufflet. C\'est mort, elle ne goûte apparemment pas votre bonne blague !', 'Dommage mon pauvre', 3, 0),
(0, 110, '« Belle, qui tiens ma vie\r\ncraintive... »\r\n\r\ncommencez-vous. Elle lève les yeux de son grimoire, l\'air insatisfait. Elle se téléporte juste devant vous, et semble immense. « Craintive ? Crois-tu petit homme ? » Elle vous téléporte au loin.', 'Trop peureux pour l\'amour', 3, -5),
(0, 111, '\"Belle qui tiens...', 'Mais tiens quoi ?', 3, 0),
(0, 112, '\"Belle qui mord\r\nMon impuissance\r\nEt qui rejoui\r\nMon insouciance\"\r\n\r\nElle vient vers vous, vous fait un calin et repart. Allez-vous la revoir un jour ?', 'Parfois il n\'y a rien à comprendre', 3, -5),
(1, 121, 'bonjour', 'para2', 32, 0),
(1, 122, 'hey', 'para3', 32, 0),
(0, 123, 'z', 'z', 33, 0),
(0, 125, 'plouf vous tomber dans l’eau et vous etes tremper. Heureusement, vous savez nager et vous revener sur la rive', 'Plouf !', 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `progression`
--

CREATE TABLE `progression` (
  `Vie_debut` int(11) NOT NULL DEFAULT '100',
  `Vie_progression` int(11) NOT NULL,
  `Histoire_id` int(11) NOT NULL,
  `Paragraphe_id` int(11) NOT NULL,
  `Partie_id` int(11) NOT NULL,
  `Utilisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `progression`
--

INSERT INTO `progression` (`Vie_debut`, `Vie_progression`, `Histoire_id`, `Paragraphe_id`, `Partie_id`, `Utilisateur_id`) VALUES
(100, 270, 3, 83, 70, 0),
(100, 100, 0, 17, 71, 0),
(100, 100, 0, 1, 72, 0),
(100, 100, 0, 1, 73, 0),
(100, 100, 0, 1, 74, 0),
(100, 100, 3, 83, 75, 0),
(100, 100, 0, 2, 76, 0),
(100, 100, 0, 1, 77, 0),
(100, 100, 0, 1, 78, 0),
(100, 100, 3, 83, 79, 0),
(100, 100, 0, 1, 80, 0);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Utilisateur_id` int(11) NOT NULL,
  `Utilisateur_Login` varchar(50) NOT NULL,
  `Utilisateur_Motdepasse` varchar(100) NOT NULL,
  `Statut` varchar(6) NOT NULL DEFAULT 'membre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`Utilisateur_id`, `Utilisateur_Login`, `Utilisateur_Motdepasse`, `Statut`) VALUES
(0, 'mateo_daponte', '$2y$10$vneD0anUwEkzjlIiF3LoYOoWBICC3XukgNcqksdfhRv/LRUWMYkwK', 'admin'),
(4, 'juliette_m', '$2y$10$T5WLUydUqi9i8huWoOUFOuvrY1TbitNVvahWc8zrzMNEE4dUoYzau', 'membre'),
(5, 'correcteur', '$2y$10$1ZOqOuYzfkEXtMIQPkXWBeo6NJyBCs4T/WXTlw7h72pmYMFEjLJIG', 'membre'),
(6, 'correcteur_admin', '$2y$10$1ZOqOuYzfkEXtMIQPkXWBeo6NJyBCs4T/WXTlw7h72pmYMFEjLJIG', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choix`
--
ALTER TABLE `choix`
  ADD PRIMARY KEY (`Choix_id`),
  ADD KEY `Paragraphe_id` (`Paragraphe_id`),
  ADD KEY `Envoi_id` (`Envoi_id`);

--
-- Indexes for table `histoire`
--
ALTER TABLE `histoire`
  ADD PRIMARY KEY (`Histoire_id`),
  ADD KEY `Histoire_id1erParagraphe` (`Histoire_id1erParagraphe`);

--
-- Indexes for table `paragraphe`
--
ALTER TABLE `paragraphe`
  ADD PRIMARY KEY (`Paragraphe_id`);

--
-- Indexes for table `progression`
--
ALTER TABLE `progression`
  ADD PRIMARY KEY (`Partie_id`),
  ADD KEY `Paragraphe_id` (`Paragraphe_id`),
  ADD KEY `Histoire_id` (`Histoire_id`),
  ADD KEY `Utilisateur_id` (`Utilisateur_id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Utilisateur_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choix`
--
ALTER TABLE `choix`
  MODIFY `Choix_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `histoire`
--
ALTER TABLE `histoire`
  MODIFY `Histoire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paragraphe`
--
ALTER TABLE `paragraphe`
  MODIFY `Paragraphe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `progression`
--
ALTER TABLE `progression`
  MODIFY `Partie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Utilisateur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `choix`
--
ALTER TABLE `choix`
  ADD CONSTRAINT `choix_ibfk_1` FOREIGN KEY (`Envoi_id`) REFERENCES `paragraphe` (`Paragraphe_id`),
  ADD CONSTRAINT `choix_ibfk_2` FOREIGN KEY (`Paragraphe_id`) REFERENCES `paragraphe` (`Paragraphe_id`);

--
-- Constraints for table `histoire`
--
ALTER TABLE `histoire`
  ADD CONSTRAINT `histoire_ibfk_1` FOREIGN KEY (`Histoire_id1erParagraphe`) REFERENCES `paragraphe` (`Paragraphe_id`);

--
-- Constraints for table `progression`
--
ALTER TABLE `progression`
  ADD CONSTRAINT `progression_ibfk_1` FOREIGN KEY (`Paragraphe_id`) REFERENCES `paragraphe` (`Paragraphe_id`),
  ADD CONSTRAINT `progression_ibfk_2` FOREIGN KEY (`Histoire_id`) REFERENCES `histoire` (`Histoire_id`),
  ADD CONSTRAINT `progression_ibfk_3` FOREIGN KEY (`Utilisateur_id`) REFERENCES `utilisateur` (`Utilisateur_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
