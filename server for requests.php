<?php
// Create database connection
$db = new SQLite3('service_records.db');

// Create table if not exists
$db->exec("CREATE TABLE IF NOT EXISTS service_records (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    customer_name TEXT NOT NULL,
    vehicle_info TEXT NOT NULL,
    service_performed TEXT NOT NULL,
    service_date TEXT NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// Insert data
$stmt = $db->prepare("INSERT INTO service_records (customer_name, vehicle_info, service_performed, service_date) 
                      VALUES (:name, :vehicle, :service, :date)");
$stmt->bindValue(':name', $_POST['customer_name']);
$stmt->bindValue(':vehicle', $_POST['vehicle_info']);
$stmt->bindValue(':service', $_POST['service_performed']);
$stmt->bindValue(':date', $_POST['service_date']);

if ($stmt->execute()) {
    echo "Record saved successfully";
} else {
    echo "Error saving record";
}
?>
