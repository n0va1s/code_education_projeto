<?php

require_once "ClienteModel.php";
require_once "ClienteView.php";

class ClienteController extends Controller{

  private $model;
  private $view;

  public function __construct(){
    $this->model = new ClienteModel();
    $this->view = new ClienteView();
  }

  public function iniciar(){
    //if(isset($_SESSION['logado'])){
      //if($_SESSION['logado'] == 1){
        $this->view->exibirFormularioInclusao();
      //} else {
      //  $this->view->exibirNaoLogado();
      //}
    //}
  }

  public function gravar(){
    $this->model->setSeqCliente(isset($_POST["seq"]) ? $_POST["seq"] : "");
    $this->model->setNomCliente(isset($_POST["nome"]) ? $_POST["nome"] : "");
    $this->model->setEmlCliente(isset($_POST["email"]) ? $_POST["email"] : "");
    $this->model->setTipParentesco(isset($_POST["telefone"]) ? $_POST["telefone"] : "");
    $this->model->setNomFilho(isset($_POST["genero"]) ? $_POST["genero"] : "");
    $this->model->setNumIdade(isset($_POST["parentesco"]) ? $_POST["parentesco"] : "");
    $sucesso = $this->model->gravar($this->model);

    if($sucesso){
      $this->view->exibirSucesso();
    } else {
      $this->view->exibirErro();
    }
  }

  public function excluir(){
    $this->model->setSeqCliente(isset($_POST["seq"]) ? $_POST["seq"] : "");
    $sucesso = $this->model->excluir($this->model);

    if($sucesso){
      $this->view->exibirSucesso();
    } else {
      $this->view->exibirErro();
    }
  }

  public function listar(){
    $dados = $this->model->listar();
    $this->view->exibirLista($dados);
  }

  public function __destruct(){
    $this->model = NULL;
    $this->view = NULL;
  }
}
