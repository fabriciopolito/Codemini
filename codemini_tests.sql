
--
-- Database: `codemini_tests`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_menu`
--

DROP TABLE IF EXISTS `tab_menu`;
CREATE TABLE IF NOT EXISTS `tab_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) DEFAULT NULL,
  `permalink` varchar(255) DEFAULT NULL,
  `ordem` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_menu`
--

INSERT INTO `tab_menu` (`id`, `name`, `permalink`, `ordem`) VALUES
(1, 'Home', 'home', 0),
(2, 'About', 'about', 1),
(3, 'Products', 'products', 2),
(4, 'Contact', 'contact', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_products`
--

DROP TABLE IF EXISTS `tab_products`;
CREATE TABLE IF NOT EXISTS `tab_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_products`
--

INSERT INTO `tab_products` (`id`, `name`, `price`, `created_at`) VALUES
(1, 'Notebook', '1690.00', '2020-01-08'),
(2, 'Monitor', '360.00', '2020-01-09'),
(3, 'Mobile Phone', '700.00', '2020-01-09'),
(4, 'Keyboard', '45.00', '2020-01-10');

