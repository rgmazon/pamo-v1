<?php
require '../inc/config.php';
$redirect_page = '../user/userdb.php';

session_start();


if (isset($_POST['submit'])) {


    // Check if the user is logged in and the user ID is stored in the session
    if (isset($_SESSION['user_id'])) {
        // Retrieve the user ID from the session
        $user_id = $_SESSION['user_id'];
    }

    $fname = $_POST['fname'];
    $fname = filter_var($fname, FILTER_SANITIZE_STRING);
    $lname = $_POST['lname'];
    $lname = filter_var($lname, FILTER_SANITIZE_STRING);
    $mname = $_POST['mname'];
    $mname = filter_var($mname, FILTER_SANITIZE_STRING);

    $sitio = $_POST['sitio'];
    $sitio = filter_var($sitio, FILTER_SANITIZE_STRING);
    $barangay = $_POST['barangay'];
    $barangay = filter_var($barangay, FILTER_SANITIZE_STRING);
    $municipality = $_POST['municipality'];
    $municipality = filter_var($municipality, FILTER_SANITIZE_STRING);

    $dob = $_POST['dob'];
    $dob = filter_var($dob, FILTER_SANITIZE_STRING);
    $age = $_POST['age'];
    $age = filter_var($age, FILTER_SANITIZE_STRING);
    $sex = $_POST['sex'];
    $sex = filter_var($sex, FILTER_SANITIZE_STRING);
    $status = $_POST['status'];
    $status = filter_var($status, FILTER_SANITIZE_STRING);

    $contact_num = $_POST['contact_num'];
    $contact_num = filter_var($contact_num, FILTER_SANITIZE_STRING);
    $religion = $_POST['religion'];
    $religion = filter_var($religion, FILTER_SANITIZE_STRING);
    $contact_person = $_POST['contact_person'];
    $contact_person = filter_var($contact_person, FILTER_SANITIZE_STRING);
    $relationship = $_POST['relationship'];
    $relationship = filter_var($relationship, FILTER_SANITIZE_STRING);
    $contact_person_num = $_POST['contact_person_num'];
    $contact_person_num = filter_var($contact_person_num, FILTER_SANITIZE_STRING);

    $reg_type = $_POST['reg_type'];
    $reg_type = filter_var($reg_type, FILTER_SANITIZE_STRING);
    $vessel_type = $_POST['vessel_type'];
    $vessel_type = filter_var($vessel_type, FILTER_SANITIZE_STRING);
    $vessel_use = $_POST['vessel_use'];
    $vessel_use = filter_var($vessel_use, FILTER_SANITIZE_STRING);

    $vessel_material = $_POST['vessel_material'];
    $vessel_material = filter_var($vessel_material, FILTER_SANITIZE_STRING);
    $fishing_gear_used = $_POST['fishing_gear_used'];
    $fishing_gear_used = filter_var($fishing_gear_used, FILTER_SANITIZE_STRING);

    $vessel_length = $_POST['vessel_length'];
    $vessel_length = filter_var($vessel_length, FILTER_SANITIZE_STRING);
    $vessel_breadth = $_POST['vessel_breadth'];
    $vessel_breadth = filter_var($vessel_breadth, FILTER_SANITIZE_STRING);
    $gross_tonnage = $_POST['gross_tonnage'];
    $gross_tonnage = filter_var($gross_tonnage, FILTER_SANITIZE_STRING);
    $net_tonnage = $_POST['net_tonnage'];
    $net_tonnage = filter_var($net_tonnage, FILTER_SANITIZE_STRING);

    $horsepower = $_POST['horsepower'];
    $horsepower = filter_var($horsepower, FILTER_SANITIZE_STRING);
    $speed = $_POST['speed'];
    $speed = filter_var($speed, FILTER_SANITIZE_STRING);
    $engine_make = $_POST['engine_make'];
    $engine_make = filter_var($engine_make, FILTER_SANITIZE_STRING);
    $serial_num = $_POST['serial_num'];
    $serial_num = filter_var($serial_num, FILTER_SANITIZE_STRING);

    $curregdate = $_POST['curregdate'];
    $curregdate = filter_var($curregdate, FILTER_SANITIZE_STRING);
    $curregexp = $_POST['curregexp'];
    $curregexp = filter_var($curregexp, FILTER_SANITIZE_STRING);
    $curregissuance = $_POST['curregissuance'];
    $curregissuance = filter_var($curregissuance, FILTER_SANITIZE_STRING);
    $coastguardregnum = $_POST['coastguardregnum'];
    $coastguardregnum = filter_var($coastguardregnum, FILTER_SANITIZE_STRING);
    $citizenship = $_POST['citizenship'];



    //$dt1 = date("Y-m-d  H:i:s");



    //$select = $conn->prepare("SELECT * FROM `user` WHERE username = ?");
    //$select->execute([$username]);


    $insert = $conn->prepare("INSERT INTO `permit`(user_id, lname, fname, mname, sitio, barangay, municipality, dob, age, sex, status, contact_num, religion, contact_person, relationship, contact_person_num, reg_type, vessel_type, vessel_use, vessel_material, fishing_gear_used, vessel_length, vessel_breadth, gross_tonnage, net_tonnage, horsepower, speed, engine_make, serial_num, curregdate, curregexp, curregissuance, coastguardregnum, citizenship) 
         VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $insert->execute([$user_id, $lname, $fname, $mname, $sitio, $barangay, $municipality, $dob, $age, $sex, $status, $contact_num, $religion, $contact_person, $relationship, $contact_person_num, $reg_type, $vessel_type, $vessel_use, $vessel_material, $fishing_gear_used, $vessel_length, $vessel_breadth, $gross_tonnage, $net_tonnage, $horsepower, $speed, $engine_make, $serial_num, $curregdate, $curregexp, $curregissuance, $coastguardregnum, $citizenship]);

    if ($insert) {
        echo "alert('Application Submitted.').<script>window.location = '$redirect_page';</script>";
    }
}
