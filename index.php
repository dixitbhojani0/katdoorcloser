<?php
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Flowtop</title>
	<!-- include_css start -->
	<?php
	    include('include_css.php');

	?>
	<style type="text/css">
		/*.banner_h{
			height: 600px!important;
			overflow:auto;
		}*/
	</style>

	<!-- include_css end -->
	<?php
	/*------condition-------*/
        $where ="isDelete=0 AND isActive=1";
        $where_p ="isDelete=0 AND display_order>0 AND isActive=1 ";
	/*------banner get Data-------*/

    $banner_r = $db->rp_getData("banner","*",$where,"display_order ASC",0);
	$id = @$_GET['id'];
	/*------condition-------*/
	/*------product get Data-------*/	

	$product_a =$db->rp_getData("product","*",$where_p,"display_order ASC",0,6); 
	
	$testimony_r=$db->rp_getData("testimony","*", $where,"",0);
	/*------about_us get Data-------*/
	$about_us_r=$db->rp_getData("about_us","*",$where,0);
    $about_us_d = mysqli_fetch_assoc($about_us_r);

	?>
	<style type="text/css">
		.banner_h
		{
			background-size: 100% auto;
		}
		@media (max-width: 991px) {
			.banner_h
			{
				background-size: 100% 375px;
			}
		}
	</style>
</head>

