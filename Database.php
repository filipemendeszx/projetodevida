<?php
class Database
{
// Conexão com banco de dados
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "music";

    public $pdo;

    public function getConnection()
    {
        $this->pdo = null;

        try {
            $this->pdo = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->pdo->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
        }

        return $this->pdo;
    }
}

