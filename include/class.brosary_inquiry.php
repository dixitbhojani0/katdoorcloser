<?php
  class ContactUs extends Functions
  {
    public $detail=array();
    public $db,$rights;
    public $ctable="catalog_inquiry";
    public $primary_column="id";
    public $unique_column="name";
    // Public Varibale
    public $id='';public $name='';public $email='';public $subject='';public $message='';public $created_date=''; public $contact_number=''; public $category_name=''; 
    public $valid_keys=array("id","name","email","subject","message","contact_number","category_name","created_date");
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
        $result_r=$this->db->rp_getData($this->ctable,$required_columns,$where,$orderby,0,$this->getLimits($limit),0);
        if($result_r)
        {
          while($d=mysqli_fetch_assoc($result_r))
          {
  
            // Do Modification IN $d Here If Required
            $result[]=$d;
          }
          
          $reply=array("ack"=>1,"developer_msg"=>"Contact detail fetched successfully!!","ack_msg"=>"Contact detail fetched successfully!!","result"=>$result,"total_count"=>$total_count,"show_count"=>$show_count);
          return $reply;
        }
        else
        {
  
          $reply=array("ack"=>0,"developer_msg"=>"Contact detail can not be fetch!","ack_msg"=>"Contact detail can not be fetch!");
          return $reply;
        }
      }
      else
      {
        $this->db->rp_location("access_denied.php?msg=view");
        $reply=array("ack"=>0,"developer_msg"=>"Contact detail cannot be fetch!","ack_msg"=>"Contact detail cannot be fetch!");
        return $reply;
      }
      
    }
  
  
  
    function insert($detail=array(),$dup_check_array=array())
    {
      if($this->rights['insert_flag']==1)
      {
        $detail=$this->db->cleanArray($detail);
        $validateKey=$this->validateKey($detail);
        
        if($validateKey['ack']==1)
        {
              
          // check required column validation
          if(!empty($detail))
          {
            // count record from duplicate column if required else skip checking
            if(!empty($dup_check_array))
            $count=$this->countContactUs($dup_check_array['key'],$dup_check_array['value']);
            else
            $count=0; 
            
            if($count<=0)
            {
                
              // This is just for my F*ucking Mistake while creating database class :/
               $extracted_array=$this->extractArray($detail);
               $inserted_id=$this->db->rp_insert($this->ctable,$extracted_array['values'],$extracted_array['columns'],0);
              
              if($inserted_id!=0)
              {
                  
                $reply=array("ack"=>1,"inserted_id"=>$inserted_id,"developer_msg"=>"Message sent successfully!!","ack_msg"=>"Message sent successfully!!");
                return $reply;
              }
              else
              {
                $reply=array("ack"=>0,"developer_msg"=>"Message can't be sent!!","ack_msg"=>"Message can't be sent!!");
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
        $reply=array("ack"=>0,"developer_msg"=>"Message detail cannot be fetch!","ack_msg"=>"Message detail cannot be fetch!");
        return $reply;
      }
    }
    
    function update($detail=array(),$unique_key="",$primary_key,$bus_stops=array())
    {
      if($this->rights['update_flag']==1)
      {
        // id,bus_no,latitude,longitude
        
        $detail=$this->db->cleanArray($detail);
        $validateKey=$this->validateKey($detail);   
        if($validateKey['ack']==1)
        {
          // check required column validation
          if(!empty($detail)&& $primary_key!="")
          {
            // count record from $primary_key
            $count=$this->countBus($this->primary_column,$primary_key);
            if($count>=1)
            {
              $count=$this->duplicateBus($this->unique_column,$unique_key,$primary_key);
              if($count<=0)
              {
                $where=$this->primary_column."=".$primary_key;
                $isUpdated=$this->db->rp_update($this->ctable,$detail,$where,0);
                if($isUpdated)
                {
                      $ack=$this->addBusStop($primary_key,$bus_stops);
                  $reply=array("ack"=>1,"developer_msg"=>"Contact detail updated successfully!!","ack_msg"=>"Conatct detail updated successfully!!");
                  return $reply;
                }
                else
                {
                  $reply=array("ack"=>0,"developer_msg"=>"Contact detail cannot be updated!!","ack_msg"=>"Conatct detail cannot be updated!!");
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
        $reply=array("ack"=>0,"developer_msg"=>"Contact detail cannot be fetch!","ack_msg"=>"Conatct detail cannot be fetch!");
        return $reply;
      }
      
    }
  
    
    function delete($delete_array)
    {
      if($this->rights['delete_flag']==1)
      {
        $count=$this->countContactUs($delete_array['key'],$delete_array['value']);
              if($count>=1)
              {
          $this->db->rp_delete($this->ctable,$delete_array['key']."=".$delete_array['value'],0);
                $reply=array("ack"=>1,"developer_msg"=>"Message deleted successfully!!","ack_msg"=>"Message deleted successfully!!");
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
        $reply=array("ack"=>0,"developer_msg"=>"Message cannot be fetch!","ack_msg"=>"Message cannot be fetch!");
        return $reply;
      }   
    }
      function active($active_array)
    {
      if($this->rights['update_flag']==1)
      {
  
          $count=$this->countContactUs($active_array['key'],$active_array['value']);
          if($count>=1)
          {
            $this->db->rp_update($this->ctable,array("isActive"=>$active_array['status']),$active_array['key']."=".$active_array['value'],0);
            $reply=array("ack"=>1,"developer_msg"=>"Contact deatil status updated successfully!!","ack_msg"=>"Contact status updated successfully!!");
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
        $reply=array("ack"=>0,"developer_msg"=>"Contact detail cannot be fetch!","ack_msg"=>"Contact detail cannot be fetch!");
        return $reply;
      }
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
    
    function countContactUs($key,$value)
    {   
      $countContactUs = $this->db->rp_getTotalRecord($this->ctable,$key."='".$value."'",0);
      return $countContactUs; 
    }
    function duplicateBus($key,$value,$primary_key)
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