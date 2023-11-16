<?php

include '../Controller/UserC.php';
include '../model/User.php';

$error = "";

// create client
$user = null;

// create an instance of the controller
$userC = new UserC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["tel"]) &&
    isset($_POST["types"]) 
   
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["tel"]) &&
        !empty($_POST["types"]) 
       
    ) {
        $user = new User(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['tel'],
            $_POST['types'],
           
        );
        $userC->addUser($user);
        header('Location:listUsers.php');
    } else
        $error = "Missing information";
}




?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User </title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Musicly - Music Bands and Musicians HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.svg in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- CSS here -->
    <link rel="stylesheet" href="assets/app/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/app/css/meanmenu.min.css">
    <link rel="stylesheet" href="assets/app/css/nice-select.css">
    <link rel="stylesheet" href="assets/app/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/app/css/slick.css">
    <link rel="stylesheet" href="assets/app/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/app/css/backtotop.css">
    <link rel="stylesheet" href="assets/app/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/app/css/flaticon_musicly.css">
    <link rel="stylesheet" href="assets/app/css/fontawesome-pro.css">
    <link rel="stylesheet" href="assets/app/css/spacing.css">
    <link rel="stylesheet" href="assets/app/css/main.css">
</head>

<body>

    <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->

    <div class="mouseCursor cursor-outer"></div>
    <div class="mouseCursor cursor-inner"><span>Drag</span></div>

    <!-- Preloader start -->
    <div id="preloader">
        <div class="line-loader">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>
    <!-- preloader end -->

    <!-- Offcanvas area start -->
    <div class="fix">
        <div class="offcanvas__info">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="index.html">
                                <img src="logo.png" alt="logo">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                                <i class="fal fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="offcanvas__user mb-30 d-xxl-none">
                        <div class="user__acount">
                            <span>
                                <a href="javascript:void(0)"><i class="flaticon-user"></i></a>
                            </span>
                            <div class="user__name-mail">
                                <h4 class="user__name"><a href="javascript:void(0)">Johnson</a></h4>
                                <p class="user__mail">johnson@webmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas__search mb-30">
                        <form action="#">
                            <input type="text" placeholder="Search Here">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                    <div class="hr-1 mt-30 mb-30 d-xl-none"></div>
                    <div class="mobile-menu fix mb-30  d-xl-none"></div>
                    <div class="hr-1 mt-30 mb-30 d-xl-none"></div>
                    <div class="offcanvas__btn mb-30">
                        <a class="ms-border-btn" href="services.html"><i class="fa-solid fa-plus"></i> List Your
                            Service</a>
                    </div>
                    <div class="offcanvas__social">
                        <div class="ms-footer-social mb-0">
                            <a href="https://www.linkedin.com/" title="Instagram" target="_blank">IN</a>
                            <a href="https://twitter.com/" title="Twitter" target="_blank">TW</a>
                            <a href="https://www.facebook.com/" title="Facebook" target="_blank">FB</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas__overlay"></div>
    <div class="offcanvas__overlay-white"></div>
    <!-- Offcanvas area start -->

    <!-- Header area start -->
    <header>
        <div id="header-sticky" class="header__area header-1 ms-header-fixed ms-bg-body">
            <div class="container-fluid ms-maw-1710">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mega__menu-wrapper p-relative">
                            <div class="header__main d-flex align-items-center justify-content-between">
                                <div class="header__logo pt-25 pb-25">
                                    <a href="index.html">
                                        <img src="logo1.png" alt="logo not found">
                                    </a>
                                </div>
                                <div class="d-none d-xxl-block">
                                    <div class="browse-filter p-relative ms-browse-act-wrap">
                                        <div class="ms-browse-icon ms-cp">
                                            <a class="browse-filter__text" href="javascript:void(0)"><i
                                                    class="flaticon-options-lines"></i>
                                                Browse Acts</a>
                                        </div>
                                        <div class="ms-browse-act-item-wrap p-absolute">
                                            <div class="ms-song-item">
                                                <div class="ms-song-img p-relative">
                                                    <a href="genres.html"><img src="assets/img/genres/genres-01.jpg"
                                                            alt="brand-song"></a>
                                                </div>
                                                <div class="ms-song-content">
                                                    <h3 class="ms-song-title"><a href="genres.html">The Different
                                                            Lights</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="ms-song-item">
                                                <div class="ms-song-img p-relative">
                                                    <a href="genres.html"><img src="assets/img/genres/genres-02.jpg"
                                                            alt="brand-song"></a>
                                                </div>
                                                <div class="ms-song-content">
                                                    <h3 class="ms-song-title"><a href="genres.html">The Sweet
                                                            lockdown</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="ms-song-item">
                                                <div class="ms-song-img p-relative">
                                                    <a href="genres.html"><img src="assets/img/genres/genres-03.jpg"
                                                            alt="brand-song"></a>
                                                </div>
                                                <div class="ms-song-content">
                                                    <h3 class="ms-song-title"><a href="genres.html">The Sonics
                                                            Corporate
                                                            Band</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="ms-song-item">
                                                <div class="ms-song-img p-relative">
                                                    <a href="genres.html"><img src="assets/img/genres/genres-04.jpg"
                                                            alt="brand-song"></a>
                                                </div>
                                                <div class="ms-song-content">
                                                    <h3 class="ms-song-title"><a href="genres.html">The
                                                            Northern
                                                            Lights</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="ms-song-item">
                                                <div class="ms-song-img p-relative">
                                                    <a href="genres.html"><img src="assets/img/genres/genres-05.jpg"
                                                            alt="brand-song"></a>
                                                </div>
                                                <div class="ms-song-content">
                                                    <h3 class="ms-song-title"><a href="genres.html">The Sweet The
                                                            Jets</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="header__right">
                                    <div class="mean__menu-wrapper">
                                        <div class="main-menu main-menu-ff-space">
                                            <nav id="mobile-menu">
                                                <ul>
                                                    <li class="has-dropdown">
                                                        <a href="index-3.html">Aceuil</a>
                                                       
                                                    </li>
                                                    <li>
                                                        <a href="about.html">Professeurs</a>
                                                    </li>
                                                    <li>
                                                        <a href="work-system.html">Cours</a>
                                                    </li>
                                                    <li class="has-dropdown has-mega-menu">
                                                        <a href="javascript:void(0)">Pages</a>
                                                        <ul class="mega-menu">
                                                            <li>
                                                                <a href="javasript:void(0);"
                                                                    class="mega-menu-title">Page
                                                                    Layout
                                                                    1</a>
                                                                <ul>
                                                                    <li><a href="index.html">Home Style 01</a></li>
                                                                    <li><a href="index-2.html">Home Style 02</a></li>
                                                                    <li><a href="index-3.html">Home Style 03</a></li>
                                                                    <li><a href="index-rtl.html">Home Style 01 RTL</a>
                                                                    </li>
                                                                    <li><a href="index-2-rtl.html">Home Style 02 RTL</a>
                                                                    </li>
                                                                    <li><a href="index-3-rtl.html">Home Style 03 RTL</a>
                                                                    </li>
                                                                    <li><a href="about.html">About</a></li>

                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javasript:void(0);"
                                                                    class="mega-menu-title">Page
                                                                    Layout
                                                                    2</a>
                                                                <ul>
                                                                    <li><a href="genres.html">genres</a></li>
                                                                    <li><a href="genres-details.html">genres details</a>
                                                                    </li>
                                                                    <li><a href="team.html">Team</a></li>
                                                                    <li><a href="team-details.html">team details</a>
                                                                    </li>
                                                                    <li><a href="enquiry-list.html">enquiry list</a>
                                                                    </li>
                                                                    <li><a href="work-system.html">how it works</a></li>
                                                                    <li><a href="faq.html">FAQ</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javasript:void(0);"
                                                                    class="mega-menu-title">Page
                                                                    Layout
                                                                    3</a>
                                                                <ul>
                                                                    <li><a href="event.html">event</a></li>
                                                                    <li><a href="event-details.html">event details</a>
                                                                    </li>
                                                                    <li><a href="ideas-advice.html">ideas advice</a>
                                                                    </li>
                                                                    <li><a href="ideas-advice-details.html">ideas advice
                                                                            details</a></li>
                                                                    <li><a href="news.html">blog</a></li>
                                                                    <li><a href="news-details.html">blog details</a>
                                                                    </li>
                                                                    <li><a href="join.html">Join Us</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="javasript:void(0);"
                                                                    class="mega-menu-title">Page
                                                                    Layout
                                                                    4</a>
                                                                <ul>
                                                                    <li><a href="shop.html">Shop</a></li>
                                                                    <li><a href="shop-details.html">Shop
                                                                            Details</a></li>
                                                                    <li><a href="cart.html">cart</a></li>
                                                                    <li><a href="wishlist.html">wishlist</a></li>
                                                                    <li><a href="login.html">Login</a></li>
                                                                    <li><a href="signup.html">Register</a></li>
                                                                    <li><a href="contact.html">contact</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="has-dropdown">
                                                        <a href="news.html">Rendez-vous</a>
                                                        <ul class="submenu">
                                                            <li><a href="news.html">Blog</a></li>
                                                            <li><a href="news-details.html">Blog details</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="contact.html"> Help Center</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                            <!-- for wp -->
                                            <div class="header__hamburger ml-50 d-none">
                                                <button type="button" class="hamburger-btn offcanvas-open-btn">
                                                    <span>01</span>
                                                    <span>01</span>
                                                    <span>01</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="header__action-inner d-flex align-items-center">
                                        <div class="enquiry__list ml-10 mr-10 ms-browse-act-wrap p-relative">
                                            <div class="ms-enquiry-box p-relative d-none d-xl-inline-flex">
                                                <a href="#"><i class="flaticon-star icon"></i> <span class="text">My
                                                        enquiry list</span> <span class="number">03</span></a>
                                            </div>
                                            <div class="ms-browse-act-item-wrap p-absolute">
                                                <div class="ms-song-item">
                                                    <div class="ms-song-img p-relative">
                                                        <a href="genres.html"><img src="assets/img/genres/genres-03.jpg"
                                                                alt="brand-song"></a>
                                                    </div>
                                                    <div class="ms-song-content">
                                                        <h3 class="ms-song-title"><a href="genres.html">The
                                                                Sonics
                                                                Corporate
                                                                Band</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="ms-song-item">
                                                    <div class="ms-song-img p-relative">
                                                        <a href="genres.html"><img src="assets/img/genres/genres-04.jpg"
                                                                alt="brand-song"></a>
                                                    </div>
                                                    <div class="ms-song-content">
                                                        <h3 class="ms-song-title"><a href="genres.html">The
                                                                Northern
                                                                Lights</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="ms-song-item">
                                                    <div class="ms-song-img p-relative">
                                                        <a href="genres.html"><img src="assets/img/genres/genres-05.jpg"
                                                                alt="brand-song"></a>
                                                    </div>
                                                    <div class="ms-song-content">
                                                        <h3 class="ms-song-title"><a href="genres.html">The
                                                                Sweet
                                                                The
                                                                Jets</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="header__btn">
                                            <a href="join.html" class="ms-border-btn"><i
                                                    class="fa-regular fa-plus"></i>List
                                                Your Service</a>
                                        </div>
                                        <div class="user__acount d-none d-xxl-inline-flex">
                                            <span>
                                                <a href="login.html"><i class="flaticon-user"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="header__hamburger">
                                        <div class="sidebar__toggle">
                                            <a class="bar-icon" href="javascript:void(0)">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</head>

