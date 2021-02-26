<?php

$db_host = "localhost";
$db_user = "bilalsof_uzair";
$db_password = "1]du3Lsr;ARf";
$db_name = "bilalsof_lms";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if($conn->connect_error) {
    die("connection failed");
}
/*else {
    echo"connected";
}


/*$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "lms_db";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if($conn->connect_error) {
    die("connection failed");
}
/*else {
    echo"connected";
}*/


?>