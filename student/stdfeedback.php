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
$sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    $stuId = $row["stu_id"];
}
if(isset($_REQUEST['stdFeedbackbtn'])){
    if(($_REQUEST['fb_content'] == "")){
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">
        something is missing</div>';
} else {
    $fbcontent = $_REQUEST['fb_content'];
    $sql = "INSERT INTO feedback (fb_content, stu_id) VALUES ('$fbcontent' , '$stuId')";
    if($conn->query($sql) == TRUE){
        $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">
        Updated Successfully</div>';
    }else {
        $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">
        Unable to Update</div>';
    }
}
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="studentdashboard.php">Home</a></li>
            <li><a href="stdprofile.php">Profile</a></li>
            <li><a class="active">Feedback</a></li>
        </ol>
    </section>

    <div class="col-sm-6 mt-5 mx-3 jumbotron">
        <h3 class="text-center">Student Feedback </h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <?php
        if(isset($passmsg)){
            echo $passmsg;
        }
        ?>
            <div class="form-group">
                <label for="stuId">Student ID</label>
                <input type="text" class="form-control" id="stuId" value="<?php if(isset($stuId)) {
                    echo $stuId;
                } ?>" readonly>
            </div>

            <div class="form-group">
                <label for="fb_content">Feedback</label>
                <textarea type="text" class="form-control" row="3" id="fb_content" name="fb_content"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="stdFeedbackbtn">Submit Feedback</button>

        </form>
    </div>
</div>

<?php
include('../student/studentinclude/footer.php');
?>