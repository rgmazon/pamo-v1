<?php
include '../inc/config.php';

if (isset($_POST['submit'])) {

    $eng_name = $_POST['eng_name'];
    $local_name = $_POST['local_name'];
    $sc_name = $_POST['sc_name'];
    $category = $_POST['category'];
    $searca_1997 = $_POST['searca_1997'];
    $villamor_2006 = $_POST['villamor_2006'];
    $mbcfi_2011 = $_POST['mbcfi_2011'];
    $photo_credit = $_POST['photo_credit'];
    $conservation_status = $_POST['conservation_status'];
    $residency_status = $_POST['residency_status'];

    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_folder = '../uploaded_img/' . $image;



    $select = $conn->prepare("SELECT * FROM `species` WHERE eng_name = ?");
    $select->execute([$eng_name]);

    if ($select->rowCount() > 0) {
        $messageusername = 'Species Name Exists!';
        echo "<script>alert('$messageusername'); window.location.href='../admin/adminbms.php';</script>";
    } else {
        $insert = $conn->prepare("INSERT INTO `species`(eng_name, local_name, sc_name, 
                                                            category, searca_1997, villamor_2006, 
                                                            mbcfi_2011, photo_credit, conservation_status, 
                                                            residency_status, image) 
                                      VALUES(?,?,?,?,?,?,?,?,?,?,?)");

        $insert->execute([
            $eng_name, $local_name, $sc_name,
            $category, $searca_1997, $villamor_2006,
            $mbcfi_2011, $photo_credit, $conservation_status,
            $residency_status, $image
        ]);

        if ($insert) {
            move_uploaded_file($image_tmp_name, $image_folder);
            $messagereg = 'Record Saved Successfully!';
            echo "<script>alert('$messagereg'); window.location.href='../admin/adminbms.php';</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap css & js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="css_js/bootstrap.bundle.min.js">
    <script src="css_js/bootstrap.bundle.min.js"></script>
    <script src="css_js/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>NLNP-PAMO | BMS</title>

    <style>
        form {
            width: 90%;
            height: 365px;
            margin: auto;
            margin-top: 50px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .container {
            margin-top: 50px;
            width: 70%;
            border-radius: 10px;
        }

        .inside-container {
            padding: 5px;
            border-radius: 10px;
            background: #e0e0e0;
            box-shadow: 20px 20px 60px #bebebe,
                -20px -20px 60px #ffffff;
        }

        .btn {
            width: 150px;
        }

        .btndiv {
            display: flex;
            justify-content: space-evenly;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="inside-container">
            <!-- Main Form Starts Here -->
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <h3 class="text-success">
                            <center><b>Add New Species Record</b></center>
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <span>Common Name:</span>
                        <input type="text" class="form-control" value="" name="eng_name">
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <span>Local Name:</span>
                        <input type="text" class="form-control" value="" name="local_name">
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <span>Scientific Name:</span>
                        <input type="text" class="form-control" value="" name="sc_name">
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <span>Category:</span>
                        <input type="text" class="form-control" value="" name="category">
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <span>SEARCA 1997:</span>
                        <input type="text" class="form-control" value="" name="searca_1997">
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <span>Villamor 2006:</span>
                        <input type="text" class="form-control" value="" name="villamor_2006">
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <span>MBCFI 2011:</span>
                        <input type="text" class="form-control" value="" name="mbcfi_2011">
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <span>Photo Credit:</span>
                        <input type="text" class="form-control" value="" name="photo_credit">
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <span>Species Image:</span>
                        <input type="file" class="form-control" name="image" accept="image/jpg, image/jpeg, image/png" required>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <span>Residency Status:</span>
                        <input type="text" class="form-control" value="" name="residency_status">
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <span>Conservation Status:</span>
                        <input type="text" class="form-control" value="" name="conservation_status">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-6 col-md-12 btndiv">
                        <span><button type="submit" name="submit" class="btn btn-success">Save Record</a></button>
                            <button class="btn btn-primary"><a href="../admin/adminbms.php" class="text-decoration-none text-light">Back</a></button></span>
                    </div>
                </div>
        </div>
    </div>
    </form>
    <!-- Main Form Ends Here -->
    </div>
    </div>
</body>

</html>