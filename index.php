<?php
session_start();
require_once 'controllers/UserController.php';
require_once 'Database.php';

$userId = intval($_COOKIE['user_id']);

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
                echo "<script>alert('Login ou senha inválidos')</script>";
                echo "
                <script>
                    window.location.href = 'index.php?action=login';
                </script>
                ";
            }
        } else {
            include 'views/login.php';
        }
        break;

    case 'home':
        if (isset($userId)) {
            include 'views/home.php';
        } else {
            header("Location: index.php?action=login");
        }
        break;

    case 'logout':
        session_destroy();
        unset($_COOKIE['user_id']);
        unset($_COOKIE['user_nome']);
        unset($_COOKIE['user_email']);
        unset($_COOKIE['user_name']);
        header("Location: index.php?action=login");
        break;
    case 'sobre':
        if (isset($userId)) {
            include 'views/sobre.php';
        } else {
            header("Location: index.php?action=home");
        }
        break;
    case 'quemsoueu':
        if (isset($userId)) {
            include 'views/quemsoueu.php';
        } else {
            header("Location: index.php?action=home");
        }
        break;
    case 'projeto':
        if (isset($userId)) {
            $controller->trocarSenha($_POST['email'] ?? '', $_POST['senha'] ?? '');
            include 'views/projeto.php';
        } else {
            header("Location: index.php?action=senha");
        }
        break;
    case 'metas':
        if (isset($userId)) {
            $controller->trocarSenha($_POST['email'] ?? '', $_POST['senha'] ?? '');
            include 'views/metas.php';
        } else {
            header("Location: index.php?action=senha");
        }
        break;
    case 'senha':
        if (isset($userId)) {
            $controller->trocarSenha($_POST['email'] ?? '', $_POST['senha'] ?? '');
            include 'views/senha.php';
        } else {
            header("Location: index.php?action=senha");
        }
        break;
    case 'planejamento':
        if (isset($userId)) {
            include 'views/planejamento.php';
        } else {
            header("Location: index.php?action=home");
        }
        break;
    case 'perfil':
        if (isset($userId)) {
            include 'view/perfil.php';
        } else {
            header("Location: index.php?action=home");
        }
        break;
    case 'salvar':
        if (isset($userId)) {
            include 'ajax/salvar.php';
        } else {
            header("Location: index.php?action=home");
        }
        break;
    case 'salvarQuemSouEu':
        if (isset($userId)) {
            $nome = $_POST['nome'];
            $nascimento = $_POST['nascimento'];
            $sobre = $_POST['sobre'];
            $lembrancas = $_POST['lembrancas'];
            $valores = $_POST['valores'];
            $aptidoes = $_POST['aptidoes'];
            $familia = $_POST['familia'];
            $amigos = $_POST['amigos'];
            $escola = $_POST['escola'];
            $sociedade = $_POST['sociedade'];
            $fisica = $_POST['fisica'];
            $intelectual = $_POST['intelectual'];
            $emocional = $_POST['emocional'];
            $vida_escolar = $_POST['vida_escolar'];
            $gosto = $_POST['gosto'];
            $nao_gosto = $_POST['nao_gosto'];
            $rotina = $_POST['rotina'];
            $lazer = $_POST['lazer'];
            $estudos = $_POST['estudos'];

            $controller->salvar($nome, $nascimento, $sobre, $lembrancas, $valores, $aptidoes, $familia, $amigos, $escola, $sociedade, $fisica, $intelectual, $emocional, $vida_escolar, $gosto, $nao_gosto, $rotina, $lazer, $estudos, $userId);
            header("Location: index.php?action=home");
        } else {
            header("Location: index.php?action=login");
        }
        break;

    
    default:
        if (isset($userId)) {
            header("Location: index.php?action=home");
        } else {
            header("Location: index.php?action=login");
        }
        break;
}
