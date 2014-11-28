<?php 
//strtok()�O�q�@�Ӧr�Ŧꤤ����Ĥ@�ӥH�S�w�r�Ŧꬰ���Ϊ��r�Ŧ�A���Q�}�a�C 
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
var_dump($a);exit;
while ($a) 
{
    echo "Word=$a<br>";
    $a = strtok(" \\");
}
?>
