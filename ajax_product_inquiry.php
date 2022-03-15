<?php
    include("connect.php");
    if(isset($_POST))
    {
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        $date=date("Y-m-d h:i:s");
        extract($_POST);

        $values=array($name,$email,$p_quantity,$message,$date,$mobile_no,$pid);
        $rows=array("name","email","p_qty","message","created_date","contact_no","product_id");

        $insert=$db->rp_insert("product_inquiry",$values,$rows,0);
        if($insert)
        {
            $reply=array("ack"=>1,"developer_msg"=>" Detail insert successfully!!","ack_msg"=>"We Will Contact You Soon......");
            echo json_encode($reply);
        }
        else
        {
            $reply=array("ack"=>0,"developer_msg"=>"Demo Detail insert successfully!!","ack_msg"=>"product inquiry added failed...");
            echo json_encode($reply);
        }
    }
?>