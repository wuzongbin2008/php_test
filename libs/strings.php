<?php
	function Substrs($string, $sublen, $start = 0, $code = 'UTF-8') 
	{
		if($code == 'UTF-8')
		{
			$pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
			preg_match_all($pa, $string, $t_string);
			if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen))."...";
			return join('', array_slice($t_string[0], $start, $sublen));
		}
		else
		{
			$start = $start*2;
			$sublen = $sublen*2;
			$strlen = strlen($string);
			$tmpstr = '';
			for($i=0; $i<$strlen; $i++)
			{
				if($i>=$start && $i<($start+$sublen))
				{
					if(ord(substr($string, $i, 1))>129) $tmpstr.= substr($string, $i, 2);
					else $tmpstr.= substr($string, $i, 1);
				} 
				if(ord(substr($string, $i, 1))>129) $i++;
			}
			if(strlen($tmpstr)<$strlen ) $tmpstr.= "...";
			return $tmpstr;
		}
	}	
	function Random_Password($length)
	{
        srand(date("s"));
        $possible_charactors = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
        $string = "";
        while(strlen($string)<$length) 
		{
           $string .= substr($possible_charactors,(rand()%(strlen($possible_charactors))),1);
        }
        return($string);
    }
	
	function str($str)
	{
		return str_replace('"','&#34;',str_replace("'",'&#39;',$str));
	}
	
	function fstr($str="")
	{
		return nl2br(str_replace("  "," &nbsp;",$str));
	}
	
	function rfstr($str="")
	{
		return str_replace("&nbsp;"," ",strip_tags($str));
	}
	
	function htmlSelect($o_name,$arr,$selected)
	{
		print '<select id="'.$o_name.'" name="'.$o_name.'>';
		foreach ($arr as $key => $val)
			echo '<option value="'.$key.'" '.(($selected == $key)? 'selected' : '').'>'.$val;
		print '</select>';
	}
	
	function htmlRadio($o_name,$arr,$selected)
	{
		foreach ($arr as $key => $val)
			echo '<input name="'.$o_name.'" id="'.$o_name.'" type="radio" value="'.$key.'" '.(($selected == $key)? 'checked' : '').'>'.$val.' ';
	}
	
	function htmlCheckbox($o_name,$arr,$selected)
	{
		foreach ($arr as $key => $val)
			echo '<input  name="'.$o_name.'[]"  id="'.$o_name.'" type="checkbox" value="'.$key.'" '.((in_array($key,$selected))? 'checked' : '').'>'.$val.' ';
	}
	function download($_file)
	{
		$file = fopen($_file,'r');
		Header('Content-type: application/octet-stream');
		Header('Accept-Ranges: bytes');
		Header('Accept-Length: '.filesize($_file));
		Header('Content-Disposition: attachment; filename=' . basename($_file));
		echo fread($file,filesize($_file));
		fclose($file);
	}
?>