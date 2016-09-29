-- phpMyAdmin SQL Dump
-- version 2.9.0.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Aug 20, 2008 at 01:24 PM
-- Server version: 5.0.27
-- PHP Version: 5.2.0
-- 
-- Database: `prochatrooms`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `prochatrooms_games`
-- 

CREATE TABLE `prochatrooms_games` (
  `game_ID` bigint(20) NOT NULL auto_increment,
  `game_SwfFile` varchar(200) NOT NULL default '',
  `game_Name` varchar(100) NOT NULL default '',
  `game_Thumb` varchar(200) NOT NULL default '',
  `game_Width` varchar(8) NOT NULL default '',
  `game_Height` varchar(8) NOT NULL default '',
  `game_Desc` varchar(100) NOT NULL default '',
  UNIQUE KEY `game_ID` (`game_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `prochatrooms_games`
-- 

INSERT INTO `prochatrooms_games` (`game_ID`, `game_SwfFile`, `game_Name`, `game_Thumb`, `game_Width`, `game_Height`, `game_Desc`) VALUES 
(1, '3FootNinja.swf', '3 Foot Ninja', 'ninjasmallicon.gif', '400', '300', 'Cool online fighting game, great fun'),
(2, 'alienattackwm.swf', 'Alien', 'aliensmallicon.gif', '400', '300', '"DEFEND THE BASE" from evil aliens!'),
(3, 'baseballonefile.swf', 'Baseball', 'baseballsmallicon.gif', '400', '300', 'Have a nice relaxing game of baseball online!'),
(4, 'battleships.swf', 'Battleships', 'battleshipssmallicon.gif', '400', '300', 'Come and play the classic game of battleships'),
(5, 'trapshoot.swf', 'Trap Shot', 'trapshootsmallicon.gif', '400', '300', 'PULL!!! go on.. shoot those clay pigeons'),
(6, 'stressgame.swf', 'Stress Game', 'paintsmallicon.gif', '400', '300', 'Take your stress out on these little smilie faces.'),
(7, 'bug.swf', 'Bug on a wire', 'bugsmallicon.gif', '400', '300', 'Run along the wire for as long as you can'),
(8, 'tennis.swf', 'Tennis Ace', 'acesmallicon.jpg', '400', '300', 'Like tennis?? You will love this game!'),
(9, 'samuraiwm.swf', 'Samurai Warrior', 'samuraismallicon.jpg', '400', '300', 'A tekken style beat ''em up.'),
(10, 'mars_stand_miniclip.swf', 'Mars Mission', 'missionsmallicon.gif', '400', '300', 'Cool alien invaders game, great fun!');
