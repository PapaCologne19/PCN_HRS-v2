<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

// Load Composer's autoloader
require '../vendor/autoload.php';

// For sending approved email
function sendApproveEmail($email, $fullname)
{
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
        $mail->Subject = 'PCN Room Reservation';
        $mail->Body    = '<center>
                              <div class="container">
                                <div class="logo">
                                    <img src="/images/pcn.png" alt="" width="15%">
                                </div>
                                <div class="div-message" style="margin:0 20rem;">
                                    <h3 style="font-family: Arial, Helvetica, sans-serif; text-align: justify;">PCN Morning, ' . $fullname . ', </h3>
                                    <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify; text-indent: 4rem;">Your room reservation has been approved. You can now use the room. Thank you and have a good day.</p>
                                      <br>
                                  </div>
                                  <div class="footer-message" style="margin: 0 16rem;">
                                      <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify; text-indent: 4rem;">Best Regards, MIS Department</p>
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

function sendRejectionMessage($email, $fullname){
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
        $mail->Subject = 'PCN Room Reservation';
        $mail->Body    = '<center>
                              <div class="container">
                                <div class="logo">
                                    <img src="/images/pcn.png" alt="" width="15%">
                                </div>
                                <div class="div-message" style="margin:0 20rem;">
                                    <h3 style="font-family: Arial, Helvetica, sans-serif; text-align: justify;">PCN Morning, ' . $fullname . ', </h3>
                                    <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify; text-indent: 4rem;">Your room reservation has been approved. You can now use the room. Thank you and have a good day.</p>
                                      <br>
                                  </div>
                                  <div class="footer-message" style="margin: 0 16rem;">
                                      <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify; text-indent: 4rem;">Best Regards, MIS Department</p>
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
