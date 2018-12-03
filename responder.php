<?php

	// Configurando Banco de Dados
	$host = "localhost";
    $usuario = "root";
    $pass = "";
    $db = "vestibulando";

    $conexao = mysqli_connect($host, $usuario, $pass, $db) or die (mysql_error());
    mysqli_select_db($conexao, $db);
    mysqli_autocommit($conexao, TRUE);


	// Pegar informações via GET (link)
	$id_disc = $_GET["id_disc"];
	$id_cont = $_GET["id_cont"];
	$num_exerc = $_GET["num_exerc"];


    $comando_resposta = "SELECT DISTINCT e.quest_certa
							FROM alternativas a
							INNER JOIN exercicios e ON e.id_exerc = a.id_exerc
							INNER JOIN conteudo c ON e.id_cont = c.id_cont							    
							WHERE e.id_disc = " . $id_disc. " AND c.id_cont = " . $id_cont. "  AND e.num_exerc = " . $num_exerc;

    $buscar_resposta = mysqli_query($conexao, $comando_resposta);
    $mostrar_resposta = mysqli_fetch_assoc($buscar_resposta);

    $resposta = $mostrar_resposta["quest_certa"];

    $link = "questao.php?id_disc=" . $id_disc . "&id_cont=" . $id_cont . "&num_exerc=" . $num_exerc;

	if (isset($_POST['resposta'])) {
		$respondeu = $_POST['resposta'];
		if ($respondeu == $resposta){
			echo "<script language='javascript' type='text/javascript'>alert('Parabéns! Resposta Correta.');window.location.href='" . $link . "';</script>";
		}
		else{
			echo "<script language='javascript' type='text/javascript'>alert('Tente Novamente! Resposta Errada.');window.location.href='" . $link . "';</script>";
		};
	};		
?>