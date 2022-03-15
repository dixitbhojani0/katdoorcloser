<?php
// require_once("notification.class.php");
require_once("function.class.php");
class UserRegistration extends Functions
{
				
	public $detail=array();
	public $db;
	public $system;

	public $ctable="user_registration";
	public $primary_column="id";
	public $unique_column="mobile_no";
	function __construct($id="") 
	{
		$db = new Functions();
		$conn = $db->connect();
		$this->db=$db;
		$this->system=new System();		
		$this->nt = new Notification();   
    }  


	
	function UserLogin($detail)
	{
		// print_r($detail); exit;
		if(!empty($detail))
		{
			extract($detail);
			$where   =  "mobile_no= '".$_REQUEST['phone']."' AND password= '".$password."' AND isDelete=0";
			$data_r  =  $this->db->rp_getData("register","*",$where,"",0);
			// print_r($data_r);exit;
			if($data_r){
				while($emp_d=mysqli_fetch_assoc($data_r))
				{
					
					$user_detail=$emp_d;
				}
				$reply=array("ack"=>1,"developer_msg"=>"Login Seccessfully","ack_msg"=>"Login Seccessfully","result"=>$user_detail);
					return $reply;
			}
			else
			{
				$reply=array("ack"=>0,"developer_msg"=>"Phone No or Password not match","ack_msg"=>"Phone No or Password not match");
				return $reply;
			}
			
		}
		else
		{
			$reply=array("ack"=>0,"developer_msg"=>"Phone No or Password not match","ack_msg"=>"Phone No or Password not match");
			return $reply;
		}
	}
	function User_register($detail)
	{
		
		if(!empty($detail))
		{
			extract($detail);

			$isDuplicate=$this->db->rp_dupCheck("register","mobile_no='".$mobile_no."' AND email='".$email."' AND isDelete=0",0);			
			if($isDuplicate)
			{
				$reply=array("ack"=>0,"developer_msg"=>"Database error!!","ack_msg"=>"This Mobile Number AND Email already Exist.");
				return $reply;
			}
			else
			{

			$rows=array(
			        	"name",
			        	"password",
			        	"mobile_no",
			        	"email",
			        	"address",
			        	"adate"
					);
			$values  = array(
			        	$name,
			        	$password,
			        	$mobile_no,
			            $email,    
			            $address,
			            $adate,
					);
			}

			$inserted_id  =  $this->db->rp_insert("register",$values,$rows,0);
			// echo $inserted_id;exit;
			if($inserted_id){
				$result= array();
				$get_user_r=$this->db->rp_getData("register","*","id='".$inserted_id."' AND isDelete=0","",0);
				while($get_user_d=mysqli_fetch_assoc($get_user_r))
				{
					$result[]=$get_user_d;
				}
				$reply=array("ack"=>1,"developer_msg"=>"Register Seccessfully","ack_msg"=>"Register Seccessfully","result"=>$result);
					return $reply;
			}
			else
			{
				$reply=array("ack"=>0,"developer_msg"=>"Register Parameter missing or not valid!!","ack_msg"=>"Register Parameter missing or not valid!!");
				return $reply;
			}
			
		}
		
	}
	function User_update($detail)
	{
		// print_r($detail);exit;
		if(!empty($detail))
		{
			extract($detail);
			$values = array(
				"name"=>$name,
				"mobile_no"=>$mobile_no,
				"email"=>$email,
				"address"=>$address,
				"adate"=>$adate
			);
			
			 $update_id=$this->db->rp_update("register",$values,"id='".$_REQUEST['id']."'",0);
			// echo $inserted_id;exit;
			if($update_id){

				$reply=array("ack"=>1,"developer_msg"=>"User Update Seccessfully","ack_msg"=>"User Update Seccessfully","result"=>$_REQUEST['id']);
					return $reply;
			}
			else
			{
				$reply=array("ack"=>0,"developer_msg"=>"User Update Parameter missing or not valid!!","ack_msg"=>"User Update Parameter missing or not valid!!");
				return $reply;
			}
			
		}
		
	}
	function User_delete($detail)
	{
		// print_r($detail);exit;
		if(empty($detail))
		{
			extract($detail);
			$values = array(
				"isDelete"=>1
			);
			
			 $delete_id=$this->db->rp_update("register",$values,"id='".$_REQUEST['id']."'",0);
			// echo $delete_id;exit;
			if($delete_id){

				$reply=array("ack"=>1,"developer_msg"=>"User Delete Seccessfully","ack_msg"=>"User Delete Seccessfully","result"=>$_REQUEST['id']);
					return $reply;
			}
			else
			{
				$reply=array("ack"=>0,"developer_msg"=>"User Delete Parameter missing or not valid!!","ack_msg"=>"User Delete Parameter missing or not valid!!");
				return $reply;
			}
			
		}
		
	}
	public function AddPostimage($file,$id)
		{
			// echo $id;exit;
				if (isset($file["image_path"]) && $file["image_path"]['size']!=0) 
					{	

						$allowedExts = array("jpg","jpeg","png","JPG","JPEG");
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
						
						$adate   = date('Y-m-d H:i:m');

						$extension = end(explode(".", $fileName));
						$fileName	 = 'getpass'.substr(sha1(time()), 0, 6).".".$extension;
					    $tempPath="../images/getpass/".$file['image_path']['name'];
						
						
						move_uploaded_file($file["image_path"]['tmp_name'],$tempPath);
						$image_path=$file['image_path']['name'];
						
						unset($old_image_path);
						
					}
					else
					{
					    $image_path="";	
					    //unset($old_image_path);
					}
					if($image_path!="")
					{
						$value = array(
							"image_path" => $image_path,
						);
						
					}
					// $image = $this->db->rp_update("webcam",$value,$row,0);
					$is_upload=$this->db->rp_update("register",$value,"id='".$id."'",0);
					if($is_upload){
					$reply=array("ack"=>1,"developer_msg"=>"User Image Upload Seccessfully","ack_msg"=>"User Image Upload Seccessfully","result"=>$_REQUEST['id']);
					return $reply;
					}

		}
		function contact_us($detail)
		{
			
			if(!empty($detail))
			{
				extract($detail);
				// $project_data = array();
				$rows=array(
							        	"name",
							        	"email",
							        	"contact_number",
							        	"subject",
							        	"message",
							        	"created_date"
								    );
				$values  = array(
							        	$name,
							        	$email,
							        	$contact_number,
							            $subject,    
							            $message,
							            $created_date,
								    );
				$inserted_id  =  $this->db->rp_insert("contact_us",$values,$rows,0);
				// echo $inserted_id;exit;
				if($inserted_id){
					$result= array();
					$get_contact_r=$this->db->rp_getData("contact_us","*","id='".$inserted_id."'","",0);
					while($get_contact_d=mysqli_fetch_assoc($get_contact_r))
					{
						$result[]=$get_contact_d;
					}
					$reply=array("ack"=>1,"developer_msg"=>"Contact Seccessfully","ack_msg"=>"Contact Seccessfully","result"=>$result);
						return $reply;
				}
				else
				{
					$reply=array("ack"=>0,"developer_msg"=>"Contact Parameter missing or not valid!!","ack_msg"=>"Contact Parameter missing or not valid!!");
					return $reply;
				}
				
			}
			
		}
		function testimonial($detail)
		{
			
			if(!empty($detail))
			{
				extract($detail);
				// $project_data = array();
				$rows=array(
							        	"name",
							        	"slug",
							        	"designation",
							        	"message",
							        	"adate"
								    );
				$values  = array(
							        	$name,
							        	$slug,
							        	$designation,
							            $message,
							            $adate,
								    );
				$inserted_id  =  $this->db->rp_insert("testimony",$values,$rows,0);
				// echo $inserted_id;exit;
				if($inserted_id){
					$result= array();
					$get_testimonial_r=$this->db->rp_getData("testimony","*","id='".$inserted_id."'","",0);
					while($get_testimonial_d=mysqli_fetch_assoc($get_testimonial_r))
					{
						$result[]=$get_testimonial_d;
					}
					$reply=array("ack"=>1,"developer_msg"=>"Testimonial Add Seccessfully","ack_msg"=>"Testimonial Add Seccessfully","result"=>$result);
						return $reply;
				}
				else
				{
					$reply=array("ack"=>0,"developer_msg"=>"Testimonial Parameter missing or not valid!!","ack_msg"=>"Testimonial Parameter missing or not valid!!");
					return $reply;
				}
				
			}
			
		}

