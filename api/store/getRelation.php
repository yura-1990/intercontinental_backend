<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../core/Database.php';
include_once '../../models/Store.php';

$pdo = new Database();
$store = new District($pdo->connect());
$id = isset($_GET['id']) ? $_GET['id'] : die();

echo json_encode([
    'status' => true,
    'datas' => $store->getRelation($id),
    'count'=> count($store->getRelation($id)),
]);
