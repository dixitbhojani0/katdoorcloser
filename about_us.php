<?php include("connect.php"); 

	/*------condition-------*/
	$where="isDelete=0 AND isActive=1";
	/*------about_us get Data-------*/
	$about_us_r=$db->rp_getData("about_us","*",$where,0);
	if(!empty($about_us_r)) {
		$about_us_d = mysqli_fetch_assoc($about_us_r);
	}
	/*------our team get Data-------*/
	$our_team_r=$db->rp_getData("our_team","*",$where,"",0,4);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title> About Us | Chanakya Engineering Products in Rajkot</title>
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
	<meta name="language" content="English">
	<meta name="robots" content="all">
	<meta name="description" content="Chanakya Engineering Products in Rajkot ,We would like to introduce ourselves as a leading manufacturer of High Quality.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="free, contact, purchase, 98253 64088, reasonable rate">
	<meta name="twitter:image" content="<?= SITEURL ?>images/logo.jpg">
	<meta name="twitter:description" content="Chanakya Engineering Products,We would like to introduce ourselves as a leading manufacturer of High Quality door closer, floor spring, glass door patch fittings.  Our products adhere to International Standard. CHANAKYA ENGINEERING PRODUCTS. is located in RAJKOT GUJARAT .We have been manufacturing these products since 1992. We  have created a niche for ourselves in satisfying far end Clientele with at most care. CHANAKYA ENGINEERING PRODUCTS true to its name, stands for perfection in each and every product that leaves its factory premises because ‘quality is our first priority’.">
	<meta name="twitter:title" content="About Us : Chanakya Engineering Products">
	<meta name="twitter:card" content="summary">
	<meta property="og:type" content="website">
	<meta property="og:title" content="About Us for Chanakya Engineering Products">
	<meta property="og:image" content="<?= SITEURL ?>images/logo.jpg">
	<meta property="og:site_name" content="Chanakya Engineering Products">
	<meta property="og:description" content="About Us :Chanakya Engineering Products,We would like to introduce ourselves as a leading manufacturer of High Quality door closer, floor spring, glass door patch fittings.  Our products adhere to International Standard. CHANAKYA ENGINEERING PRODUCTS. is located in RAJKOT GUJARAT .We have been manufacturing these products since 1992. We  have created a niche for ourselves in satisfying far end Clientele with at most care. CHANAKYA ENGINEERING PRODUCTS true to its name, stands for perfection in each and every product that leaves its factory premises because ‘quality is our first priority’.">
</head>

