<?php
include '../inc/config.php';
include "../inc/conf.php";
$query = 'SELECT * FROM permit
              WHERE
              permit_id =' . $_GET['permit_id'];
$result = mysqli_query($db, $query) or die(mysqli_error($db));

while ($_POST = mysqli_fetch_array($result)) {
    $permit_num = $_POST['permit_num'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $sitio = $_POST['sitio'];
    $barangay = $_POST['barangay'];
    $municipality = $_POST['municipality'];
    $sex = $_POST['sex'];
    $status = $_POST['status'];
    $citizenship = $_POST['citizenship'];
    $religion = $_POST['religion'];
    $contact_num = $_POST['contact_num'];
    $contact_person = $_POST['contact_person'];
    $relationship = $_POST['relationship'];
    $contact_person_num = $_POST['contact_person_num'];
    $reg_type = $_POST['reg_type'];
    $vessel_type = $_POST['vessel_type'];
    $vessel_use = $_POST['vessel_use'];

    $vessel_material = $_POST['vessel_material'];
    $fishing_gear_used = $_POST['fishing_gear_used'];

    $vessel_length = $_POST['vessel_length'];
    $vessel_breadth = $_POST['vessel_breadth'];
    $gross_tonnage = $_POST['gross_tonnage'];
    $net_tonnage = $_POST['net_tonnage'];

    $horsepower = $_POST['horsepower'];
    $speed = $_POST['speed'];
    $engine_make = $_POST['engine_make'];
    $serial_num = $_POST['serial_num'];

    $curregdate = $_POST['curregdate'];
    $curregexp = $_POST['curregexp'];
    $curregissuance = $_POST['curregissuance'];
    $coastguardregnum = $_POST['coastguardregnum'];
    $citizenship = $_POST['citizenship'];
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

    <style>
        /* Create three unequal columns that floats next to each other */
        .column {
            float: left;
            padding: 10px;
            height: 300px;
            /* Should be removed. Only for demonstration */
        }

        .left,
        .right {
            width: 25%;
        }

        .middle {
            width: 50%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .logo {
            width: 150px;
            height: 150px;
            margin-top: 35px;
        }

        .logo-holder {
            display: flex;
            justify-content: center;
        }

        .head {
            margin-top: 45px;
        }

        .row2 {
            margin-left: 40px;
            margin-right: 40px;
        }

        .column2 {
            float: left;
            padding: 10px;
            height: 300px;
            /* Should be removed. Only for demonstration */
        }

        .left2 {
            width: 75%;
        }

        .right2 {
            width: 25%;
        }

        .info {
            letter-spacing: 3px;
        }

        .picture-box {
            border: 1px solid;
            height: 192px;
            width: 192px;
            margin: auto;
            margin-top: 45px;
        }

        #doc-target {
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            color: #000;
            font-size: small;
            line-height: 0.6em;
            margin: 0 auto;
            letter-spacing: 0.01px;
        }

        #outer {
            padding: 72pt 72pt 72pt 72pt;
            border: 1px solid #000;
            margin: 0 auto;
            height: 1770px;
            width: 1275px;
        }

        #container {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <br><br>
    <div class="cont" id="container">

        <div id="outer">
            <div id="doc-target">
                <form method="POST" form action="../admin/adminpm.php?id=<?= $row['permit_num'] ?>">
                    <div class="row">
                        <div class="column left logo-holder">
                            <img class="logo" src="../image/denr-logo.png" alt="">
                        </div>
                        <div class="column middle">
                            <span class="head">
                                <center>
                                    <p>Republic of the Philippines</p>
                                    <p>DEPARTMENT OF ENVIRONMENT AND NATURAL RESOURCES</p>
                                    <p>Community Environment and Natural Resources Office</p>
                                    <p><b>NAUJAN LAKE NATIONAL PARK</b></p>
                                    <p>PROTECTED AREA MANAGEMENT OFFICE</p>
                                </center>
                            </span>
                            <span>
                                <center>
                                    <h4>FISHING PERMIT REGISTRATION FORM</h4>
                                    <h5><b>Fishing Permit Number: <u><?php echo $permit_num; ?></u></b></h5>
                                </center>
                            </span>
                        </div>
                        <div class="column right logo-holder">
                            <img class="logo" src="../image/pamo-logo.png" alt="">
                        </div>
                    </div>
                    <div class="row2">
                        <div class="column2 left2">
                            <h5><b>PERSONAL INFORMATION</b></h5>
                            <h5 class="info">Name: <u><?php echo $lname; ?> <?php echo $fname; ?>, <?php echo $mname; ?></u></h5>
                            <h5 class="info">Address: <u>Sitio <?php echo $sitio; ?>, Barangay <?php echo $barangay; ?>, <?php echo $municipality; ?></u></h5>
                            <?php
                            $date = $dob;
                            $newDate = date("m-d-Y", strtotime($date));
                            ?>
                            <h5 class="info">Date of Birth: <u><?php echo $newDate; ?></u></h5>
                            <h5 class="info">Age: <u><?php echo $age; ?></u></h5>
                            <h5 class="info">Sex: <u><?php echo $sex; ?></u></h5>
                            <h5 class="info">Status: <u><?php echo $status; ?></u></h5>
                            <h5 class="info">Contact No.: <u><?php echo $contact_num; ?></u></h5>
                            <h5 class="info">Religion: <u><?php echo $religion; ?></u></h5>
                            <h5 class="info">Contact Person in case of Emergency: <u><?php echo $contact_person; ?></u></h5>
                            <h5 class="info">Relationship: <u><?php echo $relationship; ?></u></h5>
                            <h5 class="info">Contact No.: <u><?php echo $contact_person_num; ?></u></h5>
                            <hr>
                            <h5><b>REGISTRATION INFORMATION</b></h5>
                            <h5 class="info">Status of Registration: <u><?php echo $reg_type; ?></u></h5>
                            <h5 class="info">Vessel Type: <u><?php echo $vessel_type; ?></u></h5>
                            <h5 class="info">Vessel Uses: <u><?php echo $vessel_use; ?></u></h5>
                            <h5 class="info">Vessel Materials: <u><?php echo $vessel_material; ?></u></h5>
                            <h5 class="info">Fishing Gears Used: <u><?php echo $fishing_gear_used; ?></u></h5>
                            <hr>
                            <h5><b>VESSEL INFORMATION</b></h5>
                            <h5><b>Vessel Dimensions</b></h5>
                            <h5 class="info">Vessel Length: <u><?php echo $vessel_length; ?></u></h5>
                            <h5 class="info">Vessel Breadth: <u><?php echo $vessel_breadth; ?></u></h5>
                            <h5 class="info">Gross Tonnage: <u><?php echo $gross_tonnage; ?></u></h5>
                            <h5 class="info">Net Tonnage: <u><?php echo $net_tonnage; ?></u></h5>
                            <br>
                            <h5><b>Engine Data</b></h5>
                            <h5 class="info">Horsepower: <u><?php echo $horsepower; ?></u></h5>
                            <h5 class="info">Speed: <u><?php echo $speed; ?></u></h5>
                            <h5 class="info">Engine Make: <u><?php echo $engine_make; ?></u></h5>
                            <h5 class="info">Serial Number: <u><?php echo $serial_num; ?></u></h5>
                            <hr>
                            <h5><b>Current Registration</b></h5>
                            <h5 class="info">Registration Date: <u><?php echo $curregdate; ?></u></h5>
                            <h5 class="info">Expiration Date: <u><?php echo $curregexp; ?></u></h5>
                            <h5 class="info">Place of Issuance: <u><?php echo $curregissuance; ?></u></h5>
                            <h5 class="info">Coastguard Registration No.: <u><?php echo $coastguardregnum; ?></u></h5>
                        </div>
                        <div class="column2 right2">
                            <div class="picture-box">
                                <span>
                                    <center>
                                        <br><br><br><br><br><br><br><br><br><br>
                                        <p>2x2 ID Picture</p>
                                    </center>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div><br>
            <center>
                <button class="btn btn-success" onclick="generatePdf()">Download PDF</button> &nbsp; <button class="btn btn-primary"><a href="../admin/adminpm.php" class="text-decoration-none text-light">Go Back</a></button>
            </center>
        </div><br>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // https://html2canvas.hertzen.com/configuration
        // https://rawgit.com/MrRio/jsPDF/master/docs/module-html.html#~html
        // https://artskydj.github.io/jsPDF/docs/jsPDF.html
        window.jsPDF = window.jspdf.jsPDF;

        function generatePdf() {
            let jsPdf = new jsPDF('p', 'pt', 'A4');
            var htmlElement = document.getElementById('doc-target');
            // you need to load html2canvas (and dompurify if you pass a string to html)
            const opt = {
                callback: function(jsPdf) {
                    jsPdf.save("fishing-permit-copy.pdf");
                    // to open the generated PDF in browser window
                    // window.open(jsPdf.output('bloburl'));
                },
                margin: [10, 10, 10, 10],
                autoPaging: 'text',
                html2canvas: {
                    allowTaint: true,
                    dpi: 300,
                    letterRendering: true,
                    logging: false,
                    scale: .53
                }
            };

            jsPdf.html(htmlElement, opt);
        }
    </script>
</body>

</html>