-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 04 déc. 2023 à 10:55
-- Version du serveur : 11.1.3-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `supercar`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `afficherDemandeSelonStatut` (IN `statut` VARCHAR(25))   BEGIN
    SELECT * FROM demande
    WHERE Statuts1 = statut;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_logins_per_date` (IN `date` VARCHAR(250))   BEGIN
    SELECT * FROM loginmonitor WHERE connectionDate LIKE CONCAT('%', date, '%');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nbInscrit` (IN `laDate` DATE, OUT `nombre` INT)   BEGIN
    SELECT COUNT(*) INTO nombre
    FROM inscriptionMonitor
    WHERE date_inscription = laDate;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `admin_connexion`
--

CREATE TABLE `admin_connexion` (
  `id_adminconnexion` int(9) NOT NULL,
  `email` varchar(55) NOT NULL,
  `mot_de_passe` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin_connexion`
--

INSERT INTO `admin_connexion` (`id_adminconnexion`, `email`, `mot_de_passe`) VALUES
(57, 'felaniaina@admin.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(69, 'felaniaina71@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(70, 'voary@admin.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441');

-- --------------------------------------------------------

--
-- Structure de la table `caroussel`
--

CREATE TABLE `caroussel` (
  `id_update` int(11) NOT NULL,
  `image1` varchar(50) NOT NULL,
  `image2` varchar(50) NOT NULL,
  `image3` varchar(50) NOT NULL,
  `image4` varchar(50) NOT NULL,
  `image5` varchar(50) NOT NULL,
  `apdn` text NOT NULL,
  `apdn1` text NOT NULL,
  `image_apdn` varchar(50) NOT NULL,
  `image_apdn1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `caroussel`
--

INSERT INTO `caroussel` (`id_update`, `image1`, `image2`, `image3`, `image4`, `image5`, `apdn`, `apdn1`, `image_apdn`, `image_apdn1`) VALUES
(1, '../Image/AMG.webp', '../Image/Huracan.webp', '../Image/Hellcat.webp', '../Image/Evo.webp', '../Image/Ford.webp', 'SuperCar est une entreprise spécialisée dans la vente de voitures neuves importées de différents pays tels que le Japon, Singapour, l\'Afrique du Sud, les États-Unis, la Chine, l\'Allemagne, la France et d\'autres. Depuis sa création en 2009, notre entreprise s\'est                        efforcée de fournir à nos clients une large gamme de voitures de qualité supérieure à des prix compétitifs. Nous avons des entrepôts de stockage à plusieurs endroits pour répondre aux besoins de nos clients.', 'Nous accordons une grande importance à la satisfaction de nos clients. C\'est pourquoi nous offrons à nos clients la possibilité d\'essayer une voiture avant de l\'acheter.  Chez SuperCar, nous sommes fiers de notre engagement envers la qualité et la satisfaction de nos clients. Nous travaillons constamment                           pour améliorer nos services et pour rester à la pointe de l\'industrie de la vente de voitures neuves.', '../Image/dealer.jpg', '../Image/mercedes.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `idcontact` int(11) NOT NULL,
  `nom_complet` varchar(78) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`idcontact`, `nom_complet`, `email`, `message`) VALUES
(758, 'nikhil mohit', 'nikhil.mohit12@gmail.co', 'bonsoir'),
(785, 'FANOMEZANTSOA Felaniaina', 'felaniaina71@gmail.com', 'bonjour'),
(786, 'FANOMEZANTSOA Felaniaina', 'felaniaina71@gmail.com', 'bonjour'),
(787, 'FEFE', 'felaniaina@admin.com', 'FEFEE'),
(795, 'huhuhu', 'felaniaina@admin.com', 'dddd');

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `ID_demande` int(11) NOT NULL,
  `idinscription` varchar(250) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `Id_Voiture` varchar(50) DEFAULT NULL,
  `marque` varchar(50) DEFAULT NULL,
  `modele` varchar(50) DEFAULT NULL,
  `details` varchar(50) DEFAULT NULL,
  `date1` date DEFAULT NULL,
  `date2` date DEFAULT NULL,
  `heure1` time DEFAULT NULL,
  `heure2` time DEFAULT NULL,
  `Statuts1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`ID_demande`, `idinscription`, `nom`, `prenom`, `email`, `Id_Voiture`, `marque`, `modele`, `details`, `date1`, `date2`, `heure1`, `heure2`, `Statuts1`) VALUES
(42, '538', 'FANOMEZANTSOA', 'Felania', 'felaniaina@admin.com', '1', 'Mercedes AMG GT', 'Mercedes', '4x4', '2023-11-01', '2023-11-02', '11:58:00', '13:58:00', 'Terminé'),
(44, '538', 'FANOMEZANTSOA', 'Felania', 'felaniaina@admin.com', '1', 'Mercedes AMG GT', 'Mercedes', '4x4', '2023-12-02', '2023-12-01', '10:14:00', '11:14:00', 'En cours'),
(45, '538', 'FANOMEZANTSOA', 'Felania', 'felaniaina@admin.com', '1', 'Mercedes AMG GT', 'Mercedes', 'dawe', '2023-12-07', '2023-12-02', '09:16:00', '11:15:00', 'En cours'),
(46, '538', 'FANOMEZANTSOA', 'Felania', 'felaniaina@admin.com', '1', 'Mercedes AMG GT', 'Mercedes', '4x4', '2023-12-04', '2023-12-04', '11:46:00', '11:47:00', 'En cours'),
(47, '538', 'FANOMEZANTSOA', 'Felania', 'felaniaina@admin.com', '2', 'Ford', 'Raptor F-150', '4x4', '2023-12-01', '2023-12-02', '11:49:00', '13:49:00', 'En cours'),
(49, '538', 'FANOMEZANTSOA', 'Felania', 'felaniaina@admin.com', '1', 'Mercedes AMG GT', 'Mercedes', '4x4', '2023-12-02', '2023-12-03', '20:26:00', '21:26:00', 'En cours'),
(51, '538', 'FANOMEZANTSOA', 'Felania', 'felaniaina@admin.com', '1', 'Mercedes AMG GT', 'Mercedes', '4x4', '2023-12-04', '2023-12-13', '11:25:00', '11:25:00', 'En cours'),
(52, '538', 'FANOMEZANTSOA', 'Felania', 'felaniaina@admin.com', '1', 'Mercedes AMG GT', 'Mercedes', '4x4', '2023-12-06', '2023-12-16', '11:26:00', '11:26:00', 'En cours'),
(53, '538', 'FANOMEZANTSOA', 'Felania', 'felaniaina@admin.com', '1', 'Mercedes AMG GT', 'Mercedes', '4x4', '2023-12-01', '2023-12-07', '11:28:00', '11:28:00', 'En cours'),
(54, '538', 'FANOMEZANTSOA', 'Felania', 'felaniaina@admin.com', '1', 'Mercedes AMG GT', 'Mercedes', '4x4', '2023-12-01', '2023-12-16', '11:33:00', '11:34:00', 'En cours'),
(55, '538', 'FANOMEZANTSOA', 'Felania', 'felaniaina@admin.com', '1', 'Mercedes AMG GT', 'Mercedes', '4x4', '2023-12-09', '2023-12-17', '11:56:00', '11:56:00', 'En cours'),
(56, '538', 'FANOMEZANTSOA', 'Felania', 'felaniaina@admin.com', '1', 'Mercedes AMG GT', 'Mercedes', '4x4', '2023-12-01', '2023-12-24', '11:57:00', '11:58:00', 'En cours');

-- --------------------------------------------------------

--
-- Structure de la table `essai`
--

CREATE TABLE `essai` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `modele` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `Statuts1` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_eve` int(11) NOT NULL,
  `Video` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Petit_txt` varchar(2000) NOT NULL,
  `Petit_titre` varchar(1000) NOT NULL,
  `Texte` varchar(5000) NOT NULL,
  `Titre` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_eve`, `Video`, `Image`, `Petit_txt`, `Petit_titre`, `Texte`, `Titre`) VALUES
