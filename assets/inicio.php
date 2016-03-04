<!DOCTYPE html>
<html lang="en">

<?php require_once "/home/novais/public-html/code_education_projeto/assets/cabecalho.php" ?>

<body id="inicio" data-spy="scroll" data-target=".navbar" data-offset="60">

<?php require_once "/home/novais/public-html/code_education_projeto/assets/menu.php" ?>

<?php require_once "/home/novais/public-html/code_education_projeto/assets/empresa.php" ?>

<div id="produto" class="container-fluid text-center bg-grey">
  <h2>Produtos</h2><br>
  <h4>O que oferecemos</h4>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="/home/novais/public-html/code_education_projeto/assets/img/paris.jpg" alt="Paris" width="400" height="300">
        <p><strong>Acomodação</strong></p>
        <p>Conforto e segurança para o seu filhote em um lugar perto da sua casa ou do seu compromisso</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="/home/novais/public-html/code_education_projeto/assets/img/newyork.jpg" alt="New York" width="400" height="300">
        <p><strong>Recreação</strong></p>
        <p>Um dia diferente para o seu filho sair da rotina</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="/home/novais/public-html/code_education_projeto/assets/img/sanfran.jpg" alt="San Francisco" width="400" height="300">
        <p><strong>Home Care</strong></p>
        <p>Vamos até você</p>
      </div>
    </div>
  </div><br>

  <h2>O que nossos clientes falam</h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4>"Eles são ótimos. Estou bastantes satisfeita com o trabalho!"<br><span style="font-style:normal;">Fulana de Tal, Lago Norte, mãe da Isabel (6)</span></h4>
      </div>
      <div class="item">
        <h4>"As crianças adoraram!!!"<br><span style="font-style:normal;">Cicrano da Sival, Asa Norte, pai do Arthur (2)</span></h4>
      </div>
      <div class="item">
        <h4>"Achei uma excelente opção"<br><span style="font-style:normal;">Beltrano, Sobradinho, avô da Bruna (3)</span></h4>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<div id="servico" class="container-fluid text-center">
  <h2>Serviços</h2>
  <h4>O que oferecemos</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-off logo-small"></span>
      <h4>Praticidade</h4>
      <p>Estamos pertinho da sua casa ou do seu compromisso</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-heart logo-small"></span>
      <h4>Carinho</h4>
      <p>Por eles como se fossem os nossos</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-lock logo-small"></span>
      <h4>Segurança</h4>
      <p>Nas nossas instalações e brincadeiras</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-leaf logo-small"></span>
      <h4>Recreação</h4>
      <p>Não é só dormir, é viver!</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-certificate logo-small"></span>
      <h4>Compromisso</h4>
      <p>Com os seus horários e recomendações</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-wrench logo-small"></span>
      <h4 style="color:#303030;">Faça as contas</h4>
      <p>Uma ótima opção pra vc participar dos seus compromissos com tranquilidade</p>
    </div>
  </div>
</div>

<div id="preco" class="container-fluid">
  <div class="text-center">
    <h2>Preços</h2>
    <h4>Escolha a melhor opção para você</h4>
  </div>
  <div class="row slideanim">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Compromisso rápido</h1>
        </div>
        <div class="panel-body">
          <p><strong>1h</strong> 55,00</p>
          <p><strong>2h</strong> 90,00</p>
          <p><strong>4h</strong> 130,00</p>
          <p><strong>6h</strong> 200,00</p>
        </div>
        <div class="panel-footer">
          <button class="btn btn-lg">Mais informações</button>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Pernoite (22h as 7h)</h1>
        </div>
        <div class="panel-body">
          <p><strong>seg ou ter</strong> 250,00</p>
          <p><strong>qua ou qui</strong> 300,00</p>
          <p><strong>sex ou sáb</strong> 400,00</p>
          <p><strong>dom</strong> 300,00</p>
        </div>
        <div class="panel-footer">
          <button class="btn btn-lg">Mais informações</button>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Fidelidade</h1>
        </div>
        <div class="panel-body">
          <p><strong> > 10</strong> 5% de desconto</p>
          <p><strong> > 20</strong> 15% de desconto</p>
          <p><strong> > 30</strong> 25% de desconto</p>
          <p><strong> > 40 </strong> Valor fixo</p>
        </div>
        <div class="panel-footer">
          <button class="btn btn-lg">Mais informações</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once "/home/novais/public-html/code_education_projeto/assets/contato.php" ?>

<?php require_once "/home/novais/public-html/code_education_projeto/assets/cliente.php" ?>

<?php require_once "/home/novais/public-html/code_education_projeto/assets/rodape.php" ?>

</body>
</html>
