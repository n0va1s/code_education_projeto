<?php

require_once "ClienteDAO.php";

class ClienteModel {

  private $seqCliente;
  private $nomCliente;
  private $emlCliente;
  private $tipParentesco;
  private $nomFilho;
  private $numIdade;

  private $dao;

  public function __construct(){
    $this->dao = new ClienteDAO();
  }

  public function setSeqCliente($seqCliente){
    $this->seqCliente = $seqCliente;
  }

  public function setNomCliente($nomCliente){
    $this->nomCliente = $nomCliente;
  }

  public function setEmlCliente($emlCliente){
    $this->emlCliente = $emlCliente;
  }

  public function setTipParentesco($tipParentesco){
    $this->tipParentesco = $tipParentesco;
  }

  public function setNomFilho($nomFilho){
    $this->nomFilho = $nomFilho;
  }

  public function setNumIdade($numIdade){
    $this->numIdade = $numIdade;
  }

  public function getSeqCliente(){
    return $this->seqCliente;
  }

  public function getNomCliente(){
    return $this->nomCliente;
  }

  public function getEmlCliente(){
    return $this->emlCliente;
  }

  public function getTipParentesco(){
    return $this->tipParentesco;
  }

  public function getNomFilho(){
    return $this->nomFilho;
  }

  public function getNumIdade(){
    return $this->numIdade;
  }

  public function gravar(){
    if(!empty($this->getSeqCliente())){
      //Alterar
    } else {
      $this->dao->inserir($this);
    }
    return true;
  }

  public function listar(){
    return $this->dao->listar();
  }

  public function __destruct(){
    $this->dao = NULL;
  }
}
