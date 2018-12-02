use vestibulando;


-- Apagar as tabelas caso exista -- 
DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS disciplina;
DROP TABLE IF EXISTS conteudo;
DROP TABLE IF EXISTS check_list;

DROP TABLE IF EXISTS exercicios;
DROP TABLE IF EXISTS alternativas;

-- Criar as tabelas --
CREATE TABLE usuarios(
	id INT(5) AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(60) NOT NULL,
    sobrenome VARCHAR(60) NOT NULL,
    dat_nasc DATE,
	email VARCHAR(60) NOT NULL,
    senha VARCHAR(60) NOT NULL
);


CREATE TABLE disciplina(
	id_disc INT(5) AUTO_INCREMENT PRIMARY KEY,
	nome_disc VARCHAR(60) NOT NULL
);


CREATE TABLE conteudo(
	id_cont INT(5) AUTO_INCREMENT PRIMARY KEY,
    id_disc INT(5) NOT NULL, 
	nome_cont VARCHAR(60) NOT NULL
);


CREATE TABLE exercicios (
	id_exerc INT AUTO_INCREMENT PRIMARY KEY,
    id_disc INT,
    exercicio MEDIUMTEXT NOT NULL, -- A QUESTÃO EM SI
    quest_certa INT, -- O ID DA ALTERNATIVA CORRETA
    
    FOREIGN KEY (id_disc) REFERENCES disciplina(id_disc)
);

CREATE TABLE alternativas(
	id_alternativa INT AUTO_INCREMENT PRIMARY KEY,
    id_exerc INT,
	alternativa MEDIUMTEXT NOT NULL,
    
    FOREIGN KEY(id_exerc) REFERENCES exercicios(id_exerc)
);

CREATE TABLE check_list(
	id INT,
    id_cont INT,
    id_disc INT,
    
    concluido BOOL NOT NULL,
    PRIMARY KEY(id, id_cont, id_disc)
);

						
-- inserir exercicios -- 
INSERT INTO exercicios(id_disc, exercicio, quest_certa) VALUES(1, "A molecula de DNA armazena informacao genomica que e transcrita e traduzida por mecanismos elegantes como os de transcrisao e traducao. Entretanto, entre distintos individuos biologicos construidos por mensagem contida no DNA, ha uma singularidade biologica que se repete, mas se diferencia pelo modo como esta e organizada. Essa descricao corresponde a(s)", 3);


-- mostrar exercicios --
SELECT * FROM exercicios;


-- inserir as disciplina --
INSERT INTO disciplina(nome_disc) VALUES('BIOLOGIA');
INSERT INTO disciplina(nome_disc) VALUES('QUIMICA');
INSERT INTO disciplina(nome_disc) VALUES('FISICA');
INSERT INTO disciplina(nome_disc) VALUES('MATEMATICA');
INSERT INTO disciplina(nome_disc) VALUES('HISTORIA');
INSERT INTO disciplina(nome_disc) VALUES('PORTUGUES');
INSERT INTO disciplina(nome_disc) VALUES('INGLES');
INSERT INTO disciplina(nome_disc) VALUES('ESPANHOL');
INSERT INTO disciplina(nome_disc) VALUES('FILOSOFIA E SOCIOLOGIA');


-- inserir conteudo -- 
	-- Biologia --
INSERT INTO conteudo(id_disc, nome_cont) VALUES(1, 'Acidos nucleicos');
INSERT INTO conteudo(id_disc, nome_cont) VALUES(1, 'Algas');
INSERT INTO conteudo(id_disc, nome_cont) VALUES(1, 'Anelideos');
INSERT INTO conteudo(id_disc, nome_cont) VALUES(1, 'Anfibios');
INSERT INTO conteudo(id_disc, nome_cont) VALUES(1, 'Angiospermas');
INSERT INTO conteudo(id_disc, nome_cont) VALUES(1, 'Artropodos');
INSERT INTO conteudo(id_disc, nome_cont) VALUES(1, 'Aves');
INSERT INTO conteudo(id_disc, nome_cont) VALUES(1, 'Bacterias');
INSERT INTO conteudo(id_disc, nome_cont) VALUES(1, 'Biociclos');
INSERT INTO conteudo(id_disc, nome_cont) VALUES(1, 'Biomas');
INSERT INTO conteudo(id_disc, nome_cont) VALUES(1, 'Controle Nervoso');

INSERT INTO conteudo(id_disc, nome_cont) VALUES(1, 'Corpo Humano');
INSERT INTO conteudo(id_disc, nome_cont) VALUES(1, 'Sistema Cardíaco');
 

	-- Quimica --
INSERT INTO conteudo(id_disc, nome_cont) VALUES(2, 'Materia');
INSERT INTO conteudo(id_disc, nome_cont) VALUES(2, 'Atomistica');
INSERT INTO conteudo(id_disc, nome_cont) VALUES(2, 'Tabela periodica');
INSERT INTO conteudo(id_disc, nome_cont) VALUES(2, 'Ligações Quimicas');
INSERT INTO conteudo(id_disc, nome_cont) VALUES(2, 'Geometria Molecular');







-- mostrar usuarios --
SELECT * FROM usuarios;

-- mostrar disciplina --
SELECT * FROM disciplina;

-- mostrar todos conteudos -- 
SELECT * FROM conteudo;


--  Exemplo de como inserir check list--
							#user #cont #disc
INSERT INTO check_list VALUES (2, 1, 1, true), (2, 5, 1, true);


-- Exemplo de como tirar um check_list -- 
							#id_user    #id_conteudo
DELETE FROM check_list WHERE id = 2 AND id_cont = 5;


-- Exemplo de como pegar todos os checklist de todos os usuários -- 
SELECT u.id, nome, nome_cont, nome_disc, o.id_cont
  FROM check_list c INNER JOIN usuarios u ON c.id = u.id
 INNER JOIN disciplina d ON c.id_disc = d.id_disc
 INNER JOIN conteudo o ON c.id_cont = o.id_cont;
 

-- Exemplo de mostra todos os conteudos --
SELECT nome_cont as conteudo, nome_disc as disciplina, d.id_disc
	FROM conteudo c
	INNER JOIN disciplina d ON c.id_disc = d.id_disc;
    
    -- WHERE d.id_disc = 1; -- Mostrará apenas disciplina 1 (biologia) --



-- para desativar o bloqueio de update, delete... --
SET SQL_SAFE_UPDATES = 0;

-- Exemplo alterar senha pelo email --
UPDATE usuarios SET senha='444' WHERE email='jeffersonluis.reis@gmail.com';