-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 04-Dez-2018 às 18:37
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esic`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comissoes`
--

DROP TABLE IF EXISTS `comissoes`;
CREATE TABLE IF NOT EXISTS `comissoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_cadastro` timestamp NOT NULL,
  `tbl` char(50) NOT NULL,
  `legislatura` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `sigla` varchar(6) NOT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `vereador` varchar(50) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comissoes`
--

INSERT INTO `comissoes` (`id`, `data_cadastro`, `tbl`, `legislatura`, `tipo`, `sigla`, `cargo`, `vereador`, `data_inicio`, `data_fim`) VALUES
(2, '2018-11-30 10:04:25', 'comissoes', 1, '1', 'fasdf', 'fasf', 'Fundamental - Incompleto', '2018-11-01', '2018-11-01'),
(3, '2018-11-30 10:04:25', 'comissoes', 1, '1', 'fasdf', 'fasf', 'Fundamental - Incompleto', '2018-11-01', '2018-11-01'),
(4, '2018-11-30 10:04:25', 'comissoes', 1, '1', 'fasdf', 'fasf', 'Fundamental - Incompleto', '2018-11-01', '2018-11-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `legislaturas`
--

DROP TABLE IF EXISTS `legislaturas`;
CREATE TABLE IF NOT EXISTS `legislaturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_cadastro` timestamp NOT NULL,
  `tbl` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `data_eleicao` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `legislaturas`
--

INSERT INTO `legislaturas` (`id`, `data_cadastro`, `tbl`, `numero`, `data_inicio`, `data_fim`, `data_eleicao`) VALUES
(20, '2018-11-29 07:43:33', 'legislaturas', 811, '2018-11-01', '2018-11-01', '2018-11-01'),
(19, '2018-11-29 07:43:33', 'legislaturas', 810, '2018-11-01', '2018-11-01', '2018-11-01'),
(18, '2018-11-29 07:43:33', 'legislaturas', 809, '2018-11-01', '2018-11-01', '2018-11-01'),
(17, '2018-11-29 07:43:12', 'legislaturas', 808, '2018-11-01', '2018-11-01', '2018-11-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ouvidoria`
--