(1, '../Video/4x4.mp4', '../Image/4x4.webp', 'Concours de tuning de 4x4 : une rencontre exceptionnelle pour les passionnés de tout-terrain, avec Supercar présent pour dévoiler les dernières tendances en matière de tuning et les nouveaux modèles de 4x4 les plus attendus de l\'année', 'Des passionnés d\'automobiles venus de différentes régions du pays se rassemblent pour admirer des voitures de luxe', 'Supercar est heureux de partager avec vous le retour sur le concours de tuning de 4x4, une rencontre unique qui a rassemblé les passionnés de tout-terrain et de voitures modifiées. Cet événement a été l\'occasion pour les visiteurs de découvrir les dernières tendances en matière de tuning 4x4, avec des véhicules impressionnants qui ont su attirer l\'attention de tous les participants.Le concours a eu lieu dans un endroit exceptionnel, où les visiteurs ont pu admirer les véhicules les plus puissants et les plus impressionnants du moment. Les propriétaires des 4x4 ont présenté leur véhicule avec fierté, montrant les modifications effectuées pour améliorer les performances et l\'apparence de leurs voitures.Les participants ont été jugés sur différents critères, notamment l\'esthétique, la puissance et la qualité des modifications. Les véhicules les plus impressionnants ont attiré l\'attention des visiteurs, qui ont pu discuter avec les propriétaires pour en savoir plus sur les modifications effectuées. Les représentants de Supercar étaient également présents pour partager leur expertise avec les visiteurs et pour fournir des conseils sur la manière d\'améliorer les performances et l\'apparence des 4x4. concours de tuning de 4x4 a été une occasion unique pour Supercar de dévoiler certains des nouveaux modèles de 4x4 les plus attendus de l\'année. Les visiteurs ont pu admirer ces véhicules et découvrir les dernières innovations en matière de tout-terrain.En somme, le concours de tuning de 4x4 a été un événement mémorable pour les passionnés de tout-terrain et de voitures modifiées. Nous sommes fiers d\'avoir pu partager notre passion pour les 4x4 avec tous les visiteurs et nous espérons les revoir très bientôt pour de nouvelles rencontres automobiles incroyables.\', \'Concours de tuning de 4x4\'),\r\n(2, \'../Video/car meet.mp4\', \'../Image/car meet.jpg\', \'Rencontre de voitures de prestige : l\'événement automobile de l\'année rassemble les passionnés de l\'automobile venus de tout le pays pour découvrir les dernières nouveautés en matière de voitures haut de gamme, avec Supercar à la tête de la rencontre\', \'Des passionnés d\'automobiles venus de différentes régions du pays se rassemblent pour admirer des voitures de luxe., Supercar est fier de partager avec vous l\'un des événements automobiles les plus attendus de l\'année, qui a rassemblé des amateurs de voitures des quatre coins du pays pour une rencontre exceptionnelle. Cette occasion unique a permis à des passionnés de l\'automobile de se rencontrer, d\'échanger et de découvrir les dernières nouveautés en matière de voitures de prestige.L\'événement a eu lieu dans un lieu prestigieux où les visiteurs ont pu admirer les voitures les plus exclusives et les plus impressionnantes du moment. Des représentants de Supercar étaient présents pour répondre aux questions des visiteurs et pour partager leur expertise en matière de voitures de luxe.Les voitures exposées étaient toutes plus impressionnantes les unes que les autres, avec des designs innovants et des performances époustouflantes. Les visiteurs ont pu admirer les derniers modèles de Supercar, ainsi que d\'autres marques prestigieuses telles que Ferrari, Lamborghini, Porsche, et bien d\'autres encore.Les propriétaires de voitures de prestige étaient également présents pour partager leur passion avec les visiteurs et pour échanger des conseils et des astuces sur l\'entretien et la conduite de ces véhicules exceptionnels. L\'événement a été l\'occasion pour Supercar de dévoiler certains des nouveaux modèles les plus attendus de l\'année. Ces voitures ont suscité l\'admiration de tous les visiteurs, qui ont été impressionnés par les performances et la beauté de ces véhicules. En somme, cette rencontre de voitures de prestige a été un véritable succès pour Supercar et pour tous les passionnés de l\'automobile qui ont participé à cet événement unique. Nous sommes fiers d\'avoir pu partager notre passion pour les voitures de luxe avec tous les visiteurs et nous espérons les revoir très bientôt pour de nouvelles expériences automobiles incroyables.', 'Rencontre de voitures de prestige'),
(2, '../Video/car meet.mp4', '../Image/car meet.webp', 'Rencontre de voitures de prestige : l\'événement automobile de l\'année rassemble les passionnés de l\'automobile venus de tout le pays pour découvrir les dernières nouveautés en matière de voitures haut de gamme, avec Supercar à la tête de la rencontre', 'Des passionnés d\'automobiles venus de différentes régions du pays se rassemblent pour admirer des voitures de luxe.', 'Supercar est fier de partager avec vous l\'un des événements automobiles les plus attendus de l\'année, qui a rassemblé des amateurs de voitures des quatre coins du pays pour une rencontre exceptionnelle. Cette occasion unique a permis à des passionnés de l\'automobile de se rencontrer, d\'échanger et de découvrir les dernières nouveautés en matière de voitures de prestige.L\'événement a eu lieu dans un lieu prestigieux où les visiteurs ont pu admirer les voitures les plus exclusives et les plus impressionnantes du moment. Des représentants de Supercar étaient présents pour répondre aux questions des visiteurs et pour partager leur expertise en matière de voitures de luxe. Les voitures exposées étaient toutes plus impressionnantes les unes que les autres, avec des designs innovants et des performances époustouflantes. Les visiteurs ont pu admirer les derniers modèles de Supercar, ainsi que d\'autres marques prestigieuses telles que Ferrari, Lamborghini, Porsche, et bien d\'autres encore. Les propriétaires de voitures de prestige étaient également présents pour partager leur passion avec les visiteurs et pour échanger des conseils et des astuces sur l\'entretien et la conduite de ces véhicules exceptionnels. L\'événement a été l\'occasion pour Supercar de dévoiler certains des nouveaux modèles les plus attendus de l\'année. Ces voitures ont suscité l\'admiration de tous les visiteurs, qui ont été impressionnés par les performances et la beauté de ces véhicules. En somme, cette rencontre de voitures de prestige a été un véritable succès pour Supercar et pour tous les passionnés de l\'automobile qui ont participé à cet événement unique. Nous sommes fiers d\'avoir pu partager notre passion pour les voitures de luxe avec tous les visiteurs et nous espérons les revoir très bientôt pour de nouvelles expériences automobiles incroyables.', 'Rencontre de voitures de prestige'),
(3, '..\\Video\\bmw showroom.mp4', '../Image/testtttt.webp', 'Quand le luxe rencontre l\'excellence : retour sur le showroom exceptionnel de Supercar en collaboration avec BMW, présentant les dernières innovations en matière de voitures haut de gamme', 'Retour sur notre showroom exceptionnel en collaboration avec BMW', 'Nous avons récemment eu l\'opportunité de collaborer avec BMW pour organiser un showroom exceptionnel. Cet événement a été l\'occasion pour les amateurs de voitures de découvrir les dernières innovations en matière de voitures de luxe. Le showroom s\'est tenu dans un lieu prestigieux, où les visiteurs ont pu admirer les derniers modèles de BMW. Les deux marques ont présenté une sélection de voitures sophistiquées, élégantes et performantes, qui ont attiré l\'attention des visiteurs dès leur arrivée. Les représentants de Supercar et BMW étaient présents tout au long de l\'événement pour répondre aux questions des visiteurs et leur fournir des informations détaillées sur les caractéristiques et les fonctionnalités des véhicules présentés.    Les visiteurs ont été particulièrement impressionnés par la qualité de la présentation, qui mettait en valeur la beauté et l\'excellence des voitures exposées. Les designs modernes et élégants de BMW ont suscité l\'admiration de tous les amateurs de voitures présents. Le showroom a également été l\'occasion pour Supercar et BMW de dévoiler de nouveaux modèles qui ont attiré l\'attention de nombreux visiteurs. Ces voitures ont été conçues en tenant compte des dernières innovations technologiques, offrant des performances exceptionnelles et une expérience de conduite unique.  En somme, le showroom a été un véritable succès pour Supercar et BMW, qui ont su offrir une expérience exceptionnelle aux visiteurs en présentant leur savoir-faire en matière de voitures de luxe. Nous remercions tous les visiteurs qui ont assisté à l\'événement et nous espérons les revoir très bientôt pour leur offrir de nouvelles expériences incroyables.', 'Showroom BMW\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `idinscription` int(9) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `nom` varchar(97) NOT NULL,
  `email` varchar(47) NOT NULL,
  `mot_de_passe` varchar(12) NOT NULL,
  `numero_de_telephone` varchar(20) NOT NULL,
  `civilite` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`idinscription`, `prenom`, `nom`, `email`, `mot_de_passe`, `numero_de_telephone`, `civilite`) VALUES
