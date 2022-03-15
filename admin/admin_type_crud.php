<?php
  $page_id="513";
  include("connect.php");
  
  // PAGE DECLARATION
  $main_page 	= "dashboard";
  $page 		= "admin_type";
  $page_title	= "Add/Edit Admin Type";
  
  $page_hierarchy=array(array("link"=>"dashboard.php","title"=>"dashboard"),array("link"=>"admin_type_manage.php","title"=>"Manage Admin type"),array("link"=>"admin_type_crud.php","title"=>"Add/Edit Admin Type"));
  $success_msg=array();
  $error_msg=array();
  // PAGE DECLARATION
  
  // INCLUDE CLASS
  include('../include/class.admin_type.php');
  
  $admin_obj=new AdminType();
  
  $mode=isset($_REQUEST['mode'])?$_REQUEST['mode']:"a";
  
  // Variable Definations
  $id='';$name='';$title='';$description='';$date='';
  
  if(isset($_REQUEST['submit'])){
  	// Variable Declaration
  	// GET SUBMITTED FORM VALUES
  $params=array();
  if(isset($_REQUEST['id']))
  $params['id']=trim($db->clean($_REQUEST['id']));
  $params['name']=trim($db->clean($_REQUEST['name']));
  $params['adate']=date("Y-m-d H:i:s");
  
  	if($mode=='a')
  	{
  		$reply=$admin_obj->insert($params,array("key"=>"name","value"=>$params['name']));
  		if($reply['ack']==1)
  		{
  			
  			$success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("admin_type_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
  			$_SESSION['error_msg']= $error_msg;
  			$db->rp_location("admin_type_manage.php");
  		}
  	}
  	else if($mode=='e')
  	{
  		$reply=$admin_obj->update($params,$params['name'],$params['id']);
  		if($reply['ack']==1)
  		{
  			$success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("admin_type_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
  			$_SESSION['error_msg']= $error_msg;
  			$db->rp_location("admin_type_manage.php");
  		}
  	}
  	else if($mode=='d')
  	{
  		$params['id']=$_REQUEST['id'];
  		
  		$reply=$admin_obj->delete(array("key"=>"id","value"=>$params['id']));
  		if($reply['ack']==1)
  		{
  		    $success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
             $db->rp_location("admin_type_manage.php");
  		}
  		else
  		{
  		    $error_msg[]=$reply['ack_msg'];
  			$_SESSION['error_msg']= $error_msg;
  			$db->rp_location("admin_type_manage.php");
  		}
  	}
  	 
  }
  
  if($mode=="e")
  {
  
  	// GET REQUIRED VALUE FROM DATABASE
  
  	$id=trim($db->clean($_REQUEST['id']));
  
  	$reply=$admin_obj->view("id='".$id."'");
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
    <title><?php echo SITETITLE; ?> | Add/Edit Admin Type</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <?php include("include_css.php");?>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
            <h1 class="page-title"> Add/Edit Admin Type
              <small>Add/Edit Admin Type</small>
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
              <form method="POST" role="form" id="form" name="form" class="" onSubmit="return check_form();" action="">
                <div class="col-md-6 ">
                  <!-- BEGIN SAMPLE FORM PORTLET-->
                  <div class="portlet light bordered">
                    <div class="portlet-title">
                      <div class="caption font-red-sunglo">
                        <span class="caption-subject bold uppercase"> <i class="fa fa-plus"></i> &nbsp; Add/Edit Admin Type</span>
                      </div>
                      <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;">
                        </a>
                      </div>
                    </div>
                    <div class="portlet-body form">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label>Name <code>*</code></label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" autofocus>
                        <span class="help-block"></span>
                      </div>
                      <div class="form-actions noborder">
                        <button type="submit" name="submit" class="btn blue">Submit</button>
                      </div>
                    </div>
                  </div>
                  <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>
          </div>
          <!-- END SAMPLE FORM PORTLET-->
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
    <?php include('include_js.php');?>
    <!-- START PAGELEVEL JS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="../assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
      $.validate({
      lang: 'en'
      });
      
      function check_form(){
      $(".form-body").children().removeClass("has-error");
      var isValid=true;
      
      if($("#name").val()=="" || $("#name").val().split(" ").join("")==""){		
      vd=aj.error('name',"Please Enter Name .","add_error");
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
      
      $(document).ready(function(){	
      $(".form-control").bind("keyup change",function(){ if($(this).parent().hasClass("has-error")) { $(this).parent().removeClass("has-error"); $(this).parent().find('p.help-block').html(""); } }); 
      });
      
    </script>
    <!-- END PAGELEVEL JS -->
  </body>
</html>