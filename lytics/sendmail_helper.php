<?php
  // Code based on sendmail.php
  function sendEmail($receiver, $subject, $message) {
    // Adjusted mail path
    $mailpath = '/opt/lampp/xamppfiles/PHPMailer';

    // Add the new path items to the previous PHP path
    $path = get_include_path();
    set_include_path($path . PATH_SEPARATOR . $mailpath);
    require_once 'PHPMailerAutoload.php';       # only require once b/c in function

    // Make a new PHPMailer object and configure it to use the gmail STMP server
    $mail = new PHPMailer();
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "tls"; // sets tls authentication
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server; or your email service
    $mail->Port = 587; // set the SMTP port for GMAIL server; or your email server port
    $mail->Username = "lyticscompany@gmail.com";
    $mail->Password = "uvaecommerce";

    // Put information into the message
    $mail->addAddress($receiver);
    $mail->SetFrom("lyticscompany@gmail.com");
    $mail->Subject = "$subject";

    // Add embed image
    $mail->AddEmbeddedImage('img/lytics-logo-color.png', 'lytics_logo');

    // Set the message to have HTML
    $mail->Body = "$message";
    $mail->IsHTML(true);

    // echo 'Everything ok so far' . var_dump($mail);
    if(!$mail->send()) {
      // echo 'Message could not be sent.';
      // echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
  }
?>