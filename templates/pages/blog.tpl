<style>
    .blogPosts {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }
</style>

<div class="contentBlog">
    <div class="container">
        {include file="templates/partials/nav.tpl"}

        <h1>Blog</h1>
        <p>My opinions on topics like technology and philosophy.</p>

        <ul class="blogPosts" style="padding: 0;">
        {foreach $posts as $post}
            {if $post->get("draft") == false}
                {include file="templates/partials/post.tpl" post=$post}
            {/if}
        {/foreach}
        </ul>

        {include file="templates/partials/footer.tpl"}
    </div>
</div>
