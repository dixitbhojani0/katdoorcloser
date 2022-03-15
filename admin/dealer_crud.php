<?php
  $page_id="10";
  include("connect.php");
  
  // PAGE DECLARATION
  $main_page 	= "dashboard";
  $page 		= "Dealer";
  $page_title	= "Add/Edit dealer";
  $page_hierarchy=array(array("link"=>"dashboard.php","title"=>"dashboard"),array("link"=>"dealer_manage.php","title"=>"Manage Dealer"),array("link"=>"dealer_crud.php","title"=>"Add/Edit Dealer"));
  $success_msg=array();
  $error_msg=array();
  // PAGE DECLARATION
  
  // INCLUDE CLASS
  include('../include/class.dealer.php');
  
  $cat_obj=new Dealer();
  $mode=isset($_REQUEST['mode'])?$_REQUEST['mode']:"a";
  
  // Variable Definations
  $id='';$name='';$slug='';$title_bar='';$meta_descr="";$image_path="";$description="";$add_date="";$email="";
  
  if(isset($_REQUEST['submit'])){
  	
  	// Variable Declaration
  	// GET SUBMITTED FORM VALUES
  $params=array();
  if(isset($_REQUEST['id']))
  $params['id']=trim($db->clean($_REQUEST['id']));
  $params['company_name']=trim($db->clean($_REQUEST['company_name']));
  $params['slug']=$db->rp_createSlug($_REQUEST['company_name']);
  $params['address']=trim($db->clean($_REQUEST['address']));
  $params['country']=$db->clean($_REQUEST['country']);
  $params['state']=$db->clean($_REQUEST['state']);
  $params['city']=$db->clean($_REQUEST['city']);
  $params['pincode']=$db->clean($_REQUEST['pincode']);
  $params['email']=$db->clean($_REQUEST['email']);
  $params['mobile_no']=$db->clean($_REQUEST['mobile_no']);
  $params['website']=$db->clean($_REQUEST['website']);
  
  	if($mode=='a')
  	{
  		$params['adate']=date("Y-m-d H:i:s");
  		$reply=$cat_obj->insert($params,array("key"=>"name","value"=>$params['name']),$_FILES);
  		if($reply['ack']==1)
  		{
  			$success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("dealer_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
  		}
  	}
  	else if($mode=='e')
  	{
  		//print_r($params); exit;
  		
  		$reply=$cat_obj->update($params,$params['name'],$params['id'],$_FILES);
  		if($reply['ack']==1)
  		{
  			$success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("dealer_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
              $_SESSION['error_msg']= $error_msg;
              $db->rp_location("dealer_manage.php");
          }
  	}
  	else if($mode=='d')
  	{
  
  		$reply=$cat_obj->delete(array("key"=>"id","value"=>$params['id']));
  		if($reply['ack']==1)
  		{
  		    $success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("dealer_manage.php");
  		}
  		else
  		{
  		    $error_msg[]=$reply['ack_msg'];
              $_SESSION['error_msg']= $error_msg;
              $db->rp_location("dealer_manage.php");
  		}
  	}
  	else if($mode=='ac')
  	{
  	   //
          $params['status']=$_REQUEST['status'];
  		$reply=$cat_obj->active(array("key"=>"id","value"=>$params['id'],"status"=>$params['status']));
  		if($reply['ack']==1)
  		{
  		    $success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("dealer_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
              $_SESSION['error_msg']= $error_msg;
              $db->rp_location("dealer_manage.php");
  		}
  	}
  
  	else if($mode=='f')
  	{
  	   //
          $params['isFav']=$_REQUEST['fav'];
  		$reply=$cat_obj->favorite_category(array("key"=>"id","value"=>$params['id'],"isFav"=>$params['isFav']));
  		if($reply['ack']==1)
  		{
  		    $success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("dealer_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
              $_SESSION['error_msg']= $error_msg;
              $db->rp_location("dealer_manage.php");
  		}
  	}
  
  }
  
  if($mode=="e")
  {
  	// GET REQUIRED VALUE FROM DATABASE
  
  	
  	   $id=trim($db->clean($_REQUEST['id']));
  
  		$reply=$cat_obj->view("id='".$id."'","","","",true,true);
  		if($reply['ack']==1)
  		{
  			extract($reply['result'][0]);
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
  		}
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <!--<![endif]-->
  <!-- BEGIN HEAD -->
  <head>
    <meta charset="utf-8" />
    <title><?php echo SITETITLE; ?> | Add/Edit Dealer</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <?php include("include_css.php");?>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL STYLES -->
    <!--- css for drop Down-->
    <link href="../assets/global/css/demo.html5imageupload.css?v1.3" rel="stylesheet">
    <style>
      .btn1{
      padding:0 5px !important;
      }
      .box-attr{
      font-size:14px !important;
      }
      .box-header{
      padding-bottom:0 !important;
      }
    </style>
  </head>
  <!-- END HEAD -->
  <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-md">
    <div class="page-wrapper">
      <?php include("top.php");?>
      <!-- BEGIN HEADER & CONTENT DIVIDER -->
      <div class="clearfix"> </div>
      <!-- END HEADER & CONTENT DIV IDER -->
      <!-- BEGIN CONTAINER -->
      <div class="page-container">
        <?php include('sidebar.php'); ?>	
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
          <!-- BEGIN CONTENT BODY -->
          <div class="page-content">
            <!-- BEGIN PAGE HEADER-->                        
            <?php $system->changeThemeMenu();?>
            <?php $system->pageBar($page_hierarchy);?> 
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> Add/Edit Dealer
              <small>Add/Edit Dealer</small>
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
              <div class="col-md-12">
                <?php 
                  if(!empty($success_msg)){
                  	?>			
                <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <?php 
                    foreach($success_msg as $s)
                    {
                    ?>
                  <b>Success! </b><?php echo $s; ?>
                  <?php }?>
                </div>
                <?php
                  }
                  if(!empty($error_msg)){
                  ?>
                <div class="alert alert-danger alert-dismissable"> <i class="fa fa-ban"></i>
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <?php 
                    foreach($error_msg as $e)
                    {
                    ?>
                  <b>Error! </b><?php echo $e; ?>
                  <?php 
                    }
                    ?>
                </div>
                <?php
                  }
                  ?>
              </div>
            </div>
            <!-- END PAGE HEADER-->
            <div class="row">
              <!-- FORM START -->
              <form method="POST" role="form" id="form_bus" name="form_bus" enctype="multipart/form-data" class="" action="">
                <div class="col-md-12 ">
                  <!-- BEGIN SAMPLE FORM PORTLET-->
                  <div class="portlet light bordered">
                    <div class="portlet-title">
                      <div class="caption font-red-sunglo">
                        <span class="caption-subject bold uppercase"> <i class="fa fa-plus"></i> &nbsp; Add/Edit Dealer</span>
                      </div>
                      <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;">
                        </a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="portlet-body form">
                          <div class="form-group">
                            <label for="name">Company Name<code>*</code></label>
                            <input class="form-control " value="<?php echo $company_name;  ?>" name="company_name" id="company_name" type="text"  data-validation="required"    data-validation-error-msg="Enter Company Name" >
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control "  name="address" id="address" type="text"><?php echo $address ; ?></textarea>
                            <!--<span class="help-block"></span>-->
                          </div>
                          <label for="name">Country<code>*</code></label>
                          <select class="form-control" name="country" onChange="getState(this.value);" data-validation="required" id="country">
                            <option value="">Select country</option>
                            <?php
                              $sel_cat=$db->rp_getdata("country","*","","",0);
                              while($ctable_d=mysqli_fetch_assoc($sel_cat)){?>
                            <option value="<?php echo $ctable_d['id']; ?>"
                              <?php if($country==$ctable_d['id']){?> selected <?php } ?>
                              >
                              <?php echo $ctable_d['name']; ?>
                            </option>
                            <?php
                              }
                              ?>
                          </select>
                          <label for="name">state<code>*</code></label>
                          <select id="state" class="form-control" name="state" onChange="getCity(this.value);" data-default="<?php echo $state;?>" data-validation="required">
                            <option value="">Select state</option>
                          </select>
                          <label for="name">city<code>*</code></label>
                          <select id="city" class="form-control" name="city" data-validation="required" data-default="<?php echo $city;?>">
                            <option value="">Select city</option>
                          </select>
                          <div class="form-group">
                            <label for="name">Pincode</label>
                            <input class="form-control " value="<?php echo $pincode;  ?>" name="pincode" id="pincode" type="text"  data-validation="required,number" data-validation-error-msg="Enter Pincode Number" >
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group">
                            <label for="name">Email</label>
                            <input class="form-control " value="<?php echo $email;  ?>" name="email" id="email" type="text"  data-validation="required,email" data-validation-error-msg="Enter Email Address" >
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group">
                            <label for="name">Mobile No</label>
                            <input class="form-control " value="<?php echo $mobile_no;  ?>" name="mobile_no" id="mobile_no" type="text"  data-validation="required,length,number" data-validation-length="10" data-validation-error-msg="Please enter valid 10 digits number">
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group">
                            <label for="name">Website</label>
                            <input class="form-control " value="<?php echo $website;  ?>" name="website" id="website" type="text"  data-validation="required,url" data-validation-error-msg="Enter Website" >
                            <span class="help-block"></span>
                          </div>
                          <div class="form-actions noborder">
                            <button type="submit" name="submit" class="btn blue">Submit</button>
                          </div>
                        </div>
                      </div>
                      <!--div class="col-md-6">									
                        <div class="form-group">
                        	<label for="logo">Select Category Image</label>
                        	&nbsp;&nbsp;&nbsp;
                        	
                        		<div class="portlet light bordered">
                        		 <div class="form-body">
                        			<div class="row">
                        				<div class="col-sm-12">
                        					<div class="form-group">
                        					<input data-image="<?php echo ($image_path!="" && file_exists(CATEGORY_A.$image_path))?CATEGORY_A.$image_path:"";?>" type="file" name="image_path" id="image_path" data-old-image-dom="old_image_path" data-old-image-path="<?php echo $image_path ?>" value="" >
                        					</div>
                        				</div>
                        			</div>
                        			
                        		</div>
                        	</div>
                        	
                        </div>
                        </div-->
                    </div>
                  </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
          </div>
          </form>
          <!-- FORM END -->
        </div>
      </div>
      <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <?php include('footer.php'); ?>
    </div>
    <!--[if lt IE 9]>
    <script src="../assets/global/plugins/respond.min.js"></script>
    <script src="../assets/global/plugins/excanvas.min.js"></script> 
    <![endif]-->
    <?php include('include_js.php');?>
    <script src="js/ckeditor/ckeditor.js" type="text/javascript"></script> 
    <!-- START PAGELEVEL JS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
      $.validate({
      lang: 'en'
      });
       $("#mobile_no").numeric();
       $("#pincode").numeric();
      
    </script>
    <script>
      $(document).ready(function(){
      		/*CKEDITOR.replace('address');*/
      		getState()
      });
      
      var isImageThumbnailLoaded=false;
      var isImageThumbnailValid=false;
      
      $(function(){
      	
      	
      	aj.imageHolder($("input[name=image_path]"),"","",
      	
      	function(file,img)
      	{
      		if(!file)
      		{
      			toastr.error("File may be corrupted or missing. Try again!!");
      		}
      	},
      	function(isImageThumbnailLoadedReply,isImageThumbnailValidReply,image_width,image_height){
      		isImageThumbnailLoaded=isImageThumbnailLoadedReply;
      		isImageThumbnailValid=isImageThumbnailValidReply;
      			toastr.success("Selected File Dimension: "+image_width+" X "+image_height);
      		},
      	function(data){
      		isImageThumbnailLoadedReply
      	}
      	);
      	
      	
      }); 
    </script>
    <script type="text/javascript">
      function getState(){
      	var id=$("#country").val();
      	var default_state=$("#state").data("default");
      			$.ajax({
      				type: "POST",
      				url: "country_get_ajax.php",
      				data: {
      					country:id,
      					default_state:default_state,
      				},
      				beforeSend: function() {
      					$(".transCover").fadeIn(800);
      				},
      				success: function(result){ 
      						$('#state').html(result);
      						getCity();
      					},
      				error:function()
      				{
      					toastr.error("Something went wrong!!")
      				}
      			});
      		}
      
      function getCity(){
      	var id=$("#state").val();
      	var default_city=$("#city").data("default");
      	 $.ajax({
      				type: "POST",
      				url: "state_get_ajax.php",
      				data: {
      					state:id,
      					default_city:default_city,
      				},
      				beforeSend: function() {
      					$(".transCover").fadeIn(800);
      				},
      				success: function(result){ 
      						 $('#city').html(result);
      					},
      				error:function()
      				{
      					toastr.error("Something went wrong!!")
      				}
      			});
      }
    </script>
    <!-- END PAGELEVEL JS -->
  </body>
</html>