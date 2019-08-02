<?php 
require_once('../init.inc.php');
usdb('common');
uslib('xml');

$obj=new Common("rock");
$mp=$obj->getSign(" and uniqid=1");//$_GET[uniqid]

$filename ="playlist.xml";

$xml='<?xml version="1.0" encoding="UTF-8" ?><playlist version="1" xmlns="http://xspf.org/ns/0/"><title>Sample XSPF Playlist</title><info>http://www.jeroenwijering.com/?item=Flash_MP3_Player</info><trackList><track><annotation>rock</annotation><location>'.$mp['Link'].'</location><info>http://www.jeroenwijering.com/?item=Flash_MP3_Player</info><image>mp3/cover.jpg</image></track></trackList></playlist>';

	// 在这个例子里，我们将使用添加模式打开$filename，
	// 因此，文件指针将会在文件的开头，
	// 那就是当我们使用fwrite()的时候，$somecontent将要写入的地方。
	  if (!$handle = fopen($filename, 'w+')) {
         print "不能打开文件 $filename";
         exit;
    }

    // 将$somecontent写入到我们打开的文件中。
    if (!fwrite($handle, $xml)) {
        print "不能写入到文件 $filename";
        exit;
    }

    fclose($handle);
?>
<!--<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Copyright" content="懒人图库 http://lanren.makewing.com/" />
<meta name="description" content="学会偷懒，并懒出境界是提高工作效率最有效的方法！" />
<meta content="懒人图库" name="keywords" />
<title>電音搖滾音樂大賽</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}

</style>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<table width="761" height="529" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle" background="mp3/chat_bg.jpg"><table width="37%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="333" align="center" valign="middle" bgcolor="#FFFFFF"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','250','height','300','src','mp3player','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','mp3player' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="250" height="300">
          <param name="movie" value="mp3player.swf">
          <param name="quality" value="high">
          <embed src="mp3player.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="250" height="300"></embed>
        </object></noscript></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
-->