um teste aqui

<html>

	<head>
		<tittle>Cadastrando</tittle>
	</head>

	<body>
		<?php
		$host = "localhost";
		$user = "root";
		$pass = "";
		$banco = "vestibulando";
		
		// conectara o php ao mysql, caso contrario ira apresentar a mensagem de erro do banco.
		$connect = mysqli_connect($host, $usuario, $pass, $db) or die (mysql_error());

		// Igual o 'use' do mysql
		mysqli_select_db($db);
		mysqli_autocommit($connect, TRUE);

		$nome=$_POST['login'];
		$senha=$_POST['senha'];  

        echo "\nlogin eh: ", $nome;
        echo "\nsenha eh: ", $senha;

        $comando = "INSERT INTO usuarios(login, senha) VALUES ('" . $nome . "','" . $senha . "')";

        echo "comando eh: ", $comando;

		#mysqli_query($conexao, $comando);
		mysqli_query($conexao, $comando);




        //mysqli_commit($conexao);
		mysqli_close($conexao);
		?>

	</body>
</html>