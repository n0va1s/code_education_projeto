<?php
namespace codeeduc\aluno;
use codeeduc\View;

class AlunoView extends View {

  public function exibirLista($alunos = NULL){
    if($alunos){
      echo '<ul><b>Lista completa</b>';
      foreach($alunos as $aluno){
          echo '<li class="list-group-item"><a href=../aluno/alterar/'.$aluno->seq_aluno.'>'.$aluno->nom_aluno.'</a> - '.$aluno->val_nota.'<a href=../aluno/remover/'.$aluno->seq_aluno.'> - Excluir</a></li>';
      }
      echo '</ul>';
    }
  }

  public function exibirDestaques($destaques = NULL){
    if($destaques){
      echo '<ul><b>Alunos destaque</b>';
      foreach ($destaques as $aluno) {
          echo '<li class="list-group-item">'.$aluno->nom_aluno.' - '.$aluno->val_nota.'</li>';
      }
      echo '</ul>';
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
            <form id="frmConteudo" method="POST" action="../gravar">
              <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" value='.$dados['nom_aluno'].'>
              </div>
              <div class="form-group">
                <label for="modulo">Módulo:</label>
                <input type="text" class="form-control" name="modulo" value='.$dados['nom_modulo'].'>
              </div>
              <div class="form-group">
                <label for="nota">Nota:</label>
                <input type="text" class="form-control" name="nota" value='.$dados['val_nota'].'>
              </div>
              <div class="form-group">
                <input class="btn btn-primary pull-right" type="submit" name="btnSalvar" value="Salvar">
              </div>
              <input type="hidden" name="seq" value='.$dados['seq_aluno'].'>
            </form>
          </div>
        </body>
        <?php require_once "../assets/rodape.php" ?>
      </html>';

      echo $html;
  }

  public function exibirFormularioInclusao(){
    $html = '<!DOCTYPE html>
     <html lang="en">
     <?php require_once "../assets/cabecalho.php" ?>
     <?php require_once "../assets/menu.php" ?>
        <body>
         <div id="conteudo" class="container-fluid">
           <h2 class="text-center">Aluno</h2>
           <form id="frmConteudo" method="POST" action="../aluno/gravar">
             <div class="form-group">
               <label for="nome">Nome:</label>
               <input type="text" class="form-control" name="nome">
             </div>
             <div class="form-group">
               <label for="modulo">Módulo:</label>
               <input type="text" class="form-control" name="modulo">
             </div>
             <div class="form-group">
               <label for="nota">Nota:</label>
               <input type="text" class="form-control" name="nota">
             </div>
             <div class="form-group">
               <input class="btn btn-primary pull-right" type="submit" id="btnSalvar" value="Salvar">
             </div>
             <input type="hidden" id="seq">
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
      echo '<span>Operação realizada com sucesso!</span>';
    }
  }

  public function exibirErro($mensagem = NULL){
    if($mensagem){
      echo $mensagem;
    } else {
      echo '<span>Erro no cadastro do aluno!</span>';
    }
  }
}
