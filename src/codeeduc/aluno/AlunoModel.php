<?php
namespace codeeduc\aluno;

class AlunoModel {

  private $seqAluno;
  private $nomAluno;
  private $nomModulo;
  private $valNota;
  private $datInativo;

  private $dao;

  public function __construct(){
    $this->dao = new AlunoDAO();
  }

  public function setSeqAluno($seqAluno){
    $this->seqAluno = $seqAluno;
  }

  public function setNomAluno($nomAluno){
    $this->nomAluno = $nomAluno;
  }

  public function setNomModulo($nomModulo){
    $this->nomModulo = $nomModulo;
  }

  public function setValNota($valNota){
    $this->valNota = $valNota;
  }

  public function setDatInativo($datInativo){
    $this->datInativo = $datInativo;
  }

  public function getSeqAluno(){
    return $this->seqAluno;
  }

  public function getNomAluno(){
    return $this->nomAluno;
  }

  public function getNomModulo(){
    return $this->nomModulo;
  }

  public function getValNota(){
    return $this->valNota;
  }

  public function getDatInativo(){
    return $this->datInativo;
  }

  public function gravar(AlunoModel $model){
    if(!empty($this->getSeqAluno())){
      $this->dao->alterar($model);
    } else {
      $this->dao->inserir($model);
    }
    return true;
  }

  public function remover(AlunoModel $model){
    return $this->dao->remover($model);
  }
  //Obtem os dados de um aluno especifico (id)
  public function consultar(AlunoModel $model){
    return $this->dao->consultar($model);
  }

  public function listar(){
    return $this->dao->listar();
  }

  public function listarDestaques(){
    return $this->dao->listarDestaques();
  }

  public function __destruct(){
    $this->dao = NULL;
  }
}
