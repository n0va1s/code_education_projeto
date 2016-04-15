<?php

require_once "ConteudoModel.php";
require_once "ConteudoView.php";

class ConteudoController extends Controller{

  public function __construct(){
    $this->model = new ConteudoModel();
    $this->view = new ConteudoView();
  }

  public function iniciar(){
    $dados = $this->model->listarPaginas();
    $this->view->exibirFormularioInclusao($dados);
  }

  public function editar($dados){
    $this->model->setSeqConteudo($dados);
    $dados = $this->model->consultarPorSequencial($this->model);
    $this->view->exibirFormularioAlteracao($dados);
  }

  public function salvar($dados){
    $this->model->setSeqConteudo(isset($dados["sequencial"]) ? $dados["sequencial"] : "");
    $this->model->setNomPagina(isset($dados["titulo"]) ? $dados["titulo"] : "");
    $this->model->setTxtPagina(isset($dados["conteudo"]) ? $dados["conteudo"] : "");

    if($this->model->gravar($this->model)){
      $this->view->exibirSucesso();
    } else {
      $this->view->exibirErro();
    }
  }

  public function pesquisar($dados){
    $this->model->setNomPagina(isset($dados["search"]) ? $dados["search"] : "");
    $this->model->setTxtPagina(isset($dados["search"]) ? $dados["search"] : "");
    $conteudos = $this->model->listar($this->model);

    if(isset($conteudos)){
      $this->view->exibirPesquisa($conteudos);
    } else {
      echo "Ops... nenhum resultado compatível com a pesquisa";
    }
  }

  public function __destruct(){
    $this->model = NULL;
  }
}
