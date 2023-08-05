<?php
session_start();
include_once('../inc/class.php');
$conn = mysqli_connect("localhost", "root", "", "pamo");

if (isset($_POST['approve'])) {
    $database = new Connection();
    $db = $database->open();

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        // Get the value of permit_num1, permit_num2 and permit_num3
        $value1 = $_POST['permit_num1'];
        $value2 = $_POST['permit_num2'];
        $value3 = $_POST['permit_num3'];

        // Check if the value already exists in the table
        $query = "SELECT * FROM permit WHERE permit_num1 = '$value1' and permit_num2 = '$value2' and permit_num3 = '$value3'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // If the value already exists, display an error message
            $_SESSION['message'] = 'Permit Number Unavailable';
        } else {

            try {


                $id = $_GET['permit_id'];
                $permit_status = $_POST['permit_status'];
                $permit_num1 = $_POST['permit_num1'];
                $permit_num2 = $_POST['permit_num2'];
                $permit_num3 = $_POST['permit_num3'];
                $permit_num = $_POST['permit_num1'] . '-' . $_POST['permit_num2'] . '-' . $_POST['permit_num3'];
                $curregissuance = $_POST['curregissuance'];
                $curregissuance = $_POST['coastguardregnum'];
                $approved_date = date('Y-m-d');
                $curregdate = date('Y-m-d');
                $curregexp = date('Y-m-d', strtotime('+1 year'));
                $id_status = 'Released';


                $sql = "UPDATE permit SET permit_status = '$permit_status', 
                                          permit_num1 = '$permit_num1', 
                                          permit_num2 = '$permit_num2', 
                                          permit_num3 = '$permit_num3', 
                                          permit_num = '$permit_num', 
                                          curregissuance = '$curregissuance', 
                                          coastguardregnum = '$coastguardregnum', 
                                          approved_date = '$approved_date', 
                                          curregdate = '$curregdate', 
                                          id_status = '$id_status', 
                                          curregexp = '$curregexp' WHERE permit_id = '$id'";
                //if-else statement in executing our query
                $_SESSION['message'] = ($db->exec($sql)) ? 'Record Updated Successfully' : 'Something Went Wrong. Cannot Update Record';
            } catch (PDOException $e) {
                $_SESSION['message'] = $e->getMessage();
            }
        }

        //close connection
        $database->close();
    } else {
        $_SESSION['message'] = 'Fill up edit form first';
    }



    header('location: ../admin/adminpm.php');
}
