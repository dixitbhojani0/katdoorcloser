<?php
$page_id="513";
include("connect.php");

// PAGE DECLARATION
$main_page 	= "dashboard";
$page 		= "About Us";
$page_title	= "Add About Us";
$page_hierarchy=array(array("link"=>"dashboard.php","title"=>"Dashboard"),array("link"=>"about_us.php","title"=>"About Us"));
$success_msg=array();
$error_msg=array();
// PAGE DECLARATION

// INCLUDE CLASS
include('../include/class.about_us.php');

$obj=new About_Us();

$mode=isset($_REQUEST['mode'])?$_REQUEST['mode']:"a";

// Variable Definations
$id='';$address='';$phone='';$email='';$time='';
if(isset($_REQUEST['submit'])){
	// Variable Declaration
	// GET SUBMITTED FORM VALUES
$params=array();
if(isset($_REQUEST['id']))
$params['id']=trim($db->clean($_REQUEST['id']));
$params['short_title']=trim($db->clean($_REQUEST['short_title']));
$params['long_title']=trim($db->clean($_REQUEST['long_title']));
$params['short_description']=trim($db->clean(htmlentities($_REQUEST['short_description'])));
$params['big_description']=trim($db->clean(htmlentities($_REQUEST['big_description'])));
$params['our_vision']=trim($db->clean(htmlentities($_REQUEST['our_vision'])));
$params['our_mission']=trim($db->clean(htmlentities($_REQUEST['our_mission'])));
// $params['short_image_path']=trim($db->clean(htmlentities($_REQUEST['short_image_path'])));
// $params['big_image_path']=trim($db->clean(htmlentities($_REQUEST['big_image_path'])));

// print_r($params);exit;
	if($mode=='a')
	{
	   //$params['created_date']=date("Y-m-d H:i:s");
	   $reply=$obj->insert($params,"id='".$_REQUEST['id']."'",$_FILES,$_FILES);
		if($reply['ack']==1)
		{
			$success_msg[]=$reply['ack_msg'];
         $_SESSION['success_msg']= $success_msg;
         $db->rp_location("about_us.php");
		}
		else
		{
			$error_msg[]=$reply['ack_msg'];
         $_SESSION['error_msg']= $error_msg;
         $db->rp_location("about_us.php");
		}
	}
}