(538, 'Felania', 'FANOMEZANTSOA', 'felaniaina@admin.com', '12345', '0331138389', 'Malagasy');

--
-- Déclencheurs `inscription`
--
DELIMITER $$
CREATE TRIGGER `after_inscription_trigger` AFTER INSERT ON `inscription` FOR EACH ROW INSERT INTO inscriptionMonitor (date_heure, prenom, nom, email)
VALUES (NOW(), NEW.prenom, NEW.nom, NEW.email)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `inscriptionmonitor`
--

CREATE TABLE `inscriptionmonitor` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscriptionmonitor`
--

INSERT INTO `inscriptionmonitor` (`id`, `prenom`, `nom`, `email`, `date_inscription`) VALUES
(1, 'cfc', 'Fanomezantsoa', 'felania@admin.com', '2023-11-27'),
(2, 'voary', 'Fanomezantsoa', 'voary@gmail.com', '2023-12-01'),
(3, 'voary', 'Fanomezantsoa', 'nikhil.mohit@admin.com', '2023-12-01'),
(4, 'cfc', 'Fe', 'nikhil.mt@admin.com', '2023-12-01'),
(5, 'f', 'gdsrests324534', 'nik.@admin.com', '2023-12-01'),
(6, 'voary', 'gdsrests324534', 'nikhil.@admin.com', '2023-12-01'),
(7, 'voary', 'Fe', 'aaaa@admin.com', '2023-12-01'),
(8, 'voary', 'Fanomezantsoa', 'felaniai@admin.com', '2023-12-01'),
(9, 'voary', 'Fe', 'felani@admin.com', '2023-12-01'),
(10, 'voary', 'test', 'felaniai@admin.com', '2023-12-01'),
(11, 'voary', 'Fanomezantsoa', 'felania@admin.com', '2023-12-03');

-- --------------------------------------------------------

--
-- Structure de la table `loginmonitor`
--

CREATE TABLE `loginmonitor` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `success` tinyint(1) NOT NULL,
  `connectionDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `loginmonitor`
