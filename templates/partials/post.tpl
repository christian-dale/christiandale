<style>
    .blogPosts li {
        list-style: none;
        background-color: #f1f1f1;
        padding: 15px;
        margin: 25px 0;
    }

    .blogPosts li img {
        width: 100%;
        background-size: cover;
        max-height: 400px;
        object-fit: cover;
    }

    .blogPosts .postContent {
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 400px;
        white-space: nowrap;
    }
</style>

<li>
    <!--<img src="{if $post->get('image')}{$post->get('image')}{else}http://via.placeholder.com/800x600{/if}">-->
    <h2 class="postHeader">{$post->get("title")}</h2>
    {foreach $post->get("categories") as $category}
        <a href="#" class="postCategory badge">{$category}</a>
    {/foreach}
    <p class="postContent">{strip_tags($post->get("content"))}</p>
    <a href="/post/{$post->get("id")}" class="articleLink">Read article ...</a>
</li>
