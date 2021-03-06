<?php
$page_id="504";
include("connect.php");

// PAGE DECLARATION
$main_page 	= "dashboard";
$page 		= "our_team";
$page_title	= "Add/Edit Our Team";
$page_hierarchy=array(array("link"=>"dashboard.php","title"=>"Dashboard"),array("link"=>"our_team_manage.php","title"=>"Manage Our Team"),array("link"=>"our_team_crud.php","title"=>"Add/Edit Our Team"));
$success_msg=array();
$error_msg=array();
// PAGE DECLARATION

// INCLUDE CLASS
include('../include/class.ourteam.php');

$Obj=new Team();
$mode=isset($_REQUEST['mode'])?$_REQUEST['mode']:"a";

// Variable Definations
//$id='';$name='';$slug='';$title_bar='';$meta_descr="";$image_path="";$description="";$add_date="";
   
if(isset($_REQUEST['submit'])){
   	
   	// Variable Declaration
   	// GET SUBMITTED FORM VALUES
   $params=array();
   if(isset($_REQUEST['id']))
   $params['id']=trim($db->clean($_REQUEST['id']));
   $params['name']=trim($db->clean($_REQUEST['name']));
   $params['designation']=trim($db->clean($_REQUEST['designation']));
   $params['description']=trim($db->clean($_REQUEST['description']));
   $params['fb_link']=trim($db->clean($_REQUEST['fb_link']));
   $params['twitter_link']=trim($db->clean($_REQUEST['twitter_link']));
   $params['insta_link']=trim($db->clean($_REQUEST['insta_link']));
   $params['linkedin_link']=trim($db->clean($_REQUEST['linkedin_link']));
   $params['google_link']=trim($db->clean($_REQUEST['google_link']));
   $params['image_path']=trim($db->clean($_REQUEST['image_path']));
   $params['old_image_path']=trim($db->clean($_REQUEST['old_image_path']));
   
   
	if($mode=='a')
	{		
		$params['adate']=date("Y-m-d H:i:s");
	    $reply=$Obj->insert($params,array("key"=>"name","value"=>$params['name']),$_FILES);
		if($reply['ack']==1)
		{
			$success_msg[]=$reply['ack_msg'];
         $_SESSION['success_msg']= $success_msg;
         $db->rp_location("our_team_manage.php");
		}
		else
		{
			$error_msg[]=$reply['ack_msg'];
		}
	}
	else if($mode=='e')
	{ 	
		$reply=$Obj->update($params,$params['name'],$params['id'],$_FILES);
		if($reply['ack']==1)
		{
			$success_msg[]=$reply['ack_msg'];
         $_SESSION['success_msg']= $success_msg;
         $db->rp_location("our_team_manage.php");
		}
		else
		{
			$error_msg[]=$reply['ack_msg'];
         $_SESSION['error_msg']= $error_msg;
         $db->rp_location("our_team_manage.php");
     }
	}
	else if($mode=='d')
	{

		$reply=$Obj->delete(array("key"=>"id","value"=>$params['id']));
		if($reply['ack']==1)
		{
		    $success_msg[]=$reply['ack_msg'];
            $_SESSION['success_msg']= $success_msg;
            $db->rp_location("our_team_manage.php");
		}
		else
		{
		    $error_msg[]=$reply['ack_msg'];
            $_SESSION['error_msg']= $error_msg;
            $db->rp_location("our_team_manage.php");
		}
	}
	else if($mode=='ac')
	{
	   //
        $params['status']=$_REQUEST['status'];
		$reply=$Obj->active(array("key"=>"id","value"=>$params['id'],"status"=>$params['status']));
		if($reply['ack']==1)
		{
		    $success_msg[]=$reply['ack_msg'];
            $_SESSION['success_msg']= $success_msg;
            $db->rp_location("our_team_manage.php");
		}
		else
		{
			$error_msg[]=$reply['ack_msg'];
            $_SESSION['error_msg']= $error_msg;
            $db->rp_location("our_team_manage.php");
		}
	}
}
   
