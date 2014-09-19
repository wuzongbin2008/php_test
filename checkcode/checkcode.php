<?php
session_start();
$_SESSION['code'] = $authnum = rand(100000,999999);
header("Content-type: image/PNG"); 
srand((double)microtime()*1000000); 
$im = imagecreate(72,20); 
$gray = imagecolorallocate($im, 500,250,100); 
$white = imagecolorallocate($im, 355,355,355); 
$black = imagecolorallocate($im, 0,0,0); 
imagefill($im,68,30,$gray); 
//while(($authnum=rand()%100000)<10000);

//将四位整数验证码绘入图片 
imagestring($im, 5, 10, 3, $authnum, $white); 
for($i=0;$i<100;$i++) //加入干扰象素 
{ 
$randcolor = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255)); 
imagesetpixel($im, rand()%70 , rand()%30 , $randcolor); 
} 
imagepng($im); 
imagedestroy($im);
?>