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

INSERT INTO tb_endereco(cep, logradouro, bairro, cidade,estado) VALUES ('06816-000', 'Rua Marcelino Pinto Teixeira', 'Gramado','Embu das Artes', 'SP');

CREATE TABLE tb_usuario(
	id int unique auto_increment,
	cpf varchar(14) not null primary key,
    rg varchar(16) not null unique,
    nome varchar(60) not null,
    data_nasc date not null,
    email varchar(30) not null unique,
    celular varchar(14) not null,
    telefone varchar(13),
    cep varchar(10),
    numero int(10) not null,
    complemento varchar(15),
    categoria enum('S','M'),
    matricula varchar(10),
    foreign key (cep) references tb_endereco (cep)
)default charset = utf8;    

INSERT INTO tb_usuario (cpf,rg,nome,data_nasc,email,celular,cep,numero, categoria) VALUES ('123.456.789-10','43.543.123.-X','Hercule Poirot','1880-08-18','hercule@poirot.com','97070-7070','06816-000','100','S');

create table tb_login(
	cpf varchar(14),
    login varchar(15) not null primary key,
    senha varchar(255) not null,
	tipo varchar(1) default 'E' not null,
    foreign key (cpf) references tb_usuario(cpf)
)default charset = utf8;

INSERT INTO tb_login (cpf,login,senha,tipo) VALUES ('123.456.789-10', 'poirot', '8d36e3638d7f63b4851e29c2bff55ed7f3b32590e911b20885cc661e7242e9e0c436dd2938ab63e585a63b3357e89a5983ab50416ec0b54a853ac4b92826ea62', 'A');

create table tb_curso(
	codigo int auto_increment primary key,
    nome varchar(50) not null,
    descricao text(500),
    total_horas varchar(6) not null,
    situacao enum('A','D') default 'A'
);

create table tb_turma(
	codigo int auto_increment primary key,
    cod_curso int,
	inicio date not null,
    fim date not null,
    quant_aulas int not null,
    categoria enum ('S','A') not null,
    limite_inscritos int,
	situacao enum('A','D') default 'A',
    sit_turma varchar(2) default 'AB' not null,
    foreign key (cod_curso) references tb_curso (codigo) 
);

create table tb_dias(
	codigo_curso int,
    dias varchar(3) not null,
	horario varchar(5) not null,
    foreign key (codigo_turma) references tb_turma (codigo)
);
