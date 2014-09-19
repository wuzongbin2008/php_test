<?php
//修改xml的節點屬性值
$doc = new DOMDocument();
    $doc->load('pie.xml');

    //查找 pie 节点
    $root = $doc->getElementsByTagName('pie');

    //第一个 pie 节点
    $root = $root->item(0);

    //查找 pie 节点下的 slice 节点
    $slice = $root->getElementsByTagName('slice');

    
    //遍历所有 slice 节点
    foreach ($slice as $rootdata)
    {
		 foreach ($rootdata->attributes as $attrib)
		  {
			   $attribName = $attrib->nodeName; //nodeName为属性名称
			   $attribValue = $attrib->nodeValue; //nodeValue为属性内容
				
			   //查找属性名称为ip的节点内容
			   if ($attribName =='title')
			   {echo $server_array[$i]["name"];
					if (iconv("UTF-8","gb2312",$attribValue)==$server_array[$i]["name"])
					{
						 //修改文本
						 echo 'ok';
						 $tatoltime=floor($SUMTimeLengthALL/3600)."小时".date ("i分钟",$SUMTimeLengthALL);
						 $rootdata->setAttribute('descrīption',"ddf");
						 $rootdata->nodeValue=$SUMTimeLengthALL;
					}
					if (iconv("UTF-8","gb2312",$attribValue)=="默认天数")
					{
						 //另一个部分默认天数
						 echo 'ok2';  
						 $parttime1=floor($SUMTimeLength/3600)."小时".date ("i分钟",$SUMTimeLength);
						 $rootdata->setAttribute('descrīption',"bbb");
						 $rootdata->nodeValue=$SUMTimeLength;
					}         
					$doc->save('pie.xml');
			   }
		  }
    }
?> 