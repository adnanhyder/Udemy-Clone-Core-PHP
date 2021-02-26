<?php

if(!isset($_SESSION)){
    session_start();
}
include('../student/studentinclude/header.php');
include_once('../dbconnection.php');

if(isset($_SESSION['is_login'])){
    $stuEmail = $_SESSION['stuLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}
$sql = "SELECT * FROM course";
$result = $conn->query($sql);
$totalcourse = $result->num_rows;

$sql = "SELECT p.transaction_id, c.course_id FROM payment AS p JOIN course AS c ON c.course_id = p.course_id
        WHERE p.stu_email = '$stuLogEmail'";
        $result = $conn->query($sql);
        $stutotalcourse = $result->num_rows;
?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Student Dashboard
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
                                <span class="info-box-text text-center"><b>Total Courses</b></span>
                                <span class="info-box-number text-center"><?php  echo $totalcourse ?></span>
                                <a class="btn btn-primary btn-sm ml-5" href="../courses.php">View</a>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                   
                    <!-- fix for small devices only -->
                    <div class="clearfix visible-sm-block"></div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text text-center"><b>stu courses</b></span>
                                <span class="info-box-number text-center"><?php echo $stutotalcourse ?></span>
                                <a class="btn btn-success btn-sm ml-5" href="stdcourses.php">View</a>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                   
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->


        </div>
        <!-- /.content-wrapper -->

    </div>

    <?php
include('../student/studentinclude/footer.php');
?>