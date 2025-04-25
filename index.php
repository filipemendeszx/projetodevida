<?php
session_start();
require_once 'controllers/UserController.php';
require_once 'Database.php';

$action = $_GET['action'] ?? '';

$controller = new UserController();

switch ($action) {
    case 'register':
        if (!empty($_POST)) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if ($controller->register($nome, $email, $senha)) {
                header("Location: index.php?action=login");
            } else {
                echo "Erro ao cadastrar usuário.";
            }
        } else {
            include 'views/register.php';
        }
        break;

    case 'login':

        if (!empty($_POST)) {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if ($controller->login($email, $senha)) {
                header("Location: index.php?action=home");
            } else {
                echo "Login ou senha inválidos.";
            }
        } else {
            include 'views/login.php';
        }
        break;

    case 'home':
        if (isset($_COOKIE['user_id'])) {
            include 'views/home.php';
        } else {
            header("Location: index.php?action=login");
        }
        break;

    case 'logout':
        session_destroy();
        unset($_COOKIE);
        header("Location: index.php?action=login");
        break;
    case 'sobre':
        if (isset($_COOKIE['user_id'])) {
            include 'views/sobre.php';
        } else {
            header("Location: index.php?action=home");
        }
        break;
    case 'quemsoueu':
        if (isset($_COOKIE['user_id'])) {
            include 'views/quemsoueu.php';
        } else {
            header("Location: index.php?action=home");
        }
        break;
    case 'projeto':
        if (isset($_COOKIE['user_id'])) {
            $controller->trocarSenha($_POST['email'] ?? '', $_POST['senha'] ?? '');
            include 'views/projeto.php';
        } else {
            header("Location: index.php?action=senha");
        }
        break;
    case 'metas':
        if (isset($_COOKIE['user_id'])) {
            $controller->trocarSenha($_POST['email'] ?? '', $_POST['senha'] ?? '');
            include 'views/metas.php';
        } else {
            header("Location: index.php?action=senha");
        }
        break;
    case 'senha':
        if (isset($_COOKIE['user_id'])) {
            $controller->trocarSenha($_POST['email'] ?? '', $_POST['senha'] ?? '');
            include 'views/senha.php';
        } else {
            header("Location: index.php?action=senha");
        }
        break;
    case 'planejamento':
        if (isset($_COOKIE['user_id'])) {
            include 'views/planejamento.php';
        } else {
            header("Location: index.php?action=home");
        }
        break;
    case 'perfil':
        if (isset($_COOKIE['user_id'])) {
            include 'view/perfil.php';
        } else {
            header("Location: index.php?action=home");
        }
        break;
    case 'salvar':
        if (isset($_COOKIE['user_id'])) {
            include 'ajax/salvar.php';
        } else {
            header("Location: index.php?action=home");
        }
        break;
            header("Location: index.php?action=perfil");
        }
        break;
    case 'sobre':
        if (isset($_COOKIE['user_id'])) {
            include 'views/sobre.php';
        } else {
            header("Location: index.php?action=home");
        }
        break;
    case 'quemsoueu':
        if (isset($_COOKIE['user_id'])) {
            include 'views/quemsoueu.php';
        } else {
            header("Location: index.php?action=home");
        }
        break;
    case 'projeto':
        if (isset($_COOKIE['user_id'])) {
            $controller->trocarSenha($_POST['email'] ?? '', $_POST['senha'] ?? '');
            include 'views/projeto.php';
        } else {
            header("Location: index.php?action=senha");
        }
        break;
    case 'metas':
        if (isset($_COOKIE['user_id'])) {
            $controller->trocarSenha($_POST['email'] ?? '', $_POST['senha'] ?? '');
            include 'views/metas.php';
        } else {
            header("Location: index.php?action=senha");
        }
        break;
    case 'senha':
        if (isset($_COOKIE['user_id'])) {
            $controller->trocarSenha($_POST['email'] ?? '', $_POST['senha'] ?? '');
            include 'views/senha.php';
        } else {
            header("Location: index.php?action=senha");
        }
        break;
    case 'salvarQuemSouEu':
        if (isset($_COOKIE['user_id'])) {
            $nome = $_GET['nome'];
            $nascimento = $_GET['nascimento'];
            $sobre = $_GET['sobre'];
            $lembrancas = $_GET['lembrancas'];
            $valores = $_GET['valores'];
            $aptidoes = $_GET['aptidoes'];
            $familia = $_GET['familia'];
            $amigos = $_GET['amigos'];
            $escola = $_GET['escola'];
            $sociedade = $_GET['sociedade'];
            $fisica = $_GET['fisica'];
            $intelectual = $_GET['intelectual'];
            $emocional = $_GET['emocional'];
            $vida_escolar = $_GET['vida_escolar'];
            $gosto = $_GET['gosto'];
            $nao_gosto = $_GET['nao_gosto'];
            $rotina = $_GET['rotina'];
            $lazer = $_GET['lazer'];
            $estudos = $_GET['estudos'];
            $id_user = $_COOKIE['user_id'];

            $controller->salvar($nome, $nascimento, $sobre, $lembrancas, $valores, $aptidoes, $familia, $amigos, $escola, $sociedade, $fisica, $intelectual, $emocional, $vida_escolar, $gosto, $nao_gosto, $rotina, $lazer, $estudos, $id_user);

            header("Location: index.php?action=home");
        } else {
            header("Location: index.php?action=login");
        }
        break;

    default:
        if (isset($_COOKIE['user_id'])) {
            header("Location: index.php?action=home");
        } else {
            header("Location: index.php?action=login");
        }
        break;
}
