<?php

  // Configurando Banco de Dados
  $host = "localhost";
  $usuario = "root";
  $pass = "";
  $db = "vestibulando";

  $conexao = mysqli_connect($host, $usuario, $pass, $db) or die (mysql_error());
  mysqli_select_db($conexao, $db);
  mysqli_autocommit($conexao, TRUE);


  // Pegar informações via GET (link)
  $id_disc = $_GET["id_disc"];
  $id_cont = $_GET["id_cont"];
  $num_exerc = $_GET["num_exerc"];

  $prox_exerc = $num_exerc + 1;

  $comando_questao = "SELECT e.exercicio, id_alternativa, e.id_exerc, c.id_cont, alternativa 
                          FROM alternativas a
                          INNER JOIN exercicios e ON e.id_exerc = a.id_exerc
                          INNER JOIN conteudo c ON e.id_cont = c.id_cont
                          WHERE e.id_disc = " . $id_disc . " AND c.id_cont = " . $id_cont . " AND " . " e.num_exerc = " . $prox_exerc . ";";            

  $verificar = mysqli_query($conexao, $comando_questao);

  if(mysqli_num_rows($verificar)){
    $link = "questao.php?id_disc=" . $id_disc . "&id_cont=" . $id_cont . "&num_exerc=" . $prox_exerc;
    header('Location: ' . $link); 

  }else{
    $link = "questao.php?id_disc=" . $id_disc . "&id_cont=" . $id_cont . "&num_exerc=" . $num_exerc;
    echo "<script language='javascript' type='text/javascript'>alert('Não tem mais exercicios desse conteudo!');window.location.href='" . $link . "';</script>";
  };
?>