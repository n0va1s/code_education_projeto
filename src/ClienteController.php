<?php

require_once "ClienteModel.php";
require_once "View.php";

class ClienteController{

  private $model;

  public function __construct(){
    $this->model = new ClienteModel();
    $this->view = new View();
  }

  public function gravar(){
    $this->model->setSeqCliente(isset($_POST["seq"]) ? $_POST["seq"] : "");
    $this->model->setNomCliente(isset($_POST["nome"]) ? $_POST["nome"] : "");
    $this->model->setEmlCliente(isset($_POST["email"]) ? $_POST["email"] : "");
    $this->model->setTipParentesco(isset($_POST["parentesco"]) ? $_POST["parentesco"] : "");
    $this->model->setNomFilho(isset($_POST["filho"]) ? $_POST["filho"] : "");
    $this->model->setNumIdade(isset($_POST["idade"]) ? $_POST["idade"] : "");
    $sucesso = $this->model->gravar($this->model);

    if($sucesso){
      echo "Obrigado por se cadastrar";
      $this->view->encaminhar("inicio");
    } else {
      echo "Ops... não foi possível concluir o cadastro. Tente novamente.";
    }
  }

  public function __destruct(){
    $this->model = NULL;
  }
}

$obj = new ClienteController();
$obj->gravar();
