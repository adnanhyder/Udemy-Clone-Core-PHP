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
            Students
        </h1>
        <ol class="breadcrumb">
            <li><a href="admindashboard.php">Home</a></li>
            <li><a href="admincourses.php">Courses</a></li>
            <li><a class="active">Sold Courses</a></li>
        </ol>
    </section>
    <form action="" method="post" class="d-print-none">
        <div class="form-row" id="form1" style="margin-left: 15px !important;">
            <div class="form-group col-md-2">
                <input type="date" class="form-control" id="startdate" name="startdate">
            </div> 
            <div class="form-group col-md-2">
                <input type="date" class="form-control" id="enddate" name="enddate">
            </div>
            <div class="form-group">
                <input type="submit" id="button1" class="btn btn-secondary" name="searchsubmit" value="Search">
            </div>
        </div>
    </form>
    <?php 
    if(isset($_REQUEST['searchsubmit'])){
        $startdate = $_REQUEST['startdate'];
        $enddate = $_REQUEST['enddate'];
        $sql = "SELECT * FROM payment WHERE createddate BETWEEN '$startdate' AND '$enddate'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            echo '
            <p class="bg-dark text-white text-center"><b>Details</b></p>
            <table class="table">
            <thead>
        <tr>
            <th class="coll">Transaction ID</th>
            <th class="coll">Course ID</th>
            <th class="coll">Student Email</th>
            <th scope="col">Payment Status</th>
            <th class="coll">Created Date</th>
            <th scope="col">Invoice ID</th>
            <th scope="col">Payment Amount</th>
        </tr>
    </thead>
    <tbody>';
    while($row = $result->fetch_assoc()){
        echo '<tr>
        <th class="coll">'.$row['transaction_id'].'</th>
        <td class="coll">'.$row['course_id'].'</td>
        <td class="coll">'.$row['stu_email'].'</td> 
        <td>'.$row['payment_status'].'</td>        
        <td class="coll">'.$row['createddate'].'</td>
        <td>'.$row['invoice_id'].'</td>
        <td>'.$row['payment_amount'].'</td>
        </tr>';
    }  
    echo '<tr>
    </tr>
    </tbody>
</table>
<form action="" method="post" class="print">
    <input type="submit" class="btn btn-danger" value="PRINT" onClick="window.print()">
    </form>';
        } else {
            echo "<div class='alert alert-warning' role='alert'>No Record Found</div>";
        }
    }
    ?>
</div>


<?php
include('../Admin/admininclude/footer.php');
?>