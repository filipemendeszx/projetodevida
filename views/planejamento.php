<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto de Vida</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>

    <header class="header">
        <div class="title-group">
            <div class="title">Projeto <span class="highlight">de vida</span></div>
            <div class="subtitle">Filipe Mendes</div>
        </div>
        <nav class="botao">
            <a href="index.php?action=home">Início</a>
            <a href="index.php?action=sobre">Sobre mim &#9662;</a>
            <a href="index.php?action=perfil"><img src="Filipe.png" alt="Perfil" class="profile"></a>
            <a href="index.php?action=logout">sair</a>
        </nav>
    </header>

</body>

</html>
<br>
<br>
<main class="container">
    <h1 class="titulo">Planejamento de futuro </h1>

    <form>
        <section class="flex">
            <div class="bloco verde sessenta">
                <h2>Minhas aspirações</h2>
                <textarea name="sobre" rows="15"></textarea>
            </div>


            <div class="bloco laranja quarenta">
                <h2>Meus sonhos de infãncia</h2>
                <textarea name="valores" rows="10"></textarea>
            </div>




        </section>

        <section class="flex">
            <div class="bloco azul quarenta">
                <h2>Meus sonhos do momento</h2>
                <textarea name="lembrancas" rows="10"></textarea>
            </div>
            <div class="bloco azul sessenta">
                <h2>Meus principais objetivos</h2>
                <label>Curto prazo (1 ano):<input type="text" name="nome"></label>
                <label>Médio prazo (3 anos):<input type="email" name="email"></label>
                <label>Longo prazo (7 anos):<input type="email" name="email"></label>
                <label>Como você se vê em 10 anos:<input type="email" name="email"></label>

            </div>

        </section>


        <section class="flex">
            <div class="bloco laranja full cem">
                <h2>Planejamento</h2>
                <h3> <label>Pesquise uma profissão:<input type="text" name="gosto"></label></h3>
                <label>Detalhes:<input type="text" name="nao_gosto"></label>
                <label>Área de atuação:<input type="text" name="radio"></label>
                <label>Salário:<input type="text" name="internet"></label>

            </div>
        </section>

        <div class="limpar">
            <input type="reset" value="Limpar formulário">
        </div>
        <div class="enviar"> <button type="submit">Enviar</button>
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