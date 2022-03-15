<?php
  //echo "aa"; 
  include("connect.php");
  $ctable 	= "country";
  $ctable1 	= "state";
  //echo $_REQUEST['country'];exit;
  $default_state=(isset($_REQUEST['default_state']))?$db->clean($_REQUEST['default_state']):"";
  //$ctable_r = $db->rp_getData($ctable,"*",$ctable_where,0);
  ?>
<option value="">--- Select State---</option>
<?php
  $id_r1 = $db->rp_getData("state","*","country_id = '".$_REQUEST["country"]."'",0);
  if(mysqli_num_rows($id_r1)>0){
  												
  		while($id_d1 = mysqli_fetch_array($id_r1)){?>
<option <?=($default_state==$id_d1['id'])?"selected":"" ?> value="<?php echo $id_d1['id']; ?>"><?php echo $id_d1['name']; ?></option>
<?php
  }
  }
  ?>