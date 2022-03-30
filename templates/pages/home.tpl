<style>
    @media (max-width: 1200px) {
        .contentHome .homeText {
            max-width: 100% !important;
        }

        .intro {
            padding: 5px 10px !important;
        }
    }

    .linkIcon {
        color: #212121;
        text-decoration: none;
        display: inline-block;
        margin-right: 15px;
    }

    .intro {
        padding: 5px 25px;
    }
</style>

<div class="contentHome container">
    {include file="templates/partials/nav.tpl"}
    <main>
        <div class="content" style="background: #f3e8e8; border-radius: 5px;">
            <div class="intro">
                <h1>Christian Dale</h1>
                <p class="homeText" style="max-width: 50%;">{$lang->get("home:intro")}</p>
                <p>
                    <a class="linkIcon github-btn" href="https://github.com/christian-dale" target="_blank"><i class="fa-brands fa-github"></i></a>
                    <a class="linkIcon linkedin-button" href="https://www.linkedin.com/in/jim-christian-dale-haukvik-1a8b36162/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                    <a class="linkIcon youtube-button" href="https://www.youtube.com/channel/UC5h57H7tjmpeFoAZWyjNygQ" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                    <a class="linkIcon twitter-button" href="https://twitter.com/chrisdaletweets" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                </p>
            </div>
        </div>

        <div class="content" style="margin-top: 250px;">
            <a class="twitter-timeline" data-theme="light" href="https://twitter.com/chrisdaletweets?ref_src=twsrc%5Etfw">Tweets by Christian Dale</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>

        <div class="content">
            {include file="templates/partials/footer.tpl"}
        </div>
    </main>
</div>
