<?php

require_once "UsuarioDAO.php";

class UsuarioModel {

  private $seqUsuario;
  private $nomUsuario;
  private $valSenha;
  private $datInativo;
  
  private $dao;

  public function __construct(){
    $this->dao = new UsuarioDAO();
  }

  public function setSeqUsuario($seqUsuario){
    $this->seqUsuario = $seqUsuario;
  }

  public function setNomUsuario($nomUsuario){
    $this->nomUsuario = $nomUsuario;
  }

  public function setValSenha($valSenha){
    /*$options = [
      'salt' => '2015 foi um ano incrível. Muito samba e uma pessoa sensacional',
      'cost' => 10
    ];*/

    //$this->valSenha = password_hash($valSenha., PASSWORD_DEFAULT, $options);
    $this->valSenha = password_hash($valSenha, PASSWORD_DEFAULT);
  }

  public function setDatInativo($datInativo){
    $this->datInativo = $datInativo;
  }

  public function getSeqUsuario(){
    return $this->seqUsuario;
  }

  public function getNomUsuario(){
    return $this->nomUsuario;
  }

  public function getValSenha(){
    //echo password_get_info($this->valSenha); //para saber o algoritmo usado para a geracao da senha
    return $this->valSenha;
  }

  public function getDatInativo(){
    return $this->datInativo;
  }

  public function autenticar($model){
    if(!isset($_SESSION['logado']) or isset($_SESSION['logado']) == 0){

        $sucesso = $this->dao->validarCredenciais($model);
   
      if($sucesso){
        echo "Login realizado com sucesso";
        $_SESSION['logado'] = 1;
        return true;
      } else {
        echo "Ops... usuario ou senha invalidos. Tente novamente.";
        $_SESSION['logado'] = 0;
        return false;
      }
    }
  }

  public function autorizar($model){

    //$modulos = $this->dao->consultarFuncionalidades($model);
    return "cliente"; 
    
  }

  public function listar(){
    return $this->dao->listar();
  }

  public function __destruct(){
    $this->dao = NULL;
  }
}
