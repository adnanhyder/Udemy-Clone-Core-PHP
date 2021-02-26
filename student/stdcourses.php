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
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Student Courses
        </h1>
        <ol class="breadcrumb">
            <li><a href="studentdashboard.php">Home</a></li>
            <li><a class="active">Student Courses</a></li>
        </ol>
    </section>
    <div class="card">
    <?php 
    if(isset($stuLogEmail)){
        $sql = "SELECT p.transaction_id, c.course_id, c.course_name, c.course_desc, c.course_img, c.course_duration,
        c.course_author, c.course_price, c.course_original_price FROM payment AS p JOIN course AS c ON c.course_id = p.course_id
        WHERE p.stu_email = '$stuLogEmail'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){ ?>
            <div class="bg-light mb-3">
                <h5 class="card-header-name"> <?php echo $row['course_name']; ?></h5>
                <div class = "row">
                    <div class = "col-sm-3">
                        <img src="<?php echo $row['course_img']; ?>" class="card-img-top ml-1 mr-2">
                    </div>
                    <div class ="col-sm-6 mb-3">
                        <div class ="card-body">
                            <p class = "card-title"> <?php echo $row['course_desc'] ?></p>
                            <small class = "card-text"> <b>Duration : </b><?php echo $row['course_duration'] ?> </small><br />
                            <small class = "card-text"> <b>Instructor :</b> <?php echo $row['course_author'] ?> </small><br />
                            <p class="card-text d-inline"> <b>Price:</b> <small><del> <?php echo $row['course_original_price'] ?></del></small>
                                <span class="font-weight-bolder"> <?php echo $row['course_price'] ?><span>
                            </p>
                            <!--<a class="btn btn-primary" 
                            href="watchcourse.php?course_id= <?php echo $row['course_id']?>">Watch Video</a>-->
                        </div>
                    </div>
                </div>
            </div>
        
            <?php
            }
        }

    }
    ?>
    </div>
</div>

<?php
include('../student/studentinclude/footer.php');
?>


