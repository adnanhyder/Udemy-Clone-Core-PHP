<?php
include('../dbconnection.php');
use PayPal\Api\Invoice;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
require 'bootstrap.php';
$uziar =   realpath(__DIR__ . '/..'); 
$uziar = $uziar."/vendor/autoload.php";
require $uziar;

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AbGtdYlw985Dyrc-Z0m9fHxGDm1UlClh2fNeaWMyCSs_h_s5VHOsoj7T7QTO18uNYGBr24EeMPmsd70p',     // ClientID
        'EITECMNvyeC4K_ZkK-oc1tZ-FFZVhOOG0HcIG2X63_9RsTu39pembJLPx9diRNcJOhjpQrbMWCcLrnjr'      // ClientSecret
    )
);

if(isset($_GET['paymentId'])){
    $paymentId = $_GET['paymentId'];
    $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);
    $payerId = $_GET['PayerID'];
    
    // Execute payment with payer ID
    $execution = new \PayPal\Api\PaymentExecution();
    $execution->setPayerId($payerId);
    
    try {

      // Execute payment
      $result = $payment->execute($execution, $apiContext);
      echo "Thankyou Your Payemnt recived";
      echo '<a href="suces.php" class="btn btn-primary text-white font-weight-bolder float-left pt-5"
      name="buy">GO Back</a>';
    } catch (PayPal\Exception\PayPalConnectionException $ex) {
      echo $ex->getCode();
      echo $ex->getData();
      die($ex);
    } catch (Exception $ex) {
      die($ex);
    }
}else{

// After Step 1
$courseid = $_GET['course_id'];
$coursename = $_GET['course_name'];
$courseprice = $_GET['course_price'];
$stuemail = $_GET['stu_email'];
$invoiceNumber = uniqid();

$payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod('paypal');

$amount = new \PayPal\Api\Amount();
$amount->setTotal($courseprice);
$amount->setCurrency('USD');

//$invoice =  new \Paypal\Api\Invoice();
//$invoice->setId($courseid);


$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount)
            ->setInvoiceNumber($invoiceNumber);

$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl("http://dev.softlabs.cc/uzair_80/ELEARNING/Payment/response.php")
    ->setCancelUrl("http://dev.softlabs.cc/uzair_80/ELEARNING/Payment/onCancel.php");

$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions(array($transaction))
    ->setRedirectUrls($redirectUrls);



// After Step 3
try {
    $payment->create($apiContext);
   // echo $payment;
   ?> <script>
     window.location.assign("<?php echo $payment->getApprovalLink() ?>")
   </script>
   <?php
    echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
}
catch (\PayPal\Exception\PayPalConnectionException $ex) {
    // This will print the detailed information on the exception.
    //REALLY HELPFUL FOR DEBUGGING
    echo $ex->getData();
}
}
?>
