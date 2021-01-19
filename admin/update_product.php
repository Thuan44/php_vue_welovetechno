<?php include_once 'header_admin.php' ?>

<?php
@$categoryId = $_POST['category_id'];
@$productId = $_POST['product_id'];
@$productBrand = $_POST['product_brand'];
@$productName = htmlspecialchars($_POST['product_name']);
@$productPrice = htmlspecialchars($_POST['product_price']);
@$productStock = htmlspecialchars($_POST['product_stock']);
@$productDescription = htmlspecialchars($_POST['product_description']);

$listCategories = listCategories();
$listBrandsByCategory = listBrandsByCategory($categoryId);

?>

<h1 class="rounded border p-2 m-4 text-center text-white bg-dark">Update a product</h1>

<div class="container">

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

        <fieldset>

            <legend class="text-center">Which product will you add ?</legend>

            <!-- Lists -->
            <div class="row">
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
                <div class="col-6">
                    <div class="form-group">
                        <select class="custom-select">
                            <option selected="">2. Select a brand</option>
                            <?php foreach ($listBrandsByCategory as $brand) : ?>
                                <option value="<?php echo $brand['product_id'] ?>" <?php if ($brand['product_id'] === @$_POST['product_id']) { echo "selected"; } ?>><?= $brand['product_brand'] ?>
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
                        <input class="form-control" type="text" name="product_name" placeholder="Product Name">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <input class="form-control" type="text" name="product_price" placeholder="Product Price">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <input class="form-control" type="text" name="product_stock" placeholder="Quantity in stock">
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="form-group">
                <textarea class="form-control" name="product_description" id="Product Description" value="Product Description" rows="3" style="color: #919AA1;">Product Description</textarea>
            </div>

            <!-- Upload image -->
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02">
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
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