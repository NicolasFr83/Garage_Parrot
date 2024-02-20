-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 fév. 2024 à 16:16
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `garage_parrot`
--

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(25, 'Chevrolet'),
(26, 'Ford'),
(27, 'Chrysler'),
(28, 'Camaro'),
(29, 'Cadillac'),
(30, 'Shelby'),
(31, 'Pontiac');

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `fuel_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `years` int(11) NOT NULL,
  `kilometers` int(11) NOT NULL,
  `car_presentation_text` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)',
  `type_id` int(11) DEFAULT NULL,
  `model_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`id`, `brand_id`, `fuel_id`, `price`, `image_name`, `years`, `kilometers`, `car_presentation_text`, `created_at`, `updated_at`, `type_id`, `model_id`) VALUES
(31, 26, 13, 75000, 'ford-gt-40-3374131-640-65ce47ef470b0339706142.jpg', 1975, 45000, 'modèle rare de  Ford GT-40 édition Le mans,\r\nMoteur de 480 chevaux ( V8 16V), boîte 5 vitesses, propulsion.\r\nNous vous présentons cette superbe voiture connue dans le monde entier pour ses victoires sur la célèbre course des 24 heures du mans !', '2024-02-15 18:20:47', '2024-02-15 18:20:47', NULL, 34),
(32, 27, 13, 32000, 'viper-gts-3933198-640-65ce4c7cef6a0803105955.jpg', 1995, 35000, 'Viper GTS 690cheveaux moteur V10 boites 6, propulsion.\r\nVoitures produite aux Etats-Unis , modèle produits 30 000 exemplaires.\r\nDans un super état , pièces d\'origines aucun frais a prévoir sur ce bolide.\r\nTrès rare en France , l \'essayez c\'est l\'adopté', '2024-02-15 18:40:12', '2024-02-15 18:40:12', NULL, 35),
(33, 30, 13, 29000, 'mustang-2338356-640-65ce4ed06dc76324262758.jpg', 2019, 57000, 'Shelby mustang 5.0 V8 459 BULLIT\r\nBoite manuelle , beaucoup d\'options sur cette voiture importée des Etats-Unis, voiture 2ème main,\r\n 2 portes, propulsion , aucun frais à prévoir pour cette muscler car !', '2024-02-15 18:50:08', '2024-02-15 18:50:08', NULL, 37),
(34, 29, 13, 41000, 'american-classic-car-4223044-640-65ce50d76edc9185700632.jpg', 1962, 85000, 'Cadillac El dorado  de 1962, super voiture entièrement modifiée avec moteur V6 turbo de 500chevaux 4 roues motrices préparé chez WESTCOAST custom.  A voir absolument ce modèle atypique chicanos !\r\nAucun frais a prevoir sur ce modele d \'exception', '2024-02-15 18:58:47', '2024-02-15 18:58:47', NULL, 38),
(35, 30, 13, 125000, 'car-6483724-640-65ce5271e3ed1142185725.jpg', 1962, 15000, 'Avis aux passionnés nous vous présentons cette superbe shelby cobra gt 500\r\n6.4 V8 475chvx , boite automatique , modèle comme neuf , couleur noir métal d\'origine modèle rare au vu de son état proche du neuf !', '2024-02-15 19:05:37', '2024-02-15 19:05:37', NULL, 39),
(36, 25, 13, 20000, 'antique-car-4219848-640-65ce53a9d7811673954562.jpg', 1973, 145000, 'Chevrolet camaro de 1973 , première édition. V6  4.5l de 350 chevaux , propulsion.\r\nQuelques frais a prevoir pour ce modèle mais la voiture roule très bien.', '2024-02-15 19:10:49', '2024-02-15 19:10:49', NULL, 36),
(37, 31, 13, 58600, 'pontiac-2295904-640-65ce55a527efd833444101.jpg', 1979, 167000, 'Pontiac Catalina 4ème génération, moteur V6 4litres atmosphérique à propulsion de 280 chevaux , aucun frais à prévoir sur ce modèle importé des Etats-Unis', '2024-02-15 19:19:17', '2024-02-15 19:19:17', NULL, 41),
(38, 27, 15, 20000, 'car-3939118-640-65ce6782194a6752246143.jpg', 2009, 250000, 'Chrysler 200C moteur 3l  200 chevaux motorisation GPL , voiture en parfait état avec boite manuelle, \r\naucun frais a prévoir pour ce modèle. Modèle 5 portes, grand volume pour cette berline.', '2024-02-15 20:35:30', '2024-02-15 20:35:30', NULL, 42),
(39, 25, 13, 60000, 'automobile-1112183-640-65ce69c210acf491324118.jpg', 2018, 19000, 'Chevrolet camaro edition 2018, motorisation essence de 400 chevaux 5.5l V8. Boite auto\r\nToutes options , propulsion arrière. Aucun frais a prévoir , la voiture est comme neuve', '2024-02-15 20:45:05', '2024-02-15 20:45:05', NULL, 36),
(40, 25, 13, 44000, 'automobile-3078729-640-65ce6b207aab7897277935.jpg', 1967, 176000, 'Super véhicule historique et mythique des Etats-Unis !! \r\nMoteur 6 cylindres ( refait à neuf) de 260 chevaux , 5 portes boite auto.\r\nCarte grise moitié prix , véhicule ancien.\r\nPeinture neuve refaite à l\'origine.', '2024-02-15 20:50:56', '2024-02-15 20:50:56', NULL, 44),
(41, 27, 13, 62000, 'chrysler-imperial-65ce7148b6827827945641.jpg', 1971, 120000, 'Chrysler Imperial de 1971 , modèle très  rare sur notre territoire ! \r\nMoteur 6 cylindres en ligne, 190 chevaux 3l , 5 portes boite automatique \r\nAucun frais a prévoir pour ce rêve américain.', '2024-02-15 21:17:12', '2024-02-15 21:17:12', 17, 45),
(42, 25, 13, 80000, 'vintage-1787115-640-65ce732e04192226787902.jpg', 1969, 110000, 'Chevrolet historique, très très peu de modèles sont encore sur nos routes ! \r\nMoteur 4l de 6 cylindres , 175 chevaux , 5 portes , 3 places à l\'avant, l\'intérieur a été refait à neuf identique à l\'origine. Aucun frais à prévoir.', '2024-02-15 21:25:17', '2024-02-15 21:25:17', 17, 46),
(43, 29, 13, 50000, 'car-2470747-640-65ce74121ca1e487499366.jpg', 1969, 245000, 'Cadillac rose bonbon qui a appartenu à une grande star américaine du passé !\r\nSi vous voulez en savoir plus sur ce modèle unique venez nous voir au garage !', '2024-02-15 21:29:06', '2024-02-15 21:29:06', 17, 47);

