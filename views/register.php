<?php
session_start();
use UserController\UserController;
$error = '';
if (!empty($_POST)) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $controller = new UserController();
    if ($controller->register($nome, $email, $senha)) {
        header("Location: home.php");
    } else {
        $error = "Erro ao cadastrar usuário";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - ecp-saberes</title>
    <link rel="stylesheet" href="../style/estilo.css">
</head>
<body>
<div class="main">
<h1>Projeto <label> de vida </label></h1>
            <h3>Filipe Mendes</h3> </div>
                <br>
                <br>
                <br>
                <br>
                

                <h1>Informe seus dados </h1>
                <h4>complete as informações para prosseguir para o site</h4>
            <div class="linha"></div>
            <br><div class="linha"></div><br>
            <div class="login-container">
            <form action="index.php?action=register" method="post">
                <h5>Nome</h5>
                <input type="text" name="nome" placeholder="nome de usuario" required>
                <h5>E-mail</h5>
                <input type="text" name="email" placeholder="email" required>
                <h5>Senha</h5>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit" class="login-btn">Entrar</button>
                <?php
                    if(!empty($_POST)){
                        echo $error;
                    }
                ?>
                <p class="signup-text">ja tem uma conta? <a href="index.php?action=login">fazer login</a>.</p>
            </form>
            </div>
           
</body>
</html>