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

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Set ID to update
$statusdownload->kodebarang = $data->kodebarang;
$statusdownload->kodegudang = $data->kodegudang;
  
// Delete post
if($statusdownload->updatestatusbarang()) {
    echo json_encode(
    array('status' => '200',
          'message' => 'Status Barang updated!')
    );
} else {
    echo json_encode(
    array('status' => '207',
          'message' => 'Update Salesman failed!')
    );
}