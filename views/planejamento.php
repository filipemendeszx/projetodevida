<?php 
require_once '../controllers/UserController.php';
session_start();

$controller = new UserController();
$user_id = $_COOKIE['user_id'];

$dados = $controller->buscarPlanejamentoFuturo($user_id);

// Para manter os valores após o POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = array_merge($dados ?? [], $_POST);
}

$mensagem = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        'user_id' => $user_id,
        'inspiracoes' => $_POST['inspiracoes'] ?? '',
        'sonhos_infancia' => $_POST['sonhos_infancia'] ?? '',
        'sonhos_momento' => $_POST['sonhos_momento'] ?? '',
        'curto_prazo' => $_POST['curto_prazo'] ?? '',
        'medio_prazo' => $_POST['medio_prazo'] ?? '',
        'longo_prazo' => $_POST['longo_prazo'] ?? '',
        'visao_10_anos' => $_POST['visao_10_anos'] ?? '',
        'profissao_desejada' => $_POST['profissao_desejada'] ?? '',
        'detalhes_profissao' => $_POST['detalhes_profissao'] ?? '',
        'area_atuacao' => $_POST['area_atuacao'] ?? '',
        'salario_estimado' => $_POST['salario_estimado'] ?? ''
    ];

    if ($controller->salvarPlanejamentoFuturo($dados)) {
        $mensagem = 'Planejamento salvo com sucesso!';
    } else {
        $mensagem = 'Erro ao salvar planejamento.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto de Vida</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>

<header class="header">
    <div class="title-group">
        <div class="title">Projeto <span class="highlight">de vida</span></div>
        <div class="subtitle">Filipe Mendes</div>
    </div>
    <nav class="botao">
        <a href="home.php">Início</a>
        <a href="sobre.php">Sobre mim &#9662;</a>
        <a href="../view/perfil.php"><img id="fotoPerfil" src="../view/imagem.php?id=<?= $_COOKIE['user_id'] ?>"
                                               alt="Foto de Perfil" class="profile"></a>
        <a href="logout.php">sair</a>
    </nav>
</header>

<main class="container">
    <h1 class="titulo">Planejamento de futuro </h1>

    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
        <section class="flex">
            <div class="bloco verde sessenta">
                <h2>Minhas inspirações</h2>
                <textarea name="inspiracoes" rows="15"><?= htmlspecialchars($dados['inspiracoes'] ?? '') ?></textarea>
            </div>

            <div class="bloco laranja quarenta">
                <h2>Meus sonhos de infãncia</h2>
                <textarea name="sonhos_infancia" rows="10"><?= htmlspecialchars($dados['sonhos_infancia'] ?? '') ?></textarea>
            </div>
        </section>

        <section class="flex">
            <div class="bloco azul quarenta">
                <h2>Meus sonhos do momento</h2>
                <textarea name="sonhos_momento" rows="10"><?= htmlspecialchars($dados['sonhos_momento'] ?? '') ?></textarea>
            </div>
            <div class="bloco azul sessenta">
                <h2>Meus principais objetivos</h2>
                <label>Curto prazo (1 ano):<input type="text" name="curto_prazo" value="<?= htmlspecialchars($dados['objetivo_curto_prazo'] ?? '') ?>"></label>
                <label>Médio prazo (3 anos):<input type="text" name="medio_prazo" value="<?= htmlspecialchars($dados['objetivo_medio_prazo'] ?? '') ?>"></label>
                <label>Longo prazo (7 anos):<input type="text" name="longo_prazo" value="<?= htmlspecialchars($dados['objetivo_longo_prazo'] ?? '') ?>"></label>
                <label>Como você se vê em 10 anos:<input type="text" name="visao_10_anos" value="<?= htmlspecialchars($dados['visao_10_anos'] ?? '') ?>"></label>
            </div>
        </section>
        <section class="flex">
    <div class="bloco laranja full cem">
        <h2>Planejamento</h2>

        <!-- DATALIST DE PROFISSÕES MILITARES -->
        <datalist id="profissoesMilitares">
            <option value="Soldado">
            <option value="Cabo">
            <option value="Sargento (Carreira ou Temporário)">
            <option value="Oficial (AMAN)">
            <option value="Engenheiro Militar">
            <option value="Médico Militar">
        </datalist>

        <h3>
            <label>Pesquise uma profissão:
                <input type="text" name="profissao_desejada" id="profissao" list="profissoesMilitares"
                       value="<?= htmlspecialchars($dados['profissao_desejada'] ?? '') ?>">
            </label>
        </h3>

        <label>Detalhes:
            <input type="text" name="detalhes_profissao" id="detalhes" value="<?= htmlspecialchars($dados['detalhes_profissao'] ?? '') ?>">
        </label>
        <label>Área de atuação:
            <input type="text" name="area_atuacao" id="atuacao" value="<?= htmlspecialchars($dados['area_atuacao'] ?? '') ?>">
        </label>
        <label>Salário:
            <input type="text" name="salario_estimado" id="salario" value="<?= htmlspecialchars($dados['salario_estimado'] ?? '') ?>">
        </label>
    </div>
</section>

        <div class="limpar">
            <input type="reset" value="Limpar formulário">
        </div>
        <div class="enviar">
            <button type="submit">Enviar</button>
        </div>
    </form>
</main>

<footer class="footer">
    <p> © 2025 Projeto de vida. Todos os Direitos Reservados.</p>
    <p>
        Powered by
        <a href="https://www.instagram.com/filipeemendesx/" target="_blank">
            https://www.instagram.com/filipemendesx
        </a>
    </p>
</footer>
<script>
    const profissaoInput = document.getElementById('profissao');
    const detalhesInput = document.getElementById('detalhes');
    const atuacaoInput = document.getElementById('atuacao');
    const salarioInput = document.getElementById('salario');

    const dadosProfissoes = {
        "Soldado": {
            detalhes: "Executa tarefas operacionais básicas e atua na segurança, apoio logístico ou combate.",
            atuacao: "Infantaria, cavalaria, engenharia, logística.",
            salario: "R$ 2.000 a R$ 3.500"
        },
        "Cabo": {
            detalhes: "Supervisiona soldados e auxilia sargentos nas operações e treinamentos.",
            atuacao: "Tropas operacionais, logística, comunicações.",
            salario: "R$ 2.500 a R$ 4.000"
        },
        "Sargento (Carreira ou Temporário)": {
            detalhes: "Comanda pequenas frações de tropa e desempenha funções técnicas ou administrativas.",
            atuacao: "Instrução militar, engenharia, enfermagem, comunicações.",
            salario: "R$ 3.500 a R$ 6.000"
        },
        "Oficial (AMAN)": {
            detalhes: "Lidera pelotões, companhias ou unidades, com formação em comando e gestão militar.",
            atuacao: "Infantaria, artilharia, cavalaria, intendência, comunicações.",
            salario: "R$ 7.000 a R$ 12.000"
        },
        "Engenheiro Militar": {
            detalhes: "Responsável por obras civis e militares, como pontes, estradas e fortificações.",
            atuacao: "Infraestrutura militar, apoio em desastres, construções logísticas.",
            salario: "R$ 8.000 a R$ 13.000"
        },
        "Médico Militar": {
            detalhes: "Atua no atendimento de saúde a militares e em missões humanitárias ou de guerra.",
            atuacao: "Hospitais militares, bases, missões nacionais e internacionais.",
            salario: "R$ 9.000 a R$ 15.000"
        }
    };

    profissaoInput.addEventListener('change', function () {
        const profissao = this.value;
        if (dadosProfissoes[profissao]) {
            detalhesInput.value = dadosProfissoes[profissao].detalhes;
            atuacaoInput.value = dadosProfissoes[profissao].atuacao;
            salarioInput.value = dadosProfissoes[profissao].salario;
        } else {
            detalhesInput.value = '';
            atuacaoInput.value = '';
            salarioInput.value = '';
        }
    });
</script>

</body>

</html>
