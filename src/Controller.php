<?php

Class Controller
{

  public function __construct(){

  }

  protected function view($nome){
    require_once 'assets/'.$nome.'php';
  }
}
