<?php
$obj = new Code();
$card_no = $obj->encodeID(1898882,7);
var_dump($card_no);
$n = $obj->decodeID($card_no);
var_dump($n);

/**
 * 原文：https://www.cnblogs.com/yhdsir/p/5288468.html
 */
class Code {

    //密码字典
    private $dic = array(

        0=>'0',    1=>'1', 2=>'2', 3=>'3', 4=>'4', 5=>'5', 6=>'6', 7=>'7', 8=>'8',

        9=>'9', 10=>'A',  11=>'B', 12=>'C', 13=>'D', 14=>'E', 15=>'F',  16=>'G',  17=>'H',

        18=>'I',19=>'J',  20=>'K', 21=>'L',  22=>'M',  23=>'N', 24=>'O', 25=>'P', 26=>'Q',

        27=>'R',28=>'S',  29=>'T',  30=>'U', 31=>'V',  32=>'W',  33=>'X', 34=>'Y', 35=>'Z'

    );

    /**
     * 将数字($number)转换成$format位的36进制编号
     * @param int $number         需要转换的数字
     * @param int $format   位数长度
     * @return string
     */
    public function encodeID($int, $format=8)
    {
        $dics = $this->dic;
        $dnum = 36; //进制数
        $arr = array ();
        $loop = true;
        while ($loop) {
            $arr[] = $dics[bcmod($int, $dnum)];
            $int = bcdiv($int, $dnum, 0);
            if ($int == '0') {
                $loop = false;
            }
        }

        if (count($arr) < $format) {
            $arr = array_pad($arr, $format, $dics[0]);
        }

        return implode('', array_reverse($arr));
    }

    public function decodeID($ids)
    {
        $dics = $this->dic;
        $dnum = 36; //进制数
        //键值交换
        $dedic = array_flip($dics);
        //去零
        $id = ltrim($ids, $dics[0]);
        //反转
        $id = strrev($id);
        $v = 0;
        for ($i = 0, $j = strlen($id); $i < $j; $i++)
        {
            $v = bcadd(bcmul($dedic[$id { $i }], bcpow($dnum, $i, 0), 0), $v, 0);
        }

        return $v;

    }
}