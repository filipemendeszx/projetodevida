<?php
include_once 'C:\Turma2\xampp\htdocs\projetodevida\models\UserModel.php';

class UserController
{
    private $Model;

    public function __construct() {
        $this->Model = new UserModel();
    }

    public function register($nome, $email, $senha): bool
    {
        if($this->Model->acharEmail($email)){
            return false;
        }
        if ($this->Model->acharNome($nome)) {
            return false;
        }

        $this->Model->cadastrar($nome, $email, $senha);
        return true;
    }

    public function login($email, $senha)
    {
        session_start();
        $user = $this->Model->login($email, $senha);
        if ($user) {
            setcookie('user_id', $user['id']);
            setcookie('user_name', $user['name']);
            setcookie('user_email', $user['email']);
            
            return true;
        } else {
            return false;
        }
    }

    public function salvar($nome, $nascimento, $sobre, $lembrancas, $valores, $aptidoes, $familia, $amigos, $escola, $sociedade, $fisica, $intelectual, $emocional, $vida_escolar, $gosto, $nao_gosto, $rotina, $lazer, $estudos, $id_user) {
        $this->Model->salvar($nome, $nascimento, $sobre, $lembrancas, $valores, $aptidoes, $familia, $amigos, $escola, $sociedade, $fisica, $intelectual, $emocional, $vida_escolar, $gosto, $nao_gosto, $rotina, $lazer, $estudos, $id_user);
    }

    public function trocarSenha($email, $senha)
    {
        $this->Model->trocarSenha($email, $senha);
    }

    public function buscarPorId($user_id) {
        return $this->Model->buscarPorId($user_id);
    }
}
