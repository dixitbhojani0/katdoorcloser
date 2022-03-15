<?php
  $page_id="504";
  
  /*
   * @author mr._.raj
   */
  include("connect.php");
  $ctable 	= "alt_img";
  $ctable1 	= "Alter Image";
  
  $ctable_where = "";
  // Get the total number of rows in the table
  
  
  $ctable_where .= " isDelete=0 AND pid='".$_REQUEST['pid']."'";
  
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
  
  $ctable_r = $db->rp_getData($ctable,"*",$ctable_where,"id DESC limit $page_position, $item_per_page",0);
  ?>
<form action="alt_img_manage.php?pid=<?php echo $_REQUEST['pid']; ?>" name="frm" id="frm" method="post">
  <table id="datatable_1" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Display Order</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if($ctable_r){
            $count = 0;
            
            while($ctable_d = mysqli_fetch_array($ctable_r)){
                $count++;
        
        ?>
      <tr>
        <td><?php echo $count; ?></td>
        <td align="center"><?php if($ctable_d['image_path']!="" && file_exists(ALT_IMAGE_A.$ctable_d['image_path'])){
          ?>
          <img src="<?php echo ALT_IMAGE_A.$ctable_d['image_path']; ?>" width="150" height="120" />
          <?php
            }else{
            echo "No Image Available.";
            }?>
        </td>
        <td align="center">
          <input type="text" name="disp<?php echo $count; ?>" id="disp<?php echo $count; ?>" value="<?php echo $ctable_d['display_order']; ?>" style="width:40px;text-align:center">
          <input type="hidden" name="p_id<?php echo $count ?>" value="<?php echo $ctable_d['id']; ?>">
        </td>
        <td>
          <?php 				
            if($rights['update_flag']==1)
            {
            	?>
          <a class="btn btn-info btn-sm" onClick="window.location.href='<?php echo $ctable; ?>_crud.php?mode=e&id=<?php echo $ctable_d['id']; ?>&pid=<?php echo $_REQUEST['pid'];?>'" title="Edit"><i class="fa fa-pencil"></i></a>
          <?php
            }
            if($rights['delete_flag']==1)
            {
            	?>
          <a class="btn btn-danger btn-sm" onClick="del_conf('<?php echo $ctable_d['id']; ?>');" title="Delete"><i class="fa fa-times"></i></a>
          <?php
            }
            
            ?>
        </td>
      </tr>
      <?php
        }
        }
        ?>
    </tbody>
  </table>
  <div align="center">
    <div class="btn-group">
      <input type="hidden" name="disp_count" value="<?php echo $count; ?>">
      <button type="submit" name="submit" onClick="document.frm.submit();" class="btn btn-primary btn-flat" >Update</button>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div></div>
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