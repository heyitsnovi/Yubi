<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/preview/theme/academy/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Feb 2019 15:18:18 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Academy - Education Course Template</title>

    <link rel="icon" href="img/core-img/favicon.ico">

    <link rel="stylesheet" href="<?php echo base_url('academy/style.css');?>">
</head>

<body>

    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <header class="header-area">

        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <a href="index-2.html"><img style="width: 80px;" src="<?php echo base_url('academy/img/core-img/logo.png');?>" alt=""></a>
                            </div>
                            <div class="login-content">
                                <?php if(isset($_SESSION['identity'])):?>                                       
                                    <a href="<?php echo base_url('/student'); ?>">My Account</a>
                                <?php else:?>
                                <a href="<?php echo base_url('auth/login'); ?>">Login</a>
                            <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">

                    <nav class="classy-navbar justify-content-between" id="academyNav">

                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <div class="classy-menu">

                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <div class="classynav">
                                <ul>
                                    <li><a href="<?php echo base_url('/'); ?>">Home</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="index-2.html">Home</a></li>
                                            <li><a href="about-us.html">About Us</a></li>
                                            <li><a href="course.html">Course</a></li>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="elements.html">Elements</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Mega Menu</a>
                                        <div class="megamenu">
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="#">Home</a></li>
                                                <li><a href="#">Services &amp; Features</a></li>
                                                <li><a href="#">Accordions and tabs</a></li>
                                                <li><a href="#">Menu ideas</a></li>
                                                <li><a href="#">Students Gallery</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="#">Home</a></li>
                                                <li><a href="#">Services &amp; Features</a></li>
                                                <li><a href="#">Accordions and tabs</a></li>
                                                <li><a href="#">Menu ideas</a></li>
                                                <li><a href="#">Students Gallery</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="#">Home</a></li>
                                                <li><a href="#">Services &amp; Features</a></li>
                                                <li><a href="#">Accordions and tabs</a></li>
                                                <li><a href="#">Menu ideas</a></li>
                                                <li><a href="#">Students Gallery</a></li>
                                            </ul>
                                            <div class="single-mega cn-col-4">
                                                <img src="img/bg-img/bg-1.jpg" alt="">
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="course.html">Course</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>

                        </div>

                        <div class="calling-info">
                            <div class="call-center">
                                <a href="tel:+654563325568889"><i class="icon-telephone-2"></i> <span>(+65) 456 332 5568 889</span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>


    <section class="hero-area">
    <div class="hero-slides owl-carousel">

        <div class="single-hero-slide bg-img" style="background-image: url(<?php echo base_url('academy/img/bg-img/bg-1.jpg');?>)">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h4 data-animation="fadeInUp" data-delay="100ms">All the courses you need</h4>
                            <h2 data-animation="fadeInUp" data-delay="400ms">Welcome to our <br>University of Bohol - Loon</h2>
                            <a href="#" class="btn academy-btn" data-animation="fadeInUp" data-delay="700ms">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-hero-slide bg-img" style="background-image: url(<?php echo base_url('academy/img/bg-img/bg-2.jpg');?>)">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h4 data-animation="fadeInUp" data-delay="100ms">All the courses you need</h4>
                            <h2 data-animation="fadeInUp" data-delay="400ms">Wellcome to our <br>Online University</h2>
                            <a href="#" class="btn academy-btn" data-animation="fadeInUp" data-delay="700ms">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>