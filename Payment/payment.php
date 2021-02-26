<?php
if(!isset($_SESSION)){
    session_start();
}
//include_once 'config.php'; 
//include_once 'dbconnect.php';
include_once '../dbconnection.php';


if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
    $course_id = $_SESSION['course_id'];
} 
if(isset($course_id)){
    $sql = "SELECT course_name , course_img , course_desc , course_price , 
    course_original_price FROM course WHERE 
    course_id = '$course_id'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    $course_name = $row['course_name'];
    $course_img = $row['course_img'];
    $course_desc = $row['course_desc'];
    $course_price =$row['course_price'];
    $course_original_price = $row['course_original_price'];
} 
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Paypal Payment</title>

</head>
<body>
    <main id="cart-main">
        <div class="site-title text-center">
            <h1 class="font-title">Course Detail</h1>
        </div>
        <div class="container">
            <div class="grid">
                <div class="col-1">
                    <div class="flex item justify-content-between">
                        <div class="flex">
                            <div class="img text-center">
                                <img src="<?php echo str_replace('.', '.', $row['course_img']) ?>" alt="">
                            </div>
                            <div class="title">
                                <h3>
                                    <?php echo $course_name ?>
                                </h3>
                            </div>
                        </div>
                        <div class="price">
                            <p class="card-text d-inline"><b>Price:</b>
                                <small><del>
                                        <?php echo $course_original_price ?>
                                    </del></small>
                                <span class="font-weight-bolder">
                                    <?php echo $course_price ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="subtotal text-center">
                        <h3>Price Details</h3>

                        <ul style="width: 172px;">

                            <li class="flex justify-content-between">
                                <label for="price">Delivery Charges : </label>
                                <span>Free</span>
                            </li>
                            <hr>
                            <form method="GET" action="createpayment.php">
                                <li class="flex justify-content-between">
                                    <label for="price">Amout Payble : </label>
                                    <span class="text-red font-title">
                                        <?php echo $course_price ?>
                                    </span>
                                </li>
                        </ul>
                        <input type="hidden" value="<?php echo $course_id?>" name="course_id" />
                        <input type="hidden" value="<?php echo $course_name?>" name="course_name" />
                        <input type="hidden" value="<?php echo $course_price?>" name="course_price" />
                        <input type="hidden" value="<?php echo $stuLogEmail ?>" name="stu_email" />
                        <input type="hidden" name="hosted_button_id" value="UCEHWFHUFCDQ4">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" 
                            border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" 
                            width="1" height="1">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>