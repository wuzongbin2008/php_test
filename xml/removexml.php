<?
$dom=new DOMDocument('1.0');
$dom->load('a.xml');

$Root = $dom->documentElement;
$userid=$dom->getElementsByTagName('userid');

//查询用户选择删除的留言记录
/*$xpath = new DOMXPath(&$dom);
$Node_Record= $xpath->query("//online[userid=t]");
$Root->removeChild($Node_Record->item(0));
$dom->save("a.xml");*/
		  
foreach($userid as $b)
{
    if($b->nodeValue=='t')
	{
	     $Root->removeChild($b);
		 $dom->save("a.xml");
	}
}
?>