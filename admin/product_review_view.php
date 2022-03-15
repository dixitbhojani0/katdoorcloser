<?php
  $page_id="1";
  
  /*
   * @author mr._.raj
   */
  include("connect_in.php");
  $ctable   = "product_review";
  $ctable1  = "product_review";
  if(isset($_REQUEST['product']) && $_REQUEST['product']!=""){
      $ctable_where .= " pid ='".$_REQUEST['product']."'
                           AND ";
  }
  $ctable_where = "";
  // Get the total number of rows in the table
  
  if(isset($_REQUEST['searchName']) && $_REQUEST['searchName']!=""){
      $ctable_where .= " (
                              name like '%".$_REQUEST['searchName']."%' OR contact_number like '%".$_REQUEST['searchName']."%' OR email like '%".$_REQUEST['searchName']."%'
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
  
  $ctable_r = $db->rp_getData($ctable,"*",$ctable_where,"id DESC",0);
  ?>
<html>
  <head>
    <style>
      .mainDiv, table{
      height: auto;   
      width:100%;
      font-family: Calibri,sans-serif;
      font-style: normal;
      font-weight: 400;
      padding: 0;
      text-decoration: none;
      font-size: 10pt;
      margin:auto;
      padding:auto;
      }
      table , td, th {
      border-collapse: collapse;
      border: 1px solid #000;
      }
      td, th {
      padding: 2px;
      }
      th {
      border: 1px solid #595959; 
      background: #f0e6cc;
      }
      .center
      {
      text-align:center;
      }
      .space
      {
      padding: 10px;
      }
      .no-border
      {
      border-bottom: 1px solid #fff;
      }
    </style>
  </head>
  <body>
    <div id="print_info">
      <table id="datatable_1" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <td align="center" colspan="8">
              <h3>Product Inquiry Data</h3>
            </td>
          </tr>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Product Name</th>
            <th>Email</th>
            <!-- <th>Phone Number</th> -->
            <!-- <th>Approx Quantity</th> -->
            <th>Comment</th>
            <th>Created Date</th>
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
            <td align="center"><?php echo $count; ?></td>
            <td align="center"><?php echo stripslashes($ctable_d['name']); ?></td>
            <td align="center"><?php echo $db->rp_getValue("product","name","id='".$ctable_d['product_id']."'",0); ?></td>
            <td align="center"><?php echo stripslashes($ctable_d['email']); ?></td>
           <!--  <td align="center"><?php echo stripslashes($ctable_d['contact_number']); ?></td> -->
            <!-- <td align="center"><?php echo stripslashes($ctable_d['p_quantity']); ?></td> -->
            <td align="center"><?php echo stripslashes($ctable_d['comment']); ?></td>
            <td align="center"><?php echo stripslashes($ctable_d['created_date']); ?></td>
          </tr>
          <?php
            }
            }
            ?>
        </tbody>
      </table>
    </div>
  </body>
</html>