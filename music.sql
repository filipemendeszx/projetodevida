-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/02/2025 às 02:01
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `music`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `artigos`
--

CREATE TABLE `artigos` (
  `id_musica` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `data_lancamento` timestamp NOT NULL DEFAULT current_timestamp(),
  `texto` varchar(500) NOT NULL,
  `assunto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `artigos`
--

INSERT INTO `artigos` (`id_musica`, `id_user`, `nome`, `data_lancamento`, `texto`, `assunto`) VALUES
(36, 20, '2', '2025-02-27 12:55:52', '1', '1'),
(37, 20, '', '2025-02-27 12:55:55', '', ''),
(38, 20, 'sinonimos', '2025-02-27 13:17:21', '1', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tipo` varchar(9) NOT NULL,
  `texto_pergunta` text DEFAULT NULL,
  `resposta_certa` varchar(1) DEFAULT NULL,
  `opcao_1` varchar(255) DEFAULT NULL,
  `opcao_2` varchar(255) DEFAULT NULL,
  `opcao_3` varchar(255) DEFAULT NULL,
  `opcao_4` varchar(255) DEFAULT NULL,
  `total_perguntas` int(11) DEFAULT NULL,
  `pergunta_atual_id` int(11) DEFAULT NULL,
  `pontuacao_time_1` int(11) DEFAULT NULL,
  `perguntas_restantes` text DEFAULT NULL,
  `pontuacao_final_time_1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `quiz`
--

INSERT INTO `quiz` (`id`, `id_user`, `tipo`, `texto_pergunta`, `resposta_certa`, `opcao_1`, `opcao_2`, `opcao_3`, `opcao_4`, `total_perguntas`, `pergunta_atual_id`, `pontuacao_time_1`, `perguntas_restantes`, `pontuacao_final_time_1`) VALUES
(41, 20, 'pergunta', 'Qual é o principal desafio da energia solar fotovoltaica?', 'C', 'Baixo custo inicial de instalação', 'Alta eficiência em climas nublados', 'Intermitência e necessidade de armazenamento', 'Produção de resíduos tóxicos durante a operação', NULL, NULL, NULL, NULL, NULL),
(42, 20, 'pergunta', 'Qual das opções abaixo representa uma vantagem exclusiva da energia eólica?', 'C', 'Funcionamento 24 horas sem necessidade de vento constante', 'Impacto ambiental zero durante sua operação', 'Alto potencial de geração em áreas costeiras', 'Independência completa da rede elétrica', NULL, NULL, NULL, NULL, NULL),
(43, 20, 'pergunta', 'Qual é um fator que pode comprometer a viabilidade econômica da energia renovável?', 'B', 'Necessidade de atualização contínua dos equipamentos', 'Dependência de materiais raros e de difícil extração', 'Falta de incentivo para tecnologias sustentáveis', 'Nenhuma das alternativas, pois são sempre viáveis', NULL, NULL, NULL, NULL, NULL),
(44, 20, 'pergunta', 'Como a energia das marés pode ser uma alternativa viável?', 'A', 'Porque tem alta previsibilidade e estabilidade', 'Porque é a fonte de energia mais barata disponível', 'Porque depende de combustíveis fósseis', 'Porque pode ser usada apenas em águas profundas', NULL, NULL, NULL, NULL, NULL),
(45, 20, 'pergunta', 'Qual o principal desafio ambiental da energia nuclear?', 'C', 'Baixa eficiência na geração de eletricidade', 'Dependência de fontes não renováveis como o urânio', 'Produção e armazenamento de resíduos radioativos', 'Emissão contínua de gases de efeito estufa', NULL, NULL, NULL, NULL, NULL),
(47, 20, 'pergunta', 'Uma possível consequência do uso intensivo de biomassa para geração de energia é:', 'A', 'A degradação do solo devido ao desmatamento', 'A emissão de radiação ionizante', 'A dependência de petróleo', 'A impossibilidade de geração contínua de energia', NULL, NULL, NULL, NULL, NULL),
(48, 20, 'pergunta', 'Por que a energia nuclear é considerada uma alternativa limpa?', 'B', 'Porque não gera resíduos durante a operação', 'Porque não emite gases do efeito estufa em seu funcionamento', 'Porque utiliza água como combustível primário', 'Porque depende exclusivamente da energia solar', NULL, NULL, NULL, NULL, NULL),
(49, 20, 'pergunta', 'Qual das seguintes opções não é uma consequência direta do uso do carvão mineral?', 'B', 'Emissão de enxofre, causando chuva ácida', 'Formação de resíduos radioativos perigosos', 'Intensificação do efeito estufa', 'Poluição atmosférica com material particulado', NULL, NULL, NULL, NULL, NULL),
(50, 20, 'pergunta', 'Qual é um dos maiores desafios na substituição do petróleo como fonte energética?', 'C', 'Forte dependência da economia global no setor', 'Baixa eficiência dos combustíveis fósseis', 'Fácil decomposição dos derivados do petróleo', 'Nenhuma alternativa é um desafio', NULL, NULL, NULL, NULL, NULL),
(51, 20, 'pergunta', 'O etanol, apesar de ser considerado uma alternativa menos poluente, apresenta qual desvantagem?', 'A', 'Consome grandes áreas agrícolas para sua produção', 'Libera maior quantidade de CO₂ que o carvão', 'Depende exclusivamente de mineração para sua extração', 'Apresenta alto risco de radiação no ambiente', NULL, NULL, NULL, NULL, NULL),
(52, 20, 'pergunta', 'O petróleo pode ser substituído com mais facilidade por qual dessas fontes?', 'B', 'Gás natural', 'Hidrogênio verde', 'Energia nuclear', 'Carvão mineral', NULL, NULL, NULL, NULL, NULL),
(53, 20, 'pergunta', 'Qual é um dos principais impactos ambientais da fabricação de baterias de carros elétricos?', 'B', 'Extração intensiva de lítio e metais raros', 'Emissão de gases tóxicos durante o carregamento', 'Alto consumo de petróleo na fabricação', 'Baixa eficiência energética na produção', NULL, NULL, NULL, NULL, NULL),
(54, 20, 'pergunta', 'Uma vantagem dos carros elétricos em relação aos veículos a combustão é:', 'A', 'Maior eficiência energética na conversão de energia', 'Custo de produção mais baixo', 'Independência de qualquer tipo de mineração', 'Imunidade a falhas elétricas', NULL, NULL, NULL, NULL, NULL),
(55, 20, 'pergunta', 'Qual é um dos desafios para a ampla adoção de carros elétricos?', 'C', 'Alta disponibilidade de postos de recarga', 'Baixo impacto ambiental das baterias', 'Dependência de infraestrutura de carregamento', 'Uso ilimitado de energia solar para recarga', NULL, NULL, NULL, NULL, NULL),
(56, 20, 'pergunta', 'Qual um possível efeito colateral do descarte inadequado de baterias de lítio?', 'A', 'Contaminação do solo e da água por metais pesados', 'Liberação de radiação ionizante', 'Formação de gases inflamáveis como o metano', 'Emissão contínua de CO₂ durante a decomposição', NULL, NULL, NULL, NULL, NULL),
(57, 20, 'pergunta', 'Qual foi um dos principais focos da Rio-92?', 'C', 'Redução do uso de energias renováveis', 'Expansão da mineração em áreas protegidas', 'Desenvolvimento sustentável e combate ao aquecimento global', 'Incentivo ao uso exclusivo de combustíveis fósseis', NULL, NULL, NULL, NULL, NULL),
(58, 20, 'pergunta', 'Qual documento foi um marco da Rio-92?', 'B', 'Protocolo de Kyoto', 'Carta da Terra', 'Acordo de Paris', 'Convenção de Estocolmo', NULL, NULL, NULL, NULL, NULL),
(59, 20, 'pergunta', 'Um dos compromissos firmados durante a Rio-92 foi:', 'C', 'Eliminação total de plásticos descartáveis até 2000', 'Manutenção das políticas energéticas baseadas em carvão', 'Desenvolvimento sustentável e redução das desigualdades', 'Expansão da indústria de petróleo', NULL, NULL, NULL, NULL, NULL),
(60, 20, 'pergunta', 'A Rio-92 influenciou diretamente qual evento posterior?', 'B', 'Protocolo de Montreal', 'Acordo de Paris', 'Revolução Industrial', 'Primeira Conferência do Clima da ONU', NULL, NULL, NULL, NULL, NULL),
(61, 20, 'pergunta', 'Qual das doenças abaixo está diretamente relacionada à poluição atmosférica?', 'C', 'Doença pulmonar obstrutiva crônica (DPOC)', 'Tuberculose', 'Doença de Alzheimer', 'Malária', NULL, NULL, NULL, NULL, NULL),
(62, 20, 'pergunta', 'A exposição prolongada a poluentes do ar pode causar:', 'C', 'Agravamento de doenças cardiovasculares', 'Redução na incidência de doenças cardíacas', 'Aumento da função respiratória', 'Melhoria na qualidade do sono', NULL, NULL, NULL, NULL, NULL),
(63, 20, 'pergunta', 'Qual tipo de poluição pode ser mais prejudicial à saúde mental?', 'A', 'Poluição sonora', 'Poluição luminosa', 'Poluição térmica', 'Poluição hídrica', NULL, NULL, NULL, NULL, NULL),
(64, 20, 'pergunta', 'Crianças expostas à poluição podem desenvolver mais frequentemente:', 'B', 'Distúrbios respiratórios e problemas cognitivos', 'Doenças neurodegenerativas precoces', 'Maior resistência imunológica', 'Menor propensão a alergias', NULL, NULL, NULL, NULL, NULL),
(65, 20, 'pergunta', 'O que é reciclagem?', 'B', 'Reaproveitamento de materiais', 'Produção de energia', 'Consumo de água', 'Descarte de resíduos sem separação', NULL, NULL, NULL, NULL, NULL),
(66, 20, 'pergunta', 'Qual destes é um exemplo de resíduo orgânico?', 'A', 'Casca de banana', 'Pote de plástico', 'Lata de alumínio', 'Garrafa de vidro', NULL, NULL, NULL, NULL, NULL),
(67, 20, 'pergunta', 'O que é energia renovável?', 'A', 'Energia de fontes infinitas', 'Energia nuclear', 'Energia de combustíveis fósseis', 'Energia não-renovável', NULL, NULL, NULL, NULL, NULL),
(68, 20, 'pergunta', 'O que é economia circular?', 'A', 'Uso eficiente de recursos e reaproveitamento', 'Consumo acelerado de produtos', 'Compra e venda de plástico reciclado', 'Produção de resíduos sem reaproveitamento', NULL, NULL, NULL, NULL, NULL),
(176, 20, 'jogo', NULL, NULL, NULL, NULL, NULL, NULL, 20, 61, 0, '[{\'id\':52},{\'id\':42},{\'id\':49},{\'id\':67},{\'id\':56},{\'id\':62},{\'id\':44},{\'id\':60},{\'id\':65},{\'id\':45},{\'id\':54},{\'id\':57},{\'id\':66},{\'id\':64},{\'id\':47},{\'id\':53},{\'id\':50},{\'id\':59},{\'id\':68},{\'id\':61}]', NULL),
(177, 20, 'jogo', NULL, NULL, NULL, NULL, NULL, NULL, 20, 64, 0, '[{\'id\':63},{\'id\':45},{\'id\':66},{\'id\':61},{\'id\':48},{\'id\':49},{\'id\':54},{\'id\':43},{\'id\':59},{\'id\':50},{\'id\':55},{\'id\':51},{\'id\':60},{\'id\':62},{\'id\':44},{\'id\':56},{\'id\':65},{\'id\':67},{\'id\':52},{\'id\':64}]', NULL),
(178, 20, 'jogo', NULL, NULL, NULL, NULL, NULL, NULL, 10, 51, 0, '[{\'id\':58},{\'id\':55},{\'id\':62},{\'id\':60},{\'id\':41},{\'id\':65},{\'id\':59},{\'id\':42},{\'id\':53},{\'id\':51}]', NULL),
(179, 20, 'jogo', NULL, NULL, NULL, NULL, NULL, NULL, 20, 56, 0, '[{\'id\':59},{\'id\':51},{\'id\':45},{\'id\':55},{\'id\':42},{\'id\':68},{\'id\':66},{\'id\':53},{\'id\':41},{\'id\':64},{\'id\':49},{\'id\':58},{\'id\':67},{\'id\':62},{\'id\':50},{\'id\':57},{\'id\':61},{\'id\':52},{\'id\':63},{\'id\':56}]', NULL),
(180, 20, 'jogo', NULL, NULL, NULL, NULL, NULL, NULL, 20, 48, 0, '[{\'id\':64},{\'id\':62},{\'id\':51},{\'id\':42},{\'id\':61},{\'id\':43},{\'id\':52},{\'id\':53},{\'id\':49},{\'id\':41},{\'id\':67},{\'id\':66},{\'id\':55},{\'id\':47},{\'id\':54},{\'id\':57},{\'id\':56},{\'id\':59},{\'id\':45},{\'id\':48}]', NULL),
(181, 20, 'jogo', NULL, NULL, NULL, NULL, NULL, NULL, 10, 49, 2, '[{\'id\':42},{\'id\':60},{\'id\':49}]', NULL),
(182, 20, 'jogo', NULL, NULL, NULL, NULL, NULL, NULL, 10, 67, 1, '[{\'id\':57},{\'id\':67}]', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nome`, `email`, `senha`, `data_criacao`) VALUES
(20, '1', '1@gmail', '1', '2025-02-26 13:37:19');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `artigos`
--
ALTER TABLE `artigos`
  ADD PRIMARY KEY (`id_musica`),
  ADD KEY `fk_artigos_usuario` (`id_user`);

--
-- Índices de tabela `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_quiz` (`id_user`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artigos`
--
ALTER TABLE `artigos`
  MODIFY `id_musica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `artigos`
--
ALTER TABLE `artigos`
  ADD CONSTRAINT `fk_artigos_usuario` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `usuario_quiz` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
