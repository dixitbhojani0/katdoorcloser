<?php include_once("include/define.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Contact Us | Chanakya Engineering Products</title>
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
	<meta name="description" content="Location of Chanakya Engineering Products on Map">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="free, contact, purchase, 98253 64088, reasonable rate">
	<meta name="twitter:image" content="<?= SITEURL ?>images/logo.jpg">
	<meta name="twitter:description" content="Map View">
	<meta name="twitter:title" content="Location  of Chanakya Engineering Products on Map">
	<meta name="twitter:card" content="summary">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Chanakya Engineering Products">
	<meta property="og:image" content="<?= SITEURL ?>images/logo.jpg">
	<meta property="og:site_name" content="Chanakya Engineering Products">
	<meta property="og:description" content="Map View">
</head>


<body>
	<div class="page-wrapper">
		<!-- Preloader -->
		<div class="preloader"></div>
		<?php require("include/header.php"); ?>

		<!-- End Main Header -->

		<!--Page Title-->
		<section class="page-title" style="background-image:url(images/background/5.jpg)">
			<div class="auto-container">
				<h2>Contact Us</h2>
				<ul class="page-breadcrumb">
					<li><a href="<?= SITEURL ?>">home</a></li>
					<li>Contact Us</li>
				</ul>
			</div>
		</section>
		<!--End Page Title-->

		<!-- Contact Form Section -->
		<section class="contact-form-section" style="background-image:url(images/background/contact.png)">
			<div class="auto-container">
				<!-- Sec Title -->
				<div class="sec-title">
					<h2>Get In Touch</h2>
					<div class="text">Do you have anything in your mind to let us know? Kindly don't delay to connect to us by means of our contact form.</div>
				</div>

				<div class="row clearfix">

					<!-- Form Column -->
					<div class="form-column col-lg-7 col-md-12 col-sm-12">
						<div class="inner-column">

							<!-- Contact Form -->
							<div class="contact-form">

								<!--Contact Form-->
								<form method="POST" action="" id="contact-form" name="contact-form">
									<div class="row clearfix">
										<div class="form-group col-lg-6 col-md-6 col-sm-12">
											<input type="text" name="username" placeholder="Your name" required>
										</div>

										<div class="form-group col-lg-6 col-md-6 col-sm-12">
											<input type="text" name="email" placeholder="Email address" required>
										</div>

										<div class="form-group col-lg-12 col-md-12 col-sm-12">
											<input type="tel" name="mobile_no" placeholder="Your Mobile No." pattern="[0-9]{9}" required>
											<label for="mobile_no" class="d-none" id="folio-invalid" style='color:red; font-size:12px; text-transform: uppercase; padding: 5px 0px 0px; line-height: 24px; font-weight: 500;'>Please Enter Valid Mobile Number.</label>
											<label for="mobile_no" class="d-none" id="mobile-valid" style='color:red; font-size:12px; text-transform: uppercase; padding: 5px 0px 0px; line-height: 24px; font-weight: 500;'>Mobile Number length at least 10 digit..</label>
										</div>

										<div class="form-group col-lg-12 col-md-12 col-sm-12">
											<input type="text" name="subject" placeholder="Subject" required>
										</div>

										<div class="form-group col-lg-12 col-md-12 col-sm-12">
											<textarea name="message" placeholder="Message"></textarea>
										</div>

										<div class="form-group col-lg-12 col-md-12 col-sm-12">
											<button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="txt">Submit now</span></button>
											<img src="images\icons\spinner.gif" id="loader" style="display: none;"/>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Info Column -->
					<div class="info-column col-lg-5 col-md-12 col-sm-12">
						<div class="inner-column">

							<!-- Contact Info List -->
							<ul class="contact-info-list">
								<li><strong>Address :</strong><br><?= html_entity_decode($get_contact_d["address"])?></li>
							</ul>
							<!-- Contact Info List -->
							<ul class="contact-info-list">
								<li><strong>Phone : </strong><a href="tel:<?= html_entity_decode(@$get_contact_d["phone"]) ?>"><?=@$get_contact_d["phone"]?></a></li>
								<li><strong>Email : </strong><a href="mailto:<?= html_entity_decode(@$get_contact_d['email']) ?>"><?= @$get_contact_d["email"]?></a></li>
							</ul>
							<!-- Contact Info List -->
							<ul class="contact-info-list">
								<li><strong>Opening Hours :</strong><?= html_entity_decode(@$get_contact_d['description'])?>
							</ul>

						</div>
					</div>

				</div>

			</div>
		</section>
		<!-- End Contact Form Section -->

		<!-- Map Section -->
		<section class="map-section">
			<div class="outer-container">
				<div class="map-outer">
					<div class="map-canvas" data-zoom="12" data-lat="22.2623688" data-lng="70.8023327" data-type="roadmap" data-hue="#ffc400" data-title="Chanakya Engineering Products, Rajkot, Gujrat India" data-icon-path="images/icons/map-marker.png" data-content="<?=@$get_contact_d["phone"]?> <br> Monday-Sunday: 8.00AM - 8.00PM <br> Wednesday: Closed">
					</div>
				</div>
			</div>
		</section>
		<!-- End Map Section -->

		<!--Main Footer-->
		<?php require("include/footer.php") ?>

	</div>
	<!--End pagewrapper-->

	<!--Search Popup-->
	<div id="search-popup" class="search-popup">
		<div class="close-search theme-btn"><span class="flaticon-cancel"></span></div>
		<div class="popup-inner">
			<div class="overlay-layer"></div>
			<div class="search-form">
				<form method="post" action="templateshub.net">
					<div class="form-group">
						<fieldset>
							<input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required>
							<input type="submit" value="Search Now!" class="theme-btn">
						</fieldset>
					</div>
				</form>

				<br>
				<h3>Recent Search Keywords</h3>
				<ul class="recent-searches">
					<li><a href="#">Home Interiors</a></li>
					<li><a href="#">Offices Interiors</a></li>
					<li><a href="#">Showroom Interiors</a></li>
					<li><a href="#">Building Interiors</a></li>
					<li><a href="#">Shops Interiors</a></li>
				</ul>

			</div>

		</div>
	</div>

	<!--Google Map APi Key-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
	<script src="js/map-script.js"></script>
	<!--End Google Map APi-->
	<script type="text/javascript">
    
	$("input[name='mobile_no']").on("keyup", function(){
        var mobNum = $(this).val();
        var filter = /^\d*(?:\.\d{1,2})?$/;

      	if (filter.test(mobNum)) {
            if(mobNum.length==10){
                $("#mobile-valid").addClass("d-none");
                $("#folio-invalid").addClass("d-none");
            } else {
                $("#folio-invalid").removeClass("d-none");
                $("#mobile-valid").addClass("d-none");
                return false;
            }
        }
        else {
			$("#folio-invalid").removeClass("d-none");
			$("#mobile-valid").addClass("d-none");
			return false;
       	}
       	return true;
  	});
	/*------contact-form submit ajax start-------*/
    $("#contact-form").on("submit", function(e) {
        e.preventDefault();
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $("#contact-form").serialize();
        var mobile_no=$('#mobile_no').val();
        let error = false;
        if(($(".error")[0] == "undefined") || $('#folio-invalid').hasClass('d-none') == false || $('#mobile-valid').hasClass('d-none') == false) {
            error = true;
        }
        if(error == false) {
          	$.ajax(
		        {
		            url:"<?=SITEURL?>ajax_insert_contact.php",
		            type:"POST",
		            data:$("#contact-form").serialize(),
	            
		            beforeSend: function(){
				        $('#loader').show();
				        $('.theme-btn').prop('disabled', true);
				        $('.theme-btn').hide();
				    },
				    complete: function(){
				        $('#loader').hide();
				        $('.theme-btn').prop('disabled', false);
				        $('.theme-btn').show();
				    },
		            success:function(result)
		            {
						let jsonData = JSON.parse(result);  
						// console.log(jsonData)
						if(jsonData.ack==1)
						{
							toastr.success("Submitted successfully. We Will Contact You Soon...");
							$("#contact-form")[0].reset();
						}
						else
						{
							toastr.warning("Something Went wrong...");
						}
		            }
          		}
          	);
        }
    })
  	/*------contact-form submit ajax end-------*/
	</script>
</body>

<!-- stella-orre/contact.html  30 Nov 2019 03:46:47 GMT -->
</html>
