<?php
require_once '../config/Database.php';
require_once '../controllers/UserController.php';
session_start();
// Verificar se o usuário está logado
if (!isset($_COOKIE['user_id'])) {
    header('Location: ../views/login.php');
    exit();
}

$user_id = $_COOKIE['user_id'];
$controller = new UserController();
$user = $controller->buscarPorId($user_id);



if (!$user) {
    echo "Usuário não encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="../style/estileira.css">
</head>
  
<header class="header">
    <div class="title-group">
        <div class="title">Projeto <span class="highlight">de vida</span></div>
        <div class="subtitle">Filipe Mendes</div>
    </div>
    <nav class="botao">
        <a href="../views/home.php">Início</a>
        <a href="../views/sobre.php">Sobre mim </a>
        <a href="logout.php">sair</a>
    </nav>
</header>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://malsup.github.io/jquery.form.min.js"></script>
    <style>
        body {
            background-color: #f4f4f4;
        }

        .perfil-container {
            display: flex;
            max-width: 960px;
            margin: 40px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .perfil-foto {
            width: 250px;
            background-color:#FCA311;
            color: white;
            text-align: center;
            padding: 30px 20px;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .perfil-foto img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            background-color: white;
        }

        .perfil-formulario {
            flex: 1;
            background-color:#583319;
            color: white;
            padding: 30px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .perfil-formulario label {
            font-weight: bold;
            margin-top: 15px;
            display: block;
        }

        .perfil-formulario input[type="text"],
        .perfil-formulario input[type="email"],
        .perfil-formulario input[type="date"],
        .perfil-formulario input[type="password"],
        .perfil-formulario textarea {
            width: 100%;
            background: white;
            color: black;
            border: none;
            padding: 8px;
            border-radius: 5px;
            margin-top: 5px;
        }

        .perfil-formulario textarea {
            height: 150px;
            resize: none;
        }

        .icone-editar {
            float: right;
            cursor: pointer;
            color: white;
        }
a:hover{
    text-decoration: none;
    color: #f4f4f4;
}
        .alert {
            margin-top: 10px;
            /* header */
            * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    background-color: #563218;
    color: #000000;
    overflow-x: hidden;
    font-family: 'Poppins', sans-serif;
}

body:has(.musicaslistar) {
    justify-content: flex-start;
}

.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}

.login-box {
    width: 400px;
    height: 500px;
    padding: 40px;
    background-color: #fff9f9;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
    text-align: center;
}

.login-box2 {
    width: 400px;
    height: 500px;
    padding: 40px;
    background-color: #fff9f9;
    height: 100%;
    margin: 30px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
    text-align: center;
}

h2 {
    font-size: 1.2em;

}

.login-box2 h1 {
    margin-bottom: 20px;
    font-size: 40px;
    text-decoration: underline 4px solid #ffc760;
}

form {
    display: flex;
    flex-direction: column;
}

input {
    background-color: #e9e3e3;
    border: none;
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 15px;
    font-size: 16px;
}




.login-btn {
    background-color: #85450A;
    border: none;
    padding: 15px;
    color: #FCBD43;
    font-size: 25px;
    font-weight: bold;
    cursor: pointer;
    margin-bottom: 20px;
    transition: background-color 0.3s;
    border-radius: 15px;
}







.login-box form h6,h5{
    font-size: 15px;
    text-align: left;
    
}


.main h1{
    font-size: 65px;
    color: white;
}

.login-box h1{
    color: #000000 !important;
    font-size: 45px;
}
.main label{
    font-size: 65px;
    color: #FBA727;
}

.main h3 {
    color: #FCBD43;
    font-size: 25px;
}

.main {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 15px;
    min-width: 100vw;
    min-height: 100vh;
    background-color: #563218;
}
.titulo{
    gap: 18px;
}
.login {
    color: black;
}


.signup-text a {
    list-style: none;
    text-decoration: none;
    color: #FBA727;
}
        }
    </style>

    <script>
        $(function () {
            $('#formulario').ajaxForm({
                dataType: 'json',
                success: function (retorno) {
                    if (retorno.sucesso) {
                        $('#mensagem').attr('class', 'alert alert-success').html(retorno.mensagem);
                        $('#fotoPerfil').attr('src', 'imagem.php?id=' + <?= $user_id ?> + '&nocache=' + new Date().getTime());
                    } else {
                        $('#mensagem').attr('class', 'alert alert-danger').html(retorno.mensagem);
                    }
                },
                error: function () {
                    $('#mensagem').attr('class', 'alert alert-danger').html('Erro ao enviar a imagem.');
                }
            });
        });
    </script>
</head>

<body>

<div class="perfil-container">
    <div class="perfil-foto">
        <form id="formulario" action="../ajax/salvar.php" method="post" enctype="multipart/form-data">
            <img id="fotoPerfil" src="imagem.php?id=<?= $user_id ?>" alt="Foto de Perfil">
            <br><br>
            <label for="foto">Inserir Foto</label>
            <input type="file" name="foto" class="form-control" />
            <button class="btn btn-primary btn-sm" style="margin-top:10px;" type="submit">Salvar Foto</button>
            <div id="mensagem"></div>
        </form>
    </div>

    <div class="perfil-formulario">
        <form action="salvar_perfil.php" method="POST">
            <label>Nome: <span class="glyphicon glyphicon-edit icone-editar"></span></label>
            <input type="text" name="nome" value="<?= htmlspecialchars($user['name'] ?? '') ?>">

            <label>Email: <span class="glyphicon glyphicon-edit icone-editar"></span></label>
            <input type="email" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>">

            <label>Data de Nascimento: <span class="glyphicon glyphicon-edit icone-editar"></span></label>
            <input type="date" name="data_nascimento" value="<?= htmlspecialchars($user['data_nascimento'] ?? '') ?>">

            <label>Senha: <span class="glyphicon glyphicon-edit icone-editar"></span></label>
            <input type="password" name="senha">

            <label style="margin-top:20px;">Sobre mim:</label>
            <textarea name="sobre_mim" placeholder="Escreva algo sobre você..."><?= htmlspecialchars($user['sobre'] ?? '') ?></textarea>

            <button class="btn btn-primary btn-sm" style="margin-top:10px;" type="submit">Salvar Alterações</button>
        </form>
    </div>
</div>
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
