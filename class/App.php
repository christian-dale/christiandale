<?php

class App {
    public $smarty = null;
    public $db = null;
    public $content = "";

    function __construct($smarty, $db) {
        $this->smarty = $smarty;
        $this->db = $db;
    }

    function init() {
        session_start();
        $_SESSION["lang"] ??= "en";
    }

    function render() {
        $this->smarty->assign("content", $this->content);
        echo $this->smarty->fetch("templates/main.tpl");
    }

    function prettyPrint($i) {
        echo "<pre>" . print_r($i, true) . "</pre>";
    }
}
