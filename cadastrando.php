<html>

	<head>
		<tittle>Cadastrando</tittle>
	</head>

	<body>

	</body>

</html>



<?php
	// INFORMAÇÕES DO MYSQL;
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "vestibulando";


	// TENTATIVA DE CONEXAO COM O BD, CASO DE ERRO NOTIFICA;
	$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());

	// SELECIONA O DB, TIPO O 'USE' DO MYSQL;
	mysqli_select_db($conexao, $banco);

	//OPÇÃO PARA SALVAR A CADA MODIFICAÇÃO AUTOMATICAMENTE (ALDELIR INDICOU);
	mysqli_autocommit($conexao, TRUE);

	// CAPTURAR AS VARIAVEIS DO FORMULARIO HTML;
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$dat_nasc = $_POST['data'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];  

	// TESTE PARA VER SE TA TUDO OK COM AS VARIAVEIS;
    echo "\nlogin eh: ", $nome;
    echo "\nsobrenome eh: ", $sobrenome;
    echo "\ndat_nasc: ", $dat_nasc;
    echo "\nemail: ", $email;
    echo "\nsenha eh: ", $senha;


    // COMANDO MODELO PARA OS DEMAIS (ALDELIR);
    #$comando = "INSERT INTO usuarios(login, senha) VALUES ('" . $nome . "','" . $senha . "')";

    // COMANDO PARA ADICIONAR NO BD;
    $comando = "INSERT INTO usuarios(nome, sobrenome, dat_nasc, email, senha) VALUES ('" . $nome . "','" . $sobrenome . "','" . $dat_nasc . "','" . $email . "','" . $senha . "')";

    // MOSTRA O COMANDO PARA VER SE TÁ OK;
    echo "comando eh: ", $comando;


	#mysqli_query($conexao, $comando);
	mysqli_query($conexao, $comando);




    mysqli_commit($conexao);
	mysqli_close($conexao);
	?>



<?php

$query_select = "SELECT login FROM usuarios2 WHERE login = '$login'";
  $select = mysqli_query($conexao, $query_select);
  $array = mysqli_fetch_array($select);
  $logarray = $array['login'];
   
    if($login == "" || $login == null){
      echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastro.html';</script>";
   
      }else{
        if($logarray == $login){
   
          echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.html';</script>";
          die();
   
        }else{
          $query = "INSERT INTO usuarios2 (login,senha) VALUES ('$login','$senha')";
          $insert = mysqli_query($conexao, $query);
           
          if($insert){
            echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
          }else{
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
          }
        }
      }
?>
        

        
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








