<?php

require_once 'Conexao.php';

class ClienteDAO {

    private $conn;

    function __construct() {
        $this->conn = Conexao::conectar();
    }

    public function inserir(ClienteModel $model) {
      try {
        $stmt = $this->conn->prepare("insert into cliente (nom_cliente,
                                                           eml_cliente,
                                                           tip_parentesco,
                                                           nom_filho,
                                                           num_idade)
                                                   values (:nom_cliente,
                                                           :eml_cliente,
                                                           :tip_parentesco,
                                                           :nom_filho,
                                                           :num_idade)");

        $stmt->bindValue(":nom_cliente", $model->getNomCliente());
        $stmt->bindValue(":eml_cliente", $model->getEmlCliente());
        $stmt->bindValue(":tip_parentesco", $model->getTipParentesco());
        $stmt->bindValue(":nom_filho", $model->getNomFilho());
        $stmt->bindValue(":num_idade", $model->getNumIdade());
        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());

        $result = $stmt->execute();

       } catch (Exception $e) {
         echo "Erro ao gravar o cliente ".$e->getCode()." Mensagem: ".$e->getMessage();
       }
    }

    public function alterar(ClienteModel $model) {
      try {
        $stmt = $this->conn->prepare("update cliente set nom_cliente = :nom_cliente,
                                                         eml_cliente = :eml_cliente,
                                                         tip_parentesco = :tip_parentesco,
                                                         nom_filho = :nom_filho,
                                                         num_idade = :num_idade");

        $stmt->bindValue(":nom_cliente", $model->getNomCliente());
        $stmt->bindValue(":eml_cliente", $model->getEmlCliente());
        $stmt->bindValue(":tip_parentesco", $model->getTipParentesco());
        $stmt->bindValue(":nom_filho", $model->getNomFilho());
        $stmt->bindValue(":num_idade", $model->getNumIdade());
        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());

        $result = $stmt->execute();

       } catch (Exception $e) {
         echo "Erro ao atualizar o cliente ".$e->getCode()." Mensagem: ".$e->getMessage();
       }
    }

    public function excluir(ClienteModel $model) {
      try {
        $stmt = $this->conn->prepare("delete from cliente 
                                      where seq_cliente = :seq_cliente");

        $stmt->bindValue(":seq_cliente", $model->getSeqCliente());
        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());

        $result = $stmt->execute();

       } catch (Exception $e) {
         echo "Erro ao excluir o cliente ".$e->getCode()." Mensagem: ".$e->getMessage();
       }
    }

    public function listar() {
      try {
        $this->stmt = $this->conn->prepare("select * from cliente");
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
      } catch (Exception $e) {
        echo "Erro ao listar os clientes. Codigo: ".$e->getCode()." Mensagem: ".$e->getMessage();
      }
    }

    function __destruct() {
        Conexao::desconectar();
    }
}
