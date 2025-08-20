<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/StokBarang.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $stokbarang = new StokBarang($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $stokbarang->kodegudang = $data->kodegudang;
  $stokbarang->kodebarang = $data->kodebarang;
  $stokbarang->nopembelian = $data->nopembelian;
  $stokbarang->nomorbatch = $data->nomorbatch;
  $stokbarang->tanggalperolehan = $data->tanggalperolehan;
  $stokbarang->expireddate = $data->expireddate;
  $stokbarang->hpp = $data->hpp;
  $stokbarang->stokakhir = $data->stokakhir;
  $stokbarang->status = $data->status;
 
  // Create Message
  if($stokbarang->create()) {
    $response=array(
      'status' => 200,
      'message' =>'Data Stok Barang Created!'
    );
  } else {
    $response=array(
      'status' => 400,
      'message' =>'Data Stok Barang Not Created!'
    );
  }
  header('Content-Type: application/json');
  echo json_encode($response);