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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.min.js" integrity="sha512-y8/3lysXD6CUJkBj4RZM7o9U0t35voPBOSRHLvlUZ2zmU+NLQhezEpe/pMeFxfpRJY7RmlTv67DYhphyiyxBRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
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

        .bird-box {
            width: 350px;
            border-radius: 10px;
        }

        .bird-box-table {
            width: 150px;
            height: 100px;
            border-radius: 10px;
        }

        .modal-body-edit {
            width: 90%;
        }

        .btn-div {
            display: flex;
            justify-content: space-evenly;
        }

        .image {
            margin: 0 auto;
            height: 100px;
            width: auto;
        }

        .img_cropper {
            width: 70px;
            height: 70px;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }
    </style>
    <title>NLNP-PAMO | Settings</title>
</head>

<body class="w-100">
    <div class="container">
        <br>
        <h2 class="text-center text-success pt-2"><b>Website Settings</b></h2>
        <br>
        <form method="POST" action="../admin/settings-func.php" enctype="multipart/form-data">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <!-- Accordion 1-->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <h4 class="text-center text-success pt-2"><b>Homepage Settings</b></h4>
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="col-lg bg-light rounded my-2 py-2">
                                <!-- carousel -->
                                <div class="carousel">
                                    <h4 class="text-center text-success pt-2"><b>Carousel Settings</b></h4>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover" id="table3">
                                            <thead class="bg-success">
                                                <tr class="text-center text-light">
                                                    <th>
                                                        <center>Item</center>
                                                    </th>
                                                    <th>
                                                        <center>Value</center>
                                                    </th>
                                                    <th>
                                                        <center>Action</center>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php

                                                require '../inc/class3.php';
                                                $database = new Connection3();
                                                $db = $database->open();
                                                try {
                                                    $sql = 'SELECT * from settings';
                                                    foreach ($db->query($sql) as $row) {
                                                ?>
                                                        <tr>
                                                            <td class="text-center"><?= $row['item_name'] ?></td>
                                                            <td class="img_cropper">
                                                                <center><img src="../image/<?= $row['setting_value'] ?>" class="image"></center>
                                                            </td>
                                                            <td>
                                                                <span><a href="#edit_<?php echo $row['settings_id']; ?>" class="text-decoration-none text-success" data-bs-toggle="modal">
                                                                        <center><button class="btn btn-primary btn-action">Update</button></center>
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
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#table3').DataTable({
                                            searching: true,
                                            ordering: true,
                                            paging: true
                                        })
                                    })
                                </script>
                            </div>



                        </div>
                    </div>
                </div>
                <!-- Accordion 2-->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <h4 class="text-center text-success pt-2"><b>BMS Results</b></h4>
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row justify-content-center">
                                <div class="col-lg bg-light rounded my-2 py-2">
                                    <span>
                                        <a href="../admin/adminbms.php"><button type="button" class="btn btn-success">BMS Management</button></a>
                                        <a href="../admin/adminbmsres.php"><button type="button" class="btn btn-primary">BMS Results</button></a>
                                    </span>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Accordion 3-->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                <h4 class="text-center text-success pt-2"><b>BMS Summary</b></h4>
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="row justify-content-center">
                                    <div class="col-lg bg-light rounded my-2 py-2">
                                        <span>
                                            <a href="../admin/adminbms.php"><button type="button" class="btn btn-success">BMS Management</button></a>
                                            <a href="../admin/adminbmsres.php"><button type="button" class="btn btn-primary">BMS Results</button></a>
                                        </span>
                                        <hr>
                                        <?php
                                        if (isset($_SESSION['bms_message'])) {
                                        ?>
                                            <div class="alert alert-info text-center" style="margin-top:20px;">
                                                <?php echo $_SESSION['bms_message']; ?>
                                            </div>

                                            <?php
                                            if (isset($bms_message)) {
                                                foreach ($bms_message as $bms_message) {
                                                    echo '<div class="bms_message">' . $bms_message . '</div>';
                                                }
                                            }
                                            ?>
                                        <?php

                                            unset($_SESSION['bms_message']);
                                        }

                                        ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover" id="table3">
                                                <thead class="bg-success">
                                                    <tr class="text-center text-light">
                                                        <th>
                                                            <center>Species</center>
                                                        </th>
                                                        <th>
                                                            <center>Total Estimated Qty.</center>
                                                        </th>
                                                        <th>
                                                            <center>Total No. of Respondent</center>
                                                        </th>
                                                        <th>
                                                            <center>Areas</center>
                                                        </th>
                                                        <th>
                                                            <center>Month</center>
                                                        </th>
                                                        <th>
                                                            <center>Year</center>
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php

                                                    require '../inc/class3.php';
                                                    $database = new Connection3();
                                                    $db = $database->open();
                                                    try {
                                                        $sql = 'SELECT species.eng_name, 
                                                               species.sp_id, 
                                                               SUM(qty) AS totalqty, 
                                                               COUNT(respondent) AS totalrespondent, 
                                                               MONTHNAME(date) AS month, 
                                                               YEAR(date) AS year, 
                                                               GROUP_CONCAT(DISTINCT place SEPARATOR ", ") AS areas
                                                FROM survey
                                                join species
                                                on survey.sp_id = species.sp_id
                                                GROUP BY sp_id, month;';
                                                        foreach ($db->query($sql) as $row) {
                                                    ?>
                                                            <tr>
                                                                <td class="text-center"><?= $row['eng_name'] ?></td>
                                                                <td class="text-center"><?= $row['totalqty'] ?></td>
                                                                <td class="text-center"><?= $row['totalrespondent'] ?></td>
                                                                <td><?= $row['areas'] ?></td>
                                                                <td class="text-center"><?= $row['month'] ?></td>
                                                                <td class="text-center"><?= $row['year'] ?></td>
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
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('#table3').DataTable({
                                                searching: true,
                                                ordering: true,
                                                paging: true
                                            })
                                        })
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>







</body>

</html>