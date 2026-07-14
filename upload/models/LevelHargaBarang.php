<?php
  class LevelHargaBarang {
    // DB Stuff
    private $conn;
    private $table = 'levelhargabarang';

    // Properties
    public $kodegudang;
    public $kodebarang;
    public $jumlah4;
    public $harga4;
    public $discount14;
    public $discount24;
    public $kondisi4;
    public $jumlah5;
    public $harga5;
    public $discount15;
    public $discount25;
    public $kondisi5;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

  // Create Category
  public function create() {
    // Create Query
    $query = 'INSERT INTO  ' . $this->table . ' SET
      kodebarang = :kodebarang,
      jumlah4 = :jumlah4, harga4 = :harga4, discount14 = :discount14, discount24 = :discount24, kondisi4 = :kondisi4,
      jumlah5 = :jumlah5, harga5 = :harga5, discount15 = :discount15, discount25 = :discount25, kondisi5 = :kondisi5';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data - hanya strip tags untuk keamanan, tanpa htmlspecialchars
  // htmlspecialchars tidak diperlukan karena data disimpan ke database, bukan untuk output HTML
  // PDO prepared statement sudah aman dari SQL injection
  $this->kodebarang = strip_tags($this->kodebarang ?? '');
  $this->jumlah4 = strip_tags($this->jumlah4 ?? '');
  $this->harga4 = strip_tags($this->harga4 ?? '');
  $this->discount14 = strip_tags($this->discount14 ?? '');
  $this->discount24 = strip_tags($this->discount24 ?? '');
  $this->kondisi4 = strip_tags($this->kondisi4 ?? '');
  $this->jumlah5 = strip_tags($this->jumlah5 ?? '');
  $this->harga5 = strip_tags($this->harga5 ?? '');
  $this->discount15 = strip_tags($this->discount15 ?? '');
  $this->discount25 = strip_tags($this->discount25 ?? '');
  $this->kondisi5 = strip_tags($this->kondisi5 ?? '');

  // Bind data
  $stmt->bindParam(':kodebarang', $this->kodebarang);
  $stmt->bindParam(':jumlah4', $this->jumlah4);
  $stmt->bindParam(':harga4', $this->harga4);
  $stmt->bindParam(':discount14', $this->discount14);
  $stmt->bindParam(':discount24', $this->discount24);
  $stmt->bindParam(':kondisi4', $this->kondisi4);
  $stmt->bindParam(':jumlah5', $this->jumlah5);
  $stmt->bindParam(':harga5', $this->harga5);
  $stmt->bindParam(':discount15', $this->discount15);
  $stmt->bindParam(':discount25', $this->discount25);
  $stmt->bindParam(':kondisi5', $this->kondisi5);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: %stmt.\n", $stmt->error);

  return false;
  }
  
  public function update() {
    // Create Query
    $query = 'UPDATE  ' . $this->table . ' SET
      jumlah4 = :jumlah4, harga4 = :harga4, discount14 = :discount14, discount24 = :discount24, kondisi4 = :kondisi4,
      jumlah5 = :jumlah5, harga5 = :harga5, discount15 = :discount15, discount25 = :discount25, kondisi5 = :kondisi5
      WHERE kodebarang = :kodebarang';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data - hanya strip tags untuk keamanan, tanpa htmlspecialchars
  // htmlspecialchars tidak diperlukan karena data disimpan ke database, bukan untuk output HTML
  // PDO prepared statement sudah aman dari SQL injection
  $this->kodebarang = strip_tags($this->kodebarang ?? '');
  $this->jumlah4 = strip_tags($this->jumlah4 ?? '');
  $this->harga4 = strip_tags($this->harga4 ?? '');
  $this->discount14 = strip_tags($this->discount14 ?? '');
  $this->discount24 = strip_tags($this->discount24 ?? '');
  $this->kondisi4 = strip_tags($this->kondisi4 ?? '');
  $this->jumlah5 = strip_tags($this->jumlah5 ?? '');
  $this->harga5 = strip_tags($this->harga5 ?? '');
  $this->discount15 = strip_tags($this->discount15 ?? '');
  $this->discount25 = strip_tags($this->discount25 ?? '');
  $this->kondisi5 = strip_tags($this->kondisi5 ?? '');

  // Bind data
  $stmt->bindParam(':kodebarang', $this->kodebarang);
  $stmt->bindParam(':jumlah4', $this->jumlah4);
  $stmt->bindParam(':harga4', $this->harga4);
  $stmt->bindParam(':discount14', $this->discount14);
  $stmt->bindParam(':discount24', $this->discount24);
  $stmt->bindParam(':kondisi4', $this->kondisi4);
  $stmt->bindParam(':jumlah5', $this->jumlah5);
  $stmt->bindParam(':harga5', $this->harga5);
  $stmt->bindParam(':discount15', $this->discount15);
  $stmt->bindParam(':discount25', $this->discount25);
  $stmt->bindParam(':kondisi5', $this->kondisi5);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: %stmt.\n", $stmt->error);

  return false;
  }

  // Delete Category
  public function delete() {
    // Create query
    $query = 'DELETE FROM ' . $this->table  . ' WHERE kodebarang = :kodebarang';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->kodebarang = strip_tags($this->kodebarang);
    
    // Bind data
    $stmt->bindParam(':kodebarang', $this->kodebarang);
    
    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %stmt.\n", $stmt->error);

    return false;
  }

    // Update Status Barang
  public function getlevelbarang() {
    $query = "SELECT c.* FROM " . $this->table . " t 
              INNER JOIN statusbarang c ON t.kodebarang= c.kodebarang 
              WHERE c.kodegudang = :kodegudang";

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    //$this->kodegudang  = strip_tags($this->kodegudang);
    
    // Bind data
    $stmt->bindParam(':kodegudang', $this->kodegudang);

    $stmt->execute();
    
    $data = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }

    if (empty($data)) {
        return [
            'status' => 404,
            'message' => 'Barang not found.',
            'data' => null
        ];
    }

    return [
        'status' => 200,
        'message' => 'Get Barang Successfully.',
        'data' => $data
    ];
    }

  // Update Status Barang
  public function updatestatusharga() {
    // Create query
    $query = 'UPDATE ' . $this->table  . ' SET status = 1 WHERE kodebarang = :kodebarang';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->kodebarang = strip_tags($this->kodebarang);
    
    // Bind data
    $stmt->bindParam(':kodebarang', $this->kodebarang);
    
    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %stmt.\n", $stmt->error);

    return false;
  }
  //------------------------------------------------------------------------------
}