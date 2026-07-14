<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/StatusDownload.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $statusdownload = new StatusDownload($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $success = 0;
  $fail = 0;

  if (!is_array($data)) {
      //delete data
      $statusdownload->kodesalesman = isset($data->kodesalesman) ? urldecode($data->kodesalesman) : null;
      $statusdownload->kodegudang = isset($data->kodegudang) ? urldecode($data->kodegudang) : null;
      $statusdownload->deletestatussalesman();

      //insert data
      $statusdownload->kodesalesman = isset($data->kodesalesman) ? urldecode($data->kodesalesman) : null;
      $statusdownload->kodegudang = isset($data->kodegudang) ? urldecode($data->kodegudang) : null;
      if ($statusdownload->createstatussalesman()) {
          $success++;
      } else {
          $fail++;
      }
      $response = [
          'status' => $fail === 0 ? 200 : 207,
          'inserted' => "$success",
          'failed' => "$fail",
          'message' => "Inserted: $success, Failed: $fail"
      ];
  } else {
    foreach ($data as $item) {
        //delete data
        $statusdownload->kodesalesman = isset($item->kodesalesman) ? urldecode($item->kodesalesman) : null;
        $statusdownload->kodegudang = isset($item->kodegudang) ? urldecode($item->kodegudang) : null;
        $statusdownload->deletestatussalesman();

        //insert data
        $statusdownload->kodesalesman = isset($item->kodesalesman) ? urldecode($item->kodesalesman) : null;
        $statusdownload->kodegudang = isset($item->kodegudang) ? urldecode($item->kodegudang) : null;
        if ($statusdownload->createstatussalesman()) {
            $success++;
        } else {
            $fail++;
        }
    }
    $response = [
        'status' => $fail === 0 ? 200 : 207,
        'inserted' => "$success",
        'failed' => "$fail",
        'message' => "Inserted: $success, Failed: $fail"
    ];    
  }
  echo json_encode($response);