-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.26 - MySQL Community Server (GPL)
-- --------------------------------------------------------

-- Copiando estrutura do banco de dados para codemini_tests
CREATE DATABASE IF NOT EXISTS `codemini_tests`;
USE `codemini_tests`;

-- Copiando estrutura para tabela codemini_tests.table_menu
CREATE TABLE IF NOT EXISTS `table_menu` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(80) DEFAULT NULL,
  `Permalink` varchar(255) DEFAULT NULL,
  `Ordem` int(2) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela codemini_tests.table_menu: ~4 rows (aproximadamente)
INSERT INTO `table_menu` (`Id`, `Name`, `Permalink`, `Ordem`) VALUES
	(1, 'Home', '/', 0),
	(2, 'Sobre Nós', 'sobre/', 1),
	(3, 'Produtos', 'produtos/', 2),
	(4, 'Fale Conosco', 'contato/', 3);
