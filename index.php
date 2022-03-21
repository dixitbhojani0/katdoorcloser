<?php include("connect.php"); 

	/*------condition-------*/
    $where ="isDelete=0 AND isActive=1";
    $where_p ="isDelete=0 AND display_order>0 AND isActive=1 ";
	/*------banner get Data-------*/
    $banner_r = $db->rp_getData("banner","*",$where,"display_order ASC",0);
    
    $product_a =$db->rp_getData("product","*",$where_p,"display_order ASC",0,6); 
    $category_r = $db->rp_getData("category", "*", $where);
    $category_id_array = $value = array();
    if(!empty($category_r)) {
    	$category_data = mysqli_fetch_all($category_r);
    	foreach ($category_r as $key => $value) {
			$category_id_array[$value['id']] = $value['name']; 	
			$category_data_array[] = $value;
    	}
    }
    $category_a = $db->rp_getData("category", "*", $where);

	$about_us_r=$db->rp_getData("about_us","*",$where,0);
	if(!empty($about_us_r)) {
		$about_us_d = mysqli_fetch_assoc($about_us_r);
	}

	/*------our team get Data-------*/
	$our_team_r=$db->rp_getData("our_team","*",$where,"",0,4);
	/*------our service get Data-------*/
	$services = array(
		array(@$about_us_d['our_service_1_title'] => @$about_us_d['our_service_1_desc']),
		array(@$about_us_d['our_service_2_title'] => @$about_us_d['our_service_2_desc']),
		array(@$about_us_d['our_service_3_title'] => @$about_us_d['our_service_3_desc']),
		array(@$about_us_d['our_service_4_title'] => @$about_us_d['our_service_4_desc']),
		array(@$about_us_d['our_service_5_title'] => @$about_us_d['our_service_5_desc']),
		array(@$about_us_d['our_service_6_title'] => @$about_us_d['our_service_6_desc']),
	); 
	$testimony_r=$db->rp_getData("testimony","*", $where,"",0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Chanakya Engineering Products | We would like to introduce ourselves as a leading manufacturer of High Quality door closer, floor spring, glass door patch fittings. Our products adhere to In</title>
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
	<meta name="description" content="Chanakya Engineering Products - We would like to introduce ourselves as a leading manufacturer of High Quality door closer, floor spring, glass door patch fittings. Our products adhere to In.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="free, contact, purchase, 98253 64088, reasonable rate">
	<meta name="twitter:image" content="<?= SITEURL ?>images/logo.jpg">
	<meta name="twitter:description" content="Chanakya Engineering Products - We would like to introduce ourselves as a leading manufacturer of High Quality door closer, floor spring, glass door patch fittings. Our products adhere to In.">
	<meta name="twitter:title" content="Chanakya Engineering Products">
	<meta name="twitter:card" content="summary">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Chanakya Engineering Products">
	<meta property="og:image" content="<?= SITEURL ?>images/logo.jpg">
	<meta property="og:site_name" content="Chanakya Engineering Products">
	<meta property="og:description" content="Chanakya Engineering Products - We would like to introduce ourselves as a leading manufacturer of High Quality door closer, floor spring, glass door patch fittings. Our products adhere to In.">
	<link rel="canonical" href="http://www.katdoorcloser.com">
</head>

<body>
	<?php require("include/header.php"); ?>

	<div class="page-wrapper">

		<!-- Preloader -->
		<div class="preloader"></div>

		<!-- Main Slider -->
		<section class="main-slider">
			<div class="slider-box">

				<!-- Banner Carousel -->
				<div class="banner-carousel owl-theme owl-carousel">

					<!-- Slide -->
					<?php
					if(!empty($banner_r)) {
						while ($banner_d = mysqli_fetch_assoc($banner_r)) { ?>
							<div class="slide">
								<div class="image-layer" style="background-image:url(<?= SITEURL.BANNER.@$banner_d['image_path'] ?>)"></div>
								<div class="auto-container">
									<div class="content">
										<h2><?= @$banner_d['title'] ?></h2>
										<div class="text"><?= html_entity_decode(@$banner_d['description']) ?></div>
										<div class="btns-box">
											<?php if(!empty(@$banner_d['url'])) { ?>
												<a href="<?php echo $banner_d['url']; ?>" class="theme-btn btn-style-one"><span class="txt">Know more</span></a>
											<?php } else { ?>
												<a href="<?=SITEURL?>about-us" class="theme-btn btn-style-one"><span class="txt">Know more</span></a>
											<?php }
											?>
										</div>
									</div>
								</div>
							</div>
	                	<?php } 
					}
            		?>
				</div>
			</div>
		</section>
		<!-- End Banner Section -->

		<!-- Mission Section -->
	    <section class="mission-section">
			<div class="auto-container">
				<div class="row clearfix">
					
					<!-- Image Column -->
					<div class="image-column col-xl-3 col-lg-4 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="image">
								<img src="<?php echo MISSION_IMAGE.@$about_us_d['mission_image_path']; ?>" alt="" />
							</div>
						</div>
					</div>
					
					<!-- Content Column -->
					<div class="content-column col-xl-9 col-lg-8 col-md-12 col-sm-12">
						<div class="inner-column">
							<h2>Our Company Mission</h2>
							<div class="text"><?= html_entity_decode(@$about_us_d['our_mission']) ?></div>
						</div>
					</div>
					
				</div>
			</div>
		</section>
		<!-- End Mission Section -->

		<!-- Project Section -->
		<section class="project-section">
			<div class="auto-container">
				<!-- Title Box -->
				<div class="title-box">
					<h2>Our Latest Projects</h2>
				</div>
			</div>

			<div class="outer-container">

				<!--Isotope Galery-->
				<div class="sortable-masonry">

					<!--Filter-->
					<div class="filters clearfix">

						<ul class="filter-tabs filter-btns text-center clearfix">
							<li class="active filter" data-role="button" data-filter=".all">All Projects</li>
							<?php
							if(!empty($category_a)) {
		                        while ($category_d = mysqli_fetch_assoc($category_a)) { ?>
		                        	<li class="filter" data-role="button" data-filter=".<?= str_replace(' ','_', strtolower(@$category_d['name'])) ?>"><?= @$category_d['name'] ?></li>
		                        <?php }
							}
	                        ?>
						</ul>

					</div>

					<div class="items-container row clearfix">

						<!-- Gallery Item -->
						<?php
						if(!empty($product_a)) {
							$count = 0;
	                        while ($product_d = mysqli_fetch_assoc($product_a)) {
	                        	$count++;
	                        ?>
	                        	<div class="gallery-item small-block masonry-item all <?php echo str_replace(' ','_', strtolower($category_id_array[$product_d['cid']])); ?>">
									<div class="inner-box">
										<figure class="image-box">
											<img src="<?=SITEURL.PRODUCT.$product_d['image_path']?>" alt="">
											<!--Overlay Box-->
											<div class="overlay-box">
												<div class="overlay-inner">
													<div class="content">
														<h3><a href="projects-fullwidth.html"><?= $product_d['name']?></a></h3>
														<a href="<?=SITEURL.PRODUCT.$product_d['image_path']?>" data-fancybox="gallery-1" data-caption="" class="link"><span class="icon flaticon-magnifying-glass-1"></span></a>
														<a href="projects-fullwidth.html" class="link"><span class="icon flaticon-unlink"></span></a>
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
				<!-- More Projects -->
				<div class="more-projects">
					<a href="<?= SITEURL ?>product-list" class="projects">View All Projects</a>
				</div>

			</div>
		</section>
		<!-- End Project Section -->

		<!-- Services Section Two -->
		<section class="services-section-two">
			<div class="auto-container">
				<!-- Sec Title -->
				<div class="sec-title">
					<h2>Our Services</h2>
				</div>

				<div class="row clearfix">

					<!-- Service Block -->
					<?php if(!empty($services)) {
						foreach ($services as $key => $service) { 
							foreach ($service as $key => $value) { ?>
								<div class="service-block-two col-lg-4 col-md-6 col-sm-12">
									<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
										<div class="content">
											<div class="icon-box">
												<span class="icon flaticon-desk-1"></span>
											</div>
											<h3><a href="javascript:void(0);"><?= html_entity_decode(@$key) ?></a></h3>
											<div class="text"><?= html_entity_decode(@$value) ?></div>
										</div>
									</div>
								</div>
						<?php 
							}
						}
					} ?>
				</div>
			</div>
		</section>
		<!-- End Services Section Two -->

		<!-- Team Section -->
		<section class="team-section">
			<div class="auto-container">
				<!-- Sec Title -->
				<div class="sec-title light centered">
					<h2>Our Team</h2>
					<div class="text">Our caregivers are trained specifically to provide in-home care.</div>
				</div>
				
				<div class="clearfix">
					
					<!-- Team Block -->
					<?php if(isset($our_team_r) && !empty($our_team_r)) {

						while ($our_team_d = mysqli_fetch_assoc($our_team_r)) { ?>
							<!-- Team Block -->
							<div class="team-block col-lg-3 col-md-6 col-sm-12">
								<div class="inner-box">
									<div class="image">
										<img src="<?=SITEURL.TEAM.$our_team_d['image_path']?>" alt="" />
										<div class="overlay-box">
											<ul class="social-icons">
												<li><a href="#"><i class="fab fa-facebook"></i></a></li>
												<li><a href="#"><i class="fab fa-linkedin"></i></a></li>
												<li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
												<li><a href="#"><i class="fab fa-skype"></i></a></li>
											</ul>
										</div>
									</div>
									<div class="lower-content">
										<h3><a href="team.html"><?= @$our_team_d["name"] ?></a></h3>
										<div class="designation"><?= @$our_team_d["designation"] ?></div>
										<hr>
										<p style="font-size: 12px;"><?= html_entity_decode(@$our_team_d["description"]) ?></p>
									</div>
								</div>
							</div>
						<?php }
					} ?>
				</div>
			</div>
		</section>
		<!-- End Team Section -->

		<!-- Featured Section -->
		<section class="featured-section" style="background-image: url(images/background/2.jpg)">
			<div class="auto-container">
				<!-- Title Box -->
				<div class="title-box">
					<h2>Our Work Process</h2>
				</div>

				<div class="row clearfix">

					<!-- Feature Block -->
					<div class="feature-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="icon-outer">
								<div class="icon-box">
									<span class="icon flaticon-hand-shake"></span>
								</div>
								<div class="feature-number">1</div>
							</div>
							<div class="lower-content">
								<h3><a href="javascript:void(0);">Meet Customers</a></h3>
								<div class="text">Osed quia consequuntur magni dolores eos qui rati one volu ptatem sequi nesciunt.</div>
							</div>
						</div>
					</div>

					<!-- Feature Block -->
					<div class="feature-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">
							<div class="icon-outer">
								<div class="icon-box">
									<span class="icon flaticon-answer"></span>
								</div>
								<div class="feature-number">2</div>
							</div>
							<div class="lower-content">
								<h3><a href="javascript:void(0);">Design Discussion</a></h3>
								<div class="text">Osed quia consequuntur magni dolores eos qui rati one volu ptatem sequi nesciunt.</div>
							</div>
						</div>
					</div>

					<!-- Feature Block -->
					<div class="feature-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInLeft" data-wow-delay="500ms" data-wow-duration="1500ms">
							<div class="icon-outer">
								<div class="icon-box">
									<span class="icon flaticon-sketch"></span>
								</div>
								<div class="feature-number">3</div>
							</div>
							<div class="lower-content">
								<h3><a href="javascript:void(0);">Drafting Design</a></h3>
								<div class="text">Osed quia consequuntur magni dolores eos qui rati one volu ptatem sequi nesciunt.</div>
							</div>
						</div>
					</div>

					<!-- Feature Block -->
					<div class="feature-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInLeft" data-wow-delay="750ms" data-wow-duration="1500ms">
							<div class="icon-outer">
								<div class="icon-box">
									<span class="icon flaticon-house-1"></span>
								</div>
								<div class="feature-number">4</div>
							</div>
							<div class="lower-content">
								<h3><a href="javascript:void(0);">Implimentation</a></h3>
								<div class="text">Osed quia consequuntur magni dolores eos qui rati one volu ptatem sequi nesciunt.</div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</section>
		<!-- End Featured Section -->

		<!-- Testimonial Section -->
		<section class="testimonial-section">
			<div class="auto-container">
				<!-- Sec Title -->
				<div class="sec-title-two centered">
					<h2>What our customers says</h2>
					<div class="title-text">Thousands of people done interior</div>
				</div>

				<div class="testimonial-carousel owl-carousel owl-theme">
					<!-- Testimonial Block -->
					<?php
					if (!empty($testimony_r)) {
                        while($testimony_d = mysqli_fetch_assoc($testimony_r)) { ?>
							<div class="testimonial-block">
								<div class="inner-box">
									<div class="content">
										<div class="image-outer">
											<div class="image">
												<img src="<?=SITEURL.TESTIMONY.$testimony_d['image_path']?>" alt="" />
											</div>
										</div>
										<h3><?= $testimony_d["name"] ?></h3>
										<div class="title"><?= $testimony_d["designation"] ?></div>
										<div class="text"><?=html_entity_decode($testimony_d["message"])?></div>
									</div>
								</div>
							</div>
                        <?php }
					}
                    ?>
				</div>
			</div>
		</section>
		<!-- End Testimonial Section -->

		<!-- Call To Action Section -->
		<section class="call-to-action-section" style="background-image: url(images/background/1.jpg)">
			<div class="auto-container">
				<h2>Get In Touch</h2>
				<div class="text">Do you have anything in your mind to let us know? Kindly don't delay to connect to us by means of our contact form. </div>
				<a href="contact-us" class="theme-btn btn-style-two"><span class="txt">contact us</span></a>
			</div>
		</section>
		<!-- End Call To Action Section -->

		<!--Main Footer-->
		<?php require("include/footer.php") ?>
	</div>
	<!--End pagewrapper-->

	<!--Scroll to top-->
	<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
	<!--Scroll to top-->
</body>

</html>