-- --------------------------------------------------------

--
-- Structure de la table `cars_options`
--

CREATE TABLE `cars_options` (
  `cars_id` int(11) NOT NULL,
  `options_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cars_options`
--

INSERT INTO `cars_options` (`cars_id`, `options_id`) VALUES
(31, 69),
(32, 70),
(32, 71),
(32, 73),
(32, 75),
(32, 76),
(32, 79),
(32, 80),
(33, 69),
(33, 70),
(33, 71),
(33, 72),
(33, 73),
(33, 75),
(33, 76),
(33, 77),
(33, 78),
(33, 79),
(33, 80),
(33, 81),
(33, 82),
(33, 83),
(34, 74),
(34, 79),
(34, 80),
(34, 84),
(35, 79),
(35, 80),
(35, 84),
(36, 84),
(37, 76),
(37, 84),
(38, 69),
(38, 70),
(38, 71),
(38, 72),
(38, 73),
(38, 75),
(38, 76),
(38, 77),
(38, 79),
(38, 80),
(38, 81),
(38, 82),
(38, 83),
(39, 69),
(39, 70),
(39, 71),
(39, 72),
(39, 73),
(39, 75),
(39, 76),
(39, 77),
(39, 78),
(39, 79),
(39, 80),
(39, 81),
(39, 82),
(39, 83),
(39, 84),
(40, 80),
(40, 84),
(41, 84),
(42, 84),
(43, 76),
(43, 80);

-- --------------------------------------------------------

--
-- Structure de la table `cars_page`
--

CREATE TABLE `cars_page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `car_presentation_text` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cars_page`
--

INSERT INTO `cars_page` (`id`, `title`, `car_presentation_text`) VALUES
(5, 'Bienvenue sur notre page dédiée aux voitures  d\'occasions', 'Vous voulez acheter un véhicule d\'occasion en bon état et à un tarif raisonnable ? Notre garage vous fait profiter d\'un large choix de véhicules ! Polyvalents, nous vous accompagnerons et vous proposeront des véhicules mis en vente dans notre parc répondant à vos exigences budgétaires.');

-- --------------------------------------------------------

--
-- Structure de la table `contact_page`
--

CREATE TABLE `contact_page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text_presentation` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact_page`
--

INSERT INTO `contact_page` (`id`, `title`, `text_presentation`) VALUES
(6, 'Page de contact', 'Voici nos coordonnées de contact. Vous avez une question pour un devis d\'entretien ou réparation ou même pour une vente de voiture , nous serons heureux de pouvoir vous renseigner.');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240115195318', '2024-01-15 20:56:07', 265),
('DoctrineMigrations\\Version20240115200422', '2024-01-15 21:06:02', 42),
('DoctrineMigrations\\Version20240116194701', '2024-01-16 20:48:09', 148),
('DoctrineMigrations\\Version20240118171036', '2024-01-18 18:11:17', 82),
('DoctrineMigrations\\Version20240118181250', '2024-01-18 19:12:56', 9),
('DoctrineMigrations\\Version20240202145147', '2024-02-02 15:53:10', 80),
('DoctrineMigrations\\Version20240210182832', '2024-02-10 19:28:55', 51),
('DoctrineMigrations\\Version20240215171328', '2024-02-15 18:13:49', 74),
('DoctrineMigrations\\Version20240217155740', '2024-02-17 16:58:26', 47);

-- --------------------------------------------------------

--
-- Structure de la table `form_contact`
--

CREATE TABLE `form_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `email` varchar(180) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `form_contact`
--

INSERT INTO `form_contact` (`id`, `name`, `first_name`, `email`, `phone_number`, `subject`, `message`, `created_at`) VALUES
(31, 'Grondin', 'Véronique', 'dias.georges@dossantos.net', '+33 (0)8 21 ', 'Quod.', 'Non cupiditate nisi quia. A velit accusantium sed non magnam ut qui. Aut optio quam officia reiciendis. Sapiente ut provident unde voluptatem minus vel omnis vero.', '2024-01-18 19:13:01'),
(32, 'Normand', 'Édith', 'monnier.roger@clerc.com', '03 80 83 00 ', 'Eos.', 'Delectus quia delectus magnam repudiandae. Earum aut quasi occaecati vel et consequatur non sed. Fuga aliquam hic quod. Culpa ullam ea ipsum sed ea corrupti voluptatibus quaerat.', '2024-01-18 19:13:01'),
(33, 'Leleu', 'Suzanne', 'valentin.luce@charrier.org', '0762125663', 'Sunt.', 'Quidem quis est tempora qui. Molestiae fuga consequuntur laboriosam aliquid eius. Enim maiores et porro eos. Vel impedit aut a voluptates. Reprehenderit et ipsam provident exercitationem facilis.', '2024-01-18 19:13:01'),
(34, 'David', 'Guillaume', 'oceane.lesage@baudry.fr', '+33 3 97 30 ', 'Eos.', 'Et esse dolorem consequatur recusandae rerum impedit. Saepe dolorem officia dolores ab. Dicta ad ipsa sunt commodi.', '2024-01-18 19:13:01'),
(35, 'Pinto', 'Émilie', 'margaud.leclerc@dbmail.com', '06 27 02 64 ', 'Sed.', 'Rerum eligendi vel maxime deserunt fugiat quo sed. Id totam molestiae veritatis vel. Ratione aut error nostrum dolores. Omnis magnam ut voluptatem voluptates vel est unde animi.', '2024-01-18 19:13:01'),
(36, 'Jacob', 'Élodie', 'vincent87@gomez.org', '04 61 75 15 ', 'Ea.', 'Quisquam hic repellendus asperiores velit et voluptatem sunt. Maiores dicta nisi voluptas cupiditate facere et aliquid. Ut dignissimos aut nulla in.', '2024-01-18 19:13:01'),
(37, 'Teixeira', 'Lucas', 'oalves@laposte.net', '+33 (0)6 36 ', 'Et.', 'Quas asperiores molestiae quia repellendus nihil eum. Minus voluptatum nobis ex eligendi adipisci. Ut in doloribus porro autem.', '2024-01-18 19:13:01'),
(38, 'Pottier', 'Victor', 'benoit.bourgeois@picard.fr', '06 11 00 26 ', 'Sunt.', 'Asperiores itaque a nobis dolorum consequuntur aut veritatis. Porro sit cum voluptas qui. Iste non pariatur minus et eveniet aliquam sunt. Molestiae qui voluptatibus blanditiis.', '2024-01-18 19:13:01'),
(39, 'Bouvier', 'Thibault', 'arthur45@yahoo.fr', '0983254048', 'Quod.', 'Dolore minus laboriosam ut omnis rem rerum. Ullam quia illum est corrupti vel assumenda. Qui eligendi dolore ut aut distinctio velit. Nam neque modi repudiandae sequi est voluptatem.', '2024-01-18 19:13:01'),
(40, 'Lebreton', 'Susanne', 'olivier65@guilbert.com', '+33 (0)1 23 ', 'Ut.', 'Natus eos dolores et fugiat. Est qui suscipit possimus similique velit debitis. Dolorem aut laboriosam molestiae aperiam ipsa libero nam.', '2024-01-18 19:13:01'),
(41, 'jhhyy', 'juyhg', 'mail@mail.com', '0424544848', 'jjyuh', 'hgtrfhhjhbgh', '2024-02-12 17:53:28'),
(42, 'hytghh', 'jhuhg', 'moty@gmail.com', '0424544848', 'hhhhhhhjhghhj', 'hhhhhhkikjhjijnkjjhjj', '2024-02-12 18:18:55'),
(43, 'jhhyy', 'juyhg', 'mail@mail.com', '0424544848', 'hhhhhhhjhghhj', 'hhfvfygfgyfhhghhgjhj', '2024-02-12 18:19:55'),
(44, 'jhhyy', 'juyhg', 'mail@mail.com', '0424544848', 'hjjijkojnlojnjnknkjn, kjljlknl,nlkkjkjhn', 'njhbjjhbnjuhbnjhbnjkk,n', '2024-02-18 16:06:42'),
(45, 'jhhyy', 'juyhg', 'mail@mail.com', '0424544848', 'nnnnnnnnnnnnn', 'lolooklook;llk,,,,,,,jjjjjuuuuuu', '2024-02-18 16:08:34'),
(46, 'jhhyy', 'juyhg', 'mail@mail.com', '0424544848', 'Informations concernant la voiture n° 42 de la marque Chevrolet', 'mmmmmmpppolokiujhh,,,koooo!!!', '2024-02-18 16:09:38'),
(47, 'GERREY', 'Rebecca', 'mail@mail.com', '0424544848', 'Test de test det tes', 'kbefoiz faziehpf azfbidohaz fabzeioh', '2024-02-18 16:18:40'),
(48, 'jhhyy', 'jhuhg', 'mail@mail.com', '0424544848', 'Informations concernant la voiture n° 42 de la marque Chevrolet', 'du\"gefol fziahfpo fazhihfez', '2024-02-18 16:20:18'),
(49, 'hytghh', 'jhuhg', 'mail@mail.com', '0424544848', 'Informations concernant la voiture n° 43 de la marque Cadillac', 'lknoigfièklhsoihcjpo', '2024-02-18 16:24:51'),
(50, 'hytghh', 'jhuhg', 'mail@mail.com', '0424544848', 'klsqhpcfo efpoj,', 'kzkihadfpjo fjeopjf efvpojp', '2024-02-18 16:25:19');

-- --------------------------------------------------------

--
-- Structure de la table `fuels`
--

CREATE TABLE `fuels` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fuels`
--

INSERT INTO `fuels` (`id`, `name`) VALUES
(13, 'Essence'),
(14, 'Diesel'),
(15, 'GPL');

-- --------------------------------------------------------

--
-- Structure de la table `garage`
--

CREATE TABLE `garage` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(180) NOT NULL,
  `phonenumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `garage`
--

INSERT INTO `garage` (`id`, `name`, `email`, `phonenumber`) VALUES
(4, 'Garage Parrot', 'garage.Parrot@gmail.com', '0497995420');

-- --------------------------------------------------------

--
-- Structure de la table `home_page`
--

CREATE TABLE `home_page` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `welcome_text` longtext NOT NULL,
  `repair_section_title` varchar(255) NOT NULL,
  `repair_section_text` longtext NOT NULL,
  `used_cars_section_title` varchar(255) NOT NULL,
  `used_cars_section_text` longtext NOT NULL,
  `opinions_section_title` varchar(255) NOT NULL,
  `opinions_section_text` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `home_page`
--

INSERT INTO `home_page` (`id`, `page_title`, `welcome_text`, `repair_section_title`, `repair_section_text`, `used_cars_section_title`, `used_cars_section_text`, `opinions_section_title`, `opinions_section_text`) VALUES
(4, 'Garage Parrot', 'Bienvenue au garage Parrot. Garage ouvert depuis 2021 sur la ville de Toulouse, je me nomme Vincent Parrot propriétaire du garage et après de longues années d\'expériences dans le monde automobile et notamment aux Etats-Unis , j\'ai décidé d\'ouvrir mon propre garage spécialisé dans le domaine des voitures Américaines. Forts d’une expérience de 15 ans, nos garagistes et moi même mettons nos compétences et savoir-faire au profit de vos travaux. Nous effectuons l’entretien et la réparation mécanique de toute marque de voiture. nous sommes en mesure de réaliser un service de dépannage rapide à la hauteur de vos attentes ! Diagnostic, changement de pneus, entretien de freins, réparation de moteurs, nos mécaniciens garagistes se chargent de tout ! Nous vous proposons également un service de ventes de voitures d\'occasions spécialisé en voitures Américaine.', 'Section réparation', 'Voici  nos prestations : révision du parallélisme,  réglage de la géométrie , réparation  moteur, vidange,  le contrôle et la révision de toutes pièces auto, recharge et  changement de batterie, changement amortisseurs, embrayages, entretien de l’échappement, des freins,  boîte de vitesse… \r\n Nous possédons également un atelier carrosserie et peintures.', 'Section véhicules d\'occasions', 'Vous voulez acheter un véhicule d\'occasion en bon état et à un tarif raisonnable ? Notre garage vous fait profiter d\'un large choix de véhicules !\r\n Polyvalents, nous vous accompagnerons et vous proposeront des véhicules U-S mis en vente répondant à vos exigences budgétaires.', 'Rendez-vous sur notre page d\'avis', 'N\'hésitez pas à consulter les avis et opinions laissés sur notre garage et nos prestations. \r\nVous pouvez vous même nous laisser un commentaire ainsi qu\'une note sur votre expérience en notre compagnie.');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `brands_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `models`
--

INSERT INTO `models` (`id`, `brands_id`, `name`) VALUES
(34, 26, 'GT 40'),
(35, 27, 'Dodge viper'),
(36, 25, 'camaro'),
(37, 30, 'mustang'),
(38, 29, 'El dorado'),
(39, 30, 'cobra'),
(40, 28, 'SS'),
(41, 31, 'catalina'),
(42, 27, '200C'),
(44, 25, 'Impala'),
(45, 27, 'Imperial'),
(46, 25, 'Avento'),
(47, 29, 'escalade');

-- --------------------------------------------------------

--
-- Structure de la table `openning_garage`
--

CREATE TABLE `openning_garage` (
  `id` int(11) NOT NULL,
  `garage_id` int(11) NOT NULL,
  `openingday` varchar(10) NOT NULL,
  `openinghourmorning` varchar(5) NOT NULL,
  `closinghourmorning` varchar(5) NOT NULL,
  `openinghourafternoon` varchar(5) NOT NULL,
  `closinghourafternoon` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `openning_garage`
--

INSERT INTO `openning_garage` (`id`, `garage_id`, `openingday`, `openinghourmorning`, `closinghourmorning`, `openinghourafternoon`, `closinghourafternoon`) VALUES
(16, 4, 'Lundi', '08h00', '12h00', '14h00', '18h00'),
(17, 4, 'Mardi', '08h00', '12h00', '14h00', '18h00'),
(18, 4, 'Mercredi', '08h00', '12h00', '14h00', '18h00'),
(19, 4, 'Jeudi', '08h00', '12h00', '14h00', '18h00'),
(20, 4, 'Vendredi', '08h00', '12h00', '14h00', '18h00');

-- --------------------------------------------------------

--
-- Structure de la table `opinions`
--

CREATE TABLE `opinions` (
  `id` int(11) NOT NULL,
  `garage_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` longtext NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)',
  `is_moderated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `opinions`
--

INSERT INTO `opinions` (`id`, `garage_id`, `name`, `comment`, `score`, `created_at`, `is_moderated`) VALUES
(31, 4, 'nicolasd', 'hgfudhdudujh', 5, '2024-02-17 17:37:51', 1),
(32, 4, 'msjdidndk', 'djrieheodjdndkdk', 8, '2024-02-17 17:38:39', 1),
(33, 4, 'rebecca', 'le garage est nul on m\'a monté mes pneus a l\'envers', 4, '2024-02-18 14:22:55', 1),
(34, 4, 'rebecca', 'jfjfdnfdndkdnd', 4, '2024-02-18 15:46:08', 1),
(35, 4, 'rebecca', 'hgyfhdydgdgd', 5, '2024-02-18 15:50:25', 1),
(36, 4, 'rebecca', 'lmjfndh hdystrre', 4, '2024-02-18 15:51:20', 1),
(37, 4, 'rebecca', 'hdbgdy hhjfufy td', 4, '2024-02-18 15:52:32', 1),
(38, 4, 'hyyytut', 'llkolokiummpo', 1, '2024-02-18 15:53:40', 1),
(39, 4, 'nicolasd', 'llllllllllllmmmmmmmm', 1, '2024-02-18 15:54:32', 1);

-- --------------------------------------------------------

--
-- Structure de la table `opinion_page`
--

CREATE TABLE `opinion_page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `presentation_text` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `opinion_page`
--

INSERT INTO `opinion_page` (`id`, `title`, `presentation_text`) VALUES
(4, 'Nos avis', 'N\'hésitez pas à consulter les avis et opinions laissés sur notre garage et nos prestations. Vous pouvez vous même nous laisser un commentaire ainsi qu\'une note sur votre expérience en notre compagnie.');

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id`, `name`) VALUES
(69, 'ABS'),
(70, 'Vitres électriques'),
(71, 'Climatisation'),
(72, 'Gps'),
(73, 'Airbags'),
(74, '4x4'),
(75, 'Sièges chauffant'),
(76, 'Toit ouvrant'),
(77, 'radar de recul'),
(78, 'Caméra de recul'),
(79, 'Jantes alu'),
(80, 'Intérieur cuir'),
(81, 'Régulateur de vitesse'),
(82, 'ESP'),
(83, 'Feux antibrouillard'),
(84, 'Boîte automatique'),
(85, 'Boîte manuelle');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(17, 'Berline'),
(18, 'Sportive'),
(19, 'Suv'),
(20, 'Citadine'),
(21, 'Limousine');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` binary(16) NOT NULL COMMENT '(DC2Type:uuid)',
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `roles`, `password`, `name`, `firstname`, `created_at`, `updated_at`) VALUES
(0x018d1dc6c4b87ce2b42684d244657e99, 'nikko.wald@gmail.com', '[\"ROLE_EMPLOYEE\"]', '$2y$13$0T5dmXIXICA1jAHwWvV.ZeP3WJrsO/vT6wvNHFj5LNi8UYG3iV6du', 'waldung', 'Nicolas', '2024-01-18 19:13:01', '2024-01-18 19:13:01'),
(0x018d1dc6c4b87ee2b42684d244657e99, 'G_Parrot@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$0T5dmXIXICA1jAHwWvV.ZeP3WJrsO/vT6wvNHFj5LNi8UYG3iV6du', 'Parrot', 'Vincent', '2024-01-18 19:13:01', '2024-01-18 19:13:01'),
(0x018dbc47667971b18ff5eba7797961f7, 'niiko@gmail.com', '[\"ROLE_EMPLOYEE\"]', '$2y$13$MDSQHlEW/aPha0k6.impB.Jr8DAEqyOVhKmBhPoSMZIDhOyj7xaQW', 'kjuhyre', 'judher', '2024-02-18 13:53:31', '2024-02-18 13:53:31'),
(0x018dbce84f6d70169687fa8a91629c1a, 'njbgyg@gmail.com', '[\"ROLE_EMPLOYEE\"]', '$2y$13$mIkkC/iiIkwHd009DUVYduWAHbLHScRuIpYDTxfGv1XiCV2FHfe46', 'waldinu', 'nicolas', '2024-02-18 16:49:17', '2024-02-18 16:49:17');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_95C71D1444F5D008` (`brand_id`),
  ADD KEY `IDX_95C71D14C54C8C93` (`type_id`),
  ADD KEY `IDX_95C71D1497C79677` (`fuel_id`),
  ADD KEY `IDX_95C71D147975B7E7` (`model_id`);

