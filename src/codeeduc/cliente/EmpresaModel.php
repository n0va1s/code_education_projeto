<?php
namespace codeeduc\cliente;

class EmpresaModel implements IRelacionamento{

  //Optei por criar este atributo como uma constante
  //por ele nao mudar. E nao como getters e setters
  private $qtdEstrelas;
  private $numCNPJ;
  private $enderecoCobranca;
  private $tipPessoa;

  public function getEnderecoCobranca(){
    return $this->enderecoCobranca;
  }

  public function setEnderecoCobranca($enderecoCobranca){
    $this->enderecoCobranca = $enderecoCobranca;
  }

  //Implementacao do metodo da interface
  public function setClassificacao($qtdEstrelas){
    $this->qtdEstrelas = $qtdEstrelas;
  }

  public function setTipPessoa($tipPessoa){
    $this->tipPessoa = $tipPessoa;
  }

  public function getTipPessoa(){
    return $this->tipPessoa;
  }

  public function getNumCNPJ(){
    return $this->numCNPJ;
  }

  public function setNumCNPJ($numCNPJ){
    $this->numCNPJ = $numCNPJ;
    return $this;
  }
}
