#insert into include_require('REQ','assets/inicio.php','assets/cabecalho.php');
#insert into include_require('REQ','assets/erro.php','assets/cabecalho.php');

#Usuario
insert into usuario (nom_usuario, val_senha) values ('admin','$2y$10$ywbxcXOYO6KkMWu5PXrsB..kPdUKi5KbcrXmbKImZneDgtBZDJxUW');

#Conteudo
insert into conteudo(nom_pagina, txt_pagina) values ('inicio','Oh Happy Day (day care)
O que queremos para os nossos filhos, queremos também para o seu!');
insert into conteudo(nom_pagina, txt_pagina) values ('empresa','A OH HAPPY DAY
Segurança, conforto e carinho para o seu filhote como damos aos nossos!
A nossa empresa nasceu da necessidade de pais jovens que como nós tiveram filhos(nossos amores, nossa razão de viver, nossas alegrias) e que possuem uma vida com vários compromissos de trabalho ou pessoais e que para alguns não podemos levá-los... claro que pode rolar um 0800-Vovó, mas não sendo possível podemos cuidar dele ou dela até você voltar. Nossa empresa recebe crianças de 6 meses a 9 anos para passar o dia ou somente a noite. E para o seu conforto, funcionamos todos os dias!');
insert into conteudo(nom_pagina, txt_pagina) values ('produto','Acomodação - Conforto e segurança para o seu filhote em um lugar perto da sua casa ou do seu compromisso');
insert into conteudo(nom_pagina, txt_pagina) values ('produto','Recreação - Um dia diferente para o seu filho sair da rotina');
insert into conteudo(nom_pagina, txt_pagina) values ('produto','Home - Care Vamos até você');
insert into conteudo(nom_pagina, txt_pagina) values ('servico','Praticidade - Estamos pertinho da sua casa ou do seu compromisso');
insert into conteudo(nom_pagina, txt_pagina) values ('servico','Carinho - Por eles como se fossem os nossos');
insert into conteudo(nom_pagina, txt_pagina) values ('servico','Segurança - Nas nossas instalações e brincadeiras');
insert into conteudo(nom_pagina, txt_pagina) values ('servico','Recreação - Não é só dormir, é viver!');
insert into conteudo(nom_pagina, txt_pagina) values ('servico','Compromisso - Com os seus horários e recomendações');
insert into conteudo(nom_pagina, txt_pagina) values ('servico','Faça as contas - Uma ótima opção pra vc participar dos seus');
insert into conteudo(nom_pagina, txt_pagina) values ('preco','Compromisso rápido');
insert into conteudo(nom_pagina, txt_pagina) values ('preco','Pernoite (22h as 7h)');
insert into conteudo(nom_pagina, txt_pagina) values ('preco','Fidelidade');
insert into conteudo(nom_pagina, txt_pagina) values ('contato','Atendimento 24 horas. Fale com a gente.
 Brasília, DF (61) 8154-6988 mensagem@happyday.me');
insert into conteudo(nom_pagina, txt_pagina) values ('cliente','cadastre-se parentesco');

#Aluno
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Huguinho','PHP','7.5');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Zezinho','PHP','8.3');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Luizinho','PHP','8.1');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Mônica','PHP','7.3');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Magali','PHP','6.9');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Cebolinha','PHP','9.1');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Cascão','PHP','6.3');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Bidu','PHP','2.5');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Thor','PHP','9.3');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Homem de Ferro','PHP','9.9');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Loky','PHP','8.1');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Hulk','PHP','9.2');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Homem Aranha','PHP','7.8');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Super Homem','PHP','8');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Batman','PHP','9.7');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Mulher Maravilha','PHP','9.8');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Capitão América','PHP','9.9');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Viúva Negra','PHP','8.6');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Arqueiro','PHP','7.1');
insert into aluno(nom_aluno, nom_modulo, val_nota) values ('Professor Xavier','PHP','10');

#Cliente
insert into cliente(nom_cliente,eml_cliente,num_documento,des_endereco,des_endereco_cobranca) values ('Cliente_A','cliente_A@gmail.com','11111111111','Endereço do cliente_A','Cobranca do cliente_A');
insert into cliente(nom_cliente,eml_cliente,num_documento,des_endereco,des_endereco_cobranca) values ('Cliente_B','cliente_B@gmail.com','22222222222','Endereço do cliente_B','Cobranca do cliente_B');
insert into cliente(nom_cliente,eml_cliente,num_documento,des_endereco,des_endereco_cobranca) values ('Cliente_C','cliente_C@gmail.com','33333333333','Endereço do cliente_C','Cobranca do cliente_C');
insert into cliente(nom_cliente,eml_cliente,num_documento,des_endereco,des_endereco_cobranca) values ('Cliente_D','cliente_D@gmail.com','44444444444','Endereço do cliente_D','Cobranca do cliente_D');
insert into cliente(nom_cliente,eml_cliente,num_documento,des_endereco,des_endereco_cobranca) values ('Cliente_E','cliente_E@gmail.com','55555555555','Endereço do cliente_E','Cobranca do cliente_E');
insert into cliente(nom_cliente,eml_cliente,num_documento,des_endereco,des_endereco_cobranca) values ('Cliente_F','cliente_F@gmail.com','66666666666','Endereço do cliente_F','Cobranca do cliente_F');
insert into cliente(nom_cliente,eml_cliente,num_documento,des_endereco,des_endereco_cobranca) values ('Cliente_G','cliente_G@gmail.com','77777777777','Endereço do cliente_G','Cobranca do cliente_G');
insert into cliente(nom_cliente,eml_cliente,num_documento,des_endereco,des_endereco_cobranca) values ('Cliente_H','cliente_H@gmail.com','88888888888','Endereço do cliente_H','Cobranca do cliente_H');
insert into cliente(nom_cliente,eml_cliente,num_documento,des_endereco,des_endereco_cobranca) values ('Cliente_I','cliente_I@gmail.com','99999999999','Endereço do cliente_I','Cobranca do cliente_I');
insert into cliente(nom_cliente,eml_cliente,num_documento,des_endereco,des_endereco_cobranca) values ('Cliente_J','cliente_J@gmail.com','00000000000','Endereço do cliente_J','Cobranca do cliente_J');
