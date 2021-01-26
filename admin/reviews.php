<?php include_once 'header_admin.php' ?>


<?php
@$categoryId = $_POST['category_id'];
@$productId = $_POST['product_id'];
@$brandId = $_POST['brand_id'];
@$productName = $_POST['product_name'];
@$reviewId = $_POST['review_id'];


if (isset($_POST['validate'])) {
    validateReview($reviewId);
}

if (isset($_POST['invalidate'])) {
    invalidateReview($reviewId);
}

if (isset($_POST['delete-review'])) {
    deleteReview($reviewId);
}

$listCategories = listCategories();
$listBrands = listBrands();
$listProducts = listProducts($categoryId, $brandId);
$listReviewsByProduct = listReviewsByProduct($productId);

?>

<div class="container">

    <h1 class="rounded border p-2 mt-5 mb-4  text-center text-white bg-dark">Review Manager</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

        <fieldset>

            <legend class="text-center">Manage your reviews as you need</legend>

            <!-- Lists -->
            <div class="row">

                <!-- Categories -->
                <div class="col-4">
                    <div class="form-group">
                        <select class="custom-select" name="category_id" onChange="submit()" required>
                            <option selected="">1. Select a category</option>
                            <?php foreach ($listCategories as $category) : ?>

                                <option value="<?php echo $category['category_id'] ?>" <?php if ($category['category_id'] === @$_POST['category_id']) { echo "selected"; } ?>><?= $category['category_name'] ?>
                                </option>

                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <!-- Brands -->
                <div class="col-4">
                    <div class="form-group">
                        <select class="custom-select" name="brand_id" onChange="submit()" required>
                            <option selected="">2. Select a brand</option>
                            <?php foreach ($listBrands as $brand) : ?>
                                <?php var_dump($brand) ?>
                                <option value="<?php echo $brand['brand_id'] ?>" <?php if ($brand['brand_id'] === @$_POST['brand_id']) { echo "selected"; } ?>><?= $brand['brand_name'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <!-- Products -->
                <div class="col-4">
                    <div class="form-group">
                        <select class="custom-select" name="product_id" onChange="submit()" required>
                            <option>2. Select a product</option>
                            <?php foreach ($listProducts as $product) : ?>
                                <option value="<?php echo $product['product_id'] ?>" <?php if ($product['product_id'] === @$_POST['product_id']) { echo "selected"; } ?>><?= $product['product_name'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

            </div>

        </fieldset>

    </form>

    <?php if (count($listReviewsByProduct)) { ?>

        <!-- Table of products -->
        <table class="table table-hover border">
            <thead class="bg-dark text-white text-center">
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">User</th>
                    <th scope="col">Review</th>
                    <th scope="col">State</th>
                    <th scope="col">Validation</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listReviewsByProduct as $review) { ?>
                    <tr class="table-light border product-line">
                        <td class="align-middle text-center font-italic">27-04-21</td>
                        <td class="align-middle text-center font-weight-bold"><?= $review['user_name'] ?></td>
                        <td class="align-middle text-left"><?= $review['review_content'] ?></td>
                        <td class="align-middle text-center">
                            <?php if ($review['is_valid'] == 0) { ?>
                                <div class="not-valid-icon validation-icon"><i class="fas fa-times-circle text-danger"></i></div>
                            <?php } else { ?>
                                <div class="valid-icon validation-icon"><i class="fas fa-check-circle text-success"></i></div>
                            <?php } ?>
                        </td>
                            
                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                <td class="align-middle text-center">
                                    <?php if ($review['is_valid'] == 0) { ?>
                                        <button class="btn btn-light toggle-btn rounded" type="submit" name="validate" value=""><i class="fas fa-toggle-off"></i></button>
                                    <?php } else { ?>
                                        <button class="btn btn-light toggle-btn rounded" type="submit" name="invalidate" value=""><i class="fas fa-toggle-on"></i></button>
                                    <?php } ?>
                                </td>
                            <td class="align-middle text-center"><button type="submit" class="btn text-danger btn-cart-delete rounded" name="delete-review"><i class="fas fa-trash-alt"></i></button></td>

                            <input type="hidden" name="review_id" value="<?= @$review['review_id'] ?>">
                            <input type="hidden" name="category_id" value="<?= @$_POST['category_id'] ?>">
                            <input type="hidden" name="brand_id" value="<?= @$_POST['brand_id'] ?>">
                            <input type="hidden" name="product_id" value="<?= @$_POST['product_id'] ?>">
                        </form>

                    </tr>
                <?php } ?>
            </tbody>
        </table>

    <?php } ?>

</div>


<?php include_once 'footer_admin.php' ?>