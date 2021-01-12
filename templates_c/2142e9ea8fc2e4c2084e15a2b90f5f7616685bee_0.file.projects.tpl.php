<?php
/* Smarty version 3.1.36, created on 2021-01-12 19:48:02
  from 'C:\Users\jim\Google Drive\Projects\portfolio\templates\pages\projects.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ffdeee25001b5_28136035',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2142e9ea8fc2e4c2084e15a2b90f5f7616685bee' => 
    array (
      0 => 'C:\\Users\\jim\\Google Drive\\Projects\\portfolio\\templates\\pages\\projects.tpl',
      1 => 1610477248,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/partials/nav.tpl' => 1,
    'file:templates/partials/footer.tpl' => 1,
  ),
),false)) {
function content_5ffdeee25001b5_28136035 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    .projects {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .projectItem {
        min-width: 250px;
        max-width: 400px;
        background-color: #3d5afe;
        border-radius: 5px;
        color: #fff;
        margin: 25px 0;
        padding: 0 15px 15px 15px;
    }

    .projectItem a {
        color: #fff;
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
        <?php $_smarty_tpl->_subTemplateRender("file:templates/partials/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <h1>Projects</h1>

        <a href="#" class="badge">Customer Projects</a>
        <a href="#" class="badge">My Projects</a>

        <h2>Customer Projects</h2>

        <div class="projects" style="">
            <div class="projectItem" style="background: linear-gradient(to right, #59297f, #4e127c);">
                                <h2>PT Office</h2>
                <p>PT Office is a complete software for personal trainers and their customers.</p>
                <a href="https://ptoffice.no">https://ptoffice.no</a>
            </div>
            <div class="projectItem">
                <h2>NIA</h2>
                <p>Notodden og Rjukan industriarv.</p>
                <a href="https://nia.no">https://nia.no</a>
                            </div>
            <div class="projectItem" style="background-color: #039be5;">
                                <h2>Soma Effects</h2>
                <p>Guitar effects web shop, quality items.</p>
                <a href="https://soma-effects.com">https://some-effects.com</a>
            </div>
            <div class="projectItem">
                                <h2>IRN</h2>
                <p>Islamsk råd Norge.</p>
                <a href="https://irn.no">https://irn.no</a>
            </div>
        </div>

        <h2>My Projects</h2>

        <div class="projects" style="">
            <div class="projectItem" style="background: linear-gradient(to right, #59297f, #4e127c);">
                                <h2>Kernel.css</h2>
                <p>Simple CSS framework.</p>
                <a href="https://ptoffice.no">https://ptoffice.no</a>
            </div>
        </div>

        <?php $_smarty_tpl->_subTemplateRender("file:templates/partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
</div>
<?php }
}
