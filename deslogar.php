<?php
	session_start();
	session_destroy();		
	echo "<script language='javascript' type='text/javascript'>alert('Tchau!');window.location.href='index.html';</script>";

?>