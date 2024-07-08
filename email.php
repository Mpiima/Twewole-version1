<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                           
    $mail->Host       = 'mail.twewole.com';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'info@twewole.com';                     
    $mail->Password   = 'UVSlnscTi;#p';                              
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                              

    //Recipients
    $mail->setFrom('info@twewole.com', 'Mailer');
    $mail->addAddress('collinsmpiima@gmail.com', 'Mpiima Collins');    
    $mail->addAddress('collinsmpiima@gmail.com'); 
    $mail->addReplyTo('info@twewole.com', 'Information');
    // $mail->addCC('collinsmpiima@gmail.com');
    // $mail->addBCC('collinsmpiima@gmail.com');


    // $mail->addAttachment('/var/tmp/file.tar.gz');        
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Testing Emails';
    $mail->Body    = 'AM testing here!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>