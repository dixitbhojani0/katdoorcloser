<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Flowtop-Gallery</title>
    <!-- include_css start -->
    <?php
        include('include_css.php');
    ?>
    <!-- include_css end -->
    <?php
      /*------condition-------*/
      $where="isDelete=0 AND isActive=1";
      /*------gallery get Data-------*/
      $gallery_r=$db->rp_getData("gallery","*",$where,"",0,9);
      /*------certificate get Data-------*/
      $certificate_r=$db->rp_getData("certificate","*",$where,"",0);
      $certificate_d = mysqli_fetch_assoc($certificate_r);
    ?>

</head>

<body>
    <!-- include_header start -->
    <?php
        include('include_header.php');
    ?>
    <!-- include_header end -->
    <!--destinations -->
    <section class="w3l-destinations-1">
        <div class="destionation-innf py-5">
            <div class="container py-lg-5">
                <div class="title-content mb-5">
                    <span class="sub-title">Find Our</span>
                    <h3 class="hny-title mb-0">Gallery</h3>
                    <p>Short Journey of Our Success..</p>
                </div>
                <!--/destinations-grids-->
                <ul class="gallery_agile">
                <?php
                    while ($gallery_d = mysqli_fetch_assoc($gallery_r)) 
                { 
                ?>
                    <li>
                        <div class="w3_agile_portfolio_grid">
                            <a href="<?= SITEURL.GALLERY.$gallery_d['image_path'];?>">
                                <img src="<?= SITEURL.GALLERY.$gallery_d['image_path'];?>" alt=" " class="img-fluid" />
                                <div class="w3layouts_news_grid_pos">
                                    <div class="wthree_text">
                                        <h3><?= html_entity_decode($gallery_d['description']) ?></h3>
                                    </div>
                                </div>
                            </a>
                            <div class="wthree_text2">
                                <h4><?= $gallery_d["title"] ?></h4>
                            </div>
                        </div>
                    </li>
                <?php
                }
                ?>

                </ul>
                <!--//destinations-grids-->
            </div>
        </div>
    </section>
    <!--//destinations -->
     <section class="w3l-grid-slider-vv">
        <div class="grid-slider py-5">
            <div class="container py-lg-5">
                <!-- /grids -->
                <div id="owl-demo3" class="owl-carousel owl-theme">
                    <?php
                    while ($certificate_d = mysqli_fetch_assoc($certificate_r)) 
                { 
                ?>
                    <div class="item">
                        <div class="content-left-sec gal-slide-grid">
                            <div class="gal-slide-img">
                                <a href="#"><img src="<?= SITEURL.certificate.$certificate_d['image_path'];?>" class="img img-fluid" alt=""></a>
                            </div>
                            <div class="gal-slide-info">    
                                <a href="#">
                                    <h4 class="mt-4 mb-0"><?= $certificate_d["title"] ?></h4>
                                </a>
                                <h6 class="mt-sm-2 mt-1"><?= html_entity_decode($certificate_d['description']) ?></h6>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                </div>
            </div>
            <!-- /grids -->
        </div>
        </div>
    </section>  
    <!--pricing-16-->
    <!-- <section class="w3l-pricing-16-main">
        <div class="pricing-content py-5">
            <div class="container py-lg-5">
                <div class="title-content mb-lg-5 mb-4">
                    <span class="sub-title">Packages</span>
                    <h3 class="hny-title">Pricing Plans</h3>
                </div>
                <div class="row w3l-pricing-7-gd-top pt-4">
                    <div class="col-lg-4 col-md-6 w3l-pricing-7-gd-left">
                        <div class="w3l-pricing-7  pric-7-1">
                            <div class="w3l-pricing-7-top">
                                <h6>Basic</h6>
                                <h3 class="title-sub"><label>$</label>100<span>/mo</span></h3>
                            </div>
                            <div class="w3l-pricing-7-bottom">
                                <div class="w3l-pricing-7-bottom-bottom">
                                    <ul class="links">
                                        <li class="tick-info">
                                            <span class="fa fa-check" aria-hidden="true"></span>Lorem ipsum
                                            dolor
                                        </li>
                                        <li class="tick-info">
                                            <span class="fa fa-check" aria-hidden="true"></span>Sit amet,
                                            consectetu
                                        </li>
                                        <li class="tick-info">
                                            <span class="fa fa-check" aria-hidden="true"></span>Unde omnis iste
                                            natus
                                        </li>
                                        <li class="tick-info disable">
                                            <span class="fa fa-times" aria-hidden="true"></span>Dolore magna
                                            aliqua
                                        </li>
                                        <li class="tick-info disable">
                                            <span class="fa fa-times" aria-hidden="true"></span>Integer et augue
                                        </li>
                                    </ul>
                                </div>
                                <div class="buy-button text-center">
                                    <div class="button-6">
                                        <div class="eff-6"></div>
                                        <a href="contact.php">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-md-0 mt-4 w3l-pricing-7-gd-left active">
                        <div class="w3l-pricing-7 pric-7">
                            <div class="w3l-pricing-7-top">
                                <h5>Popular</h5>
                                <h6>Standard</h6>
                                <h3 class="title-sub"><label>$</label>300<span>/mo</span></h3class="title-sub">
                            </div>
                            <div class="w3l-pricing-7-bottom">
                                <div class="w3l-pricing-7-bottom-bottom">
                                    <ul class="links">
                                        <li class="tick-info">
                                            <span class="fa fa-check" aria-hidden="true"></span>Lorem ipsum
                                            dolor
                                        </li>
                                        <li class="tick-info">
                                            <span class="fa fa-check" aria-hidden="true"></span>Sit amet,
                                            consectetu
                                        </li>
                                        <li class="tick-info">
                                            <span class="fa fa-check" aria-hidden="true"></span>Sed do eiusmod
                                            tempor
                                        </li>
                                        <li class="tick-info">
                                            <span class="fa fa-check" aria-hidden="true"></span>Dolore magna
                                            aliqua
                                        </li>
                                        <li class="tick-info disable">
                                            <span class="fa fa-times" aria-hidden="true"></span>Integer et augue
                                        </li>
                                    </ul>
                                </div>
                                <div class="buy-button text-center">
                                    <div class="button-6">
                                        <div class="eff-6"></div>
                                        <a href="contact.php">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-0 mt-4 w3l-pricing-7-gd-left">
                        <div class="w3l-pricing-7 pric-7-2">
                            <div class="w3l-pricing-7-top">
                                <h6>Exclusive</h6>
                                <h3 class="title-sub"><label>$</label>395<span>/mo</span></h3>
                            </div>
                            <div class="w3l-pricing-7-bottom">
                                <div class="w3l-pricing-7-bottom-bottom">
                                    <ul class="links">
                                        <li class="tick-info">
                                            <span class="fa fa-check" aria-hidden="true"></span>Ut enim ad
                                            minim
                                        </li>
                                        <li class="tick-info">
                                            <span class="fa fa-check" aria-hidden="true"></span>Quis nostrud
                                            exerc
                                        </li>
                                        <li class="tick-info">
                                            <span class="fa fa-check" aria-hidden="true"></span>Ullamco laboris
                                            nisi ut
                                        </li>
                                        <li class="tick-info">
                                            <span class="fa fa-check" aria-hidden="true"></span>Dolore magna
                                            aliqua
                                        </li>
                                        <li class="tick-info">
                                            <span class="fa fa-check" aria-hidden="true"></span>Integer et augue
                                        </li>
                                    </ul>
                                </div>
                                <div class="buy-button text-center">
                                    <div class="button-6">
                                        <div class="eff-6"></div>
                                        <a href="contact.php">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section> -->
    <!-- //pricing-16 -->

    <!-- include_footer start -->
    <?php
    include('include_footer.php');
    ?>
    <!-- include_footer end -->
</body>

</html>