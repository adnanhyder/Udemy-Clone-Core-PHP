<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <!-- Bootstrap 3.3.6 
    <link rel="stylesheet" href="../assets/css/style1.css">-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    
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
                                <img src="../assets/images/userimg.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">Uzair Sadiq</span>
                            </a>
                            <ul class="dropdown-menu" style="top:2.25rem;right: 0rem;">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="../assets/images/userimg.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        Uzair Sadiq - Web Developer
                                        <small>Member since Dec. 2021</small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-success">Profile</a>
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
                        <img src="../assets/images/userimg.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Uzair Sadiq</p>
                        <i class="fa fa-circle text-success"></i> Online
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="treeview">
                        <a href="admindashboard.php">
                        <i class="fas fa-columns"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="admincourses.php">
                        <i class="fas fa-book"></i>
                            <span>Courses</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="topics.php">
                        <i class="fas fa-book"></i>
                            <span>Topics</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="students.php">
                        <i class="fas fa-users"></i>
                            <span>Students</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="soldcourse.php">
                        <i class="fas fa-shopping-cart"></i>
                            <span>Sold Courses</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="adminstatus.php">
                        <i class="fas fa-money-bill-alt"></i>
                            <span>Payment</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="adminfeedback.php">
                            <i class="fa fa-edit"></i>
                            <span>Feedback</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="adminpasword.php">
                        <i class="fas fa-key"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>