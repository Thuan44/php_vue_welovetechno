<?php include_once 'header_admin.php' ?>

<h1 class="rounded border p-2 m-4 text-center text-white bg-dark text-uppercase">Welcome to your dashboard</h1>

<div class="container">
    <div class="row">

        <div class="col-4">
            <a href="add_product.php">
                <div class="card mb-3 rounded shadow-sm">
                    <h4 class="card-header text-center">Add a Product</h4>
                    <img src="../assets/img/add_product.png" alt="add_product" class="img-add">
                </div>
            </a>
        </div>

        <div class="col-4">
            <a href="update_product.php">
                <div class="card mb-3 rounded shadow-sm">
                    <h4 class="card-header text-center">Update Products</h4>
                    <img src="../assets/img/update_product.png" alt="add_product" class="img-add">
                </div>
            </a>
        </div>

        <div class="col-4">
            <a href="reviews.php">
                <div class="card mb-3 rounded shadow-sm">
                    <h4 class="card-header text-center">Manage Reviews</h4>
                    <img src="../assets/img/reviews.png" alt="add_product" class="img-add">
                </div>
            </a>
        </div>

    </div>

    <?php include_once 'footer_admin.php' ?>