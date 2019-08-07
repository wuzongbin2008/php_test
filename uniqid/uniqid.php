<?php

//echo "ID".date('Ymd').substr(implode(NULL, array_map('ord',
//str_split(substr(uniqid(), 7, 13), 1))), 0, 8);

for($i = 0; $i < 20; $i++) {
    //echo uniqid(), PHP_EOL;
    //sleep(1);
    echo md5(microtime()), PHP_EOL;
}
