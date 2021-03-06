<?php
namespace codeeduc\cliente;
use codeeduc\Controller;
use codeeduc\cliente\ClienteModel;
use codeeduc\cliente\ClienteView;

class ClienteController extends Controller{

  private $model;
  private $view;

  public function __construct(ClienteView $view, ClienteModel $model){
    $this->model = $model;
    $this->view = $view;
  }

  public function iniciar($ordem = NULL){
    //if(isset($_SESSION['logado'])){
      //if($_SESSION['logado'] == 1){
        $this->view->exibirFormularioInclusao();
        $dados = $this->model->listar($ordem);
        $this->view->exibirClientes($dados);
      //} else {
      //  $this->view->exibirNaoLogado();
      //}
    //}
  }

  public function gravar(){
    $this->model->setSeqCliente(isset($_POST["seq"]) ? $_POST["seq"] : "");
    $this->model->setNomCliente(isset($_POST["nome"]) ? $_POST["nome"] : "");
    $this->model->setEmlCliente(isset($_POST["email"]) ? $_POST["email"] : "");
    $this->model->setNumDocumento(isset($_POST["documento"]) ? $_POST["documento"] : "");
    $this->model->setTipPessoa(isset($_POST["tipo"]) ? $_POST["tipo"] : "");
    $this->model->setDesEndereco(isset($_POST["endereco"]) ? $_POST["endereco"] : "");
    $this->model->setEnderecoCobranca(isset($_POST["enderecocobranca"]) ? $_POST["enderecocobranca"] : "");

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

  public function listar($ordem = NULL){
    $dados = $this->model->listar($ordem);
    $this->view->exibirClientes($dados);
  }

  public function __destruct(){
    $this->model = NULL;
    $this->view = NULL;
  }
}
