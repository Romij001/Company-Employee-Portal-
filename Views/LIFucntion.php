<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['massage'])) {
    $mail = new PHPMailer(true);
    $email_status;
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();
        $mail->SMTPAuth   = true;    

        $email = $_SESSION['Email'];
        $fname = $_SESSION['Name'];
        $designation = $_SESSION['Designation'];                                  //Enable SMTP authentication
        $message = $_POST['massage'];    
        $person_list = $_POST['person_list'];
                                                    //Send using SMTP

        if($person_list != null && count($person_list) > 0){
            for ($) {
                $person = 
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->Username   = 'romijnipu001@gmail.com';                     //SMTP username
                $mail->Password   = 'ctkvvyjaqzftibae';
                // $mail->Password   = $password;
                // $mail->SMTPSecure = 'tls';                               //SMTP password
                
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure  = PHPMailer::ENCRYPTION_STARTTLS`
                $person_name = $person.name;
                $person_mail = $person.email;
                //Recipients
                $mail->setFrom($email, $fname);
                $mail->addAddress($person_mail, $person_mail);      //Add a recipient
                
                // $subject = 'Apply for leave';
                // $massage = `'Name: '. $Name .
                // ' Designation: ' . $designation .
                // 'Type Of Leave: ' . $LeaveName .
                // 'Date(From): ' . $DateFrom .
                // 'Date(To): ' . $DateTo .
                // 'Reason: ' . $Reason .
                // `;

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Apply for leave Application';
                $mail->Body    = '
                 <h4>Name: '. $Name .'</h4>                 
                 <h4>Designation: '. $designation .'</h4> 
                 <h4>Reason: '. $massage .'</h4>  
                ';
            

                $email_status = $mail->send();
                echo 'Message has been sent';
            }
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>