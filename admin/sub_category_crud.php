<?php
  $page_id="504";
  include("connect.php");
  
  // PAGE DECLARATION
  $main_page 	= "dashboard";
  $page 		= "category";
  $page_title	= "Add/Edit Category";
  $page_hierarchy=array(array("link"=>"dashboard.php","title"=>"dashboard"),array("link"=>"sub_category_manage.php","title"=>"Manage Sub Category"),array("link"=>"sub_category_crud.php","title"=>"Add/Edit Sub Category"));
  $success_msg=array();
  $error_msg=array();
  // PAGE DECLARATION
  
  // INCLUDE CLASS
  include('../include/class.sub_category.php');
  
  $subCat_obj=new SubCategory();
  $mode=isset($_REQUEST['mode'])?$_REQUEST['mode']:"a";
  
  // Variable Definations
  $id='';$name='';$slug='';$title_bar='';$meta_descr="";$image_path="";$description="";$add_date="";
  
  if(isset($_REQUEST['submit'])){
  	
  	if(isset($_SESSION['image_path']) && $_SESSION['image_path']!=""){
  	copy(SUBCATEGORY_T.$_SESSION['image_path'], SUBCATEGORY_A.$_SESSION['image_path']);
  	$image_path = $_SESSION['image_path'];
  	
  	unlink(SUBCATEGORY_T.$_SESSION['image_path']);
  	unset($_SESSION['image_path']);
  }
  	
  	// Variable Declaration
  	// GET SUBMITTED FORM VALUES
  $params=array();
  if(isset($_REQUEST['id']))
  $params['id']=trim($db->clean($_REQUEST['id']));
  $params['cid']=trim($db->clean($_REQUEST['cid']));
  $params['name']=trim($db->clean($_REQUEST['name']));
  $params['slug']=$db->rp_createSlug($_REQUEST['name']);
  $params['image_path']=$image_path;
  $params['meta_descr']=$db->clean($_REQUEST['meta_descr']);
  $params['description']=$db->clean(htmlentities($_REQUEST['description']));
  
  	if($mode=='a')
  	{
  		$params['adate']=date("Y-m-d H:i:s");
  	    $reply=$subCat_obj->insert($params,array("key"=>"name","value"=>$params['name']));
  		if($reply['ack']==1)
  		{
  			$success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("sub_category_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
  			$_SESSION['error_msg']= $error_msg;
              $db->rp_location("sub_category_manage.php");
  		}
  	}
  	else if($mode=='e')
  	{
  		if($_REQUEST['old_image_path']!="" && $image_path!=""){
  			if(file_exists(SUBCATEGORY_A.$_REQUEST['old_image_path'])){
  				unlink(SUBCATEGORY_A.$_REQUEST['old_image_path']);
  			}
  		}else{
  			if($image_path==""){
  				$image_path = $_REQUEST['old_image_path'];
  				if($image_path == ""){
  					$image_path = "";	
  				}
  			}
  		}
  		$params['image_path']=$image_path;
  		
  		$reply=$subCat_obj->update($params,$params['name'],$params['id']);
  		if($reply['ack']==1)
  		{
  			$success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("sub_category_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
              $_SESSION['error_msg']= $error_msg;
              $db->rp_location("sub_category_manage.php");
          }
  	}
  	else if($mode=='d')
  	{
  
  		$reply=$subCat_obj->delete(array("key"=>"id","value"=>$params['id']));
  		if($reply['ack']==1)
  		{
  		    $success_msg[]=$reply['ack_msg'];
          $_SESSION['success_msg']= $success_msg;
          $db->rp_location("sub_category_manage.php");
  		}
  		else
  		{
  		    $error_msg[]=$reply['ack_msg'];
          $_SESSION['error_msg']= $error_msg;
          $db->rp_location("sub_category_manage.php");
  		}
  	}
  	else if($mode=='ac')
  	{ 
      $params['status']=$_REQUEST['status'];
  		$reply=$subCat_obj->active(array("key"=>"id","value"=>$params['id'],"status"=>$params['status']));
  		if($reply['ack']==1)
  		{
		    $success_msg[]=$reply['ack_msg'];
        $_SESSION['success_msg']= $success_msg;
        $db->rp_location("sub_category_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
        $_SESSION['error_msg']= $error_msg;
        $db->rp_location("sub_category_manage.php");
  		}
  	}  
  }  
  if($mode=="e")
  {  
  	// GET REQUIRED VALUE FROM DATABASE  	
    $id=trim($db->clean($_REQUEST['id']));

		$reply=$subCat_obj->view("id='".$id."'");
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
    <title><?php echo SITETITLE; ?> | Add/Edit Category</title>
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
            <h1 class="page-title"> Add/Edit Category
              <small>Add/Edit Category</small>
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
              <form method="POST" role="form" id="form_bus" name="form_bus" class="" action="">
                <div class="col-md-12 ">
                  <!-- BEGIN SAMPLE FORM PORTLET-->
                  <div class="portlet light bordered">
                    <div class="portlet-title">
                      <div class="caption font-red-sunglo">
                        <span class="caption-subject bold uppercase"> <i class="fa fa-plus"></i> &nbsp; Add/Edit Category</span>
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
                            <select name="cid" id="cid" class="form-control" data-validation="required">
                              <option value="">--- Select Category ---</option>
                              <?php
                                $cid_r = $db->rp_getData("category","*");
                                if(mysqli_num_rows($cid_r)>0){
                                	while($cid_d = mysqli_fetch_array($cid_r)){
                                	?>
                              <option value="<?php echo $cid_d['id']; ?>" <?php if($cid_d['id']==$cid){?> selected <?php } ?>><?php echo $cid_d['name']; ?></option>
                              <?php
                                }
                                }
                                ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="name">Sub Category Name</label>
                            <input class="form-control " value="<?php echo $name;  ?>" name="name" id="name" type="text"  data-validation="required,length"   data-validation-length="min3" data-validation-error-msg="Enter atleast 3 Characters." >
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group">
                            <label for="meta_descr">Meta Description</label>
                            <input class="form-control " value="<?php echo $meta_descr; ?>" name="meta_descr" id="meta_descr" type="text"  data-validation="required">
                            <span class="help-block"></span>
                          </div>
                          <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control " name="description" id="description" type="text"  data-validation="required"><?php echo $description ; ?></textarea>
                            <span class="help-block"></span>
                          </div>
                          <div class="form-actions noborder">
                            <button type="submit" name="submit" class="btn blue">Submit</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="portlet-body form">
                            <div class="form-group">
                              <label for="image_path">Image  <input type="hidden" name="filename" id="filename" class="form-control"  /><code>*</code></label>
                              <small>minimum image size <?php echo SUBCATEGORY_IMAGE_WIDTH; ?> x <?php echo SUBCATEGORY_IMAGE_HEIGHT;?></small>
                              <br />
                              <div class="dropzone" data-width="<?php echo SUBCATEGORY_IMAGE_WIDTH; ?>" data-height="<?php echo SUBCATEGORY_IMAGE_HEIGHT;?>" data-ghost="false" data-originalsize="false" data-url="crop_sub_category.php" style="width: 350px;height:200px;">
                                <input type="file" id="image_path" name="image_path" >
                              </div>
                              <input type="hidden" name="old_image_path" value="<?php echo $image_path; ?>" />
                              <?php
                                if($image_path!="" && file_exists(SUBCATEGORY_A.$image_path)){
                                ?>
                              <br />
                              <img src="<?php echo SUBCATEGORY_A.$image_path;?>" width="260" height="150" >
                              <?php
                                }
                                ?>
                            </div>
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
    <script src="../js/banner_html5imageupload.js?v1.3.4"></script>
    <script src="../js/ckeditor/ckeditor.js" type="text/javascript"></script>
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
      });	
      	$('.dropzone').html5imageupload({
      		onAfterProcessImage: function() {
      			var imgName = $('#image_path').val($(this.element).data('imageFileName'));
      		},
      		onAfterCancel: function() {
      			$('#image_path').val('');
      		}
      	});
      	
    </script>
    <!-- END PAGELEVEL JS -->
  </body>
</html>