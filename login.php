<?php 
  
  // Dados do MySQL
  $host = 'localhost';
  $usuario = 'root';
  $pass = '';
  $db = 'vestibulando';

  // Conectando no mysql
  $connect = mysqli_connect($host, $usuario, $pass, $db) or die (mysql_error());
  mysqli_select_db($connect, $db); // Tipo 'use'
  mysqli_autocommit($connect, TRUE);


  // Pegando as informacoes do email
  $email = $_POST['email'];
  $entrar = $_POST['entrar'];
  $senha = $_POST['senha'];

  $comando_verificar = "SELECT * FROM usuarios WHERE email = '" . $email . "' AND senha = '" . $senha . "'";
  echo $comando_verificar;

    // Se foi pressionado o botao ENTRAR...
    if (isset($entrar)) {

      //Verifica se existe o usuario com a mesma senha...
      $verifica = mysqli_query($connect, $comando_verificar);

        // Se retornar nenhum, não tem.
        if (mysqli_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('email e/ou senha incorretos');window.location.href='login.html';</script>";
          #echo 'email ERRADO';
          die(); 

        // Se tiver, volta para o HOME.
        }else{
          #echo 'email CERTO';
          setcookie("email",$email);
          header("Location:index.php");
        }
    }


?>