<body style="">
	<!-- include_header start -->
	<?php
		include('include_header.php');
	?>
	<!-- include_header end -->
	<!--banner-slider-->
	<section class="w3l-banner-slider-main">
		<div class="banner-content">
			<div id="owl-demo2" class="owl-carousel owl-theme" data-ride="carousel">
				
				<?php
					while ($banner_d = mysqli_fetch_assoc($banner_r)) 
                	{ 
            	?>
				<div class="item banner_h " style="background-image: url(<?= SITEURL.BANNER.$banner_d['image_path'] ?>);background-repeat: no-repeat;">
					<div class="" >
						<div class="top-bannerhny-left">
							<div class="banner-innf" style="padding-top: 5%;">
								<h6 class="hny-sub" style="color: #eee!important"><?= $banner_d['title'] ?></h6>
								<?= html_entity_decode($banner_d['description']) ?>
								<div class="button-6" style="background: #fff;">
									<div class="eff-6"></div>
									<a href="<?=SITEURL?>about-us">Read More </a>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<?php
					}
				?>

			</div>
		</div>
	</section>
	<!-- //banner-slider-->
	<section class="w3l-bottom-grids-6">
		<div class="bottom-grids-info py-5">
			<div class="container py-lg-5">
				<div class="row bottomnhy-grids">
					<div class="col-lg-6 col-md-12 about-gd mt-lg-0 mt-6">
						<div class="about-gd-inn">
							<span class="fa fa-globe icon-fea1" aria-hidden="true"></span>
							<h5><a href="<?=SITEURL?>about-us">Our Vision</a></h5>
							<p><?= $db->rp_limitChar(html_entity_decode($about_us_d['our_vision']),"175")?><a href="<?=SITEURL?>about-us" class="read-more" >Read more</a></p>
						</div>
					</div>
					<div class="col-lg-6 col-md-12 about-gd mt-lg-0 mt-6">
						<div class="about-gd-inn">
							<span class="fa fa-file-text-o icon-fea1" aria-hidden="true"></span>
							<h5><a href="<?=SITEURL?>about-us">Our Mission</a></h5>
							<p><?=  $db->rp_limitChar(html_entity_decode($about_us_d['our_mission']),"175") ?><a href="<?=SITEURL?>about-us" class="read-more" >Read more</a>	</p>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="w3l-companies-hny-6">
		<!--/gallery-->
		<div class="cusrtomer-layout py-5">
			<div class="container py-lg-5">
				<div class="title-content mb-lg-5 mb-4">
					<span class="sub-title">Our Range Of</span>
					<h3 class="hny-title">Products</h3>
					<p>Go Through Wide Range of Porducts</p>
				</div>
				<!-- <div class="row gallery-grids"> -->
				<div id="owl-demo4" class="owl-carousel owl-theme">
					<?php
					if(!empty($product_a)) {
                        while ($product_d_a = mysqli_fetch_assoc($product_a)) 
                        {
                        ?>    
                    <div class="item">
	                    <div class="col-lg-12 col-md-12	 content-left-sec gal-slide-grid">
							<div class="gal-slide-img">
								<a href="<?=SITEURL?>product-details/<?=$product_d_a['id']?>"><img src="<?=SITEURL.PRODUCT.$product_d_a['image_path']?>" class="img img-fluid" alt="" style="border-radius:5%!important;" ></a>
							</div>
							<div class="pro-name">
	                            <a href="<?=SITEURL?>product-details/<?=$product_d_a['id']?>">
	                                <h4><?= $product_d_a['name']?></h4>
	                            </a>
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
		</div>
		<!--//gallery-->

	</section>
	<section class="w3l-content-with-photo-6">
		<div class="contente-photo-hny-info py-5">
			<div class="container py-lg-5">
				
				<div class="content-photo-content">
					<div class="content-photo-content-left">
						<span class="sub-title">Short Video</span>
						<h3 class="hny-title">Find Your Perfect Vacation</h3>
					</div>

					<div class="content-photo-content-right">
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur hic odio voluptatem
							tenetur
							consequatur.Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur hic odio
							voluptatem tenetur
							consequatur adipisicing elit.</p>
					</div>
				</div>
				<div class="content-photo">
					<!--popup-->
					<a href="#small-dialog" class="popup-with-zoom-anim play-view text-center position-absolute">
						<span class="video-play-icon">
							<span class="fa fa-play"></span>
						</span>
					</a>

					<!-- dialog itself, mfp-hide class is required to make dialog hidden -->
					<div id="small-dialog" class="zoom-anim-dialog mfp-hide">

						<iframe src="https://player.vimeo.com/video/92605278" frameborder="0"
							allow="autoplay; fullscreen" allowfullscreen></iframe>
					</div>
					<!--//popup-->
				</div>
			</div>
		</div>
		</div>
	</section>
	<section class="w3l-newsletter">
		<!-- /form-25-section -->
		<div class="form-25-mian py-5">
			<div class="container py-lg-5">
				<div class="forms-25-info">
					<span class="sub-title-1">Lets Stay In Touch</span>
					<h3 class="hny-title two">Download our E-Catalouge</h3>
					<p>Stay Connected</p>

					<form action="" method="post" id="subscribe-form" name="subscribe-form" class="signin-form mt-4 mb-2">
						<div class="forms-gds">
							<input type="email" name="email" id="email" placeholder="Email" required />
							<button type="submit" name="submit" id="submit" class="btn">Submit</button>
						</div>
						<!-- <p class="action-link">Subscribe to our free weekly newsletter for new update releases (no
							spam)</p> -->
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- //form-25-section -->
	<section class="w3l-companies-hny-6">
		<!-- /grids -->
		<div class="cusrtomer-layout py-5">
			<div class="container pt-lg-5">
				<div class="title-content mb-lg-5 mb-4">
					<span class="sub-title">Testimonials</span>
					<h3 class="hny-title">Feedback from our Customers</h3>
				</div>
				<!-- /grids -->
				<div id="owl-demo1" class="owl-carousel owl-theme">
					<?php
                        while($testimony_d = mysqli_fetch_assoc($testimony_r)) 
                        { 
                    ?>
					<div class="item">
						<div class="testimonial-content">
							<div class="testimonial">
								<blockquote>
									<div class="icon-quote"><span class="fa fa-quote-left" aria-hidden="true"></span>
									</div>
									<p><?=html_entity_decode($testimony_d["message"])?></p>
								</blockquote>
								<div class="testi-des">
									<div class="test-img"><img src="<?=SITEURL.TESTIMONY.$testimony_d['image_path']?>" class="img-fluid" alt="/">
									</div>
									<div class="peopl">
										<h3><?= $testimony_d["name"] ?></h3>
										<p class="indentity"><?= $testimony_d["designation"] ?></p>
									</div>
								</div>
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
		<!-- //grids -->
	</section>

	<!-- include_footer start -->
	<?php
	include('include_footer.php');
	?>
	<!-- include_footer end -->
	<script type="text/javascript">
      /*------subscribe-form validation start-------*/
      /*------subscribe-form validation end-------*/
      /*------subscribe-form submit ajax start-------*/
      $("#subscribe-form").on("submit", function(e) {
        e.preventDefault();
         //alert('test');
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $("#subscribe-form").serialize();
        var email=$('#email').val();

        let error = false;
        if(email == '') {
            error = true;
            //$("#warning-email").text('Please enter your email');
        }
        // console.log(error)
        if(error == false) {
          $.ajax(
          {
            url:"<?=SITEURL?>ajax_insert_subscribe.php",
            type:"POST",
            data:$("#subscribe-form").serialize(),
            
            beforeSend:function()
            {
            },
            success:function(result)
            {
              let jsonData = $.parseJSON(result);  
              // console.log(jsonData)
              if(jsonData.ack==1)
              {
              toastr.success("We Will Contact You Soon...");
              //alert(result.file_path);
              //console.log(result.file_path)
              ForceDownload(jsonData.file_path, jsonData.file_name);
              $("#subscribe-form")[0].reset();
              $("#warning-email").text('');
              //$('#myModal').modal('hide')
              }
              else
              {
              toastr.warning("Something Went wrong...");
              // jQuery(".fail-show").show().text("Something went wrong");
              // jQuery(".sucess-show").hide();
              }
            }
          });
        }
      })
    function ForceDownload(download_url = "", file_name = "") {
	    var anchor = document.createElement("a");
	    anchor.href = download_url;
	    anchor.target = "_blank";
	    anchor.download = file_name;
	    anchor.click();
	}
	jQuery(".cat1").click(function () {
    jQuery(".cat1").hide();
	});
      /*------subscribe-form submit ajax end-------*/
    </script>
</body>

</html>