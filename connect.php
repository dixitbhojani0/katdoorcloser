<?php
	// error_reporting(0);
	session_start();
	date_default_timezone_set('Asia/Kolkata');
	include_once("include/define.php");
	require_once("include/function.class.php");
	require_once("include/class.system.php");
	$db = new Admin();
	$conn = $db->connect();
	$system=new System();
	if(isset($_SESSION['success_msg']))
	{
	    $success_msg=$_SESSION['success_msg'];
	    unset($_SESSION['success_msg']);
	}
	if(isset($_SESSION['error_msg']))
	{
	    $error_msg=$_SESSION['error_msg'];
	    unset($_SESSION['error_msg']);
	}
	$keywords="";
	$description="";
	$autor="";
	$rights=$_SESSION['rights']=array("insert_flag"=>1,"view_flag"=>1,"update_flag"=>1,"delete_flag"=>1);
?>