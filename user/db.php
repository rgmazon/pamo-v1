<?php
include '../inc/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>NLNP-PAMO | User Page</title>

    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #f6d365;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
        }
    </style>
</head>

<body>
    <?php
    $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
    $select_profile->execute([$user_id]);
    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
    ?>
    <section class="vh-100" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-10 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="../uploaded_img/<?= $fetch_profile['image']; ?>" alt="Avatar" class="img-fluid my-5" style="width: 150px;border-radius:10px;" />
                                <h5><?= $fetch_profile['fname']; ?> <?= $fetch_profile['lname']; ?></h5>
                                <p><?= $fetch_profile['role']; ?></p>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Information</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Date of Birth</h6>
                                            <?php
                                            //change date format
                                            $orgDate = $fetch_profile['dob'];
                                            $newDate = date("m-d-Y", strtotime($orgDate));
                                            ?>
                                            <p class="text-muted"><?= $newDate; ?></p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Gender</h6>
                                            <p class="text-muted"><?= $fetch_profile['gender']; ?></p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Address</h6>
                                            <p class="text-muted"><?= $fetch_profile['barangay']; ?>, <?= $fetch_profile['municipality']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted"><?= $fetch_profile['email']; ?></p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Phone</h6>
                                            <p class="text-muted"><?= $fetch_profile['contact_num']; ?></p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <a href="update-acct.php" class="text-decoration-none text-success">Update Account Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>