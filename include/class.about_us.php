<?php
  class About_Us extends Functions
  {
  	public $detail=array();
  	public $db,$rights;
  	public $ctable="about_us";
  	public $primary_column="id";
  	public $unique_column="name";
  	// Public Varibale
  	public $id='';public $short_title='';public $long_title='';public $short_description='';public $big_description='';public $short_image_path='';public $big_image_path='';public $our_vision='';public $our_mission='';
  	public $valid_keys=array("id","short_title","long_title","short_description","big_description","short_image_path","big_image_path","our_vision","our_mission");
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
  	function view($where="",$required_columns=array(),$orderby="",$limit="")
  	{
  
      if($this->rights['view_flag']==1)
  		{             
  			$result=array();
          	$required_columns=$this->getRequiredColumns($required_columns);
  			$where=($where=="")?"1=1":$where;				
  			// Count Total Record Without any limit
  			$total_count=$this->rp_getTotalRecord($this->ctable,$where);
  			// Count Show Record With limit
  			$show_count=$this->rp_getTotalRecord($this->ctable,$where,0,$this->getLimits($limit));
  			// Get Actual Records
  			$result_r=$this->db->rp_getData($this->ctable,$required_columns,$where,$orderby,0,$this->getLimits($limit));
  			if($result_r)
  			{
  				while($d=mysqli_fetch_assoc($result_r))
  				{
  
  					// Do Modification IN $d Here If Required
  					$d['address']= html_entity_decode($d['address']);
  					$d['description']= html_entity_decode($d['description']);
  					$result[]=$d;
  				}
  				
  				$reply=array("ack"=>1,"developer_msg"=>"Contact Us detail fetched successfully!!","ack_msg"=>"Contact Us detail fetched successfully!!","result"=>$result,"total_count"=>$total_count,"show_count"=>$show_count);
  				return $reply;
  			}
  			else
  			{
  
  				$reply=array("ack"=>0,"developer_msg"=>"Contact Us detail can not be fetch!","ack_msg"=>"Contact Us detail can not be fetch!");
  				return $reply;
  			}
  		}
  		else
  		{
  			$this->db->rp_location("access_denied.php?msg=view");
  			$reply=array("ack"=>0,"developer_msg"=>"Contact Us detail cannot be fetch!","ack_msg"=>"Contact Us detail cannot be fetch!");
  			return $reply;
  		}  		
  	}  
  
  	function insert($detail=array(),$where="",$file)
  	{  
      /*print_r($detail);exit;*/
  		if($this->rights['insert_flag']==1)
  		{
  			//$detail=$this->db->cleanArray($detail);
  			$validateKey=$this->validateKey($detail);
  			// print_r($detail);exit;
  			if($validateKey['ack']==1)
  			{
  				// check required column validation
  				if(!empty($detail))
  				{
  					// print_r($file["big_image_path"]);exit;
  					if($file["short_image_path"]["name"]!=""){
  					if (isset($file["short_image_path"]))
  							{								
  								$file_tmp  = $file['short_image_path']['tmp_name'];
  								$allowedExts = array("jpg","jpeg","png","gif","JPG","JPEG");
  								$temp = explode(".", $file["short_image_path"]["name"]);
  								$extension = end($temp);
  
  								if($file["short_image_path"]["error"]>0) {
  									$error .= "Error opening the file. ";
  								}
  								if($file["short_image_path"]["type"]=="application/x-msdownload"){
  									$error .= "Mime type not allowed. ";
  								}
  								if(!in_array($extension, $allowedExts)){
  									$error .= "Extension not allowed. ";
  								}
  							
  								$fileName  = $this->db->clean($file["short_image_path"]["name"]);
  								$fileSize  = round($file["short_image_path"]["size"]); // BYTES
  								//echo $fileSize ;exit;
  								$adate   = date('Y-m-d H:i:m');
  
  								$extension = end(explode(".", $fileName));
  							
  								$fileName = 'short_img_'.substr(sha1(time()), 0, 6).".".$extension;
  								$tempPath="../images/about_short_image/".$fileName;
  								move_uploaded_file($file_tmp,$tempPath);
  								$detail['short_image_path']=$fileName;
  								unset($detail['old_image_path']);
  							}
  						}
  
  							if($file["big_image_path"]["name"]!=""){
  							if (isset($file["big_image_path"]))
  							{								
  								$file_tmp  = $file['big_image_path']['tmp_name'];
  								$allowedExts = array("jpg","jpeg","png","gif","JPG","JPEG");
  								$temp = explode(".", $file["big_image_path"]["name"]);
  								$extension = end($temp);
  
  								if($file["big_image_path"]["error"]>0) {
  									$error .= "Error opening the file. ";
  								}
  								if($file["big_image_path"]["type"]=="application/x-msdownload"){
  									$error .= "Mime type not allowed. ";
  								}
  								if(!in_array($extension, $allowedExts)){
  									$error .= "Extension not allowed. ";
  								}
  							
  								$fileName2  = $this->db->clean($file["big_image_path"]["name"]);
  								$fileSize  = round($file["big_image_path"]["size"]); // BYTES
  								//echo $fileSize ;exit;
  								$adate   = date('Y-m-d H:i:m');
  
  								$extension = end(explode(".", $fileName2));
  							
  								$fileName2 = 'big_img_'.substr(sha1(time()), 0, 3).".".$extension;
  								$tempPath="../images/about_big_image/".$fileName2;
  								move_uploaded_file($file_tmp,$tempPath);
  								$detail['big_image_path']=$fileName2;
  								unset($detail['old_image_path_2']);
  							}
  						}
  					// This is just for my F*ucking Mistake while creating database class :/

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
  						    
  							$reply=array("ack"=>1,"developer_msg"=>"Contact Us detail updated successfully!!","ack_msg"=>"Contact Us  detail updated successfully!!");
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
  				$reply=array("ack"=>0,"error"=>$validateKey['error'],"developer_msg"=>"Invalid Key","ack_msg"=>"Internal Error!! Try later");
  					return $reply;
  			}
  		}
  		else
  		{
  			$this->db->rp_location("access_denied.php?msg=insert");
  			$reply=array("ack"=>0,"developer_msg"=>"Contact Us detail cannot be fetch!","ack_msg"=>"Contact Us detail cannot be fetch!");
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
  	function getRequiredColumns($required_columns=array())
  	{
  		if(!empty($required_columns))
  		{
  			$required_columns_string=implode(",",$required_columns);
  			return $required_columns_string;
  		}
  		else
  		{
  			return "*";
  		}
  	}
  	
  	function countContact($key,$value)
  	{		
  		$countContact = $this->db->rp_getTotalRecord($this->ctable,$key."='".$value."'",0);
  		return $countContact;	
  	}
  	function duplicateContact($key,$value,$primary_key)
  	{		
  		$countContact = $this->db->rp_getTotalRecord($this->ctable,$key."='".$value."' AND ".$this->primary_column."!=".$primary_key,0);
  		return $countContact;	
  	}
  	
  	function getLimits($limit)
  	{
  		if($limit!="" && !empty($limit) && array_key_exists("ul",$limit) && array_key_exists("ll",$limit))
  		{
  		   return $limit['ul'].",".$limit['ll'];
  		}
  		else
  		{
  			return "";
  		}
  	}
      function isValidPassCode($passcode)
      {
          $count=$this->db->rp_getTotalRecord($this->ctable,"bus_id='".$passcode."'");
           if($count>=1)
           {
              return true;
           }
           else
           {
               return false;
           }
      }
      function generatePasscode()
      {
  		$characters='ABCDEFGHIJKLMNOPQRSTUVXYZ0123456789';
  		$randStr="";
  		for($i=0;$i<=5;$i++)
  		{
  			$randStr=$randStr.$characters[rand(0,strlen($characters)-1)];
  		}
  
  
             	return $randStr;
  
  
      }
  
  }
  
  ?>