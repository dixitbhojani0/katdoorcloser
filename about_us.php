<!DOCTYPE html>
<html lang="zxx">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Flowtop-About-Us</title>
	<!-- include_css start -->
	<?php
	    include('include_css.php');
	?>
	<!-- include_css end -->
	<?php
      /*------condition-------*/
      $where="isDelete=0 AND isActive=1";
      /*------about_us get Data-------*/
      $about_us_r=$db->rp_getData("about_us","*",$where,0);
      $about_us_d = !empty($about_us_r) ? mysqli_fetch_assoc($about_us_r) : '';

      /*------our team get Data-------*/
      $our_team_r=$db->rp_getData("our_team","*",$where,"",0,4);
    ?>

</head>

<body>
	<!-- include_header start -->
	<?php
		include('include_header.php');
	?>
	<!-- include_header end -->
	<!-- feature with photo1 -->
	<section class="w3l-feature-with-photo-1">
		<div class="feature-with-photo-hny py-5">
			<div class="container py-lg-5">
				<div class="title-content mb-lg-5 mb-4">
					<span class="sub-title">The Story</span>
					<h3 class="hny-title"> About Us</h3>
				</div>
				<div class="feature-with-photo-content">
					<div class="ab-in-flow row mb-lg-5 mb-3">
						<div class="col-lg-6 ab-left">
							<img src="<?= SITEURL.SHORT_IMAGE.$about_us_d['short_image_path']; ?>" class="img-fluid" alt="">
						</div>
						<div class="col-lg-6 ab-right pl-lg-4">
							<h3 class="hny-title">
								<?= html_entity_decode($about_us_d['short_title'])?>
							</h3>
							<p class="my-4"><?= html_entity_decode($about_us_d['short_description']) ?></p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12" style="padding-top: 5%;">
							<div class="row">
								<div class="col-md-6">
									<div class="grid">
										<h4><a href="#" style="margin: 30%;">Our Vesion</a></h4>
										<p><?= html_entity_decode($about_us_d['our_vision']) ?></p>
									</div>
								</div>
								<div class="col-md-6">	
									<div class="grid">
										<h4><a href="#" style="margin: 30%;">Our Mission</a></h4>
										<p><?= html_entity_decode($about_us_d['our_mission']) ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //feature with photo1 -->
	<section class="w3l-content-4">
		<!-- /content-6-section -->
		<div class="content-4-main py-5">
			<div class="container py-lg-5">
				<div class="content-info-in row">
					<div class="content-left col-lg-6 text-lg-right pr-lg-3">
						<h3 class="hny-title"><?= html_entity_decode($about_us_d['long_title'])?></h3>
						<p><?= html_entity_decode($about_us_d['big_description'])?></p>
						<img src="<?= SITEURL.BIG_IMAGE.$about_us_d['big_image_path']; ?>" class="img-fluid mt-3" alt="">
					</div>
					<div class="content-right col-lg-6 pl-lg-4">
						<div class="row content4-right-grids mb-lg-5 mb-4">
							<div class="col-md-2 content4-right-icon">
								<div class="content4-icon">
									<span class="fa fa-thumbs-o-up"></span>
								</div>
							</div>
							<div class="col-md-10 content4-right-info">
								<h6><a href="#">Better Buying Process</a></h6>
								<p>We spend as much time as you need with you to plan and cost the perfect bathroom to meet your needs and wants.The process we offer has been developed over 20 years and puts you at the centre. With our offer of unlimited in-store consultations, design and quote alterations, to get the measurements just right we are confident of a far better outcome for you and your family than anyone else can offer.</p>
							</div>

						</div>
						<div class="row content4-right-grids mb-lg-5 mb-4">
							<div class="col-md-2 content4-right-icon">
								<div class="content4-icon">
									<span class="fa fa-tags"></span>
								</div>
							</div>
							<div class="col-md-10 content4-right-info">
								<h6><a href="#">Complete Know How</a></h6>
								<p>Bathroom equipment can be complicated with not everything being compatible and we’re here to make sure you get all the important parts you need to make the bathroom that you’ve chosen work the way you want it to.</p>
							</div>

						</div>
						<div class="row content4-right-grids mb-lg-5 mb-4">
							<div class="col-md-2 content4-right-icon">
								<div class="content4-icon">
									<span class="fa fa-suitcase"></span>
								</div>
							</div>
							<div class="col-md-10 content4-right-info">
								<h6><a href="#">We Always Have Amazing Deals</a></h6>
								<p>Due to our unique and long standing relationship with one of the industries major manufacturers we are able to offer more quality seconds, end of line and ex-display products than any other bathroom outlet in the country.</p>
							</div>

						</div>
					</div>

				</div>

			</div>
		</div>
	</section>
	<!-- //w3l-faq-6-->
	<section class="w3l-content-5">
		<!-- /content-6-section -->
		<div class="content-5-main">
			<div class="container">
				<div class="content-info-in row">
					<div class="content-gd col-lg-6">
						<h3 class="hny-title two">
							Types of Must Have Bathroom Accessories</h3>
					</div>
					<div class="content-gd col-lg-6">
						<p>One of the most used parts of the home is the bathroom. And with this, buying all necessities to make sure that it will provide users comfort, convenience and pleasure is necessary. Bathroom accessories do not only come in many designs and styles but also prices, brands and types. At Flowtop, you are assured that our bathroom products will never fail you in terms of options, designs, prices and style.</p>
						<p>With the many accessories in the bathroom available on our website, you will definitely have plenty of ways to mix and match different bathroom fittings and accessories to address not only your necessities but bathroom pleasure and beauty too.</p>

					</div>

				</div>

			</div>
		</div>
	</section>
	<!-- //content-6-section -->
	<!-- teams 33 block -->
	<section class="w3l-teams26-main">
		<div class="teams-26 py-5">
			<div class="container py-lg-5">
				<div class="title-content mb-lg-5 mb-4">
					<span class="sub-title">Our</span>
					<h3 class="hny-title">Great Team</h3>
				</div>
				<div class="row">
				<?php
				if(!empty($our_team_r)) {
					while ($our_team_d = mysqli_fetch_assoc($our_team_r)) 
                    { 
				?>
				<div class="col-lg-3 col-md-6">
					<div class="our-team">
						<div class="pic">
							<img src="<?=SITEURL.TEAM.$our_team_d['image_path']?>" class="img-fluid" alt="">
							<div class="social_media_team">
								<p class="description"><?= html_entity_decode(@$our_team_d['description'])?>
								</p>
							</div>
						</div>
						<div class="team-prof">
							<h3 class="post-title"><a href="#"><?= $our_team_d["name"] ?></a></h3>
							<span class="post"><?= $our_team_d["designation"] ?></span>
						</div>
					</div>
				</div>
				<?php
					}
				}
				?>
				</div>
			</div>
		</div>
	</section>

	<!-- include_footer start -->
	<?php
	include('include_footer.php');
	?>
	<!-- include_footer end -->
</body>

</html>