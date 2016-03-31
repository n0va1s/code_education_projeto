<?php

require_once "UsuarioModel.php";
require_once "View.php";

class UsuarioController{

  private $model;

  public function __construct(){
    $this->model = new UsuarioModel();
    $this->view = new View();
  }

  public function logar(){
    $this->model->setSeqUsuario(isset($_POST["seq"]) ? $_POST["seq"] : "");
    $this->model->setNomUsuario(isset($_POST["login"]) ? $_POST["login"] : "");
    $this->model->setValSenha(isset($_POST["senha"]) ? $_POST["senha"] : "");
    
    if($this->model->autenticar($this->model)){
      $this->view->encaminhar("painel");
    }
  }

  public function __destruct(){
    $this->model = NULL;
  }
}

$obj = new UsuarioController();
$obj->logar();
