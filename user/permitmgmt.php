<?php
//$redirect_page = "../admin/adminpm.php";
require '../inc/config.php';
//session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:../login.php');
}

$user_id = $_SESSION['user_id'];
$data = $conn->prepare("SELECT * FROM permit WHERE user_id = $user_id");
$data->execute();
$data = $data->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <link rel="shortcut icon" href="../image/pamo-logo.png">


    <title>NLNP-PAMO | Fishing Permit</title>

    <style>
        @import url('https://fonts.cdnfonts.com/css/neue-haas-grotesk-text');

        .container {
            width: 90%;
            margin-top: 20px;
            border-radius: 10px;
            background: #e0e0e0;
            box-shadow: 20px 20px 60px #bebebe,
                -20px -20px 60px #ffffff;
        }

        .inside-container {
            margin: 20px;
            margin-bottom: 20px;
        }

        .heading {
            margin-top: 10px;
        }

        .accordion-button {
            color: #279C88;
        }

        .accordion-button:focus {
            z-index: 3;
            border-color: #279C88;
            outline: 0 !important;
            /* I changed the color on this line */
            /* If you do not want any color, just delete */
            box-shadow: 0 0 0 0.25rem rgba(39, 156, 136, 0.25);
        }
    </style>
</head>

<body>
    <form action="permit-application-func.php" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="inside-container">
                <div class="row">
                    <div class="col-lg-12 mx-auto form-group heading">
                        <span>
                            <center>
                                <h3 class="text-success"><b>Fishing Permit Viewer</b></h3>
                            </center>
                        </span>
                    </div>
                </div>

                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <!-- First Accordion -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                <div class="personal-data">
                                    <h3>Apply Fishing Permit</h3>
                                </div>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <?php
                                $select = $conn->prepare("SELECT * FROM `permit` WHERE user_id = ?");
                                $select->execute([$user_id]);
                                $fetch = $select->fetch(PDO::FETCH_ASSOC);

                                if (!$fetch) {
                                    echo '<a href="../user/pa-new.php"><button type="button" class="btn btn-success">New Permit Application</button></a>';
                                } else {
                                    echo '<a href="../user/pa.php"><button type="button" class="btn btn-primary">Apply Permit Renewal</button></a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- First Accordion Ends here -->

                    <!-- Second Accordion -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                <div class="personal-data">
                                    <h3>Permit History</h3>
                                </div>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <div class="table-responsive">
                                    <?php
                                    $query = $conn->prepare("SELECT * FROM permit WHERE user_id = :user_id");
                                    $query->bindParam(':user_id', $user_id);
                                    $query->execute();
                                    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr class="text-center text-success">
                                                <th><b>Permit No.</b></th>
                                                <th><b>Approved Date</b></th>
                                                <th><b>Expired Date</b></th>
                                                <th><b>Permit Status</b></th>
                                                <th><b>Action</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($rows as $row) : ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $row['permit_num']; ?></td>
                                                    <td class="text-center"><?php echo $row['curregdate']; ?></td>
                                                    <td class="text-center"><?php echo $row['curregexp']; ?></td>
                                                    <td class="text-center"><?php echo $row['permit_status']; ?></td>
                                                    <td class="text-center">
                                                        <!-- Update button with a link -->
                                                        <a href="../user/permit-pdf.php?permit_id=<?php echo $row['permit_id']; ?>" class="text-primary text-decoration-none"><b>View</b></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Second Accordion Ends here -->

                    <!-- Third Accordion -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                <div class="personal-data">
                                    <h3>Violation Records</h3>
                                </div>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <div class="table-responsive">
                                    <?php

                                    $user_id = $_SESSION['user_id'];
                                    $query = $conn->prepare("select violation_category.v_name, violation_category.penalty, 
                                                                    violations.permit_id, violations.date, violations.payment_date,
                                                                    violations.payment_amt, violations.recieved_from, violations.receipt_num, 
                                                                    violations.viol_status, violations.details, permit.permit_id, permit.user_id
                                                            from violation_category
                                                            join violations 
                                                            on violation_category.vcat_id = violations.vcat_id
                                                            join permit
                                                            on violations.permit_id = permit.permit_id where user_id = $user_id");

                                    $query->execute();
                                    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr class="text-center text-success">
                                                <th><b>Violation</b></th>
                                                <th><b>Date Committed</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Penalty</b></th>
                                                <th><b>Amt. Paid</b></th>
                                                <th><b>Date Paid</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($rows as $row) :
                                                //change date format
                                                $date = date('F j, Y', strtotime($row['date']));
                                                $date2 = date('F j, Y', strtotime($row['payment_date']));
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['v_name']; ?></td>
                                                    <td class="text-center"><?php echo $date; ?></td>
                                                    <td class="text-center"><?php echo $row['viol_status']; ?></td>
                                                    <td><?php echo $row['penalty']; ?></td>
                                                    <td class="text-center"><?php echo $row['payment_amt']; ?></td>
                                                    <td class="text-center"><?php echo $date2; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><br><br>
                    <!-- Third Accordion Ends Here -->
                </div>
            </div>
        </div>
    </form>
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