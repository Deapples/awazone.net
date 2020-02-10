-- ----------------------------
-- Table structure for matrix
-- ----------------------------
DROP TABLE IF EXISTS `matrix`;
CREATE TABLE `matrix` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `depth` tinyint(4) unsigned NOT NULL DEFAULT '3' COMMENT 'Matrix levels',
  `pow` tinyint(4) unsigned NOT NULL DEFAULT '2' COMMENT 'Type of matrix (e.g. binary)',
  `date_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'date of creation',
  `date_close` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'closing date',
  `filled` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'The matrix is ​​divided',
  `parent_id` int(11) unsigned DEFAULT NULL COMMENT 'Parent Matrix ID',
  PRIMARY KEY (`id`),
  /*KEY `matrix_alias_id` (`alias_id`),*/
  CONSTRAINT `FK_matrix_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `matrix` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Matrices';

