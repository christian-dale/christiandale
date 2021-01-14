<?php

class Lang {
    public function __construct() {

    }

    public static function get(string $w) {
        return json_decode(file_get_contents("./lang/{$_SESSION['lang']}.json"))->$w;
    }
}