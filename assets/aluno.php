<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__."/cabecalho.php" ?>
<?php require_once __DIR__."/menu.php" ?>

  <body>
    <div id="cliente" class="container-fluid">
      <h2 class="text-center">Alunos destaque:</h2>
      <ul class="list-group">
        <?php
          require_once "../src/AlunoController.php";
          $contr = new AlunoController();
          $contr->listarDestaques();
        ?>
      </ul>
      <br />
      <h2 class="text-center">Resultado Final:</h2>
      <ul class="list-group">
        <?php
          require_once "../src/AlunoController.php";
          $contr = new AlunoController();
          $contr->listar();
        ?>
      </ul>
    </div>
  </body>
  <?php require_once __DIR__."/rodape.php" ?>
</html>
