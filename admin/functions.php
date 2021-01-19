<?php
session_start();

?>

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

// List of brands (product to be updated)
function listBrandsByCategory($categoryId) {
    global $connection;

    $query = "SELECT * FROM products WHERE category_id = $categoryId";
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
}