<?php
session_start();
include_once 'controllers/UserController.php';
include_once 'Database.php';

$action = $_GET['action'] ?? '';

$controller = new UserController($pdo);

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
        header("Location: index.php?action=login");
        break;
    case 'perfil':
        if (isset($_COOKIE['user_id'])) {
            include 'views/perfil.php';
        } else {
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
        case 'senha':
            if (isset($_COOKIE['user_id'])) {
                $controller->trocarSenha($_POST['email'] ?? '', $_POST['senha'] ?? '');
                include 'views/senha.php';
            } else {
                header("Location: index.php?action=senha");
            }
            break;

    default:
        header("Location: index.php?action=login");
        break;
}

?>
