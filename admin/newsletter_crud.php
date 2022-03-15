<?php
   $page_id="1";
   include("connect.php");
   
   // PAGE DECLARATION
   $main_page   = "dashboard";
   $page        = "newsletter";
   $page_title  = "Delete Newsletter";
   $page_hierarchy=array(array("link"=>"dashboard.php","title"=>"dashboard"),array("link"=>"newsletter_manage.php","title"=>"Manage Newsletter"),array("link"=>"newsletter_crud.php","title"=>"Delete Newsletter"));
   $success_msg=array();
   $error_msg=array();
   // PAGE DECLARATION
   
   // INCLUDE CLASS
   //include('../include/class.user.php');
   include('../include/class.newsletter.php');
   $newsletter_obj=new Newsletter();
   $mode=isset($_REQUEST['mode'])?$_REQUEST['mode']:"d";
   
   // Variable Definations
   if(isset($_REQUEST['submit'])){
       // Variable Declaration
       // GET SUBMITTED FORM VALUES
   $params=array();
   if(isset($_REQUEST['id']))
   $params['id']=trim($db->clean($_REQUEST['id']));
   
       if($mode=='d')
       {
           $reply=$newsletter_obj->delete(array("key"=>"id","value"=>$params['id']));
           if($reply['ack']==1)
           {
               $success_msg[]=$reply['ack_msg'];
               $_SESSION['success_msg']= $success_msg;
               $db->rp_location("newsletter_manage.php");
           }
           else
           {
               $error_msg[]=$reply['ack_msg'];
            $_SESSION['error_msg']= $error_msg;
            $db->rp_location("newsletter_manage.php");
           }
       }
   } 
   
   ?>