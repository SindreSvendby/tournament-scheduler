# Test database. No results added. 8 tournaments spilted into 4 series in 2 rankingleagues.

-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Vert: 127.0.0.1
-- Generert den: 25. Jun, 2013 17:50 PM
-- Tjenerversjon: 5.5.27
-- PHP-Versjon: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `test`
--

DELIMITER $$
--
-- Prosedyrer
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `test_multi_sets`()
DETERMINISTIC
  begin
    select user() as first_col;
    select user() as first_col, now() as second_col;
    select user() as first_col, now() as second_col, now() as third_col;
  end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `wp_playersinteam`
--

CREATE TABLE IF NOT EXISTS `wp_playersinteam` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `team_id` mediumint(9) NOT NULL,
  `player_id` mediumint(9) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `team_id` (`team_id`,`player_id`),
  UNIQUE KEY `team_id_2` (`team_id`,`player_id`),
  UNIQUE KEY `team_id_3` (`team_id`,`player_id`),
  UNIQUE KEY `team_id_4` (`team_id`,`player_id`),
  UNIQUE KEY `team_id_5` (`team_id`,`player_id`),
  UNIQUE KEY `team_id_6` (`team_id`,`player_id`),
  UNIQUE KEY `team_id_7` (`team_id`,`player_id`),
  UNIQUE KEY `team_id_8` (`team_id`,`player_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=156 ;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `wp_rankingleagues`
--

CREATE TABLE IF NOT EXISTS `wp_rankingleagues` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `details` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dataark for tabell `wp_rankingleagues`
--

INSERT INTO `wp_rankingleagues` (`id`, `name`, `details`) VALUES
(8, 'Rankingleague #1', '#1'),
(9, 'Rankingleague #2', '#2');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `wp_results`
--

CREATE TABLE IF NOT EXISTS `wp_results` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `tournament_id` mediumint(9) NOT NULL,
  `team_id` mediumint(9) NOT NULL,
  `points` mediumint(9) NOT NULL,
  `place` mediumint(9) NOT NULL,
  `comment` text,
  `signedUpBy` mediumint(9) DEFAULT NULL,
  `signedUpDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `wp_series`
--

CREATE TABLE IF NOT EXISTS `wp_series` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `rankingleague_id` mediumint(9) NOT NULL,
  `details` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dataark for tabell `wp_series`
--

INSERT INTO `wp_series` (`id`, `name`, `rankingleague_id`, `details`) VALUES
(10, 'Serie #1', 8, NULL),
(11, 'Serie #2', 8, NULL),
(12, 'Serie #3', 9, NULL),
(13, 'Serie #4', 9, NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `wp_teams`
--

CREATE TABLE IF NOT EXISTS `wp_teams` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `wp_tournaments`
--

CREATE TABLE IF NOT EXISTS `wp_tournaments` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `serie_id` mediumint(9) NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `location_id` mediumint(9) NOT NULL,
  `details` text,
  `final_seeding` text,
  `price` int(11) NOT NULL,
  `tournament_responsible_id` mediumint(9) NOT NULL,
  `maximum_teams` int(11) NOT NULL,
  `open_for_registration` int(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dataark for tabell `wp_tournaments`
--

INSERT INTO `wp_tournaments` (`id`, `name`, `serie_id`, `date`, `location_id`, `details`, `final_seeding`, `price`, `tournament_responsible_id`, `maximum_teams`, `open_for_registration`) VALUES
(7, 'Tournament #1', 10, '2013-06-22 09:00:00', 1, 'Tournament #1 - Serie #1 - RankingLeague #1', NULL, 200, 3, 6, 1),
(8, 'Tournament #2', 10, '2013-06-23 09:00:00', 1, 'Tournament #2 - Serie #1 - RankingLeague #1', NULL, 300, 3, 10, 1),
(9, 'Tournament #3', 11, '2013-06-24 09:00:00', 1, 'Tournament #3 - Serie #2 - RankingLeague #1', NULL, 300, 3, 32, 1),
(10, 'Tournament #4', 11, '2013-06-25 09:00:00', 2, 'Tournament #4 - Serie #2 - RankingLeague #1', NULL, 200, 3, 10, 1),
(11, 'Tournament #5', 12, '2013-06-26 09:00:00', 2, 'Tournament #5 - Serie #3 - RankingLeague #2', NULL, 200, 3, 6, 1),
(12, 'Tournament #6', 12, '2013-06-27 09:00:00', 1, 'Tournament #6 - Serie #3 - RankingLeague #2', NULL, 200, 3, 6, 1),
(13, 'Tournament #7', 13, '2013-06-28 09:00:00', 1, 'Tournament #7 - Serie #4 - RankingLeague #2', NULL, 200, 3, 6, 1),
(14, 'Tournament #8', 13, '2013-06-29 09:00:00', 2, 'Tournament #8 - Serie #4 - RankingLeague #2', NULL, 200, 3, 99, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `wp_tournament_responsibles`
--

CREATE TABLE IF NOT EXISTS `wp_tournament_responsibles` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `phone` tinytext NOT NULL,
  `url_to_picture` tinytext,
  `mail` tinytext,
  `name` tinytext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dataark for tabell `wp_tournament_responsibles`
--

INSERT INTO `wp_tournament_responsibles` (`id`, `phone`, `url_to_picture`, `mail`, `name`) VALUES
(3, '+4793008598', 'http://1.gravatar.com/avatar/12305902883a87fcdad66b16658de1b4?s=64&d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D64&r=G', 'sinsvend@gmail.com', 'Tournament Responsible #1');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `wp_venues`
--

CREATE TABLE IF NOT EXISTS `wp_venues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` text,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(5) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;
