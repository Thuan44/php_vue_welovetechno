<?php
session_start();

?>

<!-- <?php $session_value=(isset($_SESSION['user_id']))?$_SESSION['user_id']:''; ?>
    <script type="text/javascript">
        var userId='<?php echo $session_value;?>';
    </script>
    <script type="text/javascript" src="../vue.js"></script> -->


<?php 

# LOGIN ================
function login($userEmail, $userPassword) {
    global $connection; 

    $query = "SELECT * FROM users WHERE user_email = '$userEmail' AND user_password = '$userPassword' LIMIT 1";
    $result = $connection->prepare($query);
    $result->execute();
    $data = $result->fetch();

    if($data) {
        $_SESSION['user_name'] = $data['user_name']; 
        $_SESSION['user_email'] = $data['user_email']; 
        $_SESSION['user_password'] = $data['user_password']; 
        $_SESSION['user_role'] = $data['user_role']; 
        $_SESSION['user_id'] = $data['user_id']; 

        // Admin
        if($_SESSION['user_role'] == 5) {
            header ('Location: admin/index.php');
        }
        // Visitor
        if($_SESSION['user_role'] == 1) {
            header ('Location: index.php');
        }
    } else {
        session_destroy();
    }
}

// Form security 
function isEmail($var) {
    return filter_var($var, FILTER_VALIDATE_EMAIL); // Check if email is valid, returns a boolean
}

function verifyInput($var) {
    $var = trim($var); // Remove white spaces and line breaks
    $var = stripslashes($var); // Remove backslashes
    $var = htmlspecialchars($var);
    return $var;
}

// Create account
function signUp($userName, $userEmail, $userPassword) {
    global $connection;
    
    $query = "INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)";
    $result = $connection->prepare($query);
    $result->execute(array( 
        $userName,
        $userEmail,
        $userPassword
    ));
}


# DISPLAY LISTS =============
function listCategories() {
    global $connection;

    $query = "SELECT * FROM categories";
    $result = $connection->prepare($query);
    $result->execute();
    return $result->fetchAll();
}

// List of brands
function listBrands() {
    global $connection;

    $query = "SELECT * FROM brands";
    $result = $connection->prepare($query);
    $result->execute();
    return $result->fetchAll();
}

// List of products
function listProducts($categoryId, $brandId) {
    global $connection;

    $query = "SELECT * FROM products WHERE category_id = $categoryId AND brand_id = $brandId";
    $result = $connection->prepare($query);
    $result->execute();
    return $result->fetchAll();
}


# ADD PRODUCT =============
function addProduct($brandId, $productName, $productDescription, $productPrice, $productStock, $categoryId) {
    global $connection;

    $query = "INSERT INTO products (brand_id, product_name, product_description, product_price, product_stock, category_id)
            VALUES (?, ?, ?, ?, ?, ?)";
    $result = $connection->prepare($query);
    $result->execute(array(
        $brandId, $productName, $productDescription, $productPrice, $productStock, $categoryId
    ));

    $productId = $connection->lastInsertId();

    if (isset($_FILES['file'])) {
        uploadImg($productId);
    }
}


# UPDATE PRODUCT =============
// Get article by id (and display values in inputs)
function getProductById($productId) {
    global $connection;

    $query = "SELECT * FROM products WHERE product_id = $productId";
    $result = $connection->prepare($query);
    $result->execute();
    return $result->fetch();
}

// Update product
function updateProduct($productId, $productName, $productPrice, $productStock, $productDescription) {
    global $connection;

    $query = "UPDATE products
            SET product_name = :productName,
            product_price = :productPrice,
            product_stock = :productStock,
            product_description = :productDescription
            WHERE product_id = :productId";
    $result = $connection->prepare($query);
    $result->execute(array(
        ':productId' => $productId,
        ':productName' => $productName,
        ':productPrice' => $productPrice,
        ':productStock' => $productStock,
        ':productDescription' => $productDescription
    ));
}

// Delete Product
function deleteProduct($productId) {
    global $connection;

    $query = "DELETE FROM products WHERE product_id = $productId";
    $result = $connection->prepare($query);
    $result->execute();
}


# UPLOAD IMAGE ============
function uploadImg($productId) {

    $j = 0; // Variable for indexing uploaded image

    $target_path = "../assets/"; // Declaring Path for uploaded images

        for ($i = 0; $i < count($_FILES['file']['name']); $i++) { // Loop to get individual element from array
            $validextensions = array ("jpeg", "jpg", "png"); // Extensions which are allowed

            $ext = explode('.', basename($_FILES['file']['name'][$i])); // Explode file name from dot(.) (like split in js)
            $file_extension = end($ext); // Store extension in the variable

            $target_path = $target_path . uniqid() .  "." . $ext[count($ext) - 1]; // Set the target path with a new name of image. md5 encrypts.  
    
            $j++; // increment the number of uploaded images according to the files in array

            if (($_FILES['file']['size'][$i] < 300000) //Approx. 100kb files can be upload.  
                && in_array($file_extension, $validextensions)) {
                if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) { // If file moved to uploads folder
                    echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                    getImgName(basename($target_path), $productId);
                } else { // If file was not moved
                    echo $j. ').<span id="error">Please try again !</span><br/><br/>';
                }
            }  else { // If file size and tpye was incorrect
                echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
            }           
        } 

}

function getImgName($target_path, $productId) {
    
    global $connection;
    
    $query = "INSERT INTO images (img_name, product_id) VALUES (:imgName, :productId)";
    $result = $connection->prepare($query);
    $result->execute(array( 
        ':imgName' => $target_path,
        ':productId' => $productId
    ));

}


# REVIEWS ================
// Get list of reviews by product
function listReviewsByProduct($productId) {
    global $connection;

    $query = "SELECT * FROM reviews
            INNER JOIN users ON reviews.user_id = users.user_id
            WHERE product_id = $productId";
    $result = $connection->prepare($query);
    $result->execute();
    return $result->fetchAll();
}

// Invalidate review
function validateReview($reviewId) {
    global $connection;

    $query = "UPDATE reviews
            SET is_valid = 1
            WHERE review_id = $reviewId";

    $result = $connection->prepare($query);
    $result->execute();
}

// Invalidate review
function invalidateReview($reviewId) {
    global $connection;

    $query = "UPDATE reviews
            SET is_valid = 0
            WHERE review_id = $reviewId";

    $result = $connection->prepare($query);
    $result->execute();
}

// Delete review
function deleteReview($reviewId) {
    global $connection;

    $query = "DELETE FROM reviews WHERE review_id = $reviewId";

    $result = $connection->prepare($query);
    $result->execute();
}