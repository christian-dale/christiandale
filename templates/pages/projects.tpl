<style>
    .projects {
        display: flex;
        flex-wrap: wrap;        
        background-color: #e8ebf3;
        border-radius: 5px;
    }

    .projectItem {
        min-width: 250px;
        max-width: 400px;
        border-radius: 5px;
        margin: 25px;
        padding: 0 15px 15px 15px;
    }

    .projectItem a {
        text-decoration: none;
    }

    .projectTitle {
        margin-top: 50px;
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

        <a href="#customer-projects" class="badge">Customer Projects</a>
        <a href="#my-projects" class="badge">My Projects</a>
        <a href="#small-projects" class="badge">Small projects / tools</a>

        <p>The following is a list of my projects I have worked on for customers and personal projects.</p>

        <h2 class="projectTitle" id="customer-projects">Customer Projects</h2>

        <div class="projects">
            <div class="projectItem">
                <h2>PT Office</h2>
                <p>PT Office is a complete software for personal trainers and their customers.</p>
                <a href="https://ptoffice.no" target="_blank">https://ptoffice.no</a>
            </div>
            <div class="projectItem">
                <h2>NIA</h2>
                <p>Norsk industriarbeidermuseum.</p>
                <a href="https://nia.no" target="_blank">https://nia.no</a>
            </div>
            <div class="projectItem">
                <h2>Soma Effects</h2>
                <p>Guitar effects web shop, quality items.</p>
                <a href="https://somaeffects.com" target="_blank">https://somaeffects.com</a>
            </div>
            <div class="projectItem">
                <h2>IRN</h2>
                <p>Islamsk råd Norge.</p>
                <a href="https://irn.no" target="_blank">https://irn.no</a>
            </div>
        </div>

        <h2 class="projectTitle" id="my-projects">My Projects</h2>

        <div class="projects">
            <div class="projectItem">
                <h2>PairSynth</h2>
                <p>Modular synthesizer.</p>
                <a href="https://github.com/team-cryo/pairsynth" target="_blank">https://github.com/team-cryo/pairsynth</a>
            </div>
            <div class="projectItem">
                <h2>Lord of The Lands</h2>
                <p>Competitive and fast-paced economy management game..</p>
                <a href="https://github.com/team-cryo/pairsynth" target="_blank">https://teamcryo.tech/</a>
            </div>
            <div class="projectItem">
                <h2>Kernel.css</h2>
                <p>Simple CSS framework.</p>
                <a href="https://ionogy.github.io/kernel.css/" target="_blank">https://ionogy.github.io/kernel.css/</a>
            </div>
            <div class="projectItem">
                <h2>Colony</h2>
                <p>Real time strategy game written in C.</p>
                <a href="https://github.com/Ionogy/kernel.css" target="_blank">...</a>
            </div>
            <div class="projectItem">
                <h2>Libre</h2>
                <p>Work-in progress open source Discord like software written in 2015.</p>
                <a href="https://github.com/Ionogy/kernel.css" target="_blank">...</a>
            </div>
            <div class="projectItem">
                <h2>Portfolio CMS</h2>
                <p>Portfolio content management system.</p>
                <a href="https://github.com/christian-dale/portfolio-cms" target="_blank">https://github.com/christian-dale/portfolio-cms</a>
            </div>            
        </div>

        <h2 class="projectTitle" id="small-projects">Small projects / tools</h2>

        <div class="projects">
            <div class="projectItem">
                <h2>Dirlist recursive</h2>
                <p>Recursive directory traversal library.</p>
                <a href="https://github.com/Ionogy/kernel.css" target="_blank">...</a>
            </div>
        </div>

        {include file="templates/partials/footer.tpl"}
    </div>
</div>
