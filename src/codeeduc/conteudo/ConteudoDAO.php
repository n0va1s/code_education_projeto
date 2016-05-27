<?php
namespace codeeduc\conteudo;
use codeeduc\util\Conexao;

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

    public function alterar(ConteudoModel $model) {
      try {
        $stmt = $this->conn->prepare("update conteudo
                                        set nom_pagina = :nom_pagina,
                                            txt_pagina = :txt_pagina
                                      where seq_conteudo = :seq_conteudo");

        $stmt->bindValue(":nom_pagina", $model->getNomPagina());
        $stmt->bindValue(":txt_pagina", $model->getTxtPagina());
        $stmt->bindValue(":seq_conteudo", $model->getSeqConteudo());
        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());
        return $stmt->execute();
       } catch (Exception $e) {
         echo "Erro ao gravar o conteudo ".$e->getCode()." Mensagem: ".$e->getMessage();
       }
    }

    public function consultarPorTexto(ConteudoModel $model) {
      try {
        $stmt = $this->conn->prepare("select *
                                        from conteudo
                                      where nom_pagina like :nom_pagina
                                         or txt_pagina like :txt_pagina");
        $np = "%".$model->getNomPagina()."%";
        $tp = "%".$model->getTxtPagina()."%";

        $stmt->bindValue(":nom_pagina", $np, \PDO::PARAM_STR);
        $stmt->bindValue(":txt_pagina", $tp, \PDO::PARAM_STR);

        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS);
      } catch (Exception $e) {
        echo "Erro ao consultar as paginas pelos textos. Codigo: ".$e->getCode()." Mensagem: ".$e->getMessage();
      }
    }

    public function consultarPorSequencial(ConteudoModel $model) {
      try {
        $stmt = $this->conn->prepare("select *
                                        from conteudo
                                      where seq_conteudo = :seq_conteudo");

        $stmt->bindValue(":seq_conteudo", $model->getSeqConteudo(), \PDO::PARAM_INT);

        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
      } catch (Exception $e) {
        echo "Erro ao consultar pagina pelo sequencial. Codigo: ".$e->getCode()." Mensagem: ".$e->getMessage();
      }
    }

    public function listarPaginas() {
      try {
        $stmt = $this->conn->prepare("select seq_conteudo, nom_pagina
                                        from conteudo
                                      group by nom_pagina");
        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS);
      } catch (Exception $e) {
        echo "Erro ao listar as paginas cadastradas. Codigo: ".$e->getCode()." Mensagem: ".$e->getMessage();
      }
    }

    function __destruct() {
        Conexao::desconectar();
    }
}
