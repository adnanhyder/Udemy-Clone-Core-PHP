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

if(isset($_REQUEST['courseUpdateBtn'])){
    if(($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "") 
    || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") 
    || ($_REQUEST['course_duration'] == "")|| ($_REQUEST['course_price'] == "") 
    || ($_REQUEST['course_original_price'] == "")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">
        Field are not empty please fill all fields.</div>';
    } else {
        $cid = $_REQUEST['course_id'];
        $cname = $_REQUEST['course_name'];
        $cdesc = $_REQUEST['course_desc'];
        $cauthor = $_REQUEST['course_author'];
        $cduration = $_REQUEST['course_duration'];
        $cprice = $_REQUEST['course_price'];
        $coriginalprice = $_REQUEST['course_original_price'];
        $cimg = '../assets/images/' . $_FILES['course_img']['name'];

        $sql = "UPDATE course SET course_id ='$cid' , 
        course_name ='$cname' , course_desc ='$cdesc' , 
        course_author ='$cauthor' , course_img='$cimg' , 
        course_duration='$cduration' , course_price='$cprice' , 
        course_original_price='$coriginalprice' 
        WHERE  course_id ='$cid'";

        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">
            Updated Successfully</div>';
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
            <li><a href="courses.php">Courses</a></li>
            <li><a class="active">Update Courses</a></li>
        </ol>
    </section>

    <div class="col-sm-6 mt-5 mx-3 jumbotron">
        <h3 class="text-center">Update Course</h3>

        <?php
         if(isset($_REQUEST['edit'])){
            $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        <?php
        if(isset($msg)){
            echo $msg;
        }
        ?>
        <div class="form-group">
                <label for="course_id">Course ID</label>
                <input type="text" class="form-control" 
                id="course_id" name="course_id" value="<?php 
                if(isset($row['course_id']))
                {
                    echo $row['course_id'];
                }
                ?>" readonly>
            </div>
       
            <div class="form-group">
                <label for="course_name">Course Name</label>
                <input type="text" class="form-control" 
                id="course_name" name="course_name" value="<?php 
                if(isset($row['course_name']))
                {
                    echo $row['course_name'];
                }
                ?>">
            </div>
            <div class="form-group">
                <label for="course_desc">Course Description</label>
                <textarea class="form-control" row="2" 
                id="course_desc" name="course_desc"><?php if(isset($row['course_desc']))
                {
                    echo $row['course_desc'];
                }
                ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="course_author">Course Author</label>
                <input type="text" class="form-control"
                id="course_author" name="course_author" value="<?php 
                if(isset($row['course_author']))
                {
                    echo $row['course_author'];
                }
                ?>">
            </div>
            <div class="form-group">
                <label for="course_duration">Course Duration</label>
                <input type="text" class="form-control" 
                id="course_duration" name="course_duration" value="<?php 
                if(isset($row['course_duration']))
                {
                    echo $row['course_duration'];
                }
                ?>">
            </div>
            <div class="form-group">
                <label for="course_price">Course Price</label>
                <input type="text" class="form-control" 
                id="course_price" name="course_price" value="<?php 
                if(isset($row['course_price']))
                {
                    echo $row['course_price'];
                }
                ?>">
            </div>
            <div class="form-group">
                <label for="course_original_price">Course Original Price</label>
                <input type="text" class="form-control" 
                id="course_original_price" name="course_original_price" value="<?php 
                if(isset($row['course_original_price']))
                {
                    echo $row['course_original_price'];
                }
                ?>">
            </div>
            <div class="form-group">
                <label for="course_img">Course Image</label>
                <img src="<?php  if(isset($row['course_img']))
                {
                    echo $row['course_img'];
                } 
                ?>" alt="" class="img-thumbnail">
                <input type="file" class="form-control-file" id="course_img" name="course_img">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="courseUpdateBtn" name="courseUpdateBtn">Update</button>
                <a href="courses.php" class="btn btn-secondary">CLose</a>
            </div>
        </form>
    </div>
</div>

<?php
include('../Admin/admininclude/footer.php');
?>