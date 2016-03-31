<?php
if(isset($_SESSION['logado']) == 0){
?>
<div id="login" class="container-fluid">
  <form class="form-inline text-center" name="frmLogin" action="/src/UsuarioController.php" method="POST">
    <h3>Acesse a área restrita</h3>
    <input type="text" class="form-control" size="30" placeholder="Login" id="login" name="login" required>
    <input type="password" class="form-control" size="30" placeholder="Senha" id="senha" name="senha" required>
    <button type="submit" class="btn btn-danger">Entrar</button>
    <br /><br />
    <img src="../assets/img/google.png" class="img-thumbnail" width="200" height="200" alt="Utilize sua conta do Google para acessar"/>
    <img src="../assets/img/facebook.png" class="img-thumbnail" width="200" height="200" alt="Utilize sua conta do Facebook para acessar"/>
  </form>
</div>
<?php
} else {
?>
<div id="login" class="container-fluid">
<h3 class="text-center">Você já está logado</h3>
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-user logo-small"></span>
      <h4><a href="../assets/painel.php">Painel</a></h4>
      <p>Acesse o painel de administração</p>
    </div>
  </div>
</div>
<?php
}
?>