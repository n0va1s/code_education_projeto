<?php
namespace codeeduc\cliente;

class ClienteModel implements IRelacionamento{

  private $seqCliente;
  private $nomCliente;
  private $emlCliente;
  private $tipCliente;
  private $NumDocumento;
  private $desEndereco;
  private $qtdEstrelas;
  private $enderecoCobranca;
  private $tipPessoa;

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

  public function setNumDocumento($numDocumento){
    $this->numDocumento = $numDocumento;
  }

  public function setDesEndereco($desEndereco){
    $this->desEndereco = $desEndereco;
  }

  public function setEnderecoCobranca($enderecoCobranca){
    $this->enderecoCobranca = $enderecoCobranca;
  }

  public function setTipCliente($tipCliente){
    $this->tipCliente = $tipCliente;
  }

  public function setTipPessoa($tipPessoa){
    $this->tipPessoa = $tipPessoa;
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

  public function getNumDocumento(){
    return $this->numDocumento;
  }

  public function getDesEndereco(){
    return $this->desEndereco;
  }

  public function getEnderecoCobranca(){
    return $this->enderecoCobranca;
  }

  public function getTipCliente(){
    return $this->tipCliente;
  }

  public function getTipPessoa(){
    return $this->tipPessoa;
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

  public function setClassificacao($qtdEstrelas){
    return $this->qtdEstrelas = $qtdEstrelas;
  }

  public function __destruct(){
    $this->dao = NULL;
  }
}
