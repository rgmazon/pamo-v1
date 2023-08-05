<?php
include 'inc/config.php';
session_start(); // start the session to access session variables

if (isset($_SESSION['user_id']) or isset($_SESSION['admin_id'])) { // check if the user or the admin is logged in
    // select which user is logged in
    if (isset($_SESSION['admin_id'])) {
        include 'inc/header-admin.php';
    } else {
        include 'inc/header.php';
    }
} else {
    include 'inc/header-loggedout.php';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/cards.css">
    <script src="js/carousel.js"></script>
    <script src="js/jquery-3.4.1.slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>

    <title>NLNP-PAMO | Home</title>

    <style>
        * {
            box-sizing: border-box;
        }

        /* Create three equal columns that floats next to each other */
        .column {
            float: left;
            width: 33.33%;
            padding: 10px;
            height: 300px;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
            }
        }

        .card,
        .cardlink {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 300px;
            height: 200px;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .card-container {
            padding: 2px 16px;
        }
    </style>
</head>

<body onload=display_ct();>
    <div id="masthead" style="background-position:right;">
        <div class="time">
            <span id='ct' class="text-dark"></span>
        </div><br>
    </div>

    <div class="body">
        <div class="row">
            <div class="col-md-6">
                <img src="image/denr-logo.png" style="text-align:left; height:150px; width:150px;">&nbsp; &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <img src="image/pamo-logo.png" style="text-align:left; height:150px; width:150px;">&nbsp; &nbsp;
            </div>
        </div>
    </div>

    <div class="row">
        <div class="column" style="background-color:#aaa;">
            <img src="image/denr-logo.png" style="height:150px; width:150px;">
        </div>
        <div class="column" style="background-color:#bbb; text-align:center;">
            <h2>Department of Environment and Natural Resources</h2>
            <h2>Naujan Lake National Park - Protected Area Management Office</h2>
        </div>
        <div class="column" style="background-color:#ccc;">
            <img src="image/pamo-logo.png" style="height:150px; width:150px;">
        </div>
    </div>




    <!-- services -->
    <div class="nlnp">
        <span>
            <center>
                <h1 class="text-dark"><b>Services</b></h1>
            </center>
        </span>
    </div>

    <div class="cards-list">

        <div class="card 1">
            <div class="card_image">
                <a href="user/pa-new.php" class="cardlink"><img src="image/naujanlake.jpg" />
                </a>
            </div>
            <div class="card_title title-white">
                <p>Fishing Permit</p>
            </div>
        </div>

        <div class="card 2">
            <div class="card_image">
                <a href="user/pa-new.php" class="cardlink"><img src="image/naujanlake2.jpg" />
                </a>
            </div>
            <div class="card_title title-white">
                <p>BMS</p>
            </div>
        </div>
        <div class="card 3">
            <div class="card_image">
                <a href="user/pa-new.php" class="cardlink"><img src="image/naujan-lake-national.jpg" />
                </a>
            </div>
            <div class="card_title title-white">
                <p>BMS</p>
            </div>
        </div>
        <div class="card 4">
            <div class="card_image">
                <a href="user/pa-new.php" class="cardlink"><img src="image/naujanlake3.jpg" />
                </a>
            </div>
            <div class="card_title title-white">
                <p>Fishing Permit</p>
            </div>
        </div>

    </div>
    <!-- services end -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
<script type="text/javascript">
    function display_c() {
        var refresh = 1000; // Refresh rate in milli seconds
        mytime = setTimeout('display_ct()', refresh)
    }

    function display_ct() {
        var x = new Date()
        document.getElementById('ct').innerHTML = x;
        display_c();
    }
</script>



</html>