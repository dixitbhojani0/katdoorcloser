<?php include("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Images :Chanakya Engineering Products in Rajkot</title>
    <!-- Stylesheets -->
    <link href="<?= SITEURL ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?= SITEURL ?>css/style.css" rel="stylesheet">
    <link href="<?= SITEURL ?>css/responsive.css" rel="stylesheet">
    <link href="<?= SITEURL ?>admin/css/toastr.css" rel="stylesheet">

    <link rel="shortcut icon" href="<?= SITEURL ?>images/favicon.png" type="image/x-icon">
    <link rel="icon" href="<?= SITEURL ?>images/favicon.png" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="content-language" content="en">
    <meta name="robots" content="all">
    <meta name="description" content="Image Gallery by Chanakya Engineering Products from Rajkot,India.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="free, contact, purchase, 98253 64088, reasonable rate">
    <meta name="twitter:image" content="<?= SITEURL ?>images/logo.jpg">
    <meta name="twitter:description" content="Gallery for Chanakya Engineering Products">
    <meta name="twitter:title" content="Gallery : Chanakya Engineering Products">
    <meta name="twitter:card" content="summary">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Gallery for Chanakya Engineering Products">
    <meta property="og:image" content="<?= SITEURL ?>images/logo.jpg">
    <meta property="og:site_name" content="Chanakya Engineering Products">
    <meta property="og:description" content="Gallery :Chanakya Engineering Products,We would like to introduce ourselves as a leading manufacturer of High Quality door closer, floor spring, glass door patch fittings.  Our products adhere to International Standard. CHANAKYA ENGINEERING PRODUCTS. is located in RAJKOT GUJARAT .We have been manufacturing these products since 1992. We  have created a niche for ourselves in satisfying far end Clientele with at most care. CHANAKYA ENGINEERING PRODUCTS true to its name, stands for perfection in each and every product that leaves its factory premises because ‘quality is our first priority’.">
</head>

<body>
    <div class="preloader"></div>

    <?php
     require("include/header.php");
     require("include/connect.php");
     
     /*------condition-------*/
     $where="isDelete=0 AND isActive=1";
     /*------gallery get Data-------*/
     $gallery_r=$db->rp_getData("gallery","*",$where,"",0,9);
     /*------certificate get Data-------*/
     $certificate_r=$db->rp_getData("certificate","*",$where,"",0);
     $certificate_d = mysqli_fetch_assoc($certificate_r);
   ?>


    <div class="page-wrapper">
        <!--Page Title-->
        <section class="page-title" style="background-image:url(images/background/5.jpg)">
            <div class="auto-container">
                <h2>Find Our Gallery</h2>
                <ul class="page-breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>Gallery <small>(Short Journey of Our Success..)</small></li>
                </ul>
            </div>
        </section>
        <!--End Page Title-->

        <!-- Portfolio Page Section -->
        <section class="portfolio-page-section">
            <div class="auto-container">
                <div class="filter-list row clearfix">
                    <?php
                        while ($gallery_d = mysqli_fetch_assoc($gallery_r)) 
                    { 
                    ?>
                        <!-- Gallery Item -->
                        <div class="gallery-item mix all wardrobe kitchen col-lg-3 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="<?= SITEURL.GALLERY.$gallery_d['image_path'];?>" alt="">
                                    <!--Overlay Box-->
                                    <div class="overlay-box">
                                        <div class="overlay-inner">
                                            <div class="content">   
                                                <a href="<?= SITEURL.GALLERY.$gallery_d['image_path'];?>" data-fancybox="gallery-4" data-caption="" class="link"><span class="icon flaticon-magnifying-glass-1"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    
                </div>
            </div>
        </section>
        <!-- End Story Section -->
        <!--Main Footer-->
        <?php require("include/footer.php") ?>
    </div>
    <!--End pagewrapper-->

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

    <!--Scroll to top-->
</body>

</html>