
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

	mysqli_close($conexao);

?>