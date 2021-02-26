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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Students Feedbacks
        </h1>
        <ol class="breadcrumb">
            <li><a href="admindashboard.php">Home</a></li>
            <li><a class="active">Feedback</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="course_content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-10 pt-2">
                <p class="bg-dark text-white p-2">List of Feedback</p>
                <?php
                
                $sql = "SELECT * FROM feedback";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                ?>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">FB ID</th>
                            <th scope="col">Content</th>
                            <th scope="col">Stu ID</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         while($row = $result->fetch_assoc()){
                        echo '<tr>';
                        echo '<th scope="row">'.$row['fb_id'].'</th>';
                        echo '<td>'.$row['fb_content'].'</td>';
                        echo '<td>'.$row['stu_id'].'</td>';
                        echo '<td>';
                        echo '
                        <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="id" value='.$row["fb_id"].'>
                            <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                                <i class="fas fa-trash"></i></button>
                        </form>
                        </td>
                        </tr>';
                         } 
                                                
                         ?>
                    </tbody>
                </table>
                <?php } else {
                    echo "error";
                } 
                // Delete Course Start
                if(isset($_REQUEST['delete'])){
                    $sql = "DELETE FROM feedback WHERE fb_id = {$_REQUEST['id']}";
                    if($conn->query($sql) == TRUE){
                        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                    }else {
                        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">
                           No data deleted</div>';
                    }
                }
                // Delete Course End
                ?>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include('../Admin/admininclude/footer.php');
?>