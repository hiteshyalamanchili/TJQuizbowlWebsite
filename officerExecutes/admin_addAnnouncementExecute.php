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
	function unconvertnewlines($msg)
	{
		return str_replace("<br>","\n",str_replace("<br />","\n",$msg));
	}

	$name = $_SESSION['fname'] . " " . $_SESSION['lname'];
	$senderEmail = $_SESSION['email'];
	$currdate = getdate();
	$date = $currdate['year'] . '-' . $currdate['mon'] . '-' . $currdate['mday'];
	$time = $currdate['hours'] . ':' . $currdate['minutes'] . ':' . $currdate['seconds'];
	$message = convertnewlines(htmlentities($_POST['message'], ENT_QUOTES));
	$title = $_POST['title'];
	$choiceEmail = $_POST['emailChoice'];
	$visiblity = $_POST['visibility'];

	mysql_connect($mySQL_host,$mySQL_user,$mySQL_pass) or die('Couldn\'t connect to mysql');
	mysql_select_db($mySQL_data) or die('Couldn\'t get to DB');
	$query = mysql_query('INSERT INTO ' . $mySQL_announcements . ' (postdate, posttime, subject, message, author, visibility) VALUES (\'' . $date . '\',\'' . $time . '\',\'' . $title . '\',\'' . $message . '\',\'' . $name . '\',\'' . $visibility . '\');');
	$query = 1;
	if(!$query)
	{
		header('Location: ./admin_addAnnouncementForm.php?error=addannounce');
	}
	$sig = "\n\n_______________________________________________\n" . $name . "\n\nIf you wish to be removed from this e-mail list, please contact the webmaster (rehgolant@gmail.com)";
	$mailbody = stripslashes($_POST['message']);
	if($choiceEmail == "NoAlum")
	{
		mail("quizbowl@lists.tjhsst.edu", $title, $mailbody.$sig,"From: ".$name." <".$senderEmail."> \r\n");
	}
	elseif($choiceEmail == "Officers")
	{
		mail("quizbowl-officers@lists.tjhsst.edu", $title, $mailbody.$sig,"From: ".$name." <".$senderEmail."> \r\n");
	}
	elseif($choiceEmail == "Parents")
	{
		mail("quizbowl-parents@lists.tjhsst.edu", $title, $mailbody.$sig,"From: ".$name." <".$senderEmail."> \r\n");
	}

