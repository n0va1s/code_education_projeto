<?php
namespace codeeduc\conteudo;
use codeeduc\conteudo\ConteudoDAO;

class ConteudoModel {

  private $seqConteudo;
  private $nomPagina;
  private $txtPagina;
  private $datInativo;

  private $dao;

  public function __construct(ConteudoDAO $dao){
    $this->dao = $dao;
  }

  public function setSeqConteudo($seqConteudo){
    $this->seqConteudo = $seqConteudo;
  }

  public function setNomPagina($nomPagina){
    $this->nomPagina = $nomPagina;
  }

  public function setTxtPagina($txtPagina){
    $this->txtPagina = $txtPagina;
  }

  public function setDatInativo($datInativo){
    $this->datInativo = $datInativo;
  }

  public function getSeqConteudo(){
    return $this->seqConteudo;
  }

  public function getNomPagina(){
    return $this->nomPagina;
  }

  public function getTxtPagina(){
    return $this->txtPagina;
  }

  public function getDatInativo(){
    return $this->datInativo;
  }

  public function gravar(ConteudoModel $model){
    if(!empty($model->getSeqConteudo())){
      $this->dao->alterar($model);
    } else {
       $this->dao->inserir($model);
    }
    return true;
  }

  public function listar(ConteudoModel $model){
    return $this->dao->listar($model);
  }

  public function listarPaginas(){
    return $this->dao->listarPaginas();
  }

  public function consultarPorSequencial(ConteudoModel $model){
    return $this->dao->consultarPorSequencial($model);
  }

  public function __destruct(){
    $this->dao = NULL;
  }
}
