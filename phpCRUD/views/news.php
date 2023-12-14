<?php
include "../controller/EvenementtypeC.php";

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>event-event.tn</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.svg in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.svg">
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
                                <img src="assets/img/logo/logo.svg" alt="logo">
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
                                        <img src="assets/img/logo/logo.svg" alt="logo not found">
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
                                                        <a href="index.html">Home</a>
                                                        <ul class="submenu">
                                                            <li><a href="index.html">Home Style 01</a></li>
                                                            <li><a href="index-2.html">Home Style 02</a></li>
                                                            <li><a href="index-3.html">Home Style 03</a></li>
                                                            <li class="has-dropdown">
                                                                <a href="javascript:void(0)">RTL Demos</a>
                                                                <ul class="submenu">
                                                                    <li><a href="index-rtl.html">Home Style 01 RTL</a>
                                                                    </li>
                                                                    <li><a href="index-2-rtl.html">Home Style 02 RTL</a>
                                                                    </li>
                                                                    <li><a href="index-3-rtl.html">Home Style 03 RTL</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="about.html">About us</a>
                                                    </li>
                                                    <li>
                                                        <a href="work-system.html">How It Works</a>
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
                                                                    <li><a href="news.html">events</a></li>
                                                                    <li><a href="news-details.html">eventsdetails</a>
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
                                                        <a href="news.html">events</a>
                                                        <ul class="submenu">
                                                            <li><a href="news.html">events</a></li>
                                                            <li><a href="news-details.html">eventsdetails</a></li>
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
    </header>
    <!-- Header area end -->

    <div class="ms-all-content ms-all-content-space">
        <main>
            <!-- page title area start  -->
            <section class="page-title-area page-title-spacing p-relative zindex-1 "
                data-background="assets/img/bg/work-bg.jpg">
                <div class="ms-overlay ms-overlay9 p-absolute zindex--1"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xxl-11">
                            <h3 class="ms-page-title text-center">dom-tech events</h3>
                        </div>
                    </div>
                </div>
            </section>
            <!-- page title area end  -->

            <!-- News Area Start Here  -->
            <section class="ms-news-area pt-130">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-12">
                            <div class="ms-news-wrap mb-70">
                                <article>
                                    <div class="ms-news-box mb-25">
                                        <div class="ms-news-img m-img fix ms-br-15 mb-30">
                                            <a href="news-details.html"><img src="assets/img/news/news-06.jpg"
                                                    alt="news images"></a>
                                            <span class="ms-news-cat"><a href="news-details.html">evenements fin d'année</a></span>
                                        </div>
                                        <div class="ms-news-content">
                                            <div class="ms-news-meta-wrap mb-20">
                                                <span class="ms-news-by">By :</span>
                                                <div class="ms-news-meta d-inline-block">
                                                    <span><a href="news-details.html">Dom-Tech</a></span>
                                                    <span>01/01/2023
                                                    </span>
                                                    <span><a href="news-details.html"> 10Comments</a></span>
                                                </div>
                                            </div>
                                            <h3 class="ms-news-title2 mb-30"><a href="news-details.html">Dom-Tech annoce qu'il y a un evenement fin d'année nous espirons qu'il vous plait</a></h3>
                                            <p class="mb-45"></p>
                                            <div class="ms-news-btn">
                                                <a class="ms-border-btn" href="news-details.html">Continuer
                                                    à lire </a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article>
                                    <div class="ms-news-box mb-25">
                                        <div class="ms-news-img m-img fix ms-br-15 mb-30">
                                            <a href="news-details.html"><img src="assets/img/news/news-04.jpg"
                                                    alt="news images"></a>
                                            <span class="ms-news-cat"><a href="news-details.html">Festivals de Musique</a></span>
                                        </div>
                                        <div class="ms-news-content">
                                            <div class="ms-news-meta-wrap mb-20">
                                                <span class="ms-news-by">By :</span>
                                                <div class="ms-news-meta d-inline-block">
                                                    <span><a href="news-details.html">Dom-Tech</a></span>
                                                    <span>Mar 15, 2023</span>
                                                    <span><a href="news-details.html">10 Comments</a></span>
                                                </div>
                                            </div>
                                            <h3 class="ms-news-title2 mb-30"><a href="news-details.html">Dom-Tech vous 
                                                  annonce qu'il y a un festival du musique  </a></h3>
                                            <p class="mb-45">
                                                Des événements où les élèves peuvent se produire et montrer leurs talents musicaux dans un cadre plus décontracté.
                                                </p>
                                            <div class="ms-news-btn">
                                                <a class="ms-border-btn" href="news-details.html">Continuer
                                                    à lire</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article>
                                    <div class="ms-news-box mb-25">
                                        <div class="ms-news-img m-img fix ms-br-15 mb-30">
                                            <a href="news-details.html">
                                                <img src="assets/img/news/news-05.jpg" alt="news images">
                                            </a>
                                            <span class="ms-news-cat"><a href="news-details.html">Journées portes ouvertes
                                                    </a></span>
                                            <a class="popup-video ms-news-video"
                                                href="https://www.youtube.com/watch?v=Rf9flQISwok"><i
                                                    class="fa-sharp fa-solid fa-play"></i></a>
                                        </div>
                                        <div class="ms-news-content">
                                            <div class="ms-news-meta-wrap mb-20">
                                                <span class="ms-news-by">By :</span>
                                                <div class="ms-news-meta d-inline-block">
                                                    <span><a href="news-details.html">Dom-Tech</a></span>
                                                    <span>Mar 15, 2023</span>
                                                    <span><a href="news-details.html">10 Comments</a></span>
                                                </div>
                                            </div>
                                            <h3 class="ms-news-title2 mb-30"><a href="news-details.html">Dom-Tech vous 
                                                annonce qu'il y a un festival du musique  
                                                </a></h3>
                                            <p class="mb-45"> Des journées où le conservatoire ouvre ses portes au public pour présenter ses installations, ses programmes et ses élèves.</p>
                                            <div class="ms-news-btn">
                                                <a class="ms-border-btn" href="news-details.html">Continuer
                                                    à lire</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article>
                                    <div class="ms-news-box mb-25">
                                        <div class="ms-news-img m-img fix ms-br-15 mb-30">
                                            <a href="news-details.html"><img src="assets/img/banner/title-bg.jpg"
                                                    alt="news images"></a>
                                            <span class="ms-news-cat"><a href="news-details.html">Concerts de Gala
                                                    </a></span>
                                        </div>
                                        <div class="ms-news-content">
                                            <div class="ms-news-meta-wrap mb-20">
                                                <span class="ms-news-by">By :</span>
                                                <div class="ms-news-meta d-inline-block">
                                                    <span><a href="news-details.html">Dom-Tech</a></span>
                                                    <span>Mar 15, 2023</span>
                                                    <span><a href="news-details.html">10 Comments</a></span>
                                                </div>
                                            </div>
                                            <h3 class="ms-news-title2 mb-30"><a href="news-details.html">Dom-Tech vous 
                                                annonce qu'il y a un Concerts de Gala</a></h3>
                                            <p class="mb-45">Des concerts formels mettant en vedette les élèves les plus talentueux du conservatoire, ainsi que les professeurs, pour présenter des performances exceptionnelles..</p>
                                            <div class="ms-news-btn">
                                                <a class="ms-border-btn" href="news-details.html">Continer à lire
                                                    </a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-8">
                            <div class="ms-news-sidebar mb-70">
                                <div class="ms-news-widget">
                                    <div class="ms-input2-box p-relative">
                                        <input type="text" placeholder="Search Here . . .">
                                        <button class="ms-input2-search" type="submit"><i
                                                class="flaticon-loupe"></i></button>
                                    </div>
                                </div>
                                <div class="ms-news-widget">
                                    <h3 class="ms-news-widget-title">Categories</h3>
                                    <ul>
                                        <li><a href="news-details.html">Alternative Musique</a></li>
                                    
                                        <li><a href="news-details.html">musique classique</a></li>
                                        <li><a href="news-details.html">Dance Musique</a></li>
                                        
                                        <li><a href="news-details.html">musique electronique</a></li>
                                        <li><a href="news-details.html">musique europienne (Folk/Pop)</a></li>
          <?php
            $query = "SELECT type FROM event_type ";
            foreach ($query as $type) {
                echo $type['type'] ;
                }
        ?>


         
                                    </ul>
                                </div>
                                <div class="ms-news-widget">
                                    <h3 class="ms-news-widget-title">Recent Post</h3>
                                    <div class="ms-news-widget-content">
                                        <div class="rc-post">
                                            <div class="d-flex">
                                                <div class="rc-thumb mr-20">
                                                    <a href="news-details.html">
                                                        <img src="assets/img/news/news-rc-01.jpg" alt="news rc image">
                                                    </a>
                                                </div>
                                                <div class="rc-text widget-post-body">
                                                    <div class="rc-meta widget-post-meta"> lundi 16, 2021
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rc-post">
                                            <div class="d-flex">
                                                <div class="rc-thumb mr-20">
                                                    <a href="news-details.html">
                                                        <img src="assets/img/news/news-rc-02.jpg" alt="news rc image">
                                                    </a>
                                                </div>
                                                <div class="rc-text widget-post-body">
                                                    <div class="rc-meta widget-post-meta"> mer15, 2022
                                                    </div>
                                                    <h6 class="widget-post-title"><a href="news-details.html">compétitions du musique </a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rc-post">
                                            <div class="d-flex">
                                                <div class="rc-thumb mr-20">
                                                    <a href="news-details.html">
                                                        <img src="assets/img/news/news-rc-03.jpg" alt="news rc image">
                                                    </a>
                                                </div>
                                                <div class="rc-text widget-post-body">
                                                    <div class="rc-meta widget-post-meta"> Mar 14, 2021
                                                    </div>
                                                    <h6 class="widget-post-title"><a href="news-details.html">Tournées musicales
                                                        </a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rc-post">
                                            <div class="d-flex">
                                                <div class="rc-thumb mr-20">
                                                    <a href="news-details.html">
                                                        <img src="assets/img/news/news-rc-04.jpg" alt="news rc image">
                                                    </a>
                                                </div>
                                                <div class="rc-text widget-post-body">
                                                    <div class="rc-meta widget-post-meta"> Mar 18, 2022
                                                    </div>
                                                    <h6 class="widget-post-title"><a href="news-details.html">Concerts de Gala
                                                            </a></h6>
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
            <!-- News Area End Here  -->

            <!-- Partner Area Start Here  -->
            <div class="ms-partner-area fix pb-130">
                <div class="container">
                    <div class="ms-border5 pt-130">
                        <div class="swiper-container ms-partner-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="assets/img/partner/partner-01.png" alt="partner image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/img/partner/partner-02.png" alt="partner image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/img/partner/partner-03.png" alt="partner image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/img/partner/partner-04.png" alt="partner image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/img/partner/partner-05.png" alt="partner image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/img/partner/partner-04.png" alt="partner image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/img/partner/partner-01.png" alt="partner image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/img/partner/partner-02.png" alt="partner image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/img/partner/partner-03.png" alt="partner image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/img/partner/partner-04.png" alt="partner image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/img/partner/partner-05.png" alt="partner image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/img/partner/partner-04.png" alt="partner image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Partner Area End Here  -->

        </main>
        <!-- Footer Area Start Here  -->
        <footer>
            <div class="ms-footer3-wrap include__bg zindex-1 p-relative" data-background="assets/img/bg/footer-bg.png">
                <div class="ms-overlay ms-overlay5 p-absolute zindex--1"></div>
                <div class="ms-footer3-top pt-130">
                    <div class="container">
                        <div class="ms-border2">
                            <div class="ms-footer2-logo mb-130 mx-auto">
                                <a href="index.html"><img src="assets/img/logo/footer3-logo.png" alt="footer logo"></a>
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
                                
                               
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </footer>
        <!-- Footer Area End Here  -->
    </div>

    <!-- Back to top start -->
 
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