<?php
  $page_id=3;
  
  $page_slug = "product";
  include("connect.php");
  	
  ?>
<!-- for get state -->
<?php
  if(!empty($_POST["cid"]))
  {
  	$sc_r = $db->rp_getData("sub_category","*","cid = '".$_POST["cid"]."'",0);
  
  ?>
<option value=""> -- Select Sub Category -- </option>
<?php
  while($sc_d = mysqli_fetch_assoc($sc_r))
  {
  ?>
<option value="<?php echo $sc_d['id']; ?>" ><?php echo $sc_d['name']; ?></option>
<?php
  }
  }
  else
  {
  ?>
<?php
  }
      ?>