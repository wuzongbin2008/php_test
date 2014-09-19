<?php
//--------------------------
    // 压缩打包类
    class PHPZip
	{
        var $out='';
        function PHPZip($dir)
		{
            if (@function_exists('gzcompress'))    
			{
                $curdir = getcwd();
                if (is_array($dir)) $filelist = $dir;
                else{
                    $filelist=$this -> GetFileList($dir);//文件列表
                    foreach($filelist as $k=>$v) $filelist[]=substr($v,strlen($dir)+1);
                }
                if ((!empty($dir))&&(!is_array($dir))&&(file_exists($dir))) chdir($dir);
                else chdir($curdir);
                if (count($filelist)>0){
                    foreach($filelist as $filename){
                        if (is_file($filename)){
                            $fd = fopen ($filename, "r");
                            $content = @fread ($fd, filesize ($filename));
                            fclose ($fd);
                            if (is_array($dir)) $filename = basename($filename);
                            $this -> addFile($content, $filename);
                        }
                    }
                    $this->out = $this -> file();
                    chdir($curdir);
                }
                return 1;
            }
            else return 0;
        }

        // 获得指定目录文件列表
        function GetFileList($dir)
		{
            static $a;
            if (is_dir($dir)) 
			{
                if ($dh = opendir($dir)) 
				{
                       while (($file = readdir($dh)) !== false) 
					   {
                        if($file!='.' && $file!='..')
						{
                            $f=$dir .'/'. $file;
                            if(is_dir($f)) $this->GetFileList($f);
                            $a[]=$f;
                        }
                    }
                     closedir($dh);
                }
            }
            return $a;
        }

        var $datasec      = array();
        var $ctrl_dir     = array();
        var $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";
        var $old_offset   = 0;

        function unix2DosTime($unixtime = 0) {
            $timearray = ($unixtime == 0) ? getdate() : getdate($unixtime);
            if ($timearray['year'] < 1980) {
                $timearray['year']    = 1980;
                $timearray['mon']     = 1;
                $timearray['mday']    = 1;
                $timearray['hours']   = 0;
                $timearray['minutes'] = 0;
                $timearray['seconds'] = 0;
            } // end if
            return (($timearray['year'] - 1980) << 25) | ($timearray['mon'] << 21) | ($timearray['mday'] << 16) |
                    ($timearray['hours'] << 11) | ($timearray['minutes'] << 5) | ($timearray['seconds'] >> 1);
        }

        function addFile($data, $name, $time = 0) {
            $name     = str_replace('\\', '/', $name);

            $dtime    = dechex($this->unix2DosTime($time));
            $hexdtime = '\x' . $dtime[6] . $dtime[7]
                      . '\x' . $dtime[4] . $dtime[5]
                      . '\x' . $dtime[2] . $dtime[3]
                      . '\x' . $dtime[0] . $dtime[1];
            eval('$hexdtime = "' . $hexdtime . '";');
            $fr   = "\x50\x4b\x03\x04";
            $fr   .= "\x14\x00";
            $fr   .= "\x00\x00";
            $fr   .= "\x08\x00";
            $fr   .= $hexdtime;

            $unc_len = strlen($data);
            $crc     = crc32($data);
            $zdata   = gzcompress($data);
            $c_len   = strlen($zdata);
            $zdata   = substr(substr($zdata, 0, strlen($zdata) - 4), 2);
            $fr      .= pack('V', $crc);
            $fr      .= pack('V', $c_len);
            $fr      .= pack('V', $unc_len);
            $fr      .= pack('v', strlen($name));
            $fr      .= pack('v', 0);
            $fr      .= $name;

            $fr .= $zdata;

            $fr .= pack('V', $crc);
            $fr .= pack('V', $c_len);
            $fr .= pack('V', $unc_len);

            $this -> datasec[] = $fr;
            $new_offset        = strlen(implode('', $this->datasec));

            $cdrec = "\x50\x4b\x01\x02";
            $cdrec .= "\x00\x00";
            $cdrec .= "\x14\x00";
            $cdrec .= "\x00\x00";
            $cdrec .= "\x08\x00";
            $cdrec .= $hexdtime;
            $cdrec .= pack('V', $crc);
            $cdrec .= pack('V', $c_len);
            $cdrec .= pack('V', $unc_len);
            $cdrec .= pack('v', strlen($name) );
            $cdrec .= pack('v', 0 );
            $cdrec .= pack('v', 0 );
            $cdrec .= pack('v', 0 );
            $cdrec .= pack('v', 0 );
            $cdrec .= pack('V', 32 );
            $cdrec .= pack('V', $this -> old_offset );
            $this -> old_offset = $new_offset;
            $cdrec .= $name;

            $this -> ctrl_dir[] = $cdrec;
        }

        function file() {
            $data    = implode('', $this -> datasec);
            $ctrldir = implode('', $this -> ctrl_dir);
            return
                $data .
                $ctrldir .
                $this -> eof_ctrl_dir .
                pack('v', sizeof($this -> ctrl_dir)) .
                pack('v', sizeof($this -> ctrl_dir)) .
                pack('V', strlen($ctrldir)) .
                pack('V', strlen($data)) .
                "\x00\x00";
        }
    }

?>

下面是例子:

//$dl为文件列表数组,做的时候,自己只要给这个赋值就行了..还是很简单的吧..

<?php
require "include/zip.php";

    $dfiles="";
    foreach ($dl AS $filepath) 
	{
        $dfiles.=$filepath.",";
    }
    $dfiles=substr($dfiles,0,strlen($dfiles)-1);
    $dl=explode(",",$dfiles);
    $zip=new PHPZip($dl);
    $code=$zip->out;
    header("Content-type: application/octet-stream");
    header("Accept-Ranges: bytes");
    header("Accept-Length: ".strlen($code));
    header("Content-Disposition: attachment;filename=".$_SERVER['HTTP_HOST']."_Files.rar");

    echo $code;   
    exit;
?>
