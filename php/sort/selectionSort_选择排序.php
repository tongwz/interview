<?php


// 2025年1月15日21:47:46 选择排序
// 思路：每次找到当前能找到的最小值 放到循环i的index上 进行重新排序
$arr = [1, 3, 2, 9, 6, 5, 8, 7];
var_dump(selectionSort($arr));
echo "\n";
function selectionSort(array $arr): array
{
    $len = count($arr);
    for ($i = 0; $i < $len - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $len; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }
        $tmp = $arr[$i];
        $arr[$i] = $arr[$minIndex];
        $arr[$minIndex] = $tmp;
    }
    return $arr;
}
