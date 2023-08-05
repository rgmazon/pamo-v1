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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.3/datatables.min.css" rel="stylesheet" />
    <title>NLNP-PAMO | Admin Dashboard</title>
    <style>
        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 300px;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>
    <div class="dash-content mx-auto bg-light" style="width:90%; padding:15px; border-radius:10px;">
        <div class="featured">
            <div class="notif-body">
                <div class="row">
                    <div class="column">
                        <span><button class="btn btn-success w-100">
                                <?php
                                $data = $conn->prepare("SELECT count(permit_id) as id FROM `permit` where permit_status  = 'Pending'");
                                $data->execute();
                                $data = $data->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <?php
                                if ($data['id'] > 0) { ?>
                                    <h2>Permit Application<span class="badge text-bg-danger" style="border-radius: 50%; position: relative; top: -20px; left: -3px; font-size: xx-small;"><?= $data['id']; ?></span></h2>
                                <?php
                                } else { ?>
                                    <h2>Permit Application</h2>
                                <?php } ?>
                            </button></span>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>Applicant</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Type of Application</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                require '../inc/class.php';
                                $database = new Connection();
                                $db = $database->open();
                                try {
                                    $sql = 'SELECT * FROM permit where permit_status = "Pending"';
                                    foreach ($db->query($sql) as $row) {
                                ?>
                                        <tr>
                                            <td>
                                                <center><?= $row['fname'] . ' ' . $row['lname'] ?></center>
                                            </td>
                                            <td>
                                                <center><?= $row['barangay'] . ', ' . $row['municipality'] ?></center>
                                            </td>
                                            <td>
                                                <center><?= $row['appl_date'] ?></center>
                                            </td>
                                            <td>
                                                <center><?= $row['reg_type'] ?></center>
                                            </td>
                                            <td>
                                                <span>
                                                    <center>
                                                        <a href="../modal/permit-pdf.php?permit_id=<?php echo $row['permit_id']; ?>" class="text-decoration-none"><button class="btn btn-success btn-action">View</button></a>
                                                    </center>
                                                </span>
                                                <?php include '../modal/view-permit-modal.php'; ?>
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
                    <div class="column">
                        <span><button class="btn btn-primary w-100">
                                <?php
                                $data = $conn->prepare("SELECT count(id) as id FROM `users` where account_status  = 'Pending'");
                                $data->execute();
                                $data = $data->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <?php
                                if ($data['id'] > 0) { ?>
                                    <h2>Users<span class="badge text-bg-danger" style="border-radius: 50%; position: relative; top: -20px; left: -3px; font-size: xx-small;"><?= $data['id']; ?></span></h2>
                                <?php
                                } else { ?>
                                    <h2>Users</h2>
                                <?php } ?>
                            </button></span>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Date Added</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                require '../inc/class2.php';
                                $database = new Connection2();
                                $db = $database->open();
                                try {
                                    $sql = 'SELECT * FROM users where account_status = "Pending"';
                                    foreach ($db->query($sql) as $row) {
                                ?>
                                        <tr>
                                            <td>
                                                <center><?= $row['fname'] . ' ' . $row['lname'] ?></center>
                                            </td>
                                            <td>
                                                <center><?= $row['barangay'] . ', ' . $row['municipality'] ?></center>
                                            </td>
                                            <td>
                                                <center><?= $row['date_added'] ?></center>
                                            </td>
                                            <td>
                                                <span>
                                                    <center>
                                                        <a href="#edit_<?php echo $row['id']; ?>" class="text-decoration-none text-success" data-bs-toggle="modal">
                                                            <center><button class="btn btn-success btn-action">View</button></center>
                                                        </a>
                                                    </center>
                                                </span>
                                            </td>
                                            <?php include '../modal/edit-user.php'; ?>
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
        </div>

    </div>
</body>

</html>