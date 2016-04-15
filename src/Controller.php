<?php

Class Controller
{

  public function __construct(){}

  public function view($pagina){
    require_once "./assets/$pagina.php";
  }

  public function __destruct(){}
}