--

INSERT INTO `loginmonitor` (`id`, `email`, `success`, `connectionDate`) VALUES
(20, 'felaniaina@admin.com', 1, '2023-11-20 10:56:30'),
(22, 'felaniaina@admin.com', 1, '2023-11-20 11:10:33'),
(23, 'felaniaina@admin.com', 1, '2023-11-20 11:41:49'),
(24, 'felaniaina@admin.com', 1, '2023-11-25 21:20:34'),
(25, 'felaniaina@admin.com', 0, '2023-11-27 11:02:58'),
(26, 'felaniaina@admin.com', 1, '2023-11-27 11:03:04'),
(27, 'felaniaina@admin.com', 1, '2023-11-27 11:05:15'),
(28, 'voary@admin.com', 1, '2023-11-27 11:05:40'),
(29, 'felaniaina@admin.com', 1, '2023-11-27 19:44:21'),
(30, 'felaniaina@admin.com', 1, '2023-11-28 11:17:13'),
(31, 'felaniaina@admin.com', 1, '2023-11-28 11:30:14'),
(32, 'felaniaina@admin.com', 1, '2023-11-28 11:39:04'),
(33, 'felaniaina@admin.com', 1, '2023-11-28 12:33:08'),
(34, 'felaniaina@admin.com', 1, '2023-11-29 10:18:40'),
(35, 'felaniaina@admin.com', 1, '2023-11-29 12:27:15'),
(36, 'felaniaina@admin.com', 1, '2023-12-01 08:44:29'),
(37, 'felaniaina@admin.com', 1, '2023-12-03 20:01:44'),
(38, 'felaniaina@admin.com', 1, '2023-12-03 20:12:49'),
(39, 'felaniaina@admin.com', 0, '2023-12-03 20:40:38'),
(40, 'felaniaina@admin.com', 1, '2023-12-03 20:40:43');

-- --------------------------------------------------------

--
-- Structure de la table `visiteurs`
--

CREATE TABLE `visiteurs` (
  `id` int(11) NOT NULL,
  `nombre_visiteurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `visiteurs`
--

INSERT INTO `visiteurs` (`id`, `nombre_visiteurs`) VALUES
(13, 48);

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `Id_Voiture` int(11) NOT NULL,
  `Marque` varchar(50) DEFAULT NULL,
  `Modele` varchar(50) NOT NULL,
  `idcategorie` varchar(50) DEFAULT NULL,
  `Annee` varchar(50) DEFAULT NULL,
  `Specification` varchar(3000) DEFAULT NULL,
  `Prix` varchar(50) DEFAULT NULL,
  `Image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`Id_Voiture`, `Marque`, `Modele`, `idcategorie`, `Annee`, `Specification`, `Prix`, `Image`) VALUES
