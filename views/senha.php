<?php
require_once '../controllers/UserController.php';
$controller = new UserController();

if (!empty($_POST)) {
    if (isset($_COOKIE)) {
        $controller->trocarSenha($_POST['email'] ?? '', $_POST['senha'] ?? '');
        header("Location: login.php");
    } else {
        header("Location: senha.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto de vida </title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="main">
        <div class="titulo">
            <h1>Projeto</h1> <label> de vida </label>
        </div>
        <h3>Filipe Mendes</h3>
        <div class="login-container">
            <div class="login-box">
                <h1 class="login">Redefinir Senha</h1>
                <br>
                <br>
                <br>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <h6>E-mail</h6>
                    <input type="text" name="email" placeholder="Email ou nome de usuário" required>
                    <H5>Nova Senha</H5>
                    <input type="password" name="senha" placeholder="Senha" required>
                    <button type="submit" class="login-btn">Enviar</button>
                    <a href="login.php" class="#">Voltar ao Login</button>
                </form>

            </div>
        </div>
        <div>

        </div>
    </div>

    </div>
    </div>
</body>

</html>