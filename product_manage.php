<?php
   $page_id="504";
   include("connect.php");
   
   // PAGE DECLARATION
   $main_page 	= "dashboard";
   $page 		= "Product";
   $ctable 		= "product";
   $page_title	= "Manage Product";
   $page_hierarchy=array();
   // PAGE DECLARATION
   
   // INCLUDE CLASS
   include('../include/class.product.php');
   $product_obj=new Product();
   $result=$product_obj->view();
   
   
   if(isset($_REQUEST['submit'])){
   	$disp_count = $_REQUEST['disp_count'];
   	for($i=1;$i<=$disp_count;$i++){
   		$b_id 			= $_REQUEST['b_id'.$i];
   		$display_order	= $_REQUEST['disp'.$i];
   		
   		if($b_id>0){
   			$rows 	= array("display_order"=>$display_order);
   			$where	= "id=".$b_id;
   			$db->rp_update($ctable,$rows,$where,0);
   		}
   	}
   }
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <!--<![endif]-->
   <!-- BEGIN HEAD -->
   <head>
      <meta charset="utf-8" />
      <title><?php echo SITETITLE; ?> | Manage Product</title>
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
                  <h1 class="page-title">
                     Manage Product Detail With Alter Image
                     <!-- <small>Manage Product</small> -->
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
                        <div class="portlet box blue">
                           <div class="portlet-title">
                              <div class="caption">
                                 <i class="fa fa-filter"></i>Filters 
                              </div>
                              <div class="tools">
                                 <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: auto;">
                                 <div class="row">
                                    <div class="col-md-4  col-xs-4  col-sm-4" style="margin-top:10px">
                                       <div class="form-group">
                                          <label>Search by Category</label>
                                          <select class="form-control input-large status" name="category" id="category"  autofocus onChange="getCategory();">
                                             <option value="">--- Select Category---</option>
                                             <?php
                                                $category_r = $db->rp_getData("category","*",0);
                                                if(mysqli_num_rows($category_r)>0){
                                                	while($category_d = mysqli_fetch_array($category_r)){
                                                ?>
                                             <option value="<?php echo $category_d['id']; ?>"><?php echo $category_d['name']; ?></option>
                                             <?php
                                                }
                                                }
                                                ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-4  col-xs-4  col-sm-4" style="margin-top:10px">
                                       <div class="form-group">
                                          <!-- <label>Search by Sub Category</label>
                                          <select type="text" name="sub_category" id="sub_category" class="form-control" onChange="getSubCategory();" >
                                             <option value=""> -- Select Sub Category -- </option>
                                             <?php
                                                if($category !="")
                                                {
                                                	?>
                                             <option value="<?php echo $sid; ?>" "<?php echo $sid ?>" > <?php echo $sid; ?>  </option>
                                             <?php 
                                                }
                                                else {
                                                		$sc_r = $db->rp_getData("sub_category","*","isDelete='0'","",0); 
                                                		while($sc_d = mysqli_fetch_assoc($sc_r))
                                                		{
                                                	?>
                                             <option value="<?php echo $sc_d['id']; ?>" ><?php echo $sc_d['name']; ?></option>
                                             <?php
                                                }
                                                } ?>
                                          </select> -->
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light portlet-fit bordered">
                           <div class="portlet-body pull-right">
                              <h4>Search Product</h4>
                              <form class="form-inline"  action="#"  onSubmit="return searchByName();"role="form">
                                 <div class="form-group">
                                    <label class="sr-only" for="searchName">Search Product</label>
                                    <input class="form-control" id="searchName" placeholder="Enter Product Name" type="text"> 
                                 </div>
                                 <button type="submit" onClick="searchByName()"  class="btn btn-primary">Search</button>
                                 <button type="button" onClick="clearSearchByName()" class="btn btn-danger">Clear</button>
                              </form>
                           </div>
                           <div class="portlet-title">
                              <div class="actions">
                                 <div class="btn-group btn-group-devided" data-toggle="buttons">
                                 </div>
                              </div>
                           </div>
                           <div class="portlet-body">
                              <div class="table-toolbar">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="btn-group">
                                          <a id="add_bus" href="<?php echo $ctable;?>_crud.php?mode=a" class="btn green"> Add New
                                          <i class="fa fa-plus"></i>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div id="results" >
                              </div>
                           </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
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
         var searchName="";
         var data_url = "<?php echo $ctable ?>_get_ajax.php";
         
         function getCategory(){
         
         		category=$("#category").val();
         		searchName = $("#searchName").val();
         		var numRecords  = $("#numRecords").val();
         		
         		var page = $(this).attr("data-page"); //get page number from link
         		$("#results").load(data_url+"?show=" + numRecords + "&searchName=" + searchName + "&category=" + category,{"page":page}, function(){ //get content from PHP page
         			$(".loading-div").hide(); //once done, hide loading element
         			loadDataTable();
         		});
         		
         		$.ajax({
         		type: "POST",
         		url: "find_sub_category.php",
         		data:'cid='+category,
         		success: function(data){
         		$("#sub_category").html(data);
         		} 
         	});		
         }
         
         function getSubCategory(){         		
         	sub_category=$("#sub_category").val();
         	searchName = $("#searchName").val();
         	var numRecords  = $("#numRecords").val();
         	var page = $(this).attr("data-page"); //get page number from link
         	$("#results").load(data_url+"?show=" + numRecords + "&searchName=" + searchName + "&sub_category=" + sub_category,{"page":page}, function(){ //get content from PHP page
         		$(".loading-div").hide(); //once done, hide loading element
         		loadDataTable();
         	});
         }
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
         	$('#datatable_1').dataTable({
         		"bPaginate": false,
         		"bFilter": false,
         		"bInfo": false,
         		"bAutoWidth": false,
         		"aoColumns": [
         			{ "sWidth": "5%" },
         			{ "sWidth": "5%" },
         			{ "sWidth": "5%" },
         			{ "sWidth": "5%" },
         			{ "sWidth": "5%" },
         			{ "sWidth": "10%" },
         			{ "sWidth": "10%" },
         			{ "sWidth": "10%" },
         			{ "sWidth": "20%" },
         			{ "sWidth": "20%" },
         			{ "sWidth": "15%","bSortable": false }
         		]
         	});
         }
         function displayRecords(numRecords) {
            
         	var searchName 	= $("#searchName").val();
         	searchName 	= encodeURIComponent(searchName.trim());
         	$("#results" ).html("");
         	$("#results" ).load( data_url+"?show=" + numRecords + "&searchName=" + searchName ,function(){
         		loadDataTable();
         	}); //load initial records
         
         	//executes code below when user click on pagination links
         	$("#results").on( "click", ".paging_simple_numbers a", function (e){
         		e.preventDefault();
         		var numRecords  = $("#numRecords").val();
         		$(".loading-div").show(); //show loading element
         		var page = $(this).attr("data-page"); //get page number from link
         		$("#results").load(data_url+"?show=" + numRecords + "&searchName=" + searchName,{"page":page}, function(){ //get content from PHP page
         			$(".loading-div").hide(); //once done, hide loading element
         			loadDataTable();
         		});
         
         	});
         	$("#results").on( "change", "#numRecords", function (e){
         		e.preventDefault();
         		var numRecords  = $("#numRecords").val();
         		$(".loading-div").show(); //show loading element
         		var page = $(this).attr("data-page"); //get page number from link
         		$("#results").load(data_url+"?show=" + numRecords + "&searchName=" + searchName,{"page":page}, function(){ //get content from PHP page
         			$(".loading-div").hide(); //once done, hide loading element
         			loadDataTable();
         		});
         
         	});
         }
         
         // used when user change row limit
         function changeDisplayRowCount(numRecords) {
         	displayRecords(numRecords, 1);
         }
         
         $(document).ready(function() {
         	displayRecords(10,1);
         });
      </script>
      <script type="text/javascript">
         function del_conf(id){
         	var r = confirm("Are you sure you want to delete?");
         	if(r){
         		window.location.href='<?php echo $ctable; ?>_crud.php?mode=d&submit=1&id='+id;
         	}
         }
      </script>
      <!-- END PAGELEVEL JS -->
   </body>
</html>