<?php
include_once('../inc/class.php');
include "../inc/conf.php";

$query = 'SELECT * FROM permit
              WHERE
              permit_id =' . $_GET['permit_id'];
$result = mysqli_query($db, $query) or die(mysqli_error($db));
while ($row = mysqli_fetch_array($result)) {
    $permit_num = $row['permit_num'];
    $lname = $row['lname'];
    $fname = $row['fname'];
    $mname = $row['mname'];
    $dob = $row['dob'];
    $sitio = $row['sitio'];
    $barangay = $row['barangay'];
    $municipality = $row['municipality'];
    $sex = $row['sex'];
    $status = $row['status'];
    $citizenship = $row['citizenship'];
    $religion = $row['religion'];
    $contact_num = $row['contact_num'];
    $contact_person = $row['contact_person'];
    $relationship = $row['relationship'];
    $contact_person_num = $row['contact_person_num'];
    $permit_status = $row['permit_status'];
}

$permit_id = $_GET['permit_id'];

$date = $dob;
$newDate = date("m-d-Y", strtotime($date));

$background_image = "naujan.png";

if ($municipality == 'Naujan') {
    $background_image = "../pamo-ids/naujan.png";
} elseif ($municipality == 'Victoria') {
    $background_image = "../pamo-ids/victoria.png";
} elseif ($municipality == 'Socorro') {
    $background_image = "../pamo-ids/socorro.png";
} else {
    $background_image = "../pamo-ids/pola.png";
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>
    <link rel="shortcut icon" href="../image/pamo-logo.png">

    <style>
        * {
            box-sizing: border-box;
        }

        .column1 {
            float: left;
            width: 50%;
            padding: 10px;
        }

        .column2 {
            float: left;
            width: 25%;
            padding: 10px;
        }

        .column3 {
            float: left;
            width: 25%;
            padding: 10px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        h1 {
            font-size: 10px;
        }

        .container {
            width: 755px;
            height: 583px;
            background-image: url(<?php echo $background_image; ?>);
            background-repeat: no-repeat;
            background-size: contain;
            margin: auto;
            box-shadow: 0 2px 13px rgb(146 161 176 / 80%);
            overflow: hidden;
            display: block;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        p {
            font-size: large;
            font-weight: bold;
        }

        .permit-num {
            margin-top: 88px;
            margin-left: 25px;
            font-size: large;
            font-weight: bold;
        }

        .lname {
            margin-top: 60px;
            margin-left: 220px;
        }

        .fname {
            margin-top: 20px;
            margin-left: 220px;
        }

        .mname {
            margin-top: 23px;
            margin-left: 220px;
        }

        .dob {
            margin-top: 43px;
            margin-left: 220px;
        }

        .address {
            margin-top: 35px;
            font-size: large;
            font-weight: bold;
        }

        .sex {
            margin-top: -4px;
            margin-left: 14px;
        }

        .citizenship {
            margin-top: 27px;
            margin-left: 14px;
        }

        .contactnum {
            margin-top: 10px;
            margin-left: 14px;
        }

        .contact_person {
            margin-top: 25px;
            margin-left: 5px;
        }

        .relationship {
            margin-top: 26px;
            margin-left: 14px;
        }

        .status {
            margin-top: -4px;
            margin-left: 14px;
        }

        .religion {
            margin-top: 27px;
            margin-left: 14px;
        }

        .contact_person_num {
            margin-top: 120px;
            margin-left: 14px;
        }


        /* CSS */
        .button-3 {
            appearance: none;
            background-color: #2ea44f;
            border: 1px solid rgba(27, 31, 35, .15);
            border-radius: 6px;
            box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-family: -apple-system, system-ui, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            font-size: 14px;
            font-weight: 600;
            line-height: 20px;
            padding: 6px 16px;
            position: relative;
            text-align: center;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: middle;
            white-space: nowrap;
        }

        .button-3:focus:not(:focus-visible):not(.focus-visible) {
            box-shadow: none;
            outline: none;
        }

        .button-3:hover {
            background-color: #2c974b;
        }

        .button-3:focus {
            box-shadow: rgba(46, 164, 79, .4) 0 0 0 3px;
            outline: none;
        }

        .button-3:disabled {
            background-color: #94d3a2;
            border-color: rgba(27, 31, 35, .1);
            color: rgba(255, 255, 255, .8);
            cursor: default;
        }

        .button-3:active {
            background-color: #298e46;
            box-shadow: rgba(20, 70, 32, .2) 0 1px 0 inset;
        }
    </style>
</head>

<body>
    <?php
    if ($permit_status == 'Pending') {
        echo
        "<script>alert('Fishing Permit Application not Approved Yet!');
        document.location.href = '../admin/adminpm.php';
        </script>
        ";
    } else {
    ?>
        <div class="row">
            <div class="col-sm-6">
                <div class="card-body">
                    <div class="container row" id="mycard">
                        <div class="column1">
                            <div class="permit-num">
                                <p>
                                    <center><?php echo $permit_num; ?></center>
                                </p>
                            </div>
                            <div class="lname">
                                <p><?php echo $lname; ?></p>
                            </div>
                            <div class="fname">
                                <p><?php echo $fname; ?></p>
                            </div>
                            <div class="mname">
                                <p><?php echo $mname; ?></p>
                            </div>
                            <div class="dob">
                                <p><?php echo $newDate; ?></p>
                            </div>
                            <div class="address">
                                <center>
                                    <p><?php echo "Sitio " . $sitio . ", " . "Brgy. " . $barangay . ", " . $municipality; ?></p>
                                </center>
                            </div>
                        </div>
                        <div class="column2">
                            <div class="sex">
                                <p><?php echo $sex; ?></p>
                            </div>
                            <div class="citizenship">
                                <p><?php echo $citizenship; ?></p>
                            </div>
                            <div class="contact_num">
                                <p><?php echo $contact_num; ?></p>
                            </div>
                            <div class="contact_person">
                                <p><?php echo $contact_person; ?></p>
                            </div>
                            <div class="relationship">
                                <p><?php echo $relationship; ?></p>
                            </div>
                        </div>
                        <div class="column3">
                            <div class="status">
                                <p><?php echo $status; ?></p>
                            </div>
                            <div class="religion">
                                <p><?php echo $religion; ?></p>
                            </div>
                            <div class="contact_person_num">
                                <p><?php echo $contact_person_num; ?></p>
                            </div>
                        </div>


                    </div>
                    <br>
                    <div>
                        <span>
                            <center>
                                <button class="button-3" role="button" id="download">Save ID</button> &nbsp;
                                <button type="submit" class="button-3" role="button" style="color:white;"><a href="../admin/adminpm.php" style="text-decoration:none; color:white;">Exit</a></button>
                            </center>
                        </span>
                    </div>
                <?php }; ?>
                </div>
            </div>

            <script>
                $("#download").on("click", function() {
                    html2canvas(document.querySelector("#mycard")).then(canvas => {
                        canvas.toBlob(function(blob) {
                            window.saveAs(blob, 'permit_id.png');
                        });
                    });
                });
            </script>

        </div>
</body>

</html>