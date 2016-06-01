<?php
namespace codeeduc\inicio;
use codeeduc\Controller;
use codeeduc\View;

class InicioController extends Controller{

  public function __construct(View $view){
    $this->view = $view;
  }

  public function iniciar(){
    $this->view->render("inicio");
  }
}
