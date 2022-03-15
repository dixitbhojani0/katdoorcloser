<?php
   $page_id="1";
   include("connect.php");
   
   // PAGE DECLARATION
   $main_page   = "dashboard";
   $page        = "contact_us";
   $ctable      = "contact_us";
   $page_title  = "Manage Messages";
   $page_hierarchy=array();
   // PAGE DECLARATION
   
   // INCLUDE CLASS
   include('../include/class.brosary_inquiry.php');
   $contact_obj=new ContactUs();
   //$result=$user_obj->getUserDetail();
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <!--<![endif]-->
   <!-- BEGIN HEAD -->
   <head>
      <meta charset="utf-8" />
      <title><?php echo SITETITLE; ?> | Manage brochure inquiry</title>
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
                     Manage Brochure inquiry
                     <!-- <small>Manage User</small> -->
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
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light portlet-fit bordered">
                           <div class="portlet-body pull-right">
                              <h5><strong>Search By Name / Email / Contact Number</strong></h5>
                              <form class="form-inline" action="#"  onSubmit="return searchByName();" role="form">
                                 <div class="form-group">
                                    <!-- <label class="sr-only" for="searchName">Search Contact Message</label> -->
                                    <input class="form-control" id="searchName" placeholder="Search here.." type="text"> 
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
                                    <button type="button" class="btn green-haze export" name="export" style="margin-left: 16px;" onClick="genReport()" id="export" href="" title="Download XL Report"><i class="fa fa-file-pdf-o"></i>Export</button>
                                 </div>
                              </div>
                              <div id="results">
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
         var data_url = "brosary_inquiry_get_ajax.php";
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
                       { "sWidth": "30%" },
                       { "sWidth": "10%" },
                       { "sWidth": "10%"},
                       { "sWidth": "10%"},
                       { "sWidth": "10%"},
                       { "sWidth": "10%"},
                       { "sWidth": "25%","bSortable": false }
                     ]
             });
         }
         function displayRecords(numRecords) { 
             var searchName     = $("#searchName").val();
             searchName     = encodeURIComponent(searchName.trim());
             $("#results" ).html("");
             $("#results" ).load( data_url+"?show=" + numRecords + "&searchName=" + searchName,function(){
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
             var r = confirm("Are you sure you want to delete Message?");
             if(r){
                 window.location.href='<?php echo $ctable; ?>_crud.php?mode=d&submit=1&id='+id;
             }
         }
      </script>
      <script>
        function genReport(){
          var searchName     = $("#searchName").val();
          searchName     = encodeURIComponent(searchName.trim());
          window.location.href='contact_us_genReport_ajax.php?searchName='+searchName;            
        }
      </script>
      <!-- END PAGELEVEL JS -->
   </body>
</html>