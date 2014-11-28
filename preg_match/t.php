<?php

$str="ab#&123_*cde";

$arr = str_split($str);
//print_r($arr);
//echo strlen($str);

$p1 = "([a-zA-Z]{1})";
$p2 = "([^a-zA-Z]{1})";

foreach($arr as $k=>$v){
    //echo "k=>$k\tv=>$v\n";
    if(preg_match_all($p1,$v,$match)){
        $need_reverse[] = $v;
        $arr[$k] = "is_re";
    }else{
        $a2[] = array(
            "k"=>$k,
            "v"=>$v,
        );
    }
}
print_r($arr);
//exit;
foreach($arr as $k=>$v){
    if($v == "is_re"){
        $arr[$k] = array_pop($need_reverse);
    }
}
$str = implode("",$arr);
//print_r($arr);
echo $str;
//print_r($need_reverse);
//print_r($a2);
