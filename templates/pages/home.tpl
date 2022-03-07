<style>
    @media (max-width: 1200px) {
        .contentHome .homeText {
            max-width: 100% !important;
        }
    }

    .linkIcon {
        color: #212121;
        text-decoration: none;
        display: inline-block;
        margin-right: 15px;
    }
</style>

<div class="contentHome container">
    {include file="templates/partials/nav.tpl"}
    <main>
        <div class="content" style="padding: 5px 15px; background: #f3e8e8; border-radius: 5px;">
            <h1>Christian Dale</h1>
            <p class="homeText" style="max-width: 50%;">{$lang->get("home:intro")}</p>
            {* <a class="github-button" href="https://github.com/christian-dale"
			aria-label="Follow @christian-dale on GitHub">Follow @christian-dale</a> *}
            <p>
                <a class="linkIcon github-btn" href="https://github.com/christian-dale"><i class="fa-brands fa-github"></i></a>
                <a class="linkIcon linkedin-button" href="https://www.linkedin.com/in/jim-christian-haukvik-1a8b36162/"><i class="fa-brands fa-linkedin"></i></a>
            </p>
        </div>

        <div class="content" style="padding: 0; {*background-color: #fce4ec;*}">
        {* <img src="/assets/ptoffice_logo.svg" style="max-width: 200px;"> *}
        <!--
            <h1>Projects</h1>
            <p style="max-width: 50%;">A curated list of featured projects.</p>
            -->
        </div>
        <div class="content">
            {include file="templates/partials/footer.tpl"}
        </div>
    </main>
</div>
