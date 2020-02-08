USE EMPRESA;
DROP TABLE IF EXISTS USUARIOS;
CREATE TABLE IF NOT EXISTS USUARIOS (
	id_usuario INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    usuario VARCHAR(20) NOT NULL,
    senha VARCHAR(200) NOT NULL,
    primary key (id_usuario)
    
    ) ENGINE = INNODB;