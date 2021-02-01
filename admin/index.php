<?php include_once 'header_admin.php' ?>


<div class="container">
    <h1 class="rounded border p-2 mt-5 mb-5 text-center text-white bg-dark text-uppercase">Welcome to your dashboard</h1>

    <div class="row">

        <div class="col-md-4 col-xs-12 back-office-card">
            <a href="add_product.php">
                <div class="card mb-3 rounded shadow-sm">
                    <h4 class="card-header text-center text-white bg-dark">Add a Product</h4>
                    <img src="../assets/img/add_product.png" alt="add_product" class="img-add">
                </div>
            </a>
        </div>

        <div class="col-md-4 col-xs-12 back-office-card">
            <a href="update_product.php">
                <div class="card mb-3 rounded shadow-sm">
                    <h4 class="card-header text-center">Update Products</h4>
                    <img src="../assets/img/update_product.png" alt="add_product" class="img-add">
                </div>
            </a>
        </div>

        <div class="col-md-4 col-xs-12 back-office-card">
            <a href="reviews.php">
                <div class="card mb-3 rounded shadow-sm">
                    <h4 class="card-header text-center text-white bg-dark">Manage Reviews</h4>
                    <img src="../assets/img/reviews.png" alt="add_product" class="img-add">
                </div>
            </a>
        </div>

    </div>

    <?php include_once 'footer_admin.php' ?>