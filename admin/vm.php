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
                <h2 class="text-center text-success pt-2"><b>Violation Management</b></h2>
                <hr>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>
                <a href="../admin/adminvm2.php"><button type="button" class="btn btn-primary">Non Member Records</button></a>
                <a class="btn btn-secondary" href="../modal/excel-vm.php">Export</a>
                <?php include '../modal/add-viol.php'; ?>
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
                                <th>Permit No.</th>
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
                                $sql = 'SELECT permit.lname, 
                                               permit.fname, 
                                               permit.permit_id,
                                               permit.permit_num, 
                                               permit.municipality,
                                               violations.v_id, 
                                               violations.date, 
                                               violations.viol_status, 
                                               violation_category.v_name, 
                                               violation_category.penalty,
                                               violations.payment_date 
                                            FROM permit 
                                            JOIN violations 
                                            ON permit.permit_id = violations.permit_id 
                                            JOIN violation_category 
                                            ON violations.vcat_id = violation_category.vcat_id;';

                                foreach ($db->query($sql) as $row) {
                            ?>
                                    <?php
                                    //change date format
                                    $date = date('F j, Y', strtotime($row['date']));
                                    ?>
                                    <tr>
                                        <td><?= $row['fname'] ?> <?= $row['lname'] ?></td>
                                        <td><?= $row['permit_num'] ?></td>
                                        <td><?= $date ?></td>
                                        <td><?= $row['viol_status'] ?></td>
                                        <td><?= $row['v_name'] ?></td>
                                        <td>
                                            <span><a href="#update_<?php echo $row['v_id']; ?>" class="text-decoration-none text-success" data-bs-toggle="modal">
                                                    <center><button class="btn btn-success">View</button></center>
                                                </a></span>
                                            <?php include '../modal/view-viol.php'; ?>
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