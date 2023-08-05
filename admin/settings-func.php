<?php
include '../inc/config.php';

if (isset($_POST['save'])) {
    $carousel1 = $_FILES['carousel1']['tmp_name'];


    $imageData = file_get_contents($carousel1);

    $sql = "UPDATE settings SET carousel1 = :carousel1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':carousel1', $imageData, PDO::PARAM_LOB);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Image updated successfully.";
    } else {
        echo "Image update failed.";
    }
}
