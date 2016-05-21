<?php
namespace codeeduc\usuario;
use codeeduc\util\Conexao;

class UsuarioDAO {
    
    private $conn;

    function __construct() {
      $this->conn = Conexao::conectar();
    }

    public function inserir(UsuarioModel $model) {
      try {
        $stmt = $this->conn->prepare("insert into usuario (nom_usuario,
                                                           val_senha)
                                                   values (:nom_usuario,
                                                           :val_senha)");

        $stmt->bindValue(":nom_usuario", $model->getNomUsuario());
        $stmt->bindValue(":val_senha", $model->getValSenha());
        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());

        return $stmt->execute();

       } catch (Exception $e) {
         echo "Erro ao gravar o usuario ".$e->getCode()." Mensagem: ".$e->getMessage();
       }
    }

    public function validarCredenciais(UsuarioModel $model) {
      try {
        $stmt = $this->conn->prepare("select *
                                        from usuario
                                      where nom_usuario = :nom_usuario
                                        and val_senha = :val_senha");

        $stmt->bindValue(":nom_usuario", $model->getNomUsuario());
        $stmt->bindValue(":val_senha", password_hash($model->getValSenha(), PASSWORD_DEFAULT));
        //password_verify(senha, hash);

        return $stmt->execute();
      } catch (Exception $e) {
        echo "Nao foi possivel autenticar no banco de dados. Codigo: ".$e->getCode()." Mensagem: ".$e->getMessage();
      }
    }

    public function listar() {
      try {
        $stmt = $this->conn->prepare("select * from cliente");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      } catch (Exception $e) {
        echo "Erro ao listar os usuaris. Codigo: ".$e->getCode()." Mensagem: ".$e->getMessage();
      }
    }

    function __destruct() {
        Conexao::desconectar();
    }
}
