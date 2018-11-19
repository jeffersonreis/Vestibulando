use vestibulando;

DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios(
	id INT(5) AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(60) NOT NULL,
    sobrenome VARCHAR(60) NOT NULL,
    dat_nasc DATE,
	email VARCHAR(60) NOT NULL,
    senha VARCHAR(60) NOT NULL
);


INSERT INTO usuarios(nome, sobrenome, dat_nasc, email, senha) VALUES('Jefferson','dos reis','2000-11-20','jeff@gmail.com','33305300');

SELECT * FROM usuarios;
