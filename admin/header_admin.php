<?php
include_once 'pdo.php';
include_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>We Love Techno</title>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand font-weight-bold" href="index.php">We ♥︎ Techno | <span class="text-warning">Back-Office</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-2">
                    <a class="nav-link text-white" href="index.php">Manage Products</a>
                </li>
                <li class="nav-item mr-2">
                    <a class="nav-link text-white" href="index.php">Manage Reviews</a>
                </li>
                <li class="nav-item mr-2">
                    <a href="../logout.php" class="nav-link text-white sign-out">Log out <i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </div>

        <!-- Greeting  -->
        <?php if (isset($_SESSION['user_name'])) { ?>
            <small class="text-white mr-2 greeting">Welcome, admin.</small>
        <?php } ?>


    </nav>