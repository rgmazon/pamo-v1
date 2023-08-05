<?php
session_start();
include_once('inc/class.php');
$conn = mysqli_connect("localhost", "root", "", "pamo");

if (isset($_POST['respond'])) {
    $database = new Connection();
    $db = $database->open();
    $sp_id = $_POST['sp_id'];

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        try {
            //make use of prepared statement to prevent sql injection
            $stmt = $db->prepare("INSERT INTO survey (sp_id, respondent, date, qty, place, note) 
                                  VALUES (:sp_id, :respondent, :date, :qty, :place, :note)");

            //if-else statement in executing our prepared statement
            $_SESSION['message'] = ($stmt->execute(
                array(
                    ':sp_id' => $_POST['sp_id'],
                    ':respondent' => $_POST['respondent'],
                    ':date' => $_POST['date'],
                    ':qty' => $_POST['qty'],
                    ':place' => $_POST['place'],
                    ':note' => $_POST['note']
                )
            )) ? 'Violation Record Added Successfully!' : 'Something Went Wrong. Cannot Add Violation Record';
        } catch (PDOException $e) {
            $_SESSION['message'] = $e->getMessage();
        }

        //close connection
        $database->close();
    } else {
        $_SESSION['message'] = 'Fill up add form first';
    }

    echo "<script>alert('Response Submitted!'); window.location.href='public-bms.php';</script>";
}
