<div class="contentBlog">
    <div class="container">
        {include file="templates/partials/nav.tpl"}

    <h1>Blog</h1>
    <p>A blog about technology and philosophy.</p>

    <ul class="blogPosts" style="padding: 0;">
    {foreach $posts as $post}
        {include file="templates/partials/post.tpl" post=$post}
    {/foreach}
    </ul>

    {include file="templates/partials/footer.tpl"}
    </div>
</div>