<body>
    <div class="preloader"></div>
	<?php require("include/header.php"); ?>

	<div class="page-wrapper">
	    <!--Page Title-->
	    <section class="page-title" style="background-image:url(images/background/5.jpg)">
	    	<div class="auto-container">
	        	<h2>About us</h2>
	            <ul class="page-breadcrumb">
	            	<li><a href="<?= SITEURL ?>">Home</a></li>
	                <li>About us</li>
	            </ul>
	        </div>
	    </section>
	    <!--End Page Title-->
		
		<!-- Story Section -->
		<section class="story-section">
			<div class="auto-container">
				<div class="row clearfix">
					
					<!-- Content Column -->
					<div class="content-column col-lg-8 col-md-12 col-sm-12">
						<div class="inner-column">
							<h2><?= html_entity_decode(@$about_us_d['short_title'])?></h2>
							<!-- <div class="bold-text">Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line</div> -->
							<div class="text">
								<p><?= html_entity_decode(@$about_us_d['short_description']) ?></p>
							</div>
						</div>
					</div>
					
					<!-- Image Column -->
					<div class="image-column col-lg-4 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="image">
								<img src="<?= SITEURL.SHORT_IMAGE.$about_us_d['short_image_path']; ?>" alt="" />
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</section>
		<!-- End Story Section -->
		
		<!-- Interior Section -->
		<section class="interior-section style-three">
			<div class="auto-container">
				<div class="inner-container">
					<div class="row clearfix">
						
						<!-- Image Column -->
						<div class="image-column col-lg-4 col-md-12 col-sm-12">
							<div class="inner-column">
								<div class="image">
									<img src="<?= SITEURL.BIG_IMAGE.$about_us_d['big_image_path']; ?>" alt="" />
								</div>
							</div>
						</div>
						
						<!-- Content Column -->
						<div class="content-column col-lg-8 col-md-12 col-sm-12">
							<div class="inner-column">
								<h2><?= html_entity_decode(@$about_us_d['long_title'])?></h2>
								<div class="text"><?= html_entity_decode(@$about_us_d['big_description'])?></div>
								<div class="row clearfix">
								
									<!-- Interior Block -->
									<div class="interior-block col-lg-4 col-md-4 col-sm-12">
										<div class="block-inner">
											<div class="icon-box">
												<span class="icon flaticon-award-1"></span>
											</div>
											<h3>Superior Quality</h3>
										</div>
									</div>
									
									<!-- Interior Block -->
									<div class="interior-block col-lg-4 col-md-4 col-sm-12">
										<div class="block-inner">
											<div class="icon-box">
												<span class="icon flaticon-answer"></span>
											</div>
											<h3>Professional Team</h3>
										</div>
									</div>
									
									<!-- Interior Block -->
									<div class="interior-block col-lg-4 col-md-4 col-sm-12">
										<div class="block-inner">
											<div class="icon-box">
												<span class="icon flaticon-hand"></span>
											</div>
											<h3>Unmatched Warranty</h3>
										</div>
									</div>
									
								</div>
								
								<div class="bold-text">Get in touch with us to design your dream home</div>
								<div class="column-text">Talk to our expert and get your products</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</section>
		<!-- End Interior Section -->
		
		<!-- Counter Section -->
		<section class="counter-section style-two">
			<div class="auto-container">
			
				<!-- Fact Counter -->
				<div class="fact-counter">
					<div class="row clearfix">

						<!--Column-->
						<div class="column counter-column col-lg-3 col-md-6 col-sm-12">
							<div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
								<div class="content">
									<div class="count-outer count-box">
										<span class="count-text" data-speed="2500" data-stop="8"><?= html_entity_decode(@$about_us_d['counter_1_value'])?></span> Years
									</div>
									<h4 class="counter-title"><?= html_entity_decode(@$about_us_d['counter_1_title'])?></h4>
								</div>
							</div>
						</div>

						<!--Column-->
						<div class="column counter-column col-lg-3 col-md-6 col-sm-12">
							<div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
								<div class="content">
									<div class="count-outer count-box alternate">
										<span class="count-text" data-speed="3000" data-stop="2500"><?= html_entity_decode(@$about_us_d['counter_2_value'])?></span>+
									</div>
									<h4 class="counter-title"><?= html_entity_decode(@$about_us_d['counter_2_title'])?></h4>
								</div>
							</div>
						</div>

						<!--Column-->
						<div class="column counter-column col-lg-3 col-md-6 col-sm-12">
							<div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
								<div class="content">
									<div class="count-outer count-box">
										<span class="count-text" data-speed="3000" data-stop="200"><?= html_entity_decode(@$about_us_d['counter_3_value'])?></span>+
									</div>
									<h4 class="counter-title"><?= html_entity_decode(@$about_us_d['counter_3_title'])?></h4>
								</div>
							</div>
						</div>
						
						<!--Column-->
						<div class="column counter-column col-lg-3 col-md-6 col-sm-12">
							<div class="inner wow fadeInLeft" data-wow-delay="900ms" data-wow-duration="1500ms">
								<div class="content">
									<div class="count-outer count-box">
										<span class="count-text" data-speed="2500" data-stop="45"><?= html_entity_decode(@$about_us_d['counter_4_value'])?></span> Days
									</div>
									<h4 class="counter-title"><?= html_entity_decode(@$about_us_d['counter_4_title'])?></h4>
								</div>
							</div>
						</div>

					</div>
				</div>
				
			</div>
		</section>
		<!-- End Counter Section -->
		
		<!-- Team Section -->
		<section class="team-section style-two">
			<div class="auto-container">
				<!-- Sec Title -->
				<div class="sec-title light centered">
					<h2>Our Team</h2>
					<div class="text">Our caregivers are trained specifically to provide in-home care.</div>
				</div>
				
				<div class="clearfix">
					
					<?php if(isset($our_team_r) && !empty($our_team_r)) {

						while ($our_team_d = mysqli_fetch_assoc($our_team_r)) { ?>
							<!-- Team Block -->
							<div class="team-block col-lg-3 col-md-6 col-sm-12">
								<div class="inner-box">
									<div class="image">
										<img src="<?=SITEURL.TEAM.$our_team_d['image_path']?>" alt="" />
										<div class="overlay-box">
											<ul class="social-icons">
												<li><a href="<?= !empty($our_team_d["fb_link"]) ? html_entity_decode(@$our_team_d["fb_link"]) : 'javascript:void(0);' ?>"><i class="fab fa-facebook" target="_blank"></i></a></li>
												<li><a href="<?= !empty(@$our_team_d["twitter_link"]) ? html_entity_decode(@$our_team_d["twitter_link"]) : 'javascript:void(0);' ?>" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
												<li><a href="<?= !empty(@$our_team_d["linkedin_link"]) ? html_entity_decode(@$our_team_d["linkedin_link"]) : 'javascript:void(0);' ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
												<li><a href="<?= !empty(@$our_team_d["insta_link"]) ? html_entity_decode(@$our_team_d["insta_link"]) : 'javascript:void(0);' ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
												<li><a href="<?= !empty(@$our_team_d["google_link"]) ? html_entity_decode(@$our_team_d["google_link"]) : 'javascript:void(0);' ?>" target="_blank"><i class="fab fa-google"></i></a></li>
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
		
		<!-- Vision Section -->
	    <section class="vision-section style-two" >
			<div class="auto-container">
				<div class="row clearfix">
					<!-- Image Column -->
					<div class="image-column col-xl-3 col-lg-4 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="image">
								<img src="<?php echo VISION_IMAGE.@$about_us_d['vision_image_path']; ?>" width="150" height="120" alt="vision_img" />
							</div>
						</div>
					</div>
					<!-- Content Vision -->
					<div class="content-column col-xl-9 col-lg-8 col-md-12 col-sm-12">
						<div class="inner-column">
							<h2>Our Company Vision</h2>
							<div class="text"><?= html_entity_decode(@$about_us_d['our_vision']) ?></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Vision Section -->

		<!-- Mission Section -->
	    <section class="mission-section style-two">
			<div class="auto-container">
				<div class="row clearfix">
					
					<!-- Image Column -->
					<div class="image-column col-xl-3 col-lg-4 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="image">
			          			<img src="<?php echo MISSION_IMAGE.@$about_us_d['mission_image_path']; ?>" width="150" height="120" alt="mission_img" />
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

		<!-- Call To Action Section -->
		<section class="call-to-action-section" style="background-image: url(images/background/6.jpg)">
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