<?php
$page_id=503;$page_slug='page_customer';
include("connect.php");
$ctable 	= "contact_us";

//var_dump($_REQUEST);exit;
if(isset($_REQUEST['mode']) && $_REQUEST['mode']!="")
{
	$service=$_REQUEST['mode'];
	if($service=="contact_us")
	{
		$order_month=isset($_REQUEST['month'])?$_REQUEST['month']:date("m");
		$order_year=isset($_REQUEST['year'])?$_REQUEST['year']:date("Y");
		$contact_r=$db->rp_getData("contact_us","*","MONTH(created_date)='".$order_month."' AND YEAR(created_date)='".$order_year."' AND isDelete=0 GROUP BY date(created_date)","",0);


    // Get Total Days in month and year
    $d=cal_days_in_month(CAL_GREGORIAN,$order_month,$order_year);
    
    // Create Array of Total Days in month and year
    $days = range(1,$d);
    array_unshift($days,"");
    unset($days[0]);

    if($contact_r)
    { 
      while($contact_d=mysqli_fetch_assoc($contact_r))
      { 
        $total_record = $db->rp_getTotalRecord("contact_us","date(created_date)='".date('Y-m-d',strtotime($contact_d['created_date']))."'",0);
        $gt = $total_record;
        $cd = date("d",strtotime($contact_d['created_date']));
        $nd = 1 * $cd;
        $data[$nd]=array("revenue"=>$gt,"date"=>$nd);
      }
    }
    for($i=1;$i<=$d;$i++)
    {
      if(array_search($days[$i], array_column($data, 'date')) === false) 
      { 
        $data[$i]=array("revenue"=>0,"date"=>$days[$i]);
      }
    }
    ksort($data); 
    $response=array('ack'=>1,'ack_msg'=>'Contact data fetched !!!',"result"=>$data);
    echo json_encode($response); 
	}	 
  else if($service=="product_inquiry")
  {
    $order_month=isset($_REQUEST['month'])?$_REQUEST['month']:date("m");
    $order_year=isset($_REQUEST['year'])?$_REQUEST['year']:date("Y");
    $contact_r=$db->rp_getData("product_inquiry","*","MONTH(created_date)='".$order_month."' AND YEAR(created_date)='".$order_year."' AND isDelete=0 GROUP BY date(created_date)","",0);


    // Get Total Days in month and year
    $d=cal_days_in_month(CAL_GREGORIAN,$order_month,$order_year);
    
    // Create Array of Total Days in month and year
    $days = range(1,$d);
    array_unshift($days,"");
    unset($days[0]);

    if($contact_r)
    { 
      while($contact_d=mysqli_fetch_assoc($contact_r))
      { 
        $total_record = $db->rp_getTotalRecord("product_inquiry","date(created_date)='".date('Y-m-d',strtotime($contact_d['created_date']))."'",0);
        $gt = $total_record;
        $cd = date("d",strtotime($contact_d['created_date']));
        $nd = 1 * $cd;
        $data[$nd]=array("revenue"=>$gt,"date"=>$nd);
      }
    }
    for($i=1;$i<=$d;$i++)
    {
      if(array_search($days[$i], array_column($data, 'date')) === false) 
      { 
        $data[$i]=array("revenue"=>0,"date"=>$days[$i]);
      }
    }
    ksort($data); 
    $response=array('ack'=>1,'ack_msg'=>'Product data fetched !!!',"result"=>$data);
    echo json_encode($response); 
  } 
  else
  {
    $response=array('ack'=>0,'ack_msg'=>'Something went wrong Try Again!!');
    echo json_encode($response);
  }
}
else
{
  $response=array('ack'=>0,'ack_msg'=>'Something went wrong Try Again!!');
  echo json_encode($response);
}  
?>