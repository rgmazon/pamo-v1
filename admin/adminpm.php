<?php
include '../inc/config.php';
session_start();
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Boxiocns CDN Link -->
  <!--link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../image/pamo-logo.png">

  <title>NLNP-PAMO | Permit Application Management</title>
</head>

<body>
  <div class="sidebar close">
    <div class="logo-details">
      <img src="../image/pamo-logo.png" style="width:40px; margin-left:20px;" class="menu">
      <span class="logo_name" style="margin-left:18px;">NLNP-PAMO</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="admindb.php">
          <i class='bx bx-grid-alt'></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="admindb.php">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <a href="adminum.php">
          <i class='bx bx-user-circle'></i>
          <span class="link_name">Manage Users</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="adminum.php">Manage Users</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-detail'></i>
            <span class="link_name">Manage Permit</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a href="adminpm.php">Permit Application</a></li>
          <li><a href="adminvm.php">Violations & Payment</a></li>
        </ul>
      </li>
      <li>
        <a href="adminbms.php">
          <i class='bx bx-line-chart'></i>
          <span class="link_name">BMS</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="adminbms.php">BMS</a></li>
        </ul>
      </li>
      <li>
        <a href="">
          <i class='bx bx-cog'></i>
          <span class="link_name">Settings</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="">Settings</a></li>
        </ul>
      </li>
      <li>
        <?php
        $data = $conn->prepare("SELECT SUM(total_count) AS id
        FROM (
          SELECT COUNT(*) AS total_count FROM users WHERE account_status = 'Pending'
          UNION ALL
          SELECT COUNT(*) AS total_count FROM permit WHERE permit_status = 'Pending'
        ) AS combined_counts;");
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
          <li><a href="../admin/pa-new.php">Apply Permit</a></li>
          <li><a href="../admin/adminbms.php">BMS</a></li>
          <li><a href="../about.php">About Us</a></li>
          <li><a href="../contact.php">Contact Us</a></li>
        </ul>
      </li>

      <!-- code to get account profile details-->
      <?php
      $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
      $select_profile->execute([$admin_id]);
      $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
      ?>
      <li>
        <div class="profile-details">
          <div class="profile-content">
            <img src="../uploaded_img/<?= $fetch_profile['image']; ?>" alt="" width="70" height="70">
          </div>
          <div class="name-job">
            <div class="profile_name">Hello <?= $fetch_profile['username']; ?>!</div>
          </div>
          <a href="../inc/logout.php"><i class='bx bx-log-out'></i></a>
        </div>

      </li>
    </ul>
  </div>


  <!-- Home Section Imnida -->
  <section class="home-section">
    <div class="home-content">
    </div>
    <?php include 'pm.php'; ?>
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