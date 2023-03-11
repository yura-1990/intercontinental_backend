<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../core/Database.php';
include_once '../../models/District.php';

$pdo = new Database();

$district = new District($pdo->connect());
$id = isset($_GET['id']) ? $_GET['id'] : die();

echo json_encode([
    'status' => true,
    'datas' => $district->showDistrict($id)
]);

