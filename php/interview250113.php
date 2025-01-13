<?php

/**
 * 2025年1月13日23:28:03
 * 原题目网址：https://github.com/NB-KMC/interview-php
 */
class Main
{
    // 2025年1月13日22:59:19 twz
    public function test(float $length, float $width, float $height, float $weight): array
    {
        // 获得顺序 [$maxL, $midL, $minL]
        $sortArr = $this->getSortB($length, $width, $height);
        // 获取体积重
        $volumeWeight = $this->getVolumeWeight($sortArr[0], $sortArr[1], $sortArr[2]);
        // 获取实重量
        $realWeight = $this->getRealWeight($weight, $volumeWeight);
        // getWC
        $wc = $this->getWC($sortArr[0], $sortArr[1], $sortArr[2]);
        $outSpace = $this->outSpace($sortArr, $realWeight, $wc);
        if (!empty($outSpace)) return [$outSpace];
        $overSize = $this->overSize($sortArr);
        if (!empty($overSize)) return [$overSize];
        return $this->ahs($sortArr, $realWeight, $wc);
    }

    // 后去最长 次长 第三边长
    private function getSortB(float $length, float $width, float $height): array
    {
        $arr = [$length, $width, $height];
        rsort($arr);
        // 转换单位为英寸 向上取整
        return array_map(fn($v) => ceil($v / 2.54), $arr);
    }

    // 获取围长 - 单位英寸
    private function getWC(float $maxL, float $midL, float $minL): float
    {
        return $maxL + ($midL + $minL) * 2;
    }

    // 获取体积重
    private function getVolumeWeight(float $maxL, float $midL, float $minL): float
    {
        return ceil($maxL * $midL * $minL / 250);
    }

    // 获取实重量 = 产品重量（LB）和体积重之间取最大值
    private function getRealWeight(float $weight, float $volumeWeight): float
    {
        // 重量 按磅为单位
        $weightLB = ceil($weight / 0.454);
        return max($weightLB, $volumeWeight);
    }

    // OUT_SPACE
    private function outSpace(array $sortL, float $realWeight, float $wc): string
    {
        if ($realWeight > 150) {
            return "OUT_SPACE";
        }
        if ($sortL[0] > 108) {
            return "OUT_SPACE";
        }
        if ($wc > 165) {
            return "OUT_SPACE";
        }
        return "";
    }

    // OVERSIZE
    private function overSize(array $sortL): string
    {
        $wc = $this->getWC($sortL[0], $sortL[1], $sortL[2]);
        if ($wc > 130 && $wc <= 165) {
            return "OVERSIZE";
        }
        if ($sortL[0] >= 96 && $sortL[0] < 108) {
            return "OVERSIZE";
        }
        return "";
    }

    // AHS
    private function ahs(array $sortL, float $realWeight, float $wc): array
    {
        $res = [];
        if ($realWeight > 50 && $realWeight <= 150) {
            $res[] = "AHS-WEIGHT";
        }
        $wc = $this->getWC($sortL[0], $sortL[1], $sortL[2]);
        if ($wc > 105 || ($sortL[0] >= 48 && $sortL[0] < 108) || $sortL[1] >= 30) {
            $res[] = "AHS-SIZE";
        }

        return $res;
    }
}

$obj = new Main();
//var_dump($obj->getSortB(68, 70, 60));

var_dump($obj->test(68, 70, 60, 23));
var_dump($obj->test(114.50, 42, 26, 47.5));
var_dump($obj->test(162, 60, 11, 14));
var_dump($obj->test(113, 64, 42.5, 35.85));
var_dump($obj->test(114.5, 17, 51.5, 16.5));
