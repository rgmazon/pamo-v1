<?php
include '../inc/config.php';

try {
    // Create a PDO connection
    //$conn = new PDO($db_name, $username, $password);
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Your update query goes here
    $sql = "UPDATE permit SET id_status = '$id_status' WHERE permit_id = '$permit_id'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    echo "Record updated successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
