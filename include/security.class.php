<?php
  require_once("main.class.php");
  require_once("function.class.php");
  require_once("class.log.php");
  class Security extends Functions
  {
  	public $db;
  	public $log;
  	public $ctable="security";
  	public $ctableMessurement="messurement";
  	function __construct($id="") 
  	{
  		$db = new Functions();
  		$conn =$db->connect();
  		$this->db=$db;	
  		$log	= new Log();		
  		$this->log=$log;		
      } 
  	
  	public function Delete($detail)
  	{
  		$category_name=$this->db->rp_getValue($this->ctable,"fg_item_name","isDelete=0 AND id='".$detail['id']."'");
  		$rows 	= array(
  		"isDelete"	=> "1",
  		"modified_date" =>date("Y-m-d H:i:s")
  		);
  			$where	= "id='".$detail['id']."'";
  			$isUpdated=$this->db->rp_delete($this->ctable,$where,0);
  			
  			//Delete data from map unit
  			$this->db->rp_delete("item_map_unit","item_id='".$detail['id']."' AND item_category_id='finish_good'",0);
  
  			// $this->log->insertLog($this->ctable,$detail['id'],"delete",$this->log->slm['ITEM_FG_DELETE']." : ".$category_name);
  			
  			if($isUpdated)
  			{
  				$reply=array("ack"=>1,"developer_msg"=>"IP Security Delete Successfully!!!","ack_msg"=>"IP Security Delete Successfully!!!");
  				return $reply;
  			}
  			else
  			{
  				$reply=array("ack"=>0,"developer_msg"=>"Database error!!","ack_msg"=>"Failed! IP Security Record Could Not Be Deleted.");
  				return $reply;
  			}
  	}
  	
  }
  
  ?>