<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../core/Database.php';
include_once '../../models/District.php';
include_once '../../models/Company.php';
include_once '../../models/Store.php';
include_once '../../models/Product.php';


$pdo = new Database();

$district = new District($pdo->connect());
$company = new Company($pdo->connect());
$store = new Store($pdo->connect());
$product = new Product($pdo->connect());
$id = isset($_GET['id']) ? $_GET['id'] : die();

echo json_encode([
    'status' => true,
    'datas' => $district->getAll($id),
    'company'=>$company->countInDistrict(),
    'store'=>$store->countInDistrict(),
    'product'=>$product->countInDistrict(),
]);