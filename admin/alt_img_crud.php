<?php
  $page_id="504";
  include("connect.php");
  
  // PAGE DECLARATION
  $main_page 	= "dashboard";
  $page 		= "alt_img";
  $page_title	= "Add/Edit Alter Image";
  $page_hierarchy=array(array("link"=>"dashboard.php","title"=>"dashboard"),array("link"=>"alt_img_manage.php","title"=>"Manage Alter Image"),array("link"=>"alt_img_crud.php","title"=>"Add/Edit Alter Image"));
  $success_msg=array();
  $error_msg=array();
  // PAGE DECLARATION
  
  // INCLUDE CLASS
  include('../include/class.alt_img.php');
  
  $alt_img_obj=new AlterImage();
  $mode=isset($_REQUEST['mode'])?$_REQUEST['mode']:"a";
  
  // Variable Definations
  $pid=$_REQUEST['pid'];
  
  if(isset($_REQUEST['submit'])){
  	
  
  	// Variable Declaration
  	// GET SUBMITTED FORM VALUES
  $params=array();
  if(isset($_REQUEST['id']))
  $params['id']=trim($db->clean($_REQUEST['id']));
  $params['pid']=trim($db->clean($_REQUEST['pid']));
  $params['image_path']=trim($db->clean($_REQUEST['image_path']));
  $params['old_image_path']=trim($db->clean($_REQUEST['old_image_path']));
    if($mode=='a')
    {
       $params['adate']=date('Y-m-d h:i:s');
       $reply=$alt_img_obj->insert($params,"","",$_FILES);
  		if($reply['ack']==1)
  		{

			        $success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("alt_img_manage.php?pid=".$reply['pid']);
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
  			$_SESSION['error_msg']= $error_msg;
              $db->rp_location("alt_img_manage.php?pid=".$reply['pid']);
  		}
  	}
  	else if($mode=='e')
  	{
  		$reply=$alt_img_obj->update($params,$params['name'],$params['id'],$_FILES);
  		if($reply['ack']==1)
  		{
  			$success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("alt_img_manage.php?pid=".$reply['pid']);
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
              $_SESSION['error_msg']= $error_msg;
              $db->rp_location("alt_img_manage.php?pid=".$reply['pid']);
          }
  	}
  	
  	else if($mode=='d')
  	{
  
  		$reply=$alt_img_obj->delete(array("key"=>"id","value"=>$params['id']));
  		if($reply['ack']==1)
  		{
  		    $success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("alt_img_manage.php?pid=".$reply['pid']);
  		}
  		else
  		{
  		    $error_msg[]=$reply['ack_msg'];
              $_SESSION['error_msg']= $error_msg;
              $db->rp_location("alt_img_manage.php?pid=".$reply['pid']);
  		}
  	}
  }
  
  if($mode=="e")
  {
  
  	// GET REQUIRED VALUE FROM DATABASE
  
  	
  	   $id=trim($db->clean($_REQUEST['id']));
  
  		$reply=$alt_img_obj->view("id='".$id."'");
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
    <title><?php echo SITETITLE; ?> | Add/Edit Product</title>
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
            <h1 class="page-title"> Add/Edit Product
              <small>Add/Edit Product</small>
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
              <form method="POST" role="form" id="form_bus" name="form_bus" class="" action="" enctype="multipart/form-data">
                <div class="col-md-12 ">
                  <!-- BEGIN SAMPLE FORM PORTLET-->
                  <div class="portlet light bordered">
                    <div class="portlet-title">
                      <div class="caption font-red-sunglo">
                        <span class="caption-subject bold uppercase"> <i class="fa fa-plus"></i> &nbsp; Add/Edit Alter Image</span>
                      </div>
                      <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;">
                        </a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="logo">Alternate Image</label>
                          <div class="portlet light bordered">
                            <div class="form-body">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <input data-image="<?php echo ($image_path!="" && file_exists(ALT_IMAGE_A.$image_path))?ALT_IMAGE_A.$image_path:"";?>" type="file" name="image_path" id="image_path" data-old-image="old_image_path" value="" >
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-actions noborder">
                          <button type="submit" name="submit" class="btn blue">Submit</button>
                        </div>
                      </div>
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
    <script src="../js/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="../js/banner_html5imageupload.js?v1.3.4"></script>
    <script src="../js/jquery.numeric.min.js"></script>
    <!-- START PAGELEVEL JS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
      $.validate({
      lang: 'en'
      });
      
      var isImageAlterImageLoaded=false;
      var isImageAlterImageValid=false;
      
      $(function(){
      
      
      aj.imageHolder($("input[name=image_path]"),"<?= ALT_IMAGE_WIDTH; ?>","<?= ALT_IMAGE_HEIGHT; ?>",
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
      
      
      /*  $("form").submit( function( e ) {
      var isValid=true;
      var form = this;
      if(!isImageAlterImageValid)
      {	toastr.error("Please select Alternate image!","error");
      	isValid=false;
      	
      }
      
       return isValid;
      });  */
    </script>
    <!-- END PAGELEVEL JS -->
  </body>
</html>