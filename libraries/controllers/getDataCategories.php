<?php

// Product list
require_once(dirname(__DIR__) . '/models/Categories.php');

$model = new Categories();

$sql = $model->list('');

echo json_encode($sql->fetchAll());