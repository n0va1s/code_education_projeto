<?php

class ConteudoView
{
  private $registros;

  public function setSearch($registros){
    $this->registros = isset($registros) ? $registros : NULL;
    $this->exibirPesquisa($registros);
  }

  public function exibirPesquisa($registros){
    if($registros){
      foreach ($registros as $registro) {
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

  public function __destruct(){
    $this->registros = NULL;
  }
}

$obj = new ConteudoView();
