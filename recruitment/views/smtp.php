<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

// Load Composer's autoloader
require '../vendor/autoload.php';

// For sending email rejection message 
function sendRejectionMessage($email, $fullname, $position){
    $mail = new PHPMailer();
    try {
        // Server settings
        $mail->isSMTP();  // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';  // Set the SMTP server to send through
        $mail->SMTPAuth   = true;  // Enable SMTP authentication
        $mail->Username   = 'jphigomera0619@gmail.com';  // SMTP username
        $mail->Password   = 'hbofxxnqvkeyhgkf';  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable STARTTLS encryption
        $mail->Port       = 587;  // TCP port to connect to (use 587 if you set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`)

        // Recipients
        $mail->setFrom('PCNPromopro@gmail.com', 'PCN Promopro Inc.');
        $mail->addAddress($email, '');  // Add a recipient

        // Content
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Application Status Update - ' . $position . '';
        $mail->Body    = '<center>
                            <div class="container" style="margin: 1rem;">
                                <div class="div-message">
                                    <h3 style="font-family: Arial, Helvetica, sans-serif; text-align: justify;">Dear '. $fullname .',</h3>
                                    <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify; text-indent: 4rem;">I hope this message finds you well. After careful consideration, we regret to inform you that we have chosen not to move forward with your application for the <strong>'.$position.'</strong> role. </p>
                        
                                    <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify;">
                                        We appreciate the time and effort you invested in the application process and want to thank you for considering PCN Promopro Inc. as a potential employer. We encourage you to keep an eye on our career opportunities, as your skills may align with future openings.
                                    </p>
                                    <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify;">
                                        We wish you the very best in your job search and your career pursuits.  For the meantime, you can visit <a href="#">jobs.pcnpromopro.com</a> for other available positions.
                                    </p>
                                    <br>
                                    <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify;">
                                        Thank you once again.
                                    </p>
                                    <br>
                                </div>
                                <div class="footer-message">
                                    <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify; ">Best regards,<br><br>
                                        PCN Promopro Inc.</p>
                                </div>
                            </div>
                        </center>';

        // Send the email
        if (!$mail->send()) {
            echo "Message could not be sent.";
        }
    } catch (Exception $e) {
        echo "Message could not be sent.";
        echo "Email Address: " . $email;
    }
}
