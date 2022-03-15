<?php
  $page_id="1";
  
  /*
   * @author mr._.raj
   */
  include("connect.php");
  $ctable   = "about_us";
  $ctable1  = "about_us";
  
  $ctable_where = "";
  // Get the total number of rows in the table
  
  if(isset($_REQUEST['searchName']) && $_REQUEST['searchName']!=""){
      $ctable_where .= " (
                              short_title,long_title like '%".$_REQUEST['searchName']."%'
                          ) AND ";
  }
  
  $ctable_where .= " isDelete=0";
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
        <th>Short Title</th>
        <th>Long Title</th>
        <th>Short Description</th>
        <th>Big Description</th>
        <th>short Image</th>
        <th>Big Image</th>
        <th>Create Date</th>
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
        <td><?php echo $ctable_d['short_title']; ?></td>
        <td><?php echo $ctable_d['long_title']; ?></td>
        <td><?php echo $ctable_d['short_description']; ?></td>
        <td><?php echo $ctable_d['big_description']; ?></td>
        <td>
          <?php
            if($ctable_d['short_image_path']!="" && file_exists(SHORT_IMAGE_A.$ctable_d['short_image_path'])){
            ?>
          <img src="<?php echo SHORT_IMAGE_A.$ctable_d['short_image_path']; ?>" width="150" height="120" />
          <?php
            }else{
            echo "No Image Available.";
            }
            ?>
        </td>
        <td>
          <?php
            if($ctable_d['big_image_path']!="" && file_exists(BIG_IMAGE_A.$ctable_d['big_image_path'])){
               ?>
          <img src="<?php echo BIG_IMAGE_A.$ctable_d['big_image_path']; ?>" width="150" height="120" />
          <?php
            }else{
               echo "No Image Available.";
            }
            ?>
        </td>
        <td><?php echo date("d-m-Y H-i-s a",strtotime($ctable_d['adate'])); ?></td>
        <td>
          <a class="btn btn-info btn-sm" onClick="window.location.href='about_us_crud.php?mode=e&id=<?php echo $ctable_d['id']; ?>'" title="Edit"><i class="fa fa-pencil"></i></a>
          <a class="btn btn-danger btn-sm" onClick="del_conf('<?php echo $ctable_d['id']; ?>');" title="Delete"><i class="fa fa-times"></i></a>
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