<?php 
session_start();

$connect = new PDO("mysql:host=localhost;dbname=welovetechno", "root", "root");
$received_data = json_decode(file_get_contents("php://input"));
$data = array();

@$userId = $_SESSION['user_id'];

# FETCH TABLES ====================================
// Get all products joined with brands and images
if($received_data->action == 'fetchallproducts')
{
    $query = "SELECT * FROM products
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



# REVIEWS ====================================
if($received_data->action == 'addreview')
{
    global $userId;

    $data = array(
        ':productId' => $received_data->productId,
        ':reviewContent' => $received_data->reviewContent
    );

    $query = "INSERT INTO reviews (product_id, user_id, review_content) VALUES (:productId, $userId, :reviewContent)";
    $result = $connect->prepare($query);
    $result->execute($data);

    $output = array(
        'message' => 'Review posted !'
    );

    echo json_encode($output);
}

// Get reviews by product id
if($received_data->action == 'fetchallreviews')
{
    $productId = $received_data->productId;

    $query = "SELECT * FROM reviews
            INNER JOIN users ON reviews.user_id = users.user_id
            WHERE product_id = $productId AND is_valid = 1";
    $result = $connect->prepare($query);
    $result->execute();
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }
    echo json_encode($data);
}


# ADD TO CART ====================================
// Add single product
if($received_data->action == 'addsingleproducttocart')
{
    global $userId;

    $data = array(
        ':productId' => $received_data->productId
    );

    $query = "INSERT INTO cart (product_id, user_id, product_quantity) 
            VALUES (:productId, $userId, 1)";
    $result = $connect->prepare($query);
    $result->execute($data);

    $output = array(
        'message' => 'Product added to your cart !'
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
    $data = array(
        ':productQuantity' => $received_data->productQuantity,
        ':cartId' => $received_data->cartId
    );

    $query = "UPDATE cart
            SET product_quantity = :productQuantity
            WHERE cart_id = :cartId";
    $result = $connect->prepare($query);
    $result->execute($data);
}

// Delete product from cart
if($received_data->action == 'deleteproduct')
{
    $data = array(
        ':cartId' => $received_data->cartId
    );

    $query = "DELETE FROM cart WHERE cart_id = :cartId";
    $result = $connect->prepare($query);
    $result->execute($data);
}

?>


