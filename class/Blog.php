<?php

class BlogPost extends Item {
    private string $table = "post";

    function __construct($id = null) {
        parent::__construct($this->table, []);
    }
}

class Blog {
    public $posts = [];
    public $posts_rendered = [];
    private $table = "post";
    private $postscount = 7;

    function __construct() {

    }

    function loadPosts() {
        // $posts = DB::query("SELECT * FROM {$this->table}")->fetchAll();
        // Create an instance of type BlogPost of every item in $posts.
        // $this->posts = array_map(fn($post) => Item::simpleLoad(BlogPost::class, $post), $posts);

        foreach (glob("posts/*.json") as $file_name) {
            $file = file_get_contents($file_name);
            $json = json_decode($file, true);
            $json["content"] = file_get_contents(preg_replace("@.json@", ".txt", $file_name));
            preg_match("@/([a-z0-9]+).json@", $file_name, $name);
            $json["id"] = $name[1];
            $this->posts[$json["id"]] = Item::simpleLoad(BlogPost::class, $json);
        }

        uasort($this->posts, fn($a, $b) => strtotime($a->get("date")) < strtotime($b->get("date")));
    }

    function renderPosts() {
        $parsedown = new Parsedown();

        foreach ($this->posts as $post) {
            $post->set(["content" => $parsedown->text($post->get("content"))]);
            $this->posts_rendered[] = $post;
        }
    }
}