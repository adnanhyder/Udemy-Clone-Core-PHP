<!-- Start Including Header-->
<?php
include('./maininclude/header.php');
include('./dbconnection.php');
?>
<!-- End Including Header-->

<!-- Start Course Page Banner-->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="assets/images/coursesbanner.jpg" alt="courses"
            style="object-fit:cover; width:100%; height:430px; box-shadow:10px">
    </div>
</div>
<div class="col-sm-8 mt-5 mx-3 jumbotron">
    <div class="row12">
        <div class="col-md-6">
            <h5 class="mb-6">Already have an account!Log In</h5>
            <form action="coursedetail.php" role="form" id="stuLoginForm">
                <?php
            if(!isset($_SESSION['is_login'])){
                //session_start();
               echo '<a type="submit" class="btn btn-primary" id="stuLoginBtn" 
               data-toggle="modal" data-target="#stuLoginModalCenter">
               Login</a>';
            }
            ?>
            </form><br/>
            <small id="statusLogMsg"></small>
        </div>

        <div class="col-md-6">
            <h5 class="mb-3">For New User!Sign Up</h5>
            <form action="payment.php" role="form" id="stuRegForm">
                <?php
            if(!isset($_SESSION['is_login'])){
               echo '<a type="submit" class="btn btn-primary" id="stuLoginBtn" 
               data-toggle="modal" data-target="#stuRegModalCenter">
               Sign Up</a>';
            }
            ?>
            </form><br />
            <small id="successMsg"></small>
        </div>
    </div>
</div>
<?php
   include('contact.php');
?>

<?php
include('./maininclude/footer.php');
?>