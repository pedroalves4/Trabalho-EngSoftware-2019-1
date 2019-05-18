-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Abr-2019 às 15:43
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lojaze`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `tipo` varchar(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `endereco` varchar(40) CHARACTER SET latin1 NOT NULL,
  `complemento` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `cidade` varchar(40) CHARACTER SET latin1 NOT NULL,
  `estado` varchar(40) CHARACTER SET latin1 NOT NULL,
  `cep` varchar(10) CHARACTER SET latin1 NOT NULL,
  `cnpj` varchar(40) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `tipo`, `nome`, `telefone`, `cpf`, `endereco`, `complemento`, `cidade`, `estado`, `cep`, `cnpj`) VALUES
(9, 'teste1@teste.com', 'teste', 'Cliente', 'Fulano', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-03'),
(5, 'teste@teste.com', 'teste', 'Admin', 'Seu Ze', '32 23232-323', '123.456.789-10', 'Rua do Lojao', '3o Andar', 'Juiz de Fora', 'MG', '36.037-010', ''),
(10, 'teste2@teste.com', 'teste', 'Cliente', 'Sicrano', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-05'),
(11, 'teste3@teste.com', 'teste', 'Cliente', 'Beltrano', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-06'),
(12, 'teste4@teste.com', 'teste', 'Cliente', 'Fulano', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-07'),
(13, 'teste5@teste.com', 'teste', 'Cliente', 'Jose', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-08'),
(14, 'teste6@teste.com', 'teste', 'Cliente', 'Joao', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-01'),
(15, 'teste7@teste.com', 'teste', 'Cliente', 'Maria', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-14'),
(16, 'teste8@teste.com', 'teste', 'Cliente', 'Ana', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-34'),
(17, 'teste9@teste.com', 'teste', 'Cliente', 'Paulo', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-54'),
(18, 'teste10@teste.com', 'teste', 'Cliente', 'Felipe', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-67'),
(19, 'teste11@teste.com', 'teste', 'Cliente', 'Mateus', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-43'),
(20, 'teste12@teste.com', 'teste', 'Cliente', 'Antonia', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-34'),
(21, 'teste13@teste.com', 'teste', 'Cliente', 'Paula', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-24'),
(22, 'teste14@teste.com', 'teste', 'Cliente', 'Carolina', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-14'),
(23, 'teste15@teste.com', 'teste', 'Cliente', 'Lucas', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-34'),
(24, 'teste16@teste.com', 'teste', 'Cliente', 'Julia', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-54'),
(25, 'teste17@teste.com', 'teste', 'Cliente', 'Pedro', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-74'),
(26, 'teste18@teste.com', 'teste', 'Cliente', 'Antonio', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
