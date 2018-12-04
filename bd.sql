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
INSERT INTO exercicios(num_exerc, id_disc, id_cont, exercicio, quest_certa) VALUES(3, 1, 1, "Sabemos que existem cinco diferentes tipos de bases nitrogenadas: adenina, guanina, citosina, timina e uracila. No DNA, observa-se que as bases nitrogenadas das cadeias polinucleotidicas unem-se de maneira bastante especifica. A adenina, por exemplo, liga-se apenas a:", 2);
INSERT INTO exercicios(num_exerc, id_disc, id_cont, exercicio, quest_certa) VALUES(4, 1, 1, "O RNA, acido ribonucleico, e um acido nucleico relacionado com a sintese de proteinas. Existem diferentes tipos de RNA, cada um com uma funcao especifica. Marque a alternativa que indica o nome do RNA que carrega a informacao para a sintese de proteinas.", 3);
INSERT INTO exercicios(num_exerc, id_disc, id_cont, exercicio, quest_certa) VALUES(5, 1, 1, "(CES/JF-MG) Sobre acidos nucleicos, assinale a alternativa incorreta:", 4);


	-- ALGAS --
INSERT INTO exercicios(num_exerc, id_disc, id_cont, exercicio, quest_certa) VALUES(1, 1, 2,"As algas sao organismos encontrados tanto em agua doce como no ambiente marinho e, apesar de terem diversas utilidades para o homem, muitas vezes causam transtornos quando crescem em proporcoes indesejaveis. Esse processo, muitas vezes acompanhado de grande liberacao de toxina, recebe o nome de:",3);
INSERT INTO exercicios(num_exerc, id_disc, id_cont, exercicio, quest_certa) VALUES(2, 1, 2,"Algumas algas caracterizam-se por apresentar uma parede celular dividida em duas metades chamadas de frustulas, que se encaixam como se fossem uma placa de Petri. Estas algas sao importantes componentes do fitoplancton e estao agrupadas no filo:",4);
INSERT INTO exercicios(num_exerc, id_disc, id_cont, exercicio, quest_certa) VALUES(3, 1, 2,"(UFC) O reino Protista inclui as algas e os protozoarios. Esses organismos, nas classificacoes mais antigas, eram considerados como pertencentes aos reinos vegetal e animal, respectivamente. Assinale a alternativa que apresenta a justificativa correta para a inclusao desses diferentes protistas no mesmo reino.",2);
INSERT INTO exercicios(num_exerc, id_disc, id_cont, exercicio, quest_certa) VALUES(4, 1, 2,'(Unesp) "Mare vermelha deixa litoral em alerta."
Uma mancha escura formada por um fenomeno conhecido como "mare vermelha", cobriu ontem uma parte do canal de Sao Sebastiao [...] e pode provocar a morte em massa de peixes. A Secretaria de Meio Ambiente de Sao Sebastiao entrou em estado de alerta. O risco para o homem esta no consumo de ostras e moluscos contaminados.
(Jornal "Vale Paraibano", 01.02.2003.)
A mare vermelha e causada por:',5);
INSERT INTO exercicios(num_exerc, id_disc, id_cont, exercicio, quest_certa) VALUES(5, 1, 2,"(FACIG 2017 - MEDICINA) Algas de um grupo bem diversificado, as rodoficeas sao em sua maioria multicelulares. Sao abundantes nos mares tropicais, mas podendo ocorrer em agua doce e em superficies umidas, como troncos de arvores em florestas. Elas apresentam ficoeritrina e ficocianina, pigmentos que sao responsaveis por esses organismos serem conhecidos tambem como algas:",4);


-- inserir alternativa no exercicio 1 --
	-- conteudo ÁCIDOS NUCLEIOCOS 1 --
INSERT INTO alternativas(id_exerc, alternativa) VALUES(1, "a) moleculas de RNAt."), (1, "b) moleculas de RNAt."), (1, "c) bases nitrogenadas"), (1, "d) molecula de RNAm.");
INSERT INTO alternativas(id_exerc, alternativa) VALUES(2, "a) O RNA e encontrado apenas na regiao do nucleo e no citosol."), (2, "b) O DNA e encontrado apenas no interior do nucleo das celulas."), (2, "c) Tanto o DNA quanto o RNA possuem em sua composicao um monossacarideo chamado de ribose."), (2, "d) A base nitrogenada timina e exclusiva do DNA."), (2, "e) A base nitrogenada guanina e exclusiva do RNA.");
INSERT INTO alternativas(id_exerc, alternativa) VALUES(3,"a) adenina."), (3,"b) timina."), (3,"c) citosina."), (3,"d) guanina."), (3,"e) uracila.");
INSERT INTO alternativas(id_exerc, alternativa) VALUES(4,"a) RNA polimerase."), (4,"b) RNA transportador."), (4,"c) RNA mensageiro."), (4,"d) RNA ribossomico.");
INSERT INTO alternativas(id_exerc, alternativa) VALUES(5,"a) O DNA existe obrigatoriamente em todos as celulas."), (5,"b) O DNA existe em quase todos os seres vivos com excecao de alguns virus."), (5,"c) Nos procariontes, o DNA esta espalhado no citoplasma."), (5,"d) Nos eucariontes, o DNA esta limitado ao nucleo."), (5,"e) Nos eucariontes, o DNA, quando no citoplasma, esta limitado dentro de organelas que se autoduplicam, como cloroplastos e mitocondrias.");
	
    
    -- conteudo ALGAS 2 --
INSERT INTO alternativas(id_exerc, alternativa) VALUES(6, "a) endossimbiose."), (6, "b) poluicao."), (6, "c) floracao"), (6, "d) calcificacao"), (6, "e) fotossintese");
INSERT INTO alternativas(id_exerc, alternativa) VALUES(7, "a) Chrysophya."), (7, "b) Phaeophyta."), (7, "c) Chlorophyta."), (7, "d) Bacillariophyta."), (7, "e) Dinophyta.");
INSERT INTO alternativas(id_exerc, alternativa) VALUES(8, "a) Ambos sao simples, unicelulares, apresentam celulas eucarioticas e nutricao heterotrofica."), (8, "b) Ambos sao simples na organizacao morfologica em comparacao com plantas e animais, sendo as algas autotroficas e os protozoarios heterotroficos."), (8, "c) Ambos apresentam parede celular, nutricao heterotrofica e compoem-se de celulas eucarioticas."), (8, "d) Ambos apresentam parede celular, nutricao heterotrofica e compoem-se de celulas procarioticas."), (8, "e) Ambos sao pluricelulares, sendo as algas autotroficas e os protozoarios heterotroficos.");
INSERT INTO alternativas(id_exerc, alternativa) VALUES(9, "a) proliferacao de algas macroscopicas do grupo das rodofitas, toxicas para consumo pelo homem ou pela fauna marinha."), (9, "b) proliferacao de bacterias que apresentam em seu hialoplasma o pigmento vermelho ficoeritrina. As toxinas produzidas por essas bacterias afetam a fauna circunvizinha"), (9, "c) crescimento de fungos sobre material organico em suspensao, material este proveniente de esgotos lancados ao mar nas regioes das grandes cidades litoraneas."), (9, "d) proliferacao de liquens, que sao associacoes entre algas unicelulares componentes do fitoplancton e fungos. O termo mare vermelha decorre da producao de pigmentos pelas algas marinhas associadas ao fungo."), (9, "e) explosao populacional de algas unicelulares do grupo das pirrofitas, componentes do fitoplancton. A liberacao de toxinas afeta a fauna circunvizinha.");
INSERT INTO alternativas(id_exerc, alternativa) VALUES(10, "a) pardas."), (10, "b) verdes"), (10, "c) douradas."), (10, "d) vermelhas");


-- mostrar exercicios --
SELECT * FROM exercicios;

-- mostrar alternativas --
SELECT * FROM alternativas;


-- mostrar alternativa do determinado exercicio do determinado conteudo-- 
SELECT c.nome_cont, e.exercicio, id_alternativa, e.id_exerc, c.id_cont, alternativa 
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

SELECT e.exercicio, id_alternativa, e.id_exerc, c.id_cont, alternativa FROM alternativas a INNER JOIN exercicios e ON e.id_exerc = a.id_exerc INNER JOIN conteudo c ON e.id_cont = c.id_cont WHERE e.id_disc = 1 AND c.id_cont = 2 AND e.num_exerc = 1; 

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