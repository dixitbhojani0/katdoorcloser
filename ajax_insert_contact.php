<?php
    include_once("connect.php");
    /*------condition-------*/
    $where = "isDelete=0 AND isActive=1";

    /*------contact_us_info get Data-------*/
    $get_contact_r = $db->rp_getData("contact_us_info", "*", $where, 0);
    $get_contact_d = mysqli_fetch_assoc($get_contact_r);
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPmailer/vendor/autoload.php';
    $mail = new PHPMailer(true);

    if(isset($_REQUEST))
    {
        $date=date("Y-m-d h:i:s");
        extract($_REQUEST);

        $values=array($username,$email,$subject,$date,$mobile_no,$message);
        $rows=array("name","email","subject","created_date","contact_no","message");

        $insert=$db->rp_insert("contact_us",$values,$rows,0);
        if($insert)
        {
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     // Enable verbose debug output
                $mail->isSMTP();                                           // Send using SMTP
                $mail->Host = MAIL_HOST;                      // Set the SMTP server to send through
                $mail->SMTPAuth = true;                                  // Enable SMTP authentication
                $mail->Username = MAIL_USERNAME;                    // SMTP username 
                $mail->Password = MAIL_PASSWORD;          // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->From = MAIL_FROM;
                $mail->FromName = MAIL_FROM_NAME;
                $mail->addAddress($email);               // Name is optional

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = SITENAME;
                $mail->Body = 'Hi, '.$username.
                '<br/>Thank you for getting in touch. We are working on your request hang tight! We will get back to you within 8 business hours (Monday - Friday 10 am to 7pm EST).<br/>Here are some important links that might direct you where you need to go:<br/>Phone No:'.$get_contact_d["phone"].
                '<br/>Thanks again,<br/>'.MAIL_FROM_NAME;
                $mail->AltBody = 'This is the computer generated email'; // This is the body in plain text for non-HTML mail clients
                $mail->SMTPDebug  = 0; 
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                $mail->send();
                //echo "string11";exit();
                
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            
            $reply=array("ack"=>1,"developer_msg"=>" Detail insert successfully!!","ack_msg"=>"We Will Contact You Soon......");
            echo json_encode($reply);
        }
        else
        {
            $reply=array("ack"=>0,"developer_msg"=>"Demo Detail insert failed!!","ack_msg"=>"product inquiry added failed...");
            echo json_encode($reply);
        }   
    }
?>