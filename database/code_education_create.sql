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

CREATE TABLE IF NOT EXISTS usuario (
seq_usuario INT(6) AUTO_INCREMENT
,nom_usuario VARCHAR(50) NOT NULL COMMENT 'Login do usuario'
,val_senha VARCHAR(60) NOT NULL COMMENT 'Senha segura do usuario'
,dat_inativo DATE NOT NULL DEFAULT '0000-00-00' COMMENT 'Data em que o registro foi desativado'
,PRIMARY KEY(seq_usuario)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
COMMENT = 'Relaciona os usuarios com acesso a area restrita';

CREATE TABLE IF NOT EXISTS cliente (
seq_cliente INT(6) AUTO_INCREMENT
,tip_cliente CHAR(1) NOT NULL DEFAULT '1' COMMENT '1 estrela - ate 10 compras, 2 estrelas - ate 20 compras, 3 estrelas - ate 30 comrpas, 5 estrelas - mais de 30 compras'
,nom_cliente VARCHAR(50) COMMENT 'Nome do cliente'
,eml_cliente VARCHAR(50) COMMENT 'Email do cliente'
,tip_cliente CHAR(1) DEFAULT 'F' COMMENT 'F - fisica, J - juridica'
,num_documento CHAR(25) COMMENT 'Identificador unico do cliente'
,des_endereco VARCHAR(80) COMMENT 'Endereco do responsavel pela crianca'
,des_endereco_cobranca VARCHAR(80) COMMENT 'Endereco de cobranca da fatura mensal'
,dat_inativo DATE NOT NULL DEFAULT '0000-00-00' COMMENT 'Data em que o registro foi desativado'
,PRIMARY KEY(seq_cliente)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
COMMENT = 'Relaciona os clientes da empresa';

CREATE TABLE IF NOT EXISTS conteudo (
  seq_conteudo INT(6) AUTO_INCREMENT
  ,nom_pagina VARCHAR(50) NOT NULL COMMENT 'Nome da pagina a ser pesquisada'
  ,txt_pagina TEXT NOT NULL COMMENT 'Conteudo da pagina a ser apresentado ou pesquisado'
  ,dat_inativo DATE NOT NULL DEFAULT '0000-00-00' COMMENT 'Data em que o registro foi desativado'
  ,PRIMARY KEY(seq_conteudo)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
COMMENT = 'Relaciona as paginas e seus conteudos';

CREATE TABLE IF NOT EXISTS aluno (
seq_aluno INT(6) AUTO_INCREMENT
,nom_aluno VARCHAR(50) NOT NULL COMMENT 'Nome completo do aluno'
,nom_modulo VARCHAR(50) NOT NULL COMMENT 'Nome do modulo cursado'
,val_nota DECIMAL(5,2) NOT NULL COMMENT 'Nota final do aluno no modulo'
,dat_inativo DATE NOT NULL DEFAULT '0000-00-00' COMMENT 'Data em que o registro foi desativado'
,PRIMARY KEY(seq_aluno)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
COMMENT = 'Relaciona os alunos do curso da Code Education';
