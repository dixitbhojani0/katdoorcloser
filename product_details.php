<?php include("connect.php"); ?>
<?php
	if(!isset($_GET['id']) || empty($_GET['id'])) {
		// 301 Moved Permanently
		header("Location: ".SITEURL."404.php", true, 301);
		exit();
	} else {

	    $id = @$_GET['id'];
	    /*------condition-------*/
	    $where = "isDelete=0 AND isActive=1";
	    $where_a = "isDelete=0 AND isActive=1 AND id = '" . $id . "'  ";

	    $where_c = "isDelete=0 AND isActive=1 AND product_id='" . $id . "' ";
	    /*------product get Data-------*/
	    $product = $db->rp_getData("product", "*", $where_a, 0);
	    if(empty($product)) {
	    	// 301 Moved Permanently
			header("Location: ".SITEURL."404.php", true, 301);
			exit();
	    }
	    $product_d = mysqli_fetch_assoc($product);
	    if(isset($product_d['cid']) && !empty($product_d['cid'])) {
		    $where_r = "isDelete=0 AND isActive=1 AND id != '" . $id . "' AND cid = '".$product_d['cid']."'";
	    	$relatedProductRows = $db->rp_getData("product", "*", $where_r, 0);
	    	if (!empty($relatedProductRows)) {
			    $relatedProductData = mysqli_fetch_all($relatedProductRows);
			}
	    } else {
	    	$relatedProductData = array();
	    }
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?= @$product_d["name"] ?> in Rajkot, India from Chanakya Engineering Products</title>
	<!-- Stylesheets -->
	<link href="<?= SITEURL ?>css/bootstrap.css" rel="stylesheet">
	<link href="<?= SITEURL ?>css/style.css" rel="stylesheet">
	<link href="<?= SITEURL ?>css/responsive.css" rel="stylesheet">
	<link href="<?= SITEURL ?>admin/css/toastr.css" rel="stylesheet">
	<link href="<?= SITEURL ?>css/jquery.easy_slides.css" rel="stylesheet" type="text/css" />
    <script src="<?= SITEURL ?>js/easy_slides.js"></script>

	<link rel="shortcut icon" href="<?= SITEURL ?>images/favicon.png" type="image/x-icon">
	<link rel="icon" href="<?= SITEURL ?>images/favicon.png" type="image/x-icon">

	<!-- Responsive -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="language" content="English">
	<meta name="robots" content="all">
	<meta name="description" content="<?= @$product_d["name"] ?> in Rajkot, India from Chanakya Engineering Products;">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="free, contact, purchase, 98253 64088, reasonable rate">
	<meta name="twitter:image" content="<?= SITEURL . PRODUCT . @$product_d['image_path'] ?>">
	<meta name="twitter:description" content="Chanakya Engineering Products - <?= @$product_d["name"] ?>">
	<meta name="twitter:title" content="<?= @$product_d["name"] ?> in Rajkot ,India from Chanakya Engineering Products">
	<meta name="twitter:card" content="summary">
	<meta property="og:type" content="Products">
	<meta property="og:title" content="<?= @$product_d["name"] ?> in Rajkot ,India from Chanakya Engineering Products">
	<meta property="og:image" content="<?= SITEURL . PRODUCT . @$product_d['image_path'] ?>">
	<meta property="og:site_name" content="Chanakya Engineering Products">
	<meta property="og:url" content="<?= SITEURL . 'product-details/' . @$product_d["id"] ?>">
	<meta property="og:description" content="Chanakya Engineering Products - We would like to introduce ourselves as a leading manufacturer of High Quality d">
	<meta property="product:price:currency" content="INR">
	<meta property="product:price:amount" content="1249">
</head>

<body>
	<div class="preloader"></div>
	<?php require("include/header.php"); ?>
	<div class="page-wrapper">
		<!--Page Title-->
		<section class="page-title" style="background-image:url(<?= SITEURL ?>images/background/5.jpg)">
			<div class="auto-container">
				<h2>Product Details</h2>
				<ul class="page-breadcrumb">
					<li><a href="<?= SITEURL ?>">home</a></li>
					<li><a href="<?= SITEURL ?>product-list">Product list</a></li>
					<li><?= @$product_d["name"] ?></li>
				</ul>
			</div>
		</section>
		<!--End Page Title-->

		<!--Single Product Section-->
		<section class="shop-single-section">
			<div class="auto-container">

				<div class="shop-single">
					<div class="product-details">

						<!--Basic Details-->
						<div class="basic-details">
							<div class="row clearfix">
								<div class="image-column col-lg-6 col-md-12 col-sm-12">
									<figure class="image-box"><a href="<?= SITEURL . PRODUCT . @$product_d['image_path'] ?>" class="lightbox-image" title="Image Caption Here"><img src="<?= SITEURL . PRODUCT . @$product_d['image_path'] ?>" alt=""></a></figure>
								</div>
								<div class="info-column col-lg-6 col-md-12 col-sm-12">
									<div class="inner-column">
										<h4><?= @$product_d["name"] ?></h4>
										<div class="text"><?= html_entity_decode(@$product_d["description"]) ?></div>
                                        <?php if(isset($product_d['price']) && !empty($product_d['price'])) { ?>
                                        	<div class="price">Price : <span>INR <?= $product_d['price'] ?></span></div>
                                        <?php } else { ?>
                                        	<div class="price">Price Not Available</div>
                                        <?php } ?>
										</br>

										<div class="social-share"><h3 style="margin-left: 2.5rem!important;">Share this product on social media</h3> </br>
											<ul class="social-icons" style="display: flex; justify-content:center;">
												<li><a href="https://api.whatsapp.com/send?text=http://www.katdoorcloser.com/product-details/<?php echo $id?>" target="_blank"><span class="fab fa-whatsapp"></span></a></li>
												<li><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.katdoorcloser.com/product-details/<?php echo $id?>" target="_blank"><span class="fab fa-facebook-f"></span></a></li>
												<li><a href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fwww.katdoorcloser.com/product-details/<?php echo $id?>" target="_blank"><span class="fab fa-twitter"></span></a></li>
												<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2Fwww.katdoorcloser.com/product-details/<?php echo $id?>" target="_blank"><span class="fab fa-linkedin-in"></span></a></li>
												<li><a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.katdoorcloser.com/product-details/<?php echo $id?>" target="_blank"><span class="fab fa-pinterest-p"></span></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--Basic Details-->


						<!--Product Info Tabs-->
						<div class="product-info-tabs">
							<!--Product Tabs-->
							<div class="prod-tabs tabs-box">

								<!--Tab Btns-->
								<ul class="tab-btns tab-buttons clearfix">
									<li data-tab="#prod-details" class="tab-btn active-btn">Description</li>
									<li data-tab="#prod-reviews" class="tab-btn">Inquiry</li>
								</ul>

								<!--Tabs Container-->
								<div class="tabs-content">

									<!--Tab / Active Tab-->
									<div class="tab active-tab" id="prod-details">
										<div class="content">
											<p><?= html_entity_decode(@$product_d["meta_descr"]) ?></p>
										</div>
									</div>

									<!--Tab-->
									<div class="tab" id="prod-reviews">
										<!-- Comment Form -->
										<div class="shop-comment-form">
											<h2>Inquiry Form</h2>

											<form method="post" name="inquiryForm" id="inquiryForm" action="">
												<div class="row clearfix">
													<div class="col-md-6 col-sm-6 col-xs-12 form-group">
														<label for="username">Name *</label>
														<input class="form-control" type="text" name="username" id="username" placeholder="" required>
													</div>

													<div class="col-md-6 col-sm-6 col-xs-12 form-group">
														<label for="email">Email address*</label>
														<input type="email" class="form-control" name="email" id="email" placeholder="" required>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12 form-group">
														<label for="mobile_no">Mobile Number*</label>
														<input type="tel" class="form-control" name="mobile_no" id="mobile_no" placeholder="" required>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12 form-group">
														<label for="p_quantity">Quantity*</label>
														<input type="number" class="form-control" min="0" name="p_quantity" id="p_quantity" placeholder="" required>
													</div>
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
														<label for="message">Message*</label>
														<textarea class="form-control" name="message" id="message" placeholder=""></textarea>
													</div>
													<input type="hidden" name="pid" value="<?= isset($id) ? $id : 0 ?>">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
														<button class="submit-btn btn-style-four" type="submit" name="submit-form"><span class="txt">Submit now</span></button>
														<img src="<?= SITEURL ?>images\icons\spinner.gif" id="loader2" style="display: none;" />
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--End Product Info Tabs-->

						<div>
							<h4 class="pb-2">Related Products</h4>
							<?php if(!empty($relatedProductData)) { ?>

						        <div class="slider slider_four_in_line">
						        	<?php 
						        		foreach ($relatedProductData as $key => $productData) { ?>
						        			<div>
							        			<a href="<?= SITEURL.'product-details/'.@$productData[0]?>" class="" title="<?= @$productData[4] ?>">
							        				<img src="<?= SITEURL . PRODUCT . @$productData[11] ?>" alt="">
							        			</a>
							        		</div>
						        		<?php }
						        	?>
						            <div class="next_button"></div>
						            <div class="prev_button"></div>
						        </div>
						    <?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--End Single Product Section-->

		<!--Main Footer-->
		<?php require("include/footer.php") ?>
	</div>
	<!--End pagewrapper-->

	<script type="text/javascript">
		EasySlides('.slider_four_in_line',
        {
            'autoplay': true,
            // 'show': 0
        })
		/*------productform validation start-------*/
		$(function() {
			$.validator.addMethod("regex", function(value, element, regexp) {
					var re = new RegExp(regexp);
					return this.optional(element) || re.test(value);
				}),
				$("form[name='inquiryForm']").validate({
					rules: {
						username: {
							required: true,
							regex: "^[a-zA-Z]+$"
						},
						email: {
							required: true,
							email: true
						},
						mobile_no: {
							required: true,
							regex: "^[0-9]+$",
							minlength: 10,
							maxlength: 12
						},
						p_quantity: {
							required: true
						},
						message: {
							required: true
						},
					},
					messages: {
						username: {
							required: "<span style='color:red; font-size:14px; font-weight:normal;'>Enter Your Name<span/>",
							regex: "<b style='color:red; font-size:14px; font-weight:normal;'>Please Enter Valid Name </b>"
						},
						email: {
							required: "<p style='color:red; font-size:14px; font-weight:normal;'>Enter Email Address</p>",
							email: "<p style='color:red; font-size:14px; font-weight:normal;'>Please Enter Valid Email Address</p>"

						},
						mobile_no: {
							required: "<p style='color:red; font-size:14px; font-weight:normal;'>Enter Phone Number</p>",
							regex: "<b style='color:red; font-size:14px; font-weight:normal;'>Please Enter Valid Mobile Number </b>",
							minlength: "<b style='color:red; font-size:14px; font-weight:normal;'>Mobile Number length at least 10-12 digit.. </b>",
							maxlength: "<b style='color:red; font-size:14px; font-weight:normal;'>Mobile Number length at least 10-12 digit.. </b>"
						},
						p_quantity: {
							required: "<p style='color:red; font-size:14px; font-weight:normal;'>Enter Product Quantity</p>"
						},
						message: {
							required: "<p style='color:red; font-size:14px; font-weight:normal;'>Enter Message</p>"
						}
					}
					// submitHandler: function(form) {
					//     form.submit();
					// }
				});
		});
		/*------productform validation end-------*/
		/*------productform submit ajax start-------*/
		$("#inquiryForm").on("submit", function(e) {
			e.preventDefault();
			var request_method = $(this).attr("method"); //get form GET/POST method
			var form_data = $("#inquiryForm").serialize();
			var name = $('#username').val();
			var email = $('#email').val();
			var mobile_no = $('#mobile_no').val();
			var p_quantity = $('#p_quantity').val();
			var pid = $('#pid').val();
			var message = $('#message').val();

			let error = false;
			if (name == '') {
				error = true;
			}
			if (email == '') {
				error = true;
			}
			if (mobile_no == '') {
				error = true;
			}
			if (p_quantity == '') {
				error = true;
			}
			if (message == '') {
				error = true;
			}
			if (error == false) {
				$.ajax({
					url: "<?= SITEURL ?>ajax_product_inquiry.php",
					type: "POST",
					data: $("#inquiryForm").serialize(),

					beforeSend: function() {
						$('#loader2').show();
						$('.submit-btn').prop('disabled', true);
						$('.submit-btn').hide();
					},
					complete: function() {
						$('#loader2').hide();
						$('.submit-btn').prop('disabled', false);
						$('.submit-btn').show();
					},
					success: function(result) {
						let jsonData = JSON.parse(result);
						if (jsonData.ack == 1) {
							toastr.success("Your Query Submitted Successfully, We Will Review The Query and Contact You Soon...");
							$("#inquiryForm")[0].reset();
						} else {
							toastr.warning("Something Went wrong...");
						}
					}
				});
			}
		})
		/*------productform submit ajax end-------*/
	</script>
</body>

</html>