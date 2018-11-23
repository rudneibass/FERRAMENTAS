-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Nov-2018 às 15:37
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
(63, 'ouvidoria', '2018-11-12 02:41:33', 'segunda-feira, 12 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'Existem muitas variaÃ§Ãµes disponÃ­veis de passagens de Lorem Ipsum, mas a maioria sofreu algum tipo de alteraÃ§Ã£o, seja por inserÃ§Ã£o de passagens com humor, ou palavras aleatÃ³rias que nÃ£o parecem nem um pouco convincentes. Se vocÃª pretende usar uma passagem de Lorem Ipsum, precisa ter certeza de que nÃ£o hÃ¡ algo embaraÃ§oso escrito escondido no meio do texto.', '', 1),
(64, 'ouvidoria', '2018-11-13 10:09:07', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'asdfas', '', 0),
(65, 'ouvidoria', '2018-11-13 10:13:53', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'asdfasdf', '', 0),
(66, 'ouvidoria', '2018-11-13 10:26:29', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '1', '1-Reclamacao', 'asfasfdas', '', 0),
(67, 'ouvidoria', '2018-11-13 10:27:33', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '2-Denuncia', 'fasdfasf', '', 0),
(68, 'ouvidoria', '2018-11-13 10:27:33', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '2-Denuncia', 'fasdfasf', '', 0),
(69, 'ouvidoria', '2018-11-13 10:27:33', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '2-Denuncia', 'fasdfasf', '', 0),
(70, 'ouvidoria', '2018-11-13 10:44:35', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '2-Denuncia', 'asdfafsa', '', 0),
(71, 'ouvidoria', '2018-11-13 10:45:41', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '2-Denuncia', 'fasdfasdf sdfksakdlfj sdj fsaldjf sdfj sdljf slkfj slj lj fkldj flsj lsfj fkl ou s o', '', 0),
(72, 'ouvidoria', '2018-11-13 10:45:41', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '2-Denuncia', 'fasdfasdf sdfksakdlfj sdj fsaldjf sdfj sdljf slkfj slj lj fkldj flsj lsfj fkl ou s o', '', 0),
(73, 'ouvidoria', '2018-11-13 10:47:03', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'FSADFSJFKL KSLDJF SKLDAJF LKSADJFLKASDJF LKSDF', '', 0),
(74, 'ouvidoria', '2018-11-13 10:47:03', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'FSADFSJFKL KSLDJF SKLDAJF LKSADJFLKASDJF LKSDF', '', 0),
(75, 'ouvidoria', '2018-11-13 10:51:55', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'fasdfasdfa f d ds fsdf asd fs fasd sd sd', '', 0),
(76, 'ouvidoria', '2018-11-13 10:51:55', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'fasdfasdfa f d ds fsdf asd fs fasd sd sd', '', 0),
(77, 'ouvidoria', '2018-11-13 10:51:55', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'fasdfasdfa f d ds fsdf asd fs fasd sd sd', '', 0),
(78, 'ouvidoria', '2018-11-13 10:53:01', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'sdfasdfa', '', 0),
(79, 'ouvidoria', '2018-11-13 10:53:35', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '2-Denuncia', 'fasdfasf', '', 1),
(80, 'ouvidoria', '2018-11-13 10:53:35', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '2-Denuncia', 'fasdfasf', '', 0),
(81, 'ouvidoria', '2018-11-13 10:54:13', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'asdfasdf', '', 0),
(82, 'ouvidoria', '2018-11-13 10:54:38', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '4-Elogio', 'fasdfasdfa', '', 0),
(83, 'ouvidoria', '2018-11-13 10:54:38', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '4-Elogio', 'fasdfasdfa', '', 0),
(84, 'ouvidoria', '2018-11-13 10:55:19', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'fasfasf', '', 0),
(85, 'ouvidoria', '2018-11-13 10:55:19', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'fasfasf', '', 0),
(86, 'ouvidoria', '2018-11-13 10:56:32', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'fasfsadf', '', 0),
(87, 'ouvidoria', '2018-11-13 10:56:59', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'fasdfasdf', '', 0),
(88, 'ouvidoria', '2018-11-13 10:57:41', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'fasf sfs sd fsad sad safd s ds sd f sdf sd', '', 0),
(89, 'ouvidoria', '2018-11-13 10:59:12', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'kjljfasdfa', '', 0),
(90, 'ouvidoria', '2018-11-13 11:01:21', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'fadfasdfad', '', 0),
(91, 'ouvidoria', '2018-11-13 11:12:53', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'sfklj flsfl l lks ls lsdkj fdsl fs', '', 0),
(92, 'ouvidoria', '2018-11-13 11:15:01', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'dfgfdasfsaf', '', 0),
(93, 'ouvidoria', '2018-11-13 11:15:01', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'dfgfdasfsaf', '', 0),
(94, 'ouvidoria', '2018-11-13 11:16:27', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '2-Denuncia', 'fasfasdfaf', '', 0),
(95, 'ouvidoria', '2018-11-13 11:16:27', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '2-Denuncia', 'fasfasdfaf', '', 0),
(96, 'ouvidoria', '2018-11-13 11:17:18', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'sfasfasdfsff', '', 0),
(97, 'ouvidoria', '2018-11-13 11:17:51', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '1-Reclamacao', 'fasdfasdfsf', '', 0),
(98, 'ouvidoria', '2018-11-13 11:44:50', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '2-Denuncia', 'sdfasf dsafsadsadfsdfadsfasdfsd', '', 0),
(99, 'ouvidoria', '2018-11-13 11:44:50', 'terï¿½a-feira 13 de nov', 1, 'Anonimo', '', '', '', '', '', '2-Denuncia', 'sdfasf dsafsadsadfsdfadsfasdfsd', '', 1);

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
  MODIFY `o_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
