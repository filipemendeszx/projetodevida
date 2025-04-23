<?php
include_once 'models/UserModel.php';

class UserController {
    private $Model;

    public function __construct($pdo) {
        $this->Model = new UserModel($pdo);
    }

    public function register($nome, $email, $senha) {
        if($this->Model->acharEmail($email)){
            return false;
        }
        if($this->Model->acharNome($nome)){
            return false;
        }
        
        $this->Model->cadastrar($nome,$email,$senha);
        return true;
    }

    public function login($email, $senha) {

        $user = $this->Model->login($email,$senha);
        if ($user){
            echo $_COOKIE['user_id'];
            setcookie('user_id', $user['id_user']);
            setcookie('user_name', $user['nome']);
            return true;
        }
        return;
    }

    public function trocarSenha($email, $senha) {
        $this->Model->trocarSenha($email, $senha);
    }
}
?>
