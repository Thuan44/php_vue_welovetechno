<?php

require_once (dirname(__DIR__) . '/config/database.php');

class Cart
{
  protected $pdo;

  public function __construct()
  {
    $this->pdo = getPdo();
  }
  
  public function list()
  {
    $sql = $this->pdo->query("
      INSERT INTO cart (product_id)
      VALUES (?, ?, ?)
    ");
    $sql->setFetchMode(\PDO::FETCH_ASSOC);

    return $sql;
  }
}