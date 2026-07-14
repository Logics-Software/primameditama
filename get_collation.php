<?php
require_once 'upload/config/Database.php';

$database = new Database();
$db = $database->connect();

if (!$db) {
    echo "Database connection failed\n";
    exit(1);
}

function showCollation($db, $table) {
    echo "=== Table: $table ===\n";
    try {
        $stmt = $db->query("SHOW FULL COLUMNS FROM `$table` WHERE Field = 'kodebarang'");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            print_r($row);
        }
    } catch (Exception $e) {
        echo "Error showing columns for $table: " . $e->getMessage() . "\n";
    }
}

showCollation($db, 'filebarangstatus');
showCollation($db, 'filebarang');
