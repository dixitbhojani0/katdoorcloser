<?php
    include_once("connect.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPmailer/vendor/autoload.php';
    $mail = new PHPMailer(true);

    if(isset($_POST))
    {
        $date=date("Y-m-d h:i:s");
        extract($_POST);

        $values=array($username,$email,$p_quantity,$message,$date,$mobile_no,$pid);
        $rows=array("name","email","p_qty","message","created_date","contact_no","product_id");

        $insert=$db->rp_insert("product_inquiry",$values,$rows,0);
        if($insert)
        {
            // mail send start //////////////////////////////////////////////////
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     // Enable verbose debug output
                $mail->isSMTP();                                           // Send using SMTP
                $mail->Host       = MAIL_HOST;                     // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                  // Enable SMTP authentication
                $mail->Username = MAIL_USERNAME;               // SMTP username 
                $mail->Password = MAIL_PASSWORD;                             // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to

                //Recipients
                $mail->From = MAIL_FROM;
                $mail->FromName = MAIL_FROM_NAME;
                $mail->addAddress(ADMIN_EMAIL);               // Name is optional

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = "Product Inquiry Details";
                $mail->Body = "Hi,
                <br/>Please check below inquiry of user:
                <br/><br/>&emsp;<b>Username</b>: ".$username." 
                <br/><br/>&emsp;<b>Email:</b> ".$username."
                <br/><br/>&emsp;<b>Product Id:</b> ".$pid."
                <br/><br/>&emsp;<b>Product Quantity:</b> ".$p_quantity."
                <br/><br/>&emsp;<b>Message:</b> ".$message;
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
            } 
            catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            ///////////// mail send end////////////////////////////////

            $reply=array("ack"=>1,"developer_msg"=>" Detail insert successfully!!","ack_msg"=>"We Will Contact You Soon......");
            echo json_encode($reply);
        }
        else
        {
            $reply=array("ack"=>0,"developer_msg"=>"Demo Detail insert successfully!!","ack_msg"=>"product inquiry added failed...");
            echo json_encode($reply);
        }
    }
?>