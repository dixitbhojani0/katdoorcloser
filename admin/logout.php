<?php
  $page_id=403;
  $page_slug="logout";
  include("connect.php");
  unset($_SESSION[SITE_SESS.'_ADMIN_SESS_ID']);
  unset($_SESSION['rights']);
  unset($_SESSION['SESS_NAME']);
  session_destroy();
  $db->rp_location("index.php");
  ?>