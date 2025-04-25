<?php


class UserModel
{
    private $pdo;
    private $table_name = "user";

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    // Método para cadastrar um usuário
    public function cadastrar($nome, $email, $senha)
    {
        $query = "INSERT INTO " . $this->table_name . " (name, email, password_hash) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($query);

        // Sanitiza os dados e criptografa a senha
        $nome = htmlspecialchars(strip_tags($nome));
        $email = htmlspecialchars(strip_tags($email));
        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $stmt->execute([$nome, $email, $senha]);
    }

    public function trocarSenha($email, $senha)
    {
        $query = "UPDATE " . $this->table_name . " SET password_hash = ? WHERE email = ?";
        $stmt = $this->pdo->prepare($query);

        // Sanitiza os dados e criptografa a senha
        $email = htmlspecialchars(strip_tags($email));
        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $stmt->execute([$senha, $email]);
    }

    public function acharEmail($email)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function acharNome($nome)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE name = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$nome]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para login de um usuário
    public function login($email, $senha)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = ? OR name = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$email, $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $hash = $user['senha'] ?? $user['password_hash'] ?? null;
            if ($hash && password_verify($senha, $hash)) {
                return $user;
            }
        }

        return false;
    }

    public function salvar($nome, $nascimento, $sobre, $lembrancas, $valores, $aptidoes, $familia, $amigos, $escola, $sociedade, $fisica, $intelectual, $emocional, $vida_escolar, $gosto, $nao_gosto, $rotina, $lazer, $estudos, $id_user)
    {

        $aptidoes = json_encode($aptidoes);
        $query = "UPDATE " . $this->table_name . " 
        SET nome = ?, 
            nascimento = ?, 
            sobre = ?, 
            lembrancas = ?, 
            valores = ?, 
            aptidoes = ?, 
            familia = ?, 
            amigos = ?, 
            escola = ?, 
            sociedade = ?, 
            fisica = ?, 
            intelectual = ?, 
            emocional = ?, 
            vida_escolar = ?, 
            gosto = ?, 
            nao_gosto = ?, 
            rotina = ?, 
            lazer = ?, 
            estudos = ? 
        WHERE id_user = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$nome, $nascimento, $sobre, $lembrancas, $valores, $aptidoes, $familia, $amigos, $escola, $sociedade, $fisica, $intelectual, $emocional, $vida_escolar, $gosto, $nao_gosto, $rotina, $lazer, $estudos, $id_user]);
    }

    public function buscarPorId($user_id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
