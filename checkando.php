<?php
	session_start();
  	$session_email = $_SESSION['email'];

  	// Essa página tem a intenção de fazer a conexão com o BD e inserir as informações.
	
  	// INFORMAÇÕES DO MYSQL;
	$host = "localhost";
	$usuario = "root";
	$pass = "";
	$db = "vestibulando";

  	$conexao = mysqli_connect($host, $usuario, $pass, $db) or die (mysql_error());
	mysqli_select_db($conexao, $db);
	mysqli_autocommit($conexao, TRUE);


	function checkarConteudo($id){
									#user #id_cont #id_disc
 		$comando_checkar = "INSERT INTO check_list VALUES (2, 1, 1, true);";
		
	}

	function descheckarConteudo($id){
		$comando_descheckar = "DELETE FROM check_list WHERE id_cont = 5";

	}

	
	if(isset($_POST['1'])){
    	echo "checkbox marcado! <br/>";
    	// echo "valor: " . $_POST['1'];
	}
	else
	{
    	echo "checkbox não marcado! <br/>";
	}

	mysqli_close($conexao);
?>