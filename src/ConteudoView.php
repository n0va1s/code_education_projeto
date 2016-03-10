<?php

class ConteudoView
{
  private $registros;

  public function setSearch($registros){
    $this->registros = isset($registros) ? $registros : NULL;
  }

  public function exibirPesquisa(){
    if(isset($this->registros)){
      foreach ($registros as $linha) {
        echo $linha->txt_pagina;
        echo "<br>Página: <a href=#'{$linha->nom_pagina}'>" . $linha->nom_pagina . "</a>.<br><br>";
      }
     return '<form class="form-inline text-right" id="frmSearch" method="post" action="src/ConteudoController.php">
                <input type="search" id="search" name="search" results="10" class="form-control" size="50" placeholder="O que procura?" value='.$registros.'>
                <button class="btn btn-primary pull-right" type="submit" id="btnSearch" name="btnSearch"><span class="glyphicon glyphicon-search"></span></button>
             </form>';
    } else {
      return '<form class="form-inline text-right" id="frmSearch" method="post" action="src/ConteudoController.php">
                <input type="search" id="search" name="search" results ="10" class="form-control" size="50" placeholder="O que procura?">
                <button class="btn btn-primary pull-right" type="submit" id="btnSearch" name="btnSearch"><span class="glyphicon glyphicon-search"></span></button>
             </form>';
    }

  }

  public function __destruct(){
    $this->registros = NULL;
  }
}

$obj = new ConteudoView();
