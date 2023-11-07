<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="sweet.js"></script>
    <title> Email verification </title>
</head>
<body>
</body>
</html>

<?php  
 ?>
  <script src="sweet.js"></script>
 <?php

$servername ="localhost";
$username = "root";
$password = "Sathira@1234";
$dbname = "itacademy";

//creating db connection
$conn = new mysqli($servername, $username, $password, $dbname);

//cheking stablish or not
if($conn->connect_error){
	die("connection failed");
}

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$password = $_POST["password"];
$grade = $_POST["grade"];
$mobile = $_POST["mobile"];

$verification_code = sha1($email . time());
$verification_url = 'http://localhost/php/LMS/pages/register/verify.php?code=' . $verification_code; 

$sql = "INSERT INTO signup (first_name, last_name, email, password, grade, mobile, verification_code, is_active) 
VALUES ('{$firstName}','{$lastName}', '{$email}', '{$password}','{$grade}','{$mobile}','{$verification_code}',false)";

    if($conn->query($sql) === TRUE){
      ?>
      <script>
          swal("Verify your email to proceed", "Please check your mail", "success");
      </script>
      <?php
    }


//email verification

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                                       //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sathirabandara1@gmail.com';            //SMTP username
    $mail->Password   = 'duuoggleitrmjbdn';                     //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('onlinegames@gmail.com', 'IT Academy');
    $mail->addAddress($email, 'IT Academy');     //Add a recipient
    $mail->addReplyTo('onlinegames@gmail.com', 'Information');
   // $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
   // $mail->addAttachment('1.jpeg');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Activate Your New Account';
    $mail->Body    = " <!doctype html>
    <html>
      <head>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
        <title>Simple Transactional Email</title>
        <style>
          img {
            border: none;
            -ms-interpolation-mode: bicubic;
            max-width: 100%; 
          }
    
          body {
            background-color: #f6f6f6;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 14px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%; 
          }
    
          table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%; }
            table td {
              font-family: sans-serif;
              font-size: 14px;
              vertical-align: top; 
          }
    
    
          .body {
            background-color: #f6f6f6;
            width: 100%; 
          }
    
          
          .container {
            display: block;
            margin: 0 auto !important;
            /* makes it centered */
            max-width: 580px;
            padding: 10px;
            width: 580px; 
          }
    
          .content {
            box-sizing: border-box;
            display: block;
            margin: 0 auto;
            max-width: 580px;
            padding: 10px; 
          }
    
    
          .main {
            background: #ffffff;
            border-radius: 3px;
            width: 100%; 
          }
    
          .wrapper {
            box-sizing: border-box;
            padding: 20px; 
          }
    
          .content-block {
            padding-bottom: 10px;
            padding-top: 10px;
          }
    
          .footer {
            clear: both;
            margin-top: 10px;
            text-align: center;
            width: 100%; 
          }
            .footer td,
            .footer p,
            .footer span,
            .footer a {
              color: #999999;
              font-size: 12px;
              text-align: center; 
          }
    
    
          h1,
          h2,
          h3,
          h4 {
            color: #000000;
            font-family: sans-serif;
            font-weight: 400;
            line-height: 1.4;
            margin: 0;
            margin-bottom: 30px; 
          }
    
          h1 {
            font-size: 35px;
            font-weight: 300;
            text-align: center;
            text-transform: capitalize; 
          }
    
          p,
          ul,
          ol {
            font-family: sans-serif;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
            margin-bottom: 15px; 
          }
            p li,
            ul li,
            ol li {
              list-style-position: inside;
              margin-left: 5px; 
          }
    
          a {
            color: #3498db;
            text-decoration: underline; 
          }
    
          .btn {
            box-sizing: border-box;
            width: 100%; }
            .btn > tbody > tr > td {
              padding-bottom: 15px; }
            .btn table {
              width: auto; 
          }
            .btn table td {
              background-color: #ffffff;
              border-radius: 5px;
              text-align: center; 
          }
            .btn a {
              background-color: #ffffff;
              border: solid 1px #3498db;
              border-radius: 5px;
              box-sizing: border-box;
              color: #3498db;
              cursor: pointer;
              display: inline-block;
              font-size: 14px;
              font-weight: bold;
              margin: 0;
              padding: 12px 25px;
              text-decoration: none;
              text-transform: capitalize; 
          }
    
          .btn-primary table td {
            background-color: #3498db; 
          }
    
          .btn-primary a {
            background-color: #3498db;
            border-color: #3498db;
            color: #ffffff; 
          }
    
    
          .last {
            margin-bottom: 0; 
          }
    
          .first {
            margin-top: 0; 
          }
    
          .align-center {
            text-align: center; 
          }
    
          .align-right {
            text-align: right; 
          }
    
          .align-left {
            text-align: left; 
          }
    
          .clear {
            clear: both; 
          }
    
          .mt0 {
            margin-top: 0; 
          }
    
          .mb0 {
            margin-bottom: 0; 
          }
    
          .preheader {
            color: transparent;
            display: none;
            height: 0;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
            mso-hide: all;
            visibility: hidden;
            width: 0; 
          }
    
          .powered-by a {
            text-decoration: none; 
          }
    
          hr {
            border: 0;
            border-bottom: 1px solid #f6f6f6;
            margin: 20px 0; 
          }
    
          @media only screen and (max-width: 620px) {
            table.body h1 {
              font-size: 28px !important;
              margin-bottom: 10px !important; 
            }
            table.body p,
            table.body ul,
            table.body ol,
            table.body td,
            table.body span,
            table.body a {
              font-size: 16px !important; 
            }
            table.body .wrapper,
            table.body .article {
              padding: 10px !important; 
            }
            table.body .content {
              padding: 0 !important; 
            }
            table.body .container {
              padding: 0 !important;
              width: 100% !important; 
            }
            table.body .main {
              border-left-width: 0 !important;
              border-radius: 0 !important;
              border-right-width: 0 !important; 
            }
            table.body .btn table {
              width: 100% !important; 
            }
            table.body .btn a {
              width: 100% !important; 
            }
            table.body .img-responsive {
              height: auto !important;
              max-width: 100% !important;
              width: auto !important; 
            }
          }
    
          @media all {
            .ExternalClass {
              width: 100%; 
            }
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
              line-height: 100%; 
            }
            .apple-link a {
              color: inherit !important;
              font-family: inherit !important;
              font-size: inherit !important;
              font-weight: inherit !important;
              line-height: inherit !important;
              text-decoration: none !important; 
            }
            #MessageViewBody a {
              color: inherit;
              text-decoration: none;
              font-size: inherit;
              font-family: inherit;
              font-weight: inherit;
              line-height: inherit;
            }
            .btn-primary table td:hover {
              background-color: #34495e !important; 
            }
            .btn-primary a:hover {
              background-color: #34495e !important;
              border-color: #34495e !important; 
            } 
          }
    
        </style>
      </head>
      <body>
        <span class='preheader'>This is preheader text. Some clients will show this text as a preview.</span>
        <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body'>
          <tr>
            <td>&nbsp;</td>
            <td class='container'>
              <div class='content'>
    
    
                <table role='presentation' class='main'>
                  <tr>
                    <td class='wrapper'>
                      <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                        <tr>
                          <td>
                            <h2 style='text-align: center; font-size: 24px;'  ><b>You're almost there! Just confirm your email</b></h2>
                            <p style='justify-self: start; font-size: 15px;'>You've successfully created a IT Academy account. To activate it, please click below to verify your email address.</p>
                            <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='btn btn-primary'>
                              <tbody>
                                <tr>
                                  <td align='center'>
                                    <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                                      <tbody>
                                        <tr>
                                          
                                          <td> <a href='".$verification_url."'>Activate Your Account </a> </td>
    
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <p>Thanks, <br> The IT Academy.</p>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
           
                <div class='footer'>
                  <table role='presentation' border='0' cellpadding='0' cellspacing='0'>
                    <tr>
                      <td class='content-block'>
                        <span class='apple-link'>This email was intended for '.$firstName.', because you signed up for IT academy The links in this email will always direct to <a href='http://localhost/php/email/signlog'>http://localhost/php/email/signlog</a>. <br> Learn about email security and online safety.<br>
                          © it academy sri lanka 2023</span>
              
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </body>
    </html>
     ";
    //$mail->Body = "";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "<!DOCTYPE html>
    <html>
    <head>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
    div {
      margin-bottom: 15px;
      padding: 4px 12px;
    }
    
    .success {
      background-color: #ddffdd;
      border-left: 6px solid #04AA6D;
    }
    
    .warning {
      background-color: #ffffcc;
      border-left: 6px solid #ffeb3b;
    }
    *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
a{
    display: grid;
    height: 45px;
    width: 145px;
    background-color: #04AA6D;
    position: absolute;
    margin: auto;
    left: 0;
    right: 184vh;
    top: 0;
    bottom: 63vh;
    place-items: center;
    font-family: 'Times New Roman', Times, serif;
    color: #ffffff;
    font-size: 15px;
    font-weight: 500;
    text-decoration: none;
    letter-spacing: 3px;
    border-radius: 5px;
}
p{
  font-size: 20px;
}

    </style>
    </head>
    <body>
    
    <div class='warning'>
        <h1><b>please check your email for verification link</b></h1>
    </div>
    
    <div class='success'>
        <p> We just sent an email to the address <b>$email</b>
            Please check your email and click on the link provided to verify your address
        </p>
        </div>
        <a href='https://mail.google.com/' target='_blank'>GO TO GMAIL</a>
    </body>
    </html>.";           
   //header("Location:signlog.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>



















