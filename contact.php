<!DOCTYPE html>
<html lang="zxx">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Flowtop-Contact-Us</title>	
	<!-- include_css start -->
	<?php
	    include('include_css.php');
	?>
	<!-- include_css end -->
	<?php
      /*------condition-------*/
      $where="isDelete=0 AND isActive=1";
      /*------contact_us_info get Data-------*/
      $get_contact_r=$db->rp_getData("contact_us_info","*",$where,0);
      $get_contact_d = !empty($get_contact_r) ? mysqli_fetch_assoc($get_contact_r) : '';
    ?>

</head>

<body>
	<!-- include_header start -->
	<?php
		include('include_header.php');
	?>
	<!-- include_header end -->
	<!-- /contact-grid1 -->
	<section class="w3l-contact-section-main">
		<div class="contact-sec-inner">
		</div>
		<!-- //contact-grid1 -->

	</section>
	<!-- /contact-form -->
	<section class="w3l-contact-section-form">
		<div class="contact-sec-inner py-5">
			<div class="container py-lg-5">
				<div class="contact-form-mainv">
					<span class="sub-title">Contact Us</span>
					<h3 class="hny-title">Keep In Touch With Us.</h3>
					<p class="para-contact mb-lg-5 mb-4">Welcome to leave your contact info and we will be in touch
						shortly
					</p>
					<div class="row">
						<div class="col-md-8">
							<form id="contact-form" name="contact-form" action="" method="post">

								<div class="row">
									<div class="col-lg-6 form-group">	
										<label for="name">Your Name</label>
										<input type="text" name="name" id="name">
									</div>
									<div class="col-lg-6 form-group">
										<label for="email">Your Email ID</label>
										<input type="text" name="email" id="email">
									</div>
									<div class="col-lg-6 form-group">
										<label for="mobile_no">Your Mobile No.</label>
										<input type="text" name="mobile_no" id="mobile_no">
									</div>
									<div class="col-lg-6 form-group">
										<label for="subject">Subject</label>
										<input type="text" name="subject" id="subject">
									</div>
								</div>
								<div class="form-group">
									<label for="message">Message</label>
									<textarea name="message" id="message" placeholder="" required=""></textarea>
								</div>
								<div class="form-submit mt-4">
									<button  type="submit" name="submit" id="submit" class="btn submit">Submit</button>
								</div>
							</form>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 plft85">
				            <ul class="contact_info">
				              	<li class="cnt_map_icon">
				                	<p><?= html_entity_decode($get_contact_d["address"])?></p>
				              	</li>
				              	<li class="cnt_mail_icon">
				                	<a href="mailto:<?= @$get_contact_d['email']?>">
				                  		<p class="line_he2" style="padding: 19px 0px 0px 0px;"><?= @$get_contact_d["email"]?></p>
				                	</a>
				              	</li>
				            	<li class="cnt_call_icon">
				                	<a href="tel:<?= @$get_contact_d["phone"]?>">
				                  		<p class="line_he2" style="padding: 20px 0px 0px 0px;"><?=@$get_contact_d["phone"]?></p>
				                	</a>
				                	<a href="tel:<?= @$get_contact_d["phone_2"]?>">
				                  		<p class="line_he2"><?= @$get_contact_d["phone_2"]?></p>
				                	</a>
				                	<a href="tel:<?= @$get_contact_d["phone_3"]?>">
				                  		<p class="line_he2"><?= @$get_contact_d["phone_3"]?></p>
				                	</a>
				            	</li>
				            </ul>
				        </div>
					</div>
					
				</div>
			</div>
			<div class="google-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14753.57768306649!2d70.04900242155813!3d22.414175800921804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39576b49eaaaaaab%3A0xbf178e53a199fc3e!2sFlowtop%20Bath%20Fittings!5e0!3m2!1sen!2sin!4v1613238478368!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
		</div>
	</section>
	<!-- //contact-form -->

	<!-- include_footer start -->
	<?php
	include('include_footer.php');
	?>
	<!-- include_footer end -->
	<script type="text/javascript">
      /*------contact-form validation start-------*/
      $(function() {
        $.validator.addMethod("regex",function(value,element,regexp)
        {
            var re= new RegExp(regexp);
            return this.optional(element) || re.test(value);
        }),
        $("form[name='contact-form']").validate({
          rules: 
          {
            name:
            {
              required: true,
              regex: "^[a-zA-Z]+$"
            },
            email:
            {
              required: true,
              email: true
            },
            mobile_no:
            {
              required: true,
              regex: "^[0-9]+$",
              minlength : 10,
              maxlength: 12 
            },
            subject:
            {
              required: true
            },
            message:
            {
              required: true
            },
          },
          messages: 
          {
            name: 
            {
              required: "<span style='color:red; font-size:14px; font-weight:normal;'>Enter Your Name<span/>",
              regex: "<b style='color:red; font-size:14px; font-weight:normal;'>Please Enter Valid Name </b>" 
            },
      
            email:
            {
              required:"<p style='color:red; font-size:14px; font-weight:normal;'>Enter Email Id</p>",
              email:"<p style='color:red; font-size:14px; font-weight:normal;'>Please Enter Valid Email Id</p>"

            },
            mobile_no:
            {
              required:"<p style='color:red; font-size:14px; font-weight:normal;'>Enter Mobile Number</p>",
              regex: "<b style='color:red; font-size:14px; font-weight:normal;'>Please Enter Valid Mobile Number </b>",
              minlength : "<b style='color:red; font-size:14px; font-weight:normal;'>Mobile Number length at least 10-12 digit.. </b>",
              maxlength : "<b style='color:red; font-size:14px; font-weight:normal;'>Mobile Number length at least 10-12 digit.. </b>"
            },
            subject: 
            {
              required: "<p style='color:red; font-size:14px; font-weight:normal;'>Enter Subject</p>"
            },
            message: 
            {
              required: "<p style='color:red; font-size:14px; font-weight:normal;'>Enter Message</p>"
            }    
          },
          submitHandler: function(form) 
          {
            form.submit();
          }
        });
      });
      /*------contact-form validation end-------*/
      /*------contact-form submit ajax start-------*/
      $("#contact-form").on("submit", function(e) {
        e.preventDefault();
         //alert('test');
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $("#contact-form").serialize();
        var name=$('#name').val();
        var email=$('#email').val();
        var mobile_no=$('#mobile_no').val();
        //var product=$('#product').val();
        var subject=$('#subject').val();
        //var pid=$('#pid').val();
        var special_request=$('#special_request').val();

        let error = false;
        if(name == '') {
            error = true;
            //$("#warning-name").text('Please enter your name');
        }
        if(email == '') {
            error = true;
            //$("#warning-email").text('Please enter your email');
        }
        if(mobile_no == '') {
            error = true;
            //$("#warning-mobile_no").text('Please enter your mobile number');
        }
        if(special_request == '') {
            error = true;
            //$("#warning-product").text('Please select product');
        }
        if(subject == '') {
            error = true;
            //$("#warning-subject").text('Please select subject');
        }
        // console.log(error)
        if(error == false) {
          $.ajax(
          {
            url:"<?=SITEURL?>ajax_insert_contact.php",
            type:"POST",
            data:$("#contact-form").serialize(),
            
            beforeSend:function()
            {
            },
            success:function(result)
            {
              let jsonData = JSON.parse(result);  
              // console.log(jsonData)
              if(jsonData.ack==1)
              {
              toastr.success("We Will Contact You Soon...");
              $("#contact-form")[0].reset();
              $("#warning-subject").text('');
              $("#warning-name").text('');
              $("#warning-email").text('');
              $("#warning-mobile_no").text('');
              $("#warning-special_request").text('');
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
      /*------contact-form submit ajax end-------*/
    </script>
</body>

</html>