# propelrr_exam

I Use MySQL for the database :

CREATE DATABASE propelrr_exam;

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;