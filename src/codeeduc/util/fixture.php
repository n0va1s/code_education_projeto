<?php
namespace codeeduc\util;
use codeeduc\usuario\UsuarioModel;
use codeeduc\usuario\UsuarioDAO;

echo "Mudando para a pasta dos scripts de banco<br>";
chdir('../database/');
echo getcwd()."<br>";
echo "Obtendo uma conexao <br>";
$conn = Conexao::conectar();
echo "Inicio da fixture <br>";
echo "Selecionando o BD <br>";
$conn->exec("use code_education;");
echo "Executando DROP <br>";
$conn->exec("source code_education_drop.sql");
echo "Objetos dropados<br>";
echo "Executando CREATE <br>";
$conn->exec("source code_education_create.sql;");
echo "Objetos criados<br>";
echo "Executando INSERT <br>";
$conn->exec("source code_education_insert.sql;");
echo "Dados inseridos<br>";
echo "Inserindo administrador<br>";
$user = new UsuarioModel();
$user->setNomUsuario("admin");
$user->setValSenha("admin");
$dao = new UsuarioDAO();
$dao->inserir($user);
echo "Administrador inserido<br>";
echo "Fim da fixture <br>";
$conn = NULL;
echo "Conexao liberada";
?>
