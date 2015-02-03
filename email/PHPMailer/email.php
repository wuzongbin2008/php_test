<?php
$to_address="renping@hisensen.com";
$to_name="任平";
$subject="青岛晚报寻梦园网络相亲";
$body="phpmailer";

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
  $mail->Port = 465; //default is 25, gmail is 465 or 587
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
    echo "failed no no ！ ";
    echo "missing： " . $mail->ErrorInfo . " ";
    return false;
  }
  else
  {
    echo("寄信 $attach 給 $to_name <$to_address> 完成！ ");
    return true;
  }
}
?>
