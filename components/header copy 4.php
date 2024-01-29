<?php
$connection = mysqli_connect("localhost:3306", "akrami", "afghan", "sti");

if (!isset($_COOKIE['language_mode'])) {
    $lng = isset($_COOKIE['language_mode']) ? $_COOKIE['language_mode'] : setcookie('language_mode', 'en', time() + (86400 * 1), "/");
}
$lng = isset($_COOKIE['language_mode']) ? $_COOKIE['language_mode'] : setcookie('language_mode', 'en', time() + (86400 * 1), "/");
$lng == 'ps' ? include('./langs/ps.php') : '';
$lng == 'dr' ? include('./langs/dr.php') : '';
$lng == 'en' ? include('./langs/en.php') : '';


$display = 'none';
if (isset($_COOKIE['loggedIn'])) {
    $display = 'block';
}

if (isset($_COOKIE['loggedIn'])) {
    $email = $_COOKIE['loggedIn'];
    $sql = "select * from auth_users where email = '" . $email . "'";
    $data = mysqli_query($connection, $sql);
    $result = mysqli_fetch_row($data);
}

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Site keywords here">
    <meta name="description" content="">
    <meta name='copyright' content=''>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>STIC</title>

    <!-- Open Graph Meta -->
    <meta property="og:title" content="STIC">
    <meta property="og:description" content="Building the Nation with Passion">
    <meta property="og:url" content="https://stic.aogc.dev">
    <meta property="og:image" itemprop="image" content="https://stic.aogc.dev/logo/logo.png">
    <meta property="og:type" content="website">
    <meta property="og:image:type" content="image/png">
    <meta property="og:updated_time" content="1619600299" />

    <link rel="shortcut icon" href="https://stic.aogc.dev/logo/logo.png" type="image/png">


    <!-- Favicon -->
    <link rel="icon" href="img/favicon.svg">

    <!-- Google Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Nice Select CSS -->

    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="css/nunito-font.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css" />

    <link rel="stylesheet" href="css/nice-select.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- icofont CSS -->
    <link rel="stylesheet" href="css/icofont.css">
    <!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="css/owl-carousel.css">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="css/datepicker.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Medipro CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <link rel="stylesheet" href="css/refre.css">
    <link rel="stylesheet" href="css/own.css">

    <!-- Alpine JS  -->
    <script src="js/alpinejs.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="js/intlTelInput.min.js"></script>
</head>

