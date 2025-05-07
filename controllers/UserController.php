<?php


require_once '../models/UserModel.php';
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

        if($this->Model->acharNome($nome)){
            return false;
        }
        
        if ($this->Model->cadastrar($nome,$email,$senha)) {
            return true;
        }
    }

    public function login($email, $senha): bool
    {
        $user = $this->Model->login($email,$senha);
        if ($user){
            setcookie('user_id', $user['id'], time()+60*60*24*7, "/");
            setcookie('user_email', $user['email'], time()+60*60*24*7, "/");
            setcookie('user_name', $user['name'], time()+60*60*24*7, "/");
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

    public function salvarImagem($file, $user_id) {
        $this->Model->salvarImagem($file, $user_id);
    }

    public function buscarImagem($user_id) {
        $this->Model->buscarImagem($user_id);
    }

    public function buscarPlanejamentoFuturo($userId) {
        return $this->Model->buscarPlanejamentoFuturo($userId);
    }

    public function salvarPlanejamentoFuturo($dados) {
        return $this->Model->salvarPlanejamentoFuturo($dados);
    }

    public function getMelhoriasPessoais($userId) {
        return $this->Model->getMelhoriasPessoais($userId);
    }

    public function salvarMelhoriasPessoais($userId, $dados) {
        return $this->Model->salvarMelhoriasPessoais($userId, $dados);
    }
}