DROP TABLE IF EXISTS `ouvidoria`;
CREATE TABLE IF NOT EXISTS `ouvidoria` (
  `o_id` int(8) NOT NULL AUTO_INCREMENT,
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
  `o_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `reponsabilidade_detalhe`
--

DROP TABLE IF EXISTS `reponsabilidade_detalhe`;
CREATE TABLE IF NOT EXISTS `reponsabilidade_detalhe` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `id_responsabilidade` int(200) NOT NULL,
  `arquivo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reponsabilidade_detalhe`
--

INSERT INTO `reponsabilidade_detalhe` (`id`, `id_responsabilidade`, `arquivo`) VALUES
(4, 22, '5e9e5247e5486b1307038ac56fe27838.jpg'),
(3, 22, '454e3d7f9ab9c35610061f68c72f891c.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsabilidade`
--

DROP TABLE IF EXISTS `responsabilidade`;
CREATE TABLE IF NOT EXISTS `responsabilidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl` varchar(50) NOT NULL,
  `data_cadastro` timestamp NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `data_publicacao` date NOT NULL,
  `tipo_lrf` varchar(50) NOT NULL,
  `tipo_periodo` int(11) NOT NULL,
  `periodo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `responsabilidade`
--

INSERT INTO `responsabilidade` (`id`, `tbl`, `data_cadastro`, `descricao`, `data_publicacao`, `tipo_lrf`, `tipo_periodo`, `periodo`) VALUES
(1, 'responsabilidade', '2018-12-04 03:29:21', 'Sem desc', '2018-12-06', '2', 1, '2'),
(2, 'responsabilidade', '2018-12-04 04:06:15', 'jhgjh', '2018-12-04', '1', 1, '1'),
(3, 'responsabilidade', '2018-12-04 04:07:00', 'hkj', '2018-12-05', '2', 1, '1'),
(4, 'responsabilidade', '2018-12-04 04:09:06', 'kjhkl', '2018-12-06', '1', 1, '1'),
(5, 'responsabilidade', '2018-12-04 04:09:06', 'kjhkl', '2018-12-06', '1', 1, '1'),
(6, 'responsabilidade', '2018-12-04 04:09:06', 'kjhkl', '2018-12-06', '1', 1, '1'),
(7, 'responsabilidade', '2018-12-04 04:09:06', 'kjhkl', '2018-12-06', '1', 1, '1'),
(8, 'responsabilidade', '2018-12-04 04:09:06', 'kjhkl', '2018-12-06', '1', 1, '1'),
(9, 'responsabilidade', '2018-12-04 04:10:38', 'khkl', '2018-12-04', '1', 1, '1'),
(10, 'responsabilidade', '2018-12-04 04:25:20', 'gggg', '2018-12-15', '1', 2, '3'),
(11, 'responsabilidade', '2018-12-04 05:16:44', 'Kkakaka', '2018-12-08', '1', 2, '2'),
(12, 'responsabilidade', '2018-12-04 05:17:12', 'xxx', '2018-12-07', '2', 2, '2'),
(13, 'responsabilidade', '2018-12-04 05:18:23', 'ddd', '2018-12-14', '2', 1, '3'),
(14, 'responsabilidade', '2018-12-04 05:42:43', 'Rapaz', '2018-12-06', '2', 2, '1'),
(15, 'responsabilidade', '2018-12-04 05:42:43', 'Rapaz', '2018-12-06', '2', 2, '1'),
(16, 'responsabilidade', '2018-12-04 05:42:43', 'Rapaz', '2018-12-06', '2', 2, '1'),
(17, 'responsabilidade', '2018-12-04 05:42:43', 'Rapaz', '2018-12-06', '2', 2, '1'),
(18, 'responsabilidade', '2018-12-04 05:44:34', 'ss', '2018-12-14', '2', 2, '1'),
(19, 'responsabilidade', '2018-12-04 06:12:37', 'kkkk', '2018-12-27', '2', 1, '1'),
(20, 'responsabilidade', '2018-12-04 06:20:58', 'jajaja', '2018-12-07', '1', 1, '2'),
(21, 'responsabilidade', '2018-12-04 06:24:04', 'Ameixa', '2018-12-14', '2', 2, '3'),
(22, 'responsabilidade', '2018-12-04 06:25:18', 'Amora', '2018-12-20', '2', 2, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servidor`
--

DROP TABLE IF EXISTS `servidor`;
CREATE TABLE IF NOT EXISTS `servidor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_cadastro` timestamp NOT NULL,
  `data_formatada` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nome_eleitoral` varchar(50) NOT NULL,
  `partido` varchar(10) NOT NULL,
  `numero_gabinete` int(11) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `zona` int(11) DEFAULT NULL,
  `sessao` int(11) DEFAULT NULL,
  `escolaridade` varchar(50) NOT NULL,
  `mae` varchar(50) NOT NULL,
  `pai` varchar(50) NOT NULL,
  `data_nascimento` varchar(50) NOT NULL,
  `naturalidade` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `ocupacao` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(50) NOT NULL,
  `fone1` varchar(50) NOT NULL,
  `fone2` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bio` longtext NOT NULL,
  `foto` varchar(50) NOT NULL,
  `web_page` varchar(50) NOT NULL,
  `tbl` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servidor`
--

INSERT INTO `servidor` (`id`, `data_cadastro`, `data_formatada`, `nome`, `nome_eleitoral`, `partido`, `numero_gabinete`, `cpf`, `titulo`, `zona`, `sessao`, `escolaridade`, `mae`, `pai`, `data_nascimento`, `naturalidade`, `cargo`, `ocupacao`, `endereco`, `numero`, `bairro`, `complemento`, `cep`, `cidade`, `uf`, `fone1`, `fone2`, `email`, `bio`, `foto`, `web_page`, `tbl`) VALUES
(2, '2018-11-19 15:44:50', 'sexta-feira 23 de nov', 'LOURO DA BARRA', '', 'PT', 0, '38461938879', '', 0, 0, '', 'maria pezao', 'ze do pezao', '1950-03-04', 'iguatu', '', 'pedreiro', 'beco da viela', 0, 'morro do pau queimado', '', '63500-000', 'cidade de Deus', 'ce', '99999999', '99999999', 'pezao@chico.com', '', 'servidores/img/P_20171012_093305_BF.jpg', '', 'servidor'),
(8, '2018-11-23 09:10:07', 'sexta-feira 23 de nov', 'MATHEUS ARAÃšJO', 'MATHEUS ARAÃšJO', '', 0, '', '', 0, 0, '', 'ANA LÃšCIA BATISTA GUEDES', 'JOSÃ‰ AIRTON ARAÃšJO', '05/10/1994', 'CEDRO', '', '', '', 0, '', '', '', '', '', '(88)9805-7743', '', '', '', 'servidores/img/Chrysanthemum.jpg', '', 'servidor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `data_cadastro` timestamp NOT NULL,
  `foto` varchar(50) NOT NULL,
  `tbl` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `email`, `tipo`, `ativo`, `data_cadastro`, `foto`, `tbl`) VALUES
(1, 'RUDNEI BASS', 'rudnei', 'RUDNEI', '', '1', 1, '2018-11-27 13:13:33', '', 'usuarios'),
(2, 'wilton procopio', 'wilton procopio', 'wilton', 'wprocopio@gmail.com', '1', 1, '2018-11-27 13:48:42', '', 'usuarios');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
