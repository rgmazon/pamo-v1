<?php
session_start();
include_once('../inc/class.php');
$conn = mysqli_connect("localhost", "root", "", "pamo");

if (isset($_POST['saveviolnm'])) {
    $database = new Connection();
    $db = $database->open();

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        try {
            //make use of prepared statement to prevent sql injection
            $stmt = $db->prepare("INSERT INTO violations2 (name, address, vcat_id, date, details) VALUES (:name, :address, :vcat_id, :date, :details)");
            //if-else statement in executing our prepared statement
            $_SESSION['message'] = ($stmt->execute(array(':name' => $_POST['name'], ':address' => $_POST['address'], ':vcat_id' => $_POST['vcat_id'], ':date' => $_POST['date'], ':details' => $_POST['details']))) ? 'Violation Record Added Successfully!' : 'Something Went Wrong. Cannot Add Violation Record';
        } catch (PDOException $e) {
            $_SESSION['message'] = $e->getMessage();
        }

        //close connection
        $database->close();
    } else {
        $_SESSION['message'] = 'Fill up add form first';
    }

    header('location: ../admin/adminvm2.php');
}