		function product($detail)
		{
			
			if(!empty($detail))
			{
				extract($detail);
				// $project_data = array();
				$rows=array(
							        	"cid",
							        	"sid",
							        	"name",
							        	"slug",
							        	"description",
							        	"add_info",
							        	"price",
							        	"adate"
								    );
				$values  = array(
							        	$category,
							        	$sub_category,
							        	$name,
							            $slug,
							            $description,
							            $add_info,
							            $price,
							            $adate,
								    );
				$inserted_id  =  $this->db->rp_insert("product",$values,$rows,0);
				// echo $inserted_id;exit;
				if($inserted_id){
					$result= array();
					$get_product_r=$this->db->rp_getData("product","*","id='".$inserted_id."'","",0);
					while($get_product_d=mysqli_fetch_assoc($get_product_r))
					{
						$result[]=$get_product_d;
					}
					$reply=array("ack"=>1,"developer_msg"=>"Product Add Seccessfully","ack_msg"=>"Product Add Seccessfully","result"=>$result);
						return $reply;
				}
				else
				{
					$reply=array("ack"=>0,"developer_msg"=>"Product Parameter missing or not valid!!","ack_msg"=>"Product Parameter missing or not valid!!");
					return $reply;
				}
				
			}
			
		}

	

}
	
	

?>	