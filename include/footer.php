<!--Main Footer-->
<footer class="main-footer">
	<div class="auto-container">
    	<!--Widgets Section-->
        <div class="widgets-section">
        	<div class="row clearfix">
				<?php
				require("include/define.php")?>
            	
                <!--big column-->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">
                    
                        <!--Footer Column-->
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget logo-widget">
								<div class="logo">
                                	<a href="<?= SITEURL ?>"><img src="<?= SITEURL ?>images/logo.jpg" alt="" style="width: 230px;height: 130px;border-radius: 15%;" /></a>
                                </div>
                                <ul class="social-icons">
                                    <li><a href="https://api.whatsapp.com/send?text=http://www.katdoorcloser.com" target="_blank"><span class="fab fa-whatsapp"></span></a></li>
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.katdoorcloser.com%2F" target="_blank"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fwww.katdoorcloser.com%2F&text=" target="_blank"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2Fwww.katdoorcloser.com%2F&title=" target="_blank"><span class="fab fa-linkedin-in"></span></a></li>
                                    <li><a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.katdoorcloser.com%2F&media=&description=" target="_blank"><span class="fab fa-pinterest-p"></span></a></li>
                                </ul>
							</div>
						</div>
						
						<!--Footer Column-->
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                            	<h2>Quick links</h2>
								<div class="widget-content">
									<ul class="list">
                                    	<li>
											<a href="<?= SITEURL ?>"><span class="fa fa-angle-double-right mr-2"></span>Home</a>
										</li>
										<li>
											<a href="<?= SITEURL ?>about-us"><span class="fa fa-angle-double-right mr-2"></span>About</a>
										</li>
										<li>
											<a href="<?= SITEURL ?>gallery"><span class="fa fa-angle-double-right mr-2"></span>Gallery</a>
										</li>
										<li>
											<a href="<?= SITEURL ?>contact-us"><span class="fa fa-angle-double-right mr-2"></span>Contact</a>
										</li>
                                    </ul>
                                </div>
							</div>
						</div>
					
					</div>
				</div>
				
				<!--big column-->
                <div class="big-column col-lg-6 col-md-12 col-sm-12">
                    <div class="row clearfix">
                    
                        <!--Footer Column-->
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget contact-widget">
								<h2>Contact Info</h2>
								<div class="widget-content">
									<a href="tel:<?= html_entity_decode(@$get_contact_d["phone"]) ?>" class="contact-number"><?= html_entity_decode(@$get_contact_d["phone"]) ?></a>
									<ul>
										<li><?= html_entity_decode(@$get_contact_d["address"])?></li>
										<li>Email :<a href="<?= html_entity_decode(@$get_contact_d['email']) ?>"> <?= html_entity_decode(@$get_contact_d["email"])?></a></li>
									</ul>
								</div>
							</div>
						</div>
						
						<!--Footer Column-->
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget newsletter-widget">
                            	<h2>Newsletter</h2>
								<div class="text">Stay updated with our latest products and services</div>
								<!-- Newsletter Form -->
								<div class="newsletter-form">
									<form method="post" name="newsletter-form" id="newsletter-form" action="">
										<div class="form-group">
											<input type="email" name="email" value="" placeholder="Enter your email address" id="sub-email" required>
											<button type="submit" class="theme-btn btn-style-one"><span class="txt">Subscribe</span></button>
											<img src="images\icons\preloader.svg" id="loader" style="display: none; padding-top: 10px;"/>
										</div>
									</form>
								</div>
							</div>
						</div>
					
					</div>
				</div>	
			</div>
		</div>
		
		<!--Footer Bottom-->
        <div class="footer-bottom clearfix">
            <div class="pull-center">
                <div class="copyright"><a href="<?= SITEURL ?>">Chanakya Engineering Products</a></div>
            </div>
        </div>			
	</div>
</footer>
<script src="<?= SITEURL ?>js/jquery.js"></script>
<script src="<?= SITEURL ?>js/popper.min.js"></script>
<script src="<?= SITEURL ?>js/jquery-ui.js"></script>
<script src="<?= SITEURL ?>js/bootstrap.min.js"></script>
<script src="<?= SITEURL ?>js/jquery.fancybox.js"></script>
<script src="<?= SITEURL ?>js/isotope.js"></script>
<script src="<?= SITEURL ?>js/owl.js"></script>
<script src="<?= SITEURL ?>js/wow.js"></script>
<script src="<?= SITEURL ?>js/mixitup.js"></script>
<script src="<?= SITEURL ?>js/appear.js"></script>
<script src="<?= SITEURL ?>js/scrollbar.js"></script>
<script src="<?= SITEURL ?>js/validate.js"></script>
<script src="<?= SITEURL ?>js/script.js"></script>
<script src="<?= SITEURL ?>admin/js/toastr.js"></script>
<script type="text/javascript">
	/*------subscribe-form submit ajax start-------*/
      $("#newsletter-form").on("submit", function(e) {
        e.preventDefault();
        var form_data = $("#newsletter-form").serialize();
        var email=$('#sub-email').val();
        let error = false;
        if(email == '') {
            error = true;
        }
        if(error == false) {
          	$.ajax(
          	{
	            url:"<?= SITEURL ?>ajax_insert_subscribe.php",
	            type:"POST",
	            data:$("#newsletter-form").serialize(),
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
					let jsonData = $.parseJSON(result);  
					if(jsonData.ack==1)
					{
						toastr.success("You have subscribed successfully.");
						ForceDownload(jsonData.file_path, jsonData.file_name);
						$('#sub-email').val('');
					}
					else
					{
						toastr.warning("Something Went wrong...");
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
<script type="application/ld+json" k-partial="">
    { 
        "@context": "http://schema.org",
        "@type": "LocalBusiness",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Rajkot",
            "addressRegion": "India",
            "streetAddress": "Street no. 17 Atika Industrial  Area, Nr. Patel Chowk Dhebar Road (south), RAJKOT- 360002  GUJARAT, INDIA",
            "postalCode":"360002"
        },
        "description": "We would like to introduce ourselves as a leading manufacturer of High Quality door closer, floor spring, glass door patch fittings. Our products adhere to In",
        "name": "Chanakya Engineering Products",
        "telephone": "+918048051486",
        "image": "https://fplogoimages.withfloats.com/actual/58bd0dd0e2011405b4e1e844.jpg",
        "email" : "India",
        "geo":  {
            "@type":"GeoCoordinates",
            "latitude":"22.2623688",
            "longitude":"70.8023327"
        },
        "openingHours":["Su  8:00 AM  8:00 PM ",
                        "Mo  8:00 AM  8:00 PM",
                        "Tu  8:00 AM  8:00 PM ",
                        "We  closed   ",
                        "Th  8:00 AM  8:00 PM",
                        "Fr  8:00 AM  8:00 PM",
                        "Sa  8:00 AM  8:00 PM "]
    }
</script>