<?php 
    session_start();
    // Config mysql

    $host = "localhost";
    $usuario = "root";
    $pass = "";
    $db = "vestibulando";

    $conexao = mysqli_connect($host, $usuario, $pass, $db) or die (mysql_error());
    mysqli_select_db($conexao, $db);
    mysqli_autocommit($conexao, TRUE);

    // Pega o email da seção atual
    $email_session = $_SESSION['email'];

    $comando_iduser = "SELECT id FROM usuarios WHERE email = '" . $email_session . "';";
    $busca = mysqli_query($conexao, $comando_iduser);
    $id_user = mysqli_fetch_assoc($busca);

    // Definir qual matéria deseja (1 = biologia)
    $disciplina = 1;

    // Pega todos os conteúdos da matéria definida anteriormente
    $comando_buscar = "SELECT nome_cont as conteudo, nome_disc as disciplina, id_cont
                        FROM conteudo c
                        INNER JOIN disciplina d ON c.id_disc =d.id_disc
                        WHERE d.id_disc = " . $disciplina . ";";

    // echo $comando_buscar;
    $busca = mysqli_query($conexao, $comando_buscar);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Vestibulando</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="check_list.css" rel="stylesheet">
    </head>
<body>
    <menu id="main-nav">
        <div id="nav">
            <a href="index.html"><img src="imagens/logo.png" id="logo"/></a>
            <a href="perfil.php" class="perfil"> PERFIL </a>
        </div>
    </menu>
  
        
        
        
<ul id="vertical"> 
    <li><a href="#">CONTEÚDOS</a>
        <ul> 
                <li><a href="cont_bio.html">BIOLOGIA</a></li> 
                <li><a href="cont_.html">QUÍMICA</a></li> 
                <li><a href="cont_fis.html">FÍSICA</a></li> 
                <li><a href="cont_mat.html">MATEMÁTICA</a></li> 
                <li><a href="cont_geo.html">GEOGRAFIA</a></li>
                <li><a href="cont_his.html">HISTÓRIA</a></li> 
                <li><a href="cont_por.html">PORTUGUÊS</a></li> 
                <li><a href="cont_ing.html">INGLÊS</a></li> 
                <li><a href="cont_esp.html">ESPANHOL</a></li> 
                <li><a href="cont_fs.html">FILOSOFIA e SOCIOLOGIA</a></li> 
        </ul>
    </li>
    <li><a href="#">EXERCÍCIOS</a>
        <ul> 
                <li><a href="exerc_bio.html">BIOLOGIA</a></li> 
                <li><a href="#">QUÍMICA</a></li> 
                <li><a href="#">FÍSICA</a></li> 
                <li><a href="#">MATEMÁTICA</a></li> 
                <li><a href="#">GEOGRAFIA</a></li>
                <li><a href="#">HISTÓRIA</a></li> 
                <li><a href="#">PORTUGUÊS</a></li> 
                <li><a href="#">INGLÊS</a></li> 
                <li><a href="#">ESPANHOL</a></li> 
                <li><a href="#">FILOSOFIA e SOCIOLOGIA</a></li> 
        </ul>
    </li> 
    <li><a href="#">REDAÇÃO</a> 
      <ul> 
        <li><a href="dica_red.html">DICAS</a></li> 
        <li><a href="temas_red.html">TEMAS</a></li>
      </ul> 
    </li>
    <li><a href="check_list.php">CHECK LIST</a></li> 
    <li><a href="dicas_estudo.html">DICAS DE ESTUDO</a></li> 
    
</ul>
      <div class="tres"></div>
      <h3> CHECK LIST </h3>
      
      <?php ?>

      <p> Marque os conteúdos que já estudou!</p>
      <h6>BIOLOGIA </h6>
      
          <b> <div id="checkbox">

          <form action=checkando.php method="post">

            <?php

            // Criamos então um while com todos os resultados da busca do BD
            while ($conteudo = $busca->fetch_array()) {

                // criamos um comando para ver se o conteúdo selecionado está 'checkado' no usuário ou não, para isso, pegamos o id do conteúdo e vemos se o usuário tem esse id na relação entre ele e o checklist.


                $comando = "SELECT o.id_cont
                            FROM check_list c INNER JOIN usuarios u ON c.id = u.id
                                INNER JOIN disciplina d ON c.id_disc = d.id_disc
                                INNER JOIN conteudo o ON c.id_cont = o.id_cont
                            WHERE o.id_cont = " . $conteudo['id_cont'] . " AND u.id = '" . $id_user['id'] . "';";

                $verifica = mysqli_query($conexao, $comando);
                
                // Se tiver algum resultado... ira gerar um código com "checked"
                if (mysqli_num_rows($verifica)>0){
                    echo '<input type="checkbox" id="check" name="' . $conteudo["id_cont"] . '" value="scales" checked/>
                    <label for="scales">' . $conteudo["conteudo"] . '</label>
                    <br>
                    <br>';
                }

                // Se não sem 'checked'
                else{
                    echo '<input type="checkbox" id="check" name="' . $conteudo["id_cont"] . '" value="scales"/>
                    <label for="scales">' . $conteudo["conteudo"] . '</label>
                    <br>
                    <br>';
                };
};
?>
        </div>
        <button id="botao" type="submit">ALTERAR</button>

    </form>
          </b>
</body>    
</html>