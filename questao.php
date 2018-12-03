<?php
  
  // INFORMAÇÕES DO MYSQL;
  $host = "localhost";
  $usuario = "root";
  $pass = "";
  $db = "vestibulando";

  // conectando com o BD
  $conexao = mysqli_connect($host, $usuario, $pass, $db) or die (mysql_error());
  mysqli_select_db($conexao, $db);
  mysqli_autocommit($conexao, TRUE);


  // Pegar informações via GET (link)
  $id_disc = $_GET["id_disc"];
  $id_cont = $_GET["id_cont"];
  $num_exerc = $_GET["num_exerc"];

  // Comando Exercicio
  $comando_questao = "SELECT e.exercicio, id_alternativa, e.id_exerc, c.id_cont, alternativa 
                          FROM alternativas a
                          INNER JOIN exercicios e ON e.id_exerc = a.id_exerc
                          INNER JOIN conteudo c ON e.id_cont = c.id_cont
                          WHERE e.id_disc = " . $id_disc . " AND c.id_cont = " . $id_cont . " AND " . " e.num_exerc = " . $num_exerc . ";";            

  $buscar_questao = mysqli_query($conexao, $comando_questao);
  $mostrar_questao = mysqli_fetch_assoc($buscar_questao);

  // Exercicio
  $questao_exerc =  $mostrar_questao["exercicio"];

  // Comando Alternativa
  $comando_questao = "SELECT alternativa 
                          FROM alternativas a
                          INNER JOIN exercicios e ON e.id_exerc = a.id_exerc
                          INNER JOIN conteudo c ON e.id_cont = c.id_cont
                          WHERE e.id_disc = " . $id_disc . " AND c.id_cont = " . $id_cont . " AND " . " e.num_exerc = " . $num_exerc . ";";            

  $buscar_alternativa = mysqli_query($conexao, $comando_questao);
  $mostrar_alternativa = mysqli_fetch_assoc($buscar_questao);
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Vestibulando</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="questao.css" rel="stylesheet">
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
      <h3>BIOLOGIA - Exercícios: Ácidos nucléicos </h3>
      
      <div id="questao">
          <br>   
          
          <b><p> 
            <?php echo $questao_exerc ?>
          </p></b>
      
          <?php
            $link = "responder.php?id_disc=" . $id_disc . "&id_cont=" . $id_cont . "&num_exerc=" . $num_exerc;
          ?>
          <b> <div id="checkbox">
            <?php
            echo '<form action="' . $link . '" method="POST">';
            $cont = 0;
            ?>
              <br><br>

              <?php while($alternativa = $buscar_alternativa -> fetch_array()){
                //echo "oi <br>"; 
                $cont += 1;
                echo '<input type="radio" name="resposta" value="' . $cont . '"/> <label>' . $alternativa["alternativa"]  .  '</label><br><br>';
                };
              ?>
              <br>        
             <button type="submit" id="responder" type="button"> RESPONDER </button>

            <?php             
              $link = "proxima_quest.php?id_disc=" . $id_disc . "&id_cont=" . $id_cont . "&num_exerc=" . $num_exerc;

             echo '<a id="botao" class="botao" href=' . $link . '> PRÓXIMA </a>'
             ?>
            </form>


        </div>
          </b>  
          <br>
          <br>
          <br>
      </div>
      <br><br><br>
      <br><br><br>
</body>    
</html>