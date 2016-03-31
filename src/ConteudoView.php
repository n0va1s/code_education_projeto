<?php

require_once "View.php";

class ConteudoView extends View {

  public function exibirPaginas($paginas = NULL){
    if($paginas){
      foreach($paginas as $i => $nomPagina){
          echo '<li class="list-group-item"><a href=#'.$nomPagina.'>'.$nomPagina.'</a></li>';
      }
    }
  }

  public function exibirPesquisa($dados = NULL){
    if($dados){
      foreach ($dados as $registro) {
        foreach ($registro as $key => $value) {
          echo "Página: <a href=#'{$key}'> - ".$value."</a>.<br>";
        }
      }
    } else {
      return '<form class="form-inline text-right" id="frmSearch" method="post" action="src/ConteudoController.php">
                <input type="search" id="search" name="search" results ="10" class="form-control" size="50" placeholder="O que procura?">
                <button class="btn btn-primary pull-right" type="submit" id="btnSearch" name="btnSearch"><span class="glyphicon glyphicon-search"></span></button>
             </form>';
    }

  }
}
