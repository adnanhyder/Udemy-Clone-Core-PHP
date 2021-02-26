<?php

if(!isset($_SESSION)){
    session_start();
}
include('../Admin/admininclude/header.php');
include('../dbconnection.php');

if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

$sql = "SELECT * FROM course";
$result = $conn->query($sql);
$totalcourse = $result->num_rows;

$sql = "SELECT * FROM student";
$result = $conn->query($sql);
$totalstudent = $result->num_rows;

$sql = "SELECT * FROM payment";
$result = $conn->query($sql);
$totalpayment = $result->num_rows;

$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);
$totalfeedback = $result->num_rows;

$sql = "SELECT * FROM topics";
$result = $conn->query($sql);
$totaltopics = $result->num_rows;
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Admin Dashboard
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="dashboard_content">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua">
                            <i class="fas fa-book"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text text-center"><b>Courses</b></span>
                                <span class="info-box-number text-center"><?php echo $totalcourse ?></span>
                                <a class="btn btn-primary btn-sm ml-5" href="admincourses.php">View</a>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red">
                            <i class="fas fa-book"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text text-center"><b>Topics</b></span>
                                <span class="info-box-number text-center"><?php echo $totaltopics ?></span>
                                <a class="btn btn-danger btn-sm ml-5" href="topics.php">View</a>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix visible-sm-block"></div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text text-center"><b>Sold</b></span>
                                <span class="info-box-number text-center"><?php echo $totalpayment ?></span>
                                <a class="btn btn-success btn-sm ml-5" href="soldcourse.php">View</a>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"> <i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text text-center"><b>Students</b></span>
                                <span class="info-box-number text-center"><?php echo $totalstudent ?></span>
                                <a class="btn btn-warning btn-sm ml-5" href="students.php">View</a>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="clearfix visible-sm-block"></div>
                     <!-- /.col -->
                     <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-cyan"> <i class="fa fa-edit"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text text-center"><b>Feedback</b></span>
                                <span class="info-box-number text-center"><?php echo $totalfeedback ?></span>
                                <a class="btn btn-info btn-sm ml-5" href="adminfeedback.php">View</a>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->


        </div>
        <!-- /.content-wrapper -->

    </div>

<?php
include('../Admin/admininclude/footer.php');
?>