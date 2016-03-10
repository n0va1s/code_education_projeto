<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__."/cabecalho.php" ?>

<body id="inicio" data-spy="scroll" data-target=".navbar" data-offset="60">

<?php require_once __DIR__."/menu.php" ?>

<?php require_once __DIR__."/empresa.php" ?>

<div id="contato" class="container-fluid bg-grey">
  <h2 class="text-center">Confira sua mensagem</h2>
    <form id="frmConfirmar" method="post" action="obrigado.php">
      <div class="row">
        <div class="col-sm-5">
          <p>Atendimento 24 horas. Fale com a gente.</p>
          <p><span class="glyphicon glyphicon-map-marker"></span> Brasília, DF</p>
          <p><span class="glyphicon glyphicon-phone"></span> (61) 8154-6988</p>
          <p><span class="glyphicon glyphicon-envelope"></span> mensagem@happyday.me</p>
        </div>
        <div class="col-sm-7 slideanim">
          <div class="row">
            <div class="col-sm-6 form-group">
              <input class="form-control" id="name" name="name" value="<?php echo $_POST["name"]?>" type="text" disabled>
            </div>
            <div class="col-sm-6 form-group">
              <input class="form-control" id="email" name="email" value="<?php echo $_POST["email"]?>" type="email" disabled>
            </div>
          </div>
          <input class="form-control" id="subject" name="subject" value="<?php echo $_POST["subject"]?>" type="text" disabled><br />
          <textarea class="form-control" id="comments" name="comments" rows="5" disabled><?php echo $_POST["comments"]?></textarea><br>
          <div class="row">
            <div class="col-sm-12 form-group">
              <button class="btn btn-default pull-right" type="submit">Enviar</button>
            </div>
          </div>
        </div>
      </div>
    </form>
</div>

<?php require_once __DIR__."/rodape.php" ?>

</body>
</html>
