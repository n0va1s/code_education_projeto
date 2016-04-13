

<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__."/cabecalho.php" ?>
<?php require_once __DIR__."/menu.php" ?>

  <body>
    <div id="cliente" class="container-fluid">
      <h2 class="text-center">Conteúdo</h2>
      <ul class="list-inline">
        <?php
          require_once "../src/ConteudoController.php";
          $contr = new ConteudoController();
          $contr->listarPaginas();
        ?>
      </ul>
      <?php
        require_once "../src/ConteudoController.php";
        $contr = new ConteudoController();
        $contr->editar();
      ?>
    </div>
  </body>
  <?php require_once __DIR__."/rodape.php" ?>
</html>
