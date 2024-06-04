/*/ banco de dados aula de PW
 20/05/2024*/
 -- criando o banco de dados que irá utilizar na Aula de Programação Web
 create database dbcrud;
 use dbcrud;
 -- tabela da tela de Cadastrar Registros
 create table tbcrud(
 codi_cr  int primary key auto_increment,
 nome_cr varchar(40) not null,
 email_cr varchar(40) not null,
 senha_cr varchar(8),
 sexo_cr char(1),
 dtna_cr datetime
 );