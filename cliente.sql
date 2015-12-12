-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 12-Dez-2015 às 15:01
-- Versão do servidor: 5.5.46-0ubuntu0.14.04.2
-- versão do PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `academia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(100) NOT NULL,
  `cpf_cliente` varchar(11) NOT NULL,
  `email_cliente` varchar(50) NOT NULL,
  `data_nasc_cliente` varchar(10) NOT NULL,
  `endereco_cliente` varchar(50) NOT NULL,
  `status_cliente` varchar(20) NOT NULL,
  `telefone_cliente` varchar(25) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `cpf_cliente`, `email_cliente`, `data_nasc_cliente`, `endereco_cliente`, `status_cliente`, `telefone_cliente`) VALUES
(1, 'Lucas', '91019201923', 'lucas@lucas.com.br', '02/01/1999', 'Rua 01 nÂº 99', 'Ativo', '(00) 8117-9090'),
(2, 'JÃºnior', '12132369809', 'trave@trave.com.br', '28/04/1998', 'Avenida Tal nÂº 190', 'Ativo', '(00)9123-9090'),
(3, 'Escola', '45681898070', 'escola@hotmail.com', '30/08/1987', 'Rua Bla Bla 190', 'Inativo', '(00) 9123-9090'),
(4, 'Teste', '88888888888', 'teste@teste.com.br', '30/08/1987', 'Rua Bla Bla 190', 'Ativo', '(00) 9123-9090'),
(5, 'Anonimo', '99999999999', 'anonimo@rosa.com.br', '17/12/1990', 'Rua Bla Bla 190', 'Inativo', '(00) 0101-0101'),
(6, 'Noob', '77777777777', 'noob@noob.com.br', '09/09/2009', 'Rua AndrÃ© Fausto ', 'Inativo', '(66) 6666-6666'),
(7, 'Bike', '00000000000', 'bike@cross.com.br', '08/08/2008', 'Rua Bike', 'Ativo', '(77) 7777-7777'),
(8, 'JosÃ©', '22222222222', 'jose@jose.com.br', '07/07/2007', 'Rua aksjhsgws', 'Ativo', '(10) 1010-1010'),
(9, 'SibÃ©li', '55555555555', 'kkkkk@kkkk.com.br', '30/09/1999', 'Rua dos Fulanos', 'Inativo', '(22) 2222-2222'),
(10, 'Fulano', '44444444444', 'fulano@fulano.com.br', '11/11/1998', 'Rua dos Fulanos nÂº 171', 'Ativo', '(11) 1111-1111');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
