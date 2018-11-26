<?php
  
  session_start();
  $email_session = $_SESSION['email'];

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
    $novo_nome = $_POST['nome'];  
    $novo_sobrenome = $_POST['sobrenome'];  
	  $nova_dat = $_POST['dat_nasc'];  

 
  // CAPTURAR AS VARIAVEIS QUE JÁ EXISTIAM

    // Com base no email da seção, pega as demais informações do BD.
    $comando_buscar = "SELECT * FROM usuarios WHERE email = '" . $email_session . "'";
    $busca = mysqli_query($conexao, $comando_buscar);
    // Transforma os dados em uma array (valor ordenado, tipo dicionario)
    $mostrar = mysqli_fetch_assoc($busca);

    // Então, para capturar as informações...
    $nome = $mostrar['nome'];
    $sobrenome = $mostrar['sobrenome'];
    $dat_nasc = $mostrar['dat_nasc'];



  // CASO O FORMULARIO DA PÁGINA NÃO FOI MODIFICADO, OU SEJA, EM BRANCO, VOLTARA A SER O QUE ERA.
  if ($novo_nome == NULL) {
    $novo_nome = $nome;
  };

  if ($novo_sobrenome == NULL) {
    $novo_sobrenome = $sobrenome;
  };

  if ($nova_dat == NULL) {
    $nova_dat = $dat_nasc;
  };

  $comando = "UPDATE usuarios SET nome='" . $novo_nome . "', sobrenome='" . $novo_sobrenome . "', dat_nasc = '" . $nova_dat . "' WHERE email='" . $email_session . "'";

  
  // MOSTRA O COMANDO PARA VER SE TÁ OK;
  mysqli_query($conexao, $comando);

  echo"<script language='javascript' type='text/javascript'>alert('informações Alteradas com Sucesso!');window.location.href='perfil.php';</script>";


mysqli_close($conexao);
?>