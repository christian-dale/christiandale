<?php

require_once("vendor/autoload.php");

require_once("class/Router.php");
require_once("class/DB.php");
require_once("class/Lang.php");
require_once("class/Item.php");
require_once("class/Author.php");
require_once("class/Blog.php");
require_once("class/App.php");

$app = new App(new Smarty(), null);
$app->init();
$app->smarty->assign("lang", new Lang());

// DB::setup();

// $item = new Item("post");
// $item->save(["title" => "Test"]);

$blog = new Blog();

$blog->loadPosts();
$blog->renderPosts();

$router = new Router();

$router->add("/", "get", function() use(&$app) {
    $app->content = $app->smarty->fetch("templates/pages/home.tpl");
});

$router->add("/blog/{id}", "get", function($res) use(&$app, &$blog) {
    $app->content = $app->smarty->fetch("templates/pages/post.tpl", ["post" => $blog->posts[$res->attr["id"]]]);
});

$router->add("/blog", "get", function() use(&$app, &$blog) {
    $app->content = $app->smarty->fetch("templates/pages/blog.tpl", ["posts" => $blog->posts]);
});

$router->add("/projects", "get", function() use(&$app) {
    $app->content = $app->smarty->fetch("templates/pages/projects.tpl", []);
});

$router->add("/set-lang", "get", function() use(&$app) {
    $_SESSION["lang"] = $_GET["lang"];
    header("Location: {$_SERVER['HTTP_REFERER']}");
});

$router->begin();
echo $app->render();
