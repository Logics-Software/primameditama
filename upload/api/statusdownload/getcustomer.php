<?php

include_once '../../config/Database.php';
include_once '../../models/StatusDownload.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate FileCustomer object
$statusdownload = new StatusDownload($db);

$statusdownload->kodegudang = isset($_GET['kodegudang']) ? urldecode($_GET['kodegudang']) : null;

// Get customer(s)
$response = $statusdownload->getstatuscustomer();

// Output JSON response
echo json_encode($response);