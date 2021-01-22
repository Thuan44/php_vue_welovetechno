<?php

// Product list
require_once(dirname(__DIR__) . '/models/Cart.php');

$model = new Cart();

$sql = $model->list('');

echo json_encode($sql->fetchAll());