<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../core/Database.php';
include_once '../../models/Product.php';

$pdo = new Database();

$product = new Product($pdo->connect());

echo json_encode([
    'status' => true,
    'datas' => $product->getAll()
]);
