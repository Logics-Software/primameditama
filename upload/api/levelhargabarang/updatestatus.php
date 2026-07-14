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

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Set ID to update
$levelhargabarang->kodebarang = $data->kodebarang;
  
// Update Status
if($levelhargabarang->updatestatusharga()) {
    echo json_encode(
    array('status' => '200',
          'message' => 'Status Level Harga Barang updated!')
    );
} else {
    echo json_encode(
    array('status' => '207',
          'message' => 'Update Status Level Harga Barang failed!')
    );
}