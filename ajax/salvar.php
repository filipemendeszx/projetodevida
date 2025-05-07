<?php
require_once('../config/Database.php');
require_once('../controllers/UserController.php');
session_start();


if (!isset($_COOKIE['user_id'])) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Usuário não logado']);
    exit();
}

$user_id = $_COOKIE['user_id'];

$controller = new UserController();
$controller->salvarImagem($_FILES['foto'], $user_id);

header("Location: ../view/perfil.php");;