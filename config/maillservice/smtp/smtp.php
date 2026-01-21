<?php

require_once "vendor/autoload.php";

//https://www.sitepoint.com/sending-emails-php-phpmailer/
//Less secure app access enable in your account
//https://myaccount.google.com/lesssecureapps
Class MailService {

    function __construct() {
        
    }

    public function sendmail($mailconf = array()) { // working goods 
        $response = array();
        // validation process 
        if (!isset($mailconf['mailto'])) {
            $response['status'] = 0;
            $response['message'] = "Mail to address not available.";
        }

        if (isset($mailconf['mailto'])) {
            if (!is_array($mailconf['mailto'])) {
                $response['status'] = 0;
                $response['message'] = "Mail to address not string";
                return $response;
            }
        }

        if (!isset($mailconf['subject'])) {
            $response['status'] = 0;
            $response['message'] = "Subject not available.";
            return $response;
        }
        if (!isset($mailconf['body'])) {
            $response['status'] = 0;
            $response['message'] = "Message is not available.";
            return $response;
        }
        if (isset($mailconf['attachment'])) {
            if (!file_exists($mailconf['attachment'])) {
                $response['status'] = 0;
                $response['message'] = "File is not exits.";
                return $response;
            }
        }


        //
        $mail = new PHPMailer\PHPMailer\PHPMailer;
        /*         * *********************** */
        // response format :
        // status 0 --> Error  1--> Success
        // message if 0 is error message else  success message 
        // data is array value

        /*         * *********************** */
        //Enable SMTP debugging.
        // enables SMTP debug information (for testing)
        // 1 = errors and messages
        // 2 = messages only
        $mail->SMTPDebug = 0;
//Set PHPMailer to use SMTP.
        $mail->isSMTP(); //live is not working .. 
//Set SMTP host name                          
        $mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;
//If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";
//Set TCP port to connect to 
        $mail->Port = 587;

        /*   user configartion      * *********************** */
//Provide username and password     
        $mail->Username = "vistmpe@gmail.com"; // get from user 
        $mail->Password = "9965713974"; // get from user 
        $mail->From = "vistmpe@gmail.com";
        $mail->FromName = "Sender name";

        $mailaddress = $mailconf['mailto'];

        foreach ($mailaddress as $key => $mailaddresss) {
            $mail->addAddress($mailaddresss['mail'], $mailaddresss['name']); // to addrass $mailconf['mailto']=array(array('mail'=>'','name'=>''));
        }

        if (isset($mailconf['attachment'])) {
            $mail->addAttachment($mailconf['attachment']);
        }

        $mail->isHTML(true);
        $mail->Subject = $mailconf['subject'];

        $mail->Body = $mailconf['body'];

        $mail->AltBody = "This is the plain text version of the email content";

        if (!$mail->send()) {
            $response['status'] = 0;
            $response['message'] = "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $response['status'] = 1;
            $response['message'] = "Message has been sent successfully ";
        }
        return $response;
    }

}

$mymail = new MailService();
