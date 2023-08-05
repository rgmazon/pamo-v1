<?php
include '../cap/inc/config.php';

if (isset($_POST['submit'])) {
    $redirect_page = '../cap/home.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $insert = $conn->prepare("insert into contact(name, email, message) values(?,?,?)");
    $insert->execute([$name, $email, $message]);

    if ($insert) {
        echo "alert('Thank You for your Message!.').<script>window.location = '$redirect_page';</script>";
    }
}
