-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 07-Nov-2022 às 03:03
-- Versão do servidor: 10.6.5-MariaDB
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estoque` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `vl_total` decimal(11,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estoque` (`id_estoque`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id`, `id_estoque`, `qtd`, `vl_total`) VALUES
(15, 4, 6, '47.80'),
(16, 9, 3, '8.46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `tipo`) VALUES
(1, 'Alimentos Básicos'),
(2, 'Bebidas'),
(3, 'Biscoitos e Salgadinhos'),
(4, 'Matinais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vl_venda` decimal(10,2) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `ipi` int(11) NOT NULL,
  `desconto` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id`, `nome`, `vl_venda`, `id_categoria`, `ipi`, `desconto`, `img`) VALUES
(4, 'Farofa Pronta Yoki Temperada 500g', '8.49', 1, 22, 15, 'Farofa Pronta Yoki Temperada.jpeg'),
(2, 'Milho para Pipoca Tipo 1 Yoki Premium 500g', '7.00', 1, 22, 0, 'Milho para Pipoca Tipo 1 Yoki.jpeg'),
(3, 'Arroz Branco Tio João 1kg', '8.49', 1, 22, 0, 'Arroz Branco Tio João.jpeg'),
(6, 'Azeite Gallo Tipo Único 500ml', '20.79', 1, 15, 20, 'Azeite Gallo.jpeg'),
(7, 'Óleo de Soja Soya 900ml', '7.99', 1, 22, 16, 'Óleo de Soja Soya.jpeg'),
(8, 'Pipoca de Microondas Popcorn Manteiga de Cinema Yoki 100g', '4.39', 1, 12, 11, 'Pipoca de Microondas Popcorn Manteiga de Cinema Yoki.jpeg'),
(9, 'Água Tônica Schweppes 350ml', '3.29', 2, 22, 21, 'Água Tônica Schweppes 350ml.jpeg'),
(10, 'Cerveja Heineken Garrafa 330ml', '5.99', 2, 15, 0, 'Cerveja Heineken Garrafa 330ml.jpeg'),
(11, 'Cerveja Heineken Lata 350ml', '4.99', 2, 20, 15, 'Cerveja Heineken Lata 350ml.jpeg'),
(12, 'Coca-Cola Original 220ml', '2.49', 2, 22, 0, 'Coca-Cola Original 220ml.jpeg'),
(13, 'Refrigerante Guaraná Antarctica 2l', '6.99', 2, 22, 0, 'Refrigerante Guaraná Antarctica 2l.jpeg'),
(14, 'Água Tônica Schweppes 350ml', '3.29', 2, 22, 21, 'Água Tônica Schweppes 350ml.jpeg'),
(15, 'Coca-Cola Original Pet 220ml', '1.99', 2, 25, 0, 'Coca-Cola Original Pet 220ml.jpeg'),
(16, 'Coca-Cola sem Açúcar 1,5l', '8.99', 2, 20, 15, 'Coca-Cola sem Açúcar 1,5l.jpeg'),
(17, 'Energético Monster Khaos Lata 473ml', '5.49', 2, 22, 10, 'Energético Monster Khaos Lata 473ml.jpeg'),
(18, 'Batata Frita Lisa Clássica Lays 80g', '4.59', 3, 22, 10, 'Batata Frita Lisa Clássica Lays 80g.jpeg'),
(19, 'Café Caboclo Tradicional a Vácuo Pacote 500g', '10.29', 4, 20, 0, 'Café Caboclo Tradicional a Vácuo Pacote 500g.jpeg'),
(20, 'Batata Frita Lisa Clássica Lays 80g', '4.59', 3, 22, 10, 'Batata Frita Lisa Clássica Lays 80g.jpeg'),
(21, 'Café Caboclo Tradicional a Vácuo Pacote 500g', '10.29', 4, 20, 0, 'Café Caboclo Tradicional a Vácuo Pacote 500g.jpeg'),
(27, 'Café Melitta Extraforte Vácuo 500g', '10.29', 4, 20, 0, 'Café Caboclo Tradicional a Vácuo Pacote 500g.jpeg'),
(26, 'Biscoito Club Social Regular Original Multipack 144g', '4.59', 3, 22, 10, 'Biscoito Club Social Regular Original Multipack 144g.jpeg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
