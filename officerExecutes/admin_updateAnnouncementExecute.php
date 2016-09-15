<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
	require('checkLogin.php');
	$req_level = 2;
	require('checkLevel.php');
	include('mySQLimport.php');

	function convertnewlines($msg)
	{
		return str_replace("\n","<br />",$msg);
	}

	$message = convertnewlines(htmlentities($_POST['message'], ENT_QUOTES));
	$title = $_POST['title'];
	$visibility = $_POST['visibility'];
	$aID = $_GET['announceID'];

	mysql_connect($mySQL_host,$mySQL_user,$mySQL_pass) or die('Couldn\'t connect to mysql');
	mysql_select_db($mySQL_data) or die('Couldn\'t get to DB');
	$query = mysql_query('UPDATE ' . $mySQL_announcements . ' SET subject=\'' . $title . '\', message=\'' . $message . '\', visibility=\'' . $visibility . '\' WHERE ID=' . $aID . ';');
	
	if(!$query)
	{
		header('Location: ./admin_updateAnnouncementForm.php?announceID=' . $aID . '&error=upannounce');
	} else {
		header('Location: ./admin_updateAnnouncementForm.php?announceID=' . $aID . '&success=upannounce');
	}
?>
