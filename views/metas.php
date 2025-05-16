<?php

require_once '../controllers/UserController.php';
session_start();

$controller = new UserController();
$userId = $_COOKIE['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->salvarMelhoriasPessoais($userId, $_POST);
}
$melhorias = [];

if ($userId) {
    // Buscar os dados no banco
    $melhorias = $controller->getMelhoriasPessoais($userId);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Tomando Decisões</title>
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
<br>
<br>
<br>
<h1>Tomando Decisões e Estabelecendo<br>Metas</h1>

<form id="form" method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <div class="container">
        <!-- Repetição de cartões -->
        <div class="card">
            <h2>Relacionamento Familiar</h2>
            <div class="label">Como irei fazer para melhorar</div>
            <textarea name="rel_fam_melhoria"><?= $melhorias['rel_fam_melhoria'] ?? '' ?></textarea>
            <div class="label">Prazo para essa ação</div>
            <textarea name="rel_fam_prazo"><?= $melhorias['rel_fam_prazo'] ?? '' ?></textarea>
        </div>

        <div class="card">
            <h2>Estudos</h2>
            <div class="label">Como irei fazer para melhorar</div>
            <textarea name="estudos_melhoria"><?= $melhorias['estudos_melhoria'] ?? '' ?></textarea>
            <div class="label">Prazo para essa ação</div>
            <textarea name="estudos_prazo"><?= $melhorias['estudos_prazo'] ?? '' ?></textarea>
        </div>

        <div class="card">
            <h2>Saúde</h2>
            <div class="label">Como irei fazer para melhorar</div>
            <textarea name="saude_melhoria"><?= $melhorias['saude_melhoria'] ?? '' ?></textarea>
            <div class="label">Prazo para essa ação</div>
            <textarea name="saude_prazo"><?= $melhorias['saude_prazo'] ?? '' ?></textarea>
        </div>

        <div class="card">
            <h2>Futura Profissão</h2>
            <div class="label">Como irei fazer para melhorar</div>
            <textarea name="profissao_melhoria"><?= $melhorias['profissao_melhoria'] ?? '' ?></textarea>
            <div class="label">Prazo para essa ação</div>
            <textarea name="profissao_prazo"><?= $melhorias['profissao_prazo'] ?? '' ?></textarea>
        </div>

        <div class="card">
            <h2>Amigos</h2>
            <div class="label">Como irei fazer para melhorar</div>
            <textarea name="amigos_melhoria"><?= $melhorias['amigos_melhoria'] ?? '' ?></textarea>
            <div class="label">Prazo para essa ação</div>
            <textarea name="amigos_prazo"><?= $melhorias['amigos_prazo'] ?? '' ?></textarea>
        </div>

        <div class="card">
            <h2>Comunidade</h2>
            <div class="label">Como irei fazer para melhorar</div>
            <textarea name="comunidade_melhoria"><?= $melhorias['comunidade_melhoria'] ?? '' ?></textarea>
            <div class="label">Prazo para essa ação</div>
            <textarea name="comunidade_prazo"><?= $melhorias['comunidade_prazo'] ?? '' ?></textarea>
        </div>

        <div class="card">
            <h2>Tempo Livre</h2>
            <div class="label">Como irei fazer para melhorar</div>
            <textarea name="tempo_melhoria"><?= $melhorias['tempo_melhoria'] ?? '' ?></textarea>
            <div class="label">Prazo para essa ação</div>
            <textarea name="tempo_prazo"><?= $melhorias['tempo_prazo'] ?? '' ?></textarea>
        </div>

        <div class="card">
            <h2>Religião</h2>
            <div class="label">Como irei fazer para melhorar</div>
            <textarea name="religiao_melhoria"><?= $melhorias['religiao_melhoria'] ?? '' ?></textarea>
            <div class="label">Prazo para essa ação</div>
            <textarea name="religiao_prazo"><?= $melhorias['religiao_prazo'] ?? '' ?></textarea>
        </div>

        <div class="card">
            <h2>Namorada(o)</h2>
            <div class="label">Como irei fazer para melhorar</div>
            <textarea name="namorado_melhoria"><?= $melhorias['namorado_melhoria'] ?? '' ?></textarea>
            <div class="label">Prazo para essa ação</div>
            <textarea name="namorado_prazo"><?= $melhorias['namorado_prazo'] ?? '' ?></textarea>
        </div>
    </div>

    <div class="buttons">
        <button type="submit">Enviar</button>
        <button type="reset">Limpar</button>
    </div>
</form>

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
