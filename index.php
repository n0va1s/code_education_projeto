<?php

  //PHP < 5.4
  if (!function_exists('http_response_code')) {
    function http_response_code($cod_http = NULL) {
      //200 OK padrao
      $cod_atual = (isset($GLOBALS['http_response_code']) ? $GLOBALS['http_response_code'] : 200);
      //Retornar o codigo atual
      if ($cod_http === NULL) {
          return $cod_atual;
      }
      //Lista do Wikipedia
      switch ($cod_http) {
          case 100: $msg = 'Continue'; break;
          case 101: $msg = 'Switching Protocols'; break;
          case 200: $msg = 'OK'; break;
          case 201: $msg = 'Created'; break;
          case 202: $msg = 'Accepted'; break;
          case 203: $msg = 'Non-Authoritative Information'; break;
          case 204: $msg = 'No Content'; break;
          case 205: $msg = 'Reset Content'; break;
          case 206: $msg = 'Partial Content'; break;
          case 300: $msg = 'Multiple Choices'; break;
          case 301: $msg = 'Moved Permanently'; break;
          case 302: $msg = 'Moved Temporarily'; break;
          case 303: $msg = 'See Other'; break;
          case 304: $msg = 'Not Modified'; break;
          case 305: $msg = 'Use Proxy'; break;
          case 400: $msg = 'Bad Request'; break;
          case 401: $msg = 'Unauthorized'; break;
          case 402: $msg = 'Payment Required'; break;
          case 403: $msg = 'Forbidden'; break;
          case 404: $msg = 'Not Found'; break;
          case 405: $msg = 'Method Not Allowed'; break;
          case 406: $msg = 'Not Acceptable'; break;
          case 407: $msg = 'Proxy Authentication Required'; break;
          case 408: $msg = 'Request Time-out'; break;
          case 409: $msg = 'Conflict'; break;
          case 410: $msg = 'Gone'; break;
          case 411: $msg = 'Length Required'; break;
          case 412: $msg = 'Precondition Failed'; break;
          case 413: $msg = 'Request Entity Too Large'; break;
          case 414: $msg = 'Request-URI Too Large'; break;
          case 415: $msg = 'Unsupported Media Type'; break;
          case 500: $msg = 'Internal Server Error'; break;
          case 501: $msg = 'Not Implemented'; break;
          case 502: $msg = 'Bad Gateway'; break;
          case 503: $msg = 'Service Unavailable'; break;
          case 504: $msg = 'Gateway Time-out'; break;
          case 505: $msg = 'HTTP Version not supported'; break;
          default:
              trigger_error('Unknown http status code ' . $cod_http, E_USER_ERROR); // exit('Unknown http status code "' . htmlentities($cod_http) . '"');
              return $cod_atual;
      }

      $protocolo = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');
      header($protocolo . ' ' . $cod_http . ' ' . $msg);
      $GLOBALS['http_response_code'] = $cod_http;

      return $cod_atual;
    }
  }

$url = parse_url("http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
$separator = explode('/',$url['path']);
//Modulo
if(!empty(ucfirst($separator[1]))){
  //Determinar o modulo a ser executado. Nao sendo informado, direciona para a pagina principal
  $modulo = ucfirst($separator[1]);
} else {
  $modulo = "Inicio";
}
//Acao
if(!empty($separator[2])){
  //Caso na URL so exista o modulo direcionar para action index
  $acao = $separator[2];
} else {
  $acao = "iniciar";
}
//Id
if(!empty($separator[3])) {
  //Caso seja informado o ID para pesquisa ou alteracao
  $id = $separator[3];
} else {
  $id = NULL;
}

//Lista de opcoes possivel no menu
$menu = array("Inicio","Mensagem","Aluno","Cliente","Conteudo","Painel");
if(!in_array($modulo, $menu)){
  http_response_code(404);
}
if (!file_exists(__DIR__."/src/".$modulo."Controller.php")) {
  http_response_code(501);
}

//Require
require_once 'src/Controller.php';
require_once 'src/Configuracao.php';
require_once 'src/'.$modulo.'Controller.php';

//Instanciacao das classes
$c = $modulo.'Controller';
$ctr = new $c;

//Como todas a requisicoes sao direcionadas para index.php os dados da
//requisicao precisam ser encaminhados para o metodo especifico da controladora
if(!empty($_REQUEST)){
  $dados = $_REQUEST;
} else {
  $dados = $id;
}
//Execucao
$ctr->$acao($dados);
