<?php
include '../inc/config.php';
session_start();
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="shortcut icon" href="../image/pamo-logo.png">
    <title>NLNP-PAMO | Add Violation</title>

    <style>
        .container {
            margin: auto;
            margin-top: 10%;
            width: 40%;
            padding: 5px;
            border-radius: 10px;
            background: #e0e0e0;
            box-shadow: 20px 20px 60px #bebebe,
                -20px -20px 60px #ffffff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="cont-inside">
            <div class="title text-center mx-auto text-success">
                <h2><b>Add Violation Record</b></h2>
            </div>
            <form method="POST" action="../modal/add-viol-func.php">
                <div class="row">
                    <!-- Populate Dropdown with Permit Number Data from database -->
                    <?php
                    $query = "SELECT * FROM permit where permit_status = 'Approved'";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <div class="row">
                        <div class="col-sm-12 col-md-6 form-group mx-auto">
                            <span>Permit Number:</span>
                            <select class="form-control" required placeholder="Select One" name="permit_id">
                                <?php foreach ($records as $record) : ?>
                                    <option value="<?php echo $record['permit_id']; ?>"><?php echo $record['permit_num']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 form-group mx-auto">
                            <span>Date Committed:</span>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                    </div>

                    <!-- Populate Dropdown with Violation Category Data from database -->
                    <?php
                    $query = "SELECT * FROM violation_category";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <div class="row">
                        <div class="col-sm-12 col-md-6 form-group mx-auto">
                            <span>Violation:</span>
                            <select class="form-select" required placeholder="Select One" name="vcat_id">
                                <?php foreach ($records as $record) : ?>
                                    <option value="<?php echo $record['vcat_id']; ?>"><?php echo $record['v_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div><br><br>


                    <div class="row" style="display:flex; justify-content:center; margin-top:10px; margin-bottom:10px;">
                        <div class="col-md-6">
                            <span><button type="submit" name="saveviolation" class="btn btn-primary" style="margin-left:30px;"><span class="glyphicon glyphicon-floppy-disk"></span>Save Record</a></span>
                            <span><a href="../admin/adminvm.php"><button type="button" style="margin-left:50px;" class="btn btn-secondary" data-bs-dismiss="modal">Back</button></a></span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>