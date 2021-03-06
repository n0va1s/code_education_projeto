<?php
require_once "src/codeeduc/util/Carregador.php";
use codeeduc\util\Carregador;

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
//Modulo da aplicacao
if(!empty(ucfirst($separator[1]))){
  //Muda o diretorio
  $modulo = ucfirst($separator[1]);
} else {
  $modulo = "Inicio";
}
//Acao a ser executada pela controladora
if(!empty($separator[2])){
  $acao = $separator[2];
} else {//Caso na URL so exista o modulo direcionar para action iniciar
  $acao = "iniciar";
}
//Id
if(!empty($separator[3])) {
  //Caso seja informado o ID de um registro especifico
  $id = $separator[3];
} else {
  $id = NULL;
}

//Iniciando a sessao para colocar informacoes apos o login
if (!isset($_SESSION)){
   session_start();
}

//Lista de opcoes possivel no menu
$menu = array("Inicio","Mensagem","Aluno","Cliente","Conteudo","Painel");
if(!in_array($modulo, $menu)){
  http_response_code(404);
}

define('CLASS_DIR','src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

require_once 'src/codeeduc/Controller.php';
require_once 'src/codeeduc/View.php';
require_once 'src/codeeduc/util/Conexao.php';

if($modulo == 'Cliente'){
  require_once 'src/codeeduc/cliente/IRelacionamento.php';
  require_once 'src/codeeduc/cliente/EmpresaModel.php';
}

//Os objetos MVC e DAO sao criados em um ponto unico para
//diminuir o acomplamento entre as classes
if(file_exists("src/codeeduc/".strtolower($modulo)."/{$modulo}View.php")){
  require_once "src/codeeduc/".strtolower($modulo)."/{$modulo}View.php";
  $namespaceClass = "codeeduc\\".strtolower($modulo)."\\{$modulo}View";
  $v = new $namespaceClass;
} else {
  require_once "src/codeeduc/View.php";
  $namespaceClass = "codeeduc\\View";
  $v = new $namespaceClass;
}
if(file_exists("src/codeeduc/".strtolower($modulo)."/{$modulo}DAO.php")){
  require_once "src/codeeduc/".strtolower($modulo)."/{$modulo}DAO.php";
  $namespaceClass = "codeeduc\\".strtolower($modulo)."\\{$modulo}DAO";
  $d = new $namespaceClass;
}
if(file_exists("src/codeeduc/".strtolower($modulo)."/{$modulo}Model.php")){
  require_once "src/codeeduc/".strtolower($modulo)."/{$modulo}Model.php";
  $namespaceClass = "codeeduc\\".strtolower($modulo)."\\{$modulo}Model";
  $m = new $namespaceClass($d);
}
if(file_exists("src/codeeduc/".strtolower($modulo)."/{$modulo}Controller.php")){
  require_once "src/codeeduc/".strtolower($modulo)."/{$modulo}Controller.php";
  $namespaceClass = "codeeduc\\".strtolower($modulo)."\\{$modulo}Controller";
  //A index.php nao possui model por isso essa regra para
  //instaciar uma controller somente com uma view
  if(isset($m)){
    $c = new $namespaceClass($v, $m);
  } else {
    $c = new $namespaceClass($v);
  }
}

//Como todas a requisicoes sao direcionadas para index.php os dados da
//requisicao precisam ser encaminhados para o metodo especifico da controladora
if(!empty($_REQUEST)){
  $dados = $_REQUEST;
} else {
  $dados = $id;
}

//Como todas as acoes sao direcionadas para a index
//a controladora vai executar a acao informada na URL
$c->$acao($dados);
