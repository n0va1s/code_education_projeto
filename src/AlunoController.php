<?php

require_once "AlunoModel.php";
require_once "AlunoView.php";

class AlunoController{

  private $model;

  public function __construct(){
    $this->model = new AlunoModel();
    $this->view = new AlunoView();
  }

  public function listar(){
    $alunos = $this->model->listar();

    if(isset($alunos)){
      $this->view->exibirLista($alunos);
    } else {
      echo "Ops... nenhum aluno cadastrado";
    }
  }

  public function listarDestaques(){
    $destaques = $this->model->listarDestaques();
    if(isset($destaques)){
      $this->view->exibirDestaques($destaques);
    } else {
      echo "Ops... não foi possível encontrar os destaques";
    }
  }

  public function __destruct(){
    $this->model = NULL;
  }
}

$obj = new AlunoController();
