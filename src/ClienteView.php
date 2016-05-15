<?php

require_once "View.php";

class ClienteView extends View{

  public function exibirClientes($dados = NULL){
    if($dados){
      echo '<span>Ordem: <a href="/cliente/iniciar/asc">crescente</a> - <a href="/cliente/iniciar/desc">decrescente</a></span>';
      echo '<ul><b>Nossos clientes</b>';
      foreach ($dados as $cliente) {
          echo '<li class="list-group-item">'.$cliente->seq_cliente.' - '.$cliente->nom_cliente.' - '.$cliente->num_documento.' - '.$cliente->tip_pessoa.'</li>';
      }
      echo '</ul>';
    } else {
      echo '<span>Nenhum cliente cadastrado</span>';
    }
  }

  public function exibirFormularioAlteracao($dados = NULL){

    $html = '<!DOCTYPE html>
              <html lang="en">

              <?php require_once __DIR__."/cabecalho.php" ?>
              <?php require_once __DIR__."/menu.php" ?>

                <body>
                  <div id="cliente" class="container-fluid text-center">
                    <h2 class="text-center">Cadastre-se</h2>
                    <form id="frmCadastro" method="post" action="/cliente/gravar">
                      <div class="form-inline">
                        <div class="row">
                          <div class="form-group">
                            <input class="form-control" size="70" id="nome" name="nome" placeholder="Nome" type="text" required value='.$dados->nom_cliente.'>
                          </div>
                          <div class="form-group">
                            <input class="form-control" size="50" id="email" name="email" placeholder="Email" type="email" required value='.$dados->eml_cliente.'>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">
                            <input class="form-control" size="25" id="documento" name="documento" placeholder="Documento" type="text" required value='.$dados->num_documento.'>
                          </div>
                          <div class="form-group">
                            <input class="form-control" id="PF" name="tipo" type="radiobutton" value="F" checked="$checkedPF">
                            <input class="form-control" id="PJ" name="tipo" type="radiobutton" value="J" checked="$checkedPJ">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">
                            <input class="form-control" size="50" id="endereco" name="endereco" placeholder="Endereço" type="text" required value='.$dados->des_endereco.'>
                          </div>
                          <div class="form-group">
                            <input class="form-control" size="50" id="enderecocobranca" name="enderecocobranca" placeholder="Endereço de Cobrança" type="text" required value='.$dados->des_endereco_cobranca.'>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">
                            <button class="btn btn-primary pull-right" type="submit">Salvar</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </body>
                <?php require_once __DIR__."/rodape.php" ?>
              </html>';

      echo $html;
  }

  public function exibirFormularioInclusao(){

    $html = '<!DOCTYPE html>
              <html lang="en">

              <?php require_once __DIR__."/cabecalho.php" ?>
              <?php require_once __DIR__."/menu.php" ?>

                <body>
                  <div id="cliente" class="container-fluid text-center">
                    <h2 class="text-center">Cadastre-se</h2>
                    <form id="frmCadastro" method="post" action="/cliente/gravar">
                    <div class="form-inline">
                      <div class="row">
                        <div class="form-group">
                          <input class="form-control" size="70" id="nome" name="nome" placeholder="Nome" type="text" required>
                        </div>
                        <div class="form-group">
                          <input class="form-control" size="50" id="email" name="email" placeholder="Email" type="email" required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <input class="form-control" size="25" id="documento" name="documento" placeholder="Documento" type="text" required>
                        </div>
                        <div class="form-group">
                          <input class="form-control" id="PF" name="tipo" type="radio" value="F">PF
                          <input class="form-control" id="PJ" name="tipo" type="radio" value="J">PJ
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <input class="form-control" size="50" id="endereco" name="endereco" placeholder="Endereço" type="text" required>
                        </div>
                        <div class="form-group">
                          <input class="form-control" size="50" id="enderecocobranca" name="enderecocobranca" placeholder="Endereço de Cobrança" type="text" required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <button class="btn btn-primary pull-right" type="submit">Salvar</button>
                        </div>
                      </div>
                    </div>
                    </form>
                  </div>
                </body>
                <?php require_once __DIR__."/rodape.php" ?>
              </html>';

    echo $html;
  }
}
