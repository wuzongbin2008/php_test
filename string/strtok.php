<?php 
//strtok()是從一個字符串中提取第一個以特定字符串為分割的字符串，原串被破壞。 
$string = "This is\tan example\nstring";
/* Use tab and newline as tokenizing characters as well  */
$tok = strtok($string," \n\t");
//echo $tok;
//print_r($tok);

/*while ($tok) 
{
    echo "Word=$tok<br>";
    $tok = strtok(" \n\t");
}*/

$s='\aa\bb\cc';
$a=strtok($s,'\\');
//echo $a;
while ($a) 
{
    echo "Word=$a<br>";
    $a = strtok(" \\");
}
?>
