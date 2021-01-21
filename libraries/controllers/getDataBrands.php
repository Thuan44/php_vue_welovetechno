<?php

// Product list
require_once(dirname(__DIR__) . '/models/Brands.php');

$model = new Brands();

$sql = $model->list('');

echo json_encode($sql->fetchAll());