<?php
session_start();
include_once('../inc/class.php');

if (isset($_POST['edit'])) {
    $database = new Connection();
    $db = $database->open();
    try {
        $v_id = $_GET['v_id'];
        $payment_date = $_POST['payment_date'];
        $payment_amt = $_POST['payment_amt'];
        $receipt_num = $_POST['receipt_num'];
        $recieved_from = $_POST['recieved_from'];
        $viol_status = 'Settled';

        $sql = "UPDATE violations SET payment_date = '$payment_date', 
                                       payment_amt = '$payment_amt', 
                                       receipt_num = '$receipt_num', 
                                       recieved_from = '$recieved_from',
                                       viol_status = '$viol_status' 
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

header('location: ../admin/adminvm.php');
