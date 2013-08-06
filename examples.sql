CREATE TABLE `examples` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `slug` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(3) unsigned NOT NULL,
  `inserted_date` date NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;