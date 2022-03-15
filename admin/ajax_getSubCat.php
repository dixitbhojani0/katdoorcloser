<?php
  include("connect.php");
  $cid      = $_POST["cid"];
  
  $where = " cid = '$cid' AND isDelete=0";
  $sub_cat_r = $db->rp_getData("sub_category","*",$where);
  if(mysqli_num_rows($sub_cat_r)>0){
    ?>
<option value="">Select Sub Category</option>
<?php
  while($sub_cat_d = mysqli_fetch_array($sub_cat_r)){
  ?>
<option value="<?php echo $sub_cat_d['id']; ?>"><?php echo $sub_cat_d['name']; ?></option>
<?php
  }
  }else{
  ?>
<option value="">Select Sub Category</option>
<?php
  }
  ?>