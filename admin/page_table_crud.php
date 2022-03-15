<?php
  $page_id="513";
  include("connect.php");
  
  // PAGE DECLARATION
  $main_page 	= "dashboard";
  $page 		= "page_table";
  //$page_title	= "Add/Edit page_table";
  $date_s = "";
  $page_hierarchy=array(array("link"=>"dashboard.php","title"=>"dashboard"),array("link"=>"page_table_manage.php","title"=>"Manage Page Table"),array("link"=>"page_table_crud.php","title"=>"Add/Edit Page Table"));
  $success_msg=array();
  $error_msg=array();
  // PAGE DECLARATION
  
  // INCLUDE CLASS
  include('../include/class.page_table.php');
  
  $page_table_obj=new PageTable();
  
  $mode=isset($_REQUEST['mode'])?$_REQUEST['mode']:"a";
  
  // Variable Definations
  $page_title='';$page_slug='';$page_count='';$page_urls='';$adate='';
  
  if(isset($_REQUEST['submit'])){
  	// Variable Declaration
  	// GET SUBMITTED FORM VALUES
  
  if(isset($_REQUEST['id']))
  $params=array();
  $params['page_title']=trim($db->clean($_REQUEST['page_title']));
  $params['page_slug']=trim($db->clean($_REQUEST['page_slug']));
  $params['page_count']=trim($db->clean($_REQUEST['page_count']));
  $params['page_urls']=trim($db->clean($_REQUEST['page_urls']));
  $params['adate']=date("Y-m-d H:i:s");
  
  	if($mode=='a')
  	{
  		$reply=$page_table_obj->insert($params,array("key"=>"page_title","value"=>$params['page_title']));
  		if($reply['ack']==1)
  		{
  			
  			$success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("page_table_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
  			$_SESSION['error_msg']= $error_msg;
  			$db->rp_location("page_table_manage.php");
  		}
  	}
  	else if($mode=='e')
  	{
  		$params['id']=$_REQUEST['id'];
  		$reply=$page_table_obj->update($params,$params['page_title'],$params['id']);
  		if($reply['ack']==1)
  		{
  			$success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("page_table_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
  			$_SESSION['error_msg']= $error_msg;
  			$db->rp_location("page_table_manage.php");
  		}
  	}
  	else if($mode=='d')
  	{
  		$params['id']=$_REQUEST['id'];
  		
  		$reply=$page_table_obj->delete(array("key"=>"id","value"=>$params['id']));
  		if($reply['ack']==1)
  		{
  		    $success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
               $db->rp_location("page_table_manage.php");
  		}
  		else
  		{
  		    $error_msg[]=$reply['ack_msg'];
  			$_SESSION['error_msg']= $error_msg;
  			 $db->rp_location("page_table_manage.php");
  		}
  	}
  	else if($mode=='ac')
  	{
  		$params['id']=$_REQUEST['id'];
  		
  	    $params['isActive']=$_REQUEST['status'];
  		$reply=$page_table_obj->active(array("key"=>"id","value"=>$params['id'],"status"=>$params['isActive']));
  		if($reply['ack']==1)
  		{
  		    $success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
               $db->rp_location("page_table_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
  			$_SESSION['error_msg']= $error_msg;
  			 $db->rp_location("page_table_manage.php");
  		}
  	}
  
     
  }
  
  if($mode=="e")
  {
  
  	// GET REQUIRED VALUE FROM DATABASE
  
  	$id=trim($db->clean($_REQUEST['id']));
  
  	$reply=$page_table_obj->view("id='".$id."'");
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
    <title><?php echo SITETITLE; ?> | Add/Edit Page Table</title>
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
            <h1 class="page-title"> Add/Edit Page Table
              <small>Add/Edit Page Table</small>
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
                        <span class="caption-subject bold uppercase"> <i class="fa fa-plus"></i> &nbsp; Add/Edit Page Title</span>
                      </div>
                      <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;">
                        </a>
                      </div>
                    </div>
                    <div class="portlet-body form">
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label>Page Title<code>*</code></label>
                        <input type="text" class="form-control" name="page_title" id="page_title" value="<?php echo $page_title; ?>">
                        <p class="help-block"></p>
                      </div>
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label>Page Slug<code>*</code></label>
                        <input type="text" class="form-control" name="page_slug" id="page_slug" value="<?php echo $page_slug; ?>">
                        <p class="help-block"></p>
                      </div>
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label>Page Count<code>*</code></label>
                        <input type="text" class="form-control" name="page_count" id="page_count" value="<?php echo $page_count; ?>">
                        <p class="help-block"></p>
                      </div>
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label>Page Urls<code>*</code></label>
                        <input type="text" class="form-control" name="page_urls" id="page_urls" value="<?php echo $page_urls; ?>">
                        <p class="help-block"></p>
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
    <script type="text/javascript">
      $('#page_urls').tagsInput({  'defaultText':'Add a page url', 'placeholderColor' : '#333333'});
      $(document).ready(function(){$(".form-control").bind("keyup change",function(){ if($(this).parent().hasClass("has-error")) { $(this).parent().removeClass("has-error"); } }); });
      
      function check_form(){
      	$(".form-body").children().removeClass("has-error");
      	isValid=true;
      	if($("#page_title").val()=="" || $("#page_title").val().split(" ").join("")==""){		
      		aj.error('page_title','Please enter page title!!','add_error');
      		isValid=false;		
      	}
      	if($("#page_count").val()=="" || $("#page_count").val().split(" ").join("")==""){
      		aj.error('page_count','Please enter page count!!','add_error');
      		isValid=false;	
      	}
      	if($("#page_slug").val()=="" || $("#page_slug").val().split(" ").join("")==""){
      		aj.error('page_slug','Please enter page slug!!','add_error');
      		isValid=false;	
      	}
      	if($("#page_urls").val()=="" || $("#page_urls").val().split(" ").join("")==""){
      		aj.error('page_urls','Please enter page url!!','add_error');
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
        
    </script>
    <!-- END PAGELEVEL JS -->
  </body>
</html>