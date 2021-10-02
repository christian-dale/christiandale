<style>
    .projects {
        display: flex;
        flex-direction: column;
    }

    .projectItem {
        border-radius: 5px;
        color: #000;
        margin: 25px 0;
        padding: 0 15px 15px 15px;
    }

    .projectItem a {
        color: #3d5afe;
        text-decoration: none;
    }

    @media (max-width: 1200px) {
        .projectItem {
            width: 100%;
        }
    }
</style>

<div class="contentProjects">
    <div class="container">
        {include file="templates/partials/nav.tpl"}
        <h1>Projects</h1>

        <a href="#" class="badge">Customer Projects</a>
        <a href="#" class="badge">My Projects</a>
        <a href="#" class="badge">Small projects / tools</a>

        <h2>Customer Projects</h2>

        <div class="projects" style="">
            <div class="projectItem">
                {* <img src="/assets/ptoffice_logo.svg" style="max-width: 200px;"> *}
                <h2><a href="https://ptoffice.no">PT Office</a></h2>
                <p>PT Office is a complete software for personal trainers and their customers.</p>
            </div>
            <div class="projectItem">
                <h2><a href="https://nia.no">NIA</a></h2>
                <p>Norsk industriarbeidermuseum.</p>
                {* <img src="/assets/ptoffice_logo.svg" style="max-width: 200px;"> *}
            </div>
            <div class="projectItem">
                {* <img src="/assets/ptoffice_logo.svg" style="max-width: 200px;"> *}
                <h2><a href="https://soma-effects.com">Soma Effects</a></h2>
                <p>Guitar effects web shop, quality items.</p>
            </div>
            <div class="projectItem">
                {* <img src="/assets/ptoffice_logo.svg" style="max-width: 200px;"> *}
                <h2><a href="https://irn.no">IRN</a></h2>
                <p>Islamsk råd Norge.</p>
            </div>
        </div>

        <h2>My Projects</h2>

        <div class="projects" style="">
            <div class="projectItem">
                {* <img src="/assets/ptoffice_logo.svg" style="max-width: 200px;"> *}
                <h2><a href="https://github.com/Ionogy/kernel.css">Kernel.css</a></h2>
                <p>Simple CSS framework.</p>
            </div>
            <div class="projectItem">
                {* <img src="/assets/ptoffice_logo.svg" style="max-width: 200px;"> *}
                <h2><a href="https://github.com/Ionogy/kernel.css">Colony</a></h2>
                <p>Real time strategy game written in C.</p>
            </div>
            <div class="projectItem">
                {* <img src="/assets/ptoffice_logo.svg" style="max-width: 200px;"> *}
                <h2><a href="https://github.com/Ionogy/kernel.css">Libre</a></h2>
                <p>Work-in progress open source Discord like software written in 2015.</p>
            </div>
        </div>

        <h2>Small projects / tools</h2>

        <div class="projects" style="">
            <div class="projectItem">
                {* <img src="/assets/ptoffice_logo.svg" style="max-width: 200px;"> *}
                <h2><a href="#">Dirlist recursive</a></h2>
                <p>Recursive directory traversal library.</p>
                <a href="https://github.com/Ionogy/kernel.css">...</a>
            </div>
        </div>

        {include file="templates/partials/footer.tpl"}
    </div>
</div>
