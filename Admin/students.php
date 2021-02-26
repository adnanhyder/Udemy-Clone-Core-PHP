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
            Students
        </h1>
        <ol class="breadcrumb">
            <li><a href="admindashboard.php">Home</a></li>
            <li><a href="admincourses.php">Courses</a></li>
            <li><a class="active">Students</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="course_content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-10 pt-2">
                <p class="bg-dark text-white text-center p-2">List of Students</p>
                <?php
                
                $sql = "SELECT * FROM student";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                ?>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th class="coll">Occupation</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                         while($row = $result->fetch_assoc()){
                        echo '<tr>';
                        echo '<th scope="row">'.$row['stu_id'].'</th>';
                        echo '<td>'.$row['stu_name'].'</td>';
                        echo '<td>'.$row['stu_email'].'</td>';
                        echo '<td class="coll">'.$row['stu_occ'].'</td>';
                        echo '<td>';
                        echo '
                        <form action="editstudent.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value='.$row["stu_id"].'>
                        <button type="submit" class="btn btn-info mr-3" name="edit" value="Edit">
                        <i class="fas fa-pen"></i></button>
                         </form>

                                <form action="" method="POST" class="d-inline">
                                <input type="hidden" name="id" value='.$row["stu_id"].'>
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
                // Delete Corse Start
                if(isset($_REQUEST['delete'])){
                    $sql = "DELETE FROM student WHERE stu_id = {$_REQUEST['id']}";
                    if($conn->query($sql) == TRUE){
                        echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                    }else {
                        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">
                           No data deleted</div>';
                    }
                }
                // Delete Corse End
                ?>
            </div>
        </div>
        <!-- /.row -->

        <div>
            <a id="box" class="btn btn-danger box" href="./addstudent.php">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include('../Admin/admininclude/footer.php');
?>