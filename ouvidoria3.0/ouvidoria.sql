-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Nov-2018 às 16:43
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site_municipal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ouvidoria`
--

CREATE TABLE `ouvidoria` (
  `o_id` int(8) NOT NULL,
  `tbl` varchar(20) NOT NULL,
  `o_data_cadastro` datetime NOT NULL,
  `o_data_formatada` varchar(50) NOT NULL,
  `o_anonimo` tinyint(1) NOT NULL,
  `o_nome` varchar(50) NOT NULL,
  `o_email` varchar(50) NOT NULL,
  `o_fone` varchar(20) NOT NULL,
  `o_endereco` varchar(50) NOT NULL,
  `o_bairro` varchar(50) NOT NULL,
  `o_entidade` varchar(50) NOT NULL,
  `o_assunto` varchar(50) NOT NULL,
  `o_mensagem` longtext NOT NULL,
  `o_anexo` varchar(20) NOT NULL,
  `o_status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ouvidoria`
--

INSERT INTO `ouvidoria` (`o_id`, `tbl`, `o_data_cadastro`, `o_data_formatada`, `o_anonimo`, `o_nome`, `o_email`, `o_fone`, `o_endereco`, `o_bairro`, `o_entidade`, `o_assunto`, `o_mensagem`, `o_anexo`, `o_status`) VALUES
(49, 'ouvidoria', '2018-11-01 03:09:28', '', 1, 'Anonimo', '', '', '', '', '', '', ' Existem muitas disponveis de passagens de Lorem Ipsum, mas a maioria sofreu algum tipo de alteracao, seja ', '', 1),
(41, 'ouvidoria', '2018-10-31 00:00:00', '', 1, 'Anonimo', '', '', '', '', '', '6', 'asdfasdfafd', '', 1),
(42, 'ouvidoria', '2018-10-31 00:00:00', '', 1, 'Anonimo', '', '', '', '', '', '6', 'fasdf', '', 1),
(43, 'ouvidoria', '2018-11-01 00:00:00', '', 1, 'Anonimo', '', '', '', '', '', '2', 'lorem', '', 1),
(53, 'ouvidoria', '2018-11-08 03:52:43', 'quinta-feira, 08 de nov', 1, 'Anonimo', '', '', '', '', '', '6-Criticas', '', '', 1),
(54, 'ouvidoria', '2018-11-08 03:54:28', 'quinta-feira, 08 de nov', 1, 'Anonimo', '', '', '', '', '', '6-Criticas', 'teste data formatada', '', 1),
(55, 'ouvidoria', '2018-11-01 03:09:28', '', 1, 'Anonimo', '', '', '', '', '', '', '', '', 1),
(56, 'ouvidoria', '2018-10-31 00:00:00', '', 1, 'Anonimo', '', '', '', '', '', '6', 'asdfasdfafd', '', 1),
(57, 'ouvidoria', '2018-10-31 00:00:00', '', 1, 'Anonimo', '', '', '', '', '', '6', 'fasdf', '', 1),
(58, 'ouvidoria', '2018-11-01 00:00:00', '', 1, 'Anonimo', '', '', '', '', '', '2', 'lorem', '', 1),
(59, 'ouvidoria', '2018-11-08 03:52:43', 'quinta-feira, 08 de nov', 1, 'Anonimo', '', '', '', '', '', '6-Criticas', 'teste', '', 1),
(60, 'ouvidoria', '2018-11-08 03:54:28', 'quinta-feira, 08 de nov', 1, 'Anonimo', '', '', '', '', '', '6-Criticas', 'teste data formatada', '', 1),
(61, 'ouvidoria', '2018-11-12 02:06:24', 'segunda-feira, 12 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'Existem muitas variaÃ§Ãµes disponÃ­veis de passagens de Lorem Ipsum, mas a maioria sofreu algum tipo de alteraÃ§Ã£o, seja por inserÃ§Ã£o de passagens com humor, ou palavras aleatÃ³rias que nÃ£o parecem nem um pouco convincentes. Se vocÃª pretende usar uma passagem de Lorem Ipsum, precisa ter certeza de que nÃ£o hÃ¡ algo embaraÃ§oso escrito escondido no meio do texto.', '', 1),
(62, 'ouvidoria', '2018-11-12 02:06:24', 'segunda-feira, 12 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'Existem muitas variaÃ§Ãµes disponÃ­veis de passagens de Lorem Ipsum, mas a maioria sofreu algum tipo de alteraÃ§Ã£o, seja por inserÃ§Ã£o de passagens com humor, ou palavras aleatÃ³rias que nÃ£o parecem nem um pouco convincentes. Se vocÃª pretende usar uma passagem de Lorem Ipsum, precisa ter certeza de que nÃ£o hÃ¡ algo embaraÃ§oso escrito escondido no meio do texto.', '', 1),
(63, 'ouvidoria', '2018-11-12 02:41:33', 'segunda-feira, 12 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'Existem muitas variaÃ§Ãµes disponÃ­veis de passagens de Lorem Ipsum, mas a maioria sofreu algum tipo de alteraÃ§Ã£o, seja por inserÃ§Ã£o de passagens com humor, ou palavras aleatÃ³rias que nÃ£o parecem nem um pouco convincentes. Se vocÃª pretende usar uma passagem de Lorem Ipsum, precisa ter certeza de que nÃ£o hÃ¡ algo embaraÃ§oso escrito escondido no meio do texto.', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ouvidoria`
--
ALTER TABLE `ouvidoria`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ouvidoria`
--
ALTER TABLE `ouvidoria`
  MODIFY `o_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
