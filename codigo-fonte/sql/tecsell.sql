-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Jan-2022 às 11:15
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tecsell`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_produto`
--

CREATE TABLE `cadastro_produto` (
  `cod_produto` int(11) NOT NULL,
  `nome_produto` varchar(150) NOT NULL,
  `status_produto` enum('Ativo','Bloqueado') NOT NULL DEFAULT 'Ativo',
  `data_cadastro_produto` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email_usuario` varchar(100) NOT NULL,
  `cod_categoria_produto` int(11) NOT NULL,
  `preco_produto` int(14) NOT NULL,
  `estado_produto` enum('Novo','Usado') NOT NULL DEFAULT 'Usado',
  `localizacao_produto` varchar(10) NOT NULL,
  `descricao_produto` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastro_produto`
--

INSERT INTO `cadastro_produto` (`cod_produto`, `nome_produto`, `status_produto`, `data_cadastro_produto`, `email_usuario`, `cod_categoria_produto`, `preco_produto`, `estado_produto`, `localizacao_produto`, `descricao_produto`) VALUES
(1, 'Tablet a7 T505 4G 10.4 polegadas- Nunca Usado, na garantia e nota fiscal', 'Ativo', '2022-01-03 15:11:26', 'j-r-p@outlook.com', 4, 1250, 'Usado', '12240-000', 'Comprado na Loja Americanas. Tablet T505 Samsung Galaxy Tab A7 10,4 polegadas com chip 4G Wi-Fi 64GB- NOVO, NUNCA USADO, NA CAIXA! COMPRADO 2 MESES, COM NOTA FISCAL. Chama no watsapp (85) 9815... ver número ***Ótimo pra ser usado nos estudos, aceita uso de teclado e mouse!!!\n\nMotivo: Comprei pra minha filha, mas logo depois ela ganhou do noivo um IPAD.\n\n- Aplicadas PELÍCULAS DE VIDRO e FIBRA DE CARBONO\n- Câmera Traseira 8mp, Câmera Frontal para lives, aulas e transmissões ao vivo 5mp\n- PROCESSADOR MEGA VELOZ OCTA CORE, COM 3GIGAS DE RAM. VELOCIDADE!!!\n- 64 GB DE MEMÓRIA, EXPANSÃO DE 1 TERABYTE\n- ENTRADA PARA CHIP, INTERNET 4G.\n- ANDROID 11 COM ATUALIZAÇÃO PARA O 12\n- BATERIA ABSURDA DE QUASE 8 mil mAh.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_usuarios`
--

CREATE TABLE `cadastro_usuarios` (
  `cpf_usuario` varchar(14) NOT NULL,
  `status_usuario` enum('Ativo','Bloqueado') NOT NULL DEFAULT 'Ativo',
  `nome_usuario` varchar(100) NOT NULL,
  `sobrenome_usuario` varchar(100) NOT NULL,
  `telefone_usuario` varchar(14) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(50) NOT NULL,
  `foto_usuario` varchar(100) NOT NULL DEFAULT 'fotos/sistema/usuariosemfoto.jpg',
  `data_cadastro_usuario` timestamp NOT NULL DEFAULT current_timestamp(),
  `cod_recuperacao` varchar(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastro_usuarios`
--

INSERT INTO `cadastro_usuarios` (`cpf_usuario`, `status_usuario`, `nome_usuario`, `sobrenome_usuario`, `telefone_usuario`, `email_usuario`, `senha_usuario`, `foto_usuario`, `data_cadastro_usuario`, `cod_recuperacao`) VALUES
('222.222.222-22', 'Ativo', 'Eliel', 'Nunes Pinto', '(11) 111111111', 'elielnunesp@gmail.com', '40bf696d25dd56ed44c864e05f75d33a4cface91', './fotos/usuarios/foto_030120221153221995.jpg', '2022-01-03 14:46:47', '0'),
('111.111.111-11', 'Ativo', 'João', 'Rodrigues Parra', '(11) 944813344', 'j-r-p@outlook.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', './fotos/usuarios/foto_030120221152341320.jpg', '2022-01-03 14:45:21', '0'),
('333.333.333-33', 'Ativo', 'Miriã', 'Rodrigues Parra', '(22) 222222222', 'mirisa03@gmail.com', '76cd7980a9351ecde57656c7974bd699ae56a8ca', './fotos/usuarios/foto_030120221153491798.jpg', '2022-01-03 14:47:24', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `cod_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(100) NOT NULL,
  `status_categoria` enum('Ativo','Bloqueado') NOT NULL DEFAULT 'Ativo',
  `foto_categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`cod_categoria`, `nome_categoria`, `status_categoria`, `foto_categoria`) VALUES
(1, 'Computadores', 'Ativo', 'icons/computadores.png'),
(2, 'Laptops', 'Ativo', 'icons/laptops.png'),
(3, 'Hardware', 'Ativo', 'icons/hardware.png'),
(4, 'Tablets', 'Ativo', 'icons/tablets.png'),
(5, 'Celulares', 'Ativo', 'icons/celulares.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chatanuncio`
--

CREATE TABLE `chatanuncio` (
  `cod_chat` int(11) NOT NULL,
  `cod_anuncio` int(11) NOT NULL,
  `email_vendedor` varchar(100) NOT NULL,
  `email_comprador` varchar(100) NOT NULL,
  `data_criacao_chat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_chat` enum('Ativo','Bloqueado') NOT NULL DEFAULT 'Ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fichatec_celulares`
--

CREATE TABLE `fichatec_celulares` (
  `cod_ficha_tec` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `cod_marca_celular` int(11) NOT NULL,
  `cod_linha_celular` int(11) NOT NULL,
  `cod_modelo_celular` int(11) NOT NULL,
  `memoria_interna` varchar(10) NOT NULL,
  `memoria_ram` varchar(10) NOT NULL,
  `camera_traseira` varchar(10) DEFAULT NULL,
  `camera_frontal` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fichatec_notebooks`
--

CREATE TABLE `fichatec_notebooks` (
  `cod_ficha_tec` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `cod_marca_notebook` int(11) NOT NULL,
  `cod_linha_notebook` int(11) NOT NULL,
  `cod_modelo_notebook` int(11) NOT NULL,
  `marca_processador` varchar(100) NOT NULL,
  `modelo_processador` varchar(100) NOT NULL,
  `tipo_memoria_ram` varchar(10) NOT NULL,
  `qntd_memoria_ram` varchar(10) NOT NULL,
  `armazenamento_hd` varchar(10) DEFAULT NULL,
  `armazenamento_ssd` varchar(10) DEFAULT NULL,
  `doisemum` enum('sim','não') NOT NULL,
  `gamer` enum('sim','não') NOT NULL,
  `ultrabook` enum('sim','não') NOT NULL,
  `placa_de_video` enum('sim','não') NOT NULL,
  `windows` enum('sim','não') NOT NULL,
  `linux` enum('sim','não') NOT NULL,
  `macOS` enum('sim','não') NOT NULL,
  `USB_C` enum('sim','não') NOT NULL,
  `SSD` enum('sim','não') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fichatec_tablets`
--

CREATE TABLE `fichatec_tablets` (
  `cod_ficha_tec` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `cod_marca_tablet` int(11) NOT NULL,
  `cod_linha_tablet` int(11) NOT NULL,
  `cod_modelo_tablet` int(11) NOT NULL,
  `memoria_interna` varchar(10) NOT NULL,
  `memoria_ram` varchar(10) NOT NULL,
  `camera_traseira` varchar(10) DEFAULT NULL,
  `camera_frontal` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fichatec_tablets`
--

INSERT INTO `fichatec_tablets` (`cod_ficha_tec`, `cod_produto`, `cod_marca_tablet`, `cod_linha_tablet`, `cod_modelo_tablet`, `memoria_interna`, `memoria_ram`, `camera_traseira`, `camera_frontal`) VALUES
(1, 1, 1, 2, 3, '64', '4', '8', '5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos_produto`
--

CREATE TABLE `fotos_produto` (
  `cod_foto` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `endereco_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fotos_produto`
--

INSERT INTO `fotos_produto` (`cod_foto`, `cod_produto`, `endereco_foto`) VALUES
(1, 1, './fotos/produtos/foto_0301202212112610.jpg'),
(2, 1, './fotos/produtos/foto_0301202212112611.jpg'),
(3, 1, './fotos/produtos/foto_0301202212112612.jpg'),
(4, 1, './fotos/produtos/foto_0301202212112613.jpg'),
(5, 1, './fotos/produtos/foto_0301202212112614.jpg'),
(6, 1, './fotos/produtos/foto_0301202212112615.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `linha_celulares`
--

CREATE TABLE `linha_celulares` (
  `cod_linha_celular` int(11) NOT NULL,
  `cod_marca_celular` int(11) NOT NULL,
  `nome_linha_celular` varchar(100) NOT NULL,
  `status_linha_celular` enum('Ativo',' Bloqueado') NOT NULL DEFAULT 'Ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `linha_celulares`
--

INSERT INTO `linha_celulares` (`cod_linha_celular`, `cod_marca_celular`, `nome_linha_celular`, `status_linha_celular`) VALUES
(1, 5, 'Xiaomi Mi Mix', 'Ativo'),
(2, 5, 'Xiaomi Mi 10', 'Ativo'),
(5, 5, 'Xiaomi Mi', 'Ativo'),
(6, 3, 'Redmi Note ', 'Ativo'),
(7, 3, 'Mi Note', 'Ativo'),
(8, 3, 'Poco', 'Ativo'),
(9, 3, 'Black Shark ', 'Ativo'),
(10, 3, 'Redmi', 'Ativo'),
(11, 1, 'Galaxy S', 'Ativo'),
(12, 1, 'Galaxy Note', 'Ativo'),
(13, 1, 'Galaxy Z', 'Ativo'),
(14, 1, 'Galaxy A', 'Ativo'),
(15, 1, 'Galaxy M', 'Ativo'),
(16, 1, 'Galaxy J', 'Ativo'),
(17, 2, 'IPHONE 13', 'Ativo'),
(18, 2, 'IPHONE 5', 'Ativo'),
(19, 2, 'IPHONE 6', 'Ativo'),
(20, 2, 'IPHONE 8', 'Ativo'),
(21, 2, 'IPHONE 12', 'Ativo'),
(22, 2, 'IPHONE 11', 'Ativo'),
(23, 2, 'IPHONE X', 'Ativo'),
(24, 2, 'IPHONE SE', 'Ativo'),
(27, 2, 'IPHONE XS', 'Ativo'),
(28, 2, 'IPHONE XR', 'Ativo'),
(29, 2, 'IPHONE 7', 'Ativo'),
(30, 9, 'Zenfone ', 'Ativo'),
(32, 9, 'ROG PHONE', 'Ativo'),
(33, 4, 'MOTO G', 'Ativo'),
(34, 4, 'MOTO E', 'Ativo'),
(35, 4, 'EDGE', 'Ativo'),
(36, 4, 'MOTO C', 'Ativo'),
(37, 14, 'J', 'Ativo'),
(38, 14, 'C', 'Ativo'),
(39, 14, 'G', 'Ativo'),
(40, 6, 'PIXEL', 'Ativo'),
(41, 12, 'Y', 'Ativo'),
(42, 12, 'HONOR', 'Ativo'),
(45, 12, 'MATE', 'Ativo'),
(46, 12, 'P', 'Ativo'),
(47, 10, 'K', 'Ativo'),
(48, 10, 'G', 'Ativo'),
(49, 10, 'VELVET', 'Ativo'),
(50, 3, 'One Touch Idol', 'Ativo'),
(51, 3, 'A', 'Ativo'),
(52, 3, 'PIXI ', 'Ativo'),
(53, 3, 'POP', 'Ativo'),
(54, 16, 'G', 'Ativo'),
(55, 16, 'F', 'Ativo'),
(56, 16, 'E', 'Ativo'),
(57, 7, '5.3', 'Ativo'),
(58, 7, '2.4', 'Ativo'),
(59, 7, 'C', 'Ativo'),
(60, 7, '2.3', 'Ativo'),
(61, 7, '1.4', 'Ativo'),
(62, 15, 'GO', 'Ativo'),
(63, 15, 'MUV', 'Ativo'),
(64, 15, 'YOU', 'Ativo'),
(65, 11, 'C', 'Ativo'),
(66, 11, '6', 'Ativo'),
(67, 11, '7', 'Ativo'),
(68, 11, '8', 'Ativo'),
(69, 11, 'XT', 'Ativo'),
(70, 13, 'TWIST', 'Ativo'),
(71, 13, 'LIFE', 'Ativo'),
(72, 13, 'SELFIE', 'Ativo'),
(73, 8, 'XPERIA', 'Ativo'),
(74, 17, 'HIT', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `linha_notebook`
--

CREATE TABLE `linha_notebook` (
  `cod_linha_notebook` int(11) NOT NULL,
  `cod_marca_notebook` int(11) NOT NULL,
  `nome_linha_notebook` varchar(100) NOT NULL,
  `status_linha_notebook` enum('Ativo','Inativo') NOT NULL DEFAULT 'Ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `linha_notebook`
--

INSERT INTO `linha_notebook` (`cod_linha_notebook`, `cod_marca_notebook`, `nome_linha_notebook`, `status_linha_notebook`) VALUES
(1, 1, 'Aspire Nitro 5', 'Ativo'),
(2, 1, 'Aspire 3', 'Ativo'),
(3, 1, 'Aspire 1', 'Ativo'),
(4, 1, 'Aspire 5', 'Ativo'),
(7, 1, 'Aspire 7', 'Ativo'),
(8, 1, 'Aspire E', 'Ativo'),
(10, 1, 'Aspire ES', 'Ativo'),
(12, 1, 'Aspire V Nitro', 'Ativo'),
(14, 1, 'Aspire VX 15', 'Ativo'),
(15, 1, 'Aspire R', 'Ativo'),
(16, 1, 'Aspire F', 'Ativo'),
(17, 1, 'ChromeBook 13', 'Ativo'),
(18, 1, 'ChromeBook C7', 'Ativo'),
(20, 1, 'ChromeBook R11 ', 'Ativo'),
(21, 1, 'ChromeBook R13', 'Ativo'),
(22, 1, 'ConceptD', 'Ativo'),
(24, 1, 'Aspire Nitro 6', 'Ativo'),
(25, 1, 'Aspire Nitro 7', 'Ativo'),
(26, 1, 'Predator Helios 300', 'Ativo'),
(27, 1, 'Predator Triton 500', 'Ativo'),
(28, 1, 'Predator Triton 300', 'Ativo'),
(29, 1, 'Predator Triton 900', 'Ativo'),
(30, 1, 'Spin 3', 'Ativo'),
(31, 1, 'Spin 5', 'Ativo'),
(32, 1, 'Spin SP', 'Ativo'),
(33, 1, 'Swift 1', 'Ativo'),
(34, 1, 'Swift 3', 'Ativo'),
(35, 1, 'Swift 5', 'Ativo'),
(36, 1, 'TravelMate B3', 'Ativo'),
(37, 1, 'TravelMate P2', 'Ativo'),
(38, 1, 'TravelMate P4 ', 'Ativo'),
(39, 12, 'Vostro', 'Ativo'),
(40, 12, 'Latitude', 'Ativo'),
(41, 12, 'Optiplex', 'Ativo'),
(42, 12, 'Inspiron', 'Ativo'),
(43, 12, 'XPS', 'Ativo'),
(44, 12, 'Série G', 'Ativo'),
(45, 12, 'Workstations', 'Ativo'),
(46, 12, 'Chromebook', 'Ativo'),
(47, 12, 'Precision', 'Ativo'),
(48, 12, 'UltraBook', 'Ativo'),
(49, 28, 'IdeaPad', 'Ativo'),
(50, 28, 'Chromebook', 'Ativo'),
(51, 28, 'Essentials', 'Ativo'),
(52, 28, 'Legion', 'Ativo'),
(53, 28, 'ThinkBook', 'Ativo'),
(54, 28, 'ThinkPad ', 'Ativo'),
(55, 28, 'V-Series', 'Ativo'),
(56, 28, 'Yoga', 'Ativo'),
(57, 28, 'IdeaPad 3', 'Ativo'),
(58, 3, 'MacBook', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `linha_tablets`
--

CREATE TABLE `linha_tablets` (
  `cod_linha_tablet` int(11) NOT NULL,
  `nome_linha_tablet` varchar(100) NOT NULL,
  `status_linha_tablet` enum('Ativo','Inativo') DEFAULT 'Inativo',
  `cod_marca_tablet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `linha_tablets`
--

INSERT INTO `linha_tablets` (`cod_linha_tablet`, `nome_linha_tablet`, `status_linha_tablet`, `cod_marca_tablet`) VALUES
(1, 'Galaxy Tab S', 'Ativo', 1),
(2, 'Galaxy Tab A', 'Ativo', 1),
(3, 'Galaxy Tab Active', 'Ativo', 1),
(4, 'Galaxy Tab E', 'Ativo', 1),
(11, 'Ipad', 'Ativo', 5),
(12, 'M', 'Ativo', 3),
(13, 'Twist Tab Kids', 'Ativo', 4),
(14, 'Tab Q', 'Ativo', 4),
(15, ' Twist Tab ', 'Ativo', 4),
(16, 'Mi Pad', 'Ativo', 9),
(17, 'G Pad', 'Ativo', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca_celulares`
--

CREATE TABLE `marca_celulares` (
  `cod_marca_celular` int(11) NOT NULL,
  `nome_marca_celular` varchar(100) NOT NULL,
  `status_marca_celular` enum('Ativo','Bloqueado') NOT NULL DEFAULT 'Ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `marca_celulares`
--

INSERT INTO `marca_celulares` (`cod_marca_celular`, `nome_marca_celular`, `status_marca_celular`) VALUES
(1, 'Samsung', 'Ativo'),
(2, 'Apple', 'Ativo'),
(3, 'Alcatel', 'Ativo'),
(4, 'Motorola', 'Ativo'),
(5, 'Xiaomi', 'Ativo'),
(6, 'Google', 'Ativo'),
(7, 'Nokia', 'Ativo'),
(8, 'Sony', 'Ativo'),
(9, 'Asus', 'Ativo'),
(10, 'LG', 'Ativo'),
(11, 'Realme', 'Ativo'),
(12, 'Huawei', 'Ativo'),
(13, 'Positivo', 'Ativo'),
(14, 'Blu', 'Ativo'),
(15, 'Quantum', 'Ativo'),
(16, 'Multilaser', 'Ativo'),
(17, 'Philco', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca_notebook`
--

CREATE TABLE `marca_notebook` (
  `cod_marca_notebook` int(11) NOT NULL,
  `nome_marca_notebook` varchar(100) NOT NULL,
  `status_marca_notebook` enum('Ativo','Inativo') NOT NULL DEFAULT 'Ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `marca_notebook`
--

INSERT INTO `marca_notebook` (`cod_marca_notebook`, `nome_marca_notebook`, `status_marca_notebook`) VALUES
(1, 'Acer ', 'Ativo'),
(2, 'Alienware', 'Ativo'),
(3, 'Apple', 'Ativo'),
(4, 'Samsung', 'Ativo'),
(5, 'Asus', 'Ativo'),
(6, 'Banghó', 'Ativo'),
(7, 'CCE', 'Ativo'),
(8, 'Chuwi', 'Ativo'),
(9, 'Compaq', 'Ativo'),
(10, 'Compax', 'Ativo'),
(11, 'CX', 'Ativo'),
(12, 'Dell', 'Ativo'),
(13, 'Ematic', 'Ativo'),
(14, 'eNova', 'Ativo'),
(15, 'Evoo', 'Ativo'),
(16, 'Exo', 'Ativo'),
(17, 'Fujitsu', 'Ativo'),
(18, 'Gadnic', 'Ativo'),
(19, 'Gateway', 'Ativo'),
(20, 'Ghia', 'Ativo'),
(21, 'Gigabyte', 'Ativo'),
(22, 'HP', 'Ativo'),
(23, 'Huawei', 'Ativo'),
(24, 'Hyundai', 'Ativo'),
(25, 'Kelyx', 'Ativo'),
(26, 'KUU', 'Ativo'),
(27, 'Lanix', 'Ativo'),
(28, 'Lenovo', 'Ativo'),
(29, 'LG', 'Ativo'),
(30, 'Microsoft', 'Ativo'),
(31, 'MSI', 'Ativo'),
(32, 'Multilaser', 'Ativo'),
(33, 'Noblex', 'Ativo'),
(34, 'Octopus', 'Ativo'),
(35, 'Panasonic', 'Ativo'),
(36, 'Pcbox', 'Ativo'),
(37, 'Philco', 'Ativo'),
(38, 'Positivo BGH', 'Ativo'),
(39, 'Positivo BHG', 'Ativo'),
(40, 'Qbex', 'Ativo'),
(41, 'Qian', 'Ativo'),
(42, 'Razer', 'Ativo'),
(43, 'Tedge', 'Ativo'),
(44, 'Toshiba', 'Ativo'),
(45, 'VAIO', 'Ativo'),
(46, 'Vorago', 'Ativo'),
(47, 'Xiaomi', 'Ativo'),
(48, 'XPG', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca_tablets`
--

CREATE TABLE `marca_tablets` (
  `cod_marca_tablet` int(11) NOT NULL,
  `nome_marca_tablet` varchar(100) NOT NULL,
  `status_marca_tablet` enum('Ativo','Inativo') DEFAULT 'Inativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `marca_tablets`
--

INSERT INTO `marca_tablets` (`cod_marca_tablet`, `nome_marca_tablet`, `status_marca_tablet`) VALUES
(1, 'Samsung', 'Ativo'),
(2, 'Philco', 'Ativo'),
(3, 'Multilaser', 'Ativo'),
(4, 'Positivo', 'Ativo'),
(5, 'Apple', 'Ativo'),
(7, 'LG', 'Ativo'),
(9, 'Xiaomi', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagenschat`
--

CREATE TABLE `mensagenschat` (
  `cod_mensagem` int(11) NOT NULL,
  `cod_chat` int(11) NOT NULL,
  `remetente_chat` varchar(100) NOT NULL,
  `destinatario_chat` varchar(100) NOT NULL,
  `corpo_mensagem` varchar(1000) NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo_celulares`
--

CREATE TABLE `modelo_celulares` (
  `cod_modelo_celular` int(11) NOT NULL,
  `cod_linha_celular` int(11) NOT NULL,
  `cod_marca_celular` int(11) NOT NULL,
  `nome_modelo_celular` varchar(100) NOT NULL,
  `status_modelo_celular` enum('Ativo','Bloqueado') NOT NULL DEFAULT 'Ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `modelo_celulares`
--

INSERT INTO `modelo_celulares` (`cod_modelo_celular`, `cod_linha_celular`, `cod_marca_celular`, `nome_modelo_celular`, `status_modelo_celular`) VALUES
(1, 5, 3, 'Mi 9', 'Ativo'),
(2, 1, 3, 'SE ', 'Ativo'),
(3, 1, 3, 'Transparent ', 'Ativo'),
(4, 5, 3, '9T', 'Ativo'),
(5, 5, 3, 'A3', 'Ativo'),
(6, 6, 3, '8 PRO', 'Ativo'),
(7, 1, 3, '3', 'Ativo'),
(8, 8, 3, 'Pocophone F1', 'Ativo'),
(9, 9, 3, 'Gamer 2', 'Ativo'),
(10, 8, 3, 'X3 Pro ', 'Ativo'),
(11, 6, 3, '10', 'Ativo'),
(12, 6, 3, '9', 'Ativo'),
(13, 6, 3, '8', 'Ativo'),
(14, 6, 3, '7', 'Ativo'),
(15, 6, 3, '9A', 'Ativo'),
(16, 8, 3, 'Pocophone M3', 'Ativo'),
(17, 10, 3, '9i', 'Ativo'),
(18, 6, 3, '10s', 'Ativo'),
(19, 5, 3, '10T', 'Ativo'),
(20, 10, 3, '9C', 'Ativo'),
(21, 6, 3, '10 PRO', 'Ativo'),
(22, 5, 3, '11', 'Ativo'),
(23, 6, 3, '9S', 'Ativo'),
(24, 8, 3, 'Pocophone M3 ', 'Ativo'),
(25, 5, 3, '11 Lite ', 'Ativo'),
(26, 8, 3, ' Pocophone M3 PRO', 'Ativo'),
(27, 8, 3, 'Pocophone X3 NFC', 'Ativo'),
(28, 6, 3, '8 PRO', 'Ativo'),
(29, 10, 3, '6A', 'Ativo'),
(30, 6, 3, '9 PRO', 'Ativo'),
(31, 7, 3, '10', 'Ativo'),
(32, 6, 3, '10 PRO MAX', 'Ativo'),
(33, 10, 3, '8A', 'Ativo'),
(34, 5, 3, '9 Lite ', 'Ativo'),
(35, 10, 3, '7A', 'Ativo'),
(36, 11, 1, 'S20', 'Ativo'),
(37, 11, 1, 'S20+', 'Ativo'),
(38, 11, 1, 'S20 Ultra', 'Ativo'),
(39, 12, 1, '10', 'Ativo'),
(40, 12, 1, '10+', 'Ativo'),
(41, 12, 1, '10 Lite ', 'Ativo'),
(42, 13, 1, 'Flip', 'Ativo'),
(43, 13, 1, 'Fold ', 'Ativo'),
(44, 13, 1, 'Fold 2', 'Ativo'),
(45, 14, 1, 'A51', 'Ativo'),
(46, 14, 1, 'A31', 'Ativo'),
(47, 14, 1, 'A21', 'Ativo'),
(48, 14, 1, 'A11', 'Ativo'),
(49, 14, 1, 'A71', 'Ativo'),
(50, 14, 1, 'A80', 'Ativo'),
(51, 15, 1, 'M10', 'Ativo'),
(52, 15, 1, 'M20', 'Ativo'),
(53, 15, 1, 'M30', 'Ativo'),
(54, 15, 1, 'M31', 'Ativo'),
(55, 16, 1, 'J4', 'Ativo'),
(56, 16, 1, 'J6', 'Ativo'),
(57, 16, 1, 'J8', 'Ativo'),
(58, 16, 1, 'J3', 'Ativo'),
(59, 16, 1, 'J1', 'Ativo'),
(60, 16, 1, 'J3 PRIME ', 'Ativo'),
(61, 14, 1, 'A21S', 'Ativo'),
(62, 11, 1, 'S10', 'Ativo'),
(63, 11, 1, 'S10+', 'Ativo'),
(64, 11, 1, 'S10E', 'Ativo'),
(65, 11, 1, 'S20PLUS', 'Ativo'),
(66, 21, 2, 'PRO MAX', 'Ativo'),
(67, 23, 2, 'X', 'Ativo'),
(68, 28, 2, 'XR', 'Ativo'),
(69, 21, 2, 'PRO', 'Ativo'),
(70, 21, 2, 'MINI', 'Ativo'),
(71, 21, 2, ' 12', 'Ativo'),
(72, 24, 2, 'SE (2020)', 'Ativo'),
(73, 22, 2, 'PRO MAX', 'Ativo'),
(74, 22, 2, 'PRO', 'Ativo'),
(75, 22, 2, '11', 'Ativo'),
(76, 27, 2, 'MAX', 'Ativo'),
(77, 28, 2, 'XR', 'Ativo'),
(78, 20, 2, '8', 'Ativo'),
(79, 20, 2, 'PLUS', 'Ativo'),
(80, 29, 2, '7', 'Ativo'),
(81, 29, 2, 'PLUS ', 'Ativo'),
(82, 19, 2, 'S PLUS', 'Ativo'),
(83, 19, 2, 'S', 'Ativo'),
(88, 19, 2, 'PLUS', 'Ativo'),
(89, 18, 2, 'S', 'Ativo'),
(90, 18, 2, 'C', 'Ativo'),
(91, 18, 2, '5', 'Ativo'),
(92, 17, 2, 'PRO MAX', 'Ativo'),
(93, 17, 2, '13', 'Ativo'),
(94, 17, 2, 'MINI', 'Ativo'),
(95, 17, 2, 'PRO', 'Ativo'),
(96, 30, 9, '2 Deluxe ', 'Ativo'),
(97, 30, 9, '5', 'Ativo'),
(98, 30, 9, '2', 'Ativo'),
(99, 30, 9, 'SELFIE', 'Ativo'),
(100, 30, 9, '2 LAZER', 'Ativo'),
(101, 30, 9, 'GO', 'Ativo'),
(102, 30, 9, '6', 'Ativo'),
(103, 30, 9, '5', 'Ativo'),
(104, 30, 9, 'MAX SHOT', 'Ativo'),
(105, 30, 9, 'MAX M3', 'Ativo'),
(106, 30, 9, 'LIVE L2', 'Ativo'),
(107, 30, 9, 'SHOT PLUS', 'Ativo'),
(108, 30, 9, '3', 'Ativo'),
(109, 32, 9, '5', 'Ativo'),
(110, 30, 9, 'MAX PRO', 'Ativo'),
(111, 30, 9, 'MAX M2', 'Ativo'),
(112, 32, 9, '3', 'Ativo'),
(113, 30, 9, '6', 'Ativo'),
(114, 30, 9, '5Z', 'Ativo'),
(115, 33, 4, 'G5', 'Ativo'),
(116, 33, 4, 'G5S', 'Ativo'),
(117, 33, 4, 'G5S PLUS', 'Ativo'),
(118, 33, 4, 'G6', 'Ativo'),
(119, 33, 4, 'G6 PLUS', 'Ativo'),
(120, 33, 4, 'G6 PLAY', 'Ativo'),
(121, 33, 4, 'G7', 'Ativo'),
(122, 33, 4, 'G7 PLAY', 'Ativo'),
(123, 33, 4, 'G7 POWER', 'Ativo'),
(124, 33, 4, 'G8 POWER', 'Ativo'),
(125, 33, 4, 'G8 PLAY', 'Ativo'),
(126, 33, 4, 'G8 PLUS', 'Ativo'),
(127, 33, 4, 'ONE FUSION', 'Ativo'),
(128, 33, 4, 'ONE MACRO ', 'Ativo'),
(129, 33, 4, 'ONE VISION', 'Ativo'),
(130, 35, 4, '20 PRO', 'Ativo'),
(131, 35, 4, '20', 'Ativo'),
(132, 34, 4, 'E6 PLAY', 'Ativo'),
(133, 35, 4, '5G', 'Ativo'),
(134, 34, 4, 'E7 PLUS', 'Ativo'),
(135, 34, 4, 'E20', 'Ativo'),
(136, 34, 4, 'E6i', 'Ativo'),
(137, 34, 4, 'E6s', 'Ativo'),
(138, 34, 4, 'E7', 'Ativo'),
(139, 34, 4, 'E7 POWER', 'Ativo'),
(140, 33, 4, 'G10', 'Ativo'),
(141, 33, 4, 'G100', 'Ativo'),
(142, 33, 4, 'G20', 'Ativo'),
(143, 33, 4, 'G30', 'Ativo'),
(144, 33, 4, 'G60', 'Ativo'),
(145, 33, 4, 'G60S', 'Ativo'),
(146, 33, 4, 'G9 PLAY ', 'Ativo'),
(147, 35, 4, '20 LITE', 'Ativo'),
(148, 34, 4, 'E6 PLAY', 'Ativo'),
(149, 33, 4, 'G8 POWER LITE', 'Ativo'),
(150, 33, 4, 'ONE HYPER ', 'Ativo'),
(151, 33, 4, 'G9 PLUS', 'Ativo'),
(152, 33, 4, 'G9 POWER', 'Ativo'),
(153, 36, 4, 'C PLUS', 'Ativo'),
(154, 38, 14, 'C7', 'Ativo'),
(155, 38, 14, 'C6L 2020', 'Ativo'),
(156, 39, 14, 'C6 2020', 'Ativo'),
(157, 38, 14, 'C5L 2020', 'Ativo'),
(158, 38, 14, 'C5L', 'Ativo'),
(159, 38, 14, 'C5 2019', 'Ativo'),
(160, 38, 14, 'C5 PLUS', 'Ativo'),
(161, 39, 14, 'G91 PRO', 'Ativo'),
(162, 39, 14, 'G51 PLUS', 'Ativo'),
(163, 39, 14, 'G91', 'Ativo'),
(164, 39, 14, 'G71', 'Ativo'),
(165, 39, 14, 'G61', 'Ativo'),
(166, 39, 14, 'G50 MEGA', 'Ativo'),
(167, 39, 14, 'G90 PRO', 'Ativo'),
(168, 39, 14, 'G9 PRO', 'Ativo'),
(169, 39, 14, 'G90', 'Ativo'),
(170, 39, 14, 'G80', 'Ativo'),
(171, 39, 14, 'G50 PLUS', 'Ativo'),
(172, 39, 14, 'G50', 'Ativo'),
(173, 39, 14, 'G60', 'Ativo'),
(174, 39, 14, 'G70', 'Ativo'),
(175, 39, 14, 'G5', 'Ativo'),
(176, 39, 14, 'G5 PLUS', 'Ativo'),
(177, 39, 14, 'G8', 'Ativo'),
(178, 39, 14, 'G9', 'Ativo'),
(179, 37, 14, 'J9L', 'Ativo'),
(180, 37, 14, 'J7L', 'Ativo'),
(181, 37, 14, 'J6 2020', 'Ativo'),
(182, 37, 14, 'J5L', 'Ativo'),
(183, 37, 14, 'J2', 'Ativo'),
(184, 40, 6, '2', 'Ativo'),
(185, 40, 6, '3', 'Ativo'),
(186, 40, 6, '4', 'Ativo'),
(187, 40, 6, '3A', 'Ativo'),
(188, 41, 12, 'Y6', 'Ativo'),
(189, 41, 12, 'Y7', 'Ativo'),
(190, 41, 12, 'Y9', 'Ativo'),
(191, 42, 12, '7S', 'Ativo'),
(192, 42, 12, '7A', 'Ativo'),
(193, 42, 12, '8X', 'Ativo'),
(194, 45, 12, '20 LITE', 'Ativo'),
(195, 45, 12, '20', 'Ativo'),
(196, 46, 12, 'P20 Lite', 'Ativo'),
(197, 46, 12, 'P20', 'Ativo'),
(198, 46, 12, 'P20 Pro', 'Ativo'),
(199, 46, 12, ' P30 Lite', 'Ativo'),
(200, 46, 12, 'P30', 'Ativo'),
(201, 46, 12, 'P30 Pro', 'Ativo'),
(202, 47, 10, 'K41S ', 'Ativo'),
(203, 47, 10, 'K22', 'Ativo'),
(204, 47, 10, 'K10', 'Ativo'),
(205, 47, 10, 'K51S', 'Ativo'),
(206, 47, 10, 'K11 Alpha', 'Ativo'),
(207, 47, 10, 'K10 Power', 'Ativo'),
(208, 47, 10, 'K4', 'Ativo'),
(209, 47, 10, 'K12 Max', 'Ativo'),
(210, 47, 10, 'K8 ', 'Ativo'),
(211, 47, 10, 'K12 Prime', 'Ativo'),
(212, 47, 10, 'K10 Pro', 'Ativo'),
(213, 47, 10, 'K12 Plus', 'Ativo'),
(214, 48, 10, 'G8X', 'Ativo'),
(215, 48, 10, 'G8S', 'Ativo'),
(216, 48, 10, 'G7', 'Ativo'),
(217, 49, 10, 'VELVET', 'Ativo'),
(218, 47, 10, 'K62', 'Ativo'),
(219, 47, 10, 'K62+', 'Ativo'),
(220, 47, 10, 'K52', 'Ativo'),
(221, 47, 10, 'K71', 'Ativo'),
(222, 47, 10, 'K61', 'Ativo'),
(223, 50, 3, 'Idol 4', 'Ativo'),
(224, 50, 3, 'Idol 3', 'Ativo'),
(225, 50, 3, 'Mini 6012e', 'Ativo'),
(226, 50, 3, '4S', 'Ativo'),
(227, 50, 3, '2', 'Ativo'),
(228, 52, 3, '4', 'Ativo'),
(229, 52, 3, '3', 'Ativo'),
(230, 52, 3, '2', 'Ativo'),
(231, 52, 3, '5', 'Ativo'),
(232, 52, 3, 'Pixi', 'Ativo'),
(233, 51, 3, 'A2 XL', 'Ativo'),
(234, 51, 3, 'A3', 'Ativo'),
(235, 51, 3, 'A5', 'Ativo'),
(236, 51, 3, 'A7', 'Ativo'),
(237, 51, 3, 'A3 XL', 'Ativo'),
(238, 51, 3, 'A5 MAX', 'Ativo'),
(239, 51, 3, 'A7 XL', 'Ativo'),
(240, 53, 3, '2', 'Ativo'),
(241, 53, 3, '3', 'Ativo'),
(242, 53, 3, '4', 'Ativo'),
(243, 53, 3, '5', 'Ativo'),
(244, 53, 3, 'POP', 'Ativo'),
(245, 54, 16, 'MAX', 'Ativo'),
(246, 55, 16, 'F PRO', 'Ativo'),
(247, 55, 16, 'F', 'Ativo'),
(248, 56, 16, 'LITE', 'Ativo'),
(249, 56, 16, 'E', 'Ativo'),
(250, 54, 16, 'G', 'Ativo'),
(251, 55, 16, 'PRO 2', 'Ativo'),
(252, 57, 7, '5.3', 'Ativo'),
(253, 58, 7, '2.4', 'Ativo'),
(254, 60, 7, '2.3', 'Ativo'),
(255, 59, 7, '2', 'Ativo'),
(256, 61, 7, '1.4', 'Ativo'),
(259, 62, 15, '4G/3G', 'Ativo'),
(260, 62, 15, '3G', 'Ativo'),
(261, 63, 15, 'MUV', 'Ativo'),
(262, 63, 15, 'PRO', 'Ativo'),
(263, 63, 15, 'UP', 'Ativo'),
(264, 64, 15, 'L', 'Ativo'),
(265, 64, 15, 'E', 'Ativo'),
(266, 64, 15, 'YOU', 'Ativo'),
(267, 65, 11, '11', 'Ativo'),
(268, 65, 11, '3', 'Ativo'),
(269, 66, 11, '6', 'Ativo'),
(270, 65, 11, '25', 'Ativo'),
(271, 67, 11, '7', 'Ativo'),
(272, 67, 11, 'PRO', 'Ativo'),
(273, 68, 11, 'PRO', 'Ativo'),
(274, 69, 11, 'XT', 'Ativo'),
(275, 70, 13, 'S520', 'Ativo'),
(276, 70, 13, 'MINI S430', 'Ativo'),
(277, 71, 13, 'S421', 'Ativo'),
(278, 70, 13, 'S511', 'Ativo'),
(279, 72, 13, 'S455', 'Ativo'),
(280, 70, 13, 'XL S555', 'Ativo'),
(281, 72, 13, 'S455', 'Ativo'),
(282, 73, 8, 'X', 'Ativo'),
(283, 73, 8, 'Xz2', 'Ativo'),
(284, 73, 8, 'XZ', 'Ativo'),
(285, 73, 8, 'Xa1', 'Ativo'),
(286, 73, 8, 'Xa1 PLUS', 'Ativo'),
(287, 73, 8, 'Xa', 'Ativo'),
(288, 74, 17, 'P10', 'Ativo'),
(289, 74, 17, 'P12', 'Ativo'),
(290, 74, 17, 'PLUS', 'Ativo'),
(291, 74, 17, 'MAX', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo_notebook`
--

CREATE TABLE `modelo_notebook` (
  `cod_modelo_notebook` int(11) NOT NULL,
  `cod_marca_notebook` int(11) NOT NULL,
  `cod_linha_notebook` int(11) NOT NULL,
  `nome_modelo_notebook` varchar(100) NOT NULL,
  `status_modelo_notebook` enum('Ativo','Inativo') NOT NULL DEFAULT 'Ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `modelo_notebook`
--

INSERT INTO `modelo_notebook` (`cod_modelo_notebook`, `cod_marca_notebook`, `cod_linha_notebook`, `nome_modelo_notebook`, `status_modelo_notebook`) VALUES
(1, 1, 1, 'A515-52-35J7', 'Ativo'),
(2, 1, 1, 'AN515-52-52BW', 'Ativo'),
(3, 1, 1, 'AN515-52-5771', 'Ativo'),
(4, 1, 1, 'AN515-52-72UU', 'Ativo'),
(5, 1, 1, 'AN515-52-7974', 'Ativo'),
(6, 1, 2, 'A315-22-47SL', 'Ativo'),
(7, 1, 4, 'A515-55-530N', 'Ativo'),
(8, 1, 2, 'A315-23G-R2UH', 'Ativo'),
(9, 1, 2, 'A315-56-52R4', 'Ativo'),
(10, 1, 3, 'A115-31-C23T', 'Ativo'),
(11, 1, 2, ' 315-34-C6ZS', 'Ativo'),
(12, 1, 2, 'A314-21-91V1', 'Ativo'),
(13, 1, 2, ' A314-22-R4P7', 'Ativo'),
(14, 1, 2, 'A314-22-R9HC\r\n', 'Ativo'),
(15, 1, 2, 'A314-31-C12Q', 'Ativo'),
(16, 1, 2, 'A314-31-C4XU', 'Ativo'),
(17, 1, 2, 'A314-31-C5GA', 'Ativo'),
(18, 1, 2, ' A315-23G-R24V', 'Ativo'),
(19, 1, 2, 'A315-23G-R4ZS', 'Ativo'),
(20, 1, 2, 'A315-23G-R5K1', 'Ativo'),
(21, 1, 2, 'A315-23G-R759', 'Ativo'),
(22, 1, 2, 'A315-23-R0LD', 'Ativo'),
(23, 1, 2, 'A315-23-R6DJ', 'Ativo'),
(24, 1, 2, 'A315-33-C1KX', 'Ativo'),
(25, 1, 2, 'A315-34-C32Q', 'Ativo'),
(26, 1, 2, 'A315-34-C5EY', 'Ativo'),
(27, 1, 2, 'A315-34-C6ZS', 'Ativo'),
(28, 1, 2, 'A315-34-C7RP-AR', 'Ativo'),
(29, 1, 2, 'A315-41G-R21B', 'Ativo'),
(30, 1, 2, 'A315-41-R0E7', 'Ativo'),
(31, 1, 2, 'A315-41-R0GH', 'Ativo'),
(32, 1, 2, 'A315-41-R132', 'Ativo'),
(33, 1, 2, 'A315-41-R14K', 'Ativo'),
(34, 1, 2, 'A315-41-R1RJ', 'Ativo'),
(35, 1, 2, 'A315-41-R3R4', 'Ativo'),
(36, 1, 2, 'A315-41-R41J', 'Ativo'),
(37, 1, 2, 'A315-41-R4RB', 'Ativo'),
(38, 1, 2, 'A315-41-R4RE', 'Ativo'),
(39, 1, 2, 'A315-41-R790', 'Ativo'),
(40, 1, 2, 'A315-41-R7Y4', 'Ativo'),
(41, 1, 2, 'A315-41-R8UU', 'Ativo'),
(42, 1, 2, 'A315-41-R9J1', 'Ativo'),
(43, 1, 2, 'A315-42G-R5Z7', 'Ativo'),
(44, 1, 2, 'A315-42-R1B0', 'Ativo'),
(45, 1, 2, 'A315-42-R1U7', 'Ativo'),
(46, 1, 2, 'A315-42-R5W8', 'Ativo'),
(47, 1, 2, 'A315-42-R73T', 'Ativo'),
(48, 1, 2, 'A315-42-R772', 'Ativo'),
(49, 1, 2, 'A315-42-R7HV', 'Ativo'),
(50, 1, 2, 'A315-42-R7RC-AR', 'Ativo'),
(51, 1, 2, 'A315-42-R98C', 'Ativo'),
(52, 1, 2, 'A315-51-31GK', 'Ativo'),
(53, 1, 2, 'A315-51-32L5', 'Ativo'),
(54, 1, 2, 'A315-51-33AM', 'Ativo'),
(55, 1, 2, 'A315-51-33MD', 'Ativo'),
(56, 1, 2, 'A315-51-341F', 'Ativo'),
(57, 1, 2, 'A315-51-347W', 'Ativo'),
(58, 1, 2, 'A315-51-34CL', 'Ativo'),
(59, 1, 2, 'A315-51-34KX', 'Ativo'),
(60, 1, 2, 'A315-51-356A', 'Ativo'),
(61, 1, 2, 'A315-51-36BJ', 'Ativo'),
(62, 1, 2, 'A315-51-36XC', 'Ativo'),
(63, 1, 2, 'A315-51-380T', 'Ativo'),
(64, 1, 2, 'A315-51-39Z8', 'Ativo'),
(65, 1, 2, 'A315-51-50CK-AR', 'Ativo'),
(66, 1, 2, 'A315-51-50LA', 'Ativo'),
(67, 1, 2, 'A315-51-50P9', 'Ativo'),
(68, 1, 2, 'A315-51-514S', 'Ativo'),
(69, 1, 2, 'A315-51-51SL', 'Ativo'),
(70, 1, 2, 'A315-51-52ZZ', 'Ativo'),
(71, 1, 2, 'A315-51-56GT', 'Ativo'),
(72, 1, 2, 'A315-53-30R4', 'Ativo'),
(73, 1, 2, 'A315-53-30RZ', 'Ativo'),
(74, 1, 2, 'A315-53-31DC', 'Ativo'),
(75, 1, 2, 'A315-53-3300', 'Ativo'),
(76, 1, 2, 'A315-53-333H', 'Ativo'),
(77, 1, 2, 'A315-53-33AD', 'Ativo'),
(78, 1, 2, 'A315-53-343Y', 'Ativo'),
(79, 1, 2, 'A315-53-3470', 'Ativo'),
(80, 1, 2, 'A315-53-348W', 'Ativo'),
(81, 1, 2, 'A315-53-34Y4', 'Ativo'),
(82, 1, 2, 'A315-53-36WW', 'Ativo'),
(83, 1, 2, 'A315-53-38E9', 'Ativo'),
(84, 1, 2, 'A315-53-5100', 'Ativo'),
(85, 1, 2, 'A315-53-52HW', 'Ativo'),
(86, 1, 2, 'A315-53-52ZZ', 'Ativo'),
(87, 1, 2, 'A315-53-53AK', 'Ativo'),
(88, 1, 2, 'A315-53-54XX', 'Ativo'),
(89, 1, 2, 'A315-53-55DD', 'Ativo'),
(90, 1, 2, 'A315-53-57G3', 'Ativo'),
(91, 1, 2, 'A315-53-C2SS', 'Ativo'),
(92, 1, 2, 'A315-53-C6EB', 'Ativo'),
(93, 1, 2, 'A315-53-P884', 'Ativo'),
(94, 1, 2, 'A315-54-53M1', 'Ativo'),
(95, 1, 2, 'A315-54-53WJ', 'Ativo'),
(96, 1, 2, 'A315-54-54B1', 'Ativo'),
(97, 1, 2, 'A315-54-55WY', 'Ativo'),
(98, 2, 2, 'A315-54-561D', 'Ativo'),
(99, 1, 2, 'A315-54-56JC', 'Ativo'),
(100, 1, 2, 'A315-54K-305J-AR', 'Ativo'),
(101, 1, 2, 'A315-54K-30UT', 'Ativo'),
(102, 1, 2, 'A315-54K-31E8', 'Ativo'),
(103, 1, 2, 'A315-54K-32E1', 'Ativo'),
(104, 1, 2, 'A315-54K-33AU', 'Ativo'),
(105, 1, 2, 'A315-54K-39H0', 'Ativo'),
(106, 1, 2, 'A315-54K-53ZP', 'Ativo'),
(107, 1, 2, 'A315-54K-56BZ', 'Ativo'),
(108, 1, 2, 'A315-56-30C6', 'Ativo'),
(109, 1, 2, 'A315-56-32KK', 'Ativo'),
(110, 1, 2, 'A315-56-330J', 'Ativo'),
(111, 1, 2, 'A315-56-34A9', 'Ativo'),
(112, 1, 2, 'A315-56-36Z1', 'Ativo'),
(113, 1, 2, 'A315-56-38TB', 'Ativo'),
(114, 1, 2, 'A315-56-54AC', 'Ativo'),
(115, 1, 2, 'A315-56-569F', 'Ativo'),
(116, 1, 2, 'A315-56-594W', 'Ativo'),
(117, 1, 2, 'A317-51G-52X2', 'Ativo'),
(118, 1, 2, 'A515-51-780H', 'Ativo'),
(119, 1, 4, 'A315-53-38K4', 'Ativo'),
(120, 1, 4, 'A514-52-78MD', 'Ativo'),
(121, 1, 4, 'A514-53-32LB', 'Ativo'),
(122, 1, 4, 'A514-53-339S', 'Ativo'),
(123, 1, 4, 'A514-53-34FR', 'Ativo'),
(124, 1, 4, 'A514-53-39KH', 'Ativo'),
(125, 1, 4, 'A514-53-5239', 'Ativo'),
(126, 1, 4, 'A514-53-59QJ', 'Ativo'),
(127, 1, 4, 'A514-53G-571X', 'Ativo'),
(128, 1, 4, 'A515-41G-1480', 'Ativo'),
(129, 1, 4, 'A515-43-R19L', 'Ativo'),
(130, 1, 4, 'A515-43-R7QN', 'Ativo'),
(131, 1, 4, 'A515-43-R9MG', 'Ativo'),
(132, 1, 4, 'A515-51-3509', 'Ativo'),
(133, 1, 4, 'A515-51-37LG', 'Ativo'),
(134, 1, 4, 'A515-51-5089', 'Ativo'),
(135, 1, 4, 'A515-51-50TD', 'Ativo'),
(136, 1, 4, 'A515-51-51JW', 'Ativo'),
(137, 1, 4, 'A515-51-51NZ', 'Ativo'),
(138, 1, 4, 'A515-51-51TH', 'Ativo'),
(139, 1, 4, 'A515-51-51UX', 'Ativo'),
(140, 1, 4, 'A515-51-523X', 'Ativo'),
(141, 1, 4, 'A515-51-52BQ', 'Ativo'),
(142, 1, 4, 'A515-51-52M7', 'Ativo'),
(143, 1, 4, 'A515-51-52NC', 'Ativo'),
(144, 1, 4, 'A515-51-5398', 'Ativo'),
(145, 1, 4, 'A515-51-55QD', 'Ativo'),
(146, 1, 4, 'A515-51-56B8', 'Ativo'),
(147, 1, 4, 'A515-51-56K6', 'Ativo'),
(148, 1, 4, 'A515-51-572H', 'Ativo'),
(149, 1, 4, 'A515-51-58DG', 'Ativo'),
(150, 1, 4, 'A515-51-58E7', 'Ativo'),
(151, 1, 4, 'A515-51-58HD', 'Ativo'),
(152, 1, 4, 'A515-51-596K', 'Ativo'),
(153, 1, 4, 'A515-51-59JS', 'Ativo'),
(154, 1, 4, 'A515-51-71A4', 'Ativo'),
(155, 1, 4, 'A515-51-72ZV', 'Ativo'),
(156, 1, 4, 'A515-51-735N', 'Ativo'),
(157, 1, 4, 'A515-51-74ZA', 'Ativo'),
(158, 1, 4, 'A515-51-75RV', 'Ativo'),
(159, 1, 4, 'A515-51-75UY', 'Ativo'),
(160, 1, 4, 'A515-51-76BP', 'Ativo'),
(161, 1, 4, 'A515-51-82WE', 'Ativo'),
(162, 1, 4, 'A515-51-893M', 'Ativo'),
(163, 1, 4, 'A515-51-89AH', 'Ativo'),
(164, 1, 4, 'A515-51-C0ZG', 'Ativo'),
(165, 1, 4, 'A515-51-C2TQ', 'Ativo'),
(166, 1, 4, 'A515-51G-50W8', 'Ativo'),
(167, 1, 4, 'A515-51G-515J', 'Ativo'),
(168, 1, 4, 'A515-51G-53YM', 'Ativo'),
(169, 1, 4, 'A515-51G-5536', 'Ativo'),
(170, 1, 4, 'A515-51G-57XD', 'Ativo'),
(171, 1, 4, 'A515-51G-58GZ', 'Ativo'),
(172, 1, 4, 'A515-51G-72DB', 'Ativo'),
(173, 1, 4, 'A515-51G-858D', 'Ativo'),
(174, 1, 4, 'A515-51G-87PK', 'Ativo'),
(175, 1, 4, 'A515-51G-87QZ', 'Ativo'),
(176, 1, 4, 'A515-51G-89LS', 'Ativo'),
(177, 1, 4, 'A515-51G-C690', 'Ativo'),
(178, 1, 4, 'A515-51G-C97B', 'Ativo'),
(179, 1, 4, 'A515-52-35J7', 'Ativo'),
(180, 1, 4, 'A515-52-51TR', 'Ativo'),
(181, 1, 4, 'A515-52-536H', 'Ativo'),
(182, 1, 4, 'A515-52-537H', 'Ativo'),
(183, 1, 4, 'A515-52-54MR', 'Ativo'),
(184, 1, 4, 'A515-52-56A8', 'Ativo'),
(185, 1, 4, 'A515-52-57B7', 'Ativo'),
(186, 1, 4, 'A515-52-57QF', 'Ativo'),
(187, 1, 4, 'A515-52-581X', 'Ativo'),
(188, 1, 4, 'A515-52-72ZH', 'Ativo'),
(189, 1, 4, 'A515-52-77NQ', 'Ativo'),
(190, 1, 4, 'A515-52-79UT', 'Ativo'),
(191, 1, 4, 'A515-52G-50NT', 'Ativo'),
(193, 1, 4, 'A515-52G-522Z', 'Ativo'),
(194, 1, 4, 'A515-52G-56UJ', 'Ativo'),
(195, 1, 4, 'A515-52G-577T', 'Ativo'),
(196, 1, 4, 'A515-52G-57NL', 'Ativo'),
(197, 1, 4, 'A515-52G-73SY', 'Ativo'),
(198, 1, 4, 'A515-52G-78HE', 'Ativo'),
(199, 1, 4, 'A515-52G-79H1', 'Ativo'),
(200, 1, 4, 'A515-54-34VM-1', 'Ativo'),
(201, 1, 4, 'A515-54-50BT', 'Ativo'),
(202, 1, 4, 'A515-54-55AA', 'Ativo'),
(203, 1, 4, 'A515-54-59W2', 'Ativo'),
(204, 1, 4, 'A515-54-59X2', 'Ativo'),
(205, 1, 4, 'A515-54-72KU', 'Ativo'),
(206, 1, 4, 'A515-54-76TA', 'Ativo'),
(207, 1, 4, 'A515-54G-52C1', 'Ativo'),
(208, 1, 4, 'A515-54G-53GP', 'Ativo'),
(209, 1, 4, 'A515-54G-53XP', 'Ativo'),
(210, 1, 4, 'A515-54G-54QQ', 'Ativo'),
(211, 1, 4, 'A515-54G-56SB', 'Ativo'),
(212, 1, 4, 'A515-54G-59C0', 'Ativo'),
(213, 1, 4, 'A515-54G-70TZ', 'Ativo'),
(214, 1, 2, 'A515-54G-73Y1', 'Ativo'),
(215, 1, 4, 'A515-54G-77RU', 'Ativo'),
(216, 1, 4, 'A515-55-33HQ-2', 'Ativo'),
(217, 1, 4, 'A515-55-34DV', 'Ativo'),
(218, 1, 4, 'A515-55-35SE', 'Ativo'),
(219, 1, 4, 'A515-55-374E', 'Ativo'),
(220, 1, 4, 'A515-55-378V', 'Ativo'),
(221, 1, 4, 'A515-55-38L9', 'Ativo'),
(222, 1, 4, 'A515-55-50MZ', 'Ativo'),
(223, 1, 4, 'A515-55-511Q', 'Ativo'),
(224, 1, 4, 'A515-55-534P', 'Ativo'),
(225, 1, 4, 'A515-55-541A', 'Ativo'),
(226, 1, 4, 'A515-55-552K', 'Ativo'),
(227, 1, 4, 'A515-55-56VK', 'Ativo'),
(228, 1, 4, 'A515-55-576H', 'Ativo'),
(229, 1, 4, 'A515-55-592C', 'Ativo'),
(230, 1, 4, 'A515-55-78S9', 'Ativo'),
(231, 1, 4, 'A515-55G-575S', 'Ativo'),
(232, 1, 4, 'A515-55G-57H8', 'Ativo'),
(233, 1, 4, 'A515-55G-588G', 'Ativo'),
(234, 1, 4, 'A515-56-36UT', 'Ativo'),
(235, 1, 4, 'A515-56-76J1', 'Ativo'),
(236, 1, 7, 'A715-72G-79BH', 'Ativo'),
(237, 1, 7, 'A717-72G-700J', 'Ativo'),
(238, 1, 2, 'A315-41G-R87Z', 'Ativo'),
(239, 1, 2, 'A315-53-573T', 'Ativo'),
(240, 1, 4, 'A515-54-37SH', 'Ativo'),
(241, 1, 8, 'E5-553G-T4TJ', 'Ativo'),
(242, 1, 8, 'E5-574-307M', 'Ativo'),
(243, 1, 8, 'E5-576-392H', 'Ativo'),
(244, 1, 10, 'ES1-432-C57B', 'Ativo'),
(245, 1, 10, 'ES1-531-C1EY', 'Ativo'),
(246, 1, 10, 'ES1-533-C27U', 'Ativo'),
(247, 1, 10, 'ES1-533-C3VD', 'Ativo'),
(248, 1, 10, 'ES1-533-C5DEA', 'Ativo'),
(249, 1, 10, 'ES1-533-C5DES', 'Ativo'),
(250, 1, 10, 'ES1-533-C76F', 'Ativo'),
(251, 1, 10, 'ES1-533-C8GL', 'Ativo'),
(252, 1, 10, 'ES1-533-P6V1', 'Ativo'),
(253, 1, 1, 'AN515-44-R8HN', 'Ativo'),
(254, 1, 1, 'AN515-54-528V', 'Ativo'),
(255, 1, 16, 'AN515-54-581U', 'Ativo'),
(256, 1, 1, 'AN515-54-58CL', 'Ativo'),
(257, 1, 1, 'AN515-54-71CC', 'Ativo'),
(258, 1, 1, 'AN515-54-75FJ', 'Ativo'),
(259, 1, 1, 'AN515-54-76V7', 'Ativo'),
(260, 1, 1, 'AN517-51-50JS', 'Ativo'),
(261, 1, 1, 'AN517-51-55NT', 'Ativo'),
(262, 1, 1, 'AN517-51-78YY', 'Ativo'),
(263, 1, 15, 'R5-571TG-7229', 'Ativo'),
(264, 1, 12, 'VN7-792G-78V1', 'Ativo'),
(265, 1, 14, 'VX5-591G-54PG', 'Ativo'),
(266, 1, 14, 'VX5-591G-75RM', 'Ativo'),
(267, 1, 14, 'VX5-591G-78BF', 'Ativo'),
(268, 1, 17, 'CB713-1W-56VY', 'Ativo'),
(269, 1, 20, 'CB5-132T-C1LK', 'Ativo'),
(270, 1, 18, 'C731T-C2GT', 'Ativo'),
(271, 1, 18, 'C733-C607', 'Ativo'),
(272, 1, 22, 'CN315-71P-5527', 'Ativo'),
(273, 1, 22, 'CN515-71P-738H', 'Ativo'),
(274, 1, 1, 'AN515-43-R261', 'Ativo'),
(275, 1, 1, 'AN515-43-R42V-1', 'Ativo'),
(276, 1, 1, 'AN515-43-R4C3', 'Ativo'),
(277, 1, 1, 'AN515-43-R59W', 'Ativo'),
(278, 1, 1, 'AN515-43-R6GB', 'Ativo'),
(279, 1, 1, 'AN515-43-R8Z7', 'Ativo'),
(280, 1, 1, 'AN515-43-R9K7', 'Ativo'),
(281, 1, 1, 'AN515-43-R9M4-4', 'Ativo'),
(282, 1, 1, 'AN515-51-50U2', 'Ativo'),
(283, 1, 1, 'AN515-51-71A7', 'Ativo'),
(284, 1, 1, 'AN515-51-75KZ', 'Ativo'),
(285, 1, 1, 'AN515-51-77FH', 'Ativo'),
(286, 1, 1, 'AN515-51-78D6', 'Ativo'),
(287, 1, 1, 'AN515-52-5188', 'Ativo'),
(288, 1, 1, 'AN515-52-52BW', 'Ativo'),
(289, 1, 1, 'AN515-52-54AM', 'Ativo'),
(290, 1, 1, 'AN515-52-56HV', 'Ativo'),
(291, 1, 1, 'AN515-52-5771', 'Ativo'),
(292, 1, 1, 'AN515-52-721L-MX', 'Ativo'),
(293, 1, 1, 'AN515-52-72UU', 'Ativo'),
(294, 1, 1, 'AN515-52-744A', 'Ativo'),
(295, 1, 1, 'AN515-52-746R', 'Ativo'),
(296, 1, 1, 'AN515-52-75GW', 'Ativo'),
(297, 1, 1, 'AN515-52-75J9', 'Ativo'),
(298, 1, 1, 'AN515-52-780P', 'Ativo'),
(299, 1, 1, 'AN515-52-780V', 'Ativo'),
(300, 1, 1, 'AN515-52-7974', 'Ativo'),
(301, 1, 1, 'AN515-53-520C', 'Ativo'),
(302, 1, 24, 'AN515-54-56SA', 'Ativo'),
(303, 1, 25, 'AN715-51-70TG', 'Ativo'),
(304, 1, 26, 'PH317-51', 'Ativo'),
(305, 1, 26, 'G3-571-77QK', 'Ativo'),
(306, 1, 26, 'PH315-51-71FS', 'Ativo'),
(307, 1, 28, 'PH315-51-78NP', 'Ativo'),
(308, 1, 28, 'PH315-51-79DN', 'Ativo'),
(309, 1, 26, 'PH315-52-72EV', 'Ativo'),
(310, 1, 26, 'PH315-52-72RG', 'Ativo'),
(311, 1, 26, 'PH315-52-748U', 'Ativo'),
(312, 1, 28, 'PH315-52-79VM', 'Ativo'),
(313, 1, 26, 'PH315-53-71HN', 'Ativo'),
(314, 1, 28, 'PH315-53-72XD', 'Ativo'),
(315, 1, 26, 'PH315-53-75N8', 'Ativo'),
(316, 1, 26, 'PH315-53-75NL', 'Ativo'),
(317, 1, 26, 'PH315-53-75XA', 'Ativo'),
(318, 1, 26, 'PH317-52-77YY', 'Ativo'),
(319, 1, 26, 'PT315-52-73WT', 'Ativo'),
(320, 1, 27, 'PT515-51-71VV', 'Ativo'),
(321, 1, 27, 'PT515-51-7467', 'Ativo'),
(322, 1, 29, 'PT917-71-9980', 'Ativo'),
(323, 1, 30, 'SP314-51-346M', 'Ativo'),
(324, 1, 30, 'SP314-51-53W3', 'Ativo'),
(325, 1, 30, 'SP314-51-C3ZZ', 'Ativo'),
(326, 1, 30, 'SP314-54N-59HF', 'Ativo'),
(327, 1, 4, 'SP513-54N', 'Ativo'),
(328, 1, 33, 'SF114-32-P2PK', 'Ativo'),
(329, 1, 30, 'SF314-42-R9YN', 'Ativo'),
(330, 1, 30, 'SF314-54-57LM-MX', 'Ativo'),
(331, 1, 31, 'SF514-52T-56RP', 'Ativo'),
(332, 1, 35, 'SF515-51T-53AY', 'Ativo'),
(333, 1, 36, 'TMB311-31-C343', 'Ativo'),
(334, 1, 37, 'TMP2510-G2-M-57RR', 'Ativo'),
(335, 1, 38, 'TMP449-G2-M', 'Ativo'),
(336, 12, 44, 'G3 3590', 'Ativo'),
(337, 12, 44, 'G5 5590', 'Ativo'),
(338, 12, 42, '3480', 'Ativo'),
(339, 12, 42, '3583', 'Ativo'),
(340, 12, 46, 'C3181', 'Ativo'),
(341, 12, 46, 'XDGJH-1', 'Ativo'),
(342, 12, 44, 'G3 3500', 'Ativo'),
(343, 12, 44, 'G3 3579', 'Ativo'),
(344, 12, 44, 'G3 3590', 'Ativo'),
(345, 12, 44, 'G3 3779', 'Ativo'),
(346, 12, 44, 'G5 5587', 'Ativo'),
(347, 12, 44, 'G5 5590', 'Ativo'),
(348, 12, 44, 'G5 SE 5505', 'Ativo'),
(349, 12, 44, 'G7 7700', 'Ativo'),
(350, 12, 44, 'G7 7790', 'Ativo'),
(351, 12, 42, '3180', 'Ativo'),
(352, 12, 42, '3181', 'Ativo'),
(353, 12, 42, '3185', 'Ativo'),
(354, 12, 42, '3452', 'Ativo'),
(355, 12, 42, '3467', 'Ativo'),
(356, 12, 42, '3480', 'Ativo'),
(357, 12, 42, '3481', 'Ativo'),
(358, 12, 42, '3490', 'Ativo'),
(359, 12, 42, '3493', 'Ativo'),
(360, 12, 42, '3501', 'Ativo'),
(361, 12, 42, '3505', 'Ativo'),
(362, 12, 42, '3552', 'Ativo'),
(363, 12, 42, '3567', 'Ativo'),
(364, 12, 40, '3400', 'Ativo'),
(365, 12, 40, '3410', 'Ativo'),
(366, 12, 40, '3440', 'Ativo'),
(367, 12, 40, '3442', 'Ativo'),
(368, 12, 40, '3470', 'Ativo'),
(369, 12, 40, '3480', 'Ativo'),
(370, 12, 40, '3490', 'Ativo'),
(371, 12, 40, '3500', 'Ativo'),
(372, 12, 40, '3510', 'Ativo'),
(373, 12, 40, '3560', 'Ativo'),
(374, 12, 40, '3590', 'Ativo'),
(375, 12, 40, '5290', 'Ativo'),
(376, 12, 40, '5300', 'Ativo'),
(377, 12, 40, '5400', 'Ativo'),
(378, 12, 40, '5410', 'Ativo'),
(379, 12, 40, '5411', 'Ativo'),
(380, 12, 40, '5420', 'Ativo'),
(381, 12, 40, '5490', 'Ativo'),
(382, 12, 40, '5500', 'Ativo'),
(383, 12, 40, '5580', 'Ativo'),
(384, 12, 40, '5590', 'Ativo'),
(385, 12, 40, '7280', 'Ativo'),
(386, 12, 40, '7310', 'Ativo'),
(387, 12, 40, '7400', 'Ativo'),
(388, 12, 40, '7490', 'Ativo'),
(389, 12, 40, 'D630', 'Ativo'),
(406, 12, 40, 'E3440', 'Ativo'),
(407, 12, 40, 'E5250', 'Ativo'),
(408, 12, 40, 'E5450', 'Ativo'),
(409, 12, 40, 'E6430', 'Ativo'),
(410, 12, 40, 'E7250', 'Ativo'),
(411, 12, 47, '3530', 'Ativo'),
(412, 12, 47, '5510', 'Ativo'),
(413, 12, 47, '7520', 'Ativo'),
(414, 12, 47, '7530', 'Ativo'),
(415, 12, 47, '7740', 'Ativo'),
(416, 12, 47, 'M4800', 'Ativo'),
(417, 12, 47, 'M5520', 'Ativo'),
(418, 12, 48, 'E7450', 'Ativo'),
(419, 12, 39, '3400', 'Ativo'),
(420, 12, 39, '3401', 'Ativo'),
(421, 12, 39, '3405', 'Ativo'),
(422, 12, 39, '3468', 'Ativo'),
(423, 12, 39, '3480', 'Ativo'),
(424, 12, 39, '3481', 'Ativo'),
(425, 12, 39, '3486', 'Ativo'),
(426, 12, 39, '3490', 'Ativo'),
(427, 12, 39, '3500', 'Ativo'),
(428, 12, 39, '3501', 'Ativo'),
(429, 12, 39, '3590', 'Ativo'),
(430, 12, 39, '5301', 'Ativo'),
(431, 12, 39, '5391', 'Ativo'),
(432, 12, 39, '5402', 'Ativo'),
(436, 12, 43, '7390', 'Ativo'),
(437, 12, 43, ' 7590', 'Ativo'),
(438, 12, 43, '9300', 'Ativo'),
(439, 12, 43, '9310', 'Ativo'),
(440, 12, 43, '9350', 'Ativo'),
(441, 12, 43, '9360', 'Ativo'),
(442, 12, 43, '9365', 'Ativo'),
(443, 12, 43, '9370', 'Ativo'),
(444, 12, 43, '9380', 'Ativo'),
(445, 12, 43, '9550', 'Ativo'),
(446, 12, 43, '9560', 'Ativo'),
(447, 12, 43, '9570', 'Ativo'),
(448, 12, 43, '9575', 'Ativo'),
(449, 28, 49, 'B330-15IKBR', 'Ativo'),
(450, 28, 49, 'C340-14IWL', 'Ativo'),
(451, 28, 49, 'G40-80', 'Ativo'),
(452, 28, 49, 'S145-14AST', 'Ativo'),
(453, 28, 49, 'S145-15IWL', 'Ativo'),
(454, 28, 49, '100S-14IBR', 'Ativo'),
(455, 28, 49, '110-14AST', 'Ativo'),
(456, 28, 49, '110-14IBR', 'Ativo'),
(457, 28, 49, '110-14ISK', 'Ativo'),
(458, 28, 49, '110-15ACL', 'Ativo'),
(459, 28, 49, '110-15AST', 'Ativo'),
(460, 28, 49, '110-15IBR', 'Ativo'),
(461, 28, 49, '110-15ISK', 'Ativo'),
(462, 28, 49, '110-17ACL', 'Ativo'),
(463, 28, 49, '110-17IKB', 'Ativo'),
(464, 28, 49, '110-17ISK', 'Ativo'),
(465, 28, 49, '120S', 'Ativo'),
(466, 28, 49, '130-15AST', 'Ativo'),
(467, 28, 49, '130S-14IGM', 'Ativo'),
(468, 28, 50, '100E', 'Ativo'),
(469, 28, 50, '300E', 'Ativo'),
(470, 28, 51, 'B41-30', 'Ativo'),
(471, 28, 57, '14ADA05', 'Ativo'),
(472, 28, 57, '14ARE05', 'Ativo'),
(473, 28, 57, '14IIL05', 'Ativo'),
(474, 28, 57, '14IML05', 'Ativo'),
(475, 28, 57, '15IGL05', 'Ativo'),
(476, 28, 57, '15IML05', 'Ativo'),
(477, 28, 57, '17IML05', 'Ativo'),
(478, 28, 57, '17IIL05', 'Ativo'),
(479, 28, 49, '330-15IKB', 'Ativo'),
(480, 28, 49, '320-14AST', 'Ativo'),
(481, 28, 49, '320-14IAP', 'Ativo'),
(482, 28, 49, '320-14ISK', 'Ativo'),
(483, 28, 49, '320-15IAP', 'Ativo'),
(484, 28, 49, '320-17ISK', 'Ativo'),
(485, 28, 49, '330-14IGM', 'Ativo'),
(486, 28, 49, '330-15AST', 'Ativo'),
(487, 28, 49, '330S-14AST', 'Ativo'),
(488, 28, 49, '330S 530S-14IKB', 'Ativo'),
(489, 3, 58, 'Pro', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo_tablets`
--

CREATE TABLE `modelo_tablets` (
  `cod_modelo_tablet` int(11) NOT NULL,
  `nome_modelo_tablet` varchar(100) NOT NULL,
  `status_modelo_tablet` enum('Ativo','Inativo') DEFAULT 'Ativo',
  `cod_marca_tablet` int(11) DEFAULT NULL,
  `cod_linha_tablet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `modelo_tablets`
--

INSERT INTO `modelo_tablets` (`cod_modelo_tablet`, `nome_modelo_tablet`, `status_modelo_tablet`, `cod_marca_tablet`, `cod_linha_tablet`) VALUES
(1, 'S7 LTE', 'Ativo', 1, 1),
(2, 'S6 LITE', 'Ativo', 1, 1),
(3, 'A7', 'Ativo', 1, 2),
(4, 'A8', 'Ativo', 1, 2),
(5, 'A7 LITE', 'Ativo', 1, 2),
(6, 'S7 FE', 'Ativo', 1, 1),
(7, 'S7 PEN', 'Ativo', 1, 1),
(8, 'S4', 'Ativo', 1, 1),
(9, 'S5e', 'Ativo', 1, 1),
(10, 'A', 'Ativo', 1, 2),
(12, 'S6', 'Ativo', 1, 1),
(13, 'A8 PEN', 'Ativo', 1, 2),
(14, '3 LTE', 'Ativo', 1, 3),
(15, 'Air', 'Ativo', 5, 11),
(16, 'Mini', 'Ativo', 5, 11),
(17, '2', 'Ativo', 5, 11),
(18, 'PRO', 'Ativo', 5, 11),
(19, 'Mini 2', 'Ativo', 5, 11),
(20, 'Air 2', 'Ativo', 5, 11),
(21, 'Mini 3', 'Ativo', 5, 11),
(22, 'Mini 4', 'Ativo', 5, 11),
(23, 'Air 4', 'Ativo', 5, 11),
(24, 'M7S GO', 'Ativo', 3, 12),
(25, 'M7', 'Ativo', 3, 12),
(26, 'M10A', 'Ativo', 3, 12),
(27, 'PTB7SSG ', 'Ativo', 2, NULL),
(28, 'PTB10RSG', 'Ativo', 2, NULL),
(29, 'PTB7SRG', 'Ativo', 2, NULL),
(30, 'T770KC', 'Ativo', 4, 13),
(31, ' Q10', 'Ativo', 4, 14),
(32, 'T770C ', 'Ativo', 4, 15),
(33, 'T770KB ', 'Ativo', 4, 13),
(34, '4', 'Ativo', 9, 16),
(35, '4 PLUS', 'Ativo', 9, 16),
(36, '5', 'Ativo', 9, 16),
(37, '3', 'Ativo', 9, 16),
(38, '2', 'Ativo', 1, 16),
(39, 'V500', 'Ativo', 7, 17);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro_produto`
--
ALTER TABLE `cadastro_produto`
  ADD PRIMARY KEY (`cod_produto`),
  ADD KEY `produtos_categorias` (`cod_categoria_produto`),
  ADD KEY `cadastro_produto_cadastro_usuario` (`email_usuario`);

--
-- Índices para tabela `cadastro_usuarios`
--
ALTER TABLE `cadastro_usuarios`
  ADD PRIMARY KEY (`email_usuario`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cod_categoria`);

--
-- Índices para tabela `chatanuncio`
--
ALTER TABLE `chatanuncio`
  ADD PRIMARY KEY (`cod_chat`),
  ADD KEY `cod_anuncio` (`cod_anuncio`),
  ADD KEY `email_vendedor` (`email_vendedor`),
  ADD KEY `email_comprador` (`email_comprador`);

--
-- Índices para tabela `fichatec_celulares`
--
ALTER TABLE `fichatec_celulares`
  ADD PRIMARY KEY (`cod_ficha_tec`),
  ADD KEY `fichatec_celulares_marca_celulares` (`cod_marca_celular`),
  ADD KEY `fichatec_celulares_linha_celulares` (`cod_linha_celular`),
  ADD KEY `fichatec_celulares_modelo_celulares` (`cod_modelo_celular`),
  ADD KEY `fichatec_celulares_cadastro_produtos` (`cod_produto`);

--
-- Índices para tabela `fichatec_notebooks`
--
ALTER TABLE `fichatec_notebooks`
  ADD PRIMARY KEY (`cod_ficha_tec`),
  ADD KEY `fichatec_notebooks_cadastro_produto` (`cod_produto`),
  ADD KEY `fichatec_notebooks_marca_notebook` (`cod_marca_notebook`),
  ADD KEY `fichatec_notebooks_modelo_notebook` (`cod_modelo_notebook`),
  ADD KEY `fichatec_notebooks_linha_notebook` (`cod_linha_notebook`);

--
-- Índices para tabela `fichatec_tablets`
--
ALTER TABLE `fichatec_tablets`
  ADD PRIMARY KEY (`cod_ficha_tec`),
  ADD KEY `fichatec_tablets_cadastro_produto` (`cod_produto`),
  ADD KEY `fichatec_tablets_linha_tablets` (`cod_linha_tablet`),
  ADD KEY `fichatec_tablets_marca_tablets` (`cod_marca_tablet`),
  ADD KEY `fichatec_tablets_modelo_tablets` (`cod_modelo_tablet`);

--
-- Índices para tabela `fotos_produto`
--
ALTER TABLE `fotos_produto`
  ADD PRIMARY KEY (`cod_foto`),
  ADD KEY `cod_anuncio_fotos` (`cod_produto`);

--
-- Índices para tabela `linha_celulares`
--
ALTER TABLE `linha_celulares`
  ADD PRIMARY KEY (`cod_linha_celular`),
  ADD KEY `marca_linha` (`cod_marca_celular`);

--
-- Índices para tabela `linha_notebook`
--
ALTER TABLE `linha_notebook`
  ADD PRIMARY KEY (`cod_linha_notebook`),
  ADD KEY `linha_notebook_marca_notebook` (`cod_marca_notebook`);

--
-- Índices para tabela `linha_tablets`
--
ALTER TABLE `linha_tablets`
  ADD PRIMARY KEY (`cod_linha_tablet`),
  ADD KEY `linha_tablets_marca_tablets` (`cod_marca_tablet`);

--
-- Índices para tabela `marca_celulares`
--
ALTER TABLE `marca_celulares`
  ADD PRIMARY KEY (`cod_marca_celular`);

--
-- Índices para tabela `marca_notebook`
--
ALTER TABLE `marca_notebook`
  ADD PRIMARY KEY (`cod_marca_notebook`);

--
-- Índices para tabela `marca_tablets`
--
ALTER TABLE `marca_tablets`
  ADD PRIMARY KEY (`cod_marca_tablet`);

--
-- Índices para tabela `mensagenschat`
--
ALTER TABLE `mensagenschat`
  ADD PRIMARY KEY (`cod_mensagem`),
  ADD KEY `cod_chat` (`cod_chat`),
  ADD KEY `destinatario_chat` (`destinatario_chat`),
  ADD KEY `remetente_chat` (`remetente_chat`);

--
-- Índices para tabela `modelo_celulares`
--
ALTER TABLE `modelo_celulares`
  ADD PRIMARY KEY (`cod_modelo_celular`),
  ADD KEY `modelo_linha` (`cod_linha_celular`),
  ADD KEY `modelo_marca` (`cod_marca_celular`);

--
-- Índices para tabela `modelo_notebook`
--
ALTER TABLE `modelo_notebook`
  ADD PRIMARY KEY (`cod_modelo_notebook`),
  ADD KEY `modelo_notebook_marca_notebook` (`cod_marca_notebook`),
  ADD KEY `modelo_notebook_linha_notebook` (`cod_linha_notebook`);

--
-- Índices para tabela `modelo_tablets`
--
ALTER TABLE `modelo_tablets`
  ADD PRIMARY KEY (`cod_modelo_tablet`),
  ADD KEY `modelo_tablets_marca_tablets` (`cod_marca_tablet`),
  ADD KEY `modelo_tablets_linha_tablets` (`cod_linha_tablet`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro_produto`
--
ALTER TABLE `cadastro_produto`
  MODIFY `cod_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cod_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `chatanuncio`
--
ALTER TABLE `chatanuncio`
  MODIFY `cod_chat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fichatec_celulares`
--
ALTER TABLE `fichatec_celulares`
  MODIFY `cod_ficha_tec` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fichatec_notebooks`
--
ALTER TABLE `fichatec_notebooks`
  MODIFY `cod_ficha_tec` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fichatec_tablets`
--
ALTER TABLE `fichatec_tablets`
  MODIFY `cod_ficha_tec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fotos_produto`
--
ALTER TABLE `fotos_produto`
  MODIFY `cod_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `linha_celulares`
--
ALTER TABLE `linha_celulares`
  MODIFY `cod_linha_celular` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de tabela `linha_notebook`
--
ALTER TABLE `linha_notebook`
  MODIFY `cod_linha_notebook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `linha_tablets`
--
ALTER TABLE `linha_tablets`
  MODIFY `cod_linha_tablet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `marca_celulares`
--
ALTER TABLE `marca_celulares`
  MODIFY `cod_marca_celular` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `marca_notebook`
--
ALTER TABLE `marca_notebook`
  MODIFY `cod_marca_notebook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `marca_tablets`
--
ALTER TABLE `marca_tablets`
  MODIFY `cod_marca_tablet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `mensagenschat`
--
ALTER TABLE `mensagenschat`
  MODIFY `cod_mensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `modelo_celulares`
--
ALTER TABLE `modelo_celulares`
  MODIFY `cod_modelo_celular` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;

--
-- AUTO_INCREMENT de tabela `modelo_notebook`
--
ALTER TABLE `modelo_notebook`
  MODIFY `cod_modelo_notebook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=490;

--
-- AUTO_INCREMENT de tabela `modelo_tablets`
--
ALTER TABLE `modelo_tablets`
  MODIFY `cod_modelo_tablet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cadastro_produto`
--
ALTER TABLE `cadastro_produto`
  ADD CONSTRAINT `cadastro_produto_cadastro_usuario` FOREIGN KEY (`email_usuario`) REFERENCES `cadastro_usuarios` (`email_usuario`),
  ADD CONSTRAINT `produtos_categorias` FOREIGN KEY (`cod_categoria_produto`) REFERENCES `categorias` (`cod_categoria`);

--
-- Limitadores para a tabela `chatanuncio`
--
ALTER TABLE `chatanuncio`
  ADD CONSTRAINT `cod_anuncio` FOREIGN KEY (`cod_anuncio`) REFERENCES `cadastro_produto` (`cod_produto`),
  ADD CONSTRAINT `email_comprador` FOREIGN KEY (`email_comprador`) REFERENCES `cadastro_usuarios` (`email_usuario`),
  ADD CONSTRAINT `email_vendedor` FOREIGN KEY (`email_vendedor`) REFERENCES `cadastro_usuarios` (`email_usuario`);

--
-- Limitadores para a tabela `fichatec_celulares`
--
ALTER TABLE `fichatec_celulares`
  ADD CONSTRAINT `fichatec_celulares_cadastro_produtos` FOREIGN KEY (`cod_produto`) REFERENCES `cadastro_produto` (`cod_produto`),
  ADD CONSTRAINT `fichatec_celulares_linha_celulares` FOREIGN KEY (`cod_linha_celular`) REFERENCES `linha_celulares` (`cod_linha_celular`),
  ADD CONSTRAINT `fichatec_celulares_marca_celulares` FOREIGN KEY (`cod_marca_celular`) REFERENCES `marca_celulares` (`cod_marca_celular`),
  ADD CONSTRAINT `fichatec_celulares_modelo_celulares` FOREIGN KEY (`cod_modelo_celular`) REFERENCES `modelo_celulares` (`cod_modelo_celular`);

--
-- Limitadores para a tabela `fichatec_notebooks`
--
ALTER TABLE `fichatec_notebooks`
  ADD CONSTRAINT `fichatec_notebooks_cadastro_produto` FOREIGN KEY (`cod_produto`) REFERENCES `cadastro_produto` (`cod_produto`),
  ADD CONSTRAINT `fichatec_notebooks_linha_notebook` FOREIGN KEY (`cod_linha_notebook`) REFERENCES `linha_notebook` (`cod_linha_notebook`),
  ADD CONSTRAINT `fichatec_notebooks_marca_notebook` FOREIGN KEY (`cod_marca_notebook`) REFERENCES `marca_notebook` (`cod_marca_notebook`),
  ADD CONSTRAINT `fichatec_notebooks_modelo_notebook` FOREIGN KEY (`cod_modelo_notebook`) REFERENCES `modelo_notebook` (`cod_modelo_notebook`);

--
-- Limitadores para a tabela `fichatec_tablets`
--
ALTER TABLE `fichatec_tablets`
  ADD CONSTRAINT `fichatec_tablets_cadastro_produto` FOREIGN KEY (`cod_produto`) REFERENCES `cadastro_produto` (`cod_produto`),
  ADD CONSTRAINT `fichatec_tablets_linha_tablets` FOREIGN KEY (`cod_linha_tablet`) REFERENCES `linha_tablets` (`cod_linha_tablet`),
  ADD CONSTRAINT `fichatec_tablets_marca_tablets` FOREIGN KEY (`cod_marca_tablet`) REFERENCES `marca_tablets` (`cod_marca_tablet`),
  ADD CONSTRAINT `fichatec_tablets_modelo_tablets` FOREIGN KEY (`cod_modelo_tablet`) REFERENCES `modelo_tablets` (`cod_modelo_tablet`);

--
-- Limitadores para a tabela `fotos_produto`
--
ALTER TABLE `fotos_produto`
  ADD CONSTRAINT `cod_anuncio_fotos` FOREIGN KEY (`cod_produto`) REFERENCES `cadastro_produto` (`cod_produto`);

--
-- Limitadores para a tabela `linha_celulares`
--
ALTER TABLE `linha_celulares`
  ADD CONSTRAINT `marca_linha` FOREIGN KEY (`cod_marca_celular`) REFERENCES `marca_celulares` (`cod_marca_celular`);

--
-- Limitadores para a tabela `linha_notebook`
--
ALTER TABLE `linha_notebook`
  ADD CONSTRAINT `linha_notebook_marca_notebook` FOREIGN KEY (`cod_marca_notebook`) REFERENCES `marca_notebook` (`cod_marca_notebook`);

--
-- Limitadores para a tabela `linha_tablets`
--
ALTER TABLE `linha_tablets`
  ADD CONSTRAINT `linha_tablets_marca_tablets` FOREIGN KEY (`cod_marca_tablet`) REFERENCES `marca_tablets` (`cod_marca_tablet`);

--
-- Limitadores para a tabela `mensagenschat`
--
ALTER TABLE `mensagenschat`
  ADD CONSTRAINT `cod_chat` FOREIGN KEY (`cod_chat`) REFERENCES `chatanuncio` (`cod_chat`),
  ADD CONSTRAINT `destinatario_chat` FOREIGN KEY (`destinatario_chat`) REFERENCES `cadastro_usuarios` (`email_usuario`),
  ADD CONSTRAINT `remetente_chat` FOREIGN KEY (`remetente_chat`) REFERENCES `cadastro_usuarios` (`email_usuario`);

--
-- Limitadores para a tabela `modelo_celulares`
--
ALTER TABLE `modelo_celulares`
  ADD CONSTRAINT `modelo_linha` FOREIGN KEY (`cod_linha_celular`) REFERENCES `linha_celulares` (`cod_linha_celular`),
  ADD CONSTRAINT `modelo_marca` FOREIGN KEY (`cod_marca_celular`) REFERENCES `marca_celulares` (`cod_marca_celular`);

--
-- Limitadores para a tabela `modelo_notebook`
--
ALTER TABLE `modelo_notebook`
  ADD CONSTRAINT `modelo_notebook_linha_notebook` FOREIGN KEY (`cod_linha_notebook`) REFERENCES `linha_notebook` (`cod_linha_notebook`),
  ADD CONSTRAINT `modelo_notebook_marca_notebook` FOREIGN KEY (`cod_marca_notebook`) REFERENCES `marca_notebook` (`cod_marca_notebook`);

--
-- Limitadores para a tabela `modelo_tablets`
--
ALTER TABLE `modelo_tablets`
  ADD CONSTRAINT `modelo_tablets_linha_tablets` FOREIGN KEY (`cod_linha_tablet`) REFERENCES `linha_tablets` (`cod_linha_tablet`),
  ADD CONSTRAINT `modelo_tablets_marca_tablets` FOREIGN KEY (`cod_marca_tablet`) REFERENCES `marca_tablets` (`cod_marca_tablet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
