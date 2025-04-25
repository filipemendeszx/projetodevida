<?php
require_once '../controllers/UserController.php';
require_once '../Database.php';
$controller = new UserController();
$user = $controller->buscarPorId($_COOKIE['user_id']);
$aptidoes = json_decode($user['aptidoes']);
$aptidoes = (array) $aptidoes;
?>

<pre>
</pre>

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
        <a href="#">Início</a>
        <a href="../index.php?action=sobre">Sobre mim &#9662;</a>
        <a href="../index.php?action=perfil"><img src="Filipe.png" alt="Perfil" class="profile"></a>
        <a href="../index.php?action=logout">sair</a>
    </nav>
</header>

</body>
</html>
<br>
<br>
<main class="container">
    <h1 class="titulo">Quem sou eu?</h1>

    <form action="../index.php" method="get">
        <section class="flex">
            <div class="bloco laranja quarenta">
                <h2>Dados Pessoais</h2>
                <input type="hidden" name="action" value="salvar">
                <label>Nome:<input type="text" name="nome" value="<?= $user['nome'] ?>"></label>
                <label>Email:<input type="email" name="email" value="<?= $user['email'] ?>" disabled></label>
                <label>Data de Nascimento:<input type="date" name="nascimento"
                                                 value="<?= $user['nascimento'] ?>"></label>
            </div>

            <div class="bloco verde sessenta">
                <h2>Fale sobre você</h2>
                <textarea name="sobre" rows="15" value="<?= $user['sobre'] ?>"></textarea>
            </div>

        </section>

        <section class="flex">
            <div class="bloco azul sessenta">
                <h2>Minhas Lembranças</h2>
                <textarea name="lembrancas" rows="10" value="<?= $user['lembrancas'] ?>"></textarea>
            </div>

            <div class="bloco rosa quarenta">
                <h2>Meus Valores</h2>
                <textarea name="valores" rows="10" value="<?= $user['valores'] ?>"></textarea>
            </div>

        </section>

        <section class="flex">
            <div class="bloco roxo quarenta">
                <h2>Minhas Aptidões</h2>
                <label><input type="checkbox" name="aptidoes[0]" value="Comunicação" <?php if (in_array('Comunicação', $aptidoes) != false) { echo 'checked'; } ?> >Comunicação</label>
                <label><input type="checkbox" name="aptidoes[1]" value="Criatividade" <?php if (in_array('Criatividade', $aptidoes) != false) { echo 'checked'; } ?>> Criatividade</label>
                <label><input type="checkbox" name="aptidoes[2]" value="Disciplina" <?php if (in_array('Disciplina', $aptidoes) != false) { echo 'checked'; } ?>> Disciplina</label>
                <label><input type="checkbox" name="aptidoes[3]" value="Coordenação Motora" <?php if (in_array('Coordenação Motora', $aptidoes) != false) { echo 'checked'; } ?> > Coordenação Motora</label>
                <label><input type="checkbox" name="aptidoes[4]" value="Trabalho em Equipe" <?php if (in_array('Trabalho em Equipe', $aptidoes) != false) { echo 'checked'; } ?>> Trabalho em Equipe</label>
            </div>

            <div class="bloco amarelo sessenta">
                <h2>Meus Relacionamentos</h2>
                <label>Família:<input type="text" name="familia" value="<?= $user['familia'] ?>"></label>
                <label>Amigos:<input type="text" name="amigos" value="<?= $user['amigos'] ?>"></label>
                <label>Escola:<input type="text" name="escola" value="<?= $user['escola'] ?>"></label>
                <label>Sociedade:<input type="text" name="sociedade" value="<?= $user['sociedade'] ?>"></label>
            </div>
        </section>
        <section class="flex">
            <div class="bloco azul-claro sessenta">
                <h2>Minha Visão Sobre Mim</h2>
                <label>Física:<input type="text" name="fisica" value="<?= $user['fisica'] ?>"></label>
                <label>Intelectual:<input type="text" name="intelectual" value="<?= $user['intelectual'] ?>"></label>
                <label>Emocional:<input type="text" name="emocional" value="<?= $user['emocional'] ?>"></label>
            </div>

            <div class="bloco verde-claro quarenta">
                <h2>Minha Vida Escolar</h2>
                <textarea name="vida_escolar" rows="15" value="<?= $user['vida_escolar'] ?>"></textarea>
            </div>
        </section>
        <section class="flex">
            <div class="bloco laranja full cem">
                <h2>Meu Dia a Dia</h2>
                <label>O que gosto de fazer:<input type="text" name="gosto" value="<?= $user['gosto'] ?>"></label>
                <label>O que não gosto:<input type="text" name="nao_gosto" value="<?= $user['nao_gosto'] ?>"></label>
                <label>Rotina:<input type="text" name="rotina" value="<?= $user['rotina'] ?>"></label>
                <label>Lazer:<input type="text" name="lazer" value="<?= $user['lazer'] ?>"></label>
                <label>Estudos:<input type="text" name="estudos" value="<?= $user['estudos'] ?>"></label>

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
