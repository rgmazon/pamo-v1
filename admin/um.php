<?php
include '../inc/config.php';
include '../inc/class.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Other-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.3/datatables.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.3/datatables.min.js"></script>
    <style>
        table {
            border: 1px solid;
        }

        td {
            vertical-align: middle;
        }

        .image {
            display: inline;
            margin: 0 auto;
            height: 100%;
            width: auto;
        }

        .img_cropper {
            width: 70px;
            height: 70px;
            position: relative;
            overflow: hidden;
            border-radius: 50%;
        }

        .buttons-pdf,
        .buttons-csv,
        .buttons-copy,
        .buttons-excel {
            background-color: white;
            color: black;
            border: 2px solid #555555;
        }

        .buttons-pdf:hover,
        .buttons-csv:hover,
        .buttons-copy:hover,
        .buttons-excel:hover {
            background-color: #555555;
            color: white;
        }

        .btn-action {
            height: 30px;
            width: 60px;
            font-size: 15px;
            text-align: center;
        }
    </style>
    <title>User Management</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg bg-light rounded my-2 py-2">
                <h2 class="text-center text-success pt-2"><b>User Management</b></h2>
                <hr>
                <a href="../modal/add-user.php"><button type="button" class="btn btn-success">Add New</button></a>
                <a class="btn btn-primary" href="../modal/excel-um.php">Export</a>
                <hr>
                <?php
                if (isset($_SESSION['message'])) {
                ?>
                    <div class="alert alert-info text-center message" id="message" style="margin-top:20px;">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                <?php

                    unset($_SESSION['message']);
                }
                ?>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>
                                <center>Image</center>
                            </th>
                            <th>
                                <center>Account Status</center>
                            </th>
                            <th>
                                <center>Name</center>
                            </th>
                            <th>
                                <center>Municipality</center>
                            </th>
                            <th>
                                <center>Username</center>
                            </th>
                            <th>
                                <center>Date Added</center>
                            </th>
                            <th>
                                <center>Actions</center>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php


                        $database = new Connection();
                        $db = $database->open();
                        try {
                            $sql = 'SELECT * FROM users';
                            foreach ($db->query($sql) as $row) {
                        ?>
                                <?php
                                //change date format
                                $date = date('F j, Y', strtotime($row['date_added']));
                                ?>
                                <tr>
                                    <td>
                                        <center>
                                            <div class="img_cropper"><img src="../uploaded_img/<?= $row['image'] ?>" alt="" class="image"></div>
                                        </center>
                                    </td>
                                    <td>
                                        <center><?= $row['account_status'] ?></center>
                                    </td>
                                    <td>
                                        <center><?= $row['fname'] ?> <?= $row['lname'] ?></center>
                                    </td>
                                    <td>
                                        <center><?= $row['municipality'] ?></center>
                                    </td>
                                    <td>
                                        <center><?= $row['username'] ?></center>
                                    </td>
                                    <td>
                                        <center><?= $date ?></center>
                                    </td>
                                    <td>
                                        <span><a href="#edit_<?php echo $row['id']; ?>" class="text-decoration-none text-success" data-bs-toggle="modal">
                                                <center><button class="btn btn-success btn-action">View</button></center>
                                            </a></span>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf'
                ],
                searching: true,
                ordering: true,
                paging: true,
                "order": [
                    [1, "desc"]
                ],

            })

        })
    </script>
    <script>
        // Delay the hiding of the message by 3 seconds (3000 milliseconds)
        setTimeout(function() {
            document.getElementById('message').style.display = 'none';
        }, 3000);
    </script>
</body>

</html>