<?php
session_start();
include_once('../inc/class.php');
include_once('../inc/config.php');

if (isset($_POST['edit'])) {
	$database = new Connection();
	$db = $database->open();
	try {
		$id = $_GET['id'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$contact_num = $_POST['contact_num'];
		$municipality = $_POST['municipality'];
		$account_status = $_POST['account_status'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "UPDATE users SET fname = '$fname', lname = '$lname', contact_num = '$contact_num', municipality = '$municipality', account_status = '$account_status', username = '$username', password = '$password' WHERE id = '$id'";



		//if-else statement in executing our query
		$_SESSION['message'] = ($db->exec($sql)) ? 'Member updated successfully' : 'Something went wrong. Cannot update member';
	} catch (PDOException $e) {
		$_SESSION['message'] = $e->getMessage();
	}

	//close connection
	$database->close();
} else {
	$_SESSION['message'] = 'Fill up edit form first';
}

header('location: ../admin/adminum.php');
