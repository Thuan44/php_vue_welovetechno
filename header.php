<?php
include_once 'admin/pdo.php';
include_once 'admin/functions.php';
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

    <div id="app">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary d-flex justify-content-between">
        <router-link class="navbar-brand font-weight-bold" to="/">We ♥︎ Techno</router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarColor01">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <router-link class="nav-link text-white" to="/contact">Contact <i class="fas fa-comment"></i></router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link text-white" to="/cart">Cart <i class="fas fa-shopping-cart"></i></router-link>
                </li>
                <!-- Sign out button -->
                <?php if (isset($_SESSION['user_name'])) { ?>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link text-white sign-out"><i class="fas fa-sign-out-alt"></i></a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <router-link to="/login" class="nav-link text-white sign-out">Login <i class="fas fa-sign-in-alt"></i></router-link>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <!-- Greeting  -->
        <?php if (isset($_SESSION['user_name'])) { ?>
            <small class="text-white mr-2 greeting">Hi, <?php echo $_SESSION['user_name'] ?>.</small>
        <?php } ?>

    </nav>
    
    <!-- Router View -->
    <router-view></router-view>