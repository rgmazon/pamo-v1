<?php
include '../inc/config.php';


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
            color: <?php echo $td_color; ?>;
        }

        table.dataTable tbody td {
            vertical-align: middle;
        }

        @media print {

            .modal-content,
            #page-container,
            .scrollable-page,
            .ps,
            .panel {
                height: 100% !important;
                width: 100% !important;
                display: flex;
            }

            body,
            .modal-footer,
            * {
                visibility: hidden;
            }

            .modal-content * {
                visibility: visible;
                overflow: visible;
            }

            .main-page * {
                display: none;
            }

            .modal {
                position: absolute;
                left: 0;
                top: 0;
                margin: 0;
                padding: 0;
                min-height: 550px;
                visibility: visible;
                overflow: visible !important;
                /* Remove scrollbar for printing. */
            }

            .modal-dialog {
                visibility: visible !important;
                overflow: visible !important;
                /* Remove scrollbar for printing. */
            }

            .form-control,
            .form-select {
                border: none;
            }
        }

        * {
            box-sizing: border-box;
        }

        /* Create three unequal columns that floats next to each other */
        .column {
            float: left;
            padding: 10px;
            height: 350px;
            /* Should be removed. Only for demonstration */
        }

        .left,
        .right {
            width: 25%;
        }

        .middle {
            width: 50%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .logo {
            width: 150px;
            height: 150px;
            margin-top: 35px;
        }

        .logo-holder {
            display: flex;
            justify-content: center;
        }

        .head {
            margin-top: 45px;
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
            height: 25px;
            width: 50px;
            font-size: 10px;
            text-align: center;
        }

        .btn-action2 {
            height: 25px;
            width: 65px;
            font-size: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg bg-light rounded my-2 py-2">
                <h2 class="text-center text-success pt-2"><b>Fishing Permit Application Management</b></h2>
                <hr>
                <a href="../admin/pa-new.php"><button type="button" class="btn btn-success">Add New</button></a>
                <a class="btn btn-primary" href="../modal/excel-pm.php">Export</a>
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
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th class="text-success">
                                    <center>Permit No.</center>
                                </th>
                                <th class="text-success">
                                    <center>Status</center>
                                </th>
                                <th class="text-success">
                                    <center>Reg. Type</center>
                                </th>
                                <th class="text-success">
                                    <center>Full Name</center>
                                </th>
                                <th class="text-success">
                                    <center>Municipality</center>
                                </th>
                                <th class="text-success">
                                    <center>Date Applied</center>
                                </th>
                                <th class="text-success">
                                    <center>Permit ID</center>
                                </th>
                                <th class="text-success">
                                    <center>Actions</center>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            require '../inc/class.php';
                            $database = new Connection();
                            $db = $database->open();
                            try {
                                $sql = 'SELECT * FROM permit ORDER BY appl_date asc';
                                foreach ($db->query($sql) as $row) {

                                    $td_color = "black";

                                    if ('permit_status' == 'Expired ') {
                                        $td_color = "red";
                                    } else {
                                        $td_color = "green";
                                    }
                            ?>
                                    <?php
                                    //change date format
                                    //$orgDate = $row['appl_date'];
                                    //$newDate = date("m-d-Y", strtotime($orgDate));
                                    $formattedDate = date('F j, Y', strtotime($row['appl_date']));

                                    ?>
                                    <tr>
                                        <td><?= $row['permit_num'] ?></td>
                                        <td><?= $row['permit_status'] ?></td>
                                        <td><?= $row['reg_type'] ?></td>
                                        <td><?= $row['fname'] ?> <?= $row['lname'] ?></td>
                                        <td><?= $row['municipality'] ?></td>
                                        <td><?= $formattedDate ?></td>
                                        <td><?= $row['id_status'] ?></td>
                                        <td><span>
                                                <center>
                                                    <a href="../modal/permit-pdf.php?permit_id=<?php echo $row['permit_id']; ?>" class="text-decoration-none"><button class="btn btn-success btn-action">View</button></a>
                                                    <a href="#approve_<?php echo $row['permit_id']; ?>" class="text-decoration-none" data-bs-toggle="modal">
                                                        <button class="btn btn-danger btn-action2">Approve</button>
                                                    </a>
                                                    <a href="../modal/permit-id.php?permit_id=<?php echo $row['permit_id']; ?>" class="text-decoration-none"><button class="btn btn-primary btn-action">ID</button></a>
                                                    <?php include '../modal/approve-permit-modal.php'; ?>
                                                    <?php include '../modal/view-permit-modal.php'; ?>
                                                </center>
                                            </span>
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