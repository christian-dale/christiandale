<?php
/* Smarty version 3.1.36, created on 2021-01-12 19:46:35
  from 'C:\Users\jim\Google Drive\Projects\portfolio\templates\partials\nav.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ffdee8b893114_90233480',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '777814ff671ea817a5761501032c375cf7ff7894' => 
    array (
      0 => 'C:\\Users\\jim\\Google Drive\\Projects\\portfolio\\templates\\partials\\nav.tpl',
      1 => 1610477078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ffdee8b893114_90233480 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
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
            <li><a href="/projects" class="navItem"><?php  $_prefixVariable1 = $_smarty_tpl->tpl_vars['lang']->value;
echo $_prefixVariable1::get("nav:projects");?>
</a></li>
            <li><a href="/blog" class="navItem"><?php  $_prefixVariable2 = $_smarty_tpl->tpl_vars['lang']->value;
echo $_prefixVariable2::get("nav:blog");?>
</a></li>
            <li>
                <a href="/set-lang?lang=en" class="articleLink badge">EN</a>
                <a href="/set-lang?lang=no" class="articleLink badge">NO</a>
            </li>
        </ul>
    </nav>
</div>
<?php }
}
