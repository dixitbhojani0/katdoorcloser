<?php
    include('connect.php');

    /*------condition-------*/
    $where="isDelete=0 AND isActive=1";
    /*------contact_us_info get Data-------*/
    $get_contact_r=$db->rp_getData("contact_us_info","*",$where,0);
    $get_contact_d = !empty($get_contact_r) ? mysqli_fetch_assoc($get_contact_r) : '';
?>
<header class="main-header header-style-one">
    <!--Header Top-->
    <div class="header-top">
        <div class="auto-container clearfix">
            <div class="top-left clearfix">
                <div class="text"><span class="icon flaticon-call-answer"></span> Need help? Call Us Now : <a href="tel:<?= @$get_contact_d['phone'] ?>" class="number"><?= @$get_contact_d['phone'] ?></a></div>
                
            </div>
            <div class="top-right clearfix">
                <!-- Info List -->
                <ul class="info-list">
                    <li><a href="about-us">Our Story</a></li>
                    <li class="quote"><a href="contact-us">Get Free Quote</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <!-- Header Upper -->
    <div class="header-upper">
        <div class="inner-container">
            <div class="auto-container clearfix">
                <!--Info-->
                <div class="logo-outer">
                    <div class="logo"><a href="<?= SITEURL ?>"><img src="<?= SITEURL ?>images/logo.jpg" alt="" title=""></a></div>
                </div>

                <!--Nav Box-->
                <div class="nav-outer clearfix">
                    <!--Mobile Navigation Toggler For Mobile--><div class="mobile-nav-toggler"><span class="icon flaticon-menu-1"></span></div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="navbar-header">
                            <!-- Togg le Button -->      
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon flaticon-menu-1"></span>
                            </button>
                        </div>
                        
                        <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix" id="nav">
                                <li class=""><a href="<?= SITEURL ?>">Home</a></li>
                                <li class=""><a href="<?= SITEURL ?>about-us">About us</a>
                                </li>
                                <li class=""><a href="<?= SITEURL ?>product-list">Products</a></li>
                                <li class=""><a href="<?= SITEURL ?>gallery">Gallery</a></li>
                                <li class="dropdown"><a href="javascript:void(0);">Timings</a>
                                    <ul style="text-align: center;">
                                        <li>Mon:8:00 AM-8:00 PM</li>
                                        <li>Tue:8:00 AM-8:00 PM</li>
                                        <li>Wed:Closed</li>
                                        <li>Thur:8:00 AM-8:00 PM</li>
                                        <li>Fri:8:00 AM-8:00 PM</li>
                                        <li>Sat:8:00 AM-8:00 PM</li>
                                        <li>Sun:8:00 AM-8:00 PM</li>
                                    </ul>
                                </li>
                                <li class=""><a href="<?= SITEURL ?>contact-us">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->
                </div>
            </div>
        </div>
    </div>
    <!--End Header Upper-->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon flaticon-cancel"></span></div>
        
        <nav class="menu-box">
            <div class="nav-logo"><a href="<?= SITEURL ?>"><img src="<?= SITEURL ?>images/logo.jpg" alt="" title=""></a></div>
            <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
            <!--Social Links-->
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="https://api.whatsapp.com/send?text=http://www.katdoorcloser.com" target="_blank"><span class="fab fa-whatsapp"></span></a></li>
                    <li><a href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fwww.katdoorcloser.com%2F&text=" target="_blank"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.katdoorcloser.com%2F" target="_blank"><span class="fab fa-facebook-square"></span></a></li>
                    <li><a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.katdoorcloser.com%2F&media=&description=" target="_blank"><span class="fab fa-pinterest-p"></span></a></li>
                    <li><a href="https://www.linkedin.com/cws/share?url=http-www-katdoorcloser-com" target="_blank"><span class="fab fa-linkedin"></span></a></li>
                </ul>
            </div>
        </nav>
    </div><!-- End Mobile Menu -->

</header>
<!-- End Main Header -->

