<?php
  	$login_cookie = $_COOKIE['login'];
  	$sair = $_POST['sair'];

	if(isset($login_cookie)){
	  echo"Bem-Vindo, $login_cookie <br>";
	  echo"Essas informações <font color='red'>PODEM</font> ser acessadas por você";
	}else{
	  echo"Bem-Vindo, convidado <br>";
	  echo"Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por você";
	  echo"<br><a href='login.html'>Faça Login</a> Para ler o conteúdo";
	}

	if (isset($sair)) {

		session_start(); //iniciamos a sessão que foi aberta
		session_destroy(); //destruimos a sessão ;)
		session_unset();
		
		echo "<script language='javascript' type='text/javascript'>alert('USUARIO DESLOGADO');window.location.href='login.html';</script>";
		}

?>