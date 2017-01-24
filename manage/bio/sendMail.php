<?php

include './common/phpmailer.php';
$mail = new PHPMailer();
//$mail->IsSMTP();
$body = $mail->getFile('Email.htm');

$body = eregi_replace("&name;", "biotecitalia thai", $body);
$body = eregi_replace("&mseeage;", "ทดสอบส่งข้อความสำหรับทดสอบเซอร์เวอร์และทดสอบฟังชันส่งเมล์ของระบบ", $body);

$mail->Host = "cpanel01wh.bkk1.cloud.z.com";
$mail->Hostname = "biotecitalia-thailand.com";
$mail->Port = 25;
$mail->CharSet = 'utf-8';
$mail->From = "info@biotecitalia-thailand.com";
$mail->FromName = "(TEST) BiotecItalia Thailand";
$mail->Subject = "(TEST) BiotecItalia Thailand";
$mail->MsgHTML($body);
$mail->AddAddress("natdanaimon@gmail.com");
$mailcommit = $mail->Send();



if (!$mailcommit) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
sleep(1);
