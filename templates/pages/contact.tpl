<style>
    label {
        display: block;
    }
</style>

<div class="contentProjects">
    <div class="container">
        {include file="templates/partials/nav.tpl"}
        <h1>Contact</h1>

        <form action="/contact" method="POST">
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter your name">

            <label>Email</label>
            <input type="text" name="email" placeholder="Enter your email">

            <input type="submit" value="Send">
        </form>

        {include file="templates/partials/footer.tpl"}
    </div>
</div>
