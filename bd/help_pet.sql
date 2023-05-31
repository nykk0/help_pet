create database help_pet ;

use help_pet;


 CREATE TABLE `tutor` (
 `ID` int(100) unsigned NOT NULL AUTO_INCREMENT,
 `NOME` varchar(150) NOT NULL,
 `DATA_NASC` DATE NOT NULL,
 `CPF` varchar(20) NOT NULL,
 `EMAIL` varchar(100) NOT NULL,
 `TELEFONE` varchar(20) NOT NULL,
 `CEP` varchar(20) NOT NULL,
 `ESTADO` varchar(20) NOT NULL,
 `CIDADE` varchar(100) NOT NULL,
 `BAIRRO` varchar(100) NOT NULL,
 `LOGRADOURO` varchar(150) NOT NULL,
 `COMPLEMENTO` varchar(100) NOT NULL,
 `NUMERO` varchar(100) NOT NULL,
  `SENHA` varchar(100) NOT NULL,
 PRIMARY KEY (`ID`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
  CREATE TABLE `empresa` (
 `ID` int(100) unsigned NOT NULL AUTO_INCREMENT,
 `NOME` varchar(150) NOT NULL,
 `CNPJ` varchar(20) NOT NULL,
 `EMAIL` varchar(100) NOT NULL,
 `TELEFONE` varchar(20) NOT NULL,
 `CEP` varchar(20) NOT NULL,
 `ESTADO` varchar(20) NOT NULL,
 `BAIRRO` varchar(100) NOT NULL,
 `LOGRADOURO` varchar(150) NOT NULL,
 `COMPLEMENTO` varchar(100) NOT NULL,
 `NUMERO` varchar(100) NOT NULL,
 `SENHA` varchar(100) NOT NULL,
 PRIMARY KEY (`ID`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
   CREATE TABLE `pet` (
 `ID` int(100) unsigned NOT NULL AUTO_INCREMENT,
 `NOME` varchar(150) NOT NULL,
 `DATA_NASC` DATE NOT NULL,
 `PESO` varchar(20) NOT NULL,
 `CATEGORIA` varchar(100) NOT NULL,
 `PORTE` varchar(100) NOT NULL,
 `TUTOR` varchar(100) NOT NULL,
 `RACA` varchar(20) NOT NULL,
 `USUARIO` varchar(100) NOT NULL,
 `SENHA` varchar(100) NOT NULL,
 PRIMARY KEY (`ID`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 select * from tutor;
 select * from empresa;
 select * from pet;
 drop table tutor ;
