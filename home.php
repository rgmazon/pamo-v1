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
        element.style {
            background-color: #4a9485;
            background-position: right;
        }

        #masthead {
            background: #fff;
            border-bottom: 1px solid #f2f2f2;
            padding: 0;
            padding: 0;
        }

        #masthead {
            background: #024100;
            border-bottom: 1px solid #f2f2f2;
            padding: 1.25rem 0;
        }

        .footer-clean {
            padding: 50px 0;
            background-color: #fff;
            color: #4b4c4d;
        }

        .footer-clean h3 {
            margin-top: 0;
            margin-bottom: 12px;
            font-weight: bold;
            font-size: 16px;
        }

        .footer-clean ul {
            padding: 0;
            list-style: none;
            line-height: 1.6;
            font-size: 14px;
            margin-bottom: 0;
        }

        .footer-clean ul a {
            color: inherit;
            text-decoration: none;
            opacity: 0.8;
        }

        .footer-clean ul a:hover {
            opacity: 1;
        }

        .footer-clean .item.social {
            text-align: right;
        }

        @media (max-width:767px) {
            .footer-clean .item {
                text-align: center;
                padding-bottom: 20px;
            }
        }

        @media (max-width: 768px) {
            .footer-clean .item.social {
                text-align: center;
            }
        }

        .footer-clean .item.social>a {
            font-size: 24px;
            width: 40px;
            height: 40px;
            line-height: 40px;
            display: inline-block;
            text-align: center;
            border-radius: 50%;
            border: 1px solid #ccc;
            margin-left: 10px;
            margin-top: 22px;
            color: inherit;
            opacity: 0.75;
        }

        .footer-clean .item.social>a:hover {
            opacity: 0.9;
        }

        @media (max-width:991px) {
            .footer-clean .item.social>a {
                margin-top: 40px;
            }
        }

        @media (max-width:767px) {
            .footer-clean .item.social>a {
                margin-top: 10px;
            }
        }

        .footer-clean .copyright {
            margin-top: 14px;
            margin-bottom: 0;
            font-size: 13px;
            opacity: 0.6;
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
    <div id="masthead" style="background-color:#4a9485;background-position:right;">
        <div class="time">
            <span id='ct' class="text-light"></span>
        </div><br>
        <div class="row">
            <div id="logo">
                <div class="twelve large-12 columns">
                    <img src="image/denr-logo.png" style="text-align:left; height:150px; width:150px;">&nbsp; &nbsp;
                    <img src="image/pamo-logo.png" style="text-align:left; height:150px; width:150px;">&nbsp; &nbsp;
                    <img src="image/denr-banner.jpg" style="text-align:left; height:150px;">&nbsp; &nbsp;
                </div>

            </div>
        </div><br>
        <div class="nlnp">
            <span>
                <center>
                    <h1 class="text-light"><b>Naujan Lake National Park - Protected Area Management Office</b></h1>
                </center>
            </span>
        </div>
    </div>


    <!-- carousel -->

    <div class="slideshow-container">

        <div class="mySlides fade">
            <?php
            $select_profile = $conn->prepare("SELECT * FROM settings where item_name = 'carousel1'");
            $select_profile->execute();
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="numbertext">1 / 3</div>
            <a href="">
                <img src="image/<?= $fetch_profile['setting_value']; ?>" style="width:100%">
            </a>
        </div>

        <div class="mySlides fade">
            <?php
            $select_profile = $conn->prepare("SELECT * FROM settings where item_name = 'carousel2'");
            $select_profile->execute();
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="numbertext">2 / 3</div>
            <a href="">
                <img src="image/<?= $fetch_profile['setting_value']; ?>" style="width:100%">
            </a>
        </div>

        <div class="mySlides fade">
            <?php
            $select_profile = $conn->prepare("SELECT * FROM settings where item_name = 'carousel3'");
            $select_profile->execute();
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="numbertext">3 / 3</div>
            <a href="">
                <img src="image/<?= $fetch_profile['setting_value']; ?>" style="width:100%">
            </a>
        </div>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>


    <!-- carousel end -->

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


    <!-- Footer -->
    <div class="footer-clean" style="background-color:#4a9485;background-position:right;">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Legacy</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Careers</h3>
                        <ul>
                            <li><a href="#">Job openings</a></li>
                            <li><a href="#">Employee success</a></li>
                            <li><a href="#">Benefits</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                        <p class="copyright">Company Name © 2018</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
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