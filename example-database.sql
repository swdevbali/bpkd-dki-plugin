CREATE TABLE IF NOT EXISTS `bendahara` (
  `id` varchar(3) CHARACTER SET utf8 NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bendahara` (`id`, `name`) VALUES
('CCC', 'Corpus Christi Catholic Bendahara'),
('HSE', 'Holy Spirit Episcopal Bendahara'),
('OLG', 'Our Lady of Guadalupe Catholic Bendahara'),
('PLS', 'Pilgrim Lutheran Bendahara'),
('SAG', 'Saint Augustine Catholic Bendahara'),
('SAN', 'Saint Anne Catholic Bendahara'),
('SCC', 'Saint Christopher Catholic Bendahara'),
('TWC', 'The Woodlands Christian Academy');