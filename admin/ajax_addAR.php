<?php
  $page_id=5895;
  include("connect.php");
  $ctable 	= "page_admin_right";
  $tid 		= $_POST["pid"];
  $pid 		= $_POST["tid"];
  $insert_flag 		= $db->rp_num($_POST["insert_flag"]);
  $view_flag 		= $db->rp_num($_POST["view_flag"]);
  $delete_flag 		= $db->rp_num($_POST["delete_flag"]);
  $update_flag 		= $db->rp_num($_POST["update_flag"]);
  $mode 		= $_POST["mode"];
  if($mode=="edit"){
  	if($_REQUEST['id']!="" && $_REQUEST['id']>0 ){
  		$rows 	= array(				
  				"insert_flag"				=> $insert_flag,
  				"view_flag"					=> $view_flag,
  				"update_flag"				=> $update_flag,
  				"delete_flag"				=> $delete_flag			
  			);
  			
  		$where	= "id='".$_REQUEST['id']."'";
  		$db->rp_update($ctable,$rows,$where,0);
  		echo "1";die;
  	}else{
  		echo "0";die;
  	}
  }else{
  
  	if($pid!="" && $tid!=""){
  		$dup_where = "page_id = '".$pid."' AND admin_id = '".$tid."' AND isDelete=0";
  		$r = $db->rp_dupCheck($ctable,$dup_where);
  		if($r){
  			echo "2";die;
  		}else{
  			$display_order	= $db->rp_getDisplayOrder($ctable);
  			$rows 	= array(
  					"page_id",
  					"admin_id",
  					"insert_flag",
  					"view_flag",
  					"update_flag",
  					"delete_flag",
  					
  				);
  			$values = array(
  					$pid,
  					$tid,
  					$insert_flag,
  					$view_flag,
  					$update_flag,
  					$delete_flag,
  					
  				);
  			$db->rp_insert($ctable,$values,$rows,0);
  			echo "1";die;
  		}
  	}else{
  		echo "0";die;
  	}
  }
  ?>