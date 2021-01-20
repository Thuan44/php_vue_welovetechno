<?php

require_once (dirname(__DIR__) . '/config/database.php');

class Products
{
  protected $pdo;

  public function __construct()
  {
    $this->pdo = getPdo();
  }
  
  public function list()
  {
    $sql = $this->pdo->query("
      SELECT * 
      FROM products
      INNER JOIN brands ON products.brand_id = brands.brand_id
      INNER JOIN images ON products.product_id = images.product_id
    ");
    $sql->setFetchMode(\PDO::FETCH_ASSOC);

    return $sql;
  }
}