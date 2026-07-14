<?php
  class StatusDownload {
    // DB Stuff
    private $conn;
    private $table1 = 'filebarangstatus';
    private $table2 = 'filecustomerstatus';
    private $table3 = 'filesalesmanstatus';
    private $table4 = 'tabelpabrikstatus';
    private $table5 = 'levelhargastatus';

    // Properties
    public $kodebarang;
    public $kodecustomer;
    public $kodesalesman;
    public $kodepabrik;
    public $kodegudang;
    public $status;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }
  
  //------------------------------------------------------------------------------
  // File Barang
  //------------------------------------------------------------------------------

  // Create Category
  public function createstatusbarang() {
    // Create Query
    $query = 'INSERT INTO ' .
      $this->table1  . ' SET
      kodebarang = :kodebarang, kodegudang = :kodegudang, status = 0';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data - hanya strip tags untuk keamanan, tanpa htmlspecialchars
  // htmlspecialchars tidak diperlukan karena data disimpan ke database, bukan untuk output HTML
  // PDO prepared statement sudah aman dari SQL injection
  $this->kodebarang = strip_tags($this->kodebarang);
  $this->kodegudang = strip_tags($this->kodegudang);

  // Bind data
  $stmt->bindParam(':kodebarang', $this->kodebarang);
  $stmt->bindParam(':kodegudang', $this->kodegudang);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: %stmt.\n", $stmt->error);

  return false;
  }

  // Delete Category
  public function deletestatusbarang() {
    // Create query
    $query = 'DELETE FROM ' . $this->table1  . ' WHERE kodebarang = :kodebarang AND kodegudang = :kodegudang';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->kodebarang = strip_tags($this->kodebarang);
    $this->kodegudang = strip_tags($this->kodegudang);
    
    // Bind data
    $stmt->bindParam(':kodebarang', $this->kodebarang);
    $stmt->bindParam(':kodegudang', $this->kodegudang);
    
    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %stmt.\n", $stmt->error);

    return false;
    }

  // Update Status Barang
  public function updatestatusbarang() {
    // Create query
    $query = 'UPDATE ' . $this->table1  . ' SET status = 1 WHERE kodebarang = :kodebarang AND kodegudang = :kodegudang';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->kodebarang = strip_tags($this->kodebarang);
    $this->kodegudang = strip_tags($this->kodegudang);
    
    // Bind data
    $stmt->bindParam(':kodebarang', $this->kodebarang);
    $stmt->bindParam(':kodegudang', $this->kodegudang);
    
    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %stmt.\n", $stmt->error);

    return false;
    }

  // Get Status Barang
  public function getstatusbarang() {
    $query = "SELECT c.* FROM " . $this->table1 . " t 
              INNER JOIN filebarang c ON t.kodebarang = c.kodebarang 
              WHERE t.status = 0 AND t.kodegudang = :kodegudang";

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->kodegudang  = strip_tags($this->kodegudang);
    
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
  //------------------------------------------------------------------------------

  //------------------------------------------------------------------------------
  // File Customer
  //------------------------------------------------------------------------------

  // Create Category
  public function createstatuscustomer() {
    // Create Query
    $query = 'INSERT INTO ' .
      $this->table2  . ' SET
      kodecustomer = :kodecustomer, kodegudang = :kodegudang, status = 0';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data - hanya strip tags untuk keamanan, tanpa htmlspecialchars
  // htmlspecialchars tidak diperlukan karena data disimpan ke database, bukan untuk output HTML
  // PDO prepared statement sudah aman dari SQL injection
  $this->kodecustomer = strip_tags($this->kodecustomer);
  $this->kodegudang = strip_tags($this->kodegudang);

  // Bind data
  $stmt->bindParam(':kodecustomer', $this->kodecustomer);
  $stmt->bindParam(':kodegudang', $this->kodegudang);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: %stmt.\n", $stmt->error);

  return false;
  }

  // Delete Category
  public function deletestatuscustomer() {
    // Create query
    $query = 'DELETE FROM ' . $this->table2  . ' WHERE kodecustomer = :kodecustomer AND kodegudang = :kodegudang';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->kodecustomer = strip_tags($this->kodecustomer);
    $this->kodegudang = strip_tags($this->kodegudang);
    
    // Bind data
    $stmt->bindParam(':kodecustomer', $this->kodecustomer);
    $stmt->bindParam(':kodegudang', $this->kodegudang);
    
    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %stmt.\n", $stmt->error);

    return false;
    }

  // Update Status Barang
  public function updatestatuscustomer() {
    // Create query
    $query = 'UPDATE ' . $this->table2  . ' SET status = 1 WHERE kodecustomer = :kodecustomer AND kodegudang = :kodegudang';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->kodecustomer = strip_tags($this->kodecustomer);
    $this->kodegudang = strip_tags($this->kodegudang);
    
    // Bind data
    $stmt->bindParam(':kodecustomer', $this->kodecustomer);
    $stmt->bindParam(':kodegudang', $this->kodegudang);
    
    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %stmt.\n", $stmt->error);

    return false;
    }

    // Get Status Barang
  public function getstatuscustomer() {
    $query = "SELECT c.* FROM " . $this->table2 . " t 
              INNER JOIN filecustomer c ON t.kodecustomer= c.kodecustomer 
              WHERE t.status = 0 AND t.kodegudang = :kodegudang";

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->kodegudang  = strip_tags($this->kodegudang);
    
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
            'message' => 'Customer not found.',
            'data' => null
        ];
    }

    return [
        'status' => 200,
        'message' => 'Get Customer Successfully.',
        'data' => $data
    ];
    }
    //------------------------------------------------------------------------------

  //------------------------------------------------------------------------------
  // File Salesman
  //------------------------------------------------------------------------------

  // Create Category
  public function createstatussalesman() {
    // Create Query
    $query = 'INSERT INTO ' .
      $this->table3  . ' SET
      kodesalesman = :kodesalesman, kodegudang = :kodegudang, status = 0';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data - hanya strip tags untuk keamanan, tanpa htmlspecialchars
  // htmlspecialchars tidak diperlukan karena data disimpan ke database, bukan untuk output HTML
  // PDO prepared statement sudah aman dari SQL injection
  $this->kodesalesman = strip_tags($this->kodesalesman);
  $this->kodegudang = strip_tags($this->kodegudang);

  // Bind data
  $stmt->bindParam(':kodesalesman', $this->kodesalesman);
  $stmt->bindParam(':kodegudang', $this->kodegudang);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: %stmt.\n", $stmt->error);

  return false;
  }

  // Delete Category
  public function deletestatussalesman() {
    // Create query
    $query = 'DELETE FROM ' . $this->table3  . ' WHERE kodesalesman = :kodesalesman AND kodegudang = :kodegudang';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->kodesalesman = strip_tags($this->kodesalesman);
    $this->kodegudang = strip_tags($this->kodegudang);
    
    // Bind data
    $stmt->bindParam(':kodesalesman', $this->kodesalesman);
    $stmt->bindParam(':kodegudang', $this->kodegudang);
    
    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %stmt.\n", $stmt->error);

    return false;
    }

  // Update Status Barang
  public function updatestatussalesman() {
    // Create query
    $query = 'UPDATE ' . $this->table3  . ' SET status = 1 WHERE kodesalesman = :kodesalesman AND kodegudang = :kodegudang';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->kodesalesman = strip_tags($this->kodesalesman);
    $this->kodegudang = strip_tags($this->kodegudang);
    
    // Bind data
    $stmt->bindParam(':kodesalesman', $this->kodesalesman);
    $stmt->bindParam(':kodegudang', $this->kodegudang);
    
    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %stmt.\n", $stmt->error);

    return false;
    }

      // Update Status Barang
  public function getstatussalesman() {
    $query = "SELECT c.* FROM " . $this->table3 . " t 
          INNER JOIN filesalesman c ON t.kodesalesman= c.kodesalesman 
          WHERE t.status = 0 AND t.kodegudang = :kodegudang";

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->kodegudang  = strip_tags($this->kodegudang);
    
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
            'message' => 'Salesman not found.',
            'data' => null
        ];
    }

    return [
        'status' => 200,
        'message' => 'Get Salesman Successfully.',
        'data' => $data
    ];
    }  
  //------------------------------------------------------------------------------

  //------------------------------------------------------------------------------
  // Tabel Pabrik
  //------------------------------------------------------------------------------

  // Create Category
  public function createstatuspabrik() {
    // Create Query
    $query = 'INSERT INTO ' .
      $this->table4  . ' SET
      kodepabrik = :kodepabrik, kodegudang = :kodegudang, status = 0';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data - hanya strip tags untuk keamanan, tanpa htmlspecialchars
  // htmlspecialchars tidak diperlukan karena data disimpan ke database, bukan untuk output HTML
  // PDO prepared statement sudah aman dari SQL injection
  $this->kodepabrik = strip_tags($this->kodepabrik);
  $this->kodegudang = strip_tags($this->kodegudang);

  // Bind data
  $stmt->bindParam(':kodepabrik', $this->kodepabrik);
  $stmt->bindParam(':kodegudang', $this->kodegudang);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: %stmt.\n", $stmt->error);

  return false;
  }

  // Delete Category
  public function deletestatuspabrik() {
    // Create query
    $query = 'DELETE FROM ' . $this->table4  . ' WHERE kodepabrik = :kodepabrik AND kodegudang = :kodegudang';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->kodepabrik = strip_tags($this->kodepabrik);
    $this->kodegudang = strip_tags($this->kodegudang);
    
    // Bind data
    $stmt->bindParam(':kodepabrik', $this->kodepabrik);
    $stmt->bindParam(':kodegudang', $this->kodegudang);
    
    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %stmt.\n", $stmt->error);

    return false;
    }

  // Update Status Barang
  public function updatestatuspabrik() {
    // Create query
    $query = 'UPDATE ' . $this->table4  . ' SET status = 1 WHERE kodepabrik = :kodepabrik AND kodegudang = :kodegudang';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->kodepabrik = strip_tags($this->kodepabrik);
    $this->kodegudang = strip_tags($this->kodegudang);
    
    // Bind data
    $stmt->bindParam(':kodepabrik', $this->kodepabrik);
    $stmt->bindParam(':kodegudang', $this->kodegudang);
    
    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %stmt.\n", $stmt->error);

    return false;
    }
    
        // Update Status Barang
  public function getstatuspabrik() {
    $query = "SELECT c.* FROM " . $this->table4 . " t 
        INNER JOIN tabelpabrik c ON t.kodepabrik= c.kodepabrik 
        WHERE t.status = 0 AND t.kodegudang = :kodegudang";

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->kodegudang  = strip_tags($this->kodegudang);
    
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
            'message' => 'Pabrik not found.',
            'data' => null
        ];
    }

    return [
        'status' => 200,
        'message' => 'Get Pabrik Successfully.',
        'data' => $data
    ];
    }
  //------------------------------------------------------------------------------  

  //------------------------------------------------------------------------------
  // Level Harga Barang
  //------------------------------------------------------------------------------

  // Create Category
  public function createstatusharga() {
    // Create Query
    $query = 'INSERT INTO ' .
      $this->table5  . ' SET
      kodebarang = :kodebarang, kodegudang = :kodegudang, status = 0';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data - hanya strip tags untuk keamanan, tanpa htmlspecialchars
  // htmlspecialchars tidak diperlukan karena data disimpan ke database, bukan untuk output HTML
  // PDO prepared statement sudah aman dari SQL injection
  $this->kodebarang = strip_tags($this->kodebarang);
  $this->kodegudang = strip_tags($this->kodegudang);

  // Bind data
  $stmt->bindParam(':kodebarang', $this->kodebarang);
  $stmt->bindParam(':kodegudang', $this->kodegudang);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: %stmt.\n", $stmt->error);

  return false;
  }

  // Delete Category
  public function deletestatusharga() {
    // Create query
    $query = 'DELETE FROM ' . $this->table5  . ' WHERE kodebarang = :kodebarang AND kodegudang = :kodegudang';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->kodebarang = strip_tags($this->kodebarang);
    $this->kodegudang = strip_tags($this->kodegudang);
    
    // Bind data
    $stmt->bindParam(':kodebarang', $this->kodebarang);
    $stmt->bindParam(':kodegudang', $this->kodegudang);
    
    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %stmt.\n", $stmt->error);

    return false;
    }

  // Update Status Barang
  public function updatestatusharga() {
    // Create query
    $query = 'UPDATE ' . $this->table5  . ' SET status = 1 WHERE kodebarang = :kodebarang AND kodegudang = :kodegudang';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->kodebarang = strip_tags($this->kodebarang);
    $this->kodegudang = strip_tags($this->kodegudang);
    
    // Bind data
    $stmt->bindParam(':kodebarang', $this->kodebarang);
    $stmt->bindParam(':kodegudang', $this->kodegudang);
    
    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %stmt.\n", $stmt->error);

    return false;
    }

  // Get Status Barang
  public function getstatusharga() {
    $query = "SELECT c.* FROM " . $this->table5 . " t 
              INNER JOIN levelhargabarang c ON t.kodebarang = c.kodebarang 
              WHERE t.status = 0 AND t.kodegudang = :kodegudang";

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->kodegudang  = strip_tags($this->kodegudang);
    
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
    //------------------------------------------------------------------------------
}
