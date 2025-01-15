<?php

// 2025年1月15日20:25:48 翻转数组
$arr = [1, 3, 2, 9, 6, 5, 8, 7];
var_dump(reverse($arr));
echo "<br>";

function reverse(array $arr): array
{
    $len = count($arr);
    if ($len <= 1) {
        return $arr;
    }
    $stop = intval($len / 2);
    for ($i = 0; $i < $stop; $i++) {
        $tmp = $arr[$i];
        $arr[$i] = $arr[$len - $i - 1];
        $arr[$len-$i-1] = $tmp;
    }
    return $arr;
}
