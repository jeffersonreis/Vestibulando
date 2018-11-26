<?php
    session_start();

    $host = "localhost";
    $usuario = "root";
    $pass = "";
    $db = "vestibulando";

    $conexao = mysqli_connect($host, $usuario, $pass, $db) or die (mysql_error());
    mysqli_select_db($conexao, $db);
    mysqli_autocommit($conexao, TRUE);

    // Pega o email da seção atual
    $email_session = $_SESSION['email'];


    // Com base no email da seção, pega as demais informações do BD.
    $comando_buscar = "SELECT * FROM usuarios WHERE email = '" . $email_session . "'";
    $busca = mysqli_query($conexao, $comando_buscar);
    
    // Transforma os dados em uma array (valor ordenado, tipo dicionario)
    $mostrar = mysqli_fetch_assoc($busca);

    // Então, para capturar as informações...
    $nome = $mostrar['nome'];
    $sobrenome = $mostrar['sobrenome'];
    $dat_nasc = $mostrar['dat_nasc'];


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
            <a href="principal.php" class="perfil"> PÁGINA PRINCIPAL </a>
        </div>
    </menu>
  
        
        
        
<ul id="vertical"> 
    <li><a href="perfil.html">INFORMAÇÕES</a></li> 
    <li><a href="alterar_senha.html">ALTERAR SENHA</a> </li> 
    <li><a href="contato.html">CONTATO</a> </li>
    <li><a href="check_list.php">CHECK LIST</a></li> 
    <li><a href="deslogar.php">SAIR</a></li> 
    
</ul>
      <div class="tres"></div>
      <form id="formulario" method='POST' action='alterando_informacoes.php'>
                <label>Nome: <?php echo $nome?></label> <br><input id="nome" name="nome" type="text"  placeholder="Escreva para alterar o Nome"> <br>

                <label>Sobrenome: <?php echo $sobrenome?></label><br> <input id="sobrenome" name="sobrenome" type="text"  placeholder="Escreva para alterar o Sobrenome"><br>

                <label>Data de nascimento: <?php echo $dat_nasc?></label> <br> <input id="data" name="dat_nasc" type="date"  placeholder="Escreva para alterar a data"><br> 

                <button id="botao" type="submit">ATUALIZAR</button>
      </form>
    
      
        
    </body>    
</html>