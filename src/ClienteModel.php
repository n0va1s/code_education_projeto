<?php

require_once "ClienteDAO.php";

class ClienteModel {

  private $seqCliente;
  private $nomCliente;
  private $emlCliente;
  private $numCPF;
  private $desEndereco;

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

  public function setNumCPF($numCPF){
    $this->numCPF = $numCPF;
  }

  public function setDesEndereco($desEndereco){
    $this->desEndereco = $desEndereco;
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

  public function getNumCPF(){
    return $this->numCPF;
  }

  public function getDesEndereco(){
    return $this->desEndereco;
  }

  public function gravar(){
    if(!empty($this->getSeqCliente())){
      $this->dao->alterar($this);
    } else {
      $this->dao->inserir($this);
    }
    return true;
  }

  public function excluir(){
    $this->dao->excluir($this);
    return true;
  }

  public function listar($ordem = NULL){
    return $this->dao->listar($ordem);
  }

  public function __destruct(){
    $this->dao = NULL;
  }
}
