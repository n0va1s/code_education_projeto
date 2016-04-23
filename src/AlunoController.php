<?php

require_once "AlunoModel.php";
require_once "AlunoView.php";

class AlunoController extends Controller{

  private $model;
  private $view;

  public function __construct(){
    $this->model = new AlunoModel();
    $this->view = new AlunoView();
  }

  public function iniciar(){
    //if(isset($_SESSION['logado'])){
      //if($_SESSION['logado'] == 1){
        //Exibir o formulario de cadastro de aluno
        $this->view->exibirFormularioInclusao();
        //listar todos os alunos cadastrados
        $dados = $this->model->listar();
        $this->view->exibirLista($dados);
        //listar alunos destaques (3 maiores notas)
        $dados = $this->model->listarDestaques();
        $this->view->exibirDestaques($dados);
      //} else {
      //  $this->view->exibirNaoLogado();
      //}
    //}
  }

  public function alterar($id){
    $this->model->setSeqAluno($id);
    $dados = $this->model->consultar($this->model);
    $this->view->exibirFormularioAlteracao($dados);
  }

  public function gravar($dados){
    $this->model->setSeqAluno(isset($dados["seq"]) ? $dados["seq"] : "");
    $this->model->setNomAluno(isset($dados["nome"]) ? $dados["nome"] : "");
    $this->model->setNomModulo(isset($dados["modulo"]) ? $dados["modulo"] : "");
    $this->model->setValNota(isset($dados["nota"]) ? $dados["nota"] : "");

    $sucesso = $this->model->gravar($this->model);

    if($sucesso){
      $this->view->exibirSucesso();
    } else {
      $this->view->exibirErro();
    }
  }

  public function remover($id){
    $this->model->setSeqAluno($id);
    $sucesso = $this->model->remover($this->model);

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

  public function listarDestaques(){
    $dados = $this->model->listarDestaques();
    $this->view->exibirDestaques($dados);
  }

  public function __destruct(){
    $this->model = NULL;
    $this->view = NULL;
  }
}
