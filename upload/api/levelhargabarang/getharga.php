<?php

include_once '../../config/Database.php';
include_once '../../models/LevelHargaBarang.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate LevelHargaBarang object
$levelhargabarang = new LevelHargaBarang($db);

// Get Level Harga Barnag(s)
$response = $levelhargabarang->getlevelbarang();

// Output JSON response
echo json_encode($response);