<?php
   $page_id="504";
   include("connect.php");
   // PAGE DECLARATION
   $main_page 	= "dashboard";
   $page 		= "product";
   $page_title	= "Add/Edit Pages";
   $page_hierarchy=array(array("link"=>"dashboard.php","title"=>"Dashboard"),array("link"=>"Pages_manage.php","title"=>"Manage Pages"),array("link"=>"Pages_crud.php","title"=>"Add/Edit Pages"));
   $success_msg=array();
   $error_msg=array();
   // PAGE DECLARATION
   
   // INCLUDE CLASS
   include('../include/class.Pages.php');
   
   $Pages_obj=new Pages();
   $mode=isset($_REQUEST['mode'])?$_REQUEST['mode']:"a";
   
   // Variable Definations
   $id='';$cid='';$Pages_title='';$slug='';$image_path="";$description="";$add_date="";$file_upload="";$author_name="";
   
   if(isset($_REQUEST['submit'])){
   // Variable Declaration
   // GET SUBMITTED FORM VALUES

   $params=array();
   if(isset($_REQUEST['id']))
   $params['id']=trim($db->clean($_REQUEST['id']));
   $params['Pages_title']=trim($db->clean($_REQUEST['Pages_title']));
   $params['slug']=$db->rp_createSlug($_REQUEST['Pages_title']);
   $params['description']=$db->clean(htmlentities($_REQUEST['description']));
   $params['author_name']=$db->clean(htmlentities($_REQUEST['author_name']));
   
   if($mode=='a')
	{
		$params['adate']=date("Y-m-d H:i:s");
	   $reply=$Pages_obj->insert($params,"",$_FILES);
		if($reply['ack']==1)
		{
			$success_msg[]=$reply['ack_msg'];
            $_SESSION['success_msg']= $success_msg;
            echo copy("blog_crud.php",$params['Pages_title']."_crud.php");
            echo copy("blog_get_ajax.php",$params['Pages_title']."_get_ajax.php");
            echo copy("blog_manage.php",$params['Pages_title']."_manage.php");
            $source = '../include/class.blog.php';  
            $destination = "../include/class.".$params['Pages_title'].".php";  
            echo copy($source,$destination);
            $tablenm=$params['pages_title'];
           /* $table="CREATE TABLE nik (
                `id` int(10) NOT NULL AUTO_INCREMENT,
                `cid` int(10) NOT NULL,
                `blog_title` varchar(250) NOT NULL,
                `slug` varchar(200) NOT NULL,
                `display_order` int(11) NOT NULL,
                `description` text NOT NULL,
                `author_name` varchar(150) NOT NULL,
                `add_info` text NOT NULL,
                `image_path` varchar(250) NOT NULL,
                `isDelete` tinyint(1) NOT NULL,
                `isActive` int(11) NOT NULL DEFAULT '1',
                `adate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
                PRIMARY KEY (`id`),
                KEY `cid` (`cid`),
                KEY `name` (`blog_title`)
               ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin";*/

                
            $db->rp_location("Pages_manage.php");
		}
		else
		{
			$error_msg[]=$reply['ack_msg'];
			$_SESSION['error_msg']= $error_msg;

            $db->rp_location("Pages_manage.php");
		}
	}
   	else if($mode=='e')
   	{
   		$reply=$Pages_obj->update($params,$params['Pages_title'],$params['id'],$_FILES);
   		if($reply['ack']==1)
   		{
   			$success_msg[]=$reply['ack_msg'];
               $_SESSION['success_msg']= $success_msg;
               $db->rp_location("Pages_manage.php");
   		}
   		else
   		{
   			$error_msg[]=$reply['ack_msg'];
               $_SESSION['error_msg']= $error_msg;
               $db->rp_location("Pages_manage.php");
           }
   	}
   	else if($mode=='d')
   	{
   
   		$reply=$Pages_obj->delete(array("key"=>"id","value"=>$params['id']));
   		if($reply['ack']==1)
   		{
   		    $success_msg[]=$reply['ack_msg'];
               $_SESSION['success_msg']= $success_msg;
               $db->rp_location("Pages_manage.php");
   		}
   		else
   		{
   		    $error_msg[]=$reply['ack_msg'];
               $_SESSION['error_msg']= $error_msg;
               $db->rp_location("Pages_manage.php");
   		}
   	}
   	else if($mode=='ac')
   	{
   	   //
           $params['status']=$_REQUEST['status'];
   		$reply=$Pages_obj->active(array("key"=>"id","value"=>$params['id'],"status"=>$params['status']));
   		if($reply['ack']==1)
   		{
   		    $success_msg[]=$reply['ack_msg'];
               $_SESSION['success_msg']= $success_msg;
               $db->rp_location("Pages_manage.php");
   		}
   		else
   		{
   			$error_msg[]=$reply['ack_msg'];
               $_SESSION['error_msg']= $error_msg;
               $db->rp_location("Pages_manage.php");
   		}
   	}
   
   }
   
   if($mode=="e")
   {
   
   	// GET REQUIRED VALUE FROM DATABASE
   
   	
   	   $id=trim($db->clean($_REQUEST['id']));
   
   		$reply=$Pages_obj->view("id='".$id."'");
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
      <title><?php echo SITETITLE; ?> | Add/Edit Pages</title>
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
                  <h1 class="page-title"> Add/Edit Pages
                     <small> Add/Edit Sub Pages</small>
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
                                       <label for="Pages_title">Pages Title <code>*</code></label>
                                       <input class="form-control " value="<?php echo $Pages_title;  ?>" name="Pages_title" id="Pages_title" type="text"  data-validation="required,length"   data-validation-length="min3" data-validation-error-msg="Enter atleast 3 Characters." >
                                       <span class="help-block"></span>
                                    </div>
                                    
                                    <div class="form-group">
                                       <label for="description">Description</label>
                                       <textarea name="description" id="description"><?php echo html_entity_decode($description); ?></textarea>
                                       <span class="help-block"></span>
                                    </div>

                                    <div class="form-group">
                                       <label for="author_name">Author Name<code>*</code></label>
                                       <input class="form-control " value="<?php echo $author_name;  ?>" name="author_name" id="author_name" type="text"  data-validation="required,length"   data-validation-length="min3" data-validation-error-msg="Enter atleast 3 Characters." >
                                       <span class="help-block"></span>
                                    </div>
                                    
                                    <div class="form-actions noborder">
                                       <button type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">Submit</button>
                                       <button type="button" class="btn btn-primary" onClick="window.location.href='Pages_manage.php'">Back</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- END SAMPLE FORM PORTLET-->
                    
                        </div>
                        <div class="col-md-12">
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
         		CKEDITOR.instances.description.getData().replace(/(\r\n|\n|\r)/gm,"");
         		
         		
         });
         var isImageThumbnailLoaded=false;
         var isImageThumbnailValid=false;
         
         $(function(){
         	
         	
         	aj.imageHolder($("input[name=image_path]"),"<?= Pages_IMAGE_WIDTH; ?>","<?= Pages_IMAGE_HEIGHT;?>",
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
         			toastr.error("Please select image!","error");
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