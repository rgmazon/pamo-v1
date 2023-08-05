<?php
include '../inc/config.php';
include '../inc/pdo.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/db.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>NLNP-PAMO | Admin Dashboard</title>
    <style>
        #count {
            border-radius: 50%;
            position: relative;
            top: -10px;
            left: -3px;
            font-size: xx-small;
        }
    </style>
</head>

<body>
    <div class="dash-content mx-auto bg-light" style="width:90%; padding:15px; border-radius:10px;">
        <div class="overview">
            <div class="title">
                <span class="text" style="margin-top:-60px;">Dashboard</span>
            </div>
            <div class="boxes">
                <?php
                $data = $conn->prepare("SELECT count(id) as id FROM `users`");
                $data->execute();
                $data = $data->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="box box1">
                    <a href="adminum.php" class="text-decoration-none">
                        <span class="text">Total Users</span><br>
                        <span class="number">
                            <center><?= $data['id']; ?></center>
                        </span>
                    </a>
                </div>
                <?php
                $data = $conn->prepare("SELECT count(permit_id) as permit_id FROM `permit` where permit_status = 'Pending'");
                $data->execute();
                $data = $data->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="box box2">
                    <a href="adpan-pm.php" class="text-decoration-none">
                        <span class="text">Pending Permit</span><br>
                        <span class="number">
                            <center><?= $data['permit_id']; ?></center>
                        </span>
                    </a>
                </div>
                <?php
                $data = $conn->prepare("SELECT count(permit_id) as permit_id FROM `permit` where permit_status = 'Approved'");
                $data->execute();
                $data = $data->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="box box3">
                    <a href="adpan-pm.php" class="text-decoration-none">
                        <span class="text">Active Permit</span><br>
                        <span class="number">
                            <center><?= $data['permit_id']; ?></center>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="activity">
            <div class="title">
                <span class="text">Recent Activities</span>
            </div>
            <div class="activity-data">


                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th>Address</th>
                            <th>Date Added</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        require '../inc/class.php';
                        $database = new Connection();
                        $db = $database->open();
                        try {
                            $sql = "SELECT users.fname, users.lname, users.municipality, users.date_added FROM users WHERE account_status = 'Pending' UNION ALL
                            SELECT permit.fname, permit.lname, permit.municipality, permit.appl_date FROM permit WHERE permit_status = 'Pending'";
                            foreach ($db->query($sql) as $row) {
                        ?>
                                <?php
                                //change date format
                                $orgDate = $row['date_added'];
                                $newDate = date("m-d-Y", strtotime($orgDate));
                                ?>
                                <tr>
                                    <td>
                                        <center><?= $row['fname'] ?> <?= $row['lname'] ?></center>
                                    </td>
                                    <td>
                                        <center><?= $row['municipality'] ?></center>
                                    </td>
                                    <td>
                                        <center><?= $newDate ?></center>
                                    </td>

                                </tr>
                        <?php
                            }
                        } catch (PDOException $e) {
                            echo "There is some problem in connection: " . $e->getMessage();
                        }

                        //close connection
                        $database->close();

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>