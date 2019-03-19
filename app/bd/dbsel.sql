#Criação do banco de dados dbsel
create database dbsel
default character set utf8
default collate utf8_general_ci;

#Habilitando o banco para uso
use dbsel;

CREATE TABLE tb_endereco(
  cep varchar(10) NOT NULL PRIMARY KEY,
  logradouro varchar(90) NOT NULL,
  bairro varchar(50) NOT NULL,
  cidade varchar(50) NOT NULL,
  estado char(2) NOT NULL
)default charset = utf8 ;

CREATE TABLE tb_usuario(
	cpf varchar(14) not null primary key,
    nome varchar(60) not null,
    data_nasc date not null,
    email varchar(30) not null,
    celular varchar(14) not null,
    telefone varchar(13) not null,
    cep varchar(10),
    numero int(10),
    complemento varchar(15),
    categoria enum('S','M'),
    matricula varchar(10),
    foreign key (cep) references tb_endereco (cep)
)default charset = utf8;    

create table tb_login(
	cpf varchar(14),
    login varchar(10) not null primary key,
    senha varchar(30) not null,
	tipo varchar(3) default 'est',
    foreign key (cpf) references tb_usuario(cpf)
)default charset = utf8;
