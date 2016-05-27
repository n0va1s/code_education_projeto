<?php
namespace codeeduc\aluno;
use codeeduc\util\Conexao;

class AlunoDAO {

    private $conn;

    function __construct() {
        $this->conn = Conexao::conectar();
    }

    public function inserir(AlunoModel $model) {
      try {
        $stmt = $this->conn->prepare("insert into aluno (nom_aluno,
                                                         nom_modulo,
                                                         val_nota)
                                                  values (:nom_aluno,
                                                          :nom_modulo,
                                                          :val_nota)");

        $stmt->bindValue(":nom_aluno", $model->getNomAluno());
        $stmt->bindValue(":nom_modulo", $model->getNomModulo());
        $stmt->bindValue(":val_nota", $model->getValNota());
        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());
        return $stmt->execute();
       } catch (Exception $e) {
         echo "Erro ao gravar o aluno ".$e->getCode()." Mensagem: ".$e->getMessage();
       }
    }

    public function alterar(AlunoModel $model) {
      try {
        $stmt = $this->conn->prepare("update aluno
                                        set nom_aluno = :nom_aluno,
                                            nom_modulo = :nom_modulo,
                                            val_nota = :val_nota
                                      where seq_aluno = :seq_aluno");

        $stmt->bindValue(":nom_aluno", $model->getNomAluno());
        $stmt->bindValue(":nom_modulo", $model->getNomModulo());
        $stmt->bindValue(":val_nota", $model->getValNota());
        $stmt->bindValue(":seq_aluno", $model->getSeqAluno());

        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());
        return $stmt->execute();
       } catch (Exception $e) {
         echo "Erro ao gravar o aluno ".$e->getCode()." Mensagem: ".$e->getMessage();
       }
    }

    public function remover(AlunoModel $model) {
      try {
        $stmt = $this->conn->prepare("delete from aluno where seq_aluno = :seq_aluno");

        $stmt->bindValue(":seq_aluno", $model->getSeqAluno());
        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());
        return $stmt->execute();
       } catch (Exception $e) {
         echo "Erro ao excluir o aluno ".$e->getCode()." Mensagem: ".$e->getMessage();
       }
    }

    public function pesquisar(AlunoModel $model) {
      try {

        $where = Array();

        if (!empty($model->getNomAluno())){
          $where[] = "nom_aluno like :nom_aluno";
        }

        if (!empty($model->getNomModulo())){
          $where[] = "nom_modulo like :nom_modulo";
        }

        if (!empty($model->getValNota())){
          $where[] = "val_nota = :val_nota";
        }

        if (!empty($model->getDatInativo())){
          $where[] = "dat_inativo = :dat_inativo";
        }

        $query = "select * from aluno";
        if(sizeof($where)){
          $query .= ' WHERE '.implode( ' AND ',$where );
        }
			  $stmt = $this->conn->prepare($query);

        $stmt->bindValue(":nom_aluno", "%".$model->getNomAluno()."%");
        $stmt->bindValue(":nom_modulo", "%".$model->getNomModulo()."%");
        $stmt->bindValue(":val_nota", $model->getValNota());
        $stmt->bindValue(":dat_inativo", $model->getDatInativo());
        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS);
       } catch (Exception $e) {
         echo "Erro ao pesquiar o aluno ".$e->getCode()." Mensagem: ".$e->getMessage();
       }
    }

    public function consultar(AlunoModel $model) {
      try {
        $stmt = $this->conn->prepare("select *
                                        from aluno
                                      where seq_aluno = :seq_aluno");
        $stmt->bindValue(":seq_aluno", $model->getSeqAluno());
        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
      } catch (Exception $e) {
        echo "Erro ao consultar o aluno. Codigo: ".$e->getCode()." Mensagem: ".$e->getMessage();
      }
    }

    public function listar() {
      try {
        $stmt = $this->conn->prepare("select *
                                        from aluno");
        //Debug
        //echo $stmt->debugDumpParams();
        //var_dump($stmt->errorInfo());
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS);
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
        return $stmt->fetchAll(\PDO::FETCH_CLASS);
      } catch (Exception $e) {
        echo "Erro ao listar os alunos destaques. Codigo: ".$e->getCode()." Mensagem: ".$e->getMessage();
      }
    }

    function __destruct() {
        Conexao::desconectar();
    }
}
