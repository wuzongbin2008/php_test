<?
$dom=new DOMDocument('1.0');
$dom->load('a.xml');

$userid=$dom->getElementsByTagName('userid');

foreach($userid as $b)
{
	foreach($b->attributes as $attr)
	{
		$name=$attr->nodeName;
		$value=$attr->nodeValue;
        echo $name."<br>";
		
		if($name=='ip')
		{
			if($value=='aaa')
			{
			   $b->setAttribute('ip','j');
			   $dom->save('a.xml');
			}
		}
	}

}
?>