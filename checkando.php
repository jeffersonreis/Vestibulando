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

	// Buscar o ID do usuário
	$comando_iduser = "SELECT id FROM usuarios WHERE email = '" . $session_email . "';";
    $busca = mysqli_query($conexao, $comando_iduser);
    $id_user = mysqli_fetch_assoc($busca);


    // 1 = Biologia
	$disciplina = 1;


	// Buscar todos os conteúdos
	$comando_buscar = "SELECT nome_cont as conteudo, nome_disc as disciplina, id_cont
                        FROM conteudo c
                        INNER JOIN disciplina d ON c.id_disc = d.id_disc
                        WHERE d.id_disc = " . $disciplina . ";";

    $busca = mysqli_query($conexao, $comando_buscar);

    // Conta o números de conteúdos, para pegar cada um dos check_box
	$num_conteudos = mysqli_num_rows($busca);


	// Vai percorrer de 1 até o número máximo de conteúdos, vai ver se está marcado ou não e vai registrar no BD
	for ($i = 1; $i <= 30; $i++){
		$i = (string)$i;
		if (isset($_POST[$i])) {
			$id_cont = $i;
			
			$comando_checkar = "INSERT INTO check_list VALUES (" . $id_user['id'] . "," . $id_cont . "," .  $disciplina . ", true);";
 			mysqli_query($conexao, $comando_checkar);
		}
		else{
			$id_cont = $i;
			
			$comando_descheckar = "DELETE FROM check_list WHERE id = " . $id_user['id'] . " AND id_cont = " . $id_cont;
			mysqli_query($conexao, $comando_descheckar);		
		}

	
	echo "<script language='javascript' type='text/javascript'>alert('Conteúdos Alterados!');window.location.href='check_list.php';</script>";
	};

	mysqli_close($conexao);
?>