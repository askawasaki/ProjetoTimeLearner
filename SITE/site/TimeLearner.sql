create database TimeLearner;

use TimeLearner;


create table Usuario_Comum(
ID_User			Integer not null auto_increment,
cNome			Varchar(40) not null,
cEmail			Varchar(20) not null,
tEsc			Varchar(15) not null,
cEndereco		Varchar(60) not null,
cSexo			Varchar(40) not null,
cDataNasc		Date,
cInstituicao	Varchar(15) not null,
cCurso			Varchar(15) not null,
cSenha			varchar(30) not null,
primary key(ID_User)
);

/*create table Sugestao(
ID_Sugestao	    Integer not null primary key auto_increment,
id_user			integer,
Descricao 	    Varchar(200) not null,
Conteudo		Varchar(15) not null,
DataSugestoes   Date,
Nome_Comum	    Varchar(40) not null
);*/

create table Sugestao(
ID_Sugestao	    Integer not null auto_increment,
id_user			integer,
Descricao 	    Varchar(200) not null,
Conteudo		Varchar(15) not null,
DataSugestoes   Date,
Nome_Comum	    Varchar(40) not null,
primary key(ID_Sugestao),
constraint fk_SUGESTAO foreign key (ID_User) references Usuario_Comum(ID_User)
);

create table Problemas_Relatados(
ID_Problema			Integer not null auto_increment,
ID_User			    Integer not null,
Descricao			Varchar(200) not null,
Conteudo			Varchar(15) not null,
dataProblema		Date,
primary key(ID_Problema),
constraint fk_PROBLEMASRELATADOSUSUARIOCOMUM foreign key (ID_User) references Usuario_Comum(ID_User)
);

create table Relatorio(
ID_Relatorio	Integer not null auto_increment,
ID_Sugestao	    Integer,
ID_Problema	    Integer,
primary key(ID_Relatorio),
constraint fk_RELATORIOSUGESTAO foreign key (ID_Sugestao) references Sugestao(ID_Sugestao),
constraint fk_RELATORIOPROBLEMA foreign key (ID_Problema) references Problemas_Relatados(ID_Problema)
);

create table Empresa(
CNPJ		Varchar(18) not null,
Nome 		Varchar(40) not null,
primary key(CNPJ)
);

create table Usuario_Especialista(
ID_UserEsp		Integer not null auto_increment,
Nome_UserEsp	Varchar(40) not null,
Email			Varchar(20) not null,
Formacao		Varchar(15) not null,
Endereco		Varchar(60) not null,
Instituicao 	Varchar(15) not null,
Data_Nasc		Date,
Sexo			Varchar(10) not null,
senha			varchar(30) not null,
primary key(ID_UserEsp)
);

create table Linha_do_Tempo(
ID_Conteudo			integer not null auto_increment,
Data_Conteudo		Date,
Conteudo			Varchar(20) not null,
Periodo_Historico	Varchar(20) not null,
Nome_Do_Acontecimento	Varchar(30) not null,
primary key(ID_Conteudo)
);
SELECT * from Usuario_Comum;


