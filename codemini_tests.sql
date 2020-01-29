
--
-- Database: `codemini_tests`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_menu`
--

DROP TABLE IF EXISTS `tab_menu`;
CREATE TABLE IF NOT EXISTS `tab_menu` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(80) DEFAULT NULL,
  `Permalink` varchar(255) DEFAULT NULL,
  `Ordem` int(2) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_menu`
--

INSERT INTO `tab_menu` (`Id`, `Name`, `Permalink`, `Ordem`) VALUES
(1, 'Página Inicial', '/', 0),
(2, 'Sobre Nós', 'sobre/', 1),
(3, 'Produtos', 'produtos/', 2),
(4, 'Fale Conosco', 'contato/', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_products`
--

DROP TABLE IF EXISTS `tab_products`;
CREATE TABLE IF NOT EXISTS `tab_products` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(60) NOT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Created` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_products`
--

INSERT INTO `tab_products` (`Id`, `Name`, `Price`, `Created`) VALUES
(1, 'Notebook', '1690.00', '2020-01-08'),
(2, 'Monitor', '360.00', '2020-01-09'),
(3, 'Mobile Phone', '700.00', '2020-01-09'),
(4, 'Keyboard', '45.00', '2020-01-10');

