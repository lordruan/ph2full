CREATE DATABASE IF NOT EXISTS `ph2full`;
USE `ph2full`;
--
-- Estrutura da tabela `produtos`
--
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
