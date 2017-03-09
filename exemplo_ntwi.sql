-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Fev-2017 às 22:12
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exemplo_ntwi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitas_despesas`
--

CREATE TABLE `receitas_despesas` (
  `id` int(11) NOT NULL COMMENT 'Chave primaria .',
  `nome` varchar(50) NOT NULL COMMENT 'Ex .: conta de telefone .',
  `mes_referencia` int(11) NOT NULL,
  `tipo` int(1) NOT NULL COMMENT '1. Receita ; 2. Despesa .',
  `classe` int(1) NOT NULL COMMENT '1. variavel ; 2. Fixo .',
  `datahora` datetime NOT NULL,
  `valor` float NOT NULL,
  `usuario` int(11) NOT NULL COMMENT 'Id do usuario a quem pertence .',
  `descricao` text COMMENT 'Comentarios adicionais .'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `receitas_despesas`
--

INSERT INTO `receitas_despesas` (`id`, `nome`, `mes_referencia`, `tipo`, `classe`, `datahora`, `valor`, `usuario`, `descricao`) VALUES
(46, 'Pagamento por manutenÃ§Ã£o', 0, 1, 2, '2017-02-13 22:08:51', 500, 1, 'Pagamento por manutenÃ§Ã£o mensal em fÃ¡brica x.'),
(47, 'Pagamento por manutenÃ§Ã£o', 1, 1, 2, '2017-02-13 22:08:51', 500, 1, 'Pagamento por manutenÃ§Ã£o mensal em fÃ¡brica x.'),
(48, 'Pagamento por manutenÃ§Ã£o', 2, 1, 2, '2017-02-13 22:08:51', 500, 1, 'Pagamento por manutenÃ§Ã£o mensal em fÃ¡brica x.'),
(49, 'Pagamento por manutenÃ§Ã£o', 3, 1, 2, '2017-02-13 22:08:51', 500, 1, 'Pagamento por manutenÃ§Ã£o mensal em fÃ¡brica x.'),
(50, 'Pagamento por manutenÃ§Ã£o', 4, 1, 2, '2017-02-13 22:08:51', 500, 1, 'Pagamento por manutenÃ§Ã£o mensal em fÃ¡brica x.'),
(51, 'Pagamento por manutenÃ§Ã£o', 5, 1, 2, '2017-02-13 22:08:51', 500, 1, 'Pagamento por manutenÃ§Ã£o mensal em fÃ¡brica x.'),
(52, 'Pagamento por manutenÃ§Ã£o', 6, 1, 2, '2017-02-13 22:08:51', 500, 1, 'Pagamento por manutenÃ§Ã£o mensal em fÃ¡brica x.'),
(53, 'Pagamento por manutenÃ§Ã£o', 7, 1, 2, '2017-02-13 22:08:51', 500, 1, 'Pagamento por manutenÃ§Ã£o mensal em fÃ¡brica x.'),
(54, 'Pagamento por manutenÃ§Ã£o', 8, 1, 2, '2017-02-13 22:08:51', 500, 1, 'Pagamento por manutenÃ§Ã£o mensal em fÃ¡brica x.'),
(55, 'Pagamento por manutenÃ§Ã£o', 9, 1, 2, '2017-02-13 22:08:51', 500, 1, 'Pagamento por manutenÃ§Ã£o mensal em fÃ¡brica x.'),
(56, 'Pagamento por manutenÃ§Ã£o', 10, 1, 2, '2017-02-13 22:08:51', 500, 1, 'Pagamento por manutenÃ§Ã£o mensal em fÃ¡brica x.'),
(57, 'Pagamento por manutenÃ§Ã£o', 11, 1, 2, '2017-02-13 22:08:51', 500, 1, 'Pagamento por manutenÃ§Ã£o mensal em fÃ¡brica x.'),
(58, 'Material de escritÃ³rio', 0, 2, 2, '2017-02-13 22:09:32', 50, 1, 'Despesa mensal com material de escritÃ³rio.'),
(59, 'Material de escritÃ³rio', 1, 2, 2, '2017-02-13 22:09:32', 50, 1, 'Despesa mensal com material de escritÃ³rio.'),
(60, 'Material de escritÃ³rio', 2, 2, 2, '2017-02-13 22:09:32', 50, 1, 'Despesa mensal com material de escritÃ³rio.'),
(61, 'Material de escritÃ³rio', 3, 2, 2, '2017-02-13 22:09:32', 50, 1, 'Despesa mensal com material de escritÃ³rio.'),
(62, 'Material de escritÃ³rio', 4, 2, 2, '2017-02-13 22:09:32', 50, 1, 'Despesa mensal com material de escritÃ³rio.'),
(63, 'Material de escritÃ³rio', 5, 2, 2, '2017-02-13 22:09:32', 50, 1, 'Despesa mensal com material de escritÃ³rio.'),
(64, 'Material de escritÃ³rio', 6, 2, 2, '2017-02-13 22:09:32', 50, 1, 'Despesa mensal com material de escritÃ³rio.'),
(65, 'Material de escritÃ³rio', 7, 2, 2, '2017-02-13 22:09:32', 50, 1, 'Despesa mensal com material de escritÃ³rio.'),
(66, 'Material de escritÃ³rio', 8, 2, 2, '2017-02-13 22:09:32', 50, 1, 'Despesa mensal com material de escritÃ³rio.'),
(67, 'Material de escritÃ³rio', 9, 2, 2, '2017-02-13 22:09:32', 50, 1, 'Despesa mensal com material de escritÃ³rio.'),
(68, 'Material de escritÃ³rio', 10, 2, 2, '2017-02-13 22:09:32', 50, 1, 'Despesa mensal com material de escritÃ³rio.'),
(69, 'Material de escritÃ³rio', 11, 2, 2, '2017-02-13 22:09:32', 50, 1, 'Despesa mensal com material de escritÃ³rio.'),
(70, 'Pagamento por serviÃ§o', 3, 1, 1, '2017-02-13 22:11:16', 1500, 1, 'Pagamento por serviÃ§os prestados em empresa x no mÃªs de MarÃ§o.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL COMMENT 'Chave primaria .',
  `login` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sexo` int(11) NOT NULL COMMENT '1. Feminino ; 2. Masculino .',
  `identidade` varchar(20) DEFAULT NULL COMMENT 'Apenas numeros',
  `cpf` varchar(11) NOT NULL COMMENT 'Apenas numeros.',
  `nascimento` date NOT NULL,
  `estado_civil` int(11) NOT NULL COMMENT '1. Solteiro ; 2. Casado ; 3. Separado ;\r\n4. Divorciado ; 5. Viuvo ; 6. Uniao estavel .',
  `funcao_empresa` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(8) NOT NULL COMMENT 'Apenas numeros.',
  `perfil` int(11) NOT NULL COMMENT '1. Padrao ; 2. Administrador.',
  `cad_usuario` int(11) NOT NULL COMMENT 'Id do usuario que efetuou o cadastro .',
  `cad_datahora` datetime NOT NULL COMMENT 'Data e hora de efetivacao do cadastro .'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `nome`, `sexo`, `identidade`, `cpf`, `nascimento`, `estado_civil`, `funcao_empresa`, `email`, `telefone`, `perfil`, `cad_usuario`, `cad_datahora`) VALUES
(1, 'admin', 'admin', 'Administrador Padrao', 2, NULL, '00000000000', '2011-08-09', 1, 'Administracao', 'admin@minhaempresa.com.br', '00000000', 2, 1, '2011-08-09 17:44:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `receitas_despesas`
--
ALTER TABLE `receitas_despesas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`,`identidade`,`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `receitas_despesas`
--
ALTER TABLE `receitas_despesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Chave primaria .', AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Chave primaria .', AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
