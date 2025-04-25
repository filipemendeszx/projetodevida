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
    <h1 class="titulo">Quem sou eu?</h1>

    <form>
        <section class="flex">
            <div class="bloco laranja quarenta">
                <h2>Dados Pessoais</h2>
                <label>Nome:<input type="text" name="nome"></label>
                <label>Email:<input type="email" name="email"></label>
                <label>Data de Nascimento:<input type="date" name="nascimento"></label>
            </div>

            <div class="bloco verde sessenta">
                <h2>Fale sobre você</h2>
                <textarea name="sobre" rows="15"></textarea>
            </div>

        </section>

        <section class="flex">
            <div class="bloco azul sessenta">
                <h2>Minhas Lembranças</h2>
                <textarea name="lembrancas" rows="10"></textarea>
            </div>

            <div class="bloco rosa quarenta">
                <h2>Meus Valores</h2>
                <textarea name="valores" rows="10"></textarea>
            </div>

        </section>

        <section class="flex">
            <div class="bloco roxo quarenta">
                <h2>Minhas Aptidões</h2>
                <label><input type="checkbox" name="aptidoes[]" value="Comunicação"> Comunicação</label>
                <label><input type="checkbox" name="aptidoes[]" value="Criatividade"> Criatividade</label>
                <label><input type="checkbox" name="aptidoes[]" value="Disciplina"> Disciplina</label>
                <label><input type="checkbox" name="aptidoes[]" value="Coordenação Motora"> Coordenação Motora</label>
                <label><input type="checkbox" name="aptidoes[]" value="Trabalho em Equipe"> Trabalho em Equipe</label>
            </div>

            <div class="bloco amarelo sessenta">
                <h2>Meus Relacionamentos</h2>
                <label>Família:<input type="text" name="familia"></label>
                <label>Amigos:<input type="text" name="amigos"></label>
                <label>Escola:<input type="text" name="escola"></label>
                <label>Sociedade:<input type="text" name="sociedade"></label>
            </div>
        </section>
        <section class="flex">
            <div class="bloco azul-claro sessenta">
                <h2>Minha Visão Sobre Mim</h2>
                <label>Física:<input type="text" name="fisica"></label>
                <label>Intelectual:<input type="text" name="intelectual"></label>
                <label>Emocional:<input type="text" name="emocional"></label>
            </div>

            <div class="bloco verde-claro quarenta">
                <h2>Minha Vida Escolar</h2>
                <textarea name="vida_escolar" rows="15"></textarea>
            </div>
        </section>
        <section class="flex">
            <div class="bloco laranja full cem">
                <h2>Meu Dia a Dia</h2>
                <label>O que gosto de fazer:<input type="text" name="gosto"></label>
                <label>O que não gosto:<input type="text" name="nao_gosto"></label>
                <label>Rotina:<input type="text" name="radio"></label>
                <label>Lazer:<input type="text" name="internet"></label>
                <label>Estudos:<input type="text" name="tv"></label>

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