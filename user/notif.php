<?php include '../inc/config.php';
include '../inc/pdo.php';

//session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
</head>

<body>
<?php
               
                $data = $conn->prepare("SELECT count(notif_id) as id, notif_description, user_id FROM `notif_user` where user_id = $user_id");
                $data->execute();
                $data = $data->fetch(PDO::FETCH_ASSOC);
                ?>
                <a href="adminnotif.php">
                    <?php
                    if ($data['id'] == 0) { ?>
                        <i class='bx bx-bell'></i>
                    <?php
                    } else { ?>
                        <i class='bx bx-bell' style="position: relative; left: 8px;"><span class="badge text-bg-danger" style="border-radius: 50%; position: relative; top: -10px; left: -3px; font-size: xx-small;"><?= $data['id']; ?></span></i>
                        <h2><?= $data['notif_description']; ?></h2><br>
                        <h2><?= $data['user_id']; ?></h2>
                    <?php
                    }
                    ?>
</body>

</html>