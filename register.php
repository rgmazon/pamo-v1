<?php

include 'inc/config.php';

if (isset($_POST['submit'])) {

    $lname = $_POST['lname'];
    $lname = filter_var($lname, FILTER_SANITIZE_STRING);
    $fname = $_POST['fname'];
    $fname = filter_var($fname, FILTER_SANITIZE_STRING);
    $mname = $_POST['mname'];
    $mname = filter_var($mname, FILTER_SANITIZE_STRING);

    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    $municipality = $_POST['municipality'];
    $municipality = filter_var($municipality, FILTER_SANITIZE_STRING);
    $barangay = $_POST['barangay'];
    $barangay = filter_var($barangay, FILTER_SANITIZE_STRING);
    $sitio = $_POST['sitio'];
    $sitio = filter_var($sitio, FILTER_SANITIZE_STRING);

    $status = $_POST['status'];
    $status = filter_var($status, FILTER_SANITIZE_STRING);
    $religion = $_POST['religion'];
    $religion = filter_var($religion, FILTER_SANITIZE_STRING);
    $citizenship = $_POST['citizenship'];
    $citizenship = filter_var($citizenship, FILTER_SANITIZE_STRING);
    $contact_num = $_POST['contact_num'];

    $email = $_POST['email'];
    $username = $_POST['username'];
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $password = ($_POST['password']);
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $cpassword = ($_POST['cpassword']);
    $cpassword = filter_var($cpassword, FILTER_SANITIZE_STRING);

    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_folder = 'uploaded_img/' . $image;

    $dt1 = date("Y-m-d  H:i:s");



    $select = $conn->prepare("SELECT * FROM `users` WHERE username = ?");
    $select->execute([$username]);

    if ($select->rowCount() > 0) {
        $messageusername = 'Username Exists!';
        echo "<script>alert('$messageusername'); window.location.href='register.php';</script>";
    } else {
        if ($password != $cpassword) {
            $messagepass = 'Password do not match!';
            echo "<script>alert('$messagepass'); window.location.href='register.php';</script>";
        } elseif ($image_size > 2000000) {
            $messageimg = 'Image size too large!';
            echo "<script>alert('$messageimg'); window.location.href='register.php';</script>";
        } else {
            $insert = $conn->prepare("INSERT INTO `users`(lname, fname, mname,  
                                                         dob, age, gender, 
                                                         municipality, barangay, sitio, 
                                                         status, religion, citizenship, contact_num, 
                                                         email, username, password,  
                                                         image) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $insert->execute([
                $lname, $fname, $mname,
                $dob, $age, $gender,
                $municipality, $barangay, $sitio,
                $status, $religion, $citizenship, $contact_num,
                $email, $username, $cpassword, $image
            ]);
            if ($insert) {
                move_uploaded_file($image_tmp_name, $image_folder);
                $messagereg = 'Registered Successfully!';
                echo "<script>alert('$messagereg'); window.location.href='login.php';</script>";
            }
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

    <title>NLNP-PAMO | Register</title>

    <style>
        form {
            width: 50%;
            height: 365px;
            margin: auto;
            margin-top: 50px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .heading {
            background-color: #009900;
        }
    </style>
</head>

<body>
    <!-- Main Form Starts Here -->
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-12 mx-auto form-group heading">
                <span>
                    <center>
                        <h3 class="text-light"><b>Create your Account</b></h3>
                    </center>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <span>Last Name:</span>
                <input type="text" class="form-control" required placeholder="Enter Last Name" name="lname">
            </div>
            <div class="col-sm-4 col-md-4">
                <span>First Name:</span>
                <input type="text" class="form-control" required placeholder="Enter First Name" name="fname">
            </div>
            <div class="col-sm-4 col-md-4">
                <span>Middle Name:</span>
                <input type="text" class="form-control" required placeholder="Enter Middle Name" name="mname">
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <span>Birthdate:</span>
                <input type="date" class="form-control" required name="dob">
            </div>
            <div class="col-sm-4 col-md-4">
                <span>Age:</span>
                <input type="number" class="form-control" placeholder="Enter Age" name="age">
            </div>
            <div class="col-sm-12 col-md-4">
                <span>Gender</span>
                <select class="form-select" required name="gender">
                    <option>Select One</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Prefer not to Say">Prefer not to Say</option>
                </select>
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <span>Municipality</span>
                <select class="form-select" required placeholder="Municipality" id="municipality" name="municipality">
                    <option>Select One</option>
                    <option value="Naujan">Naujan</option>
                    <option value="Victoria">Victoria</option>
                    <option value="Socorro">Socorro</option>
                    <option value="Pola">Pola</option>
                </select>
            </div>
            <div class="col-sm-4 col-md-4">
                <span>Barangay:</span>
                <input type="text" class="form-control" required placeholder="Barangay" name="barangay">
            </div>
            <div class="col-sm-4 col-md-4">
                <span>Sitio:</span>
                <input type="text" class="form-control" required placeholder="Sitio" name="sitio">
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <span>Civil Status</span>
                <select class="form-select" required placeholder="Status" name="status">
                    <option>Select One</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Separated">Separated</option>
                </select>
            </div>
            <div class="col-sm-3 col-md-3">
                <span>Religion:</span>
                <input type="text" class="form-control" required placeholder="Religion" name="religion">
            </div>
            <div class="col-sm-3 col-md-3">
                <span>Citizenship:</span>
                <input type="text" class="form-control" required placeholder="Citizenship" name="citizenship">
            </div>
            <div class="col-sm-3 col-md-3">
                <span>Contact No.:</span>
                <input type="number" class="form-control" required placeholder="09000000000" name="contact_num">
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <span>Username:</span>
                <input type="text" class="form-control" required placeholder="Enter Username" name="username">
            </div>
            <div class="col-sm-3 col-md-3">
                <span>Email:</span>
                <input type="email" class="form-control" required placeholder="Enter Email" name="email">
            </div>
            <div class="col-sm-3 col-md-3">
                <span>Password:</span>
                <input type="password" class="form-control" required placeholder="Enter Password" name="password">
            </div>
            <div class="col-sm-3 col-md-3">
                <span>Confirm Password:</span>
                <input type="password" class="form-control" required placeholder="Confirm Password" name="cpassword">
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <span>Profile Picture:</span>
                <input type="file" name="image" required class="form-control" accept="image/jpg, image/png, image/jpeg">
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <center><button type="submit" name="submit" style="width:250px;" class="btn btn-success">Register</button></center>
            </div>
        </div>
    </form>
    <!-- Main Form Ends Here -->
</body>

</html>