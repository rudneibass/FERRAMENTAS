-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Nov-2018 às 16:15
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(8) NOT NULL,
  `data_cadastro` date NOT NULL,
  `nome_cliente` varchar(50) COLLATE utf8_bin NOT NULL,
  `cidade_cliente` varchar(50) COLLATE utf8_bin NOT NULL,
  `email_cliente` varchar(50) COLLATE utf8_bin NOT NULL,
  `telefone_cliente` varchar(20) COLLATE utf8_bin NOT NULL,
  `tbl` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `data_cadastro`, `nome_cliente`, `cidade_cliente`, `email_cliente`, `telefone_cliente`, `tbl`) VALUES
(408, '2018-10-08', 'nome_cliente', 'cidade_cliente', 'email@cliente.com', '(99)9999-9999', 'clientes'),
(407, '2018-10-08', 'nome_cliente', 'cidade_cliente', 'email@cliente.com', '(99)9999-9999', 'clientes'),
(406, '2018-10-08', 'nome_cliente', 'cidade_cliente', 'email@cliente.com', '(99)9999-9999', 'clientes'),
(405, '2018-10-08', 'nome_cliente', 'cidade_cliente', 'email@cliente.com', '(99)9999-9999', 'clientes'),
(404, '2018-10-08', 'nome_cliente', 'cidade_cliente', 'email@cliente.com', '(99)9999-9999', 'clientes'),
(403, '2018-10-08', 'nome_cliente', 'cidade_cliente', 'email@cliente.com', '(99)9999-9999', 'clientes'),
(402, '2018-10-08', 'nome_cliente', 'cidade_cliente', 'email@cliente.com', '(99)9999-9999', 'clientes'),
(401, '2018-10-08', 'nome_cliente', 'cidade_cliente', 'email@cliente.com', '(99)9999-9999', 'clientes'),
(400, '2018-10-08', 'nome_cliente', 'cidade_cliente', 'email@cliente.com', '(99)9999-9999', 'clientes'),
(399, '2018-10-05', 'nome_cliente', 'cidade_cliente', 'email@cliente.com', '(99)9999-9999', 'clientes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
