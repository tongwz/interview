<?php

// 2025年1月15日20:34:28 快速排序
// 思路：每次选择数组第一个index 的值做基准 左侧是小数据 右侧是大数据最后通过递归得到最终的数据
$arr = [1, 3, 2, 9, 6, 5, 8, 7];
var_dump(quickSort($arr));
echo "\n";

function quickSort(array $arr) : array
{
    $len = count($arr);
    if ($len <= 1) return $arr;
    $pi = $arr[0];
    $left = $right = [];
    foreach ($arr as $k =>$v) {
        if ($k == 0) continue;
        if ($v < $pi) {
            $left[] = $v;
        } else {
            $right[] = $v;
        }
    }
    return array_merge(quickSort($left), [$pi], quickSort($right));
}
