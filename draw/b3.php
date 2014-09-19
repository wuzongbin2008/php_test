<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
//公用函数部分 

//把角度转换为弧度 
function deg2Arc($degrees) { 
return($degrees * (pi()/180.0)); 
} 

//RGB 
function getRGB($color){ 
$R=($color>>16) & 0xff; 
$G=($color>>8) & 0xff; 
$B=($color) & 0xff; 
return (array($R,$G,$B)); 
} 

// 取得在椭圆心为（0，0）的椭圆上 x,y点的值 
function pie_point($deg,$va,$vb){ 
$x= cos(deg2Arc($deg)) * $va; 
$y= sin(deg2Arc($deg)) * $vb; 
return (array($x, $y)); 
} 


//3D饼图类 

class Pie3d{ 

var $a; //椭圆长半轴 
var $b; //椭圆短半轴 
var $DataArray; //每个扇形的数据 
var $ColorArray; //每个扇形的颜色 要求按照十六进制书写但前面不加0x 
var $Fize; //字体大小 
//为边缘及阴影为黑色 

function Pie3d($pa=60,$pb=30,$sData="100,200,300,400,500", $sColor="ee00ff,dd0000,cccccc,ccff00,00ccff",$fontsize=1) { 
$this->a=$pa; 
$this->b=$pb; 
$this->DataArray=split(",",$sData); 
$this->ColorArray=split(",",$sColor); 
$this->Fsize=$fontsize; 
} 

function setA($v){ 
$this->a=$v; 
} 

function getA(){ 
return $this->a; 
} 

function setB($v){ 
$this->b=$v; 
} 

function getB(){ 
return $this->b; 
} 

function setDataArray($v){ 
$this->DataArray=split(",",$v); 
} 

function getDataArray($v){ 
return $this->DataArray; 
} 

function setColorArray($v){ 
$this->ColorArray=split(",",$v); 
} 

function getColorArray(){ 
return $this->ColorArray; 
} 


function DrawPie(){ 
$fsize=$this->Fsize; 
$image=imagecreate($this->a*2+40,$this->b*2+40); 
$PieCenterX=$this->a+10; 
$PieCenterY=$this->b+10; 
$DoubleA=$this->a*2; 
$DoubleB=$this->b*2; 
list($R,$G,$B)=getRGB(0); 
$colorBorder=imagecolorallocate($image,$R,$G,$B); 
$DataNumber=count($this->DataArray); 

//$DataTotal 
for($i=0;$i<$DataNumber;$i++) $DataTotal+=$this->DataArray[$i]; //算出数据和 

//填充背景 
imagefill($image, 0, 0, imagecolorallocate($image, 255, 255, 255)); 

/* 
** 画每一个扇形 
*/ 

$Degrees = 0; 
for ($i = 0; $i < $DataNumber; $i++) { 
$StartDegrees = round($Degrees); 
$Degrees += (($this->DataArray[$i]/$DataTotal)*360); 
$EndDegrees = round($Degrees); 
$percent = number_format($this->DataArray[$i]/$DataTotal*100, 1); 
list($R,$G,$B)=getRGB(hexdec($this->ColorArray[$i])); 
$CurrentColor=imagecolorallocate($image,$R,$G,$B); 
if ($R>60 and $R<256) $R=$R-60; 
if ($G>60 and $G<256) $G=$G-60; 
if ($B>60 and $B<256) $B=$B-60; 
$CurrentDarkColor=imagecolorallocate($image,$R,$G,$B); 

//画扇形弧 
imagearc($image,$PieCenterX,$PieCenterY,$DoubleA,$DoubleB,$StartDegrees,$EndDegrees,$CurrentColor); 

//画直线 
list($ArcX, $ArcY) = pie_point($StartDegrees , $this->a , $this->b); 
imageline($image,$PieCenterX,$PieCenterY,floor($PieCenterX + $ArcX),floor($PieCenterY + $ArcY),$CurrentColor); 

//画直线 
list($ArcX, $ArcY) = pie_point($EndDegrees,$this->a , $this->b); 
imageline($image,$PieCenterX,$PieCenterY,ceil($PieCenterX + $ArcX),ceil($PieCenterY + $ArcY),$CurrentColor); 

//填充扇形 
$MidPoint = round((($EndDegrees - $StartDegrees)/2) + $StartDegrees); 
list($ArcX, $ArcY) = Pie_point($MidPoint, $this->a*3/4 , $this->b*3/4); 

imagefilltoborder($image,floor($PieCenterX + $ArcX),floor($PieCenterY + $ArcY),$CurrentColor,$CurrentColor); 
imagestring($image,$fsize,floor($PieCenterX + $ArcX-5),floor($PieCenterY + $ArcY-5),$percent."%",$colorBorder); 

//画阴影 
if ($StartDegrees>=0 and $StartDegrees<=180){ 
if($EndDegrees<=180){ 
for($k = 1; $k < 15; $k++) 
imagearc($image,$PieCenterX, $PieCenterY+$k,$DoubleA, $DoubleB, $StartDegrees, $EndDegrees, $CurrentDarkColor); 
}else{ 
for($k = 1; $k < 15; $k++) 
imagearc($image,$PieCenterX, $PieCenterY+$k,$DoubleA, $DoubleB, $StartDegrees, 180, $CurrentDarkColor); 
} 
} 
} 

//输出生成的图片 
imagepng($image,'consture.png'); 
imagedestroy($image); 
}//End drawPie() 
}//End class 
$pie = new Pie3d; 
$pie->Pie3d($pa=100,$pb=50,$sData="100,200,300,400,500", $sColor="ee00ff,dd0000,cccccc,ccff00,ddddaa",$fontsize=2); 
$pie->DrawPie(); 
echo '<img src="consture.png" border=0 alt="交易分析图">'; 

?>
