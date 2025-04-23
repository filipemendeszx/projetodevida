<?php
include_once 'models/MusicModel.php';

class MusicController {
    private $model;

    public function __construct($pdo) {
        $this->model = new musicModel($pdo);
    }
    public function listarMusicas() {
        return $this->model->listarMusicas();
    }
    public function listarMusicasPorUserId($id_user) {
        return $this->model->listarMusicasPorUserId($id_user);
    }
    public function inserirmusica($nome, $texto, $assunto,$id_user) {
        $this->model->inserirmusica($nome,$texto, $assunto, $id_user);
    }
    public function deletarMusica($id_musica) {
        $this->model->deletarMusica($id_musica);
    }
    public function atualizarMusica($id_musica,$nome,$texto, $assunto) {
        $this->model->atualizarMusica($id_musica,$nome,$texto, $assunto);
    }
}
?>
