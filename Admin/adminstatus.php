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

<?php
// # GetPaymentSample
// This sample code demonstrate how you can
// retrieve a list of all Payment resources
// you've created using the Payments API.
// ### Retrieve payment
// Retrieve the payment object by calling the
// static `get` method
// on the Payment class by passing a valid
// Payment ID
// (See bootstrap.php for more on `ApiContext`)
$uziar =   realpath(__DIR__ . '/..'); 
$uziar = $uziar."/vendor/autoload.php";
require $uziar;

//require  __DIR__ . '\..\vendor\autoload.php';

require '../Payment/botstrap.php';

use PayPal\Api\PayPalApiAmount;
use PayPal\Api\PayPalApiDetails;
use PayPal\Api\PayPalApiItem;
use PayPal\Api\PayPalApiItemList;
use PayPal\Api\PayPalApiCreditCard;
use PayPal\Api\PayPalApiPayer;
use PayPal\Api\PayPalApiPayment;
use PayPal\Api\PayPalApiFundingInstrument;
use PayPal\Api\PayPalApiTransaction;

if (isset($_POST['submit'])) {
$paymentId = $_POST['paymentId'];
try {
$payment = \PayPal\Api\Payment::get($paymentId, $apiContext);
$obj = json_decode($payment); // $obj contains the All Transaction Information.Some of them,I have displayed Below.
} catch (Exception $ex) {
$payment = 'Not Valid';
}
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin
        </h1>
        <ol class="breadcrumb">
            <li><a href="admindashboard.php">Home</a></li>
            <li><a href="admincourses.php">Courses</a></li>
            <li><a class="active">Transaction</a></li>
        </ol>
    </section>
    <div id="main">
        <h1 class="payhead">PayPal Transaction Details using Transaction Id</h1>
        <div id="login">
            <h2 class="payhead">Transaction Detail</h2>
            <hr />
            <div id="search">
                <table id="results">
                    <thead>
                        <tr class="head">
                            <th style="padding-left: 40px;">Enter TransactionID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding-left: 37px;">
                                <form action="adminstatus.php" method="POST">
                                    <input type="text" name="paymentId" style="width: 234px;">
                                    <input type="submit" id="submit" value="Search" name="submit">
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php
if (isset($_POST['submit'])) {
if ($payment !== 'Not Valid') {
?>
            <table class="table">
                <thead>
                    <tr>
                        <h4 class="payer"><b>Payer Detail</b></h4>
                    </tr>
                </thead>
                <tbody>
                    <tr class="coll">
                        <td class="coll">TransID</td>
                        <td class="coll">
                            <?php echo $obj->id; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Payment Method</td>
                        <td>
                            <?php echo $obj->payer->payment_method; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Full Name</td>
                        <td>
                            <?php
                            echo $obj->payer->payer_info->first_name;
                            echo ' ';
                            echo $obj->payer->payer_info->last_name;
                            ?>
                        </td>
                    </tr>
                    <tr class="coll">
                        <td class="coll">Email</td>
                        <td class="coll">
                            <?php echo $obj->payer->payer_info->email; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Payer ID</td>
                        <td>
                            <?php echo $obj->payer->payer_info->payer_id; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <li>
                                <?php echo "Line1 -> " . $obj->payer->payer_info->shipping_address->line1 ?>
                            </li>
                            <li>
                                <?php echo "City -> " . $obj->payer->payer_info->shipping_address->city ?>
                            </li>
                            <li>
                                <?php echo "State -> " . $obj->payer->payer_info->shipping_address->state ?>
                            </li>
                            <li>
                                <?php echo "Postal Code -> " . $obj->payer->payer_info->shipping_address->postal_code ?>
                            </li>
                            <li>
                                <?php echo "Country Code -> " . $obj->payer->payer_info->shipping_address->country_code ?>
                            </li>
                            <li>
                                <?php echo "Recipient Name -> " . $obj->payer->payer_info->shipping_address->recipient_name ?>
                            </li>
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <?php echo $obj->payer->status; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h4 class="payer"><b>Transactions Detail</b></h4>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Invoice_Number</td>
                        <td>
                            <?php echo $obj->transactions[0]->invoice_number; ?>
                        </td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>Total Amount</td>
                        <td>
                            <li>
                                <?php echo "Total Amount -> " . $obj->transactions[0]->amount->total ?>
                            </li>
                            <li>
                                <?php echo "Currency -> " . $obj->transactions[0]->amount->currency ?>
                            </li>
                        </td>
                    </tr>
                </tbody>
            </table>
            <form action="" method="post" class="print">
                <input type="submit" class="btn btn-danger" value="PRINT" onClick="window.print()">
            </form>
            <?php
            } 
            else if ($payment === 'Not Valid') 
            {
?>
            <table id="results" class="messages">
                <thead>
                    <tr class="head">
                        <th colspan="2"><span>Enter Valid Transaction ID.</span></th>

                    </tr>
                </thead>
            </table>
            <?php }
}
?>
        </div>
    </div>
<?php
include('../Admin/admininclude/footer.php');
?>