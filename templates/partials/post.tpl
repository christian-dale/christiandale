<style>
    .blogPosts li {
        list-style: none;
        padding: 15px;
        margin: 25px 0;
        background-color: #fafafa;
        border-radius: 4px;
    }

    .blogPosts li img {
        width: 100%;
        background-size: cover;
        max-height: 400px;
        object-fit: cover;
    }

    .blogPosts .postHeader {
        margin-bottom: 0;
    }

    .blogPosts .postContent {
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .blogPosts .postDate {
        font-size: 0.8em;
    }
</style>

<li>
    <!--<img src="{if $post->get('image')}{$post->get('image')}{else}http://via.placeholder.com/800x600{/if}">-->
    <h2 class="postHeader"><a href="/blog/{$post->get("id")}" class="articleLink" style="color: #212121;">{$post->get("title")}</a></h2>
    <p class="postDate">{$post->get("date")}</p>
    {foreach $post->get("categories") as $category}
        <a href="#" class="postCategory badge">{$category}</a>
    {/foreach}
    <p class="postContent">{substr(strip_tags($post->get("content")), 0, 250)} ...</p>
    <a href="/blog/{$post->get("id")}" class="articleLink">Read article ...</a>
</li>
