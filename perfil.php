<?php
require_once 'Database.php';
require_once 'controllers/MusicController.php';

$controller = new MusicController($pdo);

$musicas = $controller->listarMusicasPorUserId($_COOKIE['user_id']);


if(isset($_POST["operacao"])){
    if($_POST['operacao'] == 'criar'){
        $controller->inserirmusica( $_POST["nome"], $_POST["assunto"], $_POST["texto"],$_COOKIE['user_id']);
        header("Location: #");
    }
    if($_POST["operacao"] == 'delete'){
        $controller->deletarMusica($_POST['id_musica']);
        header("Location: #");
    }
    if($_POST["operacao"] == 'atualizar'){
        
        $controller->atualizarMusica($_POST['id_musica'],$_POST['nome'],$_POST["assunto"], $_POST["texto"]);
        header("Location: #");
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify - Página Inicial</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
  
<header>
        <div class="logo">
            <a href="index.php?action=home">
                <img src="img\image__1_-removebg-preview (2).png" alt="Ispotify" >
            </a>
        </div>
        <nav>
            <ul>
                <li> <img src="img\avatar (1).png" alt="" height="38" width="38"><a href="index.php?action=perfil"><H2>Minha conta</H2></a></li>
                <li> <img src="img\sair (1).png" alt="BOA TARDE DANADÃO" height="38" width="38"><a href="index.php?action=logout"><h2>LogOut</h2></a></li>
            </ul>    
        </nav>
    </header>
    <div class="login-container">   
        <div class="login-box2">
            <h1>Criar Artigo</h1>
    <form method="POST">
      <input  name="nome" placeholder="nome do artigo">
      <input  name="assunto" placeholder="assunto">
      <input  name="texto" placeholder="texto">
      <input name="operacao" type="hidden" value="criar">
      <button class="login-btn" type="submit">Criar artigo</button>
    </form> 
    <h1>deletar Artigo</h1>
    <form method="POST">
        <select name="id_musica">
            <?php
            foreach($musicas as $musica){
                echo"<option value='$musica[id_musica]'>$musica[nome]</option>";
            }?>
            
        </select>
        <input name="operacao" type="hidden" value="delete">
        <button class="login-btn" type="submit">deletar artigo</button>

    </form>
    <h1>Atualizar Artigo</h1>
    <form method="POST">
        <select name="id_musica">
            <?php
            foreach($musicas as $musica){
                echo"<option value='$musica[id_musica]'>$musica[nome]</option>";
            }?>
            
        </select>
        <input name="nome" placeholder="nome da música">
        <input name="assunto" placeholder="assunto">
        <input name="texto" placeholder="texto">
        <input name="operacao" type="hidden" value="atualizar">
        <button class="login-btn" type="submit">Atualizar artigo</button>

    </form> 
</div>
</div>

<div class="container2">
    <div class="container">
        <div class="left-section">
            <h1>"Investir em práticas sustentáveis <br>  é investir no futuro do planeta<br> e da humanidade."</h1>
        </div>
        <div class="right-section">
            <div class="cinza">
                <h1>
            <h2>Fale conosco</h2>
            <p>Eco saberes S/A</p>
            <p>CNPJ 12.345.678/0001-78</p>
            <p>Rua da Alegria, nº 1000</p>
            <p>Cidade Xique-Xique</p>
            <p>CEP 12345-678</p>
            <p>São Paulo - SP</p>
        </h1>
        </div>
            <div class="logo2">
                <img src="img\image.png" alt="Logo Eco Saberes" width="250" height="250">
            </div>
        </div>
    </div>
    </div>
</body>
</html>
