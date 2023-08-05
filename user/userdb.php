<?php include '../inc/config.php';
include '../inc/pdo.php';

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>NLNP-PAMO | Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/popper.min.js"></script>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../image/pamo-logo.png">

</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <img src="../image/pamo-logo.png" style="width:40px; margin-left:20px;" class="menu">
            <span class="logo_name" style="margin-left:18px;">NLNP-PAMO</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="userdb.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="userdb.php">Dashboard</a></li>
                </ul>
            </li>
            <li>
                <a href="../public-bms.php">
                    <i class='bx bx-line-chart'></i>
                    <span class="link_name">BMS</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="../public-bms.php">BMS</a></li>
                </ul>
            </li>
            <li>
                <?php
                $user_id = $_SESSION['user_id'];
                $data = $conn->prepare("SELECT count(notif_id) as id FROM `notif_user` where user_id = $user_id");
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
                    <?php
                    }
                    ?>
                    <span class="link_name">Notifications</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="adminnotif.php">Notifications</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-collection'></i>
                        <span class="link_name">Links</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Links</a></li>
                    <li><a href="../home.php">Home</a></li>
                    <li><a href="bms.php">BMS</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </li>

            <!-- code to get account profile details-->
            <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="../uploaded_img/<?= $fetch_profile['image']; ?>" alt="" width="70" height="70">
                    </div>
                    <div class="name-job">
                        <div class="profile_name">Hello <?= $fetch_profile['fname']; ?>!</div>
                    </div>
                    <a href="../inc/logout.php"><i class='bx bx-log-out'></i></a>
                </div>

            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="content">
            <?php include 'permitmgmt.php';
            ?>
        </div>
    </section>
    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>
</body>

</html>