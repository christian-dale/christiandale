<style>
    .intro {
        position: relative;
        background-color: #fce4ec;
        padding: 0 25px;
        min-height: 400px;
        background: url("{$post->get("image")}") no-repeat center center fixed;
        background-size: cover;
        border-radius: 4px;
    }

    .intro h1 {
        color: #fff;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.4);
        position: absolute;
        bottom: 25px;
    }

    .intro p {
        color: #fff;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.4);
        position: absolute;
        bottom: 0;
    }
</style>

<div class="container">
    {include file="templates/partials/nav.tpl"}
</div>

<div class="contentBlog">
    <div class="container">
        <div class="intro">
            <h1>{$post->get("title")}</h1>
            <p>{$post->get("date")}</p>
        </div>

        <div class="section" style="margin-top: 25px;">
            {foreach $post->get("categories") as $category}
                <a href="#" class="postCategory badge">{$category}</a>
            {/foreach}
        </div>

        <h4>Latest update: {$post->get("dateLatest")}</h4>

        <p>{$post->get("content")}</p>

        <div id="disqus_thread"></div>
        <script>
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://chrisdale-me.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

        {include file="templates/partials/footer.tpl"}
    </div>
</div>
