<?php

require_once "View.php";

class ConteudoView extends View {

  public function exibirPaginas($paginas = NULL){
    if($paginas){
      foreach($paginas as $pagina){
          echo '<li class="list-group-item"><a href=#'.$pagina->nom_pagina.'>'.$pagina->nom_pagina.'</a></li>';
      }
    }
  }

  public function exibirPesquisa($dados = NULL){
    if($dados){
      foreach ($dados as $registro) {
          echo "Página: <a href=#'$registro->nom_pagina'> - ".$registro->txt_pagina."</a>.<br>";
      }
    } else {
      return '<form class="form-inline text-right" id="frmSearch" method="post" action="src/ConteudoController.php">
                <input type="search" id="search" name="search" results ="10" class="form-control" size="50" placeholder="O que procura?">
                <button class="btn btn-primary pull-right" type="submit" id="btnSearch" name="btnSearch"><span class="glyphicon glyphicon-search"></span></button>
             </form>';
    }
  }
}
