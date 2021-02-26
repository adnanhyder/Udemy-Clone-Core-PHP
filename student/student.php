<?php

if(!isset($_SESSION)){
    session_start();
}
include_once('../dbconnection.php');

if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
} 

if(isset($stuLogEmail)){
    $sql = "SELECT stu_img FROM student WHERE stu_email = 
    '$stuLogEmail'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img'];
}
?>