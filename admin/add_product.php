<?php include_once 'header_admin.php' ?>

<?php
@$categoryId = $_POST['category_id'];
@$productId = $_POST['product_id'];
@$brandId = $_POST['brand_id'];
@$productName = htmlspecialchars($_POST['product_name']);
@$productPrice = htmlspecialchars($_POST['product_price']);
@$productStock = htmlspecialchars($_POST['product_stock']);
@$productDescription = htmlspecialchars($_POST['product_description']);

$listCategories = listCategories();
$listBrands = listBrands();

if (isset($_POST['add'])) {
    addProduct($brandId, $productName, $productDescription, $productPrice, $productStock, $categoryId);
}
?>



<div class="container">
    <h1 class="rounded border p-2 mt-5 mb-4  text-center text-white bg-dark">Add a product</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

        <fieldset>

            <legend class="text-center">Which product will you add ?</legend>

            <!-- Lists -->
            <div class="row">

                <!-- Categories -->
                <div class="col-6">
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
                <div class="col-6">
                    <div class="form-group">
                        <select class="custom-select" name="brand_id" onChange="submit()" required>
                            <option selected="">2. Select a brand</option>
                            <?php foreach ($listBrands as $brand) : ?>
                                <option value="<?php echo $brand['brand_id'] ?>" <?php if ($brand['brand_id'] === @$_POST['brand_id']) { echo "selected"; } ?>><?= $brand['brand_name'] ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Inputs -->
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <input class="form-control" type="text" name="product_name" placeholder="Choose a name">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <input class="form-control" type="text" name="product_price" placeholder="Choose a price">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <input class="form-control" type="text" name="product_stock" placeholder="Set the quantity in stock">
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="form-group">
                <textarea class="form-control" name="product_description" id="Product description" value="Add a description" rows="3" style="color: #919AA1;">Product description</textarea>
            </div>

            <!-- Upload image -->
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02">
                        <label class="custom-file-label" for="inputGroupFile02">Choose a file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>

            <!-- Add Button -->
            <button type="submit" name="add" class="btn btn-dark btn-md btn-block btn-midradius">Add to Database</button>

        </fieldset>

    </form>

</div>

<?php include_once 'footer_admin.php' ?>