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
    $conteudos = $this->model->listar($this->model);

    if(isset($conteudos)){
      $this->view->exibirPesquisa($conteudos);
    } else {
      echo "Ops... nenhum resultado compatível com a pesquisa";
    }
  }

  public function listarPaginas(){
    $paginas = $this->model->listarPaginas();
    if(isset($paginas)){
      $this->view->exibirPaginas($paginas);
    } else {
      echo "Ops... nenhum pagina para apresentar";
    }
  }

  public function __destruct(){
    $this->model = NULL;
  }
}

$obj = new ConteudoController();
