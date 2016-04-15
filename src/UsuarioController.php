<?php

require_once "UsuarioModel.php";
require_once "UsuarioView.php";

class UsuarioController extends Controller{

  private $model;

  public function __construct(){
    $this->model = new UsuarioModel();
    $this->view = new UsuarioView();
  }

  public function logar(){
    $this->model->setSeqUsuario(isset($_POST["seq"]) ? $_POST["seq"] : "");
    $this->model->setNomUsuario(isset($_POST["login"]) ? $_POST["login"] : "");
    $this->model->setValSenha(isset($_POST["senha"]) ? $_POST["senha"] : "");

    if($this->model->autenticar($this->model)){
      $this->view->render("painel");
    }
  }

  public function __destruct(){
    $this->model = NULL;
  }
}
