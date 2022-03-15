<?php
  $page_id="513";
  include("connect.php");
  
  // PAGE DECLARATION
  $main_page 	= "dashboard";
  $ctable="page_admin_right";
  $page 		= "page_admin_right";
  $page_title	= "Add/Edit Page Admin Right";
  $date_s = "";
  $page_hierarchy=array(array("link"=>"dashboard.php","title"=>"dashboard"),array("link"=>"page_admin_right_manage.php","title"=>"Manage Page Admin Right"),array("link"=>"page_admin_right_crud.php","title"=>"Add/Edit Page Admin Right"));
  $success_msg=array();
  $error_msg=array();
  // PAGE DECLARATION
  
  // INCLUDE CLASS
  if(!isset($_REQUEST['pid']) || $_REQUEST['pid']==''){
  	$db->rp_location("admin_type_manage.php");
  }
  
  
  
  $pctable_r = $db->rp_getData($ctable,"*","admin_id='".$_REQUEST['pid']."' AND isDelete=0","",0);
  if($pctable_r){
  	while($pctable_d = mysqli_fetch_array($pctable_r)){
  		$tids .= $pctable_d['page_id'].",";
  	}
  	
  }$tids = trim($tids,",");
  
  
  ?>
<!DOCTYPE html>
<html lang="en">
  <!--<![endif]-->
  <!-- BEGIN HEAD -->
  <head>
    <meta charset="utf-8" />
    <title><?php echo SITETITLE; ?> | Add/Edit Page Admin Right</title>
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
            <h1 class="page-title"> Add/Edit Page Admin Right
              <small>Add/Edit Page Admin Right</small>
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
              <div class="portlet light">
                <div class="table-toolbar">
                  <div class="row">
                    <div class="col-md-6">
                      <a class="btn btn-primary btn-sm " href="<?php echo $ctable; ?>_manage.php?pid=<?php echo $_REQUEST['pid']; ?>">Back</a>
                    </div>
                    <div class="col-md-6 pull-right">
                      <form action="#" onSubmit="return searchByName();">
                        <table class="table" style="margin-bottom:0;">
                          <tr>
                            <td>Search By Name : </td>
                            <td>
                              <input type="text" name="searchName" id="searchName" value="" />
                            </td>
                            <td>
                              <input class="btn btn-danger btn-sm" type="submit" value="search">
                              <input class="btn btn-success btn-sm" type="button" value="clear" onClick="clearSearchByName();">
                            </td>
                            <td>
                            </td>
                          </tr>
                        </table>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="portlet-body">
                  <div class="loading-div" style="display:none;"> <img src="assets/admin/layout/img/ajax-loader.gif" alt="" style="margin-bottom: 10%;;margin-top:10%;padding-left:48%;" > </div>
                  <div id="results">
                    <form action="" name="frm" id="frm" method="post">
                      <table id="datatable_1" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                          <tr>
                            <th>No.</th>
                            <th>Page Name</th>
                            <th>View </th>
                            <th>Insert </th>
                            <th>Update </th>
                            <th>Delete </th>
                            <th>Action</th>
                          </tr>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            if($tids=="")
                            	$ctable_r = $db->rp_getData("page_table","*","isDelete=0","",0);
                            else
                            $ctable_r = $db->rp_getData("page_table","*","id not in ($tids) AND isDelete=0","",0);
                            if(mysqli_num_rows($ctable_r)>0){
                            	$count = 0;
                            	
                            	while($ctable_d = mysqli_fetch_array($ctable_r)){
                            		$count++;
                            ?>
                          <tr id="row<?php echo $ctable_d['id']; ?>">
                            <td><?php echo $count; ?></td>
                            <td><?php echo stripslashes($ctable_d['page_title']); ?></td>
                            <td align="center">
                              <input type="checkbox" name="view<?php echo $ctable_d['id']; ?>[]" id="view<?php echo $ctable_d['id']; ?>" value="1" style="width:60px;text-align:center">
                            </td>
                            <td align="center">
                              <input type="checkbox" name="insert<?php echo $ctable_d['id']; ?>[]" id="insert<?php echo $ctable_d['id']; ?>" value="1" style="width:60px;text-align:center">
                            </td>
                            <td align="center">
                              <input type="checkbox" name="update<?php echo $ctable_d['id']; ?>[]" id="update<?php echo $ctable_d['id']; ?>" value="1" style="width:60px;text-align:center">
                            </td>
                            <td align="center">
                              <input type="checkbox" name="delete<?php echo $ctable_d['id']; ?>[]" id="delete<?php echo $ctable_d['id']; ?>" value="1" style="width:60px;text-align:center">
                            </td>
                            <td>
                              <a class="btn btn-info btn-sm" href="javascript:void(0);" title="Add" onClick="addAR('<?php echo $ctable_d['id']; ?>');"><i class="fa fa-plus"></i> Add</a>
                            </td>
                          </tr>
                          <?php
                            }
                            }
                            
                            ?>
                        </tbody>
                      </table>
                      <!--div class="row">
                        <div class="col-md-6">
                        	<div class="dataTables_info"> Rows Limit:
                        		<select id="numRecords" onChange="changeDisplayRowCount(this.value);">
                        			<option value="10" <?php if ($_REQUEST["show"] == 10 || $_REQUEST["show"] == "" ) { echo ' selected="selected"'; }  ?> >10</option>
                        			<option value="20" <?php if ($_REQUEST["show"] == 20) { echo ' selected="selected"'; }  ?> >20</option>
                        			<option value="30" <?php if ($_REQUEST["show"] == 30) { echo ' selected="selected"'; }  ?> >30</option>
                        		</select>
                        		<a class="btn btn-primary btn-sm " href="manage_<?php echo $ctable; ?>.php?pid=<?php echo $_REQUEST['pid']; ?>">Back</a>
                        	</div>
                        	
                        </div>
                        <div class="col-md-6">
                        	<div class="dataTables_paginate paging_simple_numbers">
                        		<ul class="pagination">
                        		<?php 
                          echo $db->rp_paginate_function($item_per_page, $page_number, $get_total_rows, $total_pages); 
                          ?>
                        		</ul>
                        	</div>
                        </div>
                        </div-->
                    </form>
                  </div>
                </div>
              </div>
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
    <?php include('include_js.php');?>
    <!-- START PAGELEVEL JS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
    <script src="js/toastr.js"></script>
    <script type="text/javascript">
      $('#datatable_1').dataTable({
      		"bPaginate": false,
      		"bFilter": false,
      		"bInfo": false,
      		"bAutoWidth": false, 
      		"aoColumns": [
      			  { "sWidth": "10%" }, 
      			  { "sWidth": "30%" },
      			  { "sWidth": "10%" },
      			  { "sWidth": "10%" },
      			  { "sWidth": "10%" },
      			  { "sWidth": "10%" },			  
      			  { "sWidth": "20%","bSortable": false }
      			]
      	});
      var searchName="";
      var data_url = "ajax_get_<?php echo $ctable ?>.php";
      function searchByName(){
      	searchName = $("#searchName").val();
      	displayRecords(10,1);
      	return false;
      }
      function clearSearchByName(){
      	searchName = "";
      	$("#searchName").val("");
      	displayRecords(10,1);
      }
      $("#searchName").keyup(function(event){
      	if(event.keyCode == 13){
      		$("#searchByName").click();
      	}
      });
      function loadDataTable(){
      	
      }
      
      // used when user change row limit
      function changeDisplayRowCount(numRecords) {
      	displayRecords(numRecords, 1);
      }
      function addAR(pid){
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
      		alert("Please select atleast one right."+insert_flag+view_flag);
      		
      	}else{
      		$.ajax({
      			type: "POST",
      			url: "ajax_addAR.php",
      			data: 'mode=a&pid=<?php echo $_REQUEST['pid']; ?>&tid='+pid+'&insert_flag='+insert_flag+'&view_flag='+view_flag+'&update_flag='+update_flag+'&delete_flag='+delete_flag,
      			success: function(result){
      					if(result==1){
      						toastr.success("Right added successfully.");
      					}else if(result==2){
      						toastr.error("This Right is already added.");
      					}else{
      						toastr.error("Something went wrong. Please try again.");
      					}
      					$("#row"+pid).fadeOut(1200);
      				}
      		});
      		
      	}
      }
    </script>
    <script type="text/javascript">
      function del_conf(id){
      	var r = confirm("Are you sure you want to delete?");
      	if(r){
      		window.location.href='<?php echo $ctable; ?>_crud.php?mode=d&id='+id;
      	}
      }
    </script>
  </body>
</html>