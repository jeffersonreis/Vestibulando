<?php
  
  // Essa página tem a intenção de fazer a conexão com o BD e inserir as informações.
	
  // INFORMAÇÕES DO MYSQL;
	$host = "localhost";
	$usuario = "root";
	$pass = "";
	$db = "vestibulando";


	// TENTATIVA DE CONEXAO COM O BD, CASO DE ERRO NOTIFICA;
  $conexao = mysqli_connect($host, $usuario, $pass, $db) or die (mysql_error());

	// SELECIONA O DB, TIPO O 'USE' DO MYSQL;
	mysqli_select_db($conexao, $db);

	//OPÇÃO PARA SALVAR A CADA MODIFICAÇÃO AUTOMATICAMENTE (ALDELIR INDICOU);
	mysqli_autocommit($conexao, TRUE);

	// CAPTURAR AS VARIAVEIS DO FORMULARIO HTML;
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$dat_nasc = $_POST['data'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];  
  $conf_senha = $_POST['conf_senha'];

	// TESTE PARA VER SE TA TUDO OK COM AS VARIAVEIS;
  echo "\nlogin eh: ", $nome;
  echo "\nsobrenome eh: ", $sobrenome;
  echo "\ndat_nasc: ", $dat_nasc;
  echo "\nemail: ", $email;
  echo "\nsenha eh: ", $senha;
  echo "\nconfsenha eh: ", $conf_senha;

  // Verificar se não tem nenhum usuario com o mesmo email
  $comando_verificar = "SELECT * FROM usuarios WHERE email = '" . $email . "'";
  $verifica = mysqli_query($conexao, $comando_verificar);

  // Se tiver algum resultado, já tem.
  if (mysqli_num_rows($verifica)>0){
    echo"<script language='javascript' type='text/javascript'>alert('Email já usado!');window.location.href='login.html';</script>";
      die(); 
  }

  // Se retornar nenhum, não tem, então continua.

  if ($conf_senha != $senha){
    echo"<script language='javascript' type='text/javascript'>alert('Senhas não correspondem');window.location.href='login.html';</script>";
       #echo 'email ERRADO';
    die(); 

  }



  // COMANDO PARA ADICIONAR NO BD;
  $comando = "INSERT INTO usuarios(nome, sobrenome, dat_nasc, email, senha) VALUES ('" . $nome . "','" . $sobrenome . "','" . $dat_nasc . "','" . $email . "','" . $senha . "')";


	mysqli_query($conexao, $comando) or die (mysql_error());
  
  echo"<script language='javascript' type='text/javascript'>alert('Seja Bem Vindo, Vestibulando!');window.location.href='login.html';</script>";



	mysqli_close($conexao);


?>