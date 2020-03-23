-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour vehicules
CREATE DATABASE IF NOT EXISTS `vehicules` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `vehicules`;

-- Listage de la structure de la table vehicules. marque
CREATE TABLE IF NOT EXISTS `marque` (
  `id_marque` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `origine` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_marque`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table vehicules.marque : ~9 rows (environ)
/*!40000 ALTER TABLE `marque` DISABLE KEYS */;
INSERT INTO `marque` (`id_marque`, `nom`, `origine`) VALUES
	(1, 'Renault', 'France'),
	(2, 'Porsche', 'Allemagne'),
	(3, 'BMW', 'Allemagne'),
	(4, 'FIAT', 'italie'),
	(5, 'hyundai', 'coree'),
	(6, 'ferrari', 'italie'),
	(7, 'lamborghini', 'italie'),
	(8, 'volkswagen', 'allemagne'),
	(9, 'audi', 'allemagne'),
	(10, 'tesla', 'suede');
/*!40000 ALTER TABLE `marque` ENABLE KEYS */;

-- Listage de la structure de la table vehicules. vehicule
CREATE TABLE IF NOT EXISTS `vehicule` (
  `id_vehicule` int(11) NOT NULL AUTO_INCREMENT,
  `couleurs` varchar (50) NULL,
  `immat` varchar(7) COLLATE utf8_bin NOT NULL,
  `modele` varchar(50) COLLATE utf8_bin NOT NULL,
  `nb_portes` int(1) DEFAULT NULL,
  `motorisation` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `marque_id` int(11) DEFAULT NULL,
  `photo` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_vehicule`),
  UNIQUE KEY `immat` (`immat`),
  KEY `FK_vehicule_marque` (`marque_id`),
  CONSTRAINT `FK_vehicule_marque` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id_marque`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table vehicules.vehicule : ~20 rows (environ)
/*!40000 ALTER TABLE `vehicule` DISABLE KEYS */;
INSERT INTO `vehicule` (`id_vehicule`, `couleurs`, `immat`, `modele`, `nb_portes`, `motorisation`, `marque_id`, `photo`) VALUES
	(63, '["rouge"]', 'et777qq', 'clio', 5, 'sp', 1, ''),
	(65, '["#0000a0", "#000000"]', 'et777ii', 'panda', 5, 'sp', 4, 'public/images/panda.jpg'),
	(66, '["#800080", null]', 'et777oo', 'punto', 5, 'sp', 4, 'public/images/punto.jpg'),
	(67, '["#000000", "#0000ff"]', 'et777hh', 'scenic', 5, 'sp', 1, 'public/images/scenic.jpg'),
	(70, '["#000080", "#00ff00"]', 'et777ss', 'cayen', 5, 'sp', 4, 'https://s3-eu-west-1.amazonaws.com/staticeu.izmocars.com/toolkit/commonassets/2017/17fiat/17fiatpandalounge5ha3fbc/17fiatpandalounge5ha3fbc_pixGallery/_gallerypix/fiat_pandalounge5ha3fbc_angularfront.jpg'),
	(71, '["#008000", "#804000"]', 'et777ki', 'cayen', 5, 'sp', 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Porsche_Cayenne_S_%2892A%29_%E2%80%93_Frontansicht%2C_10._Oktober_2011%2C_W%C3%BClfrath.jpg/280px-Porsche_Cayenne_S_%2892A%29_%E2%80%93_Frontansicht%2C_10._Oktober_2011%2C_W%C3%BClfrath.jpg'),
	(72, '["#0000ff", "#00ff40"]', 'et777uo', '325', 5, 'sp', 3, 'https://images.caradisiac.com/logos/5/4/2/1/155421/S0-La-p-tite-sportive-du-lundi-BMW-325-ti-68675.jpg'),
	(73, '["#400040", "#00ff00"]', 'et777ju', '525', 5, 'sp', 3, 'https://pict1.reezocar.com/images/480/gebrauchtwagen.at/RZCGBWATC115BD31A032/BMW-SERIE-5-00.jpg'),
	(74, '["#ff0000", "#ff0000"]', 'et777ff', '488', 2, 'sp', 6, 'https://cdn-s-www.estrepublicain.fr/images/CAE066E2-94CE-4BDC-AC19-3D057B7D8E51/NW_raw/la-488-pista-c-est-la-version-quot-circuit-quot-de-la-488-gtb-une-petite-serie-extraordinairement-performante-photo-ferrari-1573844469.jpg'),
	(76, '["#ff0000", "#00ff00"]', 'et777wd', '488', 2, 'sp', 6, 'https://cdn-s-www.estrepublicain.fr/images/CAE066E2-94CE-4BDC-AC19-3D057B7D8E51/NW_raw/la-488-pista-c-est-la-version-quot-circuit-quot-de-la-488-gtb-une-petite-serie-extraordinairement-performante-photo-ferrari-1573844469.jpg'),
	(77, '["#000000", "#000000"]', 'zz777rp', 'cayen', 5, 'sp', 5, 'https://cdn-s-www.estrepublicain.fr/images/CAE066E2-94CE-4BDC-AC19-3D057B7D8E51/NW_raw/la-488-pista-c-est-la-version-quot-circuit-quot-de-la-488-gtb-une-petite-serie-extraordinairement-performante-photo-ferrari-1573844469.jpg'),
	(80, '["#000000", "#000000"]', 'ot777ru', 'panda', 5, 'sp', 4, 'public/images/chat.jpeg'),
	(83, '["#000000", "#000000"]', 'et557rr', 'tipo', 5, 'sp', 4, 'https://images.caradisiac.com/logos/8/4/5/7/248457/S0-fiat-punto-le-dernier-exemplaire-est-sorti-de-l-usine-170153.jpg'),
	(84, '["#000000", "#000000"]', 'et717ru', 'clio', 5, 'sp', 1, 'public/images/clio.jpg'),
	(85, '["#000080", "#008000"]', 'ab555tf', 'clio', 5, 'sp', 1, 'public/images/clio.jpg'),
	(86, '["#000000", "#000000"]', 'gg777uu', 'quntach', 2, 'sp', 7, 'https://cdn.motor1.com/images/mgl/JpN2K/s1/lamborghini-countach-render-by-jimmy-nahlous.jpg'),
	(91, '["#008000", "#ffff00"]', 'ff888uu', 'golf', 5, 'sp', 8, 'https://img.autoplus.fr/news/2018/08/23/1530283/b3b28098f719718d2cc982f1-1350-900.jpg?r'),
	(92, '["#008000", "#ffff00"]', 'ff888uz', 'golf', 5, 'sp', 8, 'https://img.autoplus.fr/news/2018/08/23/1530283/b3b28098f719718d2cc982f1-1350-900.jpg?r'),
	(94, '["#008000", "#ffff00"]', 'ff888uj', 'golf', 5, 'sp', 8, 'https://img.autoplus.fr/news/2018/08/23/1530283/b3b28098f719718d2cc982f1-1350-900.jpg?r'),
	(96, '["#ff0000", "#ff0000"]', 'ff888uk', 'golf', 5, 'sp', 8, 'https://img.autoplus.fr/news/2018/08/23/1530283/b3b28098f719718d2cc982f1-1350-900.jpg?r');
/*!40000 ALTER TABLE `vehicule` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
