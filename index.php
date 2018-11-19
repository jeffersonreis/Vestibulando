<?php
  	$login_cookie = $_COOKIE['email'];
  	

	if(isset($login_cookie)){
	  echo"Bem-Vindo, $login_cookie <br>";
	  echo"Essas informações <font color='red'>PODEM</font> ser acessadas por você";

	}else{
	  echo"Bem-Vindo, convidado <br>";
	  echo"Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por você";
	  echo"<br><a href='login.html'>Faça Login</a> Para ler o conteúdo";
	}

?>

<!DOCTYPE html>
<html>
    <head>
    	<title>HOME</title>
    </head>

    <body>
		<form class="sair-form" method="POST" action="deslogar.php">
			<p class="message">SAIR<a href="deslogar.php">SAIR</a></p>
		</form>
	</body>
</html>
