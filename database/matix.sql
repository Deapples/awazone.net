-- ----------------------------
-- Table structure for matrix_users
-- ----------------------------
DROP TABLE IF EXISTS `matrix_users`;
CREATE TABLE `matrix_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `matrix_id` int(11) unsigned NOT NULL COMMENT 'matrix',
  `user_id` int(11) unsigned NOT NULL COMMENT 'user',
  `depth` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'User Level in Matrix',
  `number` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'Matrix level user number',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Date of entry',
  PRIMARY KEY (`id`),
  KEY `matrix_users_matrix_id` (`matrix_id`),
  KEY `matrix_users_user_id` (`user_id`));
  /*CONSTRAINT `FK_matrix_users_matrix_id` FOREIGN KEY (`matrix_id`) REFERENCES `matrix_users` (`matrix_id`) ON DELETE CASCADE ON UPDATE CASCADE
)*/ ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Matrix Users';