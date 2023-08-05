<?php
session_start();
include_once('../inc/class.php');
$conn = mysqli_connect("localhost", "root", "", "pamo");

if (isset($_POST['addviol'])) {
    $database = new Connection();
    $db = $database->open();

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        try {
            //make use of prepared statement to prevent sql injection
            $stmt = $db->prepare("INSERT INTO violations (permit_num, vcat_id, date, details) VALUES (:permit_num, :vcat_id, :date, :details)");
            //if-else statement in executing our prepared statement
            $_SESSION['message'] = ($stmt->execute(array(
                ':permit_num' => $_POST['permit_num'],
                ':vcat_id' => $_POST['vcat_id'],
                ':date' => $_POST['date'],
                ':details' => $_POST['details']
            )))
                ? 'Violation Record Added Successfully!'
                : 'Something Went Wrong. Cannot Add Violation Record';
        } catch (PDOException $e) {
            $_SESSION['message'] = $e->getMessage();
        }

        //close connection
        $database->close();
    } else {
        $_SESSION['message'] = 'Fill up add form first';
    }

    header('location: ../admin/adminaddviol.php');
}
