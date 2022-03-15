<?php
  $page_id=515;$page_slug='page_payment';
  /*
   * @author mr._.raj
   */
  include("connect.php");
  
  $id=$_REQUEST['id'];
  $mode=isset($_REQUEST['mode'])?$_REQUEST['mode']:"a";
  include('../include/class.payment.php');
  $payment_obj=new Payment();
  
  if(isset($_REQUEST['submit'])){
  	
  $params=array();
  
  $params['appointment_id']=$id;
  $params['amount']=trim($_REQUEST['amount']);
  $params['date']=date('Y-m-d H:i:s');
  $params['remark']=trim($_REQUEST['remark']);
  
  	if($mode=='a')
  	{
  		
  	    $reply=$payment_obj->insert($params,array("key"=>"appointment_id","value"=>$params['appointment_id']));
  		
  		if($reply['ack']==1)
  		{
  			$success_msg[]=$reply['ack_msg'];
              $_SESSION['success_msg']= $success_msg;
              $db->rp_location("appointment_manage.php");
  		}
  		else
  		{
  			$error_msg[]=$reply['ack_msg'];
  		}
  	}
  }
  
  ?>
<div class="row">
  <div class="col-sm-12">
    <h4><b>Payment</b></h4>
    <form action="ajax_get_payment.php?mode=a&id=<?php echo $id;?>" method="post">
      <table id="datatable_1" class="table table-striped table-bordered table-hover">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input class="form-control" type="text" name="amount" placeholder="Amount" id="amount" />
              <p class="help-block"></p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input class="form-control" type="text" name="remark" placeholder="Remark" id="remark" />
              <p class="help-block"></p>
            </div>
          </div>
        </div>
        <div class="form-actions noborder">
          <input type="submit" value="Submit" name="submit" class="btn blue"/>
        </div>
      </table>
    </form>
  </div>
</div>