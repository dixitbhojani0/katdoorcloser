<?php
   $page_id="1";
   include("connect.php");
   
   // PAGE DECLARATION
   $main_page   = "dashboard";
   $page        = "contact_us";
   $page_title  = "Delete Message";
   $page_hierarchy=array(array("link"=>"dashboard.php","title"=>"dashboard"),array("link"=>"product_review_manage.php","title"=>"Manage Message"),array("link"=>"product_review_crud.php","title"=>"Delete Message"));
   $success_msg=array();
   $error_msg=array();
   // PAGE DECLARATION
   
   // INCLUDE CLASS
   //include('../include/class.user.php');
   include('../include/class.product_review.php');
   $contact_obj=new ProductInquiry();
   $mode=isset($_REQUEST['mode'])?$_REQUEST['mode']:"d";
   
   // Variable Definations
   $id='';
   $firstname='';$lastname='';
   $email='';$topic='';$message='';
   
   if(isset($_REQUEST['submit'])){
       // Variable Declaration
       // GET SUBMITTED FORM VALUES
   $params=array();
   if(isset($_REQUEST['id']))
   $params['id']=trim($db->clean($_REQUEST['id']));
   
       if($mode=='d')
       {
           $reply=$contact_obj->delete(array("key"=>"id","value"=>$params['id']));
           if($reply['ack']==1)
           {
               $success_msg[]=$reply['ack_msg'];
               $_SESSION['success_msg']= $success_msg;
               $db->rp_location("product_review_manage.php");
           }
           else
           {
               $error_msg[]=$reply['ack_msg'];
            $_SESSION['error_msg']= $error_msg;
            $db->rp_location("product_review_manage.php");
           }
       }
   } 
   
   ?>