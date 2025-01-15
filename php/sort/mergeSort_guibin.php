<?php

// 2025年1月15日20:04:29 归并排序
// 思路：先通过递归拿到最小的左右数组都是左右中分，之后将左侧数组进行从小到大的排序，右侧也同样操作跟选择排序有点儿像

$arr = [1, 3, 2, 9, 6, 5, 8, 7];
var_dump(mergeSort($arr));
echo "<br>";
function mergeSort(array $arr): array
{
    $len = count($arr);
    if ($len <= 1) {
        return $arr;
    }
    $mid = intval($len / 2);
    $left = array_slice($arr, 0, $mid);
    $right = array_slice($arr, $mid);
    $left = mergeSort($left);
    $right = mergeSort($right);
    return merge($left, $right);
}

function merge(array $left, array $right): array
{
    $cl = count($left);
    $cr = count($right);
    $arr = [];
    $l = $r = 0;
    while ($l < $cl && $r < $cr) {
        if ($left[$l] < $right[$r]) {
            $arr[] = $left[$l];
            $l++;
        } else {
            $arr[] = $right[$r];
            $r++;
        }
    }
    while ($l < $cl) {
        $arr[] = $left[$l];
        $l++;
    }
    while ($r < $cr) {
        $arr[] = $right[$r];
        $r++;
    }
    return $arr;
}

