<html>
<head>
<title>POP before SMTP Test</title>
</head>

<body>

<pre>
<?php
  require_once('../class.phpmailer.php');
/*  require_once('class.pop3.php');

  $pop = new POP3();
  $pop->Authorise('pop3.example.com', 110, 30, 'mailer', 'password', 1);*/

  $mail = new PHPMailer();

  $mail->IsSMTP();
  $mail->SMTPDebug = 2;
  $mail->IsHTML(false);

  $mail->Host     = 'ssl://smtp.gmail.com';

  $mail->From     = 'wuzongbin2008@gmail.com';
  $mail->FromName = 'jet';

  $mail->Subject  =  'test gmail';
  $mail->Body     =  'Hello world';
  $mail->AddAddress('wuzongbin2008@163.com', 'wu jiang');

  if (!$mail->Send())
  {
    echo $mail->ErrorInfo;
  }
?>
</pre>

</body>
</html>
