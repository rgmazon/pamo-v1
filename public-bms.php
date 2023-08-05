<?php
include 'inc/config.php';


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

        .bird-box {
            width: 350px;
            border-radius: 10px;
        }

        .bird-box-table {
            width: 200px;
            height: 150px;
            border-radius: 10px;
        }

        .modal-body-edit {
            width: 90%;
        }

        .btn-div {
            display: flex;
            justify-content: space-evenly;
        }
    </style>
    <title>NLNP-PAMO | Biodiversity Monitoring System</title>
</head>

<body class="w-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg bg-light rounded my-2 py-2">
                <h4 class="text-center text-success pt-2"><b>Biodiversity Monitoring System</b></h4>
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
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="bg-success">
                            <tr class="text-center text-light">
                                <th>
                                    <center>Image</center>
                                </th>
                                <th>
                                    <center>Common Name</center>
                                </th>
                                <th>
                                    <center>Local Name</center>
                                </th>
                                <th>
                                    <center>Species Name</center>
                                </th>
                                <th>
                                    <center>Category</center>
                                </th>
                                <th>
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            require 'inc/class.php';
                            $database = new Connection();
                            $db = $database->open();
                            try {
                                $sql = 'SELECT * FROM species';
                                foreach ($db->query($sql) as $row) {
                            ?>
                                    <tr>
                                        <td>
                                            <center><img src="image/species/<?= $row['image'] ?>" class="bird-box-table" alt="<?= $row['image'] ?>"></center>
                                        </td>
                                        <td class="text-center"><?= $row['eng_name'] ?></td>
                                        <td class="text-center"><?= $row['local_name'] ?></td>
                                        <td class="text-center"><?= $row['sc_name'] ?></td>
                                        <td class="text-center"><?= $row['category'] ?></td>
                                        <td>
                                            <span><a href="#bmsedit_<?php echo $row['sp_id']; ?>" class="text-decoration-none text-primary" data-bs-toggle="modal">
                                                    <center><button class="btn btn-primary"><b>Submit Response</b></button></span></center>
                                            </a></span>
                                        </td>
                                        <?php include 'submit-bms.php'; ?>
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
                paging: true
            })
        })
    </script>




</body>

</html>