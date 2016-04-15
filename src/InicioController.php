<?php

require_once "InicioView.php";

class InicioController extends Controller{

  public function __construct(){
    $this->view = new InicioView();
  }

  public function iniciar(){
    $this->view->render("inicio");
  }
}
