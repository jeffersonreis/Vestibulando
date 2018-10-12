<?php 
 

// preenchimento dos dados do mysql
$host = 'localhost';
$usuario = 'root';
$pass = '';
$db = 'vestibulando';


// conectara o php ao mysql, caso contrario ira apresentar a mensagem de erro do banco.
$connect = mysqli_connect($host, $usuario, $pass, $db) or die (mysql_error());

// Igual o 'use' do mysql
mysqli_select_db($db);
mysqli_autocommit($connect, TRUE);


$login=$_POST['login'];
$senha=$_POST['senha'];  

$query_select = "SELECT login FROM usuarios WHERE login = '$login'";
$select = mysqli_query($query_select,$connect);
$array = mysqli_fetch_array($select);
$logarray = $array['login'];
 
  if($login == "" || $login == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastro.html';</script>";
 
    }else{
      if($logarray == $login){
 
        echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.html';</script>";
        die();
 
      }else{
        $query = "INSERT INTO usuarios (login,senha) VALUES ('$login','$senha')";
        $insert = mysqli_query($connect, $query);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
        }
      }
    }
?>