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
                                                           num_cpf,
                                                           des_endereco)
                                                   values (:nom_cliente,
                                                           :eml_cliente,
                                                           :num_cpf,
                                                           :des_endereco)");

        $stmt->bindValue(":nom_cliente", $model->getNomCliente());
        $stmt->bindValue(":eml_cliente", $model->getEmlCliente());
        $stmt->bindValue(":num_cpf", $model->getNumCPF());
        $stmt->bindValue(":des_endereco", $model->getDesEndereco());
        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());

        return $stmt->execute();

       } catch (Exception $e) {
         echo "Erro ao gravar o cliente ".$e->getCode()." Mensagem: ".$e->getMessage();
       }
    }

    public function alterar(ClienteModel $model) {
      try {
        $stmt = $this->conn->prepare("update cliente set nom_cliente = :nom_cliente,
                                                         eml_cliente = :eml_cliente,
                                                         num_cpf = :num_cpf,
                                                         des_endereco = :des_endereco
                                     where seq_cliente = :seq_cliente");

         $stmt->bindValue(":nom_cliente", $model->getNomCliente());
         $stmt->bindValue(":eml_cliente", $model->getEmlCliente());
         $stmt->bindValue(":tip_parentesco", $model->getNumCPF());
         $stmt->bindValue(":nom_filho", $model->getDesEndereco());
         $stmt->bindValue(":seq_cliente", $model->getSeqCliente());
        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());

        return $stmt->execute();

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

        return $stmt->execute();

       } catch (Exception $e) {
         echo "Erro ao excluir o cliente ".$e->getCode()." Mensagem: ".$e->getMessage();
       }
    }

    public function listar($ordem = NULL) {
      try {
          if(isset($ordem)){
            $sql = "select * from cliente order by nom_cliente ".$ordem;
          } else {
            $sql = "select * from cliente";
          }
          $this->stmt = $this->conn->prepare($sql);
          $this->stmt->execute();

        return $this->stmt->fetchAll(PDO::FETCH_CLASS);
      } catch (Exception $e) {
        echo "Erro ao listar os clientes. Codigo: ".$e->getCode()." Mensagem: ".$e->getMessage();
      }
    }

    function __destruct() {
        Conexao::desconectar();
    }
}
