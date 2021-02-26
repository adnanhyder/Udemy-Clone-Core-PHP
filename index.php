<!-- Start Including Header-->
<?php

include('./maininclude/header.php');
include_once('./dbconnection.php');
?>
<!-- End Including Header-->

    <!--Start video background-->
    <div class="container-fluid p-0">
        <div class="vid-parent">
            <video playsinline autoplay muted loop>
                <source src="assets/video/video1.mp4" type="">
            </video>
            <div class="vid-overlay"></div>
            <div id="vid-content" class="vid-content">
            <h1 class="my-content">Welcome to SMS</h1>
            <small class="my-content">Learn and Implement</small><br>
            <?php
            if(!isset($_SESSION['is_login'])){
                echo '<a href="#" class="btn btn-danger mt-3" 
                data-toggle="modal" data-target="#stuRegModalCenter">
                Get Started</a>';
            } else {
                echo '<a href="student/studentdashboard.php" class="btn btn-primary">My Profile</a>';
            }
            ?>
        </div>
        <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <!--End video background-->

    <!--Start Text Banner-->
    <div class="container-fluid bg-danger txt-banner">
        <div class="row bottom-banner">
            <div class="col-sm">
                <h5><i class="fas fa-book-open mr-3"></i>
                    100+ Online Courses</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-users mr-3"></i>
                    Expert Instructor</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-universal-access mr-3"></i>
                    Lifetime Access</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-money-check mr-3"></i>
                    Money Back Guarantee</h5>
            </div>
        </div>
    </div>
    <!--End Text Banner-->

    <!--Start Courses-->
    <div class="container mt-5">
        <h1 class="text-center-course">Popular Courses</h1>

        <div class="card-deck mt-4">
            <?php 
            $sql = "SELECT * FROM course LIMIT 3";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $course_id = $row['course_id'];
                    echo '<a href="coursedetail.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
                    <div class="card">
                        <img src="'.str_replace('..', '.', $row['course_img']).'" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">'.$row['course_name'].'</h5>
                            <p class="card-text">'.$row['course_desc'].'</p>
                        </div>
                        <div class="card-footer">
                            <p class="card-text d-inline">Price: <small><del>'.$row['course_original_price'].'</del></small>
                                <span class="font-weight-bolder">'.$row['course_price'].'<span>
                            </p>
                            <a class="btn btn-primary text-white font-weight-bolder floar-right ml-4" 
                            href="coursedetail.php?course_id='.$course_id.'">Enroll</a>
                        </div>
                    </div>
                </a>';
                }
            }
            ?>
        </div>

        <div class="card-deck mt-4">
            <?php 
            $sql = "SELECT * FROM course LIMIT 3, 3";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $course_id = $row['course_id'];
                    echo '<a href="coursedetail.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
                    <div class="card">
                        <img src="'.str_replace('..', '.', $row['course_img']).'" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">'.$row['course_name'].'</h5>
                            <p class="card-text">'.$row['course_desc'].'</p>
                        </div>
                        <div class="card-footer">
                            <p class="card-text d-inline">Price: <small><del>'.$row['course_original_price'].'</del></small>
                                <span class="font-weight-bolder">'.$row['course_price'].'<span>
                            </p>
                            <a class="btn btn-primary text-white font-weight-bolder floar-right ml-4" 
                            href="coursedetail.php?course_id='.$course_id.'">Enroll</a>
                        </div>
                    </div>
                </a>';
                }
            }
            ?>
        </div>

        <div class="text-center m-2">
            <a class="btn btn-danger btn-sm" href="courses.php">View All Courses</a>
        </div>
    </div>
    <!--End Courses-->

    <!--Start Contact Us-->
<?php
   include('contact.php');
?>
    <!--End Contact Us-->

    <!--Start Social-->
    <div class="container-fluid bg-danger">
        <div class="row text-white text-center p-1">
            <div class="col-sm">
                <a class="text-white social-hover" target="_blank" 
                href="https://facebook.com/">
                    <i class="fab fa-facebook-f"></i>Facebook
                </a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" target="_blank" 
                href="https://twitter.com/">
                    <i class="fab fa-twitter"></i>Twitter
                </a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" target="_blank"
                href="https://www.instagram.com/">
                    <i class="fab fa-instagram"></i>Instagram
                </a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" target="_blank" 
                href="https://www.whatsapp.com/">
                    <i class="fab fa-whatsapp"></i>Whatsapp
                </a>
            </div>
        </div>
    </div>
    <!--End Social-->

    <!--Start About Section-->
    <div class="container-fluid p-4" style="background-color: #6b6c68;">
        <div class="contanier">
            <div class="row text-center">
                <div class="col-sm">
                    <h5>About Us</h5>
                    <p class="text-white">SMS provides universal access to the world's best education</p>
                </div>
                <div class="col-sm">
                    <h5>Category</h5>
                    <a class="text-white" href="#">Web Development</a><br />
                    <a class="text-white" href="#">Android Development</a><br />
                    <a class="text-white" href="#">IOS Development</a><br />
                    <a class="text-white" href="#">Data Analysis</a><br />
                    <a class="text-white" href="#">Machine Learning</a><br />
                </div>
                <div class="col-sm">
                    <h5>Contact Us</h5>
                    <p class="text-white">SMS Pvt Ltd <br> Near D-Ground <br> Alah ho Chowk Faisalabad
                        <br> Ph. +921234567
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--End About Sectionz-->

<!-- Start Including Footer-->
<?php
include('./maininclude/footer.php');
?>
<!-- End Including Footer-->
