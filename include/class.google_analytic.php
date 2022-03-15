<?php
  class GoogleAnalytic extends Functions
  {
  	public $detail=array();
  	public $db,$rights;
  	public $ctable="google_analytic";
  	public $primary_column="id";
  	public $unique_column="name";
  	// Public Varibale
  	public $id='';public $description='';
  	public $valid_keys=array("id","description");
  	function __construct($id="") 
  	{
  		$db = new Functions();
  		$conn = $db->connect();
  		$this->db=$db;
  
  		$this->rights=$_SESSION['rights'];
      	}
  	function validateKey($detail)
  	{
  		$error=array();
  		foreach($detail as $key=>$value)
  		{
  			if(!in_array($key,$this->valid_keys))
  			{
  				$error[]=$key;
  			}
  		}
  		
  		if(empty($error))
  		{
  			$result=array("ack"=>1);
  			return $result;
  		}
  		else
  		{
  			$result=array("ack"=>0,"error"=>$error);
  			return $result;
  		}
  	} 

  	function insert($detail=array(),$where="")
  	{
  		if($this->rights['insert_flag']==1)
  		{ 
				// check required column validation
				if(!empty($detail))
				{
					if($detail['id']!="")
          {
            $inserted_id=$this->db->rp_update($this->ctable,$detail,$where,0);
          }
          else{                
            $extracted_array=$this->extractArray($detail);
            $inserted_id=$this->db->rp_insert($this->ctable,$extracted_array['values'],$extracted_array['columns'],0);
            // $inserted_id=$this->db->rp_insert($this->ctable,$detail,$detail,1);                
          }
					if($inserted_id!=0)
					{					    
						$reply=array("ack"=>1,"developer_msg"=>"Detail updated successfully!!","ack_msg"=>"Contact Us  detail updated successfully!!");
						return $reply;
					}
					else
					{
						$reply=array("ack"=>0,"developer_msg"=>"Contact Us  deatil can't be insert!!","ack_msg"=>"Contact Us  deatil can't be insert!!");
						return $reply;
					} 
				}
				else
				{
					$reply=array("ack"=>0,"error"=>$validateKey['error'],"developer_msg"=>"Invalid Key","ack_msg"=>"Internal Error!! Try later");
					return $reply;
				}  			 
  		}
  		else
  		{
  			$this->db->rp_location("access_denied.php?msg=insert");
  			$reply=array("ack"=>0,"developer_msg"=>"Detail cannot be fetch!","ack_msg"=>"Detail cannot be fetch!");
  			return $reply;
  		}
  	} 
  	
  	function extractArray($array)
  	{
  		$columns=array();
  		$values=array();
  		foreach($array as $key=>$value)
  		{
  			$columns[]=$key;
  			$values[]=$value;
  		}
  		return array("columns"=>$columns,"values"=>$values);
  	}
  	  	  
  }  
  ?>