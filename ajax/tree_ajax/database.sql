CREATE TABLE `carpetas` (
  `idCarpeta` int(11) NOT NULL auto_increment,
  `chrNombre` char(20) default NULL,
  `intDeCarpeta` int(11) default NULL,
  `intEstado` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`idCarpeta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `carpetas` VALUES (1, '/raiz', 0, 1);
INSERT INTO `carpetas` VALUES (2, 'primera', 1, 1);
INSERT INTO `carpetas` VALUES (3, 'tercera', 2, 1);
INSERT INTO `carpetas` VALUES (4, 'cuarta', 1, 1);
INSERT INTO `carpetas` VALUES (5, 'quinta', 2, 1);
INSERT INTO `carpetas` VALUES (6, 'sexta', 3, 1);
INSERT INTO `carpetas` VALUES (7, 'septima', 5, 1);
INSERT INTO `carpetas` VALUES (8, 'octava', 6, 1);
INSERT INTO `carpetas` VALUES (9, 'novena', 2, 1);
INSERT INTO `carpetas` VALUES (10, 'decima', 7, 1);
INSERT INTO `carpetas` VALUES (11, 'onceava', 5, 1);
INSERT INTO `carpetas` VALUES (12, 'doceava', 7, 1);
INSERT INTO `carpetas` VALUES (13, 'treceava', 12, 1);
INSERT INTO `carpetas` VALUES (14, 'catorceava', 7, 1);