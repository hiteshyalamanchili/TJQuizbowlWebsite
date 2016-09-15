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

    <title>TJHSST Quizbowl</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand" href="index.php" style="font-size: 24px; color: #337ab7;">TJHSST Quizbowl</a>
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
                            <li><a href=\"memberPages/user_profile.php?userID=";
                            echo $_SESSION['ID'];
                            echo "\"><i class=\"fa fa-user fa-fw\"></i> User Profile</a>
                            </li>
                            <li><a href=\"memberPages/changePreferences.php\"><i class=\"fa fa-gear fa-fw\"></i> Change Preferences</a>
                            </li>
                            <li class=\"divider\"></li>
                            <li><a href=\"loginPages/logout_process.php\"><i class=\"fa fa-sign-out fa-fw\"></i> Logout</a>
                            </li>
                        </ul>
                    </li>";
                    }
                        else {
                        echo "<ul class=\"dropdown-menu dropdown-user\">
                             <div class=\"row\">
                                <div class=\"col-lg-6\">
                            <form style=\"padding: 8px;\" role=\"form\" action=\"loginPages/login_process.php\" method=\"post\">
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
                            <a href="index.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="publicPages/about.php"><i class="fa fa-info-circle fa-fw"></i> About Us</a>
                        </li>
                        </li>
                    <?php
if(isset($_SESSION['auth']) && $_SESSION['auth'] == true) { }
else {
    echo "<li>
                            <a href=\"publicPages/register.php\"><i class=\"fa fa-user-plus fa-fw\"></i> Register</a>
                        </li>";
} ?>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Members<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="publicPages/officers.php">Officers</a>
                                </li>
                                <li>
                                    <a href="publicPages/members.php">Current Members</a>
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
                            <a href="publicPages/contact.php"><i class="fa fa-envelope fa-fw"></i> Contact Us</a>
                        </li>
                        <?php
                        if(isset($_SESSION['auth']) && $_SESSION['auth'] == true) { 
                        echo "<li>
                        <a href=\"#\"><i class=\"fa fa-dashboard fa-fw\"></i> Member Options<span class=\"fa arrow\"></span></a>
                            <ul class=\"nav nav-second-level\">
                                <li>
                                    <a href=\"memberPages/tournaments.php\">Tournaments</a>
                                </li>
                                <li>
                                    <a href=\"memberPages/announcements.php\">Announcements</a>
                                </li>
                                <li>
                                    <a href=\"memberPages/forms.php\">Documents/Other Information</a>
                                </li>
                                <li>
                                    <a href=\"memberPages/requirements.php\">Requirements</a>
                                </li>
                                <li>
                                    <a href=\"memberPages/memberResources.php\">Member Resources</a>
                                </li>";
                            if(!$_SESSION['qWaiver']) {
                                echo "<li>
                                    <a href=\"../../questions/index.php\">Question Database</a>
                                </li>";
                                echo "<li>
                                    <a href=\"../../CSOOBES/index.php\">Charter MS Set</a>
                                </li>";
                                }
                            echo "<li>
                                    <a href=\"memberPages/calendar.php\">Calendar</a>
                                </li>
                            </ul>
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
                        <h1 class="page-header">Welcome to TJ Quizbowl!</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <?php
                if(isset($_GET['error']) && $_GET['error'] == 'qwaiver') {
                    echo "<div class=\"row\">
                    <div class=\"col-lg-12 col-md-12\">
                        <div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
  <strong>Access denied!</strong> Access to the question database is denied to new members. If you would like to write questions, ask an officer to disable your question waiver.
</div>
                    </div>
                </div>";
                } ?>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <p>Students who are currently members or are interested in joining, please register with the site, as this will allow you to sign up for tournaments, and receive announcements via e-mail.</p>
                            </div>
                            <?php
if(isset($_SESSION['auth']) && $_SESSION['auth'] == true) { }
else {
                      echo "<a href=\"publicPages/register.php\">
                                <div class=\"panel-footer\">
                                    <span class=\"pull-left\">Register to be on the team</span>
                                    <span class=\"pull-right\"><i class=\"fa fa-arrow-circle-right\"></i></span>
                                    <div class=\"clearfix\"></div>
                                </div>
                            </a>";
} ?>
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
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
