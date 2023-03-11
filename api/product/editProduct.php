<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once '../../core/Database.php';
include_once '../../models/Product.php';

$pdo = new Database();

$product = new Product($pdo->connect());

$rawPostBody = file_get_contents('php://input');
$signatures = json_decode($rawPostBody);
$id = $signatures->id ? $signatures->id : null;
$import = $signatures->import ? $signatures->import : null;
$export = $signatures->export ? $signatures->export : null;

$product->editProduct( $id, $import, $export );

echo json_encode([
    'status' => true,
    'datas' => $product->getAll()
]);

