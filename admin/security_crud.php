<?php
  $page_id=585;$page_slug='SECURITY_PAGE';
  $ctable 	                    = "security";
  $ctable1 	                    = "Security";
  $main_page 	                    = "product_mgmt";
  $page 		                    = "manage_".$ctable;
  $mode                           =isset($_REQUEST['mode'])?$_REQUEST['mode']:"add";
  
  // echo $mode;exit;
  $page_title                     = ucwords($mode)." ".$ctable1;
  include("connect.php");
  require_once("../include/security.class.php");
  $objFGItemMaster                = new Security();
  if(isset($_REQUEST['id']) && $_REQUEST['id']>0 && $_REQUEST['mode']=="delete"){
  
  	$db->checkRightFlag("delete_flag");
  	$detail['id']=$_REQUEST['id'];
  	$reply=$objFGItemMaster->Delete($detail);
  		if($reply['ack']==1){
  		$system->addMessage($reply['ack_msg'],'success');
  		$db->rp_location($ctable."_manage.php?msg=deleted");
  		}
  		else{
  			$system->addMessage($reply['ack_msg'],'error');
  		}
  }
  ?>