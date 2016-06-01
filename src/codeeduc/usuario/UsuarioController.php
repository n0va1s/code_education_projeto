<?php
namespace codeeduc\usuario;
use codeeduc\Controller;
use codeeduc\View;
use codeeduc\usuario\UsuarioModel;

class UsuarioController extends Controller{

  private $model;

  public function __construct(View $view,UsuarioModel $model){
    $this->model = $model;
    $this->view = $view;
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
