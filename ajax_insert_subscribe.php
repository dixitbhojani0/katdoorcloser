<?php
    include("connect.php");
    /*------condition-------*/
    $where="isDelete=0 AND isActive=1";
    /*------contact_us_info get Data-------*/
    $get_contact_r=$db->rp_getData("contact_us_info","*",$where,0);
    $get_contact_d = mysqli_fetch_assoc($get_contact_r);
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPmailer/vendor/autoload.php';
    $mail = new PHPMailer(true);
    if(isset($_POST))
    {
        $date=date("Y-m-d h:i:s");
        extract($_POST);

        $values=array($email,$date);
        $rows=array("email","created_date");

        $insert=$db->rp_insert("contact_us",$values,$rows,0);
        if($insert)
        {
            $filename=SITEURL."images/broucher/broucher1.pdf";
            //print_r($filename);exit();
            
            
            // mail send start //////////////////////////////////////////////////
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     // Enable verbose debug output
                $mail->isSMTP();                                           // Send using SMTP
                $mail->Host       = 'mail.flowtop.in';                      // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                  // Enable SMTP authentication
                $mail->Username   = 'info@flowtop.in';                    // SMTP username 
                $mail->Password   = "W.i.]$=K0btA";          // SMTPSecure password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom("info@flowtop.in", "Flowtop");
                $mail->addAddress("info@flowtop.in");               // Name is optional

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = SITENAME." E-Catalouge";
                $mail->Body    ='Email: '.$email.' <br/>Created Date: '.date("d-m-Y H:i:s",strtotime($date));



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
            } 
            catch (Exception $e) {
                // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            ///////////// mail send end////////////////////////////////
            
            
            $reply=array("ack"=>1,"developer_msg"=>" Detail insert successfully!!","ack_msg"=>"E-Catalouge Download Successfully......","file_path"=>$filename,"file_name"=>"E-Catalouge-FLOWTOP");
                echo json_encode($reply);
        }
        else
        {
            $reply=array("ack"=>0,"developer_msg"=>"Demo Detail insert failed!!","ack_msg"=>"subscribe failed...");
            echo json_encode($reply);
        }   
    }
?>