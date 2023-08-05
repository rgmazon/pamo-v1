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
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg bg-light rounded my-2 py-2">
                <h2 class="text-center text-success pt-2"><b>Violation Management (Non-Member)</b></h2>
                <hr>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>
                <a href="../admin/adminvm.php"><button type="button" class="btn btn-primary">NLNP-PAMO Member Records</button></a>
                <a class="btn btn-secondary" href="../modal/excel-vm-nm.php">Export</a>
                <?php include '../modal/addnm-viol.php'; ?>
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
                                <th>Name</th>
                                <th>Address</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Violation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            require '../inc/class.php';
                            $database = new Connection();
                            $db = $database->open();
                            try {
                                $sql = 'SELECT violations2.name,
                                               violations2.address, 
                                               violations2.v_id, 
                                               violations2.payment_date, 
                                               violations2.date, 
                                               violations2.viol_status, 
                                               violation_category.v_name, 
                                               violation_category.penalty 
                                            FROM violations2
                                            JOIN violation_category 
                                            ON violations2.vcat_id = violation_category.vcat_id;';

                                foreach ($db->query($sql) as $row) {
                            ?>
                                    <?php
                                    //change date format
                                    $orgDate = $row['date'];
                                    $newDate = date("m-d-Y", strtotime($orgDate));
                                    ?>
                                    <tr>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['address'] ?> </td>
                                        <td><?= $newDate ?></td>
                                        <td><?= $row['viol_status'] ?></td>
                                        <td><?= $row['v_name'] ?></td>
                                        <td>
                                            <span><a href="#update_<?php echo $row['v_id']; ?>" class="text-decoration-none text-success" data-bs-toggle="modal">
                                                    <center><button class="btn btn-success">View</button></center>
                                                </a></span>
                                            <?php include '../modal/view-viol2.php'; ?>
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
                searching: true,
                ordering: true,
                paging: true,
                "order": [
                    [3, "asc"]
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