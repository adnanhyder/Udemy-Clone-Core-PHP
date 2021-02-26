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


if(isset($_REQUEST['newStuSubmitBtn'])){
    if(($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") 
    || ($_REQUEST['stu_pass'] == "") || ($_REQUEST['stu_occ'] == "")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">
        Field are not empty please fill all fields.</div>';
    } else {
        $stu_name = $_REQUEST['stu_name'];
        $stu_email = $_REQUEST['stu_email'];
        $stu_pass = $_REQUEST['stu_pass'];
        $stu_occ = $_REQUEST['stu_occ'];

        $sql = "INSERT INTO student (stu_name, stu_email, stu_pass, 
        stu_occ) VALUES ('$stu_name', '$stu_email', 
        '$stu_pass', '$stu_occ')";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">
            Student Successfully Added</div>';
        }else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">
            Something is Missing</div>';
        }
    }
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="admindashboard.php">Home</a></li>
            <li><a href="students.php">Students</a></li>
            <li><a class="active">Add New Student</a></li>
        </ol>
    </section>

    <div class="col-sm-6 mt-5 mx-3 jumbotron">
        <h3 class="text-center">Add New Student</h3>
        <form action="" method="POST" enctype="multipart/form-data">
        <?php
        if(isset($msg)){
            echo $msg;
        }
        ?>
            <div class="form-group">
                <label for="stu_name">Name</label>
                <input type="text" class="form-control" id="stu_name" name="stu_name">
            </div>
            <div class="form-group">
                <label for="stu_email">Email</label>
                <input type="email" class="form-control" id="stu_email" name="stu_email">
            </div>
            <div class="form-group">
                <label for="stu_pass">Password</label>
                <input type="text" class="form-control" id="stu_pass" name="stu_pass">
            </div>
            <div class="form-group">
                <label for="stu_occ">Occupation</label>
                <input type="text" class="form-control" id="stu_occ" name="stu_occ">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="newStuSubmitBtn" name="newStuSubmitBtn">Submit</button>
                <a href="students.php" class="btn btn-secondary">CLose</a>
            </div>
        </form>
    </div>
</div>
<?php
include('../Admin/admininclude/footer.php');
?>