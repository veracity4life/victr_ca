CREATE TABLE `repos` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL,
  `url` varchar(500) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `pushed_at` datetime DEFAULT NULL,
  `desc` text,
  `stars` int(10) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid_UNIQUE` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
