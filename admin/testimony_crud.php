<?php
   $page_id="10";
   include("connect.php");
   
   // PAGE DECLARATION
   $main_page 	= "dashboard";
   $page 		= "testimonial";
   $page_title	= "Add/Edit Testimony";
   $page_hierarchy=array(array("link"=>"dashboard.php","title"=>"Dashboard"),array("link"=>"testimony_manage.php","title"=>"Manage Testimonial"),array("link"=>"testimony_crud.php","title"=>"Add/Edit Testimonial"));
   $success_msg=array();
   $error_msg=array();
   // PAGE DECLARATION
   
   // INCLUDE CLASS
   include('../include/class.testimony.php');
   
   $cat_obj=new Testimony();
   $mode=isset($_REQUEST['mode'])?$_REQUEST['mode']:"a";
   
   // Variable Definations
   $id='';$name='';$slug='';$designation='';$video_url="";$image_path="";$message="";$add_date="";
   
   if(isset($_REQUEST['submit'])){
   	
   	// Variable Declaration
   	// GET SUBMITTED FORM VALUES
   $params=array();
   if(isset($_REQUEST['id']))
   $params['id']=trim($db->clean($_REQUEST['id']));
   $params['name']=trim($db->clean($_REQUEST['name']));
   $params['slug']=$db->rp_createSlug($_REQUEST['name']);
   $params['designation']=trim($db->clean($_REQUEST['designation']));
   $params['image_path']=trim($db->clean($_REQUEST['image_path']));
   $params['old_image_path']=trim($db->clean($_REQUEST['old_image_path']));
   //$params['video_url']=$db->clean($_REQUEST['video_url']);
   $params['message']=$db->clean(htmlentities($_REQUEST['message']));
   
   	if($mode=='a')
   	{
   		$params['adate']=date("Y-m-d H:i:s");
   		if(isset($_REQUEST['name']) && $_REQUEST['name']!="")
   		{
   			$reply=$cat_obj->insert($params,array("key"=>"name","value"=>$params['name']),$_FILES);
   		}
   		if($reply['ack']==1)
   		{
   			$success_msg[]=$reply['ack_msg'];
               $_SESSION['success_msg']= $success_msg;
               $db->rp_location("testimony_manage.php");
   		}
   		else
   		{
   			$error_msg[]=$reply['ack_msg'];
   		}
   	}
   	else if($mode=='e')
   	{
   		
   		//$params['adate']=date("Y-m-d H:i:s");
   		$reply=$cat_obj->update($params,$params['name'],$params['id'],$_FILES);
   		if($reply['ack']==1)
   		{
   			$success_msg[]=$reply['ack_msg'];
               $_SESSION['success_msg']= $success_msg;
               $db->rp_location("testimony_manage.php");
   		}
   		else
   		{
   			$error_msg[]=$reply['ack_msg'];
               $_SESSION['error_msg']= $error_msg;
               $db->rp_location("testimony_manage.php");
           }
   	}
   	else if($mode=='d')
   	{
   
   		$reply=$cat_obj->delete(array("key"=>"id","value"=>$params['id']));
   		if($reply['ack']==1)
   		{
   		    $success_msg[]=$reply['ack_msg'];
               $_SESSION['success_msg']= $success_msg;
               $db->rp_location("testimony_manage.php");
   		}
   		else
   		{
   		    $error_msg[]=$reply['ack_msg'];
               $_SESSION['error_msg']= $error_msg;
               $db->rp_location("testimony_manage.php");
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
               $db->rp_location("testimony_manage.php");
   		}
   		else
   		{
   			$error_msg[]=$reply['ack_msg'];
               $_SESSION['error_msg']= $error_msg;
               $db->rp_location("testimony_manage.php");
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
               $db->rp_location("testimony_manage.php");
   		}
   		else
   		{
   			$error_msg[]=$reply['ack_msg'];
               $_SESSION['error_msg']= $error_msg;
               $db->rp_location("testimony_manage.php");
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
      <title><?php echo SITETITLE; ?> | Add/Edit Testimony</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1" name="viewport" />
      <meta content="" name="message" />
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
                  <h1 class="page-title"> Add/Edit Testimonial
                     <small> Add/Edit Testimonial</small>
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
                                       <label for="name">Name <code>*</code></label>
                                       <input class="form-control " value="<?php echo $name;  ?>" name="name" id="name" type="text"  data-validation="required"   data-validation-error-msg="Please enter name.">
                                       <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                       <label for="designation">Designation</label>
                                       <input class="form-control " value="<?php echo $designation; ?>" name="designation" id="designation" type="text">
                                       <!--<span class="help-block"></span>-->
                                    </div>
                                    <div class="form-group">
                                       <label for="message">Message <code>*</code></label>
                                       <textarea class="form-control "  name="message" id="message" type="text"><?php echo $message; ?></textarea>
                                       <!--<span class="help-block"></span>-->
                                    </div>
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
                                                <lable>Select Image</lable>
                                                <input data-image="<?php echo ($image_path!="" && file_exists(TESTIMONY_A.$image_path))?TESTIMONY_A.$image_path:"";?>" type="file" name="image_path" id="image_path" data-old-image-dom="old_image_path" data-old-image-path="<?php echo $image_path ?>" value="">
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
                           <button type="button" class="btn btn-primary" onClick="window.location.href='testimony_manage.php'">Back</button>
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
      <!-- <script src="js/banner_html5imageupload.js?v1.3.4"></script> -->
      <script src="js/jquery.form-validator.min.js"></script>
      <script src="js/ckeditor/ckeditor.js" type="text/javascript"></script> 
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
         		CKEDITOR.replace('message');
         });
         
         
         // Image
         var isImageThumbnailLoaded=false;
         var isImageThumbnailValid=false;
         
         $(function(){
         	
         	// aj.imageHolder($("input[name=image_path]"),"<?= TESTIMONY_IMAGE_WIDTH; ?>","<?= TESTIMONY_IMAGE_HEIGHT; ?>",
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
         			// toastr.error("File may be corrupted or missing. Try again!!");
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
         			toastr.error("Please select image!!","error");
         			isValid=false;			
         		} 		
         		 return isValid;
         }); 	
      </script>
      <!-- END PAGELEVEL JS -->
   </body>
</html>