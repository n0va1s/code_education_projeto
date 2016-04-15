<?php

require_once "View.php";

class ConteudoView extends View{

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

  public function exibirFormularioAlteracao($dados = NULL){

      $html = '<!DOCTYPE html>
      <html lang="en">
        <?php
          require_once "../assets/cabecalho.php";
          require_once "../assets/menu.php";
        ?>
        <body>
          <div id="conteudo" class="container-fluid">
            <h2 class="text-center">Conteúdo</h2>
            <form id="frmConteudo" method="POST" action="../salvar">
              <div class="form-group">
                <label for="titulo">Página:</label>
                <input type="titulo" class="form-control" id="titulo" value="'.$dados->nom_pagina.'">
              </div>
              <div class="form-group">
                <label for="conteudo">Texto:</label>
                <textarea class="form-control" rows="10" id="conteudo">'.$dados->txt_pagina.'</textarea>
              </div>
              <div class="form-group">
                <input class="btn btn-primary pull-right" type="submit" id="btnSalvar" value="Salvar">
              </div>
              <input type="hidden" id="sequencial" value='.$dados->seq_conteudo.'>
            </form>
          </div>
        </body>
        <?php require_once "../assets/rodape.php" ?>
      </html>';

      echo $html;
  }

  public function exibirFormularioInclusao($dados = NULL){
    $opcoes = NULL;
    foreach ($dados as $pagina){
      $opcoes = '<li class="list-group-item"><a href=../conteudo/editar/'.$pagina->seq_conteudo.'>'.$pagina->nom_pagina.'</a></li>'.$opcoes;
    }

    $html = '<!DOCTYPE html>
     <html lang="en">
     <?php require_once "../assets/cabecalho.php"?>
     <?php require_once "../assets/menu.php"?>
        <body>
         <div id="conteudo" class="container-fluid">
           <h2 class="text-center">Conteúdo</h2>
           <ul class="list-inline">'.$opcoes.'</ul>
           <form id="frmConteudo" method="post" action="index.php">
             <div class="form-group">
               <label for="titulo">Página:</label>
               <input type="titulo" class="form-control" id="titulo">
             </div>
             <div class="form-group">
               <label for="conteudo">Texto:</label>
               <textarea class="form-control" rows="10" id="conteudo"></textarea>
             </div>
             <div class="form-group">
               <input class="btn btn-primary pull-right" type="submit" id="btnSalvar" value="Salvar">
             </div>
             <input type="hidden" id="sequencial">
           </form>
         </div>
       </body>
       <?php require_once "../assets/rodape.php" ?>
     </html>';

    echo $html;
  }

  public function exibirSucesso($mensagem = NULL){
    if(isset($mensagem)){
      echo $mensagem;
    } else {
      echo '<span>Conteúdo cadastrado com sucesso!</span>';
    }
  }

  public function exibirErro($mensagem = NULL){
    if($mensagem){
      echo $mensagem;
    } else {
      echo '<span>Erro no cadastro do conteúdo!</span>';
    }
  }
}
