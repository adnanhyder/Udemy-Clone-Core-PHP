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
    $stuName = $row["stu_name"];
    $stuOcc = $row["stu_occ"];
    $stuImg = $row["stu_img"];
}

if(isset($_REQUEST['stdUpdateBtn'])){
    if(($_REQUEST['stuName'] == "")){
        $stumsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">
        No data deleted</div>';
    } else{
        $stuName = $_REQUEST['stuName'];
        $stuOcc = $_REQUEST['stuOcc'];
        $stuImg = $_FILES['stuImg']['name'];
        $stuImg_temp = $_FILES['stuImg']['tmp_name'];
        $img_folder = '../assets/images/' .$stuImg;
        move_uploaded_file($stuImg_temp, $img_folder);

        $sql = "UPDATE student SET stu_name ='$stuName' , 
        stu_occ ='$stuOcc' , stu_img ='$img_folder' 
        WHERE  stu_email ='$stuEmail'";

        if($conn->query($sql) == TRUE){
            $stumsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">
            Updated Succcessfully</div>';
            //echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        }else {
            $stumsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">
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
            <li><a class="active">My Profile</a></li>
        </ol>
    </section>

    <div class="col-sm-6 mt-5 mx-3 jumbotron">
        <h3 class="text-center">Student Profile</h3>
        <form action="" method="POST" enctype="multipart/form-data">
        <?php
        if(isset($stumsg)){
            echo $stumsg;
        }
        ?>
            <div class="form-group">
                <label for="stuId">Student ID</label>
                <input type="text" class="form-control" id="stuId" 
                name="stuId" value="<?php if(isset($stuId)) {
                    echo $stuId;
                } ?>" readonly>
            </div>
            <div class="form-group">
                <label for="stuEmail">Email</label>
                <input type="email" class="form-control" id="stuEmail" 
                name="stuEmail" value="<?php if(isset($stuEmail)) {
                    echo $stuEmail;
                } ?>">
            </div>
            <div class="form-group">
                <label for="stuName">Name</label>
                <input type="text" class="form-control" id="stuName" 
                name="stuName" value="<?php if(isset($stuName)) {
                    echo $stuName;
                } ?>">
            </div>
            <div class="form-group">
                <label for="stuOcc">Occuaption</label>
                <input type="text" class="form-control" id="stuOcc" 
                name="stuOcc" value="<?php if(isset($stuOcc)) {
                    echo $stuOcc;
                } ?>">
            </div>
            <div class="form-group">
                <label for="stuImg">Upload Image</label>
                <input type="file" class="form-control-file" id="stuImg" 
                name="stuImg" value="<?php if(isset($stuImg)) {
                    echo $stuImg;
                } ?>">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="stdUpdateBtn" name="stdUpdateBtn">Update</button>
            </div>
        </form>
    </div>
</div>

<?php
include('../student/studentinclude/footer.php');
?>