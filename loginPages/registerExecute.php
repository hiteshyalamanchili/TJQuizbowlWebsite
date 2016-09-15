<?php
	include('mySQLimport.php');

	
	mysql_connect($mySQL_host,$mySQL_user,$mySQL_pass) or die('Couldn\'t connect to mysql');
	mysql_select_db($mySQL_data) or die('Couldn\'t get to DB');
	
	$username = mysql_real_escape_string($_POST['username']);
	$password = md5("default");
	$fname = mysql_real_escape_string($_POST['fname']);
	$lname = mysql_real_escape_string($_POST['lname']);
	$grade = mysql_real_escape_string($_POST['grade']);
	$email = mysql_real_escape_string($_POST['email']);
	$level = 1;


//	if($username == "" || $fname == "" || $lname == "" || $email == "")
	if(strlen($username) == 0 || strlen($fname) == 0 || strlen($lname) == 0 || strlen($email) == 0) {
		header('Location: ../publicPages/register.php?error=blank');
		die();
	}
	
	//echo strlen($username) . " " . strlen($fname) . " " . strlen($lname) . " " . strlen($email);


	$okay1 = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
	if(str_replace($okay1, "", $username) != "")
    {
		header('Location: ./publicPages/register.php?error=baduname2');
    }
	$okay2 = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
	if(str_replace($okay2, "", $fname) != "" || str_replace($okay2, "", $lname) != "")
    {
		header('Location: ../publicPages/register.php?error=badname');
    }
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../publicPages/register.php?error=bademail');
}
	$testQuery = mysql_query("SELECT * FROM " . $mySQL_users . " WHERE username=\"" . $username . "\";") or die('Couldn\'t make test query');
	if(mysql_num_rows($testQuery) != 0)
	{
		header('Location: ../publicPages/register.php?error=baduname');
		die();
	}
	else
	{

	$query = mysql_query('INSERT INTO ' . $mySQL_users . ' (username, password, email, fname, lname, grade, level, qwaiver, active) VALUES (\'' . $username . '\',\'' . $password . '\',\'' . $email . '\',\'' . $fname . '\',\'' . $lname . '\',\'' . $grade . '\',\'' . $level . '\', 1, 1);');
	
	if(!$query)
	{
		header('Location: ../publicPages/register.php?error=adduser');
		die();
	} else {
		if($grade!=15){
			mail("quizbowl-subscribe@lists.tjhsst.edu", "", "", "From: ".$email);
		}
		header('Location: ../publicPages/register.php?success=adduser');
		die();
	}
	}
?>
