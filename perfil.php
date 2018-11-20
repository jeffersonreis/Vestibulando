<?php
    session_start();

    $host = "localhost";
    $usuario = "root";
    $pass = "";
    $db = "vestibulando";

    $conexao = mysqli_connect($host, $usuario, $pass, $db) or die (mysql_error());
    mysqli_select_db($conexao, $db);
    mysqli_autocommit($conexao, TRUE);

    
    $email_session = $_SESSION['email'];

    $comando_buscar = "SELECT nome FROM usuarios WHERE email = '" . $email_session . "'";
    $busca = mysqli_query($conexao, $comando_buscar);
    
    $mostrar = mysqli_fetch_assoc($busca);

    echo htmlentities($mostrar);


    //$nome = 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Vestibulando</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="perfil.css" rel="stylesheet">
    </head>
    <body>
        <menu id="main-nav">
        <div id="nav">
            <a href="index.html"><img src="imagens/logo.png" id="logo"/></a>
            <a href="principal.html" class="perfil"> PÁGINA PRINCIPAL </a>
        </div>
    </menu>
  
        
        
        
<ul id="vertical"> 
    <li><a href="perfil.html">INFORMAÇÕES</a></li> 
    <li><a href="alterar_senha.html">ALTERAR SENHA</a> </li> 
    <li><a href="contato.html">CONTATO</a> </li>
    <li><a href="check_list.html">CHECK LIST</a></li> 
    <li><a href="index.html">SAIR</a></li> 
    
</ul>
      <div class="tres"></div>
      <form id="formulario">
                <label>Nome:</label> <br><input id="nome" type="text"  placeholder="Nome" required="required"> <br>
                <label>Sobrenome:</label><br> <input id="sobrenome" type="text"  placeholder="Sobrenome" required="required"><br>
                <label>Data de nascimento:</label> <br> <input id="data" type="date"  placeholder="data" required="required"><br> 
                <label>Email:</label> <br> <input id="email" type="text"  placeholder="Email" required="required"><br> 
                <button id="botao" type="button">ATUALIZAR</button>
      </form>
    
      
        
    </body>    
</html>

