<?php
namespace codeeduc\inicio;
use codeeduc\Controller;

class InicioController extends Controller{

  public function __construct(){
    $this->view = new InicioView();
  }

  public function iniciar(){
    $this->view->render("inicio");
  }
}
