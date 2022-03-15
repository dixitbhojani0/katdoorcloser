<?php
  $page_id=530;$page_slug='page_patient_report_view';
  include("connect.php");
  $ctable = "contact_us";
  $ctable1 = "contact_us";
  
  $date=date('d_M_Y');
  $ctable_where = "";
  
  // Get the total number of rows in the table
  
  $ctable_where_month="";
  if(isset($_REQUEST['searchName']) && $_REQUEST['searchName']!=""){
  	$ctable_where .= " (
  						 name like '%".$_REQUEST['searchName']."%' OR
  						 email like '%".$_REQUEST['searchName']."%' OR
  						 contact_number like '%".$_REQUEST['searchName']."%' 
  							
  						) AND ";
  }
   $ctable_where .= " isDelete=0 ";
  
  $item_per_page =  ($_REQUEST["show"] <> "" && is_numeric($_REQUEST["show"]) ) ? intval($_REQUEST["show"]) : 100;
  
  if(isset($_REQUEST["page"])){
  	$page_number = filter_var($_REQUEST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
  	if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
  }else{
  	$page_number = 1; //if there's no page number, set it to 1
  }
  
  $get_total_rows = $db->rp_getTotalRecord($ctable,$ctable_where,0); //hold total records in variable
  //break records into pages
  $total_pages = ceil($get_total_rows/$item_per_page);
  
  //get starting position to fetch the records
  $page_position = (($page_number-1) * $item_per_page);
  
  
  
  $ctable_r = $db->rp_getData($ctable,"*",$ctable_where,"id DESC limit $page_position, $item_per_page",0);
  
  ?>
<button type="button" class="btn green-haze export" name="export" onClick="genReport(this)" id="export" href="" title="Download XL Report"><i class="fa fa-file-pdf-o"></i>Export</button>
<form action="" id="print_info" name="frm" id="frm" method="post">
  <div class="table-scrollable">
    <table id="datatable_1" class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <td colspan="7" style="text-align: center;"><b>CONTACT REPORT - <?php echo $date; ?></b></td>
        </tr>
        <tr>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Contact Number</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Created Date</th>
        </tr>
        </tr>
      </thead>
      <tbody>
        <?php
          if($ctable_r){
              $count = 0;
              
              while($ctable_d = mysqli_fetch_array($ctable_r))
          {
          $count++;
                  ?>
        <tr>
          <td><?php echo $count; ?></td>
          <td><?php echo stripslashes($ctable_d['name']); ?></td>
          <td><?php echo stripslashes($ctable_d['contact_number']); ?></td>
          <td><?php echo stripslashes($ctable_d['email']); ?></td>
          <td><?php echo stripslashes($ctable_d['subject']); ?></td>
          <td><?php echo stripslashes($ctable_d['message']); ?></td>
          <td><?php echo date("d-m-Y H-i-s a",strtotime($ctable_d['created_date'])); ?></td>
        </tr>
        <?php
          }
          }else
          {
          ?>
        <tr>
          <td colspan="6" class="text-center">No data found</td>
        </tr>
        <?php
          }
          ?>		
      </tbody>
    </table>
  </div>
</form>
<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body portlet box white">
        <div class="portlet-title">
          <div class="caption">Loading.......
            <img src="../img/loading-spinner-blue.gif">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<button type="button" class="btn green-haze export" name="export" onClick="genReport(this)" id="export" href="" title="Download XL Report"><i class="fa fa-file-pdf-o"></i>Export</button>
<script>
  function genReport(cid){
  	var rc = encodeURIComponent($("#print_info").html());
  	//alert(rc);
  	$.ajax({
  		type: "POST",
  		url: "contact_us_genReport_ajax.php",
  		data: '&rc='+rc,
  		beforeSend: function() {
  			$(".transCover").fadeIn(800);
  		},
  		success: function(result){ 
  		//alert(result);
  				setTimeout(function(){
  					$(".transCover").fadeOut(100);
  					window.location.href=result;
  				},1500);
  			}
  	});
  }
</script>