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
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-lg">
            <router-link class="navbar-brand font-weight-bold" to="/">We <span class="text-warning">♥︎</span> Techno</router-link>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control form-control-sm mr-sm-2" style="width: 300px;" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit">Search</button>
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
                <!-- Greeting  -->
                <?php if (isset($_SESSION['user_name'])) { ?>
                    <small class="text-white greeting text-capitalize">Hi, <?php echo $_SESSION['user_name'] ?>.</small>
                <?php } ?>
            </div>

        </nav>

        <div class="second-nav bg-primary pl-5 pb-1">
            <ul class="d-flex list-unstyled">
                <li v-for="category in categories" class="nav-item">
                    <a href="#" class="nav-link text-white p-0">{{ category.category_name }}</a>
                </li>
            </ul>
        </div>

        <!-- Router View -->
        <router-view></router-view>