<?php
header('Content-Type: application/json');
include("connect.php"); 
$error					= false;
$absolutedir			= dirname(__FILE__);
$dir					= CATEGORY_A;
$serverdir				= $absolutedir.$dir;
$tmp					= explode(',',$_POST['data']);
$imgdata 				= base64_decode($tmp[1]);
$extension				= strtolower(end(explode('.',$_POST['name'])));
if(isset($_SESSION['image_path']) && $_SESSION['image_path']!=""){
unlink(CATEGORY_T.$_SESSION['image_path']);
}
$filename				= time()."_".rand(1,9999999)."bn".".".$extension;
if ($_POST['name'] != "") {
$_SESSION['image_path']=$filename;
$handle					= fopen(CATEGORY_T.$filename,'w');
fwrite($handle, $imgdata);
fclose($handle);
$response = array(
"status" 		=> "success",
"url" 			=> CATEGORY_T.$filename.'?'.time(),
"filename" 		=> $filename
);
}
print json_encode($response);