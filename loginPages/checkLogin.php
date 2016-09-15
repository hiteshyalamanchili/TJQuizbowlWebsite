<?php
    session_start(); 
	if(!isset($_SESSION['auth']))
	{
		//header('Location: ./tjiat.php');//use near tournament dates
		header('Location: .');//use for normal times
		exit();
	}

?>
