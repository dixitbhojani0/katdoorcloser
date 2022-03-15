<?php
  $page_id=503;$page_slug='page_customer';
  include("connect.php");
  $ctable 	= "customer_branch";
  
  //var_dump($_REQUEST);exit;
  if(isset($_REQUEST['mode']) && $_REQUEST['mode']!="")
  {
  	$service=$_REQUEST['mode'];
  	if($service=="order_data")
  	{
  		$order_month=isset($_REQUEST['month'])?$_REQUEST['month']:date("m");
  		$order_year=isset($_REQUEST['year'])?$_REQUEST['year']:date("Y");
  		$order_data_r=$db->rp_getData("contact_us","*","MONTH(created_date)='".$order_month."' AND YEAR(created_date)='".$order_year."' AND isDelete=0","",0);
  		if($order_data_r)
  		{
  			$orders=array();
  			while($order_data=mysqli_fetch_assoc($order_data_r))
  			{
  				$order_id=$order_data['id'];
  				$name=$name['name'];
  				$created_date=date("j",strtotime($order_data['created_date']));
  				// $order_grand_total=$order_data['$order_grand_total'];
  				// $order_timestamp=date("j",strtotime($order_data['created_date']));
  				// $invoice_date=date("j",strtotime($order_data['created_date']));
  				if(array_key_exists($order_timestamp,$orders))
  				{
  					$old_order_no=$orders[$order_timestamp]['orders'];
  					$old_order_total=$orders[$order_timestamp]['revenue'];
  					$old_order_ids=$orders[$order_timestamp]['order_ids'];
  					$grand_total=$order_grand_total;
  					if($grand_total!="")
  					$grand_total=doubleval($grand_total);
  					$old_order_total+=$grand_total;
  					$old_order_no+=1;
  					$old_order_ids[]=$order_id;
  					$orders[$order_timestamp]=array("orders"=>$old_order_no,"revenue"=>$old_order_total,"order_ids"=>$old_order_ids,"date"=>$invoice_date);
  					
  				}
  				else
  				{
  					$grand_total=$order_grand_total;
  					if($grand_total!="")
  					$grand_total=doubleval($grand_total);
  					$orders[$order_timestamp]=array("orders"=>1,"revenue"=>$grand_total,"order_ids"=>array($order_id),"date"=>$invoice_date);
  				}
  			}
  			
  			for($i=1;$i<=31;$i++)
  			{
  				if(!array_key_exists($i,$orders))
  				{
  					$orders[$i]=array("orders"=>0,"revenue"=>0,"order_ids"=>array(),"date"=>$i);
  				}
  			}
  			ksort($orders);
  			$response=array('ack'=>1,'ack_msg'=>'Order data fetched !!!',"result"=>$orders);
  			echo json_encode($response);
  		}
  		else
  		{
  			$response=array('ack'=>0,'ack_msg'=>'Branch name can not be empty !!!');
  			echo json_encode($response);
  		}
  		
  	}
  	else if($service=="sales_item_data")
  	{
  		$where="";
  		$fg_item=isset($_REQUEST['fg_item'])?$_REQUEST['fg_item']:"";
  		$order_month=isset($_REQUEST['month'])?$_REQUEST['month']:date("m");
  		$order_year=isset($_REQUEST['year'])?$_REQUEST['year']:date("Y");
  		if($fg_item!="")
  		{
  			$where="id='".$fg_item."'";
  		}
  		
  		$where=($where!="")?$where." AND isDelete=0":"isDelete=0";
  		$fg_item_data_r=$db->rp_getData("item_fg","*",$where,"fg_item_name ASC limit 100",0);
  		if($fg_item_data_r)
  		{
  			?>
<table class="table table-bordered table-striped table-condensed flip-content">
  <thead>
    <tr class="uppercase">
      <th colspan="2"> FG Item </th>
      <th> Current Stock  </th>
      <th> Planning Qty.  </th>
      <th> Earnings  </th>
      <th> Total Invoice Qty.</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      while($fg_item_data=mysqli_fetch_assoc($fg_item_data_r))
      {
      	$order_ids_r=$db->rp_getData("order_detail","id","MONTH(order_date)='".$order_month."' AND YEAR(order_date)='".$order_year."'");
      	$order_ids=array();
      	if($order_ids_r)
      	{
      		while($order_id=mysqli_fetch_assoc($order_ids_r))
      		$order_ids[]=$order_id['id'];
      	}
      	if(!empty($order_ids))
      	{
      		$order_ids=implode(",",$order_ids);
      		$order_stock_qty=$db->rp_getValue("order_item","SUM(order_item_qty)","order_item_fg_id='".$fg_item_data['id']."' AND order_id IN (".$order_ids.") AND  isDelete=0",0);
      		$earning=$db->rp_getValue("order_item","SUM(order_item_sub_total)","order_item_fg_id='".$fg_item_data['id']."' AND order_id IN (".$order_ids.")  AND  isDelete=0",0);
      	}
      	else
      	{
      		$order_stock_qty=0;
      		$earning=0;
      	}
      	$planning_qty=$db->rp_getValue("planning_info","SUM(item_planning_qty)","item_id='".$fg_item_data['id']."' AND  isDelete=0",0);
      ?>
    <tr>
      <td class="fit">
        <img class="user-pic rounded" src="assets/global/img/avatar.png"> 
      </td>
      <td class="text-center">
        <?php
          echo  $fg_item_data['fg_item_name'];
          ?>
      </td>
      <td class="text-center"> <?php  echo $fg_item_data['fg_stock_qty']; ?> </td>
      <td class="text-center"> <?php  echo $planning_qty; ?> </td>
      <td class="text-center"> <?php  echo $earning;?>  </td>
      <td class="text-center"> <?php  echo ($order_stock_qty!="" && $order_stock_qty!=0)?$order_stock_qty:"--"; ?> </td>
    </tr>
    <?php }?>
  </tbody>
</table>
<?php
  }
  else
  {
  	$response=array('ack'=>0,'ack_msg'=>'No Data Found !!!');
  	echo json_encode($response);
  }
  
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