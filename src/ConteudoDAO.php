<?php

require_once 'Conexao.php';

class ConteudoDAO {

    private $conn;

    function __construct() {
        $this->conn = Conexao::conectar();
    }

    public function inserir(ConteudoModel $model) {
      try {
        $stmt = $this->conn->prepare("insert into conteudo (nom_pagina,
                                                            txt_pagina)
                                                    values (:nom_pagina,
                                                            :txt_pagina)");

        $stmt->bindValue(":nom_pagina", $model->getNomPagina());
        $stmt->bindValue(":txt_pagina", $model->getTxtPagina());
        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());
        return $stmt->execute();
       } catch (Exception $e) {
         echo "Erro ao gravar o conteudo ".$e->getCode()." Mensagem: ".$e->getMessage();
       }
    }

    public function listar(ConteudoModel $model) {
      try {
        $stmt = $this->conn->prepare("select nom_pagina, txt_pagina
                                        from conteudo
                                      where nom_pagina like :nom_pagina
                                         or txt_pagina like :txt_pagina");
        $np = "%".$model->getNomPagina()."%";
        $tp = "%".$model->getTxtPagina()."%";

        $stmt->bindValue(":nom_pagina", $np, PDO::PARAM_STR);
        $stmt->bindValue(":txt_pagina", $tp, PDO::PARAM_STR);

        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
      } catch (Exception $e) {
        echo "Erro ao listar os conteudos das paginas. Codigo: ".$e->getCode()." Mensagem: ".$e->getMessage();
      }
    }

    public function listarPaginas() {
      try {
        $stmt = $this->conn->prepare("select distinct nom_pagina
                                        from conteudo");
        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
      } catch (Exception $e) {
        echo "Erro ao listar as paginas cadastradas. Codigo: ".$e->getCode()." Mensagem: ".$e->getMessage();
      }
    }

    function __destruct() {
        Conexao::desconectar();
    }
}
