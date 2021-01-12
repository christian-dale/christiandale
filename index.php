<?php

require_once("vendor/autoload.php");

require_once("class/Router.php");
require_once("class/DB.php");
require_once("class/Item.php");
require_once("class/Author.php");
require_once("class/Blog.php");

function pretty_print($i) {
    echo "<pre>" . print_r($i, true) . "</pre>";
}

session_start();

if (!$_SESSION) {
    $_SESSION["lang"] = "en";
}

class Lang {
    public function __construct() {

    }

    public static function get(string $w) {
        return json_decode(file_get_contents("./lang/{$_SESSION['lang']}.json"))->$w;
    }
}

$smarty = new Smarty();
$smarty->assign("lang", new Lang());

// DB::setup();

// $item = new Item("post");
// $item->save(["title" => "Test"]);

$blog = new Blog();

$blog->loadPosts();
$blog->renderPosts();

$content = "";

$router = new Router();

$router->add("/", "get", function() use($smarty, &$content) {
    $content = $smarty->fetch("templates/pages/home.tpl");
});

$router->add("/blog/{id}", "get", function($res) use($smarty, &$content, &$blog) {
    $content = $smarty->fetch("templates/pages/post.tpl", ["post" => $blog->posts[$res->attr["id"]]]);
});

$router->add("/blog", "get", function() use($smarty, &$content, &$blog) {
    $content = $smarty->fetch("templates/pages/blog.tpl", ["posts" => $blog->posts]);
});

$router->add("/projects", "get", function() use($smarty, &$content) {
    $content = $smarty->fetch("templates/pages/projects.tpl", []);
});

$router->add("/set-lang", "get", function() use($smarty, &$content) {
    $_SESSION["lang"] = $_GET["lang"];
    header("Location: {$_SERVER['HTTP_REFERER']}");
});

$router->begin();

// $content = $smarty->fetch("templates/partials/post.tpl", ["post" => $blog->posts_rendered[0]]);

$smarty->assign("content", $content);
echo $smarty->fetch("templates/main.tpl");
