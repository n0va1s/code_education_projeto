<?php

class View
{
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

  public function setMensagem($mensagem) {
    echo $mensagem;
  }

}
