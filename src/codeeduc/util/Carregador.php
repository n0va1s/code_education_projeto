<?php
namespace codeeduc\util;

class Carregador{

	function registrar(){
		define('CLASS_DIR','src/');
		set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
		spl_autoload_register();
	}

	function incluirClasse($modulo){
		require_once 'src/codeeduc/Controller.php';
		require_once 'src/codeeduc/View.php';
		require_once 'src/codeeduc/util/Conexao.php';
    //Classes especificas do modulo cliente
		if($modulo == 'Cliente'){
		  require_once 'src/codeeduc/cliente/IRelacionamento.php';
		  require_once 'src/codeeduc/cliente/EmpresaModel.php';
		}
		if(file_exists("src/codeeduc/".strtolower($modulo)."/{$modulo}Controller.php")){
		    require_once "src/codeeduc/".strtolower($modulo)."/{$modulo}Controller.php";
		}
		if(file_exists("src/codeeduc/".strtolower($modulo)."/{$modulo}View.php")){
		    require_once "src/codeeduc/".strtolower($modulo)."/{$modulo}View.php";
		}
		if(file_exists("src/codeeduc/".strtolower($modulo)."/{$modulo}Model.php")){
		  require_once "src/codeeduc/".strtolower($modulo)."/{$modulo}Model.php";
		}
		if(file_exists("src/codeeduc/".strtolower($modulo)."/{$modulo}DAO.php")){
		  require_once "src/codeeduc/".strtolower($modulo)."/{$modulo}DAO.php";
		}
	}
}

?>
