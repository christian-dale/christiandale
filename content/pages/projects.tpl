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
        flex-grow: 1;
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
        {$nav}

        <h1>Projects</h1>
        <p>The following is a list of projects I have worked on for customers and personal projects.</p>

        <a href="#customer-projects" class="badge">Customer Projects</a>
        <a href="#my-projects" class="badge">My Projects</a>
        <a href="#small-projects" class="badge">Small projects / tools</a>

        <h2 class="projectTitle" id="customer-projects">Customer Projects</h2>

        <div class="projects">
            <div class="projectItem">
                <h2><a href="https://ptoffice.no" target="_blank">PT Office</a></h2>
                <p>PT Office is a complete software for personal trainers and their customers.</p>
            </div>
            <div class="projectItem">
                <h2><a href="https://ptoffice.no" target="_blank">NIA</a></h2>
                <p>Norsk industriarbeidermuseum.</p>
            </div>
            <div class="projectItem">
                <h2><a href="https://somaeffects.com" target="_blank">Soma Effects</a></h2>
                <p>Guitar effects web shop, quality items.</p>
            </div>
            <div class="projectItem">
                <h2><a href="https://irn.no" target="_blank">IRN</a></h2>
                <p>Islamsk råd Norge.</p>
            </div>
        </div>

        <h2 class="projectTitle" id="my-projects">My Projects</h2>

        <div class="projects">
            <div class="projectItem">
                <h2><a href="https://github.com/team-cryo/pairsynth" target="_blank">PairSynth</a></h2>
                <p>Modular synthesizer.</p>
            </div>
            <div class="projectItem">
                <h2><a href="https://teamcryo.tech/" target="_blank">Lord of The Lands</a></h2>
                <p>Competitive and fast-paced economy management game..</p>
            </div>
            <div class="projectItem">
                <h2><a href="https://ionogy.github.io/kernel.css/" target="_blank">Kernel.css</a></h2>
                <p>Simple CSS framework.</p>
            </div>
            <div class="projectItem">
                <h2><a href="https://github.com/christian-dale/colony" target="_blank">Colony</a></h2>
                <p>Real time strategy game written in C.</p>
            </div>
            <div class="projectItem">
                <h2><a href="https://github.com/christian-dale/libre" target="_blank">Libre</a></h2>
                <p>Work-in progress open source Discord like software written in 2015.</p>
            </div>
            <div class="projectItem">
                <h2><a href="https://github.com/christian-dale/VerbatimCMS" target="_blank">VerbatimCMS</a></h2>
                <p>Modular Content Management System.</p>
            </div>
        </div>

        <h2 class="projectTitle" id="small-projects">Small projects / tools</h2>

        <div class="projects">
            <div class="projectItem">
                <h2><a href="https://github.com/christian-dale/dirlist-recursive" target="_blank">Dirlist recursive</a></h2>
                <p>Recursive directory traversal library.</p>
            </div>
        </div>

        {$footer}
    </div>
</div>
