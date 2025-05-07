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

    // Simule o ID do usuário logado (use $_SESSION['user_id'] em produção)

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
                <h3><label>Pesquise uma profissão:<input type="text" name="profissao_desejada" value="<?= htmlspecialchars($dados['profissao_desejada'] ?? '') ?>"></label></h3>
                <label>Detalhes:<input type="text" name="detalhes_profissao" value="<?= htmlspecialchars($dados['detalhes_profissao'] ?? '') ?>"></label>
                <label>Área de atuação:<input type="text" name="area_atuacao" value="<?= htmlspecialchars($dados['area_atuacao'] ?? '') ?>"></label>
                <label>Salário:<input type="text" name="salario_estimado" value="<?= htmlspecialchars($dados['salario_estimado'] ?? '') ?>"></label>

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
</body>

</html>