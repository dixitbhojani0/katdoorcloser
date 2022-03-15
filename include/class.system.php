<?php
  class System extends Functions
  {
  	public $db;
  	public $user_id;
  	public $notifications;
      function __construct($id="") 
  	{
  		$db = new Functions();
  		$conn =$db->connect();
  		$this->db=$db;	
  		$this->notifications=array();
  		$this->user_id=isset($_SESSION[SITE_SESS.'_ADMIN_SESS_ID'])?$_SESSION[SITE_SESS.'_ADMIN_SESS_ID']:0;		
      } 
  	
  	public function setNotification($notification_id,$user_id,$notification_msg,$notification_icon="fa fa-notification",$notification_extra="")
  	{
  		
  		$adate	= date('Y-m-d H:i:s');
  			$rows 	= array(
  						"user_id",
  						"notification_msg",
  						"notification_icon",
  						"notification_extra",
  						"isDelete",
  						"isActive",
  					);
  			$values = array(
  						$user_id,
  						$notification_msg,		
  						$notification_icon,		
  						$notification_extra,		
  						0,
  						1,
  					);
  					
  		 	$uid = $this->db->rp_insert("notification",$values,$rows,0);
  			
  			$this->notifications[$notification_id]=array("notification_id"=>$notification_id,"notification_msg"=>$notification_msg,"notification_extra"=>$notification_extra);
  	}
  	public function getNotification($notification_id)
  	{
  		if(array_key_exists($notification_id,$this->notifications))
  		{
  			return $this->notifications[$notification_id];
  		}
  		else
  		{
  			return false;
  		}
  	}
  	public function getNotifications()
  	{
  		$where = " user_id='".$this->user_id."' AND isDelete=0";
  		$ctable_r = $this->db->rp_getData("notification","*",$where,0);
  		$result=array();
  		while($ctable_d = mysqli_fetch_array($ctable_r)){
  			$result[]=$ctable_d;
  		}
  		if(!empty($result))
  		{
  			return $result;
  		}
  		else
  		{
  			return false;
  		}
  	}
  	public function deleteNotifications($notification_id)
  	{
  		
  		$isDeleted=$this->db->rp_delete("notification","id='".$notification_id."'",0);
  		
  		if(!empty($isDeleted))
  		{
  			return $isDeleted;
  		}
  		else
  		{
  			return false;
  		}
  	}
  	public function getMessageBlock()
      {
         
          ?>
<div class="row">
  <div class="col-md-12">
    <?php $this->printErrorMessage(); ?>
    <?php $this->printSuccessMessage(); ?>
  </div>
</div>
<?php
  }
  function addErrorMessage($message)
  {
  if(isset($_SESSION['error_message']) && $_SESSION['error_message']!="")
  {
  unset($_SESSION['error_message']);
  }
  if($message!="")
  $_SESSION['error_message']=$message;
  }
  function addSuccessMessage($message)
  {
  if(isset($_SESSION['success_message']) && $_SESSION['success_message']!="")
  {
  unset($_SESSION['success_message']);
  }
  if($message!="")
  $_SESSION['success_message']=$message;
  }
  function printErrorMessage()
  {
  if(isset($_SESSION['error_message']) && $_SESSION['error_message']!="")
  {
  ?>
<div class="alert alert-danger alert-dismissable"> <i class="fa fa-ban"></i>
  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
  <b><?php echo $_SESSION['error_message']; ?></b> 
</div>
<?php
  unset($_SESSION['error_message']);
  }
  }
  
  function printSuccessMessage()
  {
  if(isset($_SESSION['success_message']) && $_SESSION['success_message']!="")
  {
  ?>
<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
  <b><?php echo $_SESSION['success_message']; ?></b> 
</div>
<?php
  unset($_SESSION['success_message']);
  }
  }
  
  public function getNextStageMode($current_stage,$user_id)
  {
  $current_status=$this->rp_getValue("user","status","id='".$user_id."'");
  if($current_status>$current_stage)
  {
  $mode="e";
  }
  else
  {
  $mode="a";
  }
  
  return $mode;
  }
  
  function pageBar($hierarchy,$pageToolbar="")
  {
  if(!empty($hierarchy))
  {
  ?>
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
  <ul class="page-breadcrumb">
    <?php for($i=0;$i<sizeof($hierarchy);$i++)
      {				
      ?>
    <li>
      <?php if($i!=sizeof($hierarchy)-1)
        {
        	?>
      <a href="<?php echo $hierarchy[$i]['link'];?>"><?php echo $hierarchy[$i]['title'];?></a>
      <i class="fa fa-circle"></i>
      <?php 
        }
        else
        {
        	?>
      <span><?php echo $hierarchy[$i]['title'];?></span>
      <?php 
        }
        ?>
    </li>
    <?php 
      }
      ?>								
  </ul>
  <div class="page-toolbar">
    <?php echo $pageToolbar;?>
  </div>
</div>
<!-- END PAGE BAR -->
<?php 
  }
  }
  function changeThemeMenu()
  {
  ?>
<!-- BEGIN THEME PANEL -->
<!-- <div class="theme-panel hidden-xs hidden-sm">
  <div class="toggler"> </div>
  <div class="toggler-close"> </div>
  <div class="theme-options">
  	<div class="theme-option theme-colors clearfix">
  		<span> THEME COLOR </span>
  		<ul>
  			<li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
  			<li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>
  			<li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
  			<li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
  			<li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
  			<li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>
  		</ul>
  	</div>
  	<div class="theme-option">
  		<span> Layout </span>
  		<select class="layout-option form-control input-sm">
  			<option value="fluid" selected="selected">Fluid</option>
  			<option value="boxed">Boxed</option>
  		</select>
  	</div>
  	<div class="theme-option">
  		<span> Header </span>
  		<select class="page-header-option form-control input-sm">
  			<option value="fixed" selected="selected">Fixed</option>
  			<option value="default">Default</option>
  		</select>
  	</div>
  	<div class="theme-option">
  		<span> Top Menu Dropdown</span>
  		<select class="page-header-top-dropdown-style-option form-control input-sm">
  			<option value="light" selected="selected">Light</option>
  			<option value="dark">Dark</option>
  		</select>
  	</div>
  	<div class="theme-option">
  		<span> Sidebar Mode</span>
  		<select class="sidebar-option form-control input-sm">
  			<option value="fixed">Fixed</option>
  			<option value="default" selected="selected">Default</option>
  		</select>
  	</div>
  	<div class="theme-option">
  		<span> Sidebar Menu </span>
  		<select class="sidebar-menu-option form-control input-sm">
  			<option value="accordion" selected="selected">Accordion</option>
  			<option value="hover">Hover</option>
  		</select>
  	</div>
  	<div class="theme-option">
  		<span> Sidebar Style </span>
  		<select class="sidebar-style-option form-control input-sm">
  			<option value="default" selected="selected">Default</option>
  			<option value="light">Light</option>
  		</select>
  	</div>
  	<div class="theme-option">
  		<span> Sidebar Position </span>
  		<select class="sidebar-pos-option form-control input-sm">
  			<option value="left" selected="selected">Left</option>
  			<option value="right">Right</option>
  		</select>
  	</div>
  	<div class="theme-option">
  		<span> Footer </span>
  		<select class="page-footer-option form-control input-sm">
  			<option value="fixed">Fixed</option>
  			<option value="default" selected="selected">Default</option>
  		</select>
  	</div>
  </div>
  </div> -->
<!-- END THEME PANEL -->
<?php
  }
  
  public function getContactUs()
  {
    $contact_r=$this->db->rp_getData("contact_us_info","*","isActive=1 AND isDelete=0","id desc LIMIT 1",0);
    if($contact_r)
    $contact_r=mysqli_fetch_assoc($contact_r);
    return $contact_r;
  }
  }
  ?>