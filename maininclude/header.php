<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

    <title>SMS</title>
</head>

<body>
    <!-- Start navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark pl-5 fixed-top">
        <a class="navbar-brand" href="index.php">SMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav custom-nav pl-5">
                <li class="nav-item custom-nav-item">
                    <a href="index.php" class="nav-link"> Home</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a href="courses.php" class="nav-link">Courses</a>
                </li>
                <?php
                session_start();
                if(isset($_SESSION['is_login'])){
                    echo '<li class="nav-item custom-nav-item">
                    <a href="student/studentdashboard.php" class="nav-link">My Profile</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a href="logout.php" class="nav-link">Logout</a>
                </li>';
                } else {
                    echo '<li class="nav-item custom-nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#stuLoginModalCenter">Login</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Signup</a>
                </li>';
                }
                ?>
            </ul>
        </div>
    </nav>
    <!-- End navigation-->