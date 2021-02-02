<style>
    .header {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
</style>

<div class="header" style="display: flex; justify-content: space-between;">
    <nav class="logo" style="display: inline-block;">
        <ul>
            <li><a href="/" style="color: #212121;">ChrisDale</a></li>
        </ul>
    </nav>

    <nav class="nav-items" style="display: inline-block;">
        <ul>
            <li><a href="/projects" class="navItem" style="background-color: #fff; color: #212121;">{$lang->get("nav:projects")}</a></li>
            <li><a href="/blog" class="navItem" style="background-color: #fff; color: #212121;">{$lang->get("nav:blog")}</a></li>
            <!--<li><a href="/contact" class="navItem">{$lang->get("nav:contact")}</a></li>-->
            <li>
                <a href="/set-lang?lang=en" class="articleLink badge">EN</a>
                <a href="/set-lang?lang=no" class="articleLink badge">NO</a>
            </li>
        </ul>
    </nav>
</div>
