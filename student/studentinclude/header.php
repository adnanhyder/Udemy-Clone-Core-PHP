<?php

if(!isset($_SESSION)){
    session_start();
}
include_once('../dbconnection.php');

if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
} 

if(isset($stuLogEmail)){
    $sql = "SELECT stu_name , stu_img , stu_occ FROM student WHERE stu_email = 
    '$stuLogEmail'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stu_name = $row['stu_name'];
    $stu_img = $row['stu_img'];
    $stu_occ = $row['stu_occ'];
} 
?>
 
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Student Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <!--<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">-->
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../assets/css/skins/_all-skins.min.css">

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">

            <!-- Logo -->
            <a href="../index.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels 
      <span class="logo-mini"><b>A</b>LT</span>-->
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>SMS</b></span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo $stu_img ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $stu_name ?></span>
                            </a>
                            <ul class="dropdown-menu" style="top:2.25rem;right: 0rem;">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo $stu_img ?>" class="img-circle" alt="User Image">

                                    <p>
                                    <?php echo $stu_name ?> - <?php echo $stu_occ ?>
                                        <small>Member since Dec. 2021</small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="stdprofile.php" class="btn btn-success">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../logout.php" class="btn btn-danger">Log Out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo $stu_img ?>" class="img-thumbnail rounded-circle" 
                        alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $stu_name ?></p>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="treeview">
                        <a href="studentdashboard.php">
                        <i class="fas fa-columns"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="stdprofile.php">
                        <i class="fas fa-columns"></i> <span>My Profile</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="stdcourses.php">
                        <i class="fas fa-book"></i>
                            <span>Courses</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="stdfeedback.php">
                            <i class="fa fa-edit"></i>
                            <span>Feedback</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="stdpasword.php">
                        <i class="fas fa-key"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>