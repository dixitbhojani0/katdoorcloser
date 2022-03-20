<?php
  $page_id="513";
  include("connect.php");
  
  // PAGE DECLARATION
  $main_page 	= "dashboard";
  $page 		= "About Us";
  $page_title	= "Add/Edit About Us";
  $date_s = "";
  $page_hierarchy=array(array("link"=>"dashboard.php","title"=>"dashboard"),array("link"=>"about_us_manage.php","title"=>"Manage About Us"),array("link"=>"about_us_crud.php","title"=>"Add/Edit About Us"));
  $success_msg=array();
  $error_msg=array();
  // PAGE DECLARATION
  
  // INCLUDE CLASS
  include('../include/class.about_us.php');
  
  $banner_obj=new About_us();
  
  $mode=isset($_REQUEST['mode'])?$_REQUEST['mode']:"a";
  
  // Variable Definations
  $id='';$url='';$title='';$target='';$description='';$image_path='';
  
  if(isset($_REQUEST['submit'])){
  	
  
  	// Variable Declaration
  	// GET SUBMITTED FORM VALUES
  $params=array();
  if(isset($_REQUEST['id']))
  $params['id']=trim($db->clean($_REQUEST['id']));
  $params['short_title']=trim($db->clean($_REQUEST['short_title']));
  $params['long_title']=trim($db->clean($_REQUEST['long_title']));
  $params['short_description']=html_entity_decode(trim($db->clean($_REQUEST['short_description'])));
  $params['big_description']=html_entity_decode(trim($db->clean($_REQUEST['big_description'])));
  $params['short_image_path']=trim($db->clean($_REQUEST['short_image_path']));
  $params['big_image_path']=trim($db->clean($_REQUEST['big_image_path']));
  $params['vision_image_path']=trim($db->clean($_REQUEST['vision_image_path']));
  $params['mission_image_path']=trim($db->clean($_REQUEST['mission_image_path']));
  $params['counter_1_title']=trim($db->clean($_REQUEST['counter_1_title']));
  $params['counter_2_title']=trim($db->clean($_REQUEST['counter_2_title']));
  $params['counter_3_title']=trim($db->clean($_REQUEST['counter_3_title']));
  $params['counter_4_title']=trim($db->clean($_REQUEST['counter_4_title']));
  $params['counter_1_value']=trim($db->clean($_REQUEST['counter_1_value']));
  $params['counter_2_value']=trim($db->clean($_REQUEST['counter_2_value']));
  $params['counter_3_value']=trim($db->clean($_REQUEST['counter_3_value']));
  $params['counter_4_value']=trim($db->clean($_REQUEST['counter_4_value'])); 
  $params['our_service_1_title']=trim($db->clean($_REQUEST['our_service_1_title']));
$params['our_service_2_title']=trim($db->clean($_REQUEST['our_service_2_title']));
$params['our_service_3_title']=trim($db->clean($_REQUEST['our_service_3_title']));
$params['our_service_4_title']=trim($db->clean($_REQUEST['our_service_4_title']));
$params['our_service_5_title']=trim($db->clean($_REQUEST['our_service_5_title']));
$params['our_service_6_title']=trim($db->clean($_REQUEST['our_service_6_title']));
$params['our_service_1_desc']=trim($db->clean($_REQUEST['our_service_1_desc']));
$params['our_service_2_desc']=trim($db->clean($_REQUEST['our_service_2_desc']));
$params['our_service_3_desc']=trim($db->clean($_REQUEST['our_service_3_desc']));
$params['our_service_4_desc']=trim($db->clean($_REQUEST['our_service_4_desc']));
$params['our_service_5_desc']=trim($db->clean($_REQUEST['our_service_5_desc']));
$params['our_service_6_desc']=trim($db->clean($_REQUEST['our_service_6_desc']));
  	
  if($mode=='a')
  	{ 
  		$detail['adate']=date("d-m-Y H-i-s a",strtotime($_REQUEST['adate']));
  	  $reply=$banner_obj->insert($params,"",$_FILES,$_FILES);
  		if($reply['ack']==1)
  		{
  			
  			$success_msg[]=$reply['ack_msg'];
        $_SESSION['success_msg']= $success_msg;
        // $db->rp_location("about_us_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
  			$_SESSION['error_msg']= $error_msg;
  			// $db->rp_location("about_us_manage.php");
  		}
  	}
  	else if($mode=='e')
  	{
  		$reply=$banner_obj->update($params,$params['title'],$params['id'],$_FILES,$_FILES);
  		if($reply['ack']==1)
  		{
  			$success_msg[]=$reply['ack_msg'];
        $_SESSION['success_msg']= $success_msg;
        // $db->rp_location("about_us_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
  			$_SESSION['error_msg']= $error_msg;
  			// $db->rp_location("about_us_manage.php");
  		}
  	}
  	else if($mode=='d')
  	{
  		$params['id']=$_REQUEST['id'];
  		
  		$reply=$banner_obj->delete(array("key"=>"id","value"=>$params['id']));
  		if($reply['ack']==1)
  		{
  		    $success_msg[]=$reply['ack_msg'];
          $_SESSION['success_msg']= $success_msg;
          // $db->rp_location("about_us_manage.php");
  		}
  		else
  		{
  	   $error_msg[]=$reply['ack_msg'];
  			$_SESSION['error_msg']= $error_msg;
  			// $db->rp_location("about_us_manage.php");
  		}
  	}
  	else if($mode=='ac')
  	{
  	 $params['isActive']=$_REQUEST['status'];
  		$reply=$banner_obj->active(array("key"=>"id","value"=>$params['id'],"status"=>$params['isActive']));
  		if($reply['ack']==1)
  		{
  		    $success_msg[]=$reply['ack_msg'];
          $_SESSION['success_msg']= $success_msg;
          // $db->rp_location("about_us_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
  			$_SESSION['error_msg']= $error_msg;
  			// $db->rp_location("about_us_manage.php");
  		}
  	}   
  }
  
  if($mode=="e")
  {
  
  	// GET REQUIRED VALUE FROM DATABASE
  
  	$id=trim($db->clean($_REQUEST['id']));
  
  	$reply=$banner_obj->view("id='".$id."'");
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
    <title><?php echo SITETITLE; ?> | Add/Edit About</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <?php include("include_css.php");?>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../assets/global/css/demo.html5imageupload.css?v1.3" rel="stylesheet">
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
            <?php $system->pageBar($page_hierarchy);?> 
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> Add/Edit About
              <small> Add/Edit About</small>
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
              <form role="form" action="" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                  <!-- BEGIN SAMPLE FORM PORTLET-->
                  <div class="col-md-6">
                    <div class="portlet light bordered">
                      <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                          <span class="caption-subject bold uppercase"> <i class="fa fa-plus"></i> &nbsp; Add/Edit About</span>
                        </div>
                        <div class="actions">
                          <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;">
                          </a>
                        </div>
                      </div>
                      <div class="portlet-body form">
                        <input type="hidden" name="mode" id="mode" value="<?php echo $_REQUEST['mode']; ?>">
                        <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>">
                        <div class="form-group">
                          <label for="title">Short Title</label>
                          <input type="text" class="form-control" name="short_title" id="short_title" value="<?php echo $short_title; ?>" >
                        </div>
                        <div class="form-group">
                          <label for="title">Long Title</label>
                          <input type="text" class="form-control" name="long_title" id="long_title" value="<?php echo $long_title; ?>" >
                        </div>
                        <div class="form-group">
                          <label for="description">Short Description</label>
                          <textarea class="form-control" name="short_description" id="short_description"><?php echo $short_description; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="description">Big Description</label>
                          <textarea class="form-control" name="big_description" id="big_description"><?php echo $big_description; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="counter_1_title">Counter 1 Title</label>
                          <input type="text" class="form-control" name="counter_1_title" id="counter_1_title" value="<?php echo $counter_1_title; ?>" >
                        </div>
                        <div class="form-group">
                          <label for="counter_2_title">Counter 2 Title</label>
                          <input type="text" class="form-control" name="counter_2_title" id="counter_2_title" value="<?php echo $counter_2_title; ?>" >
                        </div>
                        <div class="form-group">
                          <label for="counter_3_title">Counter 3 Title</label>
                          <input type="text" class="form-control" name="counter_3_title" id="counter_3_title" value="<?php echo $counter_3_title; ?>" >
                        </div>
                        <div class="form-group">
                          <label for="counter_4_title">Counter 4 Title</label>
                          <input type="text" class="form-control" name="counter_4_title" id="counter_4_title" value="<?php echo $counter_4_title; ?>" >
                        </div>
                        <div class="form-group">
                          <label for="title">Counter 1 Value</label>
                          <input type="text" class="form-control" name="counter_1_value" id="counter_1_value" value="<?php echo $counter_1_value; ?>" >
                        </div>
                        <div class="form-group">
                          <label for="title">Counter 2 Value</label>
                          <input type="text" class="form-control" name="counter_2_value" id="counter_2_value" value="<?php echo $counter_2_value; ?>" >
                        </div>
                        <div class="form-group">
                          <label for="title">Counter 3 Value</label>
                          <input type="text" class="form-control" name="counter_3_value" id="counter_3_value" value="<?php echo $counter_3_value; ?>" >
                        </div>
                        <div class="form-group">
                          <label for="title">Counter 4 Value</label>
                          <input type="text" class="form-control" name="counter_4_value" id="counter_4_value" value="<?php echo $counter_4_value; ?>" >
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- END SAMPLE FORM PORTLET-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="logo">Image</label>
                      &nbsp;&nbsp;&nbsp;
                      <div class="portlet light bordered">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <input data-image="<?php echo ($short_image_path!="" && file_exists(SHORT_IMAGE_A.$short_image_path))?SHORT_IMAGE_A.$short_image_path:"";?>" accept="image/*" type="file" name="short_image_path" id="short_image_path" data-old-image-dom="old_image_path" data-old-image-path="<?php echo $short_image_path ?>" value="" >
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <input data-image="<?php echo ($big_image_path!="" && file_exists(BIG_IMAGE_A.$big_image_path))?BIG_IMAGE_A.$big_image_path:"";?>" type="file" accept="image/*" name="big_image_path" id="big_image_path" data-old-image-dom="old_image_path_2"  data-old-image-path="<?php echo $big_image_path ?>" value="" >
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <input data-image="<?php echo ($vision_image_path!="" && file_exists(VISION_IMAGE_A.$big_image_path))?VISION_IMAGE_A.$vision_image_path:"";?>" type="file" accept="image/*" name="vision_image_path" id="vision_image_path" data-old-image-dom="old_image_path_3"  data-old-image-path="<?php echo $vision_image_path ?>" value="" >
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <input data-image="<?php echo ($mission_image_path!="" && file_exists(MISSION_IMAGE_A.$mission_image_path))?MISSION_IMAGE_A.$mission_image_path:"";?>" type="file" accept="image/*" name="mission_image_path" id="mission_image_path" data-old-image-dom="old_image_path_4"  data-old-image-path="<?php echo $mission_image_path ?>" value="" >
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">Submit</button>
                  <button type="button" class="btn btn-primary" onClick="window.location.href='about_us_manage.php'">Back</button>
                </div>
            </div>
            </form>
          </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
      </div>
      <!-- FORM END -->
    </div>
    <!-- END CONTAINER -->
    <?php include('footer.php'); ?>
    <?php include('include_js.php');?>
    <!-- START PAGELEVEL JS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="js/jquery.form-validator.min.js"></script>
    <script src="js/ckeditor/ckeditor.js" type="text/javascript"></script>                
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
      $.validate({
      lang: 'en'
      });
      
    </script>
    <script>
      $(document).ready(function(){
      		CKEDITOR.replace('short_description');
      		CKEDITOR.replace('big_description');
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
      
      var isImageThumbnailLoaded_3=false;
      var isImageThumbnailValid_3=false;
       
      $(function(){    
          aj.imageHolder($("input[name=vision_image_path]"),"","",
          function(isImageThumbnailLoadedReply,isImageThumbnailValidReply){
            isImageThumbnailLoaded_3=isImageThumbnailLoadedReply;
            isImageThumbnailValid_3=isImageThumbnailValidReply;
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
            isImageThumbnailLoaded_3=isImageThumbnailLoadedReply;
            isImageThumbnailValid_3=isImageThumbnailValidReply;
              toastr.success("Selected File Dimension: "+image_width+" X "+image_height);
          },
          function(data){
            isImageThumbnailLoadedReply
          }
        );
      })
      var isImageThumbnailLoaded_4=false;
      var isImageThumbnailValid_4=false;
     
      $(function(){   
          aj.imageHolder($("input[name=mission_image_path]"),"","",
          function(isImageThumbnailLoadedReply,isImageThumbnailValidReply){
           isImageThumbnailLoaded_4=isImageThumbnailLoadedReply;
           isImageThumbnailValid_4=isImageThumbnailValidReply;
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
            isImageThumbnailLoaded_4=isImageThumbnailLoadedReply;
            isImageThumbnailValid_4=isImageThumbnailValidReply;
              toastr.success("Selected File Dimension: "+image_width+" X "+image_height);
            },
          function(data){
            isImageThumbnailLoadedReply
          }
        );
      })
        
        $("form").submit( function( e ) {
      		var isValid=true;
      		var form = this;
      		if(!isImageThumbnailValid)
      		{	
      			toastr.error("Please select thumbnail image!","error");
      			isValid=false;
      			
      		}
      		
      		
      		
      		 return isValid;
      });	
      
       $("form").submit( function( e ) {
      		var isValid=true;
      		var form = this;
      		if(!isImageThumbnailValid_2)
      		{	
      			toastr.error("Please select thumbnail image!","error");
      			isValid=false;
      			
      		}
      		
      		
      		
      		 return isValid;
      });
    </script>
    <!-- END PAGELEVEL JS -->
  </body>
</html>