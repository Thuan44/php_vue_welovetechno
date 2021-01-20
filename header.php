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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Suez+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <title>We Love Techno</title>
</head>

<body>

    <div id="app">

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-lg fixed-top">
            <router-link class="navbar-brand font-weight-bold" style="border: 2px solid #fff; border-radius: 50px; padding: 5px 10px" to="/">We <span class="text-warning">♥︎</span> Techno</router-link>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <form class="form-inline my-2 my-lg-0 search-bar">
                    <input class="form-control form-control-sm mr-sm-2 search-input" style="width: 300px; border-radius: 50px;" type="search" placeholder="Looking for something ?" aria-label="Search">
                    <button class="btn btn-outline-success btn-sm my-2 my-sm-0" style="border-radius: 50px;" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <router-link class="nav-link text-white" to="/contact">Contact <span class="text-warning"><i class="fas fa-comment"></i></span></router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link text-white" to="/cart">Cart <span class="text-warning"><i class="fas fa-shopping-cart"></i></span></router-link>
                    </li>
                    <!-- Sign out button -->
                    <?php if (isset($_SESSION['user_name'])) { ?>
                        <li class="nav-item mr-0">
                            <a href="logout.php" class="nav-link text-white">Logout <span class="text-warning"><i class="fas fa-sign-out-alt"></i></span></a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="login.php" class="nav-link text-white">Login <span class="text-warning"><i class="fas fa-sign-in-alt"></i></span></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            
        </nav>
        
        
        <div class="second-nav bg-primary pb-1 shadow-lg">
            <ul class="d-flex list-unstyled">
                <li v-for="category in categories" class="nav-item">
                    <a href="#" class="nav-link text-white p-0">{{ category.category_name }}</a>
                </li>
            </ul>
            <!-- Greeting  -->
            <?php if (isset($_SESSION['user_name'])) { ?>
                <small class="text-white greeting-guest text-capitalize">Hi, <?php echo $_SESSION['user_name'] ?>.</small>
            <?php } ?>
        </div>

        <!-- Router View -->
        <router-view></router-view>