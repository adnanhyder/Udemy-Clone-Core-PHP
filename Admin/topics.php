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
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Topics
        </h1>
        <ol class="breadcrumb">
            <li><a href="admindashboard.php">Home</a></li>
            <li><a class="active">Topics</a></li>
        </ol>
    </section>

    <div class="col-sm-9 mt-5 mx-3">
        <h3 class="text-center">Add Topics in Courses</h3>
        <form action="" class="mt-3 form-inline d-print-none" enctype="multipart/form-data">
       <!--<?php
       // if(isset($msg)){
            //echo $msg;
        //}
        ?>-->
            <div class="form-group mr-3">
                <label for="checkid">Enter Course ID:</label>
                <input type="text" class="form-control ml-3" id="checkid" name="checkid">
            </div>
            <button type="submit" id="danger" class="btn btn-danger">Search</button>
       </form>

       <?php
       $sql = "SELECT course_id FROM course";
       $result = $conn->query($sql);
       while($row = $result->fetch_assoc()){
        if(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id']) {
            $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['checkid']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if(($row['course_id']) == $_REQUEST['checkid']){
                $_SESSION['course_id'] = $row['course_id'];
                $_SESSION['course_name'] = $row['course_name'];
        ?>
        <h3 class="cname">
            Course Name :<?php if(isset($row['course_name'])){
                echo $row ['course_name']; } ?></h3>
                <p class="bg-dark text-white text-center p-2">List of Topics</p>
           <?php 
            $sql = "SELECT * FROM topics WHERE course_id = {$_REQUEST['checkid']}";
            $result = $conn->query($sql);
            ?>
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Topic ID</th>
                            <th scope="col">Topic Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                         while($row = $result->fetch_assoc()){
                        echo '<tr>';
                        echo '<th scope="row">'.$row['topics_id'].'</th>';
                        echo '<td>'.$row['topics_name'].'</td>';
                       
                        echo '<td> 
                        <form action="edittopics.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value='.$row["topics_id"].'>

                        <button type="submit" class="btn btn-info mr-3" name="edit" value="Edit">
                        <i class="fas fa-pen"></i></button>
                        </form>

                        <form action="#" method="POST" class="d-inline">
                        <input type="hidden" name="id" value='.$row["topics_id"].'>
                        
                        <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                        <i class="fas fa-trash"></i></button>
                        </form>
                        </td>
                        </tr>';
                         } 
                    echo '</tbody>
                </table>
                <div>
    <a id="box" class="btn btn-danger box1" href="./addtopics.php">
    <i class="fas fa-plus"></i>
    </a>
</div>'; 
           } else {
            echo '<div class="alert alert-dark mt-4 role="alert"">
            Course not found</div>';
           }
           if(isset($_REQUEST['delete'])){
            $sql = "DELETE FROM topics WHERE topics_id = {$_REQUEST['id']}";
                    if($conn->query($sql) == TRUE){
                        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                    }else {
                        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">
                           No data deleted</div>';
                    }
           }
        }  
       }
       ?>
</div>
<?php
include('../Admin/admininclude/footer.php');
?>