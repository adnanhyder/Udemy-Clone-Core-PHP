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

if(isset($_REQUEST['topicsUpdateBtn'])){
    if(($_REQUEST['topics_id'] == "") || ($_REQUEST['topics_name'] == "") 
    || ($_REQUEST['topics_desc'] == "") || ($_REQUEST['course_id'] == "") 
    || ($_REQUEST['course_name'] == "")){
        $topicmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">
        Field are not empty please fill all fields.</div>';
    } else {
        $tid = $_REQUEST['topics_id'];
        $tname = $_REQUEST['topics_name'];
        $tdesc = $_REQUEST['topics_desc'];
        $cid = $_REQUEST['course_id'];
        $cname = $_REQUEST['course_name'];

        $sql = "UPDATE topics SET topics_id ='$tid' , topics_name ='$tname' , topics_desc ='$tdesc' ,
        course_id = '$cid' , course_name = '$cname'
        WHERE  topics_id ='$tid'";

        if($conn->query($sql) == TRUE){
            $topicmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">
            Updated Successfully</div>';
        }else {
            $topicmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">
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
            <li><a class="active">Update Topics</a></li>
        </ol>
    </section>

    <div class="col-sm-6 mt-5 mx-3 jumbotron">
        <h3 class="text-center">Update Topics</h3>

        <?php
         if(isset($_REQUEST['edit'])){
            $sql = "SELECT * FROM topics WHERE topics_id = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        <?php
        if(isset($topicmsg)){
            echo $topicmsg;
        }
        ?>
        <div class="form-group">
                <label for="topics_id">Topic ID</label>
                <input type="text" class="form-control" 
                id="topics_id" name="topics_id" value="<?php 
                if(isset($row['topics_id']))
                {
                    echo $row['topics_id'];
                }
                ?>" readonly>
            </div>
       
            <div class="form-group">
                <label for="topics_name">Topic Name</label>
                <input type="text" class="form-control" 
                id="topics_name" name="topics_name" value="<?php 
                if(isset($row['topics_name']))
                {
                    echo $row['topics_name'];
                }
                ?>">
            </div>
            <div class="form-group">
                <label for="topics_desc">Topic Description</label>
                <textarea class="form-control" row="2" 
                id="topics_desc" name="topics_desc"><?php if(isset($row['topics_desc']))
                {echo $row['topics_desc'];}
                ?>
                </textarea>
            </div>
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
                ?>" readonly>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="topicsUpdateBtn" name="topicsUpdateBtn">Update</button>
                <a href="topics.php" class="btn btn-secondary">CLose</a>
            </div>
        </form>
    </div>
</div>

<?php
include('../Admin/admininclude/footer.php');
?>