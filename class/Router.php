<?php

class Router {
    public static $routes = [];
    public $res = [];

    function __construct() {
        $this->res = (object) [];
    }

    function add($path, $method, $fn) {
        self::$routes[] = ["path" => $path, "method" => $method, "fn" => $fn];
    }

    function begin() {
        // @/+[a-z-]+/+[a-z-]+@i
        // @{(.*?)}@
        // @{[a-z]+}@i
        $parsed = parse_url($_SERVER["REQUEST_URI"]);

        foreach (self::$routes as $route) {
            if (preg_match("@/+[a-z0-9]+/+([a-z0-9]+)@", $parsed["path"], $val) && preg_match("@{(.*?)}@", $route["path"], $selector)) {
                preg_match("@/+[a-z0-9]+@", $parsed["path"], $match);
                if (strpos($match[0], $route["path"]) != -1) {
                    $this->res->attr = [$selector[1] => $val[1]];
                    call_user_func_array($route["fn"], [$this->res]);
                }
            } else {
                if ($route["path"] == $parsed["path"]) {
                    call_user_func($route["fn"]);
                }
            }
        }
    }
}
