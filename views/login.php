<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto de vida </title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="main">
        <div class="titulo">
            <h1>Projeto</h1> <label> de vida </label>
        </div>
        <h3>Filipe Mendes</h3>
        <div class="login-container">
            <div class="login-box">
                <h1 class="login">Login</h1>
                <br>
                <br>
                <br>
                <form action="index.php?action=login" method="post">
                    <h6>E-mail</h6>
                    <input type="text" name="email" placeholder="Email " required>
                    <H5>Senha</H5>
                    <input type="password" name="senha" placeholder="Senha" required>
                    <button type="submit" class="login-btn">Entrar</button>
                </form>
                <p class="signup-text"><a href="index.php?action=senha">Esqueci minha senha</a></p>
            </div>
        </div>
        <div>
            <p class="signup-text" style="color: #FFF">Não tem uma conta? <a href="index.php?action=register">Cadastre-se agora mesmo</a></p>
        </div>
    </div>

    </div>
    </div>
</body>

</html>