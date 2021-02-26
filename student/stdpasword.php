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

$stuEmail = $_SESSION['stuLogEmail'];
if(isset($_REQUEST['stdPasswdbtn'])){
    if(($_REQUEST['stuPass'] == "")){
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">
        No data deleted</div>';
} else {
    
    $sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
    $result = $conn->query($sql);

    if($result->num_rows == 1){
        $stuPass = $_REQUEST['stuPass'];
        $sql = "UPDATE student SET stu_pass = '$stuPass' 
        WHERE stu_email = '$stuEmail' ";
         if($conn->query($sql) == TRUE){
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">
            Updated Successfully</div>';
    } else {
        $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">
        Password not updated</div>';
    }
}
}
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="studentdashboard.php">Home</a></li>
            <li><a class="active">Password Change</a></li>
        </ol>
    </section>

    <div class="col-sm-6 mt-5 mx-3 jumbotron">
        <h3 class="text-center">Update Password</h3>
        <form action="" method="POST" enctype="multipart/form-data">
                <?php
        if(isset($passmsg)){
            echo $passmsg;
        }
        ?>
                    <div class="form-group">
                        <label for="inputStdEmail">Email</label>
                        <input type="email" class="form-control" id="inputStdEmail"
                        value="<?php 
                    echo $stuEmail;
                ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="inputstdnewpassword">New Password</label>
                        <input type="text" class="form-control" id="inputstdnewpassword" placeholder="New Password"
                            name="stuPass">
                    </div>

                    <button type="submit" class="btn_update btn-danger mr-4 mt-4" name="stdPasswdbtn">Update</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('../student/studentinclude/footer.php');
?>