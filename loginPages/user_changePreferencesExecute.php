<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
	require('checkLogin.php');
	include('mySQLimport.php');
	$username = $_SESSION['username'];
	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];
	$email = $_SESSION['email'];
	$grade = $_SESSION['grade'];
	if($_POST['fname'] != '')
		$fname = $_POST['fname'];
	if($_POST['lname'] != '')
		$lname = $_POST['lname'];
	if($_POST['email'] != '')
		$email = $_POST['email'];
	if($_POST['grade'] != '')
		$grade = $_POST['grade'];

	mysql_connect($mySQL_host,$mySQL_user,$mySQL_pass) or die('Couldn\'t connect to mysql');
	mysql_select_db($mySQL_data) or die('Couldn\'t get to DB');
	$query = mysql_query('UPDATE ' . $mySQL_users . ' SET fname=\'' . $fname . '\',lname=\'' . $lname . '\',email=\'' . $email . '\',grade=\'' . $grade . '\' where username=\'' . $username . '\';');


	if(!($query))
	{
		header('Location: ../memberPages/changePreferences.php?error=changepref');
	} else {
		$_SESSION['fname'] = $fname;
		$_SESSION['lname'] = $lname;
		$_SESSION['email'] = $email;
		$_SESSION['grade'] = $grade;
		header('Location: ../memberPages/changePreferences.php?success=changepref');
	}
?>
