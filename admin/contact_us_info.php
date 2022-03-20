<?php
   $page_id="513";
   include("connect.php");
   
   // PAGE DECLARATION
   $main_page 	= "dashboard";
   $page 		= "Contact Us Info";
   $page_title	= "Add Contact Us Info";
   $page_hierarchy=array(array("link"=>"dashboard.php","title"=>"Dashboard"),array("link"=>"contact_us_info.php","title"=>"Contact Us Info"));
   $success_msg=array();
   $error_msg=array();
   // PAGE DECLARATION
   
   // INCLUDE CLASS
   include('../include/class.contact_us_info.php');
   
   $contactus_obj=new ContactUSInfo();
   
   $mode=isset($_REQUEST['mode'])?$_REQUEST['mode']:"a";
   
   // Variable Definations
   $id='';$address='';$phone='';$phone_2='';$phone_3='';$email='';$time='';
   if(isset($_REQUEST['submit'])){
   	// Variable Declaration
   	// GET SUBMITTED FORM VALUES
      $params=array();
      
      if(isset($_REQUEST['id'])) 
         $params['id']=trim($db->clean($_REQUEST['id']));
      
      $params['address']=trim($db->clean(htmlentities($_REQUEST['address'])));
      $params['phone']=trim($db->clean($_REQUEST['phone']));
      $params['email']=trim($db->clean($_REQUEST['email']));
      $params['description']=trim($db->clean(htmlentities($_REQUEST['description'])));

   	if($mode=='a')
   	{	

   	   $reply=$contactus_obj->insert($params,"id='".$params['id']."'");
         if($reply['ack']==1)
   		{
   			$success_msg[]=$reply['ack_msg'];
            $_SESSION['success_msg'] = $success_msg;
            // $db->rp_location("contact_us_info.php");
   		}
   		else
   		{
   			$error_msg[]=$reply['ack_msg'];
            $_SESSION['error_msg'] = $error_msg;
            // $db->rp_location("contact_us_info.php");
   		}
   	}
   }
   
   
   if(true)
   {   
   	// GET REQUIRED VALUE FROM DATABASE
   
   	$contact_us_info=$db->rp_getData("contact_us_info","*","1=1 LIMIT 1");
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
      <title><?php echo SITETITLE; ?> | Add Contact Us Info</title>
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
                  <h1 class="page-title"> Contact Us Info
                  </h1>
                  <!-- END PAGE TITLE-->
                  <!-- END PAGE HEADER-->
                  <div class="row">
                     <div class="col-md-12">
                        <?php if(!empty($_SESSION['success_msg'])){ ?>        
                           <div class="alert alert-success alert-dismisable"> <i class="fa fa-check"></i>
                              <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                              <?php foreach($success_msg as $s) { ?>
                              <b>Success! </b><?php echo $s; ?>
                              <?php } ?>
                           </div>
                        <?php } if(!empty($_SESSION['error_msg'])){ ?>
                           <div class="alert alert-danger alert-dismissable"> <i class="fa fa-ban"></i>
                              <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                              <?php foreach($error_msg as $e) {?>
                              <b>Error! </b><?php echo $e; ?>
                              <?php } ?>
                           </div>
                        <?php } ?>
                     </div>
                  </div>
                  <!-- END PAGE HEADER-->
                  <div class="row">
                     <!-- FORM START -->
                     <div class="col-md-12 ">
                        <!-- BEGIN SAMPLE FORM PORTLET-->
                        <div class="portlet light bordered">
                           <div class="portlet-title">
                              <div class="caption font-red-sunglo">
                                 <span class="caption-subject bold uppercase"> <i class="fa fa-plus"></i> &nbsp; Add Contact Us Info</span>
                              </div>
                              <div class="actions">
                                 <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;">
                                 </a>
                              </div>
                           </div>
                           <form method="post" role="form" id="form_contact" name="form_contact" class="" action="" onSubmit="return check_form();">
                              <div class="portlet-body form">
                                 <div class="form-group form-md-line-input form-md-floating-label">
                                    <textarea class="form-control textarea " value="" name="address" id="address" type="text"><?php echo $address; ?></textarea>
                                    <label for="address">Address</label>
                                    <p class="help-block"></p>
                                 </div>
                                 <div class="form-group form-md-line-input form-md-floating-label">
                                    <input class="form-control" value="<?php echo $phone; ?>" name="phone" id="phone" type="text">
                                    <label for="phone">Phone No. 1</label>
                                    <p class="help-block"></p>
                                 </div>
                                 <div class="form-group form-md-line-input form-md-floating-label">
                                    <input class="form-control" value="<?php echo $email; ?>" name="email" id="email" type="text" >
                                    <label for="email">Email</label>
                                    <p class="help-block"></p>
                                 </div>
                                 <div class="form-group form-md-line-input form-md-floating-label">
                                    <textarea class="form-control textarea " value="" name="description" id="description" type="text"><?php echo $description; ?></textarea>
                                    <label for="description">Description</label>
                                    <p class="help-block"></p>
                                 </div>
                                 <div class="form-actions noborder">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <button type="submit" name="submit" class="btn blue">Submit</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                        <!-- END SAMPLE FORM PORTLET-->
                     </div>
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
         		CKEDITOR.replace('address');
         		CKEDITOR.replace('description');
         });
         
         function check_form(){
         	var isValid=true;
         	
         	if($("#address").val()=="" || $("#address").val().split(" ").join("")==""){
         		aj.error('address','Please enter address.','add_error');
         		isValid=false;
         	}
         	if($("#phone").val()=="" || $("#phone").val().split(" ").join("")==""){
         		aj.error('phone','Please enter contact number 1.','add_error');
         		isValid=false;
         	}
         	if($("#email").val()=="" || $("#email").val().split(" ").join("")==""){
         		aj.error('email','Please enter email address.','add_error');
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