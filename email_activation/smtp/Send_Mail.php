<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from       = "buikhiem1994@gmail.com";
$mail       = new PHPMailer();
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "tls://smtp.gmail.com"; // Amazon SES server, note "tls://" protocol
$mail->Port       =  465;                    // set the SMTP port
$mail->Username   = "buikhiem1994@gmail.com";  // SMTP  username
$mail->Password   = "khiemhaui";  // SMTP password
$mail->SetFrom($from, 'HELLO');
$mail->AddReplyTo($from,'Reply');
//$mail->Body= "kiểm tra email bạn nhé";
//$mail->AltBody = "Bạn sao vậy Tí";
$mail->Subject    = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->Send();   
}
?>
