<?php

Class View
{

  private $dados;

  public function __construct(){

  }

  public function exibir($pagina = NULL){
    if(!empty($pagina)){
      require_once "./assets/$pagina.php";
    } else {
      require_once "./assets/default.php";
    }
  }

  public function encaminhar($pagina = NULL){
    if(!empty($pagina)){
      require_once "../assets/$pagina.php";
    } else {
      require_once "../assets/default.php";
    }
  }

  public function setDados($dados) {
    $this->dados = $dados;
  }

  public function __destruct(){
    $this->dados = NULL;
  }

}
