<?php

require_once "View.php";

class ClienteView extends View{

  public function exibirFormularioAlteracao($dados = NULL){

    $html = '<!DOCTYPE html>
              <html lang="en">

              <?php require_once __DIR__."/cabecalho.php" ?>
              <?php require_once __DIR__."/menu.php" ?>

                <body>
                  <div id="cliente" class="container-fluid text-center">
                    <h2 class="text-center">Cadastre-se</h2>
                    <form id="frmCadastro" method="post" action="../salvar">
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
                            <input class="form-control" size="12" id="telefone" name="telefone" placeholder="Celular" type="text" required value='.$dados->tel_cliente.'>
                          </div>
                          <div class="form-group">
                            <input class="form-control" id="sexo" name="sexo" placeholder="Genero" type="radio" required value='.$dados->ind_sexo.' $selected>
                            <input class="form-control" id="sexo" name="sexo" placeholder="Genero" type="radio" required value='.$dados->ind_sexo.' $selected>
                          </div>
                          <div class="form-group">
                            <select class="form-control" id="parentesco" name="parentesco">
                              <option value="" $selected>Parentesco</option>
                              <option value="P" $selected>Pai</option>
                              <option value="M" $selected>Mãe</option>
                              <option value="T" $selected>Tio(a)</option>
                              <option value="A" $selected>Avô(ó)</option>
                              <option value="I" $selected>Irmão(ã)</option>
                            </select>
                          </div>
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
                    <form id="frmCadastro" method="post" action="../salvar">
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
                            <input class="form-control" size="12" id="telefone" name="telefone" placeholder="Celular" type="text" required>
                          </div>
                          <div class="form-group">
                            <input class="form-control" id="genero" name="genero" type="radio" required value="M">
                            <input class="form-control" id="genero" name="genero" type="radio" required value="F">
                          </div>
                          <div class="form-group">
                            <select class="form-control" id="parentesco" name="parentesco">
                              <option value="">Parentesco</option>
                              <option value="P">Pai</option>
                              <option value="M">Mãe</option>
                              <option value="T">Tio(a)</option>
                              <option value="A">Avô(ó)</option>
                              <option value="I">Irmão(ã)</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <button class="btn btn-primary pull-right" type="submit">Cadastrar</button>
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
