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
$adminEmail = $_SESSION['adminLogEmail'];
if(isset($_REQUEST['adminUpdatebtn'])){
    if(($_REQUEST['adminPass'] == "")){
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">
        No data deleted</div>';
} else {
    
    $sql = "SELECT * FROM admin WHERE admin_email='$adminEmail'";
    $result = $conn->query($sql);

    if($result->num_rows == 1){
        $adminPass = $_REQUEST['adminPass'];
        $sql = "UPDATE admin SET admin_pass = '$adminPass' 
        WHERE admin_email = '$adminEmail' ";
         if($conn->query($sql) == TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
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
            <li><a href="admindashboard.php">Home</a></li>
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
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail"
                        value="<?php 
                    echo $adminEmail;
                ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="inputnewpassword">New Password</label>
                        <input type="text" class="form-control" id="inputnewpassword" placeholder="New Password"
                            name="adminPass">
                    </div>

                    <button type="submit" class="btn_update btn-danger mr-4 mt-4" name="adminUpdatebtn">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('../Admin/admininclude/footer.php');
?>