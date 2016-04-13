<?php

require_once "View.php";

class ConteudoView extends View {

  public function exibirMenu($dados = NULL){
    if($dados){
      foreach($dados as $pagina){
          echo '<li class="list-group-item"><a href=../index.php?modulo=conteudo&id='.$pagina->seq_conteudo.'>'.$pagina->nom_pagina.'</a></li>';
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

  public function exibirFormulario($dados = NULL){
    if($dados){
      return '<form id="frmConteudo" method="post" action="index.php">
        <div class="form-group">
          <label for="titulo">Página:</label>
          <input type="titulo" class="form-control" id="titulo" value='.$dados->tit_conteudo.'>
        </div>
        <div class="form-group">
          <label for="conteudo">Texto:</label>
          <textarea class="form-control" rows="10" id="conteudo">'.$dados->txt_conteudo.'</textarea>
        </div>
        <div class="form-group">
          <button class="btn btn-primary pull-right" type="submit">Salvar</button>
        </div>
        <input type="hidden" id="sequencial" value='.$dados->seq_conteudo.'>
      </form>';
    } else {
      return '<form id="frmConteudo" method="post" action="index.php">
        <div class="form-group">
          <label for="titulo">Página:</label>
          <input type="titulo" class="form-control" id="titulo">
        </div>
        <div class="form-group">
          <label for="conteudo">Texto:</label>
          <textarea class="form-control" rows="10" id="conteudo"></textarea>
        </div>
        <div class="form-group">
          <button class="btn btn-primary pull-right" type="submit">Salvar</button>
        </div>
        <input type="hidden" id="sequencial">
      </form>';
    }
  }

  public function exibirSucesso($mensagem = NULL){
    if($mensagem){
      echo $mensagem;
    } else {
      return '<span>Conteúdo cadastrados com sucesso!</span>';
    }
  }

  public function exibirErro($mensagem = NULL){
    if($mensagem){
      echo $mensagem;
    } else {
      return '<span>Erro no cadastro do conteúdo!</span>';
    }
  }
}
