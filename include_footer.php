	<?php
// include('connect.php');
/*------condition-------*/
$where = "isDelete=0 AND isActive=1";
/*------about_us get Data-------*/
$about_us_r = $db->rp_getData("about_us", "*", $where, 0);
$about_us_d = !empty($about_us_r) ? mysqli_fetch_assoc($about_us_r) : '';

/*------contact_us_info get Data-------*/
$get_contact_r = $db->rp_getData("contact_us_info", "*", $where, 0);
$get_contact_d = !empty($get_contact_r) ? mysqli_fetch_assoc($get_contact_r) : '';

?>
<footer class="w3l-footer-66">
	<section class="footer-inner-main">
		<div class="footer-hny-grids py-3">
			<div class="container py-lg-4">
				<div class="text-txt">
					<div class="right-side">
						<div class="rowfoot_  sub-columns">
							<div class="row pt-3">
								<div class="col-lg-4 col-md-6 sub-one-left pr-lg-4">
									<h2><a class="navbar-brand" href="<?= SITEURL ?>">
											<img src="<?= LOGO_IMAGE; ?>" alt="Site Logo" style="width: 60%" />
										</a></h2>
									<p>Because Special people deserve a special bath with a special shower.</p>
									<div class="columns-2">
										<ul class="social">
											<li><a href="https://www.facebook.com/"><span class="fa fa-facebook" aria-hidden="true"></span></a>
											<li><a href="https://api.whatsapp.com/send?phone=<?= $get_contact_d["phone"]?>"><span class="fa fa-whatsapp" aria-hidden="true"></span></a>
											</li>
											<li><a href="mailto:<?= $get_contact_d["email"] ?>"><span class="fa fa-envelope" aria-hidden="true"></span></a>
											</li>
											<li><a href="https://www.instagram.com/"><span class="fa fa-instagram" aria-hidden="true"></span></a>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 sub-one-left mid-footer-gd">
									<div class="sub-two-right">
										<h6>Quick links</h6>
										<ul>
											<li>
												<a href="<?= SITEURL ?>"><span class="fa fa-angle-double-right mr-2"></span>Home</a>
											</li>
											<li>
												<a href="<?= SITEURL ?>about-us/"><span class="fa fa-angle-double-right mr-2"></span>About</a>
											</li>
											<li>
												<a href="<?= SITEURL ?>gallery/"><span class="fa fa-angle-double-right mr-2"></span>Gallery</a>
											</li>
											<li>
												<a href="<?= SITEURL ?>contact-us/"><span class="fa fa-angle-double-right mr-2"></span>Contact</a>
											</li>
										</ul>
									</div>
									<div class="sub-two-right">
										<h6>Products</h6>
										<ul>
											<?php
											$where = "isDelete=0 AND isActive=1";
											/*------about_us get Data-------*/
											$category_a = $db->rp_getData("category", "*", $where, "", 0, 4);
											if(!empty($category_a_d)) {
												while ($category_a_d = mysqli_fetch_assoc($category_a)) {
												?>
													<li>
														<a href="<?= SITEURL ?>product-list/<?= $category_a_d['id'] ?>/">
															<span class="fa fa-angle-double-right mr-2">
															</span>
															<?= $category_a_d['name'] ?>
														</a>
													</li>
												<?php
												}
											}
											?>
										</ul>
									</div>

								</div>
							<div class="sub-two-right" style="padding-left: 20px">
									<h6>Get In Touch</h6>
									<ul class="ftr_nav get_in_touch">
										<a href="<?= SITEURL ?>contact-us/">
											<li class="ftr_location_icon"><?= html_entity_decode(@$get_contact_d["address"]) ?></li>
										</a>
										<li class="ftr_phn_icon">
											<ul>
												<li style="padding-left: 0px;">
													<a href="tel:<?= @$get_contact_d["phone"] ?>"><?= @$get_contact_d["phone"] ?></a>
												</li>
												<?php
												if (@$get_contact_d["phone_2"] > 0) {
												?>
													<li style="padding-left: 0px;">
														<a href="tel:<?= $get_contact_d["phone_2"] ?>"><?= @$get_contact_d["phone_2"] ?></a>
													</li>
												<?php
												}
												if (@$get_contact_d["phone_3"] > 0) {
												?>
													<li style="padding-left: 0px;">
														<a href="tel:<?= @$get_contact_d["phone_3"] ?>"><?= @$get_contact_d["phone_3"] ?></a>
													</li>
												<?php
												}
												?>
											</ul>
										</li>
										<a href="mailto:<?= @$get_contact_d['email'] ?>">
											<li class="ftr_msg_icon"><?= @$get_contact_d["email"] ?></li>
										</a>
										<li class="ftr_clock_icon">Monday - Friday : 10:00 - 19:00</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="below-section">
			<div class="container">
				<div class="copyright-footer">
					<div class="columns text-lg-left">
						<p>Copyright © The <a href="https://fd7tech.in/" target="_blank">FD7 Technology</a> All rights reserved
						</p>
					</div>
					<ul class="columns text-lg-right">
						<!-- <li><a href="#">Privacy Policy</a>
						</li> -->
						<li><a href="<?= SITEURL ?>about-us">About Us</a>
						</li>
						<li><a href="<?= SITEURL ?>contact-us">Contact Us</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- copyright -->
		<!-- move top -->
		<button onclick="topFunction()" id="movetop" title="Go to top">
			<span class="fa fa-arrow-up" aria-hidden="true"></span>
		</button>
		<script>
			// When the user scrolls down 20px from the top of the document, show the button
			window.onscroll = function() {
				scrollFunction()
			};

			function scrollFunction() {
				if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
					document.getElementById("movetop").style.display = "block";
				} else {
					document.getElementById("movetop").style.display = "none";
				}
			}

			// When the user clicks on the button, scroll to the top of the document
			function topFunction() {
				document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0;
			}
		</script>
		<!-- /move top -->
	</section>
</footer>
<!-- include_js start-->
<?php
include('include_js.php');
?>
<!-- include_js end -->