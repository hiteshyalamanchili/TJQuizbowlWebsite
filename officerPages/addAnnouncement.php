<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TJHSST Quizbowl Add Announcement</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php" style="font-size: 24px; color: #337ab7;">TJHSST Quizbowl</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <?php
                    if(isset($_SESSION['auth']) && $_SESSION['auth'] == true) {
                        echo "<li class=\"navbar-brand\">";
                        $firstname = $_SESSION['fname'];
                        $lastname = $_SESSION['lname'];
                        echo "$firstname $lastname";
                        echo "</li>";
                    }
else {
    echo "<li class=\"navbar-brand\">Not logged in</li>";
}
                ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <?php
                    if(isset($_SESSION['auth']) && $_SESSION['auth'] == true) {                        
                        echo "<ul class=\"dropdown-menu dropdown-user\">
                            <li><a href=\"#\"><i class=\"fa fa-user fa-fw\"></i> User Profile</a>
                            </li>
                            <li><a href=\"../memberPages/changePreferences.php\"><i class=\"fa fa-gear fa-fw\"></i> Change Preferences</a>
                            </li>
                            <li class=\"divider\"></li>
                            <li><a href=\"../loginPages/logout_process.php\"><i class=\"fa fa-sign-out fa-fw\"></i> Logout</a>
                            </li>
                        </ul>
                    </li>";
                    }
                        else {
                        echo "<ul class=\"dropdown-menu dropdown-user\">
                             <div class=\"row\">
                                <div class=\"col-lg-6\">
                            <form style=\"padding: 8px;\" role=\"form\" action=\"../loginPages/login_process.php\" method=\"post\">
                            <fieldset class=\"loginForm\">
                                <input class=\"form-control\" type=\"hidden\" name=\"dest\" value=\"";
                                echo isset($_GET['dest']) ? $_GET['dest'] : " ";
                            echo "\" />
                            <div class=\"form-group\">
                            <label for=\"username\">Username</label>
                            <input type=\"text\" name=\"username\" id=\"username\" />
                            </div>
                            <div class=\"form-group\">
                            <label for=\"password\">Password</label>
                            <input type=\"password\" name=\"password\" id=\"password\" />
                            </div>
                            <input class=\"btn btn-default\" type=\"submit\" value=\"Log in\" />
                            </fieldset>
                            </form></div></div>
            </ul>
            </li>"; } ?>
            <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
  
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="../index.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="../publicPages/about.php"><i class="fa fa-info-circle fa-fw"></i> About Us</a>
                        </li>
                    <?php
if(isset($_SESSION['auth']) && $_SESSION['auth'] == true) { }
else {
    echo "<li>
                            <a href=\"../publicPages/register.php\"><i class=\"fa fa-user-plus fa-fw\"></i> Register</a>
                        </li>";
} ?>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Members<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../publicPages/officers.php">Officers</a>
                                </li>
                                <li>
                                    <a href="../publicPages/members.php">Current Members</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bookmark fa-fw"></i> Quizbowl Resources<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="http://hsquizbowl.org/db/" target="_blank">Quizbowl Research Center</a>
                                </li>
                                <li>
                                    <a href="http://www.quizbowlpackets.com/" target="_blank">Quizbowl Packet Archive</a>
                                </li>
                                <li>
                                    <a href="http://quinterest.org/" target="_blank">Searchable Question Archive</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="../publicPages/contact.php"><i class="fa fa-envelope fa-fw"></i> Contact Us</a>
                        </li>
                        <?php
                        if(isset($_SESSION['auth']) && $_SESSION['auth'] == true) { 
                        echo "<li>
                        <a href=\"#\"><i class=\"fa fa-dashboard fa-fw\"></i> Member Options<span class=\"fa arrow\"></span></a>
                            <ul class=\"nav nav-second-level\">
                                <li>
                                    <a href=\"../memberPages/tournaments.php\">Tournaments</a>
                                </li>
                                <li>
                                    <a href=\"../memberPages/announcements.php\">Announcements</a>
                                </li>
                                <li>
                                    <a href=\"../memberPages/forms.php\">Documents/Other Information</a>
                                </li>
                                <li>
                                    <a href=\"../memberPages/requirements.php\">Requirements</a>
                                </li>
                                <li>
                                    <a href=\"../memberPages/memberResources.php\">Member Resources</a>
                                </li>";
                                if(!$_SESSION['qWaiver']) {
                                echo "<li>
                                    <a href=\"../../../questions/index.php\">Question Database</a>
                                </li>
                                <li>
                                    <a href=\"../../../CSOOBES/index.php\">Charter MS Set</a>
                                </li>";
                                }
                                echo "<li>
                                    <a href=\"../memberPages/calendar.php\">Calendar</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>";
                        } ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add an Announcement</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                            <?php
if($_GET['error'] == 'upannounce')
{
echo "<p class=\"failuremessage\">Error updating announcement.</p>";
}
if($_GET['success'] == 'upannounce')
{
echo "<p class=\"successmessage\">Announcement updated.</p>";
}

	function unconvertnewlines($msg)
	{
		return str_replace("<br>","\n",str_replace("<br />","\n",$msg));
	}

$announceID = $_GET['announceID'];
mysql_connect($mySQL_host,$mySQL_user,$mySQL_pass) or die('Couldn\'t connect to mysql');
mysql_select_db($mySQL_data) or die('Couldn\'t get to DB');
$query = mysql_query('SELECT * FROM ' . $mySQL_announcements . ' WHERE ID=' . $announceID) or die('Couldn\'t make query');
if(mysql_num_rows($query) == 0)
	{
	echo 'No such announcement.';
	}
else
	{
		$nextAnnounce = mysql_fetch_assoc($query);
		$announceTitle = $nextAnnounce['subject'];
		$announceMessage = unconvertnewlines($nextAnnounce['message']);
		$announceVisibility = $nextAnnounce['visibility'];
	}
?>
                                        <form action="../officerExecutes/admin_addAnnouncementExecute.php" method="post" role="form">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input id="title" name="title" class="form-control" value="<?php echo $announceTitle;?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Message</label>
                                                <textarea id="message" name="message" class="form-control" placeholder="e.g. John">
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input name="lname" class="form-control" placeholder="e.g. Doe">
                                            </div>
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input name="email" class="form-control" placeholder="e.g. john.doe@gmail.com">
                                            </div>
                                            <div class="form-group">
                                                <label>Grade</label>
                                                <select name="grade" class="form-control">
                                                    <option>9</option>
                                                    <option>10</option>
                                                    <option>11</option>
                                                    <option>12</option>
                                                    <option>Alum</option>
                                                    <option>Sponsor</option>
                                                    <option>Charter Collaborator</option>
                                                </select>
                                                <p class="help-block">Wilmington Charter collaborators, please select "Charter Collaborator" in the options above.</p>
                                            </div>
                                            <button type="submit" value="Add User" class="btn btn-default">Submit</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                            <div class="form-group">
                                            <?php
if(isset($_GET['error']) && $_GET['error'] == 'adduser')
{
echo "<p style=\"color: red;\" class=\"help-block failuremessage\">Error adding user.</p>";
}
if(isset($_GET['error']) && $_GET['error'] == 'baduname')
{
echo "<p style=\"color: red;\"  class=\"help-block failuremessage\">Error adding user - Username already exists.  Please use your TJ username.</p>";
}
if(isset($_GET['error']) && $_GET['error'] == 'baduname2')
{
echo "<p style=\"color: red;\"  class=\"help-block failuremessage\">Error adding user - TJ usernames contain only letters and numbers.</p>";
}
if(isset($_GET['error']) && $_GET['error'] == 'badname')
{
echo "<p style=\"color: red;\"  class=\"help-block failuremessage\">Error adding user - First and last names usually contain only letters.</p>";
}
if(isset($_GET['error']) && $_GET['error'] == 'bademail')
{
echo "<p style=\"color: red;\"  class=\"help-block failuremessage\">Error adding user - The email entered is invalid.</p>";
}
if(isset($_GET['error']) && $_GET['error'] == 'blank')
{
echo "<p style=\"color: red;\"  class=\"help-block failuremessage\">Error adding user - Please do not leave anything blank.</p>";
}
if(isset($_GET['success']) && $_GET['success'] == 'adduser')
{
echo "<p style=\"color: green;\"  class=\"help-block successmessage\">User Added - Please log in (default password is \"default\") and change your password <strong>immediately</strong> in user preferences in the top-right corner after logging in.</p>";
}
?>
                                            </div>
                                        </form>
                                        
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
