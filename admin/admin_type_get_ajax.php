<?php
  $page_id="513";
  
  /*
   * @author mr._.raj
   */
  include("connect.php");
  $ctable 	= "admin_type";
  $ctable1 	= "Admin Type";
  
  $ctable_where = "";
  // Get the total number of rows in the table
  
  if(isset($_REQUEST['searchName']) && $_REQUEST['searchName']!=""){
  	$ctable_where .= " (
  							name like '%".$_REQUEST['searchName']."%' OR
  							) AND ";
  }
  
  $ctable_where .= " isDelete=0";
  
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
  
  $ctable_r = $db->rp_getData($ctable,"*",$ctable_where,"id DESC limit $page_position, $item_per_page");
  ?>
<form action="" name="frm" id="frm" method="post">
  <table id="datatable_1" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if(mysqli_num_rows($ctable_r)>0){
            $count = 0;
            
            while($ctable_d = mysqli_fetch_array($ctable_r)){
                $count++;
        if($ctable_d['id']==0)
        {
        continue;
        }
        ?>
      <tr>
        <td><?php echo $ctable_d['id'] ?></td>
        <td><?php echo stripslashes($ctable_d['name']); ?></td>
        <td>
          <a class="btn btn-info btn-sm" onClick="window.location.href='<?php echo $ctable; ?>_crud.php?mode=e&id=<?php echo $ctable_d['id']; ?>'" title="Edit"><i class="fa fa-pencil"></i></a>
          <a class="btn btn-danger btn-sm" onClick="del_conf('<?php echo $ctable_d['id']; ?>');" title="Delete"><i class="fa fa-times"></i></a>
          <a class="btn btn-primary btn-sm" onClick="window.location.href='page_admin_right_manage.php?mode=a&pid=<?php echo $ctable_d['id']; ?>'" title="Add Rights"><i class="fa fa-link"></i></a>
          <div class="btn-group">
            <!--<button aria-expanded="false" data-toggle="dropdown" type="button" class="btn btn-sm green dropdown-toggle"> 
              <i class="fa fa-ellipsis-v"></i>
              </button>
              <ul role="menu" class="dropdown-menu">
              <li>
              	<?php
                if($ctable_d['isActive']==0){
                ?>
              		<a  href="add_<?php echo $ctable; ?>.php?mode=isActive&id=<?php echo $ctable_d['id']; ?>&status=1" title="Activate"><span class="text-success"><i class="fa fa-circle"></i> &nbsp;Activate</span></a>
              	<?php
                }else{
                ?>
              		<a  href="add_<?php echo $ctable; ?>.php?mode=isActive&id=<?php echo $ctable_d['id']; ?>&status=0" title="Deactivate"><span class="text-danger" ><i class="fa fa-circle-o"></i> &nbsp; Deactivate </span></a>
              	<?php
                }
                ?>
              </li>
              
              </ul>-->
          </div>
        </td>
      </tr>
      <?php
        }
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