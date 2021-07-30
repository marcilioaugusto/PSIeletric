-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema bancopi
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bancopi
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bancopi` DEFAULT CHARACTER SET utf8 ;
USE `bancopi` ;

-- -----------------------------------------------------
-- Table `bancopi`.`avaliar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancopi`.`avaliar` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `data` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `sugestoes` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bancopi`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancopi`.`cliente` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `cpf` CHAR(11) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(14) NULL DEFAULT NULL,
  `ativo` BIT(1) NOT NULL DEFAULT b'1',
  `senha` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bancopi`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancopi`.`endereco` (
  `Cliente_id` INT(11) NOT NULL,
  `cep` CHAR(8) NOT NULL,
  `logradouro` VARCHAR(45) NOT NULL,
  `numero` INT(11) NOT NULL,
  `complemento` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `uf` CHAR(2) NOT NULL,
  INDEX `fk_Endereco_Cliente_idx` (`Cliente_id` ASC) ,
  CONSTRAINT `fk_Endereco_Cliente`
    FOREIGN KEY (`Cliente_id`)
    REFERENCES `bancopi`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bancopi`.`servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancopi`.`servico` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(100) NOT NULL,
  `datahora` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `Cliente_id` INT(11) NOT NULL,
  `valor` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Servico_Cliente1_idx` (`Cliente_id` ASC),
  CONSTRAINT `fk_Servico_Cliente1`
    FOREIGN KEY (`Cliente_id`)
    REFERENCES `bancopi`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bancopi`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancopi`.`funcionario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  `cpf` CHAR(11) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `ativo` BIT(1) NOT NULL DEFAULT b'1',
  `Servico_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  INDEX `fk_Funcionario_Servico1_idx` (`Servico_id` ASC),
  CONSTRAINT `fk_Funcionario_Servico1`
    FOREIGN KEY (`Servico_id`)
    REFERENCES `bancopi`.`servico` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `bancopi` ;

-- -----------------------------------------------------
-- procedure sp_inserir
-- -----------------------------------------------------

DELIMITER $$
USE `bancopi`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_inserir`(
		_nome varchar(45), _cpf char(11), _email varchar(45), _telefone varchar(14), _senha varchar(32),
        _cep char(8), _logradouro varchar(45), _numero int(11), _complemento varchar(45), _tipo varchar(45), _cidade varchar(45), _bairro varchar(45),
        _uf char(2)
)
BEGIN
	  declare id_cliente int unsigned default 0 ;
		INSERT INTO 
			cliente(nome, cpf, email, telefone, ativo, senha) 
            VALUES (_nome, _cpf, _email, _telefone, default, _senha);
		 set id_cliente = last_insert_id() ;
        INSERT INTO 
            endereco(cliente_id,cep, logradouro, numero, complemento, tipo, cidade, bairro, uf)
			VALUES (id_cliente,_cep, _logradouro, _numero, _complemento, _tipo, _cidade, _bairro, _uf);
END$$

DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
