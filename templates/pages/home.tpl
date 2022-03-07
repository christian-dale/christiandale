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
                </p>
            </div>
        </div>

        <div class="content" style="padding: 0;">
        </div>
        <div class="content">
            {include file="templates/partials/footer.tpl"}
        </div>
    </main>
</div>
