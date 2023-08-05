<?php
session_start();
include_once('../inc/class.php');

if (isset($_POST['edit'])) {
    $database = new Connection();
    $db = $database->open();
    try {
        $v_id = $_GET['v_id'];
        $payment_date = $_POST['payment_date'];
        $receipt_num = $_POST['receipt_num'];
        $recieved_from = $_POST['recieved_from'];
        $details = $_POST['details'];
        $viol_status = 'Settled';

        //$violation_status = "Settled";

        $sql = "UPDATE violations2 SET payment_date = '$payment_date',
                                       receipt_num = '$receipt_num', 
                                       recieved_from = '$recieved_from',
                                       viol_status = '$viol_status', 
                                       details = '$details' 
                                       WHERE v_id = '$v_id'";

        $_SESSION['message'] = ($db->exec($sql)) ? 'Record Update Successfully' : 'Something Went Wrong. Cannot Update Record';
    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }

    //close connection
    $database->close();
} else {
    $_SESSION['message'] = 'Fill up edit form first';
}

header('location: ../admin/adminvm2.php');
