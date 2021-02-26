<!-- Start Including Header-->
<?php
include('./maininclude/header.php');
?>
<!-- End Including Header-->

<!-- Start Course Page Banner-->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="assets/images/payment.jpg" 
        alt="courses" style="object-fit:cover;  width:100%; height:430px; box-shadow:10px">
    </div>
</div>
<!-- End Course Page Banner-->

<!-- Start Main Content-->
<div class="container">
    <h2 class="text-center my-4">Payment Status</h2>
    <form action="" method="post">
        <div class="form-group row">
            <label class="offset-sm-3 col-form-label">Order ID: </label>
            <div>
            <input type="text" class="form-control mx-3">
            </div>
            <div>
            <input type="submit" class="btn btn-primary mx-4" value="view">
            </div>
        </div>
    </form>
</div>
<!-- End Main Content-->

 <!--Start Contact Us-->
 
 <?php
   include('./contact/contact.php');
  ?>

 <!--End Contact Us-->


<!-- Start Including Footer-->
<?php
include('./maininclude/footer.php');
?>
<!-- End Including Footer-->