<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/LevelHargaBarang.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $levelhargabarang = new LevelHargaBarang($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $success = 0;
  $fail = 0;

  if (!is_array($data)) {
          $levelhargabarang->kodebarang = isset($data->kodebarang) ? urldecode($data->kodebarang) : null;
          $levelhargabarang->delete();

          //insert data
          $levelhargabarang->kodebarang = isset($data->kodebarang) ? urldecode($data->kodebarang) : null;
          $levelhargabarang->jumlah4 = isset($data->jumlah4) ? urldecode($data->jumlah4) : null;
          $levelhargabarang->harga4 = isset($data->harga4) ? urldecode($data->harga4) : null;
          $levelhargabarang->discount14 = isset($data->discount14) ? urldecode($data->discount14) : null;
          $levelhargabarang->discount24 = isset($data->discount24) ? urldecode($data->discount24) : null;
          $levelhargabarang->kondisi4 = isset($data->kondisi4) ? urldecode($data->kondisi4) : null;
          $levelhargabarang->jumlah5 = isset($data->jumlah5) ? urldecode($data->jumlah5) : null;
          $levelhargabarang->harga5 = isset($data->harga5) ? urldecode($data->harga5) : null;
          $levelhargabarang->discount15 = isset($data->discount15) ? urldecode($data->discount15) : null;
          $levelhargabarang->discount25 = isset($data->discount25) ? urldecode($data->discount25) : null;
          $levelhargabarang->kondisi5 = isset($data->kondisi5) ? urldecode($data->kondisi5) : null;
          if ($levelhargabarang->create()) {
              $success++;
          } else {
              $fail++;
          }
  } else {
      foreach ($data as $item) {
          //delete data
          $levelhargabarang->kodebarang = isset($item->kodebarang) ? urldecode($item->kodebarang) : null;
          $levelhargabarang->delete();
    
          //insert data
          $levelhargabarang->kodebarang = isset($item->kodebarang) ? urldecode($item->kodebarang) : null;
          $levelhargabarang->jumlah4 = isset($item->jumlah4) ? urldecode($item->jumlah4) : null;
          $levelhargabarang->harga4 = isset($item->harga4) ? urldecode($item->harga4) : null;
          $levelhargabarang->discount14 = isset($item->discount14) ? urldecode($item->discount14) : null;
          $levelhargabarang->discount24 = isset($item->discount24) ? urldecode($item->discount24) : null;
          $levelhargabarang->kondisi4 = isset($item->kondisi4) ? urldecode($item->kondisi4) : null;
          $levelhargabarang->jumlah5 = isset($item->jumlah5) ? urldecode($item->jumlah5) : null;
          $levelhargabarang->harga5 = isset($item->harga5) ? urldecode($item->harga5) : null;
          $levelhargabarang->discount15 = isset($item->discount15) ? urldecode($item->discount15) : null;
          $levelhargabarang->discount25 = isset($item->discount25) ? urldecode($item->discount25) : null;
          $levelhargabarang->kondisi5 = isset($item->kondisi5) ? urldecode($item->kondisi5) : null;
          if ($levelhargabarang->create()) {
              $success++;
          } else {
              $fail++;
          }
    }
  }
  $response = [
      'status' => $fail === 0 ? 200 : 207,
      'inserted' => "$success",
      'failed' => "$fail",
      'message' => "Inserted: $success, Failed: $fail"
  ];
  echo json_encode($response);