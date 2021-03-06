<?php 
    require('../loginPages/checkLogin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TJHSST Quizbowl Tournaments</title>

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
    
    <link href="collapsiblePanel.css" rel="stylesheet" type="text/css">

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
                            <li><a href=\"changePreferences.php\"><i class=\"fa fa-gear fa-fw\"></i> Change Preferences</a>
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
                                    <a href=\"tournaments.php\">Tournaments</a>
                                </li>
                                <li>
                                    <a href=\"announcements.php\">Announcements</a>
                                </li>
                                <li>
                                    <a href=\"forms.php\">Documents/Other Information</a>
                                </li>
                                <li>
                                    <a href=\"requirements.php\">Requirements</a>
                                </li>
                                <li>
                                    <a href=\"memberResources.php\">Member Resources</a>
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
                                    <a href=\"calendar.php\">Calendar</a>
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
                        <h1 class="page-header">Tournaments</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                             <h4 class="panel-title">
                                Upcoming Tournaments
                                </h4>
                            </div>
                            <div class="panel-body">
                                

<?php
include('../loginPages/mySQLimport.php');

$currdate = getdate();
$date = $currdate['year'] . '-' . $currdate['mon'] . '-' . $currdate['mday'];
$time = $currdate['hours'] . ':' . $currdate['minutes'] . ':' . $currdate['seconds'];
mysql_connect($mySQL_host,$mySQL_user,$mySQL_pass) or die('Couldn\'t connect to mysql');
mysql_select_db($mySQL_data) or die('Couldn\'t get to DB');
$upcomingQuery = mysql_query("SELECT * FROM " . $mySQL_tournaments . " WHERE date >= \"" . $date . "\" ORDER BY date ASC") or die('Couldn\'t make query');

if(mysql_num_rows($upcomingQuery) == 0)
	echo '<strong><p>There are no upcoming tournaments. Please check back frequently for updates.</p></strong>';
else {
/*	if((isset($_GET['hideNames']) && $_GET['hideNames']=='true') || (isset($_GET['hideNames']) && $_GET['hideNames']!='false' && isset($_SESSION['level']) && $_SESSION['level'] < 2))//officers who have specifically requested to hide, or users who have not specifically requested not to hide
		echo "<div><a href=\"tournaments.php?hideNames=false\">Show lists of names</a></div>";
	else {
		echo "<div><a href=\"tournaments.php?hideNames=true\">Hide lists of names</a>";
		echo "<p>Names in <b><i>bold italics</i></b> are team captains.</p></div>";
	}*/
            echo "<div class=\"table-responsive\"><table class=\"table\">";
	while(($nextTourn = mysql_fetch_assoc($upcomingQuery)) !== false) {
        echo "<tr><td>";
		echo "<h4><a href=\"tournament_detail.php?tournID=" . $nextTourn['ID'] . "\">" . $nextTourn['name'] . "</a></h4>" . "\n";
		echo "<h5>(" . $nextTourn['date'] . ")</h5>\n";
        		if((isset($_SESSION['level']) && $_SESSION['level'] >= 2 && !(isset($_GET['hideNames']) && $_GET['hideNames']=='true'))|| (isset($_GET['hideNames']) && $_GET['hideNames']=='false')) {//officers who have not specifically requested to hide and users who have specifically requested not to hide
			$attendQuery = mysql_query('
			SELECT signups.ID, signups.userID, users.fname, users.lname, signups.tournID, signups.numDrive, signups.team, signups.captain
			FROM ' . $mySQL_signups . '
			LEFT JOIN users ON users.ID = signups.userID
			WHERE tournID=\'' . $nextTourn['ID'] . '\'
			ORDER BY team, captain DESC, lname ASC;
			');
			if(mysql_num_rows($attendQuery) > 0) {
				$numGoing = 0;
				echo "<table cellpadding=\"2\">\n";
				echo "<tr class=\"headerrow\">\n";
				echo "<th>Name</th>\n";
				echo "<th>Team</th>\n";
//				echo "<th>Captain</th>\n";
				echo "</tr>\n";

				while(($nextSignup = mysql_fetch_assoc($attendQuery)) !== false) {
					echo "<tr>\n<td>";
					$numGoing = $numGoing + 1;
					if($nextSignup['captain'])
						echo "<b><i>";
					echo "<a href=\"user_detail.php?userID=" . $nextSignup['userID'] . "\">" . $nextSignup['fname'] . " " . $nextSignup['lname'] . "</a>";
					if($nextSignup['captain'])
						echo "</i></b>";
					echo "</td>\n<td>";
					echo $nextSignup['team'];
/*
					echo "</td>\n<td>";
					if ($nextSignup['captain'])
						echo "*";
*/
					echo "</td>\n";
					echo "</tr>\n";
				}//while
				echo "<tr>\n<td>";
				echo $numGoing;
				echo " attending</td>\n</tr>\n";
				echo "</table>\n";

			}//else
		}//if
        echo "</td>";
		if (isset($_SESSION['level']) && $_SESSION['level'] >= 2) {
                
				echo "<td style=\"vertical-align:middle\">";
				echo "<a href=\"admin_updateTournamentForm.php?tournID=" . $nextTourn['ID'] . "\">Update</a>";
                echo "</td>";
				echo "<td style=\"vertical-align:middle\">";
				echo "<a href=\"admin_deleteTournamentExecute.php?tournID=" . $nextTourn['ID'] . "\">Delete</a>";
                echo "</td>";
		}
	echo "</tr>";
	}//while
    
}//else
?>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-info" id="prevTourns">
                            <div class="panel-heading">
             <h4 class="panel-title">
        <a data-toggle="collapse" data-target="#collapseOne" 
           href="#collapseOne">
          Previous Tournaments
        </a>
      </h4>                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
<?php

$previousQuery = mysql_query("SELECT * FROM " . $mySQL_tournaments . " WHERE date < \"" . $date . "\" ORDER BY date DESC") or die('Couldn\'t make query');

if(mysql_num_rows($previousQuery) == 0) {
	echo '<p>There were no previous tournaments.</p>';
}
else {
                echo "<div class=\"table-responsive\"><table class=\"table\">";
	while(($nextTourn = mysql_fetch_assoc($previousQuery)) !== false) {
        echo "<tr><td>";
		echo "<h4><a href=\"tournament_detail.php?tournID=" . $nextTourn['ID'] . "\">" . $nextTourn['name'] . "</a></h4>" . "\n";
		echo "<h5>(" . $nextTourn['date'] . ")</h5>\n";
		if (isset($_SESSION['auth']) && $_SESSION['auth'] == true) {
			/*
			echo "<p>Signed up: </p>";
			$isSignedQuery = mysql_query('SELECT * FROM ' . $mySQL_signups . ' WHERE userID = ' . $_SESSION['ID'] . ' AND tournID = ' . $nextTourn['ID']) or die('Couldn\'t make query');
			if (($signUp = mysql_fetch_assoc($isSignedQuery)) !== false) {
				echo "<p class=\"successmessage\">Yes</p>" . "\n";
				echo "<p>Driving: " . $signUp['numDrive'] . "</p>\n";
				$submitText = "Update";
				$submitLink = "user_tournamentUpdate.php?tournID=" . $nextTourn['ID'];
			}
			else {
				echo "<p class=\"failuremessage\">No</p>\n";
				$submitText = "Sign Up";
				$submitLink = "user_tournamentSignUp.php?tournID=" . $nextTourn['ID'];
			}
			*/
		}//if
	if($date >= $nextTourn['date']) {
		if($nextTourn['results'] == "") {
			echo "<b>Results for this tournament are not available.</b><br />\n\n";
		}
		else {
			$results = preg_split('/\n/',$nextTourn['results']);
			echo "<b>Results:</b><br />";
			foreach($results as $k) {
				echo "<a style=\"word-wrap: break-word;\" href=\"" . $k . "\">" . $k . "</a><br />";
			}
		}
	}
	echo "</td>";
		if (isset($_SESSION['level']) && $_SESSION['level'] >= 2) {
				echo "<td style=\"vertical-align:middle\">";
				echo "<a href=\"admin_updateTournamentForm.php?tournID=" . $nextTourn['ID'] . "\">Update</a>";
                echo "</td>";
				echo "<td style=\"vertical-align:middle\">";
				echo "<a href=\"admin_deleteTournamentExecute.php?tournID=" . $nextTourn['ID'] . "\">Delete</a>";
                echo "</td>";
		}
		echo "</tr>";
	}//while
}//else

?>
                            </table>
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