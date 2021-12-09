-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Dez-2021 às 02:24
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `meusfilmes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Ação'),
(2, 'Aventura'),
(3, 'Biográfico'),
(4, 'Comédia'),
(5, 'Comédia romântica'),
(6, 'Histórico'),
(7, 'Drama'),
(8, 'Ficção científica'),
(9, 'Terror');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `diretor` varchar(100) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `data_lancamento` date NOT NULL,
  `duracao` time NOT NULL,
  `categoria_id` int(10) NOT NULL,
  `assistido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id`, `nome`, `diretor`, `descricao`, `imagem`, `data_lancamento`, `duracao`, `categoria_id`, `assistido`) VALUES
(2, 'Interestelar2', 'Christopher Nolan', 'As reservas naturais da Terra estão chegando ao fim e um grupo de astronautas recebe a missão de verificar possíveis planetas para receberem a população mundial, possibilitando a continuação da espécie. ', 'https://br.web.img3.acsta.net/c_310_420/pictures/14/10/31/20/39/476171.jpg', '2014-11-06', '02:49:00', 1, 1),
(3, 'Toy Story 4', 'Josh Cooley', 'Woody, Buzz Lightyear e o resto da turma embarcam em uma viagem com Bonnie e um novo brinquedo chamado Forky. A aventura logo se transforma em uma reunião inesperada quando o ligeiro desvio que Woody faz o leva ao seu amigo há muito perdido, Bo Peep.', 'https://br.web.img2.acsta.net/c_310_420/pictures/19/03/27/21/03/0464387.jpg', '2019-06-20', '01:40:00', 10, 1),
(4, 'Perdido em Marte', 'Ridley Scott', 'O astronauta Mark Watney é enviado a uma missão para Marte, mas após uma severa tempestade, ele é dado como morto, abandonado pelos colegas e acorda sozinho no planeta inóspito com escassos suprimentos e sem saber como reencontrar os companheiros ou retor', 'https://br.web.img3.acsta.net/c_310_420/pictures/16/01/18/18/57/082205.jpg', '2015-10-01', '02:24:00', 8, 0),
(5, 'Thor: Ragnarok', 'Taika Waititi', 'Após anos afastado, Thor retorna para casa e descobre que seu pai Odin, rei de Asgard, está desaparecido. Após encontrá-lo, ele toma conhecimento de sua irmã mais velha, Hela, a poderosa e implacável deusa da morte.', 'https://br.web.img3.acsta.net/c_310_420/pictures/17/08/26/00/05/175443.jpg', '2017-10-26', '02:11:00', 1, 0),
(7, 'Homem-Aranha: Sem Volta para Casa', 'Jon Watts', 'O Homem-Aranha precisa lidar com as consequências da sua verdadeira identidade ter sido descoberta.', 'https://br.web.img3.acsta.net/c_310_420/pictures/21/11/08/16/02/3963914.png', '2021-12-17', '00:00:00', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `imagem`, `nome`, `email`, `senha`) VALUES
(3, NULL, 'André Luis', 'andreluisstn@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, NULL, 'André Luis de Santana Santos', 'andresantos10899@soumaissantissimo.com.br', '202cb962ac59075b964b07152d234b70'),
(9, NULL, 'teste23', 'teste23@teste.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
