<?php
/* Smarty version 3.1.36, created on 2020-10-27 19:38:49
  from 'C:\Users\Jim Christian\Google Drive\Projects\portfolio\templates\pages\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f986939e1c2f4_01810998',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '612f7a61384598b1765723cb06bfdc16fb4f8c0f' => 
    array (
      0 => 'C:\\Users\\Jim Christian\\Google Drive\\Projects\\portfolio\\templates\\pages\\home.tpl',
      1 => 1603823926,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/partials/nav.tpl' => 1,
  ),
),false)) {
function content_5f986939e1c2f4_01810998 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentHome container">
    <?php $_smarty_tpl->_subTemplateRender("file:templates/partials/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <main>
        <div class="content" style="padding: 2px 0;">
            <h1>Christian Dale</h1>
            <p style="max-width: 50%;">Full-stack web developer with many years of experience. Interested in most things tech, including game development and arduino.</p>
        </div>

        <div class="content" style="padding: 0; ">
        <img src="/assets/ptoffice_logo.svg" style="max-width: 200px;">
        <!--
            <h1>Projects</h1>
            <p style="max-width: 50%;">A curated list of featured projects.</p>
            -->
        </div>
    </main>
</div>
<?php }
}
