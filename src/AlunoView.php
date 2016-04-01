<?php

require_once "View.php";

class AlunoView extends View {

  public function exibirLista($alunos = NULL){
    if($alunos){
      foreach($alunos as $aluno){
          echo '<li class="list-group-item">'.$aluno->nom_aluno.' - '.$aluno->val_nota.'</li>';
      }
    }
  }

  public function exibirDestaques($destaques = NULL){
    if($destaques){
      foreach ($destaques as $aluno) {
          echo '<li class="list-group-item">'.$aluno->nom_aluno.' - '.$aluno->val_nota.'</li>';
      }
    }
  }
}
