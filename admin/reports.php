<?php
include('../inc/config.php');
include '../inc/class.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>Reports</title>
</head>

<body>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    User Management Reports
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <button type="button" class="btn btn-primary">Primary</button>
                </div>
                <div class="container mt-3" style="width:60%;">
                    <a href="export.php?export" class="btn btn-info btn-sm">Export to Excel</a>
                    <hr>
                    <br>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>
                                    <center>Account Status</center>
                                </th>
                                <th>
                                    <center>Name</center>
                                </th>
                                <th>
                                    <center>Mobile</center>
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
                                    $orgDate = $row['date_added'];
                                    $newDate = date("m-d-Y", strtotime($orgDate));
                                    ?>
                                    <tr>
                                        <td>
                                            <center><?= $row['account_status'] ?></center>
                                        </td>
                                        <td>
                                            <center><?= $row['fname'] ?> <?= $row['lname'] ?></center>
                                        </td>
                                        <td>
                                            <center><?= $row['mobile'] ?></center>
                                        </td>
                                        <td>
                                            <center><?= $row['municipality'] ?></center>
                                        </td>
                                        <td>
                                            <center><?= $row['username'] ?></center>
                                        </td>
                                        <td>
                                            <center><?= $newDate ?></center>
                                        </td>
                                        <td>
                                            <span><a href="#edit_<?php echo $row['id']; ?>" class="text-decoration-none" data-bs-toggle="modal">
                                                    <center>Edit</center>
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
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Permit Management Reports
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Accordion Item #3
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
            </div>
        </div>
    </div>
</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="jquery-table2excel-master/src/jquery.table2excel.js"></script>

</html>