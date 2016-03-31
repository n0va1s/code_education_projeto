<?php
if(isset($_SESSION['logado'])){
  unset($_SESSION['logado']);	
}
if(!empty(session_id())){
  session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__."/cabecalho.php" ?>
<?php require_once __DIR__."/menu.php" ?>

<body>
<div id="erro" class="container-fluid bg-grey">
  <h2 class="text-center">Até breve</h2>
  <div class="row">
    <div class="thumbnail">
      <img src="./img/xxx.jpg" alt="Volte logo" width="300" height="100">
    </div>
  </div>
</div>
<?php require_once __DIR__."/rodape.php" ?>
</body>
</html>
