<?php
  include("class.phpmailer.php");
  class Notification extends Functions
  {
  	/*
  		*** Notification Function Developed By mr._.raj :) <<<
  	*/
  	private $mailer;
  	private $mailer2;
  
  	function __construct() {
  		$this->mailer = new PHPMailer();
  		$this->mailer2 = new PHPMailer();
  	}
  
  	public function rp_checkSMS($n,$sms) // Common SMS Function
    {
  		$smsMsg = urlencode($sms);
  		$apiurl = "http://sms.bulkbox.in/submitsms.jsp?user=PHYCARE&key=9e5ef6eee3XX&mobile=+91".$n."&message=".$smsMsg."&senderid=PHCARE&accusage=1 ";
  		return file_get_contents($apiurl);
    }
  	public function rp_sendSMS2($cart_id,$msg,$prmTXT="") // Common SMS Function
      {
  		$cartdetails_r 	= parent::rp_getData("cartdetails","name,phone","cart_id='".$cart_id."'");
  		$cartdetails_d 	= mysqli_fetch_array($cartdetails_r);		
  		$smsName= stripslashes($cartdetails_d['name']);
  		$smsName= explode(" ",$smsName);
  		$smsName= $smsName[0];
  		$smsTo 	= $cartdetails_d['phone'];		
  		$smsMsg = urlencode("Dear $smsName, ".$msg);
  		$apiurl = "http://sms.bulkbox.in/submitsms.jsp?user=PHYCARE&key=9e5ef6eee3XX&mobile=+91".$smsTo."&message=".$smsMsg."&senderid=PHCARE&accusage=1 ";
  		$msg_id = file_get_contents($apiurl);		
  		return $msg_id;
      }
  	
  	public function rp_sendEmail($toemail,$subject="",$body="") // Common Email Function
      {
  		$from_name = 'Sagar';
  		$from_mail = "info@thefd7.com";
  		$this->mailer2->SetFrom($from_mail,$from_name); // From email ID and from name
  		$this->mailer2->AddAddress($toemail);
  		$this->mailer2->Subject = $subject;
  		$this->mailer2->MsgHTML($body);
  		$this->mailer2->SMTPSecure = 'ssl';
  		$this->mailer2->Send();
      }
  	public function rp_sendGenEmail($toemail,$subject="",$body="",$new_file_name="",$uploaded_file_path="") // Common Email Function
      {
  		
  		$from_name = SITETITLE;
  		$from_mail = MAIL_FROM;
  		//$mail = new PHPMailer();
  		
  		$this->mailer->SetFrom($from_mail,$from_name); // From email ID and from name
  		$this->mailer->AddAddress($toemail);
  		$this->mailer->AddAddress(MAIL_BCC);
  		$this->mailer->AddAddress(MAIL_CC);		
  		$this->mailer->AddReplyTo(MAIL_REPLY_TO, MAIL_FROM);
  		$this->mailer->Subject = $subject;
  		$this->mailer->MsgHTML($body);
  		if($new_file_name!="" && $uploaded_file_path!=""){
  			$this->mailer->AddAttachment($uploaded_file_path,$new_file_name);
  		}
  		$this->mailer->Send();
  		return true;
      }
  	public function aj_sendSecurityCode($toemail,$subject="",$body="") // Common Email Function
      {
  		$from_name  = SITENAME;
  		$from_mail  = "care@falando.in";					
  		$body = $body;
  		$mail32 = new PHPMailer();
  		$mail32->SetFrom($from_mail,$from_name); // From email ID and from name
  		$mail32->AddAddress(stripslashes($toemail));
  		$mail32->Subject = $subject;
  		$mail32->MsgHTML($body);
  		$mail32->Send();
  		/*****************************************/
  		
      }
  	public function aj_sendSMSSecurity($n,$sms) // Send Security SMS Function
      {		
  
  		$apiurl = "http://sms.bulkbox.in/submitsms.jsp?user=PHYCARE&key=9e5ef6eee3XX&mobile=+91".$n."&message=".urlencode($sms)."&senderid=PHCARE&accusage=1 ";
  		$reply = file_get_contents($apiurl);
  		$reply=explode(",",$reply);
  	
  		if(preg_replace('/\s+/', '', $reply[1])=="success")
  		{		  	
  			return $reply[2];
  		}
  		else
  		{			
  			return 0;
  		}		
      }
  	public function aj_sendSMS($n,$sms) // Common SMS Function
      {		
  		
  		$apiurl = "http://sms.bulkbox.in/submitsms.jsp?user=PHYCARE&key=9e5ef6eee3XX&mobile=+91".$n."&message=".urlencode($sms)."&senderid=PHCARE&accusage=1 ";
  		 $reply = file_get_contents($apiurl);
  		$reply=explode(",",$reply);
  		
  		if(preg_replace('/\s+/', '', $reply[1])=="success")
  		{			
  			return "success";
  			//return $reply[2];
  		}
  		else
  		{			
  			return 0;
  		}		
      }
  	public function aj_getDeliveryReport($messageId) // Common SMS Function
      {		
  		
  		$apiurl = "http://sms.bulkbox.in/getreport.jsp?userid=PHYCARE&key=9e5ef6eee3XX&messageid=".$messageId;
  		$delivery_report_string= file_get_contents($apiurl);
  		$delivery_report=explode(",",$delivery_report_string);		
  		if(true)//$delivery_report[4]=='DELIV'
  		{
  			$ack=array("ack"=>1,"ack_msg"=>"SMS sent successfully on".$delivery_report[0],"extra"=>$delivery_report);
  			
  		}
  		else if($delivery_report[4]=='EXPIRED')
  		{
  			$ack=array("ack"=>0,"ack_msg"=>"SMS sending failed on".$delivery_report[0],"reason"=>"Mobile switched off or out of coverage area!!","extra"=>$delivery_report);
  		}
  		else
  		{
  			$ack=array("ack"=>0,"ack_msg"=>"SMS sending failed on".$delivery_report[0],"reason"=>"Mobile number not available","extra"=>$delivery_report);
  		}
  		return $ack;
      }
  }
  /*
  	*** Notification Function Developed By mr._.raj :) <<<
  */
  ?>