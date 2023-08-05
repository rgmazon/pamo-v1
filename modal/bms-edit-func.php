<?php

include '../inc/image.php';
include '../inc/class.php';
session_start();
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:login.php');
}

if (isset($_POST['bmsedit'])) {
    $database = new Connection();
    $db = $database->open();

    try {
        $sp_id = $_GET['sp_id'];
        $eng_name = $_POST['eng_name'];
        $local_name = $_POST['local_name'];
        $sc_name = $_POST['sc_name'];
        $category = $_POST['category'];
        $searca_1997 = $_POST['searca_1997'];
        $villamor_2006 = $_POST['villamor_2006'];
        $mbcfi_2011 = $_POST['mbcfi_2011'];
        $photo_credit = $_POST['photo_credit'];
        $conservation_status = $_POST['conservation_status'];
        $residency_status = $_POST['residency_status'];

        $update = $conn->prepare("UPDATE `species` SET eng_name = ?, local_name = ?, sc_name = ?, category = ?,
                                                       searca_1997 = ?, villamor_2006 = ?, mbcfi_2011 = ?, 
                                                       photo_credit = ?, conservation_status = ?, residency_status = ? WHERE sp_id = ?");
        $update->execute([$eng_name, $local_name, $sc_name, $category, $searca_1997, $villamor_2006, $mbcfi_2011, $photo_credit, $conservation_status, $residency_status, $sp_id]);

        $old_image = $_POST['old_image'];
        $image = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_folder = '../image/species/' . $image;

        if (!empty($image)) {

            if ($image_size > 2000000) {
                $bms_message[] = 'Image Size Too Large';
            } else {

                $update_image = $conn->prepare("UPDATE `species` SET image = ? WHERE sp_id = ?");
                $update_image->execute([$image, $sp_id]);
                $bms_message[] = 'Changes Saved!';

                if ($update_image) {
                    move_uploaded_file($image_tmp_name, $image_folder);
                    unlink('image/species/' . $old_image);
                    $bms_message[] = 'Changes Saved!';
                }
            }
        }
    } catch (Exception $e) {
    }
    //close connection
    $database->close();
}
header('location: ../admin/adminbms.php');
