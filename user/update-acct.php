<?php

include '../inc/config.php';
include '../inc/pdo.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
};

if (isset($_POST['update'])) {

    $fname = $_POST['fname'];
    $fname = filter_var($fname, FILTER_SANITIZE_STRING);
    $lname = $_POST['lname'];
    $lname = filter_var($lname, FILTER_SANITIZE_STRING);
    $mobile = $_POST['mobile'];
    $mobile = filter_var($mobile, FILTER_SANITIZE_STRING);
    $municipality = $_POST['municipality'];
    $municipality = filter_var($municipality, FILTER_SANITIZE_STRING);
    $username = $_POST['username'];
    $username = filter_var($username, FILTER_SANITIZE_STRING);

    $update_profile = $conn->prepare("UPDATE `users` SET fname = ?, lname = ?, mobile = ?, municipality = ? WHERE id = ?");
    $update_profile->execute([$fname, $lname, $mobile, $municipality, $user_id]);

    $old_image = $_POST['old_image'];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_folder = 'uploaded_img/' . $image;

    if (!empty($image)) {

        if ($image_size > 2000000) {
            $message[] = 'image size is too large';
        } else {
            $update_image = $conn->prepare("UPDATE `users` SET image = ? WHERE id = ?");
            $update_image->execute([$image, $user_id]);

            if ($update_image) {
                move_uploaded_file($image_tmp_name, $image_folder);
                unlink('../uploaded_img/' . $old_image);
                $message[] = 'image has been updated!';
            }
        }
    }

    $old_pass = $_POST['old_pass'];
    $previous_pass = ($_POST['previous_pass']);
    $new_pass = ($_POST['new_pass']);
    $confirm_pass = ($_POST['confirm_pass']);

    if (!empty($previous_pass) || !empty($new_pass) || !empty($confirm_pass)) {
        if ($previous_pass != $old_pass) {
            $message[] = 'Old Password not Matched!';
        } elseif ($new_pass != $confirm_pass) {
            $message[] = 'Confirm Password not Matched!';
        } else {
            $update_password = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
            $update_password->execute([$confirm_pass, $user_id]);
            $message[] = 'Password has been Updated!';
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
    <?php
    $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
    $select_profile->execute([$user_id]);
    $row = $select_profile->fetch(PDO::FETCH_ASSOC);
    ?>

    <form method="POST" action="../modal/edit-user-func.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <span>Last Name:</span>
                <input type="text" class="form-control" name="lname" value="<?php echo $row['lname']; ?>">
            </div>
            <div class="col-sm-4 col-md-4">
                <span>First Name:</span>
                <input type="text" class="form-control" name="fname" value="<?php echo $row['fname']; ?>">
            </div>
            <div class="col-sm-4 col-md-4">
                <span>Middle Name:</span>
                <input type="text" class="form-control" name="mname" value="<?php echo $row['mname']; ?>">
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <span>Birthdate:</span>
                <input type="date" class="form-control" name="dob" value="<?php echo $row['dob']; ?>" data-bs-date-format="mm/dd/yyyy">
            </div>
            <div class="col-sm-4 col-md-4">
                <span>Age:</span>
                <input type="text" class="form-control" name="age" value="<?php echo $row['age']; ?>">
            </div>
            <div class="col-sm-12 col-md-4">
                <span>Gender</span>
                <select class="form-select" required name="gender">
                    <option><?php echo $row['gender']; ?></option>
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
                    <option><?php echo $row['municipality']; ?></option>
                    <option value="Naujan">Naujan</option>
                    <option value="Victoria">Victoria</option>
                    <option value="Socorro">Socorro</option>
                    <option value="Pola">Pola</option>
                </select>
            </div>
            <div class="col-sm-4 col-md-4">
                <span>Barangay:</span>
                <input type="text" class="form-control" name="barangay" value="<?php echo $row['barangay']; ?>">
            </div>
            <div class="col-sm-4 col-md-4">
                <span>Sitio:</span>
                <input type="text" class="form-control" name="sitio" value="<?php echo $row['sitio']; ?>">
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <span>Civil Status</span>
                <select class="form-select" required placeholder="Status" name="status">
                    <option><?php echo $row['status']; ?></option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Separated">Separated</option>
                </select>
            </div>
            <div class="col-sm-3 col-md-3">
                <span>Religion:</span>
                <input type="text" class="form-control" name="religion" value="<?php echo $row['religion']; ?>">
            </div>
            <div class="col-sm-3 col-md-3">
                <span>Citizenship:</span>
                <input type="text" class="form-control" name="citizenship" value="<?php echo $row['citizenship']; ?>">
            </div>
            <div class="col-sm-3 col-md-3">
                <span>Contact No.:</span>
                <input type="number" class="form-control" name="contact_num" value="<?php echo $row['contact_num']; ?>">
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <span>Username:</span>
                <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>">
            </div>
            <div class="col-sm-3 col-md-3">
                <span>Email:</span>
                <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="col-sm-3 col-md-3">
                <span>Password:</span>
                <input type="password" class="form-control" name="password" value="<?php echo $row['password']; ?>">
            </div>
            <div class="col-sm-3 col-md-3">
                <span>Confirm Password:</span>
                <input type="password" class="form-control" required placeholder="Confirm Password" name="cpassword" value="<?php echo $row['password']; ?>">
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <span>Profile Picture:</span>
                <input type="file" name="image" required class="form-control" accept="image/jpg, image/png, image/jpeg">
            </div>
        </div><br>
        <!-- Main Form Ends Here -->
        <div class="modal-footer">
            <div class="mb-3">
                <button type="submit" name="edit" class="btn btn-success"><span></span> Update</a>
            </div>
            <div class="mb-3">
                <a href="userdb.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button></a>
            </div>
    </form>
    <!-- Main Form Ends Here -->
</body>

</html>