--
-- Index pour la table `cars_options`
--
ALTER TABLE `cars_options`
  ADD PRIMARY KEY (`cars_id`,`options_id`),
  ADD KEY `IDX_4F8E5F498702F506` (`cars_id`),
  ADD KEY `IDX_4F8E5F493ADB05F1` (`options_id`);

--
-- Index pour la table `cars_page`
--
ALTER TABLE `cars_page`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact_page`
--
ALTER TABLE `contact_page`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `form_contact`
--
ALTER TABLE `form_contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fuels`
--
ALTER TABLE `fuels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `home_page`
--
ALTER TABLE `home_page`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E4D63009E9EEC0C7` (`brands_id`);

--
-- Index pour la table `openning_garage`
--
ALTER TABLE `openning_garage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6313D861C4FFF555` (`garage_id`);

--
-- Index pour la table `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BEAF78D0C4FFF555` (`garage_id`);

--
-- Index pour la table `opinion_page`
--
ALTER TABLE `opinion_page`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `cars_page`
--
ALTER TABLE `cars_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `contact_page`
--
ALTER TABLE `contact_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `form_contact`
--
ALTER TABLE `form_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `fuels`
--
ALTER TABLE `fuels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `garage`
--
ALTER TABLE `garage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `home_page`
--
ALTER TABLE `home_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `openning_garage`
--
ALTER TABLE `openning_garage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `opinion_page`
--
ALTER TABLE `opinion_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `FK_95C71D1444F5D008` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `FK_95C71D147975B7E7` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`),
  ADD CONSTRAINT `FK_95C71D1497C79677` FOREIGN KEY (`fuel_id`) REFERENCES `fuels` (`id`),
  ADD CONSTRAINT `FK_95C71D14C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Contraintes pour la table `cars_options`
--
ALTER TABLE `cars_options`
  ADD CONSTRAINT `FK_4F8E5F493ADB05F1` FOREIGN KEY (`options_id`) REFERENCES `options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4F8E5F498702F506` FOREIGN KEY (`cars_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `FK_E4D63009E9EEC0C7` FOREIGN KEY (`brands_id`) REFERENCES `brands` (`id`);

--
-- Contraintes pour la table `openning_garage`
--
ALTER TABLE `openning_garage`
  ADD CONSTRAINT `FK_6313D861C4FFF555` FOREIGN KEY (`garage_id`) REFERENCES `garage` (`id`);

--
-- Contraintes pour la table `opinions`
--
ALTER TABLE `opinions`
  ADD CONSTRAINT `FK_BEAF78D0C4FFF555` FOREIGN KEY (`garage_id`) REFERENCES `garage` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
