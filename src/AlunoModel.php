<?php

require_once "AlunoDAO.php";

class AlunoModel {

  private $seqAluno;
  private $nomAluno;
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

  public function getValNota(){
    return $this->valNota;
  }

  public function getDatInativo(){
    return $this->datInativo;
  }

  public function gravar(){
    // if(!empty($this->getSeqAluno())){
    //   //Alterar
    // } else {
    //   $this->dao->inserir($this);
    // }
    // return true;
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
