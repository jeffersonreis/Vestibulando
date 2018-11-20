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

	// CAPTURAR AS VARIAVEIS DO FORMULARIO HTML;
	$senha_atual = $_POST['senha'];  
  $nova_senha = $_POST['nova_senha'];

	// TESTE PARA VER SE TA TUDO OK COM AS VARIAVEIS;
  echo "\nsenha eh: ", $senha_atual;
  echo "\nnovasenha eh: ", $nova_senha;

  // Verificar se a senha está ok
  $comando_verificar = "SELECT * FROM usuarios WHERE email = '" . $session_email . "' AND senha = '" . $senha_atual . "'";

  $verifica = mysqli_query($conexao, $comando_verificar);
  
  // Se a senha tiver errada, notifica e para.
  if (mysqli_num_rows($verifica)==0){
        echo"<script language='javascript' type='text/javascript'>alert('Senha não confere');window.location.href='alterar_senha.html';</script>";
       #echo 'email ERRADO';
        die(); 
  }

  else{
    $comando = "UPDATE usuarios SET senha='" . $nova_senha . "' WHERE email='" . $session_email . "'";

    // MOSTRA O COMANDO PARA VER SE TÁ OK;
    mysqli_query($conexao, $comando);

    echo"<script language='javascript' type='text/javascript'>alert('Senha Alterada com Sucesso!');window.location.href='alterar_senha.html';</script>";

  }

mysqli_close($conexao);
?>