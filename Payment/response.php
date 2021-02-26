<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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


use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;


require 'bootstrap.php';


$paymentId = $_GET['paymentId'];
$payment = Payment::get($paymentId, $apiContext);

$execution = new PaymentExecution();
$execution->setPayerId($_GET['PayerID']);
$payment->execute($execution, $apiContext);
 $conn = new mysqli($db_host, $db_user, $db_password, $db_name);


 
 
    $payment = Payment::get($paymentId, $apiContext);

        $data = [
            'transaction_id' => $payment->getId(),
            'payment_amount' => $payment->transactions[0]->amount->total,
            'stu_email' => $_SESSION['stuLogEmail'],
            'course_id' => $_SESSION['course_id'],
            'payment_status' => $payment->getState(),
            'invoice_id' => $payment->transactions[0]->invoice_number
        ];
      
   
        
        if (addPayment($data , $conn) !== false && $data['payment_status'] === 'approved') {
            // Payment successfully added, redirect to the payment complete page.
            
      
            header('location:success.php');
            exit(1);
        } else {
            echo "Payment Not Added";

        }








function addPayment($data, $conn)
{
    
    $tid = $data['transaction_id'];
    $cid = $data['course_id'];
    $email =     $data['stu_email'];
    $pyammount = $data['payment_amount'];
    $payment_status = $data['payment_status'];
    $invoice_id = $data['invoice_id'];
    $date = date('Y-m-d');

    if (!empty($data)) {
        $stu_email = $_SESSION['stuLogEmail'];
        $course_id = $_SESSION['course_id'];
     
           $sql = "INSERT INTO payment(transaction_id,stu_email, course_id,  payment_amount, payment_status, invoice_id, createddate) 
                 VALUES ('$tid' ,  '$email','$cid' ,'$pyammount', '$payment_status','$invoice_id' , '$date' )";
           
            $result =  mysqli_query ($conn, $sql);
            
    }else{
        echo 0;
    }

}


