<?php

require_once "ConteudoModel.php";
require_once "ConteudoView.php";

class ConteudoController{

  private $model;

  public function __construct(){
    $this->model = new ConteudoModel();
    $this->view = new ConteudoView();
  }

  public function pesquisar(){
    $this->model->setNomPagina(isset($_POST["search"]) ? $_POST["search"] : "");
    $this->model->setTxtPagina(isset($_POST["search"]) ? $_POST["search"] : "");
    $registros = $this->model->listar($this->model);

    if(isset($registros)){
      $this->view->setSearch($registros);
    } else {
      echo "Ops... nenhum resultado compatível com a pesquisa";
    }
  }

  public function __destruct(){
    $this->model = NULL;
  }
}

$obj = new ConteudoController();
$obj->pesquisar();
