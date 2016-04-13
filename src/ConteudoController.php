<?php

require_once "ConteudoModel.php";
require_once "ConteudoView.php";

class ConteudoController extends Controller{

  private $model;

  public function __construct(){
    $this->model = new ConteudoModel();
    $this->view = new ConteudoView();
  }

  public function index(){
    echo 'funcionou - conteudo - novo';
  }

  public function alteracao(){
    echo 'funcionou - conteudo - alteracao';
  }

  public function pesquisa(){
    echo 'funcionou - conteudo - pesquisa';
  }

  public function gravar($REQ){
    $this->model->setSeqConteudo(isset($REQ["sequencial"]) ? $REQ["sequencial"] : "");
    $this->model->setNomPagina(isset($REQ["titulo"]) ? $REQ["titulo"] : "");
    $this->model->setTxtPagina(isset($REQ["conteudo"]) ? $REQ["conteudo"] : "");

    if($this->model->gravar($this->model)){
      $this->view->exibirSucesso();
    } else {
      $this->view->exibirErro();
    }
  }

  public function editar($REQ){
    $this->model->setSeqConteudo(isset($REQ["id"]) ? $REQ["id"] : "");
    $dados = $this->model->consultarPorSequencial($this->model);
    $this->view->exibirFormulario($dados);
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
    $dados = $this->model->listarPaginas();
    if(isset($dados)){
      $this->view->exibirMenu($dados);
    } else {
      $this->view->exibirErro();
    }
  }

  public function __destruct(){
    $this->model = NULL;
  }
}
