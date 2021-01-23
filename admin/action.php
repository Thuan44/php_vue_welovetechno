<?php 

$connect = new PDO("mysql:host=localhost;dbname=welovetechno", "root", "root");

$received_data = json_decode(file_get_contents("php://input"));

$data = array();

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

?>