<?php
session_start();
if(isset($_SESSION['login_user'])){
    require('conn.php');	
    $email_session = $_SESSION['login_user'];
    if (isset($_POST['submit'])) {
    	$id2 = $_POST['id'];
    	$email = $_POST['email'];
    	$pass = $_POST['password'];
		$mysqli->query("UPDATE login SET email='$email', password = '$pass' WHERE email='$email_session'"); 
		header("location:index.php");
    }
    $members = $mysqli->query("SELECT * FROM login WHERE email='$email_session'");
    $mem = mysqli_fetch_assoc($members);

}
else{
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>UltraBand</title>
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]> 
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .dataTables_filter{
            margin-left:454px!important;
        }
    </style>
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
                    <a class="navbar-brand" href="index.html">BasketAsia SDN BHD</a>
                </div>

            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
            <!-- /.navbar-header session -->
            <a class="navbar-brand" href="">
                    <b id="welcome">Welcome : <i><?php echo $email_session; ?></i></b>
                    </a>
                <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a data-toggle="modal" data-target="#editProfile"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                    </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Users<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                     <a href="tables.php"><i class="fa fa-table fa-fw"></i> Users List</a>
                                    </li>
                                    <li>
                                        <a href="paymentDetails.php"><i class="fa fa-table fa-fw"></i> Users Payment</a>
                                    </li>
                                </ul>
                            </li> 
                            <li>
                                <a href="apartmentList.php"><i class="fa fa-sitemap fa-fw"></i> Apartment</a>
                            </li>
                            <li>
                                <a href="technician.php"><i class="fa fa-sitemap fa-fw"></i> Technician Team</a>
                            </li>
                        </ul>
                    </div>
                <!-- /.sidebar-collapse -->
                </div>
            <!-- /.navbar-static-side -->
            </nav>

 <!-- Modal -->
<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="memberModalLabel">Edit Profile</h4>
            </div>
                <form method="post" action="header.php" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $mem['email'];?>" />
                        </div>
                        <div class="form-group">
                            <label for="password"></label>
                                <input type="text" class="form-control" id="password" name="password" value="<?php echo $mem['password'];?>" />
                        </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" name="submit" value="Update" />&nbsp;
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                </form>

        </div>
    </div>
</div>

        </div>