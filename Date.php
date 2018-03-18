<?php

class Date {
    public static function getValidDate($string) {
        $date = explode(" ", $string)[0];

        $parts = explode("-", $date);
        foreach ($parts as &$part) {
            if ($part < 10) {
                $part = "0" . $part;
            }
        }
        return implode("-", $parts);
    }

    public static function getValidTime($string) {
        if(isset(explode(" ", $string)[1])) {
            $parts = explode(":", explode(" ", $string)[1]);
            foreach ($parts as &$part) {
                if ($part < 10) {
                    $part = "0" . $part;
                }
            }
            return implode(":", $parts);
        } else {
            return "00:00";
        }
    }
}