<?php
	if(isset($_SESSION)){
		session_start();
		session_destroy();
		//header("location: index.php?pag=home");					header("location: index.php");	
	}
?>