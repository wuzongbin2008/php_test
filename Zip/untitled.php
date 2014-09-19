<?php
/*下面是例子:

$dl为文件列表数组,做的时候,自己只要给这个赋值就行了..还是很简单的吧..*/

    require "phpzip.php";
/*    $dfiles="";
    foreach ($dl AS $filepath) {
        $dfiles.=$filepath.",";
    }
    $dfiles=substr($dfiles,0,strlen($dfiles)-1);
    $dl=explode(",",$dfiles);*/
	$dl='../random';
    $zip=new PHPZip($dl);
    $code=$zip->out;
	
    $zip->GetFileList($dl);
   // print_r($zip->GetFileList($dl));
	 set_time_limit(60);
	 ini_set("memory_limit","10M");
	 
	// 在这个例子里，我们将使用添加模式打开$filename，
    // 因此，文件指针将会在文件的开头，
    // 那就是当我们使用fwrite()的时候，$somecontent将要写入的地方。
	if(!file_exists("aa"))
	{
	   mkdir ("aa", 0700);
	}
	
	$filename='aa/test.rar';
    if (!$handle = fopen($filename, 'w+')) {
         print "不能打开文件 $filename";
         exit;
    }

    // 将$code写入到我们打开的文件中。
    if (!fwrite($handle, $code)) {
        print "不能写入到文件 $filename";
        exit;
     }
	 fclose($handle);
	 
	 $_file =$filename;// $_GET['file'];
	 $file = fopen($_file,"r");

	 header("Content-type: application/octet-stream");//application/zip
	 header("Pragma: no-cache");
	 header("Cache-Control: cache, must-revalidate");
	 header("Expires: 0");
	 header("Accept-Ranges: bytes");
	 header("Accept-Length: ".filesize($_file));
	 header("Content-Disposition: attachment; filename=" . basename($_file));
	 print fread($file,filesize($_file));
	 fclose($file); 
	  
/*	 header("Content-type: application/octet-stream");//application/zip
     header("Accept-Ranges: bytes");
	 header("Accept-Length: ".filesize($_file));
    // header("Accept-Length: ".strlen($code));
     header("Content-Disposition: attachment;filename=test.rar");*/
	 
	
	 
	 //print fread($file,filesize($_file));
	// echo basename($_file);
	

    
    exit;
?>