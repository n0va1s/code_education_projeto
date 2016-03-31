<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__."/cabecalho.php" ?>
<?php require_once __DIR__."/menu.php" ?>

<body>
  <div id="painel" class="container-fluid text-center">
    <h3 class="text-center">Painel de Administração</h3>
      <div class="row">
        <div class="col-sm-4">
          <span class="glyphicon glyphicon-user logo-small"></span>
          <h4><a href="../assets/cliente.php">Cliente</a></h4>
          <p>Dados pessoais dos nossos clientes</p>
        </div>
        <div class="col-sm-4">
          <span class="glyphicon glyphicon-wrench logo-small"></span>
          <h4><a href="../assets/conteudo.php">Conteúdo</a></h4>
          <p>Atualizar os textos do site</p>
        </div>
        <div class="col-sm-4">
          <span class="glyphicon glyphicon-lock logo-small"></span>
          <h4>Modulo 3</h4>
          <p>...</p>
        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col-sm-4">
          <span class="glyphicon glyphicon-leaf logo-small"></span>
          <h4>Modulo 4</h4>
          <p>...</p>
        </div>
        <div class="col-sm-4">
          <span class="glyphicon glyphicon-certificate logo-small"></span>
          <h4>Modulo 5</h4>
          <p>...</p>
        </div>
        <div class="col-sm-4">
          <span class="glyphicon glyphicon-heart logo-small"></span>
          <h4>Modulo 6</h4>
          <p>...</p>
        </div>
      </div>
    </div>
    <?php require_once __DIR__."/rodape.php" ?>
  </body>
</html>
