<?php
$subject = "=?UTF-8?B?".base64_encode("明星聊天室送禮訂單")."?=";
		$FromName="Eros";
		$From="eros@ek21.com";

		$headers ="MIME-Version: 1.0\r\n";
		$headers.="From: ".$FromName." <".$From.">\r\n";
        $headers.='To: eros<mkt@ek21.com>, eros<service@ek21.com>' . "\r\n";
		$headers.="Reply-To: ".$FromName." <".$From.">\r\n";
		$headers.="X-Priority: 1\n";
		$headers.="X-MSMail-Priority: High\r\n";
		$headers.="X-Mailer: =?utf-8?B?".base64_encode("明星聊天室送禮訂單")."?=\r\n";
		$headers.="Content-Type: text/html;\n\tcharset=\"utf-8\"\r\n";
		$headers.="Content-Transfer-Encoding: base64\r\n";
		
        $mesg_body="姓名：$_POST[name]<br>暱稱：$_POST[nickname]<br>地址：$_POST[address]<br>市話：$_POST[tel]<br>手機：$_POST[mobile]<br>Email:$_POST[email]<br>留言：$_POST[message]";

$mesg_body=chunk_split(base64_encode($mesg_body));
//mail("mkt@ek21.com,service@ek21.com",$subject,$mesg_body,$headers);
if(mail("wuzongbin2008@163.com,wuzongbin2008@gmail.com",$subject,$mesg_body,$headers))
{
   echo "aa";
}
?>