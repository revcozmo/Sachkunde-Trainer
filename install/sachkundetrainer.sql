SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `answere` (
  `question_id` int(11) NOT NULL,
  `answere_id` int(11) NOT NULL,
  `answere` text NOT NULL,
  `correct` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `count_wrong` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `textquestion` (
  `textquestion_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answere` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `answere`
  ADD UNIQUE KEY `question_id` (`question_id`,`answere_id`);

ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

ALTER TABLE `textquestion`
  ADD PRIMARY KEY (`textquestion_id`);


ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `textquestion`
  MODIFY `textquestion_id` int(11) NOT NULL AUTO_INCREMENT;
  
  