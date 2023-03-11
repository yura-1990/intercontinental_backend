<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../core/Database.php';
include_once '../../models/Company.php';

$pdo = new Database();
$company = new Company($pdo->connect());
$id = isset($_GET['id']) ? $_GET['id'] : die();

echo json_encode([
    'status' => true,
    'datas' => $company->getRelation($id),
    'count'=> count($company->getRelation($id)),
]);
