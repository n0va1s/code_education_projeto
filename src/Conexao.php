<?php

class Conexao {

    static $conn;

    static function conectar() {
      $config = include "Configuracao.php";

      if(!isset($config['db'])){
        throw new InvalidArgumentException("Configuação do banco de dados inválida");
      } else {
        $DSN = $config['db']['SGBD'].":host=".$config['db']['host'].";dbname=".$config['db']['dbname'].";charset=".$config['db']['charset'].";";
        $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
        try {
            $conn = new PDO($DSN, $config['db']['user'], $config['db']['password'], $opcoes);
            $conn->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            return $conn;
        } catch (PDOException $e) {
            echo "Erro na conexão!";
            echo $e->getMessage();
        }
      }
    }

    static function getConexao() {
        return Conexao::$conn;
    }

    static function desconectar(){
        Conexao::$conn = NULL;
    }
}
