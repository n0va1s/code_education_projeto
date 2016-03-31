<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__."/cabecalho.php" ?>

<body>
<div id="erro" class="container-fluid bg-grey">
  <h2 class="text-center">Ops!!!</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Atendimento 24 horas. Fale com a gente.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Brasília, DF</p>
      <p><span class="glyphicon glyphicon-phone"></span> (61) 8154-6988</p>
      <p><span class="glyphicon glyphicon-envelope"></span> mensagem@happyday.me</p>
    </div>
    <div class="alert alert-danger">
      <strong>Alguma coisa errada.</strong><br />A página procurada não existe. Tente novamente.<br /><br /><br />
    </div>
    <div class="thumbnail">
      <img src="./assets/img/erro.jpg" alt="Alguma coisa errada" width="300" height="100">
    </div>
  </div>
</div>
<?php require_once __DIR__."/rodape.php" ?>
</body>
</html>
