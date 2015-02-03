<?php

  //使用phpmailer發送郵件
/*  $to_address="wuzongbin2008@gmail.com";
  $to_name="jet2";
  $subject="mail test";
  $body="mail test";

  if(!mail($to_address, $subject, $body,""))
  {
    echo "郵件送出失敗！ ";
    echo "錯誤訊息： " . $mail->ErrorInfo . " ";
    return false;
  }
  else
  {
    echo("寄信 $attach 給 $to_name <$to_address> 完成！ ");
    return true;
  }*/


$Name ="=?UTF-8?B?".base64_encode("青岛寻梦园")."?="; //senders name
$email = "loveros@163.com"; //senders e-mail adress
//$recipient = "wuzongbin2008@gmail.com"; //recipient(接受者)
$recipient = "wuzongbin2008@gmail.com"; //recipient(接受者)
$mail_body = "<table><tr><td>地方的是方式的</td></tr><tr><td>的释放的是发是地方倒是...</td></tr></table>"; //mail body
$subject = '密码确认';
$subject = "=?UTF-8?B?".base64_encode($subject)."?=";
$header = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\nFrom: ". $Name . " <" . $email . ">\r\n"; 

  if(mail($recipient, $subject, $mail_body, $header)) //mail command :)
  { 
     echo("寄信 达达 給啊啊青   <$recipient> 完成！ ");
     return true;
  }
  else
  {
    echo "郵件送出失敗！ ";
    echo "錯誤訊息： " . $mail->ErrorInfo . " ";
    return false;
  }
?>
