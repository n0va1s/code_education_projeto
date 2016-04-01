

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
      <form id="frmConteudo" method="post" action="src/ConteudoController.php">
        <div class="form-group">
          <label for="pagina">Página:</label>
          <input type="pagina" class="form-control" id="pagina">
        </div>
        <div class="form-group">
          <label for="conteudo">Texto:</label>
          <textarea class="form-control" rows="10" id="conteudo"></textarea>
        </div>
        <div class="form-group">
          <button class="btn btn-primary pull-right" type="submit">Salvar</button>
        </div>
      </form>
    </div>
  </body>
  <?php require_once __DIR__."/rodape.php" ?>
</html>
