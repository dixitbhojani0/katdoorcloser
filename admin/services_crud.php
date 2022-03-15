<?php
   $page_id="504";
   include("connect.php");
   
   // PAGE DECLARATION
   $main_page 	= "dashboard";
   $page 		= "services";
   $page_title	= "Add/Edit services";
   $page_hierarchy=array(array("link"=>"dashboard.php","title"=>"Dashboard"),array("link"=>"services_manage.php","title"=>"Manage services"),array("link"=>"services_crud.php","title"=>"Add/Edit services"));
   $success_msg=array();
   $error_msg=array();
   // PAGE DECLARATION
   
   // INCLUDE CLASS
   include('../include/class.services.php');
   
   $services_obj=new Services();
   $mode=isset($_REQUEST['mode'])?$_REQUEST['mode']:"a";
   
   // Variable Definations
   $id='';$cid='';$sid='';$name='';$slug='';$meta_descr="";$price="";$image_path="";$description="";$add_date="";$file_upload="";
   
   if(isset($_REQUEST['submit'])){
   	
   	
   	// Variable Declaration
   	// GET SUBMITTED FORM VALUES
   $params=array();
   if(isset($_REQUEST['id']))
   $params['id']=trim($db->clean($_REQUEST['id']));
   $params['cid']=trim($db->clean($_REQUEST['cid']));
   // $params['sid']=trim($db->clean($_REQUEST['sid']));
   $params['name']=trim($db->clean($_REQUEST['name']));
   // $params['video_url']=trim($db->clean($_REQUEST['video_url']));
   $params['slug']=$db->rp_createSlug($_REQUEST['name']);
   $params['image_path']=trim($db->clean($_REQUEST['image_path']));
   $params['old_image_path']=trim($db->clean($_REQUEST['old_image_path']));
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
   			$reply=$services_obj->insert($params,"",$_FILES);
   		}
   	    
   		if($reply['ack']==1)
   		{
   			$success_msg[]=$reply['ack_msg'];
               $_SESSION['success_msg']= $success_msg;
               $db->rp_location("services_manage.php");
   		}
   		else
   		{
   			$error_msg[]=$reply['ack_msg'];
   			$_SESSION['error_msg']= $error_msg;
   		}
   	}
   	else if($mode=='e')
   	{
   		$reply=$services_obj->update($params,"",$params['id'],$_FILES);
   		if($reply['ack']==1)
   		{
   			$success_msg[]=$reply['ack_msg'];
               $_SESSION['success_msg']= $success_msg;
               $db->rp_location("services_manage.php");
   		}
   		else
   		{
   			$error_msg[]=$reply['ack_msg'];
               $_SESSION['error_msg']= $error_msg;
               $db->rp_location("services_manage.php");
           }
   	}
   	else if($mode=='d')
   	{
   
   		$reply=$services_obj->delete(array("key"=>"id","value"=>$params['id']));
   		if($reply['ack']==1)
   		{
   		    $success_msg[]=$reply['ack_msg'];
               $_SESSION['success_msg']= $success_msg;
               $db->rp_location("services_manage.php");
   		}
   		else
   		{
   		    $error_msg[]=$reply['ack_msg'];
               $_SESSION['error_msg']= $error_msg;
               $db->rp_location("services_manage.php");
   		}
   	}
   	else if($mode=='ac')
   	{
   	   //
           $params['status']=$_REQUEST['status'];
   		$reply=$services_obj->active(array("key"=>"id","value"=>$params['id'],"status"=>$params['status']));
   		if($reply['ack']==1)
   		{
   		    $success_msg[]=$reply['ack_msg'];
               $_SESSION['success_msg']= $success_msg;
               $db->rp_location("services_manage.php");
   		}
   		else
   		{
   			$error_msg[]=$reply['ack_msg'];
               $_SESSION['error_msg']= $error_msg;
               $db->rp_location("services_manage.php");
   		}
   	}
   
   }
   
   if($mode=="e")
   {
   	// GET REQUIRED VALUE FROM DATABASE	
   	   $id=trim($db->clean($_REQUEST['id']));
   
   		$reply=$services_obj->view("id='".$id."'");
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
      <title><?php echo SITETITLE; ?> | Add/Edit services</title>
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
                  <h1 class="page-title"> Add/Edit Services
                     <small> Add/Edit Services</small>
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
                                       <span class="caption-subject bold uppercase"> <i class="fa fa-plus"></i> &nbsp; Detail</span>
                                    </div>
                                    <div class="actions">
                                       <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;">
                                       </a>
                                    </div>
                                 </div>
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
                                    <div class="form-group">
                                       <label for="name">services Name <code>*</code></label>
                                       <input class="form-control " value="<?php echo $name;  ?>" name="name" id="name" type="text"  data-validation="required,length"   data-validation-length="min3" data-validation-error-msg="Enter atleast 3 Characters." >
                                       <span class="help-block"></span>
                                    </div>
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
                                    <div class="form-actions noborder">
                                       <button type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">Submit</button>
                                       <button type="button" class="btn btn-primary" onClick="window.location.href='services_manage.php'">Back</button>
                                    </div>
                                    <!-- <div class="form-group">
                                       <label for="url">URL</label>
                                       <input type="text" class="form-control" name="url" id="url" value="<?php echo $url; ?>">
                                       </div>
                                       <div class="form-group">
                                       <label for="Target">Target</label>
                                       <select class="form-control" name="target">
                                       	<option value="_SELF" <?php if($target=="_SELF"){ ?> selected <?php } ?>>SELF</option>
                                           <option value="_BLANK" <?php if($target=="_BLANK"){ ?> selected <?php } ?>>NEW</option>
                                       </select>
                                       </div> -->
                                    <!-- <div class="form-group">
                                       <label for="description">Description</label>
                                       <textarea class="form-control" name="description" id="description"><?php echo $description; ?></textarea>
                                       </div> -->
                                 </div>
                              </div>
                           </div>
                           <!-- END SAMPLE FORM PORTLET-->
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="portlet light bordered">
                                    <div class="portlet-title">
                                       <div class="caption font-red-sunglo">
                                          <span class="caption-subject bold uppercase"> <i class="fa fa-plus"></i> &nbsp; Image</span>
                                       </div>
                                       <div class="actions">
                                          <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;">
                                          </a>
                                       </div>
                                    </div>
                                    <div class="form-body">
                                       <div class="row">
                                          <div class="col-sm-12">
                                             <div class="form-group">
                                                <label for="logo">Export Services Image<code>*</code></label>
                                                <input data-image="<?php echo ($image_path!="" && file_exists(SERVICES_A.$image_path))?SERVICES_A.$image_path:"";?>" type="file" name="image_path" id="image_path" data-old-image-dom="old_image_path" data-old-image-path="<?php echo $image_path ?>" value="" >
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
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
         	
         	
         	aj.imageHolder($("input[name=image_path]"),"<?= SERVICES_IMAGE_WIDTH; ?>","<?= SERVICES_IMAGE_HEIGHT; ?>",
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