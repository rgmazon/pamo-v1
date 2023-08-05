<?php
//$redirect_page = "../admin/adminpm.php";
require '../inc/config.php';

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:../login.php');
}


$user_id = $_SESSION['user_id'];
$data = $conn->prepare("SELECT * FROM permit WHERE user_id = $user_id ORDER BY permit_id DESC LIMIT 1");
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

    <title>NLNP-PAMO | Permit Application Form</title>

    <style>
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
    <div class="btn">
        <a href="../user/userpermit.php"><button type="button" class="btn btn-success">Go back</button></a>
    </div>
    <form action="permit-application-func.php" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="inside-container">
                <div class="row">
                    <div class="col-lg-12 mx-auto form-group heading">
                        <span>
                            <center>
                                <h3 class="text-success"><b>Fishing Permit Renewal Form</b></h3>
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
                                    <h3>Personal Information</h3>
                                </div>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4">
                                        <span>Fishing Permit No.:</span>
                                        <input type="text" class="form-control" disabled value="<?= $data['permit_num']; ?>">
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <span>Status:</span>
                                        <input type="text" class="form-control" disabled value="<?= $data['permit_status']; ?>">
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-4 col-md-4">
                                        <span>Last Name:</span>
                                        <input type="text" class="form-control" required placeholder="Last Name" name="lname" value="<?= $data['lname']; ?>">
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <span>First Name:</span>
                                        <input type="text" class="form-control" required placeholder="First Name" name="fname" value="<?= $data['fname']; ?>">
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <span>Middle Name:</span>
                                        <input type="text" class="form-control" required placeholder="Middle Name" name="mname" value="<?= $data['mname']; ?>">
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <span>Sitio</span>
                                        <input type="text" class="form-control" required placeholder="Sitio" name="sitio" value="<?= $data['sitio']; ?>">
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <span>Barangay</span>
                                        <input type="text" class="form-control" required placeholder="Barangay" name="barangay" value="<?= $data['barangay']; ?>">
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <span>Municipality</span>
                                        <select class="form-select" required placeholder="Municipality" name="municipality">
                                            <option value="<?= $data['municipality']; ?>"><?= $data['municipality']; ?></option>
                                            <option value="Naujan">Naujan</option>
                                            <option value="Victoria">Victoria</option>
                                            <option value="Socorro">Socorro</option>
                                            <option value="Pola">Pola</option>
                                        </select>
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <span>Date of Birth</span>
                                        <input type="date" class="form-control" required placeholder="MM/DD/YYYY" name="dob" value="<?= $data['dob']; ?>">
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <span>Age</span>
                                        <input type="text" class="form-control" required placeholder="Age" name="age" value="<?= $data['age']; ?>">
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <span>Gender</span>
                                        <select class="form-select" required placeholder="Gender" name="sex" value="<?= $data['gender']; ?>">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <span>Status</span>
                                        <select class="form-select" required placeholder="Status" name="status" value="<?= $data['status']; ?>">
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Separated">Separated</option>
                                        </select>
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <span>Contact No.</span>
                                        <input type="text" class="form-control" required placeholder="09*********" name="contact_num" value="<?= $data['contact_num']; ?>">
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <span>Religion</span>
                                        <input type="text" class="form-control" required placeholder="Religion" name="religion" value="<?= $data['religion']; ?>">
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <span>Citizenship</span>
                                        <input type="text" class="form-control" required placeholder="Citizenship" name="citizenship" value="<?= $data['citizenship']; ?>">
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <span>Contact Person in Case of Emergency</span>
                                        <input type="text" class="form-control" required placeholder="Enter Full Name" name="contact_person" value="<?= $data['contact_person']; ?>">
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <span>Relationship</span>
                                        <input type="text" class="form-control" required placeholder="Relationship" name="relationship" value="<?= $data['relationship']; ?>">
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <span>Contact No.</span>
                                        <input type="number" class="form-control" required placeholder="09*********" name="contact_person_num" value="<?= $data['contact_person_num']; ?>">
                                    </div>
                                </div><br>
                            </div>
                        </div>
                    </div>
                    <!-- First Accordion Ends here -->

                    <!-- Second Accordion -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                <div class="personal-data">
                                    <h3>Permit Information</h3>
                                </div>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <h5>Permit Information</h5><br>
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <span>Type of Registration</span>
                                        <select class="form-select" required placeholder="New or Renewal" name="reg_type" value="Renewal">
                                            <option value="Renewal">Renewal</option>
                                            <option value="New">New</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <span>Vessel Type</span>
                                        <select class="form-select" required placeholder="Vessel Type" name="vessel_type" value="<?= $data['vessel_type']; ?>">
                                            <option value="Motorized">Motorized</option>
                                            <option value="Non-Motorized">Non-Motorized</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <span>Vessel Use</span>
                                        <select class="form-select" required placeholder="Vessel Use" name="vessel_use" value="<?= $data['vessel_use']; ?>">
                                            <option value="Fishing">Fishing</option>
                                            <option value="Transport">Transport</option>
                                            <option value="Trading">Trading</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <span>Vessel Material</span>
                                        <select class="form-select" required placeholder="Vessel Material" name="vessel_material" value="<?= $data['vessel_material']; ?>">
                                            <option value="Wood">Wood</option>
                                            <option value="Fiber">Fiber</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <span>Fishing Gear/s Used</span>
                                        <input type="text" class="form-control" required placeholder="Fishing Gear/s Used" name="fishing_gear_used" value="<?= $data['fishing_gear_used']; ?>">
                                    </div>
                                </div><br>
                                <div class="vessel-dimension">
                                    <h5>Vessel Dimension</h5>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-3">
                                            <span>Length</span>
                                            <input type="text" class="form-control" required placeholder="(in meters)" name="vessel_length" value="<?= $data['vessel_length']; ?>">
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <span>Breadth</span>
                                            <input type="text" class="form-control" required placeholder="(in meters)" name="vessel_breadth" value="<?= $data['vessel_breadth']; ?>">
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <span>Gross Tonnage</span>
                                            <input type="text" class="form-control" required placeholder="Gross Tonnage" name="gross_tonnage" value="<?= $data['gross_tonnage']; ?>">
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <span>Net Tonnage</span>
                                            <input type="text" class="form-control" required placeholder="Net Tonnage" name="net_tonnage" value="<?= $data['net_tonnage']; ?>">
                                        </div>
                                    </div><br>
                                </div>
                                <div class="engine-data">
                                    <h5>Engine Data</h5>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-3">
                                            <span>Horsepower</span>
                                            <input type="text" class="form-control" required placeholder="Horsepower" name="horsepower" value="<?= $data['horsepower']; ?>">
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <span>Speed</span>
                                            <input type="text" class="form-control" required placeholder="Speed" name="speed" value="<?= $data['speed']; ?>">
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <span>Engine Make</span>
                                            <input type="text" class="form-control" required placeholder="Engine Make" name="engine_make" value="<?= $data['engine_make']; ?>">
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <span>Serial Number</span>
                                            <input type="text" class="form-control" required placeholder="Serial Number" name="serial_num" value="<?= $data['serial_num']; ?>">
                                        </div>
                                    </div><br>
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
                                    <h3>Current Registration Information</h3>
                                </div>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <div class="current-reg">
                                    <h5>Current Registration</h5>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-3">
                                            <span>Registration Date</span>
                                            <input type="date" class="form-control" placeholder="MM/DD/YYYY" name="curregdate" value="<?= $data['curregdate']; ?>">
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <span>Expiration Date</span>
                                            <input type="date" class="form-control" placeholder="MM/DD/YYYY" name="curregexp" value="<?= $data['curregexp']; ?>">
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <span>Place of Issuance</span>
                                            <input type="text" class="form-control" placeholder="Place of Issuance" name="curregissuance" value="<?= $data['curregissuance']; ?>">
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <span>Coastguard Reg. No.</span>
                                            <input type="text" class="form-control" placeholder="Coastguard Reg. No." name="coastguardregnum" value="<?= $data['coastguardregnum']; ?>">
                                        </div>
                                    </div><br>
                                </div>
                            </div>
                        </div>
                    </div><br><br>
                    <!-- Third Accordion Ends Here -->
                    <center><button type="submit" class="btn btn-success" name="submit">Submit Permit Application</button></center><br><br>
                </div>
            </div>
        </div>
    </form>
</body>

</html>