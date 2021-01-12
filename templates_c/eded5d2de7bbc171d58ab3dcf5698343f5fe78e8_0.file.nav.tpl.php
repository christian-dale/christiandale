<?php
/* Smarty version 3.1.36, created on 2020-11-06 23:01:29
  from 'C:\Users\Jim Christian\Google Drive\Projects\portfolio\templates\partials\nav.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fa5c7b9d0e3b5_71043574',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eded5d2de7bbc171d58ab3dcf5698343f5fe78e8' => 
    array (
      0 => 'C:\\Users\\Jim Christian\\Google Drive\\Projects\\portfolio\\templates\\partials\\nav.tpl',
      1 => 1604700086,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa5c7b9d0e3b5_71043574 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="header" style="display: flex; justify-content: space-between;">
    <nav class="logo" style="display: inline-block;">
        <ul>
            <li><a href="/" style="color: #212121;">ChrisDale</a></li>
        </ul>
    </nav>

    <nav style="display: inline-block;">
        <ul>
            <li>
                <a href="/set-lang?lang=en" class="articleLink badge">EN</a>
                <a href="/set-lang?lang=no" class="articleLink badge">NO</a>
            </li>
            <li><a href="/projects" class="navItem"><?php  $_prefixVariable1 = $_smarty_tpl->tpl_vars['lang']->value;
echo $_prefixVariable1::get("nav:projects");?>
</a></li>
            <li><a href="/blog" class="navItem"><?php  $_prefixVariable2 = $_smarty_tpl->tpl_vars['lang']->value;
echo $_prefixVariable2::get("nav:blog");?>
</a></li>
        </ul>
    </nav>
</div>
<?php }
}
