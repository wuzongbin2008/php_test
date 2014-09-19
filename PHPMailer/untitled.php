<?php
$to_address="wuzongbin2008@gmail.com";
$to_name="jet";
$subject="使用phpmailer發送郵件";
$body="使用phpmailer發送郵件也蠻辛苦的～";

send_mail($to_address, $to_name ,$subject, $body);

function send_mail($to_address, $to_name ,$subject, $body, $attach = "")
{
  //使用phpmailer發送郵件
  require_once("class.phpmailer.php");
  $mail = new PHPMailer();
  $mail->IsSMTP(); // set mailer to use SMTP
  $mail->CharSet = "big5";
  $mail->Encoding = "base64";
  $mail->From = "wuzongbin1979@gmail.com";
  $mail->FromName = "jet";

  $mail->Host ="ssl://smtp.gmail.com";//smtp.163.com';//ssl://smtp.gmail.com
  $mail->Port = 587; //default is 25, gmail is 465 or 587
  $mail->SMTPAuth = true;
  $mail->Username = "wuzongbin1979";
  $mail->Password = "19791231";

  $mail->addAddress($to_address, $to_name);
  $mail->WordWrap = 50;
  if (!empty($attach))
  $mail->AddAttachment($attach);
  $mail->IsHTML(false);
  $mail->Subject = $subject;
  $mail->Body = $body;

  if(!$mail->Send())
  {
    echo "郵件送出失敗！ ";
    echo "錯誤訊息： " . $mail->ErrorInfo . " ";
    return false;
  }
  else
  {
    echo("寄信 $attach 給 $to_name <$to_address> 完成！ ");
    return true;
  }
}
?>
