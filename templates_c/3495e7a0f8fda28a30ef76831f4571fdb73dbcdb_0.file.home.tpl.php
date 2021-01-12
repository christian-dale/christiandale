<?php
/* Smarty version 3.1.36, created on 2021-01-12 19:48:28
  from 'C:\Users\jim\Google Drive\Projects\portfolio\templates\pages\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ffdeefcd1d946_01157749',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3495e7a0f8fda28a30ef76831f4571fdb73dbcdb' => 
    array (
      0 => 'C:\\Users\\jim\\Google Drive\\Projects\\portfolio\\templates\\pages\\home.tpl',
      1 => 1610477308,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/partials/nav.tpl' => 1,
    'file:templates/partials/footer.tpl' => 1,
  ),
),false)) {
function content_5ffdeefcd1d946_01157749 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    @media (max-width: 1200px) {
        .contentHome .homeText {
            max-width: 100% !important;
        }
    }
</style>

<div class="contentHome container">
    <?php $_smarty_tpl->_subTemplateRender("file:templates/partials/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <main>
        <div class="content" style="padding: 2px 0;">
            <h1>Christian Dale</h1>
            <p class="homeText" style="max-width: 50%;">Full-stack web developer with many years of experience. Interested in most things tech, including game development and arduino.</p>
        </div>

        <div class="content" style="padding: 0; ">
                <!--
            <h1>Projects</h1>
            <p style="max-width: 50%;">A curated list of featured projects.</p>
            -->
        </div>
        <div class="content">
            <?php $_smarty_tpl->_subTemplateRender("file:templates/partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </main>
</div>
<?php }
}
