<?php
session_start();

require_once '../config/Database.php';
require_once('../controllers/UserController.php');

if (!isset($_GET['id'])) {
    exit('ID do usuário não fornecido.');
}

$user_id = intval($_GET['id']);
$controller = new UserController();
$controller->buscarImagem($user_id);
