<?php

namespace App\Helpers;

class ArrayHelper
{
    public static function compareByKey($a, $b, $sort, $direction = 'asc') {
        $result = ($direction == 'asc') ? 1 : -1;
        if ($a[$sort] == $b[$sort]) {
            return 0;
        }
        
        if (strtotime($a[$sort])) {
            echo 'uma data caralho';
            die();
            $compareFunction = 'compareDates';
        } elseif (is_numeric($a[$sort])) {
            // echo 'um inteiro caralho';
            // echo '<br>';
            echo json_encode($a);
            die();
            $compareFunction = 'compareIntegers';
        } else {
            $compareFunction = 'compareStrings';
        }

        return self::$compareFunction($a, $b, $sort) * $result;
    }

    public static function compareStrings($a, $b, $key) {
        if ($a[$key] < $b[$key]) {
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