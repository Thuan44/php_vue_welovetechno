<?php

require_once(dirname(__DIR__) . '/models/Products.php');

$model = new Products();

$sql = $model->list('');

echo json_encode($sql->fetchAll());