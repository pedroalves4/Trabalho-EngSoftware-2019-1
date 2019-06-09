-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Jun-2019 às 00:06
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
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `preco` float NOT NULL,
  `fabricante` varchar(40) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `setor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `fabricante`, `quantidade`, `setor`) VALUES
(1, 'Garrafa 300ml', 2, 'Coca-Cola', 100, 3),
(3, 'Chup-Chup Gourmet', 3, 'Juliane', 20, 4),
(4, 'Queijo Minas', 14.25, 'BrÃ¡s Heleno', 4, 2),
(5, 'Presunto', 0.8, 'Sadia', 3000, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

CREATE TABLE `setores` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `descricao` varchar(60) DEFAULT NULL,
  `nid` varchar(10) NOT NULL,
  `responsavel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `setores`
--

INSERT INTO `setores` (`id`, `nome`, `descricao`, `nid`, `responsavel`) VALUES
(2, 'LaticÃ­neos', 'Produtos derivados do Leite', '048', 33),
(3, 'Bebidas', 'NÃ£o AlcoÃ³licas', '027', 32),
(4, 'Frios', 'Geladinhos', '079', 32);

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
  `cnpj` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `nid` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `salario` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `cargo` varchar(40) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `tipo`, `nome`, `telefone`, `cpf`, `endereco`, `complemento`, `cidade`, `estado`, `cep`, `cnpj`, `nid`, `salario`, `cargo`) VALUES
(5, 'teste@teste.com', 'teste', 'Admin', 'Seu Ze', '32 23232-323', '123.456.789-10', 'Rua do Lojao', '3o Andar', 'Juiz de Fora', 'MG', '36.037-010', '', '001', 'R$ 10.000,0', 'Administrador'),
(9, 'teste1@teste.com', 'teste', 'Cliente', 'Fulano', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-03', '', '', ''),
(10, 'teste2@teste.com', 'teste', 'Cliente', 'Sicrano', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-05', '', '', ''),
(11, 'teste3@teste.com', 'teste', 'Cliente', 'Beltrano', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-06', '', '', ''),
(12, 'teste4@teste.com', 'teste', 'Cliente', 'Fulano', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-07', '', '', ''),
(13, 'teste5@teste.com', 'teste', 'Cliente', 'Jose', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-08', '', '', ''),
(14, 'teste6@teste.com', 'teste', 'Cliente', 'Joao', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-01', '', '', ''),
(15, 'teste7@teste.com', 'teste', 'Cliente', 'Maria', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-14', '', '', ''),
(16, 'teste8@teste.com', 'teste', 'Cliente', 'Ana', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-34', '', '', ''),
(17, 'teste9@teste.com', 'teste', 'Cliente', 'Paulo', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-54', '', '', ''),
(18, 'teste10@teste.com', 'teste', 'Cliente', 'Felipe', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-67', '', '', ''),
(19, 'teste11@teste.com', 'teste', 'Cliente', 'Mateus', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-43', '', '', ''),
(20, 'teste12@teste.com', 'teste', 'Cliente', 'Antonia', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-34', '', '', ''),
(21, 'teste13@teste.com', 'teste', 'Cliente', 'Paula', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-24', '', '', ''),
(22, 'teste14@teste.com', 'teste', 'Cliente', 'Carolina', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-14', '', '', ''),
(23, 'teste15@teste.com', 'teste', 'Cliente', 'Lucas', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '12.716.284/0001-34', '', '', ''),
(24, 'teste16@teste.com', 'teste', 'Funcionario', 'Julia', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '', '002', 'R$ 2420,10', 'Vendedor'),
(25, 'teste17@teste.com', 'teste', 'Funcionario', 'Pedro', '32 3232 3232', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '', '003', 'R$ 1850,00', 'Vendedor'),
(26, 'teste18@teste.com', 'teste', 'Funcionario', 'Antonio', '32 11111-111', '123.456.789.10', 'Rua Principal', '', 'Juiz de Fora', 'MG', '36037038', '', '004', 'R$ 4100,00', 'Vendedor'),
(27, 'ruan@ruan.com', 'ruan', 'cliente', 'Ruan', '11 11111-111', '111.111.111-11', '1', '1', '1', 'PI', '11.111-111', '11.111.111/111', '', '', ''),
(29, 'teste200@teste.com', 'teste', 'Cliente', 'Teste', '00 00000-000', '000.000.000-00', 'Rua de Teste', 'Teste', 'Testando a Cidade', 'MT', '00.000-000', '00.000.000/000', '', '', ''),
(31, 'lucas@teste.com', '123456', 'Cliente', 'Lucas', '24 99999-999', '333.333.333-33', 'Av rio branco', 'Apartamment', 'aaaaaaa', 'AC', '33.333-333', '', '', '', ''),
(32, 'teste19@teste.com', 'teste', 'Funcionario', 'JotaPÃª', '00 00000-000', '111.111.111-11', 'Rua do Buraco', 'Bloco G, 501', 'Matias Barbosa', 'MG', '22.222-222', '', '005', '3.000,00', 'Administrador'),
(33, 'teste20@teste.com', 'teste', 'Funcionario', 'Andressa', '11 11111-111', '222.222.222-22', 'Rua Principal', 'Esquina com a Rua do Buraco', 'Bicas', 'MG', '33.333-333', '', '006', '3.520,00', 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `funcionario` int(11) NOT NULL,
  `data` varchar(14) NOT NULL,
  `desconto` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `cliente`, `funcionario`, `data`, `desconto`, `total`) VALUES
(1, 31, 33, '2019-06-16', 10, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas_produtos`
--

CREATE TABLE `vendas_produtos` (
  `id` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `venda` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas_produtos`
--

INSERT INTO `vendas_produtos` (`id`, `produto`, `venda`, `quantidade`, `preco`) VALUES
(1, 1, 1, 1, 0),
(2, 3, 1, 2, 0),
(3, 4, 1, 3, 0),
(4, 5, 1, 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produtos` (`setor`);

--
-- Indexes for table `setores`
--
ALTER TABLE `setores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_responsavel` (`responsavel`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente`),
  ADD KEY `funcionario_id` (`funcionario`);

--
-- Indexes for table `vendas_produtos`
--
ALTER TABLE `vendas_produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto_id` (`produto`),
  ADD KEY `venda_id` (`venda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setores`
--
ALTER TABLE `setores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendas_produtos`
--
ALTER TABLE `vendas_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `id_produtos` FOREIGN KEY (`setor`) REFERENCES `setores` (`id`);

--
-- Limitadores para a tabela `setores`
--
ALTER TABLE `setores`
  ADD CONSTRAINT `id_responsavel` FOREIGN KEY (`responsavel`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `cliente_id` FOREIGN KEY (`cliente`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `funcionario_id` FOREIGN KEY (`funcionario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `vendas_produtos`
--
ALTER TABLE `vendas_produtos`
  ADD CONSTRAINT `produto_id` FOREIGN KEY (`produto`) REFERENCES `produtos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `venda_id` FOREIGN KEY (`venda`) REFERENCES `vendas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
