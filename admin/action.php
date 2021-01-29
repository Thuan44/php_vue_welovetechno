<?php 
session_start();

$connect = new PDO("mysql:host=localhost;dbname=welovetechno", "root", "root");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();

@$userId = $_SESSION['user_id'];

# CHECK IF USER IS LOGGED IN ======================
if($received_data->action == 'checkuser')
{
    global $userId;

    $query = "SELECT * FROM users WHERE user_id = $userId";
    $result = $connect->prepare($query);
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    echo json_encode($data);
}



# FETCH TABLES ====================================
// Get all products joined with categories, brands and images
if($received_data->action == 'fetchallproducts')
{
    $query = "SELECT * FROM products
            INNER JOIN categories ON products.category_id = categories.category_id
            INNER JOIN brands ON products.brand_id = brands.brand_id
            INNER JOIN images ON products.product_id = images.product_id
            ORDER BY product_name ASC";
    $result = $connect->prepare($query);
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    echo json_encode($data);
}

// Get all categories
if($received_data->action == 'fetchallcategories')
{
    $query = "SELECT * FROM categories";
    $result = $connect->prepare($query);
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    echo json_encode($data);
}

// Get all brands
if($received_data->action == 'fetchallbrands')
{
    $query = "SELECT * FROM brands";
    $result = $connect->prepare($query);
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    echo json_encode($data);
}



# PRODUCT SHEET ==============================
// Display product with no image
if($received_data->action == 'fetchselectedproduct')
{

    $data = (object) '';
    $productId = $received_data->productId;

    $query = "SELECT * FROM products
            INNER JOIN brands ON products.brand_id = brands.brand_id
            -- INNER JOIN images ON products.product_id = images.product_id
            WHERE product_id = $productId";
    $result = $connect->prepare($query);
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data = $row;
    }
    echo json_encode($data);
}

// Display img
if($received_data->action == 'fetchrelatedimg')
{
    $query = "SELECT * FROM images WHERE product_id = ?";
    $result = $connect->prepare($query);
    $result->execute([$received_data->productId]);
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data = $row;
    }
    echo json_encode($data);
}



# REVIEWS ====================================
if($received_data->action == 'addreview')
{
    global $userId;

    $query = "INSERT INTO reviews (product_id, user_id, review_content) VALUES (?, $userId, ?)";
    $result = $connect->prepare($query);
    $result->execute([$received_data->productId, $received_data->reviewContent]);

    $output = array(
        'message' => 'Review posted !'
    );

    echo json_encode($output);
}

// Get reviews by product id
if($received_data->action == 'fetchallreviews')
{
    $query = "SELECT * FROM reviews
            INNER JOIN users ON reviews.user_id = users.user_id
            WHERE product_id = ? AND is_valid = 1";
    $result = $connect->prepare($query);
    $result->execute([$received_data->productId]);
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    echo json_encode($data);
}



# ADD TO CART FROM PRODUCT SHEET ====================================
// Select cart id
if($received_data->action == 'selectcartid')
{
    global $userId;

    $query = "SELECT * FROM cart WHERE product_id = ? AND user_id = $userId";
    $result = $connect->prepare($query);
    $result->execute([$received_data->productId]);
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    echo json_encode($data);
}

// Add single product
if($received_data->action == 'addsingleproducttocart')
{
    global $userId;

    $query = "INSERT INTO cart (product_id, user_id, product_quantity) VALUES (?, $userId, 1)";
    $result = $connect->prepare($query);
    $result->execute([$received_data->productId]);
}

// Increment quantity of product
if($received_data->action == 'incrementproductquantity')
{
    global $userId;

    $query = "UPDATE cart
            SET product_quantity = product_quantity + 1
            WHERE product_id = ? AND user_id = $userId";
    $result = $connect->prepare($query);
    $result->execute([$received_data->productId]);

    $output = array(
        'message' => 'Quantity updated !'
    );

    echo json_encode($output);
}




# CART =================================
// Display all products in cart
if($received_data->action == 'fetchallproductsincart')
{
    global $userId;

    $query = "SELECT * FROM cart
            INNER JOIN products ON cart.product_id = products.product_id
            INNER JOIN images ON cart.product_id = images.product_id
            WHERE cart.user_id = $userId";
    $result = $connect->prepare($query);
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    echo json_encode($data);
}

// Change quantity
if($received_data->action == 'updatequantity')
{
    $query = "UPDATE cart
            SET product_quantity = ?
            WHERE cart_id = ?";
    $result = $connect->prepare($query);
    $result->execute([$received_data->productQuantity, $received_data->cartId]);
}

// Delete product from cart
if($received_data->action == 'deleteproduct')
{
    $query = "DELETE FROM cart WHERE cart_id = ?";
    $result = $connect->prepare($query);
    $result->execute([$received_data->cartId]);
}

?>


