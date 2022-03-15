<?php
  $page_id="1";
  
  /*
   * @author mr._.raj
   */
  include("connect.php");
  $ctable   = "security";
  $ctable1  = "security";
  
  $ctable_where = "";
  // Get the total number of rows in the table
  
  if(isset($_REQUEST['searchName']) && $_REQUEST['searchName']!=""){
      $ctable_where .= " (
          ip like '%".$_REQUEST['searchName']."%'
      ) AND ";
  }
  
  $ctable_where .= " status=1";
  //status
  
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
<div class="col-md-12 pull-right">
</div>
</div>
<form action="banner_manage.php" name="frm" id="frm" method="post">
  <table id="datatable_1" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No.</th>
        <th>Ip</th>
        <th>Last time</th>
        <th>Attemps</th>
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
        <td><?php echo stripslashes($ctable_d['ip']); ?></td>
        <td><?php echo stripslashes($ctable_d['ltime']); ?></td>
        <td><?php echo stripslashes($ctable_d['attempts']); ?></td>
        <td>
          <a class="btn btn-danger btn-sm" onClick="del_conf('<?php echo $ctable_d['id']; ?>');" title="unblock"><i class="fa fa-unlock-alt"></i></a>
        </td>
      </tr>
      <?php
        }
        }else
        {
        ?>
      <tr>
        <td class="text-center" colspan="5">No Data Found</td>
      </tr>
      <?php
        }
        ?>
    </tbody>
  </table>
  <div align="center">
    <div class="btn-group">
      <input type="hidden" name="disp_count" value="<?php echo $count; ?>">
    </div>
  </div>
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