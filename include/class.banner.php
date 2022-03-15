<?php
  class Banner extends Functions
  {
  	public $detail=array();
  	public $db,$rights;
  	public $ctable="banner";
  	public $primary_column="id";
  	public $unique_column="title";
  	// Public Varibale
  	public $id='';public $title='';public $url='';public $promo_type='';public $target='';public $description='';public $image_path=''; 
  	public $valid_keys=array("id","title","url","target","promo_type","description","image_path","old_image_path");
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
  			$total_count=$this->db->rp_getTotalRecord($this->ctable,$where);
  			// Count Show Record With limit
  			$show_count=$this->db->rp_getTotalRecord($this->ctable,$where,0,$this->getLimits($limit));
  			// Get Actual Records
  			$result_r=$this->db->rp_getData($this->ctable,$required_columns,$where,$orderby,0,$this->getLimits($limit),0);
  			if($result_r)
  			{
  				while($d=mysqli_fetch_assoc($result_r))
  				{
  
  					// Do Modification IN $d Here If Required
  					$result[]=$d;
  				}
  				
  				$reply=array("ack"=>1,"developer_msg"=>"Banner detail fetched successfully!!","ack_msg"=>"Banner detail fetched successfully!!","result"=>$result,"total_count"=>$total_count,"show_count"=>$show_count);
  				return $reply;
  			}
  			else
  			{
  
  				$reply=array("ack"=>0,"developer_msg"=>"Banner detail can not be fetch!","ack_msg"=>"Banner detail can not be fetch!");
  				return $reply;
  			}
  		}
  		else
  		{
  			$this->db->rp_location("access_denied.php?msg=view");
  			$reply=array("ack"=>0,"developer_msg"=>"Banner detail cannot be fetch!","ack_msg"=>"Banner detail cannot be fetch!");
  			return $reply;
  		}
  		
  	}
  
  	function insert($detail=array(),$dup_check_array=array(),$file)
  	{
  		if($this->rights['insert_flag']==1)
  		{
  			$validateKey=$this->validateKey($detail);
  			
  			if($validateKey['ack']==1)
  			{
  						
  				// check required column validation
  				if(!empty($detail))
  				{
  					// count record from duplicate column if required else skip checking
  					if(!empty($dup_check_array))
  					$count=$this->countBanner($dup_check_array['key'],$dup_check_array['value']);
  					else
  					$count=0;	
  					
  					if($count<=0)
  					{
  						if (isset($file["image_path"])) 
  						{
  							//print_r($detail);exit;
  						$allowedExts = array("jpg","jpeg","png","gif","JPG","JPEG");
  						$temp = explode(".", $file["image_path"]["name"]);
  						$extension = end($temp);
  
  						if($file["image_path"]["error"]>0) {
  							$error .= "Error opening the file. ";
  						}
  						if($file["image_path"]["type"]=="application/x-msdownload"){
  							$error .= "Mime type not allowed. ";
  						}
  						if(!in_array($extension, $allowedExts)){
  							$error .= "Extension not allowed. ";
  						}
  						
  							$fileName  = $this->db->clean($file["image_path"]["name"]);
  							$fileSize  = round($file["image_path"]["size"]); // BYTES
  							$adate   = date('Y-m-d H:i:m');
  
  							$extension = end(explode(".", $fileName));
  						
  							$fileName = 'img'.substr(sha1(time()), 0, 6).".".$extension;
  							$tempPath="../images/banner/".$file['image_path']['name'];
  							move_uploaded_file($file["image_path"]['tmp_name'],$tempPath);
  							$detail['image_path']=$file['image_path']['name'];
  							unset($detail['old_image_path']);
  											
                $extracted_array=$this->extractArray($detail);
                $inserted_id=$this->db->rp_insert($this->ctable,$extracted_array['values'],$extracted_array['columns'],0);
  							
  						if($inserted_id!=0)
  						{
  						    
  							$reply=array("ack"=>1,"inserted_id"=>$inserted_id,"developer_msg"=>"Banner inserted successfully!!","ack_msg"=>"Banner inserted successfully!!");
  							return $reply;
  						}
  						else
  						{
  							$reply=array("ack"=>0,"developer_msg"=>"Banner  can't be inserted!!","ack_msg"=>"Banner can't be inserted!!");
  							return $reply;
  						}
  						}
  					else
  					{
  						$reply=array("ack"=>0,"developer_msg"=>"Image Record Found!!","ack_msg"=>"Internal Error!!");
  						return $reply;
  					}
  					}
  					else
  					{
  						
  						$reply=array("ack"=>0,"developer_msg"=>"Duplicate Record Found!!","ack_msg"=>"Duplicate Record Found!!");
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
  			$reply=array("ack"=>0,"developer_msg"=>"Banner detail cannot be fetch!","ack_msg"=>"Banner detail cannot be fetch!");
  			return $reply;
  		}
  	}
  	function update($detail=array(),$unique_key,$primary_key,$file)
  	{
  		if($this->rights['update_flag']==1)
  		{
  			// id,bus_no,latitude,longitude
  			
  			// $detail=$this->db->cleanArray($detail);
  			$validateKey=$this->validateKey($detail);	
  			if($validateKey['ack']==1)
  			{
  				// check required column validation
  				if(!empty($detail)&& $primary_key!="")
  				{
  					// count record from $primary_key
  					$count=$this->countBanner($this->primary_column,$primary_key);
  					if($count>=1)
  					{
  						if (isset($file["image_path"]) && $file["image_path"]['size']!=0) 
  							{
  								
  								$allowedExts = array("jpg","jpeg","png","gif","JPG","JPEG");
  								 $temp = explode(".", $file["image_path"]["name"]);
  								 
  								$extension = end($temp);
  								$error="";
  								if($file["image_path"]["error"]>0) {
  									$error .= "Error opening the file. ";
  								}
  								if($file["image_path"]["type"]=="application/x-msdownload"){
  									$error .= "Mime type not allowed. ";
  								}
  								if(!in_array($extension, $allowedExts)){
  									$error .= "Extension not allowed. ";
  								}
  						
  								$fileName  = $this->db->clean($file["image_path"]["name"]);
  								$fileSize  = round($file["image_path"]["size"]); // BYTES
  								//echo $fileSize ;exit;
  								$adate   = date('Y-m-d H:i:m');
  
  								$extension = end(explode(".", $fileName));
  							
  								$fileName	 = 'img'.substr(sha1(time()), 0, 6).".".$extension;
  								$tempPath="../images/banner/".$file['image_path']['name'];
  								move_uploaded_file($file["image_path"]['tmp_name'],$tempPath);
  								$detail['image_path']=$file['image_path']['name'];
  								
  								unset($detail['old_image_path']);
  								$where=$this->primary_column."=".$primary_key;
  								$isUpdated=$this->db->rp_update($this->ctable,$detail,$where,0);
  								
  							}
  							else
  							{
  								
  								
  								//$fileName=$detail['old_image_path'];
  								$detail['image_path']=$detail['old_image_path'];
  								unset($detail['old_image_path']);
  								$where=$this->primary_column."=".$primary_key;
  								$isUpdated=$this->db->rp_update($this->ctable,$detail,$where,0);
  						
  							}
  						
  						
  						if($isUpdated)
  						{
  							$reply=array("ack"=>1,"developer_msg"=>"Banner detail updated successfully!!","ack_msg"=>"Banner detail updated successfully!!");
  							return $reply;
  						}
  						else
  						{
  							$reply=array("ack"=>0,"developer_msg"=>"Banner detail cannot be updated!!","ack_msg"=>"Banner detail cannot be updated!!");
  							return $reply;
  						}
  						
  					}
  					else
  					{
  						$reply=array("ack"=>0,"developer_msg"=>"No Record Found To Update","ack_msg"=>"Record Not Found!!");
  						return $reply;
  					}
  
  				} 
  				else
  				{
  					$reply=array("ack"=>0,"developer_msg"=>"Invalid Key","ack_msg"=>"Internal Error!! Try later");
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
  			$reply=array("ack"=>0,"developer_msg"=>"Banner detail cannot be fetch!","ack_msg"=>"Banner detail cannot be fetch!");
  			return $reply;
  		}
  		
  	}
  	
  	
  	function delete($delete_array)
  	{
  		if($this->rights['delete_flag']==1)
  		{
  			$count=$this->countBanner($delete_array['key'],$delete_array['value']);
              if($count>=1)
              {
                $values=array("isDelete"=>1);
                $this->db->rp_update($this->ctable,$values,"id='".$delete_array['value']."'",0);
  				      // $this->db->rp_delete($this->ctable,$delete_array['key']."=".$delete_array['value'],0);
              	$reply=array("ack"=>1,"developer_msg"=>"Banner deleted successfully!!","ack_msg"=>"Banner deleted successfully!!");
              	return $reply;
              }
              else
              {
              	$reply=array("ack"=>0,"developer_msg"=>"No record found!!","ack_msg"=>"No record found!!");
              	return $reply;
              }
  		}
  		else
  		{
  			$this->db->rp_location("access_denied.php?msg=insert");
  			$reply=array("ack"=>0,"developer_msg"=>"Banner cannot be fetch!","ack_msg"=>"Banner cannot be fetch!");
  			return $reply;
  		}		
  	}
  	
  	
  	function unsubscribe_Banner($delete_array)
  	{
  		if($this->rights['delete_flag']==1)
  		{
  			$count=$this->countBanner($delete_array['key'],$delete_array['value']);
              if($count>=1)
              {
  				$email=$this->db->rp_getValue($this->ctable,"email",$delete_array['key']."='".$delete_array['value']."'",0);
  				$name=$this->db->rp_getValue($this->ctable,"name",$delete_array['key']."='".$delete_array['value']."'",0);
  				
  				
  				$this->db->rp_delete($this->ctable,$delete_array['key']."='".$delete_array['value']."'",0);
              	$reply=array("ack"=>1,"developer_msg"=>"Banner deleted successfully!!","ack_msg"=>"Banner deleted successfully!!","email"=>$email,"name"=>$name);
              	return $reply;
              }
              else
              {
              	$reply=array("ack"=>0,"developer_msg"=>"No record found!!","ack_msg"=>"No record found!!");
              	return $reply;
              }
  		}
  		else
  		{
  			$this->db->rp_location("access_denied.php?msg=insert");
  			$reply=array("ack"=>0,"developer_msg"=>"Banner cannot be fetch!","ack_msg"=>"Banner cannot be fetch!");
  			return $reply;
  		}		
  	}
      function active($active_array)
  	{
  		if($this->rights['update_flag']==1)
  		{
  
  				$count=$this->countBanner($active_array['key'],$active_array['value']);
  				if($count>=1)
  				{
  					$this->db->rp_update($this->ctable,array("isActive"=>$active_array['status']),$active_array['key']."=".$active_array['value'],0);
  					$reply=array("ack"=>1,"developer_msg"=>"Banner status updated successfully!!","ack_msg"=>"Banner status updated successfully!!");
  					return $reply;
  				}
  				else
  				{
  					$reply=array("ack"=>0,"developer_msg"=>"No record found!!","ack_msg"=>"No record found!!");
  					return $reply;
  				}
  
  		}
  		else
  		{
  			$this->db->rp_location("access_denied.php?msg=insert");
  			$reply=array("ack"=>0,"developer_msg"=>"Banner detail cannot be fetch!","ack_msg"=>"Banner detail cannot be fetch!");
  			return $reply;
  		}
  	}
  	
  	function generateActivationCode()
  	{
  		$characters='ABCDEFGHIJKLMNOPQRSTUVXYZabcdefghijklmnopqrstuvwxyz0123456789';
  		$randStr="";
  		for($i=0;$i<=15;$i++)
  		{
  			$randStr=$randStr.$characters[rand(0,strlen($characters)-1)];
  		}
  		return $randStr;
  	}
  	
  	function aj_sendSMS($number,$sms)
  	{
  		require_once('notification.class.php');
  	    $nt = new Notification();
  		$msgId="NO";
  		if($number!="")
  		{
  		   $msgId=$nt->aj_sendSMSSecurity($number,$sms);
  			if($msgId!=0)
  			{
  				return $deliveryStatus=array("ack"=>1,"ack_msg"=>"SMS sent to ".$number." successfully");	
  			}
  			else
  			$deliveryStatus=array("ack"=>0,"ack_msg"=>"SMS sending failed on".$number,"reason"=>"Invalid mobile number or mobile switched off or out of coverage area!!");	
  			return $deliveryStatus;			
  		}		
  		return array('ack'=>0,'ack_msg'=>"Internal Error!","developer_msg"=>"Empty Mobile Number");
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
  	
  	function countBanner($key,$value)
  	{		
  		$countBanner = $this->db->rp_getTotalRecord($this->ctable,$key."='".$value."'",0);
  		return $countBanner;	
  	}
  	function duplicateBanner($key,$value,$primary_key)
  	{		
  		$countBus = $this->db->rp_getTotalRecord($this->ctable,$key."='".$value."' AND ".$this->primary_column."!=".$primary_key,0);
  		return $countBus;	
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