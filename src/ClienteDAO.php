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
                                                           num_documento,
                                                           tip_pessoa,
                                                           des_endereco,
                                                           des_endereco_cobranca)
                                                   values (:nom_cliente,
                                                           :eml_cliente,
                                                           :num_documento,
                                                           :tip_pessoa,
                                                           :des_endereco,
                                                           :des_endereco_cobranca)");

        $stmt->bindValue(":nom_cliente", $model->getNomCliente());
        $stmt->bindValue(":eml_cliente", $model->getEmlCliente());
        $stmt->bindValue(":num_documento", $model->getNumDocumento());
        $stmt->bindValue(":tip_pessoa", $model->getTipPessoa());
        $stmt->bindValue(":des_endereco", $model->getDesEndereco());
        $stmt->bindValue(":des_endereco_cobranca", $model->getEnderecoCobranca());
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
                                                         num_documento = :num_documento,
                                                         tip_pessoa = :tip_pessoa,
                                                         des_endereco = :des_endereco,
                                                         des_endereco_cobranca = :des_endereco_cobranca
                                     where seq_cliente = :seq_cliente");

        $stmt->bindValue(":nom_cliente", $model->getNomCliente());
        $stmt->bindValue(":eml_cliente", $model->getEmlCliente());
        $stmt->bindValue(":num_documento", $model->getNumDocumento());
        $stmt->bindValue(":tip_pessoa", $model->getTipPessoa());
        $stmt->bindValue(":des_endereco", $model->getDesEndereco());
        $stmt->bindValue(":des_endereco_cobranca", $model->getEnderecoCobranca());
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
          if(!empty($ordem)){
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
