<?php
  $page_id="504";
  include("connect.php");
  
  // PAGE DECLARATION
  $main_page 	= "dashboard";
  $page 		= "product_inquiry1";
  $page_title	= "Add/Edit product_inquiry1";
  $page_hierarchy=array(array("link"=>"dashboard.php","title"=>"dashboard"),array("link"=>"product_inquiry1_manage.php","title"=>"Manage product_inquiry1"),array("link"=>"product_inquiry1_crud.php","title"=>"Add/Edit product_inquiry1"));
  $success_msg=array();
  $error_msg=array();
  // PAGE DECLARATION
  
  // INCLUDE CLASS
  include('../include/class.product_inquiry1.php');
  
  $product_inquiry1_obj=new ProductInquiry1();
  $mode=isset($_REQUEST['mode'])?$_REQUEST['mode']:"a";
  
  // Variable Definations
  $id='';$pid='';$name='';$slug='';$email='';$meta_descr="";$price="";$image_path="";$description="";$add_date="";
  
  if(isset($_REQUEST['submit'])){
  	
  	
  	// Variable Declaration
  	// GET SUBMITTED FORM VALUES
  $params=array();
  if(isset($_REQUEST['id']))
  $params['id']=trim($db->clean($_REQUEST['id']));
  $params['pid']=trim($db->clean($_REQUEST['pid']));
  // $params['sid']=trim($db->clean($_REQUEST['sid']));
  $params['name']=trim($db->clean($_REQUEST['name']));
  // $params['video_url']=trim($db->clean($_REQUEST['video_url']));
  $params['slug']=$db->rp_createSlug($_REQUEST['name']);
  $params['email']=trim($db->clean($_REQUEST['email']));
  // $params['image_path']=trim($db->clean($_REQUEST['image_path']));
  // $params['old_image_path']=trim($db->clean($_REQUEST['old_image_path']));
  // $params['file_upload']=trim($db->clean($_REQUEST['file_upload']));
  // $params['old_file_upload']=trim($db->clean($_REQUEST['old_file_upload']));
  $params['meta_descr']=$db->clean($_REQUEST['meta_descr']);
  $params['description']=$db->clean(htmlentities($_REQUEST['description']));
  // $params['add_info']=$db->clean(htmlentities($_REQUEST['add_info']));
  //$params['price']=$db->clean($_REQUEST['price']);
  
  
  	if($mode=='a')
  	{
  		//print_r($params);exit;
  		$params['adate']=date("Y-m-d H:i:s");
  		if(isset($_REQUEST['name']) && $_REQUEST['name']!="")
  		{
  			$reply=$product_inquiry1_obj->insert($params,"",$_FILES);
  		}
  	    
  		if($reply['ack']==1)
  		{
  			$success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("product_inquiry1_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
  			$_SESSION['error_msg']= $error_msg;
  		}
  	}
  	else if($mode=='e')
  	{
  		$reply=$product_inquiry1_obj->update($params,"",$params['id'],$_FILES);
  		if($reply['ack']==1)
  		{
  			$success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("product_inquiry1_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
              $_SESSION['error_msg']= $error_msg;
              $db->rp_location("product_inquiry1_manage.php");
          }
  	}
  	else if($mode=='d')
  	{
  
  		$reply=$product_inquiry1_obj->delete(array("key"=>"id","value"=>$params['id']));
  		if($reply['ack']==1)
  		{
  		    $success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("product_inquiry1_manage.php");
  		}
  		else
  		{
  		    $error_msg[]=$reply['ack_msg'];
              $_SESSION['error_msg']= $error_msg;
              $db->rp_location("product_inquiry1_manage.php");
  		}
  	}
  	else if($mode=='ac')
  	{
  	   //
          $params['status']=$_REQUEST['status'];
  		$reply=$product_inquiry1_obj->active(array("key"=>"id","value"=>$params['id'],"status"=>$params['status']));
  		if($reply['ack']==1)
  		{
  		    $success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("product_inquiry1_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
              $_SESSION['error_msg']= $error_msg;
              $db->rp_location("product_inquiry1_manage.php");
  		}
  	}
  
  }
  
  if($mode=="e")
  {
  	// GET REQUIRED VALUE FROM DATABASE	
  	   $id=trim($db->clean($_REQUEST['id']));
  
  		$reply=$product_inquiry1_obj->view("id='".$id."'");
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
    <title><?php echo SITETITLE; ?> | Add/Edit product_inquiry1</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
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
            <h1 class="page-title"> Add/Edit product_inquiry1
              <small>Add/Edit product_inquiry1</small>
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
                        <span class="caption-subject bold uppercase"> <i class="fa fa-plus"></i> &nbsp; Add/Edit product_inquiry1</span>
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
                            <label for="cid">Category <code>*</code></label>
                            <select class="form-control" name="cid" id="cid" onChange="getSubCat(this.value);" data-validation="required" data-validation-error-msg="Please Select Category">
                              <option value="">Select Category</option>
                              <?php
                                $cat_r = $db->rp_getData("service_category","*","isDelete=0");
                                if(mysqli_num_rows($cat_r)>0){
                                	while($cat_d = mysqli_fetch_array($cat_r)){
                                	?>
                              <option value="<?php echo $cat_d['id']; ?>" <?php if($cat_d['id']==$cid){?> selected <?php } ?>><?php echo $cat_d['name']; ?></option>
                              <?php
                                }
                                }
                                ?>
                            </select>
                          </div>
                          <!--div class="form-group">
                            <label for="sid">Sub Category <code>*</code></label>
                            <select class="form-control" name="sid" id="sid" >
                            	<option value="">Select Sub Category</option>
                            	<?php
                              if($cid!="" && $cid>0){
                              	$scat_r = $db->rp_getData("sub_category","*","isDelete=0 AND cid=".$cid);
                              	if(mysqli_num_rows($scat_r)>0){
                              		while($scat_d = mysqli_fetch_array($scat_r)){
                              		?>
                            			<option value="<?php echo $scat_d['id']; ?>" <?php if($scat_d['id']==$sid){?> selected <?php } ?>><?php echo $scat_d['name']; ?></option>
                            	<?php
                              }
                              }
                              }
                              ?>
                            </select>
                            </div-->
                          <div class="form-group">
                            <label for="name">product_inquiry1 Name <code>*</code></label>
                            <input class="form-control " value="<?php echo $name;  ?>" name="name" id="name" type="text"  data-validation="required,length"   data-validation-length="min3" data-validation-error-msg="Enter atleast 3 Characters." >
                            <span class="help-block"></span>
                          </div>
                          <!-- <div class="form-group">
                            <label for="name">Video URL</label>
                            <input class="form-control " value="<?php echo $video_url;  ?>" name="video_url" id="video_url" type="text">
                            <span class="help-block"></span>
                            </div> -->
                          <!--<div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" id="price" value="<?php echo $price; ?>">
                            </div>-->
                          <div class="form-group">
                            <label for="meta_descr">Meta Description</label>
                            <input class="form-control " value="<?php echo $meta_descr; ?>" name="meta_descr" id="meta_descr" type="text" >
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description"><?php echo html_entity_decode($description); ?></textarea>
                            <span class="help-block"></span>
                          </div>
                          <!-- <div class="form-group">
                            <label for="description">Additional Information</label>
                            <textarea name="add_info" id="add_info"><?php echo html_entity_decode($add_info); ?></textarea>
                            <span class="help-block"></span>
                            </div> -->
                          <div class="form-actions noborder">
                            <button type="submit" name="submit" class="btn blue">Submit</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="logo">Select product_inquiry1 Image<code>*</code></label>
                          &nbsp;&nbsp;&nbsp;
                          <div class="portlet light bordered">
                            <div class="form-body">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <input data-image="<?php echo ($image_path!="" && file_exists(product_inquiry1_A.$image_path))?product_inquiry1_A.$image_path:"";?>" type="file" name="image_path" id="image_path" data-old-image-dom="old_image_path" data-old-image-path="<?php echo $image_path ?>" value="" >
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--div class="form-body">
                              <div class="row">
                              	<div class="col-sm-12">
                              		<div class="form-group">
                              		<input data-file="<?php echo ($file_upload!="" && file_exists(PDF_A.$file_upload))?PDF_A.$file_upload:"";?>" type="file" name="file_upload" id="file_upload" data-old-file-dom="old_file_path" data-old-file-path="<?php echo $file_upload ?>" value="" >
                              		</div>
                              	</div>
                              </div>
                              
                              </div-->
                          </div>
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
    <script src="js/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="js/banner_html5imageupload.js?v1.3.4"></script>
    <script src="js/jquery.numeric.min.js"></script>
    <!-- START PAGELEVEL JS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
      $.validate({
      lang: 'en'
      });
      
    </script>
    <script>
      $(document).ready(function(){
      		CKEDITOR.replace('description');
      		// CKEDITOR.replace('add_info');
      		CKEDITOR.instances.description.getData().replace(/(\r\n|\n|\r)/gm,"");
      		
      		
      });
      var isImageThumbnailLoaded=false;
      var isImageThumbnailValid=false;
      var isFileSizeValid=false;
      var isFileExtensionValid=false; 
      
      $(function(){
      	
      	
      	aj.imageHolder($("input[name=image_path]"),"","",
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
      
       $("form").submit( function( e ) {
      		var isValid=true;
      		var form = this;
      		if(!isImageThumbnailValid)
      		{	
      			toastr.error("Please Select Image!!","error");
      			isValid=false;
      			
      		}
      		 return isValid;
      });	
      function getSubCat(id){
      	$.ajax({
      		type: "POST",
      		url: "ajax_getSubCat.php",
      		data: 'cid='+id,
      		success: function(result){
      				$("#sid").html(result);
      			}
      	});
      }
    </script>
    <!-- END PAGELEVEL JS -->
  </body>
</html>