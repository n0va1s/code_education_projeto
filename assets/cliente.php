<div id="cliente" class="container-fluid bg-grey">
  <h2 class="text-center">Cadastre-se</h2>
    <form id="frmCadastro" method="post" action="src/ClienteController.php">
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
              <select class="form-control" id="parentesco" name="parentesco">
                <option value="">Parentesco</option>
                <option value="P">Pai</option>
                <option value="M">Mãe</option>
                <option value="T">Tio(a)</option>
                <option value="A">Avô(ó)</option>
              </select>
          </div>
          <div class="form-group">
            <input class="form-control" size="80" id="filho" name="filho" placeholder="De quem?" type="text" required>
          </div>
          <div class="form-group">
            <input class="form-control" size="10" id="idade" name="idade" placeholder="Idade" type="text" required>
          </div>
          <div class="form-group">
            <button class="btn btn-primary pull-right" type="submit">Cadastrar</button>
          </div>
        </div>
      </div>
    </form>
</div>
