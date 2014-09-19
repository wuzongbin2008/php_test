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


$Name = "jet618--2"; //senders name
$email = "wuzongbin1979@163.com"; //senders e-mail adress
$recipient = "wuzongbin2008@gmail.com"; //recipient(接受者)
$mail_body = "<table><tr><td>6月18日测试</td></tr><tr><td>6_18 The text for the mail...</td></tr></table>"; //mail body
$subject = "6月18日测试"; //subject
$header = "MIME-Version: 1.0\r\nContent-type: text/html; charset=utf-8\r\nFrom: ". $Name . " <" . $email . ">\r\n"; //optional(任选项) headerfields

  if(!mail($recipient, $subject, $mail_body, $header)) //mail command :)
  {
    echo "郵件送出失敗！ ";
    echo "錯誤訊息： " . $mail->ErrorInfo . " ";
    return false;
  }
  else
  {
	 mail("wuzongbin2008@163.com", $subject, $mail_body, $header);
     echo("寄信 $Name 給 $Name  < $recipient > 2完成！ ");
     return true;
  }
?>
