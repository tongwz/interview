<?php

// 2025年1月15日22:18:36 插入排序
// 思路：是一种简单直观的排序算法。它的工作原理是通过构建有序序列，对于未排序数据，在已排序序列中从后向前扫描，找到相应位置并插入。
$arr = [1, 3, 2, 9, 6, 5, 8, 7];
var_dump(insertionSort($arr));
echo "\n";

function insertionSort(array $arr): array
{
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        $v = $arr[$i];
        $j = $i - 1;
        while ($j >= 0 && $arr[$j] > $v) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }
        $arr[$j + 1] = $v;
    }
    return $arr;
}