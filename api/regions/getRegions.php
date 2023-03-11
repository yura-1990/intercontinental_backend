<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../core/Database.php';
include_once '../../models/Region.php';
include_once '../../models/District.php';
include_once '../../models/Company.php';
include_once '../../models/Store.php';
include_once '../../models/Product.php';

$pdo = new Database();

$region = new Region($pdo->connect());
$district = new District($pdo->connect());
$company = new Company($pdo->connect());
$store = new Store($pdo->connect());
$product = new Product($pdo->connect());

echo json_encode([
    'datas' => $region->getAll(),
    'district'=>$district->countInRegion(),
    'company'=>$company->countInRegion(),
    'store'=>$store->countInRegion(),
    'product'=>$product->countInRegion()
]);