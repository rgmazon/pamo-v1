<!-- Header For Logged in Users -->
<?php
require_once('inc/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS & JS imports-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/notif.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/header.js"></script>

    <link rel="shortcut icon" href="image/pamo-logo.png">
</head>

<body>
    <div class="header">
        <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><b>NLNP-PAMO</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php"><b>Home User</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../user/pa-new.php"><b>Apply Permit</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="public-bms.php"><b>BMS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php"><b>About</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><b>Contact Us</b></a>
                            <?php include '../cap/contact.php'; ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user-db.php"><b>My Account</b></a>
                        </li>

                        <?php
                        $user_id = $_SESSION['user_id'];

                        $data = $conn->prepare("SELECT count(notif_id) as id FROM `notif_user` where notif_status = 'Pending' and notif_user.user_id = $user_id");
                        $data->execute();
                        $data = $data->fetch(PDO::FETCH_ASSOC);
                        ?>

                        <?php
                        if ($data['id'] == 0) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href=""><b>Notifications</b></a>
                            </li>
                        <?php
                        } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href=""><b>Notifications</b><span class="badge text-bg-danger" id="count"><?= $data['id']; ?></span></a>
                            </li>
                        <?php
                        }
                        ?>


                        <li class="nav-item">
                            <a class="nav-link" href="inc/logout.php"><b>Logout</b></a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="main">

    </div>


</body>

</html>