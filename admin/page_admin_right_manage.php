<?php
  $page_id=404;$page_slug='manage_admin_type';
  $ctable 	= "page_admin_right";
  $ctable1 	= "See Admin Right For Page";
  $main_page 	= "product_mgmt";
  $page 		= "manage_".$ctable;
  $page_title = "Manage ".$ctable1;
  include("connect.php");
  $pid=$_REQUEST['pid'];
  if(isset($_REQUEST['id']) && $_REQUEST['id']>0 && $_REQUEST['mode']=="d"){
  
  	$rows 	= array(
  				"isDelete"	=> "1"
  			);
  	$where	= "id='".$_REQUEST['id']."'";
  	$db->rp_delete($ctable,$where,0); 
  	$db->rp_location("admin_type_manage.php");
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <!--<![endif]-->
  <!-- BEGIN HEAD -->
  <head>
    <meta charset="utf-8" />
    <title><?php echo SITETITLE; ?> | Manage Page Admin Right</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <?php include("include_css.php");?>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
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
            <h1 class="page-title"> Manage Page Admin Right
              <small>Manage Page Admin Right</small>
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
              <div class="col-md-12">
                <div class="portlet light">
                  <div class="box-body">
                    <form action="" name="frm" id="frm" method="post">
                      <div class=""><?php
                        echo $db->getAddButton($ctable,$ctable."_crud.php?pid=".$_REQUEST['pid']."&mode=a");
                        ?>
                        <button class="btn btn-primary sidebar" type="button" onClick="clc();">Update All</button>								
                      </div>
                      <table id="example1" class="table table-bordered table-striped dataTable">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Page Name</th>
                            <th>View </th>
                            <th>Insert </th>
                            <th>Update </th>
                            <th>Delete </th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $ctable_r = $db->rp_getData("page_admin_right","*","admin_id='".$pid."' AND isDelete=0","",0);
                            
                            if(mysqli_num_rows($ctable_r)>0){
                            $count = 0;
                            
                            while($ctable_d = mysqli_fetch_array($ctable_r)){
                            	$count++;
                            ?>
                          <tr id="row<?php echo $ctable_d['id']; ?>">
                            <td><?php echo $count; ?></td>
                            <td><?php 
                              echo stripslashes($db->rp_getValue("page_table","page_title","id='".$ctable_d['page_id']."'")); 
                              ?></td>
                            <td align="center">
                              <input type="checkbox" name="view<?php echo $ctable_d['id']; ?>[]" id="view<?php echo $ctable_d['id']; ?>" value="1" <?php echo ($ctable_d['view_flag']==1)?"checked":""; ?> style="width:60px;text-align:center">
                            </td>
                            <td align="center">
                              <input type="checkbox" name="insert<?php echo $ctable_d['id']; ?>[]" id="insert<?php echo $ctable_d['id']; ?>" value="1" <?php echo ($ctable_d['insert_flag']==1)?"checked":""; ?> style="width:60px;text-align:center">
                            </td>
                            <td align="center">
                              <input type="checkbox" name="update<?php echo $ctable_d['id']; ?>[]" id="update<?php echo $ctable_d['id']; ?>" value="1"  <?php echo ($ctable_d['update_flag']==1)?"checked":""; ?> style="width:60px;text-align:center">
                            </td>
                            <td align="center">
                              <input type="checkbox" name="delete<?php echo $ctable_d['id']; ?>[]" id="delete<?php echo $ctable_d['id']; ?>" value="1" <?php echo ($ctable_d['delete_flag']==1)?"checked":""; ?> style="width:60px;text-align:center">
                            </td>
                            <td>
                              <a class="btn btn-info btn-sm clc" href="javascript:void(0);" title="Add" onClick="addPT('<?php echo $ctable_d['id']; ?>');"><i class="fa fa-pencil"></i> Update</a>
                              <a class="btn btn-danger btn-sm" onClick="del_conf('<?php echo $ctable_d['id']; ?>');" title="Delete"><i class="fa fa-times"></i></a>
                            </td>
                          </tr>
                          <?php
                            }
                            }
                            
                            ?>
                        </tbody>
                      </table>
                      <input type="hidden" name="price_count" value="<?php echo $count; ?>">
                      <input type="hidden" name="submit" value="submit">
                      <div class="">
                        <?php
                          echo $db->getAddButton($ctable,$ctable."_crud.php?pid=".$_REQUEST['pid']."&mode=a");
                          ?>
                        <button class="btn btn-primary sidebar" type="button" onClick="clc();">Update All</button>
                        <a  class="btn btn-success sidebar"  href="admin_type_manage.php">Back</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
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
    <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript">
      function clc(){
      	$(".clc").trigger('click');
      }
      function addPT(pid){
      	//alert(pid);
      	var view_flag=0;
      	var insert_flag=0;
      	var update_flag=0;
      	var delete_flag=0;
      	if(document.getElementById("insert"+pid).checked)
      	{
      		insert_flag=document.getElementById("insert"+pid).value;
      	}
      	if(document.getElementById("view"+pid).checked)
      	{
      		view_flag=document.getElementById("view"+pid).value;
      	}
      	if(document.getElementById("update"+pid).checked)
      	{
      		update_flag=document.getElementById("update"+pid).value;
      	}
      	if(document.getElementById("delete"+pid).checked)
      	{
      		delete_flag=document.getElementById("update"+pid).value;
      	}
      	
      	
      	if(insert_flag==0 && view_flag==0 && update_flag==0 && delete_flag==0 ){
      		toastr.error("Please enter valid rights or delete completly");
      	}else{
      		$.ajax({
      			type: "POST",
      			url: "ajax_addAR.php",
      			data: 'mode=edit&id='+pid+'&insert_flag='+insert_flag+'&view_flag='+view_flag+'&update_flag='+update_flag+'&delete_flag='+delete_flag,
      			success: function(result){
      					if(result==1){
      						toastr.success("Rights updated successfully.");
      					}else{
      						toastr.error("Something went wrong. Please try again.");
      					}
      				}
      		});
      		
      	}
      }
      function del_conf(id){
      	
      	var r = confirm("Are you sure you want to delete?");
      	if(r){
      		window.location.href='page_admin_right_manage.php?mode=d&id='+id;
      	}
      }
    </script>
    <!-- END PAGELEVEL JS -->
  </body>
</html>