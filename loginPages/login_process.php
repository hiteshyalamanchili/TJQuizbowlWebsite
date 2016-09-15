<?php

$user = $_POST['username'];
$pass = $_POST['password'];

$datetime = date('Y-m-d H:i:s');

include('mySQLimport.php');
mysql_connect($mySQL_host,$mySQL_user,$mySQL_pass);
mysql_select_db($mySQL_data);

$goodPass = 0;
$adminLog = 0;


$query = mysql_query('SELECT * from ' . $mySQL_users . ' WHERE username=\'' . $user . '\';');
if (mysql_num_rows($query) != 0)
{
	while(($nextLogin = mysql_fetch_assoc($query)) !== false)
	{
		if ($nextLogin['username'] == $user && $nextLogin['password'] == md5($pass))
		{
			$goodPass = 1;
			if ($nextLogin['level'] == 3)
			{
				$adminLog = 1;
			}
		}
	}
	
$query = mysql_query('SELECT * from ' . $mySQL_users . ' WHERE username=\'' . $user . '\';');
$result = mysql_fetch_assoc($query);
}
if ($goodPass)
{
    if (!$adminLog)
    {
        $query = mysql_query("UPDATE " . $mySQL_users . " SET lastlogin = \"" . $datetime . "\" WHERE ID=" . $result['ID'] . ";");
    }
    session_start();
    $_SESSION['auth'] = true;
    $_SESSION['username'] = $user;
    $_SESSION['password'] = $actualPass;
    $_SESSION['fname'] = $result['fname'];
    $_SESSION['lname'] = $result['lname'];
    $_SESSION['grade'] = $result['grade'];
    $_SESSION['level'] = $result['level'];
    $_SESSION['email'] = $result['email'];
    $_SESSION['numQ'] = $result['numquestions'];
    $_SESSION['qWaiver'] = $result['qwaiver'];
    $_SESSION['qemail'] = $result['qemail'];
    $_SESSION['ID'] = $result['ID'];

    if($_POST['dest'] == "") {
       header('Location: ../index.php');
    } else {
        header("Location: http://activities.tjhsst.edu/quizbowl/2008tjiat/RedesignWebsite/{$_POST['dest']}");
    }
}
else
{
header('Location: http://activities.tjhsst.edu/quizbowl/2008tjiat/RedesignWebsite/index.php');

}

?>
