<?php
//error_reporting(0);
session_start();
date_default_timezone_set('Asia/Kolkata');
require_once("../include/define.php");
require_once("../include/function.class.php");
require_once("../include/class.system.php");
$db = new Admin();
$conn = $db->connect();
?>