-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Jun-2018 às 17:05
-- Versão do servidor: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `colecionador`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `dados_item`
-- (See below for the actual view)
--
CREATE TABLE `dados_item` (
`id` int(11)
,`nome_moeda` varchar(255)
,`material` varchar(250)
,`pais` varchar(255)
,`regiao` varchar(255)
,`descricao` text
,`valor` float
,`data_compra` date
,`data_producao` date
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `id_moeda` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `valor` float NOT NULL,
  `data_compra` date NOT NULL,
  `data_producao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `tipo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `moeda`
--

CREATE TABLE `moeda` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `id_pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `nomedaview`
-- (See below for the actual view)
--
CREATE TABLE `nomedaview` (
`id` int(11)
,`nome` varchar(255)
,`descricao` text
,`valor` float
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE `pais` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `id_regiao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `regiao`
--

CREATE TABLE `regiao` (
  `id` int(11) NOT NULL,
  `regiao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `dados_item`
--
DROP TABLE IF EXISTS `dados_item`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dados_item`  AS  select `a`.`id` AS `id`,`b`.`nome` AS `nome_moeda`,`m`.`tipo` AS `material`,`c`.`nome` AS `pais`,`d`.`regiao` AS `regiao`,`a`.`descricao` AS `descricao`,`a`.`valor` AS `valor`,`a`.`data_compra` AS `data_compra`,`a`.`data_producao` AS `data_producao` from ((((`item` `a` join `moeda` `b`) join `material` `m`) join `pais` `c`) join `regiao` `d` on(((`a`.`id_moeda` = `b`.`id`) and (`a`.`id_material` = `m`.`id`) and (`c`.`id` = `b`.`id_pais`) and (`d`.`id` = `c`.`id_regiao`)))) group by `a`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `nomedaview`
--
DROP TABLE IF EXISTS `nomedaview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nomedaview`  AS  select `a`.`id` AS `id`,`b`.`nome` AS `nome`,`a`.`descricao` AS `descricao`,`a`.`valor` AS `valor` from (`item` `a` join `moeda` `b` on((`a`.`id_moeda` = `b`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_moeda` (`id_moeda`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moeda`
--
ALTER TABLE `moeda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indexes for table `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_regiao` (`id_regiao`);

--
-- Indexes for table `regiao`
--
ALTER TABLE `regiao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `moeda`
--
ALTER TABLE `moeda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `regiao`
--
ALTER TABLE `regiao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`id_material`) REFERENCES `material` (`id`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`id_moeda`) REFERENCES `moeda` (`id`);

--
-- Limitadores para a tabela `moeda`
--
ALTER TABLE `moeda`
  ADD CONSTRAINT `moeda_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id`);

--
-- Limitadores para a tabela `pais`
--
ALTER TABLE `pais`
  ADD CONSTRAINT `pais_ibfk_1` FOREIGN KEY (`id_regiao`) REFERENCES `regiao` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
