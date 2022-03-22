<?php include("connect.php");


/*------condition-------*/
$where = "isDelete=0 AND isActive=1";
$where_p = "isDelete=0 AND display_order>0 AND isActive=1 ";

/*------For product-------*/
$product_a = $db->rp_getData("product", "*", $where_p, "display_order ASC", 0, 6);
$category_r = $db->rp_getData("category", "*", $where);
$category_id_array = $value = array();
if (!empty($category_r)) {
    $category_data = mysqli_fetch_all($category_r);
    foreach ($category_r as $key => $value) {
        $category_id_array[$value['id']] = $value['name'];
        $category_data_array[] = $value;
    }
}
$category_a = $db->rp_getData("category", "*", $where);

$about_us_r = $db->rp_getData("about_us", "*", $where, 0);
if (!empty($about_us_r)) {
    $about_us_d = mysqli_fetch_assoc($about_us_r);
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>All Products from Chanakya Engineering Products in Rajkot</title>
    <!-- Stylesheets -->
    <link href="<?= SITEURL ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?= SITEURL ?>css/style.css" rel="stylesheet">
    <link href="<?= SITEURL ?>css/responsive.css" rel="stylesheet">
    <link href="<?= SITEURL ?>admin/css/toastr.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="content-language" content="en">
    <meta name="robots" content="all">
    <meta name="description" content="Products Catalog of Chanakya Engineering Products, India - We would like to introduce ourselves as a leading manufacturer of High Quality d;">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="free, contact, purchase, 98253 64088, reasonable rate">
    <meta name="twitter:image" content="images/logo.jpg">
    <meta name="twitter:description" content="Products Catalog of Chanakya Engineering Products, India - We would like to introduce ourselves as a leading manufacturer of High Quality d;">
    <meta name="twitter:title" content="Products Catalog of Chanakya Engineering Products">
    <meta name="twitter:card" content="summary">
    <meta property="og:type" content="Chanakya Engineering Products:Products">
    <meta property="og:title" content="Products Catalog of Chanakya Engineering Products">
    <meta property="og:image" content="images/logo.jpg">
    <meta property="og:site_name" content="Chanakya Engineering Products">
    <meta property="og:description" content="Products Catalog of Chanakya Engineering Products, India - We would like to introduce ourselves as a leading manufacturer of High Quality d">
</head>

<body>
    <div class="preloader"></div>

    <?php require("include/header.php"); ?>


    <div class="page-wrapper">
        <!--Page Title-->
        <section class="page-title" style="background-image:url(images/background/5.jpg)">
            <div class="auto-container">
                <h2>Products</h2>
                <ul class="page-breadcrumb">
                    <li><a href="<?= SITEURL ?>">Home</a></li>
                    <li>Products <small>(Go Through Wide Range of Porducts)</small></li>
                </ul>
            </div>
        </section>
        <!--End Page Title-->

        <!-- Portfolio Page Section -->
        <section class="portfolio-page-section">
            <div class="auto-container">
                <!--MixitUp Galery-->
                <div class="mixitup-gallery">

                    <!--Filter-->
                    <div class="filters clearfix">

                        <ul class="filter-tabs filter-btns text-center clearfix">
                            <li class="active filter" data-role="button" data-filter="all">All Products</li>
                            <?php
                            if (!empty($category_a)) {
                                while ($category_d = mysqli_fetch_assoc($category_a)) { ?>
                                    <li class="filter" data-role="button" data-filter=".<?= str_replace(' ', '_', strtolower(@$category_d['name'])) ?>"><?= @$category_d['name'] ?></li>
                            <?php }
                            }
                            ?>
                        </ul>

                    </div>

                    <div class="filter-list row clearfix">

                        <!-- Gallery Item -->
                        <?php
                        if (!empty($product_a)) {
                            $count = 0;
                            while ($product_d = mysqli_fetch_assoc($product_a)) {
                                $count++;
                        ?>
                                <div class="gallery-item mix all wardrobe kitchen col-lg-3 col-md-6 col-sm-12 <?php echo str_replace(' ', '_', strtolower($category_id_array[$product_d['cid']])); ?>">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="<?= SITEURL . PRODUCT . $product_d['image_path'] ?>" alt="">
                                            <!--Overlay Box-->
                                            <div class="overlay-box">
                                                <div class="overlay-inner">
                                                    <div class="content">
                                                        <h3><a href="<?= SITEURL.'product-details/'.$product_d['id']?>"><?= $product_d['name']?></a></h3>
                                                        <a href="<?=SITEURL.PRODUCT.$product_d['image_path']?>" data-fancybox="gallery-4" data-caption="" class="link"><span class="icon flaticon-magnifying-glass-1"></span></a>
                                                        <a href="<?= SITEURL.'product-details/'.$product_d['id']?>" class="link"><span class="icon flaticon-unlink"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                        <?php }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Story Section -->
        <!--Main Footer-->
        <?php require("include/footer.php") ?>
    </div>
    <!--End pagewrapper-->

</body>

</html>