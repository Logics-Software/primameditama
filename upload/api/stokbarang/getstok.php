<?php

include_once '../../config/Database.php';
include_once '../../models/StokBarang.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate FileCustomer object
$stokbarang = new StokBarang($db);

// Get kodebarang from query string if present
$stokbarang = isset($_GET['kodegudang']) ? $_GET['kodegudang'] : null;

// Get customer(s)
$response = $filebarang->getstok($kodegudang);

// Output JSON response
echo json_encode($response);