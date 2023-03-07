<?php

namespace App\Helpers;

class ArrayHelper
{
    public static function compareStrings($a, $b, $key) {
        if (strtolower($a[$key]) < strtolower($b[$key])) {
            return -1;
        } elseif ($a[$key] > $b[$key]) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function compareDates($a, $b, $key) {
        $dateA = strtotime($a[$key]);
        $dateB = strtotime($b[$key]);
        if ($dateA < $dateB) {
            return -1;
        } elseif ($dateA > $dateB) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function compareIntegers($a, $b, $key) {
        if ($a[$key] < $b[$key]) {
            return -1;
        } elseif ($a[$key] > $b[$key]) {
            return 1;
        } else {
            return 0;
        }
    }
}