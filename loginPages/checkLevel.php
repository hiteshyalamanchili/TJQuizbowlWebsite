<?php
	if($_SESSION['level'] < $req_level)
	{
		header('Location: ./index.php');
		exit();
	}

?>