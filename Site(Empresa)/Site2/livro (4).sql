-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Out-2024 às 02:47
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `livro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrar`
--

CREATE TABLE `cadastrar` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nivel` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'cliente',
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cadastrar`
--

INSERT INTO `cadastrar` (`id`, `nome`, `nivel`, `email`, `senha`) VALUES
(18, 'Carlos Eduardo', 'adm', 'carlos@gmail.com', '$2y$10$8nx5dvWjmW9cEYz6jKzCguf7qpw07Pr4GL6WK.etpX5pUvoj8eQNS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `editarcliente`
--

CREATE TABLE `editarcliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `idade` int(11) NOT NULL,
  `fotoperfil` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `editarcliente`
--

INSERT INTO `editarcliente` (`id`, `nome`, `telefone`, `endereco`, `cep`, `cpf`, `idade`, `fotoperfil`) VALUES
(2, 'Pedro', '(21) 28382-2228', 'Rua Bela', '12345-678', '666.777.888-90', 56, 'upload/vargas.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tipo_pedido` varchar(255) NOT NULL,
  `data` datetime DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `pacote_id` int(11) NOT NULL,
  `data_pedido` datetime NOT NULL,
  `situacao` varchar(50) DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `pacote_id`, `data_pedido`, `situacao`) VALUES
(5, 60, 1, '2024-10-23 02:40:47', 'Pendente'),
(6, 71, 1, '2024-10-23 02:43:00', 'Pendente'),
(7, 60, 2, '2024-10-23 02:46:24', 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nivel` text COLLATE utf8_unicode_ci NOT NULL DEFAULT 'cliente',
  `data_cadastro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`, `cpf`, `endereco`, `nivel`, `data_cadastro`) VALUES
(60, 'João Lucas', 'joao@gmail.com', '$2y$10$bBI4/DJLFKdTs1g/xh0OsO770q3n4BBZYvtZMTbk2xfdpuBD5wRE.', '2121241-4142', '345.464.664-32', 'Rua Belém', 'adm', '2024-10-19 20:18:25'),
(70, 'GABRIEL BELMONTE MAGALHAES DOS SANTOS', 'meninomal2233@gmail.com', '$2y$10$OOnHZZ3U3sULuihg.N0g.u3RaaRSv5Fpn3fzSmzMqXx93wTgni1vS', '2197587-9902', '111.111.111-11', 'Rua Vidal Ramos, 185', 'adm', '2024-10-23 08:31:12'),
(71, 'Rafael', 'rafael@gmail.com', '$2y$10$D4JhYD2FiGqTK70lya.Kr..nH439FAdY7LB0TmRX9j.t2vtk04p.q', '2142121-4214', '524.212.451-44', 'Rua Abelar', 'cliente', '2024-10-22 21:42:42');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastrar`
--
ALTER TABLE `cadastrar`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `editarcliente`
--
ALTER TABLE `editarcliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastrar`
--
ALTER TABLE `cadastrar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `editarcliente`
--
ALTER TABLE `editarcliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
