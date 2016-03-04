CREATE DATABASE code_education;

CREATE USER 'usrcodeeducation'@'localhost' IDENTIFIED BY 'codeeducationusr';
GRANT ALL PRIVILEGES ON code_education. * TO 'usrcodeeducation'@'localhost';
FLUSH PRIVILEGES;

USE code_education;
/*
CREATE TABLE IF NOT EXISTS include_require (
seq_include_require INT(6) AUTO_INCREMENT
,tip_include_require CHAR(3) NOT NULL DEFAULT 'REQ' COMMENT 'REQ - require_once, INC - include_once'
,pag_include_require VARCHAR(50) COMMENT 'Pagina onde deve sera incluida a pagina'
,nom_include_require VARCHAR(50) NOT NULL DEFAULT 'Nome dos include ou requires a serem incluidos'
,dat_inativo DATE NOT NULL DEFAULT '0000-00-00'
,PRIMARY KEY(seq_include_require)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
COMMENT = 'Relaciona os includes e requires necessarios ao funcionamento de uma pagina';
*/

CREATE TABLE IF NOT EXISTS cliente (
seq_cliente INT(6) AUTO_INCREMENT
,tip_cliente CHAR(1) NOT NULL DEFAULT 'B' COMMENT 'B - bronze - ate 10 compras, P - prata - ate 20 compras, O - ouro - ate 30 comrpas, D - diamante - mais de 30 compras'
,nom_cliente VARCHAR(50) COMMENT 'Nome do cliente'
,eml_cliente VARCHAR(50) COMMENT 'Email do cliente'
,tip_parentesco CHAR(1) COMMENT 'P - pai, M - mae, A - avo, T - tio, O - outro'
,nom_filho VARCHAR(50) COMMENT 'Nome do filho(a)'
,num_idade TINYINT COMMENT 'Idade do filho(a)'
,dat_inativo DATE NOT NULL DEFAULT '0000-00-00'
,PRIMARY KEY(seq_cliente)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
COMMENT = 'Relaciona os clientes da empresa';