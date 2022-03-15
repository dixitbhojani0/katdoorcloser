<?php
  //echo "aa"; 
  include("connect.php");
  $ctable 	= "state";
  $ctable1 	= "city";
  //echo $_REQUEST['country'];exit;
  $default_city=(isset($_REQUEST['default_city']))?$db->clean($_REQUEST['default_city']):"";
  //$ctable_r = $db->rp_getData($ctable,"*",$ctable_where,0);
  ?>
<option value="">--- Select city---</option>
<?php
  if($_REQUEST["state"]!="")
  {
  	/*$id_r=$db->rp_getValue("state","state_id","name='".$_REQUEST["state"]."'",0);*/
  	$id_r1 = $db->rp_getData("city","*","state_id = '".$_REQUEST["state"]."'",0);
  	if(mysqli_num_rows($id_r1)>0){
  												
  		while($id_d1 = mysqli_fetch_array($id_r1)){?>
<option <?=($default_city==$id_d1['id'])?"selected":"" ?> value="<?php echo $id_d1['id']; ?>"><?php echo $id_d1['name']; ?></option>
<?php
  }
  }
  }
  
  ?>