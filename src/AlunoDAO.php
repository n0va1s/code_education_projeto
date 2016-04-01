<?php

require_once 'Conexao.php';

class AlunoDAO {

    private $conn;

    function __construct() {
        $this->conn = Conexao::conectar();
    }

    public function listar() {
      try {
        $stmt = $this->conn->prepare("select *
                                        from aluno");
        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
      } catch (Exception $e) {
        echo "Erro ao listar os alunos. Codigo: ".$e->getCode()." Mensagem: ".$e->getMessage();
      }
    }

    public function listarDestaques() {
      try {
        $stmt = $this->conn->prepare("select *
                                        from aluno
                                      order by val_nota desc
                                      limit 3");
        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
      } catch (Exception $e) {
        echo "Erro ao listar os alunos destaques. Codigo: ".$e->getCode()." Mensagem: ".$e->getMessage();
      }
    }

    function __destruct() {
        Conexao::desconectar();
    }
}
