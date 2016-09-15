<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
	require('checkLogin.php');
	include('mySQLimport.php');

	if(strcmp($_POST['newpass'],$_POST['confpass']) != 0)
	{
		header('Location: ../memberPages/changePreferences.php?error=matchconf');
		exit();
	}
	
	mysql_connect($mySQL_host,$mySQL_user,$mySQL_pass) or die('Couldn\'t connect to mysql');
	mysql_select_db($mySQL_data) or die('Couldn\'t get to DB');
	$query = mysql_query('UPDATE ' . $mySQL_users . ' SET password=\'' . md5($_POST['newpass']) . '\' WHERE username=\'' . $_SESSION['username'] . '\';');

	if(!$query)
	{
		header('Location: ../memberPages/changePreferences.php?error=changepass');
	} else {
		$_SESSION['password'] = md5($_POST['newpass']);
		header('Location: ../memberPages/changePreferences.php?success=changepass');
	}
?>		