//
//	THIS COMMENTED PART IS THE OLD METHOD
//
//	DON'T UNCOMMENT IT
//
//
/*	else
	{
		$to = "";
		$from = "";
		$mailtitle = "";
		
		if ($choiceEmail == 'All')
		{
			$emailquery = mysql_query('SELECT * FROM ' . $mySQL_users);
			$to = "";
			if(mysql_num_rows($emailquery) != 0)
			{
				while(($nextUser = mysql_fetch_assoc($emailquery)) !== false)
					{
					$to = $to . $nextUser['fname'] . " " . $nextUser['lname'] . " < " . $nextUser['email'] . " >, ";
					}
				$to = substr($to, 0, strlen($to)-2);
				$from = $name;
				$mailtitle = "[IA] " . $title;
				$mailbody = $_POST['message'];
				$mailbody = $mailbody . "\n\n------------------\n" . $from . "\n\nIf you wish to be removed from this e-mail list, please contact the webmaster (smilack@gmail.com)";
				$mailbody = html_entity_decode($mailbody, ENT_QUOTES);
				mail($to, $mailtitle, stripslashes($mailbody), "From:" . $from . " <" . $senderEmail . "> \r\n");
			}
		}
		if ($choiceEmail == 'NoAlum')
		{
			$emailquery = mysql_query('SELECT * FROM ' . $mySQL_users . ' WHERE grade < 13;');
			$to = "";
			if(mysql_num_rows($emailquery) != 0)
			{
				while(($nextUser = mysql_fetch_assoc($emailquery)) !== false)
					{
					$to = $to . $nextUser['fname'] . " " . $nextUser['lname'] . " < " . $nextUser['email'] . " >, ";
					}
				$to = substr($to, 0, strlen($to)-2);
				$from = $name;
				$mailtitle = "[IA] " . $title;
				$mailbody = $_POST['message'];
				$mailbody = $mailbody . "\n\n------------------\n" . $from . "\n\nIf you wish to be removed from this e-mail list, please contact the webmaster (smilack@gmail.com)";
				$mailbody = html_entity_decode($mailbody, ENT_QUOTES);
				mail($to, $mailtitle, stripslashes($mailbody), "From:" . $from . " <" . $senderEmail . "> \r\n");
			}
		}
		if ($choiceEmail == 'AlumOnly')
		{
			$emailquery = mysql_query('SELECT * FROM ' . $mySQL_users . ' WHERE grade = 13 OR level = 3;');
			$to = "";
			if(mysql_num_rows($emailquery) != 0)
			{
				while(($nextUser = mysql_fetch_assoc($emailquery)) !== false)
					{
					$to = $to . $nextUser['fname'] . " " . $nextUser['lname'] . " < " . $nextUser['email'] . " >, ";
					}
				$to = substr($to, 0, strlen($to)-2);
				$from = $name;
				$mailtitle = "[IA] " . $title;
				$mailbody = $_POST['message'];
				$mailbody = $mailbody . "\n\n------------------\n" . $from . "\n\nIf you wish to be removed from this e-mail list, please contact the webmaster (smilack@gmail.com)";
				$mailbody = html_entity_decode($mailbody, ENT_QUOTES);
				mail($to, $mailtitle, stripslashes($mailbody), "From:" . $from . " <" . $senderEmail . "> \r\n");
			}
		}

		if ($choiceEmail == 'RetMemb')
		{
			$emailquery = mysql_query('SELECT * FROM ' . $mySQL_users . ' WHERE qwaiver<1 AND grade < 13;');
			$to = "";
			if(mysql_num_rows($emailquery) != 0)
			{
				while(($nextUser = mysql_fetch_assoc($emailquery)) !== false)
					{
					$to = $to . $nextUser['fname'] . " " . $nextUser['lname'] . " < " . $nextUser['email'] . " >, ";
					}
				$to = substr($to, 0, strlen($to)-2);
				$from = $name;
				$mailtitle = "[IA] " . $title;
				$mailbody = $_POST['message'];
				$mailbody = $mailbody . "\n\n------------------\n" . $from . "\n\nIf you wish to be removed from this e-mail list, please contact the webmaster (smilack@gmail.com)";
				$mailbody = html_entity_decode($mailbody, ENT_QUOTES);
				mail($to, $mailtitle, stripslashes($mailbody), "From:" . $from . " <" . $senderEmail . "> \r\n");
			}
		}
		if ($choiceEmail == 'Officers')
		{
			$emailquery = mysql_query('SELECT * FROM ' . $mySQL_users . ' WHERE level >= 2;');
			$to = "";
			if(mysql_num_rows($emailquery) != 0)
			{
				while(($nextUser = mysql_fetch_assoc($emailquery)) !== false)
					{
					$to = $to . $nextUser['fname'] . " " . $nextUser['lname'] . " < " . $nextUser['email'] . " >, ";
					}
				$to = substr($to, 0, strlen($to)-2);
				$from = $name;
				$mailtitle = "[IA] " . $title;
				$mailbody = $_POST['message'];
				$mailbody = $mailbody . "\n\n------------------\n" . $from . "\n\nIf you wish to be removed from this e-mail list, please contact the webmaster (smilack@gmail.com)";
				$mailbody = html_entity_decode($mailbody, ENT_QUOTES);
				mail($to, $mailtitle, stripslashes($mailbody), "From:" . $from . " <" . $senderEmail . "> \r\n");
				echo $to;
			}
		}
		*/
		/*$filehandle = fopen("mail_log.txt", 'a');

		$logstring = "Date: " . date("D M jS Y, G:i:s") . "\r\n";
		$logstring .= "From: " . $from . "\r\n";
		$logstring .= "To: " . $to . "\r\n";
		$logstring .= "Title: " . $mailtitle . "\r\n\r\n\r\n";

		$fwrite($filehandle, $logstring);
		$fclose($filehandle);*/

		header('Location: ./admin_addAnnouncementForm.php?success=addannounce');
	
?>
