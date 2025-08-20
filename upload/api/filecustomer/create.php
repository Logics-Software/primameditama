<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/FileCustomer.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $filecustomer = new FileCustomer($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $filecustomer->kodecustomer = $data->kodecustomer;
  $filecustomer->kodebadanusaha = $data->kodebadanusaha;
  $filecustomer->namabadanusaha = $data->namabadanusaha;
  $filecustomer->namacustomer = $data->namacustomer;
  $filecustomer->alamatcustomer = $data->alamatcustomer;
  $filecustomer->kota = $data->kota;
  $filecustomer->notelepon = $data->notelepon;
  $filecustomer->nofaximili = $data->nofaximili;
  $filecustomer->kontakperson = $data->kontakperson;
  $filecustomer->namawp = $data->namawp;
  $filecustomer->alamatwp = $data->alamatwp;
  $filecustomer->npwp = $data->npwp;
  $filecustomer->tipecustomer = $data->tipecustomer;
  $filecustomer->jenisproteksi = $data->jenisproteksi;
  $filecustomer->plafonkredit = $data->plafonkredit;
  $filecustomer->jumlahfaktur = $data->jumlahfaktur;
  $filecustomer->kodesalesman = $data->kodesalesman;
  $filecustomer->kodepengirim = $data->kodepengirim;
  $filecustomer->kodetermin = $data->kodetermin;
  $filecustomer->kodearea = $data->kodearea;
  $filecustomer->kodeformulir = $data->kodeformulir;
  $filecustomer->kodebank = $data->kodebank;
  $filecustomer->userid = $data->userid;
  $filecustomer->status = $data->status;
  $filecustomer->cabang = $data->cabang;

  // Create Message
  if($filecustomer->create()) {
    $response=array(
      'status' => 200,
      'message' =>'Data Customer Created!'
    );
  } else {
    $response=array(
      'status' => 400,
      'message' =>'Data Customer Not Created!'
    );
  }
  header('Content-Type: application/json');
  echo json_encode($response);