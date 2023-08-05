<?php
//session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:../login.php');
}


require '../inc/class.php';
$database = new Connection();
$db = $database->open();
$sql = 'SELECT * FROM users';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <div class="permit-application">
        <a href="../user/permitmgmt.php">permit</a>
    </div>
</body>

</html>