<body>

    <!-- Preloader -->
    <!-- <div class="preloader">
        <div class="loader">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>

            <div class="indicator">
                <svg width="16px" height="12px">
                    <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                </svg>
            </div>
        </div>
    </div> -->
    <!-- End Preloader -->

    <!-- Header Area -->
    <header class="header">
        <div class="text-center p-2" style="background: #87CEEB;border-radius: 30px;margin: 5px;padding: 5px;">
            <h4 class="text-cetner" style="color: black; font-family: garamond; font-weight: 900;">
                Science,Technology, and Innovation Commission (STIC) Afghanistan
            </h4>
            <h6 style="margin-top: 5px; font-family: Calibri Light (Headings); font-style:italic;">Building the Nation with Passion</h6>
        </div>

        <div class="header-inner">
            <div class="container-fluid" style="direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>; padding-right: 50px !important">
                <div class="inner">
                    <div class="row">
                        <div id="logo_dev">
                            <div class="logo" style="margin-top: 15px !important;">
                                <a style="position:absolute; margin-right: <?php echo $lng != "en" ? '50px;' : '' ?> margin-left: 50px; margin-top: -15px" href="index.html">
                                    <img id="logo_size" src="img/logo.png" alt="#" width="100px">
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile-nav"></div>
                            <div class="main-menu">
                                <nav class="navigation">
                                    <ul class="nav menu" style="margin-top: 10px">
                                        <li style="font-family:garamond;"></li>
                                        <li id="logoLi"><img id="logo_size" src="img/logo.png" alt="#" width="70px"></li>
                                        <li style="font-family: garamond;" id="homepage_home"><a style="font-size: 16px;" class="ChangeMargin" href="/"><?php echo $home; ?></a></li>
                                        <li style="font-family:garamond; margin: 0px;">
                                            <a style="font-size: 16px;" href="#"><?php echo $about_us; ?>
                                                <i class="icofont-rounded-down"></i>
                                            </a>
                                            <ul class="dropdown">
                                                <li>
                                                    <a style="font-size:16px; font-family:garamond; text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>; " href="What_is_STI_Commission.php"><?php echo $what_is_sti_commisssion; ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a style="font-size:16px; font-family:garamond; text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>; " href="how_do_we_work.php"><?php echo $how_we_work; ?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li style="font-family:garamond; margin: 0px;">
                                            <a style="font-size:16px;" href="#"><?php echo $join_us; ?>
                                                <i class="icofont-rounded-down"></i>
                                            </a>
                                            <ul class="dropdown">
                                                <li>
                                                    <a data-bs-toggle="modal" style="font-size:16px; font-family:garamond; text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>; " data-bs-target="#staticBackdrop" href="mainform.php"><?php echo $fill_the_form; ?>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li style="font-family:garamond; margin: 0px;">
                                            <a style="font-size:16px;" href="Communities_of_Practice.php"><?php echo $commession_of_practices; ?></a>
                                        </li>
                                        <?php $display_signin = $display == 'none' ? 'block' : 'none'; ?>
                                        <li style="font-family:garamond; margin: 0px;"><a style="font-size:16px;" href="news.php"><?php echo $news_and_update; ?></a></li>
                                        <li style="font-family:garamond; margin: 0px;"><a style="font-size:16px;" href="./contact.php"><?php echo $contact_us; ?></a></li>
                                        <li style="font-family:garamond;  display: <?php echo $display_signin ?>;"><a style="font-size: 16px" href="login.php"><?php echo $sing_up_sign_in; ?></a>


                                        <li>
                                            <a href="#">
                                                <span style="font-size:16px;">
                                                    <svg width="25" height="25" viewBox="0 0 64 64" xml:space="preserve">
                                                        <path fill="none" stroke="#000" stroke-width="2" stroke-miterlimit="10" d="M32.001.887C49.185.887 63.114 14.816 63.113 32 63.114 49.185 49.184 63.115 32 63.113 14.815 63.114.887 49.185.888 32.001.885 14.816 14.815.887 32.001.887zM32 1v62m31-31H1" />
                                                        <path fill="none" stroke="#000" stroke-width="2" stroke-miterlimit="10" d="M30 1S16 12 16 32s14 31 14 31m4-62s14 11 14 31-14 31-14 31" />
                                                        <path fill="none" stroke="#000" stroke-width="2" stroke-miterlimit="10" d="M8 12s5 10 24 10 24-10 24-10M8 52s5-10 24-10 24 10 24 10" />
                                                    </svg>
                                                </span>
                                            </a>

                                            <?php
                                            $url = $_SERVER['REQUEST_URI'];
                                            $baseURL = parse_url($url, PHP_URL_PATH);
                                            ?>

                                            <ul class="dropdown" style="width: 150px; margin-top:10px">
                                                <li>
                                                    <a style="font-size: 16px" href="./backend/lang.php?lang=en&url=<?php echo $baseURL; ?>">English</a>
                                                </li>
                                                <li>
                                                    <a style="font-size: 16px" href="./backend/lang.php?lang=ps&url=<?php echo $baseURL; ?>">پښتو</a>
                                                </li>
                                                <li>
                                                    <a style="font-size: 16px" href="./backend/lang.php?lang=dr&url=<?php echo $baseURL; ?>">دری</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li style="font-family: garamond; font-weight: 900; display: <?php echo $display ?>;">
                                            <a href="#">
                                                <span style="font-size: 16px; position:relative; top: -8px; color: black; cursor: pointer">
                                                    <?php echo $result[1] ?>
                                                </span>
                                                <svg height="25" width="25" viewBox="0 0 448 512" fill="black" style="border: 2px solid black; border-radius: 50%; padding: 2px">
                                                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                                </svg>
                                            </a>
                                            <ul class="dropdown" style="width: 200px; margin-top: 8px; margin-left:20px">
                                                <li><a style="font-size: 16px" href="filled_form.php">Edit Profile</a></li>
                                                <li><a style="font-size: 16px" href="backend/logout.php">logout</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>