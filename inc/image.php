<?php
$conn = mysqli_connect("localhost", "root", "", "pamo");

if (!$conn) {
	die("Error: Failed to connect to database!");
}
