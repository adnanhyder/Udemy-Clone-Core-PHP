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
            style="object-fit:cover;  width:100%; height:430px; box-shadow:10px">
    </div>
</div>
<!-- End Course Page Banner-->

<!-- Start Main Content-->
<div class="container mt-5">
<?php
    if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
    if(isset($_GET['course_id'])){
        $course_id = $_GET['course_id'];
        $_SESSION['course_id'] = $course_id;
        $sql = "SELECT * FROM course WHERE course_id = '$course_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    } else {
    if(isset($_GET['course_id'])){
        $course_id = $_GET['course_id'];
        $_SESSION['course_id'] = $course_id;
        $sql = "SELECT * FROM course WHERE course_id = '$course_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
}
    ?>
    <div class="row" style="padding-top: 20px;">
        <div class="col-md-4">
            <img src="<?php echo str_replace('..', '.', $row['course_img']) ?>" class="card-img-top" alt="">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><b>Course Name:</b> <?php echo $row['course_name'] ?></h5>
                <p class="card-text"><b>Description:</b>  <?php echo $row['course_desc'] ?></p>
                <p class="card-text"><b>Duration:</b>  <?php echo $row['course_duration'] ?></p>
                <form method="post">
                    <p class="card-text d-inline"><b>Price:</b>
                        <small><del><?php echo $row['course_original_price'] ?></del></small>
                        <span class="font-weight-bolder"><?php echo $row['course_price'] ?></span>
                    </p>
                    <input type="hidden" name="id" value="<?php echo $row['course_price']?>">
                    <?php 
                    if(isset($_SESSION['is_login'])){
                        echo '<a href="Payment\payment.php" class="btn btn-primary text-white font-weight-bolder float-right"
                        name="buy">Buy Now</a>';
                    } else
                    {
                        echo '<a href="account.php" class="btn btn-primary text-white font-weight-bolder float-right"
                        name="buy">Buy Now</a>';  
                    }
                    ?>
                    <!--<button type="submit" class="btn btn-primary text-white font-weight-bolder float-right"
                        name="buy">Buy Now</button>-->
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Lesson No.</th>
                        <th scope="col">Lesson Name</th>
                        <th scope="col">Course ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM topics";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        $num = 0;
                        while($row = $result->fetch_assoc()){
                            if($course_id == $row['course_id']){
                                $num++;
                                echo '<tr>
                                <th scope="row">'.$num.' </th>
                                <td>'.$row['topics_name'].'</td>
                                <td>'.$row['course_id'].'</td>
                            </tr>';
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End Main Content-->

<!-- Start Including Footer-->
<?php
include('./maininclude/footer.php');
?>
<!-- End Including Footer-->