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

		$nome = $_POST['nome'];
		$sobrenome = $_POST['sobrenome'];
		$dat_nasc = $_POST['data'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];  

        echo "\nlogin eh: ", $nome;
        echo "\nsobrenome eh: ", $sobrenome;
        echo "\ndat_nasc: ", $dat_nasc;
        echo "\nemail: ", $email;
        echo "\nsenha eh: ", $senha;

        
        
		$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());
		mysqli_select_db($conexao, $banco);
		mysqli_autocommit($conexao, TRUE);


        #$comando = "INSERT INTO usuarios(login, senha) VALUES ('" . $nome . "','" . $senha . "')";


        $comando = "INSERT INTO usuarios(nome, sobrenome, dat_nasc, email, senha) VALUES ('" . $nome . "','" . $sobrenome . "','" . $dat_nasc . "','" . $email . "','" . $senha . "')";

        echo "comando eh: ", $comando;

		#mysqli_query($conexao, $comando);
		mysqli_query($conexao, $comando);




        mysqli_commit($conexao);
		mysqli_close($conexao);
		?>

	</body>
</html>