(1, 'Mercedes AMG GT', 'Mercedes', 'SUV', '2015', 'La Mercedes AMG GT S est une voiture de sport haute performance qui a été introduite en 2017. Elle est équipée d\'un moteur V8 biturbo de 4,0 litres qui développe une puissance de 585 chevaux et un couple de 700 Nm. Elle peut accélérer de 0 à 100 km/h en seulement 3,6 secondes et atteindre une vitesse maximale de 318 km/h. La voiture dispose également d\'un système de suspension adaptative, d\'un aérodynamisme optimisé, d\'un système de freinage en céramique.', '120 680$', '../Image/mercedes.jpg'),
(2, 'Ford', 'Raptor F-150', '4x4', '2020', ' Ford Raptor F-150 2020 est un camion tout-terrain haut de gamme conçu pour les aventuriers qui cherchent à explorer la nature sauvage. Elle est équipée d\'un moteur V6 biturbo de 3,5 litres qui produit 450 chevaux et 510 lb-pi de couple, couplé à une transmission automatique à 10 vitesses. Elle dispose d\'une suspension haute performance qui offre une conduite confortable même sur les terrains les plus accidentés, ainsi que de pneus tout-terrain pour une traction maximale.', '50 700 €', '../Image/Ford.webp'),
(3, 'Dodge', 'Challenger SRT Hellcat', 'Sport', '2020', 'Challenger Hellcat 2020 est une voiture de sport américaine emblématique avec un design agressif et une performance incroyable. Voici quelques-unes de ses spécifications clés:Moteur: V8 suralimenté de 6,2 litres produisant 717 chevaux et 650 lb-pi de coupleTransmission: Boîte de vitesses automatique à huit rapportsAccélération: 0 à 60 mph en environ 3,6 secondesVitesse de pointe: 320 km/hFreins: Freins à disque Brembo hautes performancesSuspensions: Suspension adaptative à trois modesIntérieur: Sièges sport en cuir, écran tactile de 8,4 pouces avec système d\'infodivertissement Uconnect, système audio Harman Kardon à 18 haut-parleurs', '57 1990 €', '../Image/Hellcat.webp'),
(4, 'Mitsubishi', 'Lancer Evolution IX', 'Sport', '2008', 'Voici quelques spécifications pour la Mitsubishi Lancer Evolution IX, qui était produite de 2005 à 2007 :Moteur: 2,0 litres turbocharged (4G63) inline 4Puissance: 280 chevauxCouple: 400 NmTransmission: boîte manuelle à 6 vitessesPoids: environ 1 430 kgAccélération de 0 à 100 km/h: environ 5,2 secondesVitesse maximale: environ 250 km/hSystème de transmission intégrale (AWD) avec différentiel central actif (ACD) et différentiel arrière actif (AYC)Suspension avant: jambes de force MacPhersonSuspension arrière: multibras indépendanteFreins avant: disques ventilés de 320 mm avec étriers Brembo à 4 pistonsFreins arrière: disques ventilés de 300 mm avec étriers Brembo à 2 pistonsCeci n\'est pas une liste exhaustive de toutes les spécifications de la Mitsubishi Lancer Evolution IX, mais cela vous donne une idée générale de ses caractéristiques principales.', '40 050 €', '../Image/Evo.webp'),
(5, 'Lamborghini', 'Huracan Evo', 'Sport', '2021', 'La Lamborghini Huracán EVO 2021 est une voiture de sport haut de gamme qui offre des performances exceptionnelles et une esthétique saisissante. Elle est équipée d\'un moteur V10 de 5,2 litres qui développe une puissance de 640 chevaux, capable de propulser la voiture de 0 à 100 km/h en seulement 2,9 secondes. Elle dispose également d\'une transmission intégrale et d\'une suspension active pour une tenue de route optimale. La Lamborghini Huracán EVO 2021 est équipée d\'une transmission automatique à double embrayage à sept rapports, offrant des changements de vitesse rapides et fluides. Elle possède également un système de direction à assistance électrique pour une précision de conduite accrue.', '191 750 €', '../Image/1series.jpg'),
(6, 'Mercedes', 'AMG S 65 Cabriolet', 'Berline', '2017', 'La Mercedes-AMG S 65 est une voiture de luxe haut de gamme produite par Mercedes-Benz en 2017. Voici quelques-unes de ses spécifications clés :\r\n\r\nMoteur : V12 biturbo de 6,0 litres\r\nPuissance : 630 chevaux\r\nCouple : 1 000 Nm\r\nTransmission : automatique à 7 vitesses\r\nAccélération de 0 à 100 km/h : 4,3 secondes\r\nVitesse de pointe : 250 km/h (limitée électroniquement)\r\nPoids : 2 250 kg\r\nConsommation de carburant : 19,6 L/100 km en cycle mixte', '217 183 €', '../Image/C-Class.webp'),
(7, 'Ford', 'Focus RS', 'Hatchback', '2020', 'La Ford Focus RS 2020 est une voiture compacte sportive haute performance produite par Ford. Voici quelques-unes de ses spécifications clés :\r\n\r\nMoteur : un quatre cylindres turbo de 2,3 litres\r\nPuissance : 350 chevaux\r\nCouple : 440 Nm\r\nTransmission : manuelle à six vitesses\r\n0-100 km/h : 4,7 secondes\r\nVitesse maximale : 266 km/h\r\nPoids : 1 599 kg\r\nSystème de traction intégrale : Ford Performance All-Wheel Drive\r\nSuspension : suspension sport ajustable\r\nFreins : étriers Brembo à quatre pistons à l\'avant, disques ventilés de 350 mm à l\'avant et de 302 mm à l\'arrière.', '38 600 €', '../Image\\FORD FOCUS.webp'),
(8, 'Lamborghini', 'Urus S', 'SUV', '2023', 'La Lamborghini Urus S est un SUV de luxe et de haute performance conçu pour offrir une expérience de conduite inoubliable. Voici quelques-unes de ses spécifications clés:\r\n\r\nMoteur: V8 biturbo de 4,0 litres\r\nPuissance maximale: 650 chevaux\r\nCouple maximal: 850 Nm\r\nTransmission: Boîte de vitesses automatique à 8 rapports\r\nAccélération: 0 à 100 km/h en 3,6 secondes\r\nVitesse maximale: 305 km/h\r\nFreins: Disques de frein en céramique de 440 mm à l\'avant et 370 mm à l\'arrière\r\nSuspension: Suspension pneumatique active et système de stabilisation anti-roulis\r\nDimensions: Longueur de 5,11 mètres, largeur de 2,02 mètres et hauteur de 1,64 mètre\r\nPoids: 2 200 kg\r\nCapacité de chargement: 616 litres (1 596 litres avec les sièges arrière rabattus)', '195 538 €', '../Image/Urus.jpg'),
(9, 'Mercedes', 'GLE Coupe', 'SUV', '2022', 'La Mercedes GLE Coupe 2022 est un SUV de luxe à cinq portes qui offre un mélange de sportivité et de luxe. Voici quelques spécifications clés :\r\n\r\nMoteur : La Mercedes GLE Coupe 2022 est équipée d\'un moteur V6 biturbo de 3,0 litres, qui produit une puissance de 362 chevaux et un couple de 369 lb-pi.\r\n\r\nTransmission : La voiture est équipée d\'une transmission automatique à 9 vitesses.\r\n\r\nPerformances : La Mercedes GLE Coupe 2022 peut accélérer de 0 à 60 miles par heure en 5,7 secondes et atteindre une vitesse maximale de 155 miles par heure.\r\n\r\nCaractéristiques de sécurité : La voiture est équipée de diverses fonctionnalités de sécurité avancées, notamment un système d\'alerte de collision avant, un système de freinage automatique d\'urgence, un régulateur de vitesse adaptatif et un avertissement de sortie de voie.\r\n\r\nCaractéristiques de luxe : La Mercedes GLE Coupe 2022 dispose d\'un intérieur élégant et spacieux avec des sièges en cuir, un système de climatisation à deux zones, un systèm', '91 350 €', '../Image/GLE.webp'),
(10, 'Mercedes', 'AMG G 63 Brabus B700', 'SUV', '2023', 'La Mercedes G63 Brabus B700 2023 est une version améliorée de la Mercedes-Benz Classe G. Elle est équipée d\'un moteur V8 biturbo de 4,0 litres développant 700 chevaux et 701 lb-pi de couple, ce qui lui permet d\'atteindre une vitesse maximale de 240 km/h et d\'accélérer de 0 à 100 km/h en seulement 4,3 secondes.\r\n\r\nLa transmission intégrale 4MATIC+ de Mercedes est de série et elle est associée à une boîte de vitesses automatique à neuf rapports. La voiture dispose également d\'un système de suspension amélioré qui offre une meilleure maniabilité et un confort de conduite amélioré.\r\n\r\nLes améliorations de Brabus sur cette voiture incluent des jantes en alliage de 23 pouces, un kit carrosserie aérodynamique, des freins de haute performance, un échappement sport et un intérieur luxueux en cuir avec des accents en fibre de carbone. En termes de technologie, la voiture est équipée d\'un système d\'infodivertissement avec écran tactile de 12,3 pouces, un système de son surround et un large éventa', '165 473 €', '../Image/G63.webp'),
(11, 'Mercedes', 'Maybach', 'Berline', '2023', 'La Mercedes-Maybach est une voiture de luxe haut de gamme produite par la marque allemande Mercedes-Benz. La Maybach est connue pour son intérieur spacieux et luxueux, sa technologie de pointe, ses performances élevées et son style élégant.\r\n\r\nVoici quelques spécifications de la Mercedes Maybach 2023 :\r\n\r\nMoteur : V8 biturbo de 4,0 litres\r\nPuissance : 621 chevaux\r\nCouple : 738 lb-pi\r\nTransmission : Automatique à 9 vitesses\r\nAccélération : 0-100 km/h en 4,5 secondes\r\nVitesse maximale : 250 km/h (limitée électroniquement)\r\nLongueur : 5,47 mètres\r\nLargeur : 1,95 mètre\r\nHauteur : 1,51 mètre\r\nPoids : 2 745 kg\r\nCapacité de carburant : 88 litres\r\nConsommation de carburant : 15,8 L/100 km (ville), 11,5 L/100 km (autoroute)\r\nCapacité de la malle : 500 litres\r\nLa Mercedes Maybach 2023 est également équipée d\'un système de suspension adaptative, de phares LED adaptatifs, de sièges chauffants et ventilés en cuir Nappa, d\'un toit panoramique, d\'un système audio haute-fidélité, d\'un affichage tête h', '324 050 €', '../Image/m4.webp'),
(12, 'BMW', 'i8 Coupe', 'Sport', '2020', 'La BMW i8 Coupe 2020 est une voiture de sport hybride rechargeable avec un style futuriste. Elle est équipée d\'un moteur à essence trois cylindres de 1,5 litre et d\'un moteur électrique qui offre une puissance combinée de 369 chevaux. Elle peut atteindre une vitesse maximale de 250 km/h et accélérer de 0 à 100 km/h en seulement 4,4 secondes. La voiture peut parcourir jusqu\'à 55 km en mode électrique pur et dispose d\'une autonomie totale de 500 km en utilisant les deux moteurs. La BMW i8 Coupe 2020 est également équipée d\'une suspension adaptative et d\'un système de freinage régénératif pour améliorer l\'efficacité énergétique.', '135 700 €', '../Image/i8.webp'),
(13, 'BMW', 'M8 Coupe Competition', 'Sport', '2023', 'La BMW M8 Coupe Competition est une voiture sportive haut de gamme produite par le constructeur automobile allemand BMW. Voici quelques spécifications clés :\r\n\r\nMoteur : V8 biturbo de 4,4 litres\r\nPuissance maximale : 625 chevaux\r\nCouple maximal : 750 Nm\r\nTransmission : transmission intégrale xDrive avec une boîte de vitesses automatique à 8 rapports\r\nAccélération de 0 à 100 km/h : 3,2 secondes\r\nVitesse de pointe : 305 km/h\r\nSuspension adaptative M avec amortissement piloté\r\nDifférentiel arrière M actif\r\nFreins M Sport avec étriers de frein bleus à 6 pistons à l\'avant et 4 pistons à l\'arrière\r\nJantes en alliage léger de 20 pouces avec pneus Michelin Pilot Sport 4S\r\nSystème d\'échappement M Sport en acier inoxydable avec quatre sorties d\'échappement\r\nLa BMW M8 Coupe Competition est une voiture de sport luxueuse et performante qui offre une conduite dynamique avec une technologie de pointe.', '245 335 €', '../Image/M8.webp'),
(14, 'BMW', 'X6 M Competition', 'SUV', '2022', 'La BMW X6 M Competition est un SUV sportif haut de gamme offrant une expérience de conduite dynamique. Voici quelques-unes de ses spécifications clés :\r\n\r\nMoteur : V8 biturbo de 4,4 litres\r\nPuissance : 617 chevaux\r\nCouple : 553 lb-pi\r\nTransmission : automatique à huit vitesses avec transmission intégrale xDrive\r\nAccélération : de 0 à 100 km/h en 3,8 secondes\r\nVitesse maximale : 250 km/h (limitée électroniquement)\r\nSuspension : suspension adaptative M avec amortisseurs à commande électronique\r\nFreins : freins à disque ventilé M Sport avec étriers bleus\r\nIntérieur : intérieur en cuir Merino et alcantara avec sièges sport M et volant en cuir M\r\nEn résumé, la BMW X6 M Competition est un SUV puissant et sportif avec une performance impressionnante et un intérieur de luxe.', '124 305 €', '../Image/X6.webp'),
(15, 'BMW', 'M4 competition', 'Sport', '2022', 'Le dernier modèle de la BMW M4 a été lancé en 2021 et il est disponible en version standard et en version compétition. Les spécifications de la BMW M4 compétition sont les suivantes:\r\n\r\nMoteur: Twin-Turbo 3,0 litres I6\r\nPuissance: 503 chevaux\r\nCouple: 479 lb-pi\r\nTransmission: Manuelle à 6 vitesses ou automatique à 8 vitesses\r\nVitesse maximale: 250 km/h (limitée électroniquement)\r\nAccélération de 0 à 100 km/h: 3,9 secondes (environ)\r\nPoids: 1 735 kg (environ)', '112 500 €', '../Image/m4.webp'),
(16, 'BMW', '1 series', 'Hatchback', '2023', 'La BMW Série 1 est une berline compacte produite par le constructeur automobile allemand BMW. Elle est proposée avec des motorisations allant de 102 à 306 chevaux, et est disponible en version propulsion ou quatre roues motrices xDrive. La BMW Série 1 est équipée de technologies avancées telles que la connectivité Bluetooth, un écran tactile haute résolution, un système de navigation, des caméras de recul, un régulateur de vitesse adaptatif et des systèmes de sécurité avancés. Elle est également appréciée pour son design sportif et élégant, avec une calandre imposante et des lignes dynamiques. La BMW Série 1 est souvent considérée comme l\'une des meilleures berlines compactes du marché en termes de performances et de confort de conduite.', '34 072 €', '../Image/1series.jpg'),
(17, 'Mercedes', 'A 180', 'Hatchback', '2023', 'La Mercedes A 180 est une voiture compacte produite par la marque allemande Mercedes-Benz. Voici quelques-unes de ses spécifications :\r\n\r\nMoteur : 4 cylindres en ligne essence\r\nPuissance : 136 ch\r\nTransmission : boîte manuelle à 6 vitesses ou boîte automatique à double embrayage 7G-DCT\r\nAccélération de 0 à 100 km/h : 8,9 secondes\r\nVitesse maximale : 202 km/h\r\nConsommation de carburant combinée : 5,6-5,1 L/100 km\r\nÉmissions de CO2 combinées : 127-117 g/km\r\nDimensions : longueur de 4 419 mm, largeur de 1 796 mm et hauteur de 1 440 mm\r\nPoids : 1 330 kg (version boîte manuelle) ou 1 350 kg (version boîte automatique)', '37 949 €', '../Image/A180.webp'),
(18, 'Ford', 'Ranger Raptor', '4x4', '2023', 'La Ford Ranger Raptor 2023 est un 4x4 haute performance conçue pour les terrains les plus difficiles. Elle est équipée d\'un moteur turbo diesel de 2,0 litres, développant une puissance de 213 chevaux et un couple de 500 Nm. La transmission est automatique à dix rapports, avec une boîte de transfert à deux vitesses. Le système de suspension à bras triangulaires offre une garde au sol de 283 mm et permet une grande amplitude de débattement pour absorber les chocs les plus violents. Les pneus tout-terrain BF Goodrich et les freins à disque ventilés à l\'avant et à l\'arrière assurent une excellente adhérence et un freinage puissant. L\'intérieur est spacieux et confortable, avec des sièges en cuir et des équipements haut de gamme, tels que le système d\'infodivertissement SYNC 4 et le système de son B&O. La camionnette est également équipée de nombreuses fonctionnalités de sécurité, telles que la caméra de recul, le régulateur de vitesse adaptatif et le système de freinage d\'urgence.', '68 400 €', '../Image/ranger.jpg'),
(59, 'Mercedes', 'X-Class', '4x4', '2020', 'La Mercedes X-Class est un pick-up haut de gamme qui a été produit de 2017 à 2020. Voici quelques-unes de ses spécifications pour l\'année 2019 :Moteurs : 2,3 litres Diesel quatre cylindres (163 ou 190 chevaux) et 3,0 litres V6 Diesel (258 chevaux).Boîte de vitesses : manuelle à six rapports ou automatique à sept rapports.Capacité de charge utile : jusqu\'à 1 042 kg.Capacité de remorquage : jusqu\'à 3 500 kg.Système de traction : 4 roues motrices avec différentiel arrière à glissement limité.Dimensions : longueur de 5,34 mètres, largeur de 1,92 mètre et hauteur de 1,82 mètre.Équipements de série : climatisation, régulateur de vitesse, système audio avec écran tactile, caméra de recul, jantes en alliage, phares à LED, etc.Veuillez noter que la production de la Mercedes X-Class a été interrompue en mai 2020.', '51708 €', '../Image/Xclass.webp'),
(60, 'Mitsubishi', 'Triton GLX', '4x4', '2023', 'La Mitsubishi Triton 2023 est une camionnette robuste et fiable conçue pour les travaux lourds et les aventures tout-terrain. Voici quelques-unes de ses spécifications :\\r\\n\\r\\nMoteur : diesel de 2,4 litres à quatre cylindres, capable de produire jusqu\\\'à 178 chevaux et 317 lb-pi de couple\\r\\nTransmission : manuelle à six vitesses ou automatique à six vitesses avec mode manuel et palettes de changement de vitesse au volant\\r\\nCapacité de remorquage : jusqu\\\'à 3 100 kg (6 834 lb)\\r\\nCapacité de charge utile : jusqu\\\'à 1 080 kg (2 381 lb)\\r\\nSuspension arrière : suspension multibras pour une meilleure stabilité et une meilleure tenue de route\\r\\nSystème de traction intégrale : avec un choix de modes de conduite, y compris le mode 4x4 pour une conduite tout-terrain\\r\\nCaractéristiques de sécurité : comprenant le contrôle de stabilité électronique, le contrôle de traction actif, l\\\'assistance au freinage d\\\'urgence, l\\\'avertissement de collision avant, l\\\'alerte de sortie de voie et plus encore.', '28 200 €', '../Image/triton.webp'),
(61, 'Mitsubishi', 'Outlander PHEV', 'SUV', '2023', 'La Mitsubishi Outlander PHEV est un SUV hybride rechargeable qui combine un moteur à essence de 2,4 litres avec deux moteurs électriques pour produire une puissance combinée de 221 chevaux. Il est équipé d\\\'une transmission à variation continue (CVT) et d\\\'une traction intégrale. La batterie lithium-ion de 13,8 kWh permet une autonomie électrique allant jusqu\\\'à 24 miles (38 km) selon l\\\'Environmental Protection Agency (EPA) des États-Unis. La consommation de carburant combinée est de 74 miles par gallon équivalent (MPGe) ou 3,2 litres aux 100 km, ce qui en fait l\\\'un des véhicules les plus économes en carburant de sa catégorie. La Mitsubishi Outlander PHEV est également équipée d\\\'un grand nombre de caractéristiques de sécurité et de technologie, y compris un système d\\\'infodivertissement compatible avec Apple CarPlay et Android Auto, une caméra de recul et une suite de sécurité active comprenant des capteurs de stationnement, un régulateur de vitesse adaptatif et un avertisseur de collision avant avec freinage d\\\'urgence autonome.', '42 665 €', '../Image/outlander.jpg'),
(63, 'Ford', 'Fusion', 'Berline', '2021', 'La Ford Fusion est une berline familiale produite par le constructeur automobile américain Ford. Voici quelques spécifications pour le modèle 2020 :\\r\\n\\r\\nMoteurs disponibles : 4 cylindres de 2,5 litres, 4 cylindres turbo de 1,5 litre, 4 cylindres turbo de 2,0 litres, hybride de 2,0 litres, hybride enfichable de 2,0 litres Puissance : varie de 175 à 245 chevaux selon le moteur choisi ransmission : automatique à 6 ou 8 rapports Consommation de carburant : varie selon le moteur et la configuration, allant de 6,9 à 9,4 litres aux 100 kilomètres en ville et de 5,5 à 6,2 litres aux 100 kilomètres sur autoroute Dimensions : longueur de 4 872 mm, largeur de 1 852 mm, hauteur de 1 468 mm et empattement de 2 850 mm Capacité de la boîte à gants : 6,9 litres Capacité du coffre : 453 litres Équipements : système audio de 6 haut-parleurs, système de navigation, écran tactile de 8 pouces, caméra de recul, régulateur de vitesse adaptatif, freinage d\'urgence automatique, système d\'aide au stationnement, etc.', '36 670 €', '../Image/m4.webp'),
(64, 'Mitsubishi', 'Lancer EX', 'Berline', '2017', 'La Mitsubishi Lancer EX 2017 est une berline compacte sportive proposée avec une seule motorisation. Voici quelques-unes de ses spécifications :\\r\\n\\r\\nMoteur : 2,0 litres quatre cylindres en ligne\\r\\nPuissance : 148 chevaux\\r\\nCouple : 196 Nm\\r\\nBoîte de vitesses : transmission à variation continue (CVT)\\r\\nAccélération de 0 à 100 km/h : environ 10 secondes\\r\\nVitesse maximale : environ 190 km/h\\r\\nConsommation de carburant : environ 7,2 L/100 km (en cycle mixte)\\r\\nCapacité du réservoir de carburant : 59 litres\\r\\nDimensions : longueur de 4,57 m, largeur de 1,76 m, hauteur de 1,49 m\\r\\nPoids : 1 295 kg (version de base)\\r\\nCoffre : 400 litres\\r\\nLa Lancer EX 2017 est équipée de nombreuses fonctionnalités de sécurité telles que des freins antiblocage, des airbags frontaux et latéraux, un contrôle électronique de la stabilité, une caméra de recul, etc. En outre, elle est dotée de plusieurs équipements de confort et de commodité tels que des sièges avant chauffants, une climatisation automatique à deux zones, un système audio à six haut-parleurs, etc. ', '13 360 €', '../Image/ex.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin_connexion`
--
ALTER TABLE `admin_connexion`
  ADD PRIMARY KEY (`id_adminconnexion`);

--
-- Index pour la table `caroussel`
--
ALTER TABLE `caroussel`
  ADD PRIMARY KEY (`id_update`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idcontact`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`ID_demande`);

--
-- Index pour la table `essai`
--
ALTER TABLE `essai`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_eve`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`idinscription`);

--
-- Index pour la table `inscriptionmonitor`
--
ALTER TABLE `inscriptionmonitor`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `loginmonitor`
--
ALTER TABLE `loginmonitor`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`Id_Voiture`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin_connexion`
--
ALTER TABLE `admin_connexion`
  MODIFY `id_adminconnexion` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `caroussel`
--
ALTER TABLE `caroussel`
  MODIFY `id_update` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `idcontact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=796;

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `ID_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `essai`
--
ALTER TABLE `essai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_eve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `idinscription` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=566;

--
-- AUTO_INCREMENT pour la table `inscriptionmonitor`
--
ALTER TABLE `inscriptionmonitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `loginmonitor`
--
ALTER TABLE `loginmonitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `Id_Voiture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
