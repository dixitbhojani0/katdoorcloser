<?php
  class resume extends Functions
  {
  	public $detail=array();
  	public $db,$rights;
  	public $ctable="resume";
  	public $primary_column="id";
  	public $unique_column="name";
  	// Public Varibale
  	public $id='';public $name='';public $email='';public $subject='';public $mobile_no='';public $apply_for='';
    public $resume_path='';public $adate=''; 

  	public $valid_keys=array("id","name","email","subject","mobile_no","apply_for","resume_path","adate");

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
  
  	function view($where="",$required_columns=array(),$orderby="",$limit="",$isSubCategoryRequired=false,$isProductRequired=false)
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
  			$result_r=$this->db->rp_getData($this->ctable,$required_columns,$where,$orderby,0,$this->getLimits($limit),0);
  			if($result_r)
  			{
  				while($d=mysqli_fetch_assoc($result_r))
  				{
  					// Do Modification IN $d Here If Required
  					$category_id=$d['id'];
  					$sub_categories=array();
  					if($isSubCategoryRequired)
  					{
  						$sub_category_r=$this->db->rp_getData("sub_category","*","cid='".$category_id."'","",0);
  						while($sub_category=mysqli_fetch_assoc($sub_category_r))
  						{
  							$sub_categories[]=$sub_category;
  						}
  						$d['sub_category']=$sub_categories;
  					}
  					$d['description']= html_entity_decode($d['description']);
  					$result[]=$d;
  					
  				}
  				
  				$reply=array("ack"=>1,"developer_msg"=>"resume detail fetched successfully!!","ack_msg"=>"resume detail fetched successfully!!","result"=>$result,"total_count"=>$total_count,"show_count"=>$show_count);
  				return $reply;
  			}
  			else
  			{
  
  				$reply=array("ack"=>0,"developer_msg"=>"resume detail can not be fetch!","ack_msg"=>"resume detail can not be fetch!");
  				return $reply;
  			}
  		}
  		else
  		{
  			$this->db->rp_location("access_denied.php?msg=view");
  			$reply=array("ack"=>0,"developer_msg"=>"resume detail cannot be fetch!","ack_msg"=>"resume detail cannot be fetch!");
  			return $reply;
  		}
  		
  	}
  
  	
  	function view_front($where="",$required_columns=array(),$orderby="",$limit="")
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
  			$result_r=$this->db->rp_getData($this->ctable,$required_columns,$where,$orderby,0,$this->getLimits($limit),0);
  			if($result_r)
  			{
  				while($d=mysqli_fetch_assoc($result_r))
  				{
  					// Do Modification IN $d Here If Required
  					$d['description']= html_entity_decode($d['description']);
  					$result[]=$d;
  					
  				}
  				return $result;
  			}
  			else
  			{
  
  				$reply=array("ack"=>0,"developer_msg"=>"resume detail can not be fetch!","ack_msg"=>"resume detail can not be fetch!");
  				return $reply;
  			}
  		}
  		else
  		{
  			$this->db->rp_location("access_denied.php?msg=view");
  			$reply=array("ack"=>0,"developer_msg"=>"resume detail cannot be fetch!","ack_msg"=>"resume detail cannot be fetch!");
  			return $reply;
  		}
  		
  	}
  
  	function getSubCategory($category_id)
  	{
  		$sub_categories=array();
  		$sub_category_r=$this->db->rp_getData("sub_category","*","cid='".$category_id."'","",0);
  		
  		while($sub_category=mysqli_fetch_assoc($sub_category_r))
  		{
  			$sub_categories[]=$sub_category;
  		}
  		return $sub_categories;
  	}
  	
  	function getProduct($category_id,$sub_category_id="")
  	{
  		if($sub_category_id=="")
  		{
  			$where="cid='".$category_id."'";
  		}
  		else
  		{
  			$where="cid='".$category_id."' AND sid='".$sub_category_id."'";
  		}
  		$products=array();
  		$product_r=$this->db->rp_getData("product","*",$where,"",0);
  		while($product=mysqli_fetch_assoc($product_r))
  		{
  			$products[]=$product;
  		}
  		return $products;
  	}
  	
  	function insert($detail=array(),$dup_check_array=array(),$file)
  	{
  		// echo '1';exit;
  		if($this->rights['insert_flag']==1)
  		{
  			//$detail=$this->db->cleanArray($detail);
  			$validateKey=$this->validateKey($detail);
  			// print_r($validateKey);
  			// exit;
  			if($validateKey['ack']==1)
  			{
  				// check required column validation
  				if(!empty($detail))
  				{
  					// count record from duplicate column if required else skip checking
  					if(!empty($dup_check_array))
  					$count=$this->countCategory($dup_check_array['key'],$dup_check_array['value']);
  					else
  					$count=0;	
  					
  					if($count<=0)
  					{
  						// echo '2';exit;
  						if (isset($file["resume_path"]) && $file["resume_path"]['size']!=0) 
              {
                $allowedExts = array("pdf");
                 $temp = explode(".", $file["resume_path"]["name"]);
                 
                $extension = end($temp);
                //$error="";
                if($file["resume_path"]["error"]>0) {
                  $error .= "Error opening the file. ";
                }
                if($file["resume_path"]["type"]=="resume/x-msdownload"){
                  $error .= "Mime type not allowed. ";
                }
                if(!in_array($extension, $allowedExts)){
                  $error .= "Extension not allowed. ";
                }
                else
                {
            
                  $fileName  = $db->clean($file["resume_path"]["name"]);
                  $fileSize  = round($file["resume_path"]["size"]); // BYTES
                  //echo $fileSize ;exit;
                  $adate   = date('Y-m-d H:i:m');
                  if(empty($error)){
                  $extension = end(explode(".", $fileName));
                  }
                  
                  $fileName  = 'resume'.substr(sha1(time()), 0, 6).".".$extension;
                  $tempPath="resume/".$fileName;

                  $res=move_uploaded_file($file["resume_path"]['tmp_name'],$tempPath);
                  $resume_path=$fileName;
                  //echo "abcd";
                }     
              }
              else
              {
                //$fileName=$detail['old_resume_path'];
                $detail['resume_path']=$detail['resume_path'];
                //echo "hello";
                    
              }
  							// echo '3';exit;
  							// This is just for my F*ucking Mistake while creating database class :/
  						$extracted_array=$this->extractArray($detail);
  						
  						$inserted_id=$this->db->rp_insert($this->ctable,$extracted_array['values'],$extracted_array['columns'],0);
  							
  						if($inserted_id!=0)
  						{
  						    
  							$reply=array("ack"=>1,"inserted_id"=>$inserted_id,"developer_msg"=>"resume Detail inserted successfully!!","ack_msg"=>"resume Detail inserted successfully!!");
  							return $reply;
  						}
  						else
  						{
  							$reply=array("ack"=>0,"developer_msg"=>"resume Detail can't be inserted!!","ack_msg"=>"resume Detail can't be inserted!!");
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
  			$reply=array("ack"=>0,"developer_msg"=>"resume Detail cannot be fetch!","ack_msg"=>"resume Detail cannot be fetch!");
  			return $reply;
  		}
  	}
  	
  	function update($detail=array(),$unique_key,$primary_key,$file)
  	{
  		if($this->rights['update_flag']==1)
  		{
  			// id,bus_no,latitude,longitude
  			$detail=$this->db->cleanArray($detail);
  			$validateKey=$this->validateKey($detail);
  			// print_r($validateKey);
  			// exit;	
  			if($validateKey['ack']==1)
  			{
  				// check required column validation
  				if(!empty($detail)&& $primary_key!="")
  				{
  					// count record from $primary_key
  					$count=$this->countCategory($this->primary_column,$primary_key);
  					if($count>=1)
  					{
  						// $count=$this->duplicateProduct($this->unique_column,$unique_key,$primary_key);
  						
  						/*if (isset($file["resume_path"]))
  						{*/	
  						//print_r($detail);
              //print_r($file);
							if (isset($file["resume_path"]) && $file["resume_path"]['size']!=0) 
							{
								$allowedExts = array("pdf");
								$temp = explode(".", $file["resume_path"]["name"]);
								 
								$extension = end($temp);
								//$error="";
								if($file["resume_path"]["error"]>0) {
									$error .= "Error opening the file. ";
								}
								if($file["resume_path"]["type"]=="resume/x-msdownload"){
									$error .= "Mime type not allowed. ";
								}
								if(!in_array($extension, $allowedExts))
                {
									$error .= "Extension not allowed. ";
								}
                
						
  							$fileName  = $db->clean($file["resume_path"]["name"]);
  							$fileSize  = round($file["resume_path"]["size"]); // BYTES
  							//echo $fileSize ;exit;
  							$adate   = date('Y-m-d H:i:m');
                if(empty($error)){
                $extension = end(explode(".", $fileName));
                }
  							
  							$fileName	 = 'resume'.substr(sha1(time()), 0, 6).".".$extension;
  							$tempPath="resume/".$fileName;

                $res=move_uploaded_file($file["resume_path"]['tmp_name'],$tempPath);
                $resume_path=$fileName;
                //echo "abcd";
                			
						  }
  						else
  						{
								//$fileName=$detail['old_resume_path'];
								$detail['resume_path']=$detail['resume_path'];
                //echo "hello";
  									
  						}
  						$where=$this->primary_column."=".$primary_key;
  						$isUpdated=$this->db->rp_update($this->ctable,$detail,$where,0);
					
    					if($isUpdated)
    					{
    						$reply=array("ack"=>1,"developer_msg"=>"resume Detail updated successfully!!","ack_msg"=>"resume Detail updated successfully!!");
    						return $reply;
    					}
    					else
    					{
    						$reply=array("ack"=>0,"developer_msg"=>"resume Detail cannot be updated!!","ack_msg"=>"resume Detail cannot be updated!!");
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
  			$reply=array("ack"=>0,"developer_msg"=>"resume Detail cannot be fetch!","ack_msg"=>"resume Detail cannot be fetch!");
  			return $reply;
  		}
  		
  	}
  	
  	function delete($delete_array)
  	{
  		if($this->rights['delete_flag']==1)
  		{
  			$count=$this->countCategory($delete_array['key'],$delete_array['value']);
              if($count>=1)
              {
  				// $this->db->rp_delete($this->ctable,$delete_array['key']."=".$delete_array['value'],0);
  				// $this->db->rp_delete("sub_category","cid=".$delete_array['value']."",0);
  				// $this->db->rp_delete("product","sid=".$delete_array['value']."",0);
  				$values=array("isDelete"=>1);
              	$this->db->rp_update($this->ctable,$values,"id=".$delete_array['value']."",0);
              	$this->db->rp_update("sub_category",$values,"cid=".$delete_array['value']."",0);
              	$this->db->rp_update("product",$values,"cid=".$delete_array['value']."",0);
              	$this->db->rp_update("resume",$values,"cid=".$delete_array['value']."",0);
              	
  				$reply=array("ack"=>1,"developer_msg"=>"resume deleted successfully!!","ack_msg"=>"resume deleted successfully!!");
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
  			$reply=array("ack"=>0,"developer_msg"=>"resume cannot be fetch!","ack_msg"=>"resume cannot be fetch!");
  			return $reply;
  		}		
  	}
  	
  	function active($active_array)
  	{
  		if($this->rights['update_flag']==1)
  		{
  
  				$count=$this->countCategory($active_array['key'],$active_array['value']);
  				if($count>=1)
  				{
  					$this->db->rp_update($this->ctable,array("isActive"=>$active_array['status']),$active_array['key']."=".$active_array['value'],0);
  					$this->db->rp_update("sub_category",array("isActive"=>$active_array['status']),"cid=".$active_array['value']."",0);
  					$this->db->rp_update("product",array("isActive"=>$active_array['status']),"cid=".$active_array['value']."",0);
  					$this->db->rp_update("resume",array("isActive"=>$active_array['status']),"cid=".$active_array['value']."",0);
  					
  					$reply=array("ack"=>1,"developer_msg"=>"resume status updated successfully!!","ack_msg"=>"resume status updated successfully!!");
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
  			$reply=array("ack"=>0,"developer_msg"=>"Category detail cannot be fetch!","ack_msg"=>"Category detail cannot be fetch!");
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
  	
  	function countCategory($key,$value)
  	{		
  		$countCategory = $this->db->rp_getTotalRecord($this->ctable,$key."='".$value."'",0);
  		return $countCategory;	
  	}
  	function duplicateCategory($key,$value,$primary_key)
  	{		
  		$countCategory = $this->db->rp_getTotalRecord($this->ctable,$key."='".$value."' AND ".$this->primary_column."!=".$primary_key,0);
  		return $countCategory;	
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
      
  
  }
  
  ?>