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

if(isset($_REQUEST['topicsSubmitBtn'])){

    if(($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "") 
    || ($_REQUEST['topics_name'] == "")  || ($_REQUEST['topics_desc'] == "")){
        $topicsmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">
        Field are not empty please fill all fields.</div>';
    } else {

        $course_id = $_REQUEST['course_id'];
        $course_name = $_REQUEST['course_name'];
        $topics_name = $_REQUEST['topics_name'];
        $topics_desc = $_REQUEST['topics_desc'];
        
        $sql = "INSERT INTO topics (topics_name, topics_desc, 
        course_id, course_name) 
        VALUES ('$topics_name', '$topics_desc', 
        '$course_id', '$course_name')";

        if($conn->query($sql) == TRUE){
            $topicsmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">
            Field Successfully Added</div>';
        }else {
            $topicsmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">
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
            <li><a href="topics.php">Topics</a></li>
            <li><a class="active">Add New Topics</a></li>
        </ol>
    </section>

    <div class="col-sm-6 mt-5 mx-3 jumbotron">
        <h3 class="text-center">Add New Topics</h3>
        <form action="" method="POST" enctype="multipart/form-data">
        <?php
        if(isset($topicsmsg)){
            echo $topicsmsg;
        }
        ?>
            <div class="form-group">
                <label for="course_id">Course ID </label>
                <input type="text" class="form-control" id="course_id" 
                name="course_id" value="<?php 
                if(isset($_SESSION['course_id']))
                {
                    echo $_SESSION['course_id'];
                }
                ?>" readonly>
            </div>

             <div class="form-group">
                <label for="course_name">Course Name </label>
                <input type="text" class="form-control" id="course_name" 
                name="course_name" value="<?php 
                if(isset($_SESSION['course_name']))
                {
                    echo $_SESSION['course_name'];
                }
                ?>" readonly>
            </div>

            <div class="form-group">
                <label for="topics_name">Topics Name</label>
                <input type="text" class="form-control" id="topics_name"
                name="topics_name">
            </div>
            <div class="form-group">
                <label for="topics_desc">Topics Description</label>
                <textarea class="form-control" row="2" id="topics_desc"
                name="topics_desc"></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger"
                id="topicsSubmitBtn" name="topicsSubmitBtn">Submit</button>
                <a href="topics.php" class="btn btn-secondary">CLose</a>
            </div>
        </form>
    </div>
</div>

<?php
include('../Admin/admininclude/footer.php');
?>