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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.print.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.0/css/buttons.bootstrap.min.css">

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

        .buttons-csv {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 2px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .buttons-excel {
            background-color: #008CBA;
            /* Green */
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 2px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .buttons-pdf {
            background-color: #f44336;
            /* Green */
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 2px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .paginate_button {
            text-decoration: none;
        }
    </style>
    <title>NLNP-PAMO | Biodiversity Monitoring System</title>
</head>

<body class="w-100">
    <div class="container">
        <br>
        <h2 class="text-center text-success pt-2"><b>Biodiversity Monitoring System</b></h2>
        <br>
        <div class="buttons">
            <span>
                <a href="../modal/add-species.php"><button type="button" class="btn btn-primary">Add New Species</button></a>
                <a href="../admin/adminbms.php"><button type="button" class="btn btn-success">BMS Management</button></a>
            </span>
        </div>
        <br>
        <div class="accordion accordion-flush" id="accordionFlushExample">

            <!-- Accordion 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h4 class="text-center text-success pt-2"><b>BMS Results</b></h4>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row justify-content-center">
                            <div class="col-lg bg-light rounded my-2 py-2">
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
                                    <table class="table table-bordered table-striped table-hover" id="table2">
                                        <thead class="bg-success">
                                            <tr class="text-center text-light">
                                                <th>
                                                    <center>Species</center>
                                                </th>
                                                <th>
                                                    <center>Respondent</center>
                                                </th>
                                                <th>
                                                    <center>Date</center>
                                                </th>
                                                <th>
                                                    <center>Qty.</center>
                                                </th>
                                                <th>
                                                    <center>Area</center>
                                                </th>
                                                <th>
                                                    <center>Note</center>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php

                                            require '../inc/class2.php';
                                            $database = new Connection2();
                                            $db = $database->open();
                                            try {
                                                $sql = "select DATE_FORMAT(date, '%M %e, %Y') as 'Date', 
                                                                eng_name, 
                                                                respondent, qty, place, note
                                                                 from survey
                                join species 
                                on survey.sp_id = species.sp_id";
                                                foreach ($db->query($sql) as $row) {
                                            ?>
                                                    <?php
                                                    //change date format
                                                    //$orgDate = $row['date'];
                                                    //$newDate = date("m-d-Y", strtotime($orgDate));
                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><?= $row['eng_name'] ?></td>
                                                        <td class="text-center"><?= $row['respondent'] ?></td>
                                                        <td class="text-center"><?= $row['Date'] ?></td>
                                                        <td class="text-center"><?= $row['qty'] ?></td>
                                                        <td class="text-center"><?= $row['place'] ?></td>
                                                        <td class="text-center"><?= $row['note'] ?></td>
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
                                    $('#table2').DataTable({
                                        searching: true,
                                        ordering: true,
                                        paging: true,
                                        dom: 'Bfrtip',
                                        buttons: [
                                            'csv', 'excel', 'pdf'
                                        ]
                                    })
                                })
                            </script>
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
                                        paging: true,
                                        dom: 'Bfrtip',
                                        buttons: [
                                            'csv', 'excel', 'pdf'
                                        ]
                                    })
                                })
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







</body>

</html>