<body>

    <div class="container mt-200">
    <a href="listUsers.php">Back to list </a>
    <hr>
    
                <div class="ms-overlay ms-overlay9 p-absolute zindex--1"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xxl-11">
                            <h3 class="ms-page-title text-center">Bienvenue</h3>
                        </div>
                    </div>
                </div>
    <h3 class="ms-title4 mb-50">Login</h3>
    
    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="prenom">Prenom :</label></td>
                <td>
                    <input type="text" id="prenom" name="prenom" />
                    <span id="erreurPrenom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email :</label></td>
                <td>
                    <input type="text" id="email" name="email" />
                    <span id="erreurEmail" style="color: red"></span>
                </td>
            </tr>

            <tr>
                <td><label for="tel">Tel :</label></td>
                <td>
                    <input type="text" id="tel" name="tel" />
                    <span id="erreurTel" style="color: red"></span>
                </td>
            </tr>

            <tr>
                <td><label for="types">Types :</label></td>
                <td>
                    <input type="text" id="types" name="types" />
                    <span id="erreurTypes" style="color: red"></span>
                    
                </td>
            </tr>
           


            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
            
        </table>

                                <div class="ms-not-account mb-35">
                                    <p>Don’t have an account? <a href="signup.html">Register Now</a></p>
                                </div>
    </form>
    <?php include 'footer.php'; ?>  
    <div class="ms-footer3-wrap include__bg zindex-1 p-relative" data-background="back.jpeg">
                <div class="ms-overlay ms-overlay5 p-absolute zindex--1"></div>
                <div class="ms-footer3-top pt-130">
                    <div class="container">
                        <div class="ms-border2">
                            <div class="ms-footer2-logo mb-130 mx-auto">
                                <a href="index.html"><img src="logo1.png" alt="footer logo"></a>
                            </div>
                            <div class=" ms-footer2-top-inner ms-border1 ms-br-100 ms-bg-4 mb-65">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="ms-footer2-rating three mb-10">
                                            <h3>Excellent : 1050 Review On <a href="#"><img
                                                        src="assets/img/footer/start-01.png" alt="footer image"></a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="ms-subscribe2-form p-relative mb-10 d-none d-sm-block">
                                            <i class="flaticon-mail"></i>
                                            <input type="text" placeholder="Enter your mail">
                                            <button type="submit" class="ms-subscribe2-btn">Subscribe Now <i
                                                    class="fa-sharp fa-solid fa-paper-plane"></i></button>
                                        </div>

                                        <div class="ms-subscribe2-mobile p-relative mb-10 d-sm-none">
                                            <i class="flaticon-mail"></i>
                                            <input type="text" placeholder="Enter your mail">
                                            <button type="submit" class="ms-subscribe2-m-btn">Subscribe Now <i
                                                    class="fa-sharp fa-solid fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-15">
                                <div class="col-xxl-4 col-lg-5 col-md-6">
                                    <div class="ms-footer2-widget mb-50 pr-20">
                                        <h3 class="ms-footer2-title">Get in touch</h3>
                                        <div class="ms-footer2-contact border-0 pb-40">
                                            <ul>
                                                <li><i class="flaticon-pin"></i><a href="#">Ariana Soghra</a></li>
                                                <li><i class="flaticon-phone-call"></i><a href="tel:03332920560">+2160333
                                                        292
                                                        0560</a></li>
                                                <li><i class="flaticon-mail"></i><a
                                                        href="mailto:info@musiclycontact.com">info@DOM-TECHcontact.com</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="ms-footer-social mb-15">
                                            <a href="https://www.instagram.com/" title="Instagram"
                                                target="_blank">IN</a>
                                            <a href="https://twitter.com/" title="Twitter" target="_blank">TW</a>
                                            <a href="https://www.facebook.com/" title="Facebook" target="_blank">FB</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-lg-3 col-md-6">
                                    <div class="ms-footer2-widget ms-footer2-widget2 mb-50">
                                        <h3 class="ms-footer2-title">Company</h3>
                                        <ul>
                                            <li><a href="about.html">About us</a></li>
                                            <li><a href="contact.html">Contact us</a></li>
                                            <li><a href="contact.html">Terms & Policy</a></li>
                                            <li><a href="contact.html">Help & Support</a></li>
                                            <li><a href="#">Press</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-lg-3 col-md-6">
                                    <div class="ms-footer2-widget mb-50">
                                        <h3 class="ms-footer2-title">Local Band Group</h3>
                                        <ul>
                                            <li><a href="#">The Tricks</a></li>
                                            <li><a href="#">Sound City</a></li>
                                            <li><a href="#">Big Teaser</a></li>
                                            <li><a href="#">The New Tones</a></li>
                                            <li><a href="#">Halos Music</a></li>
                                            <li><a href="#">Soho Soul</a></li>
                                            <li><a href="#">Atlantic</a></li>
                                            <li><a href="#">The Fiction</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-lg-3 col-md-6">
                                    <div class="ms-footer2-widget mb-50">
                                        <h3 class="ms-footer2-title">Trending Genres</h3>
                                        <ul>
                                            <li><a href="genres-details.html">Wedding Bands</a></li>
                                            <li><a href="genres-details.html">Jazz & Swing</a></li>
                                            <li><a href="genres-details.html">Musician</a></li>
                                            <li><a href="genres-details.html">Classical Musician</a></li>
                                            <li><a href="genres-details.html">Corporate Party</a></li>
                                            <li><a href="genres-details.html">Premiere Party Band</a></li>
                                            <li><a href="genres-details.html">DJ Songs</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-lg-3 col-md-6">
                                    <div class="ms-footer2-widget mb-50">
                                        <h3 class="ms-footer2-title">Country We Serve</h3>
                                        <ul>
                                            <li><a href="#">United State</a></li>
                                            <li><a href="#">Canada</a></li>
                                            <li><a href="#">Australia</a></li>
                                            <li><a href="#">China</a></li>
                                            <li><a href="#">South Korea</a></li>
                                            <li><a href="#">Japan</a></li>
                                            <li><a href="#">Singapore</a></li>
                                            <li><a href="#">Hong Kong</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ms-footer-bottom">
                    <div class="container">
                        <div class="ms-footer-bottom-wrap text-center pt-35 pb-20">
                            <div class="ms-footer-copy">
                                <p>© DOM-TECH 2023, All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Area End Here  -->
    </div>

    <!-- Back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Back to top end -->

    <!-- JS here -->
    <script src="assets/app/js/jquery-3.6.0.min.js"></script>
    <script src="assets/app/js/waypoints.min.js"></script>
    <script src="assets/app/js/bootstrap.bundle.min.js"></script>
    <script src="assets/app/js/nice-select.min.js"></script>
    <script src="assets/app/js/meanmenu.min.js"></script>
    <script src="assets/app/js/swiper-bundle.min.js"></script>
    <script src="assets/app/js/slick.min.js"></script>
    <script src="assets/app/js/magnific-popup.min.js"></script>
    <script src="assets/app/js/backtotop.js"></script>
    <script src="assets/app/js/ajax-form.js"></script>
    <script src="assets/app/js/jquery-ui.min.js"></script>
    <script src="assets/app/js/gsap.min.js"></script>
    <script src="assets/app/js/ScrollToPlugin.min.js"></script>
    <script src="assets/app/js/SplitText.min.js"></script>
    <script src="assets/app/js/ScrollTrigger.min.js"></script>
    <script src="assets/app/js/jquery.jplayer.min.js"></script>
    <script src="assets/app/js/jplayer.playlist.js"></script>
    <script src="assets/app/js/settings.js"></script>
    <script src="assets/app/js/main.js"></script>
</body>

</html>