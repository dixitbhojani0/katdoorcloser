<?php
  class Product extends Functions
  {
  	public $detail=array();
  	public $db,$rights;
  	public $ctable="product";
  	public $primary_column="id";
  	public $unique_column="name";
  	// Public Varibale
  	public $id='';public $name='';public $brochure='';  public $cid='';public $sid='';public $slug='';public $packing='';public $description=''; public $advantage=''; public $image_path='';public $adate='';  public $product_code='';
  	public $valid_keys=array("id","cid","sid","name","product_code","slug","packing","description","advantage","meta_descr","brochure","add_info","video_url","image_path","old_image_path","adate");
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
  	function getProduct($category_id="",$sub_category_id="")
  	{
  		if($sub_category_id=="")
  		{
  			$where="cid='".$category_id."'";
  		}
  		else
  		{
  			$where="sid='".$sub_category_id."'";
  		}
  		$products=array();
  		$product_r=$this->db->rp_getData("product","*",$where,"",0);
  		while($product=mysqli_fetch_assoc($product_r))
  		{
  			$products[]=$product;
  		}
  		return $products;
  	}
  	function getAllProduct()
  	{
  		$products_all=array();
  		$product_r=$this->db->rp_getData("product","*","isDelete=0");
  		while($product_all=mysqli_fetch_assoc($product_r))
  		{
  			$products_all[]=$product_all;
  		}
  		return $products_all;
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
  					$d['description']= html_entity_decode($d['description']);
  					//exit;
  					$result[]=$d;
  				}
  				
  				$reply=array("ack"=>1,"developer_msg"=>"Product detail fetched successfully!!","ack_msg"=>"Product detail fetched successfully!!","result"=>$result,"total_count"=>$total_count,"show_count"=>$show_count);
  				return $reply;
  			}
  			else
  			{
  
  				$reply=array("ack"=>0,"developer_msg"=>"Product detail can not be fetch!","ack_msg"=>"Product detail can not be fetch!");
  				return $reply;
  			}
  		}
  		else
  		{
  			$this->db->rp_location("access_denied.php?msg=view");
  			$reply=array("ack"=>0,"developer_msg"=>"Product detail cannot be fetch!","ack_msg"=>"Product detail cannot be fetch!");
  			return $reply;
  		}
  		
  	}
  
  	function getProductDetail($pid)
  	{
  		$products=array();
  		$product_r=$this->db->rp_getData("product","*","id='".$pid."'","",0);
  		
  		while($product=mysqli_fetch_assoc($product_r))
  		{
  			$products[]=$product;
  		}
  		return $products;
  	}
  	
  	function getAltImage($pid)
  	{
  		$alt_images=array();
  		$product_alt=$this->db->rp_getData("alt_img","*","pid='".$pid."'","",0);
  		
  		while($alter_image=mysqli_fetch_assoc($product_alt))
  		{
  			$alt_images[]=$alter_image;
  		}
  		return $alt_images;
  	}
  	
  	function insert($detail=array(),$dup_check_array=array(),$file)
  	{
  		
  		if($this->rights['insert_flag']==1)
  		{
  			//$detail=$this->db->cleanArray($detail);
  			 $validateKey=$this->validateKey($detail);
  			/*print_r($validateKey);
  			exit;*/
  			if($validateKey['ack']==1)
  			{
  				// check required column validation
  				if(!empty($detail))
  				{
  					// count record from duplicate column if required else skip checking
  					if(!empty($dup_check_array))
  					$count=$this->countProduct($dup_check_array['key'],$dup_check_array['value']);
  					else
  					$count=0;	
  					
  					if($count<=0)
  					{
  						if (isset($file["image_path"])) 
  						{
  							$file_tmp  = $file['image_path']['tmp_name'];
  							//$allowedExts = array("jpg","jpeg","png","gif","JPG","JPEG");
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
  							//echo $fileSize ;exit;
  							$adate   = date('Y-m-d H:i:m');
  
  							$extension = end(explode(".", $fileName));
  						
  							$fileName = 'product_img_'.substr(sha1(time()), 0, 6).".".$extension;
  							$tempPath="../images/product/".$fileName;
  							move_uploaded_file($file_tmp,$tempPath);
  							$detail['image_path']=$fileName;
  							unset($detail['old_image_path']);
  						}
              if (isset($file["brochure"])) 
              {
                $file_tmp  = $file['brochure']['tmp_name'];
                $allowedExts = array("pdf");
                $temp = explode(".", $file["brochure"]["name"]);
                $extension = end($temp);
  
                if($file["brochure"]["error"]>0) {
                  $error .= "Error opening the file. ";
                }
                if($file["brochure"]["type"]=="application/x-msdownload"){
                  $error .= "Mime type not allowed. ";
                }
                if(!in_array($extension, $allowedExts)){
                  $error .= "Extension not allowed. ";
                }
              
                $fileName  = $this->db->clean($file["brochure"]["name"]);
                $fileSize  = round($file["brochure"]["size"]); // BYTES
                //echo $fileSize ;exit;
                $adate   = date('Y-m-d H:i:m');
  
                $extension = end(explode(".", $fileName));
              
                $fileName = 'product_pdf_'.substr(sha1(time()), 0, 6).".".$extension;
                $tempPath="../images/broucher/".$fileName;
                move_uploaded_file($file_tmp,$tempPath);
                $detail['brochure']=$fileName;
                unset($detail['old_brochure']);
              }
  
  						
  							// This is just for my F*ucking Mistake while creating database class :/
  							 $extracted_array=$this->extractArray($detail);
  							 $inserted_id=$this->db->rp_insert($this->ctable,$extracted_array['values'],$extracted_array['columns'],0);
  							
  						if($inserted_id!=0)
  						{
  						    
  							$reply=array("ack"=>1,"inserted_id"=>$inserted_id,"developer_msg"=>"Product Detail inserted successfully!!","ack_msg"=>"Product Detail inserted successfully!!");
  							return $reply;
  						}
  						else
  						{
  							$reply=array("ack"=>0,"developer_msg"=>"Product Detail can't be inserted!!","ack_msg"=>"Product Detail can't be inserted!!");
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
  			$reply=array("ack"=>0,"developer_msg"=>"Product Detail cannot be fetch!","ack_msg"=>"Product Detail cannot be fetch!");
  			return $reply;
  		}
  	}
  	
  	function update($detail=array(),$unique_key,$primary_key,$file)
  	{
  		if($this->rights['update_flag']==1)
  		{
  			// id,bus_no,latitude,longitude
  			
  			//$detail=$this->db->cleanArray($detail);
  			$validateKey=$this->validateKey($detail);
  			/*print_r($validateKey);
  			exit;*/
  			if($validateKey['ack']==1)
  			{
  				// check required column validation
  				if(!empty($detail)&& $primary_key!="")
  				{
  					// count record from $primary_key
  					$count=$this->countProduct($this->primary_column,$primary_key);
  					if($count>=1)
  					{
  						$count=$this->duplicateProduct($this->unique_column,$unique_key,$primary_key);
  						if($count<=0)
  						{
  							if (isset($file["image_path"]) && isset($file["brochure"]))
  							{	
  						
  							if (isset($file["image_path"]) && $file["image_path"]['size']!=0) 
  							{
  									$file_tmp  = $file['image_path']['tmp_name'];
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
  									$fileName	 = 'product_img_'.substr(sha1(time()), 0, 6).".".$extension;
  									$tempPath="../images/product/".$fileName;
  									move_uploaded_file($file_tmp,$tempPath);
  									$detail['image_path']=$fileName;
  									unset($detail['old_image_path']);
  								}
  								else
  								{
  									//$fileName=$detail['old_image_path'];
  									$detail['image_path']=$detail['old_image_path'];
  									unset($detail['old_image_path']);
  								}
                  // $broucher = $db->rp_getValue("product","broucher","isDelete=0 AND id='".$detail['id']."'",0);

                  if (isset($file["brochure"]) && $file["brochure"]['size']!=0) 
                  {
                    $file_tmp  = $file['brochure']['tmp_name'];
                    $allowedExts = array("pdf");
                    $temp = explode(".", $file["brochure"]["name"]);
                    $extension = end($temp);
      
                    if($file["brochure"]["error"]>0) {
                      $error .= "Error opening the file. ";
                    }
                    if($file["brochure"]["type"]=="application/x-msdownload"){
                      $error .= "Mime type not allowed. ";
                    }
                    if(!in_array($extension, $allowedExts)){
                      $error .= "Extension not allowed. ";
                    }
                  
                    $fileName  = $this->db->clean($file["brochure"]["name"]);
                    $fileSize  = round($file["brochure"]["size"]); // BYTES
                    //echo $fileSize ;exit;
                    $adate   = date('Y-m-d H:i:m');
      
                    $extension = end(explode(".", $fileName));
                  
                    $fileName = 'product_pdf_'.substr(sha1(time()), 0, 6).".".$extension;
                    $tempPath="../images/broucher/".$fileName;
                    move_uploaded_file($file_tmp,$tempPath);
                    $detail['brochure']=$fileName;
                    unset($detail['old_brochure']);
                  }
                  else
                  {
                    //$fileName=$detail['old_image_path'];
                    $detail['brochure']=$detail['old_brochure'];
                    unset($detail['old_brochure']);

                    
                  }
  
  							  $where=$this->primary_column."=".$primary_key;
  								$isUpdated=$this->db->rp_update($this->ctable,$detail,$where,0);
  							}
                
  							if($isUpdated)
  							{
      						    $reply=array("ack"=>1,"developer_msg"=>"Product Detail updated successfully!!","ack_msg"=>"Product Detail updated successfully!!");
  								return $reply;
  							}
  							else
  							{
  								$reply=array("ack"=>0,"developer_msg"=>"Product Detail cannot be updated!!","ack_msg"=>"Product Detail cannot be updated!!");
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
  			$reply=array("ack"=>0,"developer_msg"=>"Product Detail cannot be fetch!","ack_msg"=>"Product Detail cannot be fetch!");
  			return $reply;
  		}
  		
  	}
  	
  	function delete($delete_array)
  	{
  		if($this->rights['delete_flag']==1)
  		{
  			$count=$this->countProduct($delete_array['key'],$delete_array['value']);
              if($count>=1)
              {
  				$values=array("isDelete"=>1);
  				$this->db->rp_update($this->ctable,$values,"id='".$delete_array['value']."'",0);
              	$reply=array("ack"=>1,"developer_msg"=>"Product deleted successfully!!","ack_msg"=>"Product deleted successfully!!");
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
  			$reply=array("ack"=>0,"developer_msg"=>"Product cannot be fetch!","ack_msg"=>"Product cannot be fetch!");
  			return $reply;
  		}		
  	}
  	
  	
  	function active($active_array)
  	{ 
  		if($this->rights['update_flag']==1)
  		{  
  			$cat_id=$this->db->rp_getValue($this->ctable,"cid","id=".$active_array['value']."",0);
  			$sub_id=$this->db->rp_getValue($this->ctable,"sid","id=".$active_array['value']."",0);	
  	
  			$cat_isActive=$this->db->rp_getValue("category","isActive","id=".$cat_id."",0);  				
        $subcat_isActive=$this->db->rp_getValue("sub_category","isActive","id=".$sub_id."",0);  
   
				if($cat_isActive==1)			
				{ 
          if($subcat_isActive==1)
          {
  					$count=$this->countProduct($active_array['key'],$active_array['value']);
  					if($count>=1)
  					{
  						$this->db->rp_update($this->ctable,array("isActive"=>$active_array['status']),$active_array['key']."=".$active_array['value'],0);
  						$reply=array("ack"=>1,"developer_msg"=>"Product status updated successfully!!","ack_msg"=>"Product status updated successfully!!");
  						return $reply;
  					}
  					else
  					{
  						$reply=array("ack"=>0,"developer_msg"=>"No record found!!","ack_msg"=>"No record found!!");
  						return $reply;
  					}
          }
          else{
            $reply=array("ack"=>0,"developer_msg"=>"Sub Category is deactive.Please activate sub category!!","ack_msg"=>"Sub Category is deactive.Please activate sub category!!");
            return $reply;
          }
				}
				else
				{
					$reply=array("ack"=>0,"developer_msg"=>" Category is deactive.Please activate category!!","ack_msg"=>" Category is deactive.Please activate category!!");
					return $reply;
				}	 
  		}
  		else
  		{
  			$this->db->rp_location("access_denied.php?msg=insert");
  			$reply=array("ack"=>0,"developer_msg"=>"Product detail cannot be fetch!","ack_msg"=>"Product detail cannot be fetch!");
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
  	
  	function countProduct($key,$value)
  	{		
  		$countProduct = $this->db->rp_getTotalRecord($this->ctable,$key."='".$value."'",0);
  		return $countProduct;	
  	}
  	function duplicateProduct($key,$value,$primary_key)
  	{		
  		$countProduct = $this->db->rp_getTotalRecord($this->ctable,$key."='".$value."' AND ".$this->primary_column."!=".$primary_key,0);
  		return $countProduct;	
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