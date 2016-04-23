<?php

Class View
{

  public function render($pagina) {
    require_once "./assets/".$pagina.".php";
  }

  
  public function exibirNaoLogado($mensagem = NULL){
    if(isset($mensagem)){
      echo $mensagem;
    } else {
      echo "Faça login para acessar esta funcionalidade";
    }
  }


  public function exibirSucesso($mensagem = NULL){
    if(isset($mensagem)){
      echo $mensagem;
    } else {
      echo '<span>Opa! Dados cadastrados.</span>';
    }
  }

  public function exibirErro($mensagem = NULL){
    if($mensagem){
      echo $mensagem;
    } else {
      echo '<span>Hum... alguma coisa errada. Por favor tente novamente.</span>';
    }
  }
}
