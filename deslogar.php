<?php

	function excluirCookies(){
            setcookie("email", "", time() - $this->tempo_cookie);
            setcookie('password', "", time() - $this->tempo_cookie);
            setcookie("tp_usuario", "", time() - $this->tempo_cookie);  
}

	excluirCookies();
    session_destroy();
	header("Location: index.php");
?>