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
    num_exerc INT,
    id_disc INT,
    id_cont INT,
    exercicio MEDIUMTEXT NOT NULL, -- A QUESTÃO EM SI
    quest_certa INT, -- O ID DA ALTERNATIVA CORRETA
    
    FOREIGN KEY (id_disc) REFERENCES disciplina(id_disc),
    FOREIGN KEY (id_cont) REFERENCES conteudo(id_cont)
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
	
    -- ÁCIDOS NUCLEICOS --
INSERT INTO exercicios(num_exerc, id_disc, id_cont, exercicio, quest_certa) VALUES(1, 1, 1, "A molecula de DNA armazena informacao genomica que e transcrita e traduzida por mecanismos elegantes como os de transcrisao e traducao. Entretanto, entre distintos individuos biologicos construidos por mensagem contida no DNA, ha uma singularidade biologica que se repete, mas se diferencia pelo modo como esta e organizada. Essa descricao corresponde a(s)", 3);
INSERT INTO exercicios(num_exerc, id_disc, id_cont, exercicio, quest_certa) VALUES(2, 1, 1, "Sabemos que existem dois tipos de acidos nucleicos: o DNA e o RNA. A respeito dessas duas moleculas, marque a alternativa correta:", 4);


	-- ALGAS --
INSERT INTO exercicios(num_exerc, id_disc, id_cont, exercicio, quest_certa) VALUES(1, 1, 2,"As algas sao organismos encontrados tanto em agua doce como no ambiente marinho e, apesar de terem diversas utilidades para o homem, muitas vezes causam transtornos quando crescem em proporcoes indesejaveis. Esse processo, muitas vezes acompanhado de grande liberacao de toxina, recebe o nome de:",3);


-- inserir alternativa no exercicio 1 --
	-- conteudo ÁCIDOS NUCLEIOCOS 1 --
INSERT INTO alternativas(id_exerc, alternativa) VALUES(1, "a) moleculas de RNAt."), (1, "b) moleculas de RNAt."), (1, "c) bases nitrogenadas"), (1, "d) molecula de RNAm.");
INSERT INTO alternativas(id_exerc, alternativa) VALUES(2, "a) O RNA e encontrado apenas na regiao do nucleo e no citosol."), (2, "b) O DNA e encontrado apenas no interior do nucleo das celulas."), (2, "c) Tanto o DNA quanto o RNA possuem em sua composicao um monossacarideo chamado de ribose."), (2, "d) A base nitrogenada timina e exclusiva do DNA."), (2, "e) A base nitrogenada guanina e exclusiva do RNA.");


	-- conteudo ALGAS 2 --
INSERT INTO alternativas(id_exerc, alternativa) VALUES(3, "a) endossimbiose."), (3, "b) poluicao."), (3, "c) floracao"), (3, "d) calcificacao"), (3, "e) fotossintese");

-- mostrar exercicios --
SELECT * FROM exercicios;

-- mostrar alternativas --
SELECT * FROM alternativas;


-- mostrar alternativa do determinado exercicio do determinado conteudo-- 
SELECT e.exercicio, id_alternativa, e.id_exerc, c.id_cont, alternativa 
	FROM alternativas a
	INNER JOIN exercicios e ON e.id_exerc = a.id_exerc
    INNER JOIN conteudo c ON e.id_cont = c.id_cont
    
    WHERE e.id_disc = 1 AND c.id_cont = 1 AND e.num_exerc = 2;


-- TESTE --

SELECT DISTINCT e.quest_certa
	FROM alternativas a
	INNER JOIN exercicios e ON e.id_exerc = a.id_exerc
    INNER JOIN conteudo c ON e.id_cont = c.id_cont
    
    WHERE e.id_disc = 1 AND c.id_cont = 1 AND e.num_exerc = 1;

-- FIM TESTE --

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
UPDATE usuarios SET senha='444' WHERE email='jeffersonluis.reis@gmail./;;om'