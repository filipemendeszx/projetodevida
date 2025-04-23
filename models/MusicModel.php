<?php
class MusicModel {
    private $pdo;
    private $table_name = "artigos";

    public $id;
    public $nome;
    public $assunto;
    public $texto;


    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para criar uma musica
    public function inserirmusica($nome, $texto, $assunto,$id_user)
    {

        $sql = "INSERT INTO " . $this->table_name .  " (nome, texto, assunto, id_user) VALUES (?, ?, ?, ?) ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $texto, $assunto, $id_user]);
    }
    public function listarMusicas()
    {
        $sql = "SELECT * FROM " . $this->table_name;
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public function listarMusicasPorUserId($id_user)
    {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE id_user = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_user]);
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    public function deletarMusica($id_musica)
    {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id_musica = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_musica]);
    }

    public function atualizarMusica($id_musica,$nome,$texto,$assunto)
    {
        if($nome != ""){
            $sql = "UPDATE " . $this->table_name . " SET nome = ? WHERE id_musica = ? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nome,$id_musica]);
        }
    
        if($texto != ""){
            $sql = "UPDATE " . $this->table_name . " SET texto = ? WHERE id_musica = ? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$texto,$id_musica]);
        }
        
        if($assunto != ""){
            $sql = "UPDATE " . $this->table_name . " SET assunto = ? WHERE id_musica = ? ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$assunto,$id_musica]);
        }
    }
}
?>