if($mode=="e")
{
	// GET REQUIRED VALUE FROM DATABASE	
   $id=trim($db->clean($_REQUEST['id']));

	$reply=$Obj->view("id='".$id."'","","","",true,true);
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
      <title><?php echo SITETITLE; ?> | <?= $page_title; ?></title>
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
                  <h1 class="page-title"> <?= $page_title; ?>
                     <small> <?= $page_title; ?></small>
                  </h1>
                  <!-- END PAGE TITLE-->
                  <!-- END PAGE HEADER-->
                  <div class="row">
                     <div class="col-md-12">
                        <?php 
                           if(!empty($success_msg)){
                           	?>			
                        <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
                           <button class="close" aria-hidden="true" data-dismiss="alert" type="button">??</button>
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
                           <button class="close" aria-hidden="true" data-dismiss="alert" type="button">??</button>
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
                                       <label for="name">Name<code>*</code></label>
                                       <input class="form-control " value="<?php echo $name;  ?>" name="name" id="name" type="text"  data-validation="required,length"   data-validation-length="min3" data-validation-error-msg="Enter atleast 3 Characters." >
                                       <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                       <label for="designation">Designation<code>*</code></label>
                                       <input class="form-control " value="<?php echo $designation;  ?>" name="designation" id="designation" type="text"  data-validation="required" data-validation-error-msg="Enter designation." >
                                       <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                       <label for="description">Description</label>
                                       <textarea name="description" id="description"><?php echo html_entity_decode($description); ?></textarea>
                                       <span class="help-block"></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- END SAMPLE FORM PORTLET-->
                           <div class="col-md-6">
                               <div class="form-group">
                                 <div class="portlet light bordered">
                                    <div class="portlet-title">
                                       <div class="caption font-red-sunglo">
                                          <span class="caption-subject bold uppercase"> <i class="fa fa-plus"></i> &nbsp; Social Media Detail</span>
                                       </div> 
                                    </div>
                                    <div class="form-body">
                                       <div class="row">
                                          <div class="col-sm-6">
                                             <div class="form-group">
                                                <label for="fb_link">Facebook link </label>
                                                <input class="form-control " value="<?php echo $fb_link;  ?>" name="fb_link" id="fb_link" type="text">
                                             </div>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="form-group">
                                                <label for="twitter_link">Twitter link </label>
                                                <input class="form-control " value="<?php echo $twitter_link;  ?>" name="twitter_link" id="twitter_link" type="text">
                                             </div>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="form-group">
                                                <label for="insta_link">Instagram link </label>
                                                <input class="form-control " value="<?php echo $insta_link;  ?>" name="insta_link" id="insta_link" type="text">
                                             </div>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="form-group">
                                                <label for="linkedin_link">Linkedin link </label>
                                                <input class="form-control " value="<?php echo $linkedin_link;  ?>" name="linkedin_link" id="linkedin_link" type="text">
                                             </div>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="form-group">
                                                <label for="google_link">Google link </label>
                                                <input class="form-control " value="<?php echo $google_link;  ?>" name="google_link" id="google_link" type="text">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
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
                                                <label for="logo">Select Image<code>*</code></label>
                                                <input data-image="<?php echo ($image_path!="" && file_exists(TEAM_A.$image_path))?TEAM_A.$image_path:"";?>" type="file" name="image_path" id="image_path" data-old-image-dom="old_image_path" data-old-image-path="<?php echo $image_path ?>" value="" >
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
                           <button type="button" class="btn btn-primary" onClick="window.location.href='our_team_manage.php'">Back</button>
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
         		CKEDITOR.replace('description');
         });
         
         var isImageThumbnailLoaded=false;
         var isImageThumbnailValid=false;
         
         $(function(){
         	
         	aj.imageHolder($("input[name=image_path]"),"<?= TEAM_WIDTH; ?>","<?= TEAM_HEIGHT; ?>",
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
         			toastr.error("Please Select Image!!","error");
         			isValid=false;			
         		}
         		 return isValid;
         });	
      </script>
      <!-- END PAGELEVEL JS -->
   </body>
</html>