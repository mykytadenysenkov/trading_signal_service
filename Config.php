<?php

class Config {
    private static $config = [];

    public static function get($name) {
        return isset(Config::$config[$name]) ? Config::$config[$name] : null;
    }

    public static function set($name, $value) {
        Config::$config[$name] = $value;
    }
}