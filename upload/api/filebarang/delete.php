<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/FileBarang.php';
  
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $filebarang = new FileBarang($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $filebarang->kodebarang = $data->kodebarang;
  
  // Delete post
  if($filebarang->delete()) {
    echo json_encode(
      array('message' => 'Master Barang deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Master Barang not deleted')
    );
  }