if(true)
{   
	// GET REQUIRED VALUE FROM DATABASE   
	$contact_us_info=$db->rp_getData("about_us","*","1=1 LIMIT 1");
	if($contact_us_info)
	{
		$contact_us_info=mysqli_fetch_assoc($contact_us_info);
		extract($contact_us_info);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
   <!--<![endif]-->
   <!-- BEGIN HEAD -->
   <head>
      <meta charset="utf-8" />
      <title><?php echo SITETITLE; ?> | Add About Us</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1" name="viewport" />
      <meta content="" name="description" />
      <meta content="" name="author" />
      <?php include("include_css.php");?>
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      <link href="../assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
      <link href="../assets/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css" />
      <!-- END PAGE LEVEL STYLES -->
   </head>
   <!-- END HEAD -->
   <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-md">
      <div class="page-wrapper">
         <?php include("top.php");?>
         <!-- BEGIN HEADER & CONTENT DIVIDER -->
         <div class="clearfix"> </div>
         <!-- END HEADER & CONTENT DIVIDER -->
         <!-- BEGIN CONTAINER -->
         <div class="page-container">
            <?php include('sidebar.php'); ?>	
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
               <!-- BEGIN CONTENT BODY -->
               <div class="page-content">
                  <!-- BEGIN PAGE HEADER-->                        
                  <?php $system->changeThemeMenu();?> 
                  <!-- BEGIN PAGE TITLE-->
                  <h1 class="page-title"> About Us
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
                     <form method="post" role="form" id="form_contact" name="form_contact" class="" enctype="multipart/form-data" action="" onSubmit="return check_form();">
                        <div class="col-md-6">
                           <!-- BEGIN SAMPLE FORM PORTLET-->
                           <div class="portlet light bordered">
                              <div class="portlet-title">
                                 <div class="caption font-red-sunglo">
                                    <span class="caption-subject bold uppercase"> <i class="fa fa-plus"></i> &nbsp; Detail</span>
                                 </div>
                                 <div class="actions">
                                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;">
                                    </a>
                                 </div>
                              </div>
                              <div class="portlet-body form">
                                 <div class="form-group form-md-line-input form-md-floating-label">
                                    <input class="form-control" value="<?php echo $short_title; ?>" name="short_title" id="short_title" type="text">
                                    <label for="phone">Short Title</label>
                                    <p class="help-block"></p>
                                 </div>
                                 <div class="form-group form-md-line-input form-md-floating-label">
                                    <input class="form-control" value="<?php echo $long_title; ?>" name="long_title" id="long_title" type="text" >
                                    <label for="email">Long Title</label>
                                    <p class="help-block"></p>
                                 </div>
                                 <div class="form-group form-md-line-input form-md-floating-label">
                                    <textarea class="form-control textarea " value="" name="short_description" id="short_description" type="text"><?php echo $short_description; ?></textarea>
                                    <label for="short_description">Short Description</label>
                                    <p class="help-block"></p>
                                 </div>
                                 <div class="form-group form-md-line-input form-md-floating-label">
                                    <textarea class="form-control textarea " value="" name="big_description" id="big_description" type="text"><?php echo $big_description; ?></textarea>
                                    <label for="big_description">Big Description</label>
                                    <p class="help-block"></p>
                                 </div>
                                 <div class="form-group form-md-line-input form-md-floating-label">
                                    <textarea class="form-control textarea " value="" name="our_vision" id="our_vision" type="text"><?php echo $our_vision; ?></textarea>
                                    <label for="our_vision">Our Vision</label>
                                    <p class="help-block"></p>
                                 </div>
                                 <div class="form-group form-md-line-input form-md-floating-label">
                                    <textarea class="form-control textarea " value="" name="our_mission" id="our_mission" type="text"><?php echo $our_mission; ?></textarea>
                                    <label for="our_mission">Our Mission</label>
                                    <p class="help-block"></p>
                                 </div>
                                 <div class="form-actions noborder">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <button type="submit" name="submit" class="btn blue">Submit</button>
                                 </div>
                              </div>
                           </div>
                           <!-- END SAMPLE FORM PORTLET-->
                        </div>
                        <div class="col-md-6">
                           <div class="portlet light bordered">
                              <div class="portlet-title">
                                 <div class="caption font-red-sunglo">
                                    <span class="caption-subject bold uppercase"> <i class="fa fa-plus"></i> &nbsp; image</span>
                                 </div>
                                 <div class="actions">
                                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;">
                                    </a>
                                 </div>
                                 <div class="col-sm-12">
                                    <div class="form-group">
                                       <lable>Select Short Image</lable>
                                       <input data-image="<?php echo ($short_image_path!="" && file_exists(SHORT_IMAGE_A.$short_image_path))?SHORT_IMAGE_A.$short_image_path:"";?>" accept="image/*" type="file" name="short_image_path" id="short_image_path" data-old-image-dom="old_image_path" data-old-image-path="<?php echo $short_image_path ?>" value="" >
                                    </div>
                                 </div>
                                 <div class="col-sm-12">
                                    <div class="form-group">
                                       <lable>Select Big Image</lable>
                                       <input data-image="<?php echo ($big_image_path!="" && file_exists(BIG_IMAGE_A.$big_image_path))?BIG_IMAGE_A.$big_image_path:"";?>" type="file" accept="image/*" name="big_image_path" id="big_image_path" data-old-image-dom="old_image_path_2"  data-old-image-path="<?php echo $big_image_path ?>" value="" >
                                    </div>
                                 </div>
                              </div>
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
      <!-- START PAGELEVEL JS -->
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      <script src="../assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
      <script src="../assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
      <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
      <script src="js/ckeditor/ckeditor.js" type="text/javascript"></script> 
      <script src="js/jquery-aj.js"></script>
      <!-- END PAGE LEVEL SCRIPTS -->
      <script>
         $(document).ready(function(){
         		CKEDITOR.replace('short_description');
               CKEDITOR.replace('big_description');
               CKEDITOR.replace('our_vision');
         		CKEDITOR.replace('our_mission');
         });
         var isImageThumbnailLoaded=false;
         var isImageThumbnailValid=false;
         
         $(function(){
         	
         	
         	aj.imageHolder($("input[name=short_image_path]"),"","",
         	function(isImageThumbnailLoadedReply,isImageThumbnailValidReply){
         		isImageThumbnailLoaded=isImageThumbnailLoadedReply;
         		isImageThumbnailValid=isImageThumbnailValidReply;
         		toastr.success("Old Image Found!!");
         	},
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
         	
         	
         })
         
         var isImageThumbnailLoaded_2=false;
         var isImageThumbnailValid_2=false;
         
         $(function(){
         	
         	
         	aj.imageHolder($("input[name=big_image_path]"),"","",
         	function(isImageThumbnailLoadedReply,isImageThumbnailValidReply){
         		isImageThumbnailLoaded_2=isImageThumbnailLoadedReply;
         		isImageThumbnailValid_2=isImageThumbnailValidReply;
         		toastr.success("Old Image Found!!");
         	},
         	function(file,img)
         	{
         		if(!file)
         		{
         			toastr.error("File may be corrupted or missing. Try again!!");
         		}
         	},
         	function(isImageThumbnailLoadedReply,isImageThumbnailValidReply,image_width,image_height){
         		isImageThumbnailLoaded_2=isImageThumbnailLoadedReply;
         		isImageThumbnailValid_2=isImageThumbnailValidReply;
         			toastr.success("Selected File Dimension: "+image_width+" X "+image_height);
         		},
         	function(data){
         		isImageThumbnailLoadedReply
         	}
         	);
         	
         	
         })
         // $("form").submit( function( e ) {
         // 		var isValid=true;
         // 		var form = this;
         // 		if(!isImageThumbnailValid)
         // 		{	
         // 			toastr.error("Please select thumbnail image!","error");
         // 			isValid=false;
         			
         // 		}
         		
         		
         		
         // 		 return isValid;
         // });	
         
         //  $("form").submit( function( e ) {
         // 		var isValid=true;
         // 		var form = this;
         // 		if(!isImageThumbnailValid_2)
         // 		{	
         // 			toastr.error("Please select thumbnail image!","error");
         // 			isValid=false;
         			
         // 		}
         		
         		
         		
         // 		 return isValid;
         // });
         $("#phone").numeric();
         
         function check_form(){
         	var isValid=true;
         	
         	if($("#short_description").val()=="" || $("#short_description").val().split(" ").join("")==""){
         		aj.error('short_description','Please enter Short Description.','add_error');
         		isValid=false;
         	}
         	/*if($("#big_description").val()=="" || $("#big_description").val().split(" ").join("")==""){
         		aj.error('big_description','Please enter Big Description.','add_error');
         		isValid=false;
         	}*/
         	if($("#short_title").val()=="" || $("#short_title").val().split(" ").join("")==""){
         		aj.error('short_title','Please enter Short Title.','add_error');
         		isValid=false;
         	}
         	if($("#long_title").val()=="" || $("#long_title").val().split(" ").join("")==""){
         		aj.error('long_title','Please enter Long Title address.','add_error');
         		isValid=false;
         	}
         	
         	if(isValid)
         	{
         		return true;
         	}
         	else
         	{
         		return false;
         	}
         }
         $(document).ready(function(){$(".form-control").bind("keyup change",function(){ if($(this).parent().hasClass("has-error")) {$(this).parent().find('.help-block').html(""); $(this).parent().removeClass("has-error"); } }); });
      </script>
      <!-- END PAGELEVEL JS -->
   </body>
</html>