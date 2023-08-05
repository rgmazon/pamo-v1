<?php
session_start();
include_once('../inc/class.php');
$conn = mysqli_connect("localhost", "root", "", "pamo");

if (isset($_POST['saveviolation'])) {
    $database = new Connection();
    $db = $database->open();

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        try {
            //make use of prepared statement to prevent sql injection
            $stmt = $db->prepare("INSERT INTO violations (permit_id, vcat_id, date) VALUES (:permit_id, :vcat_id, :date)");
            //if-else statement in executing our prepared statement
            $_SESSION['message'] = ($stmt->execute(array(':permit_id' => $_POST['permit_id'], ':vcat_id' => $_POST['vcat_id'], ':date' => $_POST['date']))) ? 'Violation Record Added Successfully!' : 'Something Went Wrong. Cannot Add Violation Record';
        } catch (PDOException $e) {
            $_SESSION['message'] = $e->getMessage();
        }

        //close connection
        $database->close();
    } else {
        $_SESSION['message'] = 'Fill up add form first';
    }

    header('location: ../admin/adminvm.php');
}
