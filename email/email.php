<?php
class email
{
	function send_mail($to,$subject,$message,$from,$from_name,$mailformat=1)
	{
		if(function_exists('mail'))
		{
		
			$headers = 'From: '.$from_name.'<'.$from.'>'."\r\n";
			$headers .= 'TO: '.$to."\r\n";
			
			if($mailformat)
			{
			   $headers .="Content-Type: text/html;\r\n";
			}
			else
			{
			   $headers .="Content-Type: text/plain;\r\n";
			}
			$headers .="charset=gb2312\r\n\r\n";
			
			
			$message = str_replace("\r", '', $message);
			
			$mail_return=@mail($to, str_replace("\n",' ',$subject), $message,$headers);
			
			if(!$mail_return)
			{
			   return $to.'发送不成功';
			}
			
			return 1;
		}
	}

	function send_win32_mail($to,$subject,$message,$from,$from_name,$host,$port,$mailformat=1)
	{
		ini_set('SMTP', $host);
		ini_set('smtp_port', $port);
		ini_set('sendmail_from', $from);
		
		$headers = 'From: '.$from_name.'<'.$from.'>'."\r\n";
		$headers .= 'TO: '.$to."\r\n";
		
		if($mailformat)
		{
		   $headers .="Content-Type: text/html;\r\n";
		}
		else
		{
			$headers .="Content-Type: text/plain;\r\n";
		}
		$headers .="charset=gb2312\r\n\r\n";
		
		foreach(explode(',', $to) as $touser)
		{
			$touser = trim($touser);
			if($touser)
			{
				$mail_return=@mail($touser, $subject, $message, $headers);
				if(!$mail_return)
				{
				   return $touser.'发送不成功';
				}
			}
		}
		return 1;
	}
}

$e=new email();
$a=$e->send_mail("wuzongbin2008@163.com","test","tset","wuzongbin1979@163.com","jet",$mailformat=1);
echo $a;
?>