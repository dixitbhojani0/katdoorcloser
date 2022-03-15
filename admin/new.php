<?php
  $page_id="513";
  
  /*
   * @author mr._.raj
   */
  include("connect.php");
  $ctable 	= "appointment";
  $ctable1 	= "Appointment";
  
  $ctable_where = "";
  // Get the total number of rows in the table
  
  if(isset($_REQUEST['searchName']) && $_REQUEST['searchName']!=""){
  	$ctable_where .= " (
  							patient_id like '%".$_REQUEST['searchName']."%' OR name like '%".$_REQUEST['searchName']."%'
  						) AND ";
  }
  $date=date("Y-m-d");
  
  $ctable_where .= " isDelete=0";
  //$ctable_where .= " AND date='".date('Y-m-d')."'";
  
  $item_per_page =  ($_REQUEST["show"] <> "" && is_numeric($_REQUEST["show"]) ) ? intval($_REQUEST["show"]) : 10;
  
  if(isset($_REQUEST["page"])){
  	$page_number = filter_var($_REQUEST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
  	if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
  }else{
  	$page_number = 1; //if there's no page number, set it to 1
  }
  
  $get_total_rows = $db->rp_getTotalRecord($ctable,$ctable_where); //hold total records in variable
  //break records into pages
  $total_pages = ceil($get_total_rows/$item_per_page);
  
  //get starting position to fetch the records
  $page_position = (($page_number-1) * $item_per_page);
  
  $ctable_r = $db->rp_getData($ctable,"*",$ctable_where,"date ASC limit $page_position, $item_per_page",0);
  ?>
<form action="" name="frm" id="frm" method="post">
  <table id="datatable_1" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Patient Id</th>
        <th>Patient Name</th>
        <!-- <th>Email</th>-->
        <th>Mob No</th>
        <th>Date</th>
        <th>Time</th>
        <th>Payment</th>
        <th>Action</th>
        <th>Source</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if($ctable_r){
            $count_row = 0;
            
            while($ctable_d = mysqli_fetch_array($ctable_r)){
                $count_row++;
        $date=date('d-m-Y',strtotime($ctable_d['date']));
        
        if($ctable_d['date'] >= $date)
        {
        ?>
      <tr>
        <td><?php echo $count_row; ?></td>
        <td><?php echo stripslashes($ctable_d['patient_id']); ?></span></td>
        <td><span class="<?php echo ($ctable_d['isActive']==2)?"text-danger":"text-success"; ?>"><?php echo stripslashes($ctable_d['name']); ?></span></td>
        <!-- <td><?php echo stripslashes($ctable_d['email']); ?></span></td>-->
        <td><?php echo stripslashes($ctable_d['number']); ?></td>
        <td><?php echo stripslashes($date); ?></td>
        <td><?php echo stripslashes($ctable_d['time']); ?></td>
        <!--<?php 
          /*if($ctable_d['isVerified']==1)
          {
          	$verified="Verified";
          }
          else
          {
          	$verified="Not Verified";
          }
          ?>
          <td><?php echo stripslashes($verified); */ ?></td>-->
        <td>
          <?php $amount=$db->rp_getValue("payment_info","amount","appointment_id='".$ctable_d['id']."'",0);
            if($amount)
            {
            	echo $amount;
            }
            else{
            	?>
          <span class="<?php echo "Not Paid"?"text-danger":"text-success"; ?>">Not Paid</span>
          <?php
            }
            ?>
        </td>
        <td>
          <?php 				
            if($rights['update_flag']==1)
            {
            	?>
          <a class="btn btn-info btn-sm" onClick="window.location.href='<?php echo $ctable; ?>_crud.php?mode=e&id=<?php echo $ctable_d['id']; ?>'" title="Edit"><i class="fa fa-pencil"></i></a>
          <?php
            }
            
            if($rights['update_flag']==1)
            {
            	?>
          &nbsp;
          <div class="btn-group">
            <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> More
            <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li>
                <?php
                  if($ctable_d['isActive']==0){
                  ?>
                <a  href="<?php echo $ctable; ?>_crud.php?mode=ac&submit=1&id=<?php echo $ctable_d['id']; ?>&status=1" title="Activate"><span class="text-success"><i class="fa fa-circle"></i> &nbsp;Approve</span></a>
                <a  href="<?php echo $ctable; ?>_crud.php?mode=ac&submit=1&&id=<?php echo $ctable_d['id']; ?>&status=2" title="Deactivate"><span class="text-danger" ><i class="fa fa-circle-o"></i> &nbsp; Disapprove</span></a>
                <?php
                  }elseif($ctable_d['isActive']==1)
                  {
                  ?>
                <a  href="<?php echo $ctable; ?>_crud.php?mode=ac&submit=1&&id=<?php echo $ctable_d['id']; ?>&status=2" title="Deactivate"><span class="text-danger" ><i class="fa fa-circle-o"></i> &nbsp; Disapprove</span></a>
                <?php
                  }elseif($ctable_d['isActive']==2){
                  ?>
                <a  href="<?php echo $ctable; ?>_crud.php?mode=ac&submit=1&id=<?php echo $ctable_d['id']; ?>&status=1" title="Activate"><span class="text-success"><i class="fa fa-circle"></i> &nbsp;Approve</span></a>
                <?php
                  }
                  ?>
              </li>
              <li>
                <a href="#myModal_remark" name="add_remark" data-id="<?php echo $ctable_d['id']?>" data-toggle="modal" title="View Customer"><i class="fa fa-circle"></i> &nbsp;Add/Edit Remark</span></a>
              </li>
            </ul>
          </div>
          <?php 
            $count=$db->rp_getTotalRecord("payment_info","appointment_id='".$ctable_d['id']."'",0);
            
            if($count<=0 && $ctable_d['isVerified']==1)
            {
            ?>
          <a href="#myModal" class="btn btn-default btn-sm dropdown-toggle" data-id="<?php echo  stripslashes($ctable_d['id']); ?>" data-toggle="modal" title="View Customer"><span class="text-success">&nbsp; Payment</span></a>
          <?php
            }
            }
            ?>
        </td>
        <td><?php echo stripslashes($ctable_d['remark']); ?></td>
      </tr>
      <?php
        }
        
        }
        }
        else{
        ?>
      <td colspan="9" align="center"><?php echo "No data available";?></td>
      <?php
        }
             ?>
    </tbody>
  </table>
  <div class="row">
    <div class="col-md-6">
      <div class="dataTables_info">
        Rows Limit:
        <select id="numRecords" onChange="changeDisplayRowCount(this.value);">
          <option value="10" <?php if ($_REQUEST["show"] == 10 || $_REQUEST["show"] == "" ) { echo ' selected="selected"'; }  ?> >10</option>
          <option value="20" <?php if ($_REQUEST["show"] == 20) { echo ' selected="selected"'; }  ?> >20</option>
          <option value="30" <?php if ($_REQUEST["show"] == 30) { echo ' selected="selected"'; }  ?> >30</option>
        </select>
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
  </div>
</form>
<script type="text/javascript"></script>