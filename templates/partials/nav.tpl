<style>
    .header {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .header .logo .headerIcon {
        color: #fff;
        background-color: #212121;
        border-radius: 5px;
        padding: 5px;
        font-family: monospace;
        letter-spacing: 0.1em;
    }
</style>

<div class="header" style="display: flex; justify-content: space-between;">
    <nav class="logo" style="display: inline-block;">
        <ul>
            <li><a href="/" class="headerIcon">&gt;_</a></li>
        </ul>
    </nav>

    <nav class="nav-items" style="display: inline-block;">
        <ul>
            <li><a href="/projects" class="navItem" style="background-color: #fff; color: #212121;">{$lang->get("nav:projects")}</a></li>
            <!--<li><a href="/contact" class="navItem" style="background-color: #fff; color: #212121;">{$lang->get("nav:contact")}</a></li>-->
            <li><a href="/blog" class="navItem">{$lang->get("nav:blog")}</a></li>
            <li>
                <a href="#" class="articleLink badge btnLang" data-lang="en">EN</a>
                <a href="#" class="articleLink badge btnLang" data-lang="no">NO</a>
            </li>
        </ul>
    </nav>
</div>

<script>
    document.querySelectorAll(".btnLang").forEach(el => {
        el.addEventListener("click", function(event) {
            fetch("/set-lang?lang=" + event.target.dataset.lang).then(res => {
                location.reload();
            });
        })
    });
</script>
