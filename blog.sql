-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 08 fév. 2020 à 17:05
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(150) CHARACTER SET utf8 NOT NULL,
  `texte` text CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `publie` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `texte`, `date`, `publie`) VALUES
(1, 'Les chats', 'Le Chat domestique (Felis silvestris catus) est la sous-espèce issue de la domestication du Chat sauvage, mammifère carnivore de la famille des Félidés.\r\n\r\nIl est l’un des principaux animaux de compagnie et compte aujourd’hui une cinquantaine de races différentes reconnues par les instances de certification. Dans de très nombreux pays, le chat entre dans le cadre de la législation sur les carnivores domestiques à l’instar du chien et du furet. Essentiellement territorial, le chat est un prédateur de petites proies comme les rongeurs ou les oiseaux. Les chats ont diverses vocalisations dont les ronronnements, les miaulements, les feulements ou les grognements, bien qu’ils communiquent principalement par des positions faciales et corporelles et des phéromones.', '2019-11-07', 1),
(2, 'Les chiens', 'Le Chien (Canis lupus familiaris) est la sous-espèce domestique de Canis lupus, un mammifère de la famille des Canidés (Canidae), laquelle comprend également le Loup gris et le dingo, chien domestique retourné à l\'état sauvage.\r\n\r\nLe Loup est la première espèce animale à avoir été domestiquée par l\'Homme pour l\'usage de la chasse dans une société humaine paléolithique qui ne maîtrise alors ni l\'agriculture ni l\'élevage. La lignée du chien s\'est différenciée génétiquement de celle du Loup gris il y a environ 100 000 ans1, et les plus anciens restes confirmés de canidé différencié de la lignée du Loup sont vieux, selon les sources, de 33 000 ans2,3 ou de 12 000 ans4, donc antérieurs d\'au moins douze mille ans à ceux de toute autre espèce domestique connue. Depuis la Préhistoire, le chien a accompagné l\'être humain durant toute sa phase de sédentarisation, marquée par l\'apparition des premières civilisations agricoles. C\'est à ce moment qu\'il a acquis la capacité de digérer l\'amidon5, et que ses fonctions d\'auxiliaire d\'Homo sapiens se sont étendues. Ces nouvelles fonctions ont entraîné une différenciation accrue de la sous-espèce et l\'apparition progressive de races canines identifiables. Le chien est aujourd\'hui utilisé à la fois comme animal de travail et comme animal de compagnie. Son instinct de meute, sa domestication précoce et les caractéristiques comportementales qui en découlent lui valent familièrement le surnom de « meilleur ami de l\'Homme »6.', '2019-11-08', 1),
(3, 'Les singes', 'Les singes sont des mammifères de l\'ordre des primates, généralement arboricoles, à la face souvent glabre et caractérisés par un encéphale développé et de longs membres terminés par des doigts. Bien que leur ressemblance avec l\'Homme ait toujours frappé les esprits, la science a mis de nombreux siècles à prouver le lien étroit qui existe entre ceux-ci et l\'espèce humaine.\r\n\r\nAu sein des primates, les singes forment un infra-ordre monophylétique, si l\'on y inclut le genre Homo, nommé Simiiformes et qui se divise entre les singes du « Nouveau Monde » (Amérique centrale et méridionale) et ceux de l\'« Ancien Monde » (Afrique et Asie tropicales). Ces derniers comprennent les hominoïdes, également appelés « grands singes », dont fait partie Homo sapiens et ses ancêtres les plus proches.', '2020-01-18', 1),
(4, 'Les ours', 'Les ours forment la famille de mammifères des ursidés (Ursidae), de l\'ordre des carnivores (Carnivora). Le Grand panda, dont la classification a longtemps prêté à débat, est aujourd\'hui considéré comme un ours herbivore au sein de cette famille1,2. Il n\'existe que huit espèces d\'ours vivantes réparties dans une grande variété d\'habitats, à la fois dans l\'hémisphère Nord et dans une partie de l\'hémisphère Sud. Les ours vivent sur les continents d\'Europe, d\'Amérique du Nord, d\'Amérique du Sud, et en Asie.', '2020-01-19', 1),
(7, 'Les hérissons', 'Hérisson est un nom vernaculaire qui désigne en français divers petits mammifères insectivores disposant de poils agglomérés, durs, hérissés et piquants. Ce nom dérive du latin ericius.\r\n\r\nLes espèces les plus connues des francophones sont le Hérisson commun (Erinaceus europaeus) et le Hérisson oriental (Erinaceus concolor) mais il existe d\'autres « hérissons » sur divers continents, y compris en Asie un genre apparenté mais dont les représentants sont dépourvus de piquants : les gymnures. Ces espèces sont parfois très éloignées sur l\'arbre phylogénique, mais se ressemblent par convergence évolutive1. Plusieurs espèces comme le Hérisson de Madagascar ou « tangue » sont encore consommées dans l\'océan Indien, y compris à La Réunion, d\'autres sont au contraire protégées.', '2020-01-19', 1),
(8, 'Les pandas roux', 'Le Petit panda, Panda roux ou Panda éclatant (Ailurus fulgens) est un mammifère de la famille des Ailuridés. Il a un régime alimentaire omnivore, essentiellement végétarien, bien qu\'appartenant à l\'ordre des Carnivores comme les ratons laveurs ou les ours avec lesquels on l\'a parfois classé avec le Panda géant. Le panda roux est originaire de l\'Himalaya et du Sud-Ouest de la Chine. C\'est une espèce protégée car elle est en danger de disparition.', '2020-01-19', 1),
(9, 'Les lézards', 'Les lézards sont de petits reptiles de l\'ordre des Squamates.\r\n\r\nIls partagent le fait d\'avoir quatre pattes, des oreilles à tympan apparent sans conduit auditif externe, le corps recouvert d\'écailles et la mue. Toutes les espèces ne perdent pas leur queue (autotomie) en cas d\'agression et toutes n\'ont pas des paupières mobiles comme c\'est le cas pour les Gekkonidae et les Xantusiidae. Il en existe environ 3750 espèces.', '2020-01-30', 1),
(10, 'Les abeilles', 'Les abeilles (Anthophila) forment un clade d\'insectes hyménoptères de la superfamille des Apoïdes. Au moins 20 000 espèces d\'abeilles sont répertoriées sur la planète1 dont environ 2 000 en Europe et près de 1 000 en France2. En Europe, l\'espèce la plus connue est Apis mellifera qui, comme la plupart des abeilles à miel, appartient au genre Apis. Cependant, la majorité des abeilles ne produisent pas de miel, elles se nourrissent du nectar des fleurs. Une abeille d\'hiver peut vivre jusqu\'à 10 mois, tandis qu\'une abeille d\'été peut vivre jusqu\'à 1 mois.', '2020-02-08', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `commentaire` text CHARACTER SET utf8 NOT NULL,
  `mail` varchar(50) NOT NULL,
  `pseudo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `commentaire`, `mail`, `pseudo`, `id_article`) VALUES
(1, 'Ceci est un commentaire ! ', 'Theo@gmail.com', 'Theo', 1),
(5, 'Il est trop mignon !', 'vico@gmail.com', 'vico', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mdp` text CHARACTER SET utf8 NOT NULL,
  `sid` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mdp`, `sid`) VALUES
(5, 'Van', 'Nico', 'nico@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'a5fd83a2a75c8ad1c256a03f5a34aecd'),
(7, 'Theo', 'PHP', 'theo@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '9c6f551a14bcec29d2692a6517d33cb5');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_article` (`id_article`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `fk_id_article` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
