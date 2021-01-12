<?php
/* Smarty version 3.1.36, created on 2021-01-12 19:50:42
  from 'C:\Users\jim\Google Drive\Projects\portfolio\templates\pages\blog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ffdef828248a6_41726340',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc4a1704c646d1c92bf6db7756c7c9bc67b6a372' => 
    array (
      0 => 'C:\\Users\\jim\\Google Drive\\Projects\\portfolio\\templates\\pages\\blog.tpl',
      1 => 1610477441,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/partials/nav.tpl' => 1,
    'file:templates/partials/post.tpl' => 1,
    'file:templates/partials/footer.tpl' => 1,
  ),
),false)) {
function content_5ffdef828248a6_41726340 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentBlog">
    <div class="container">
        <?php $_smarty_tpl->_subTemplateRender("file:templates/partials/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <h1>Blog</h1>
    <p>A blog about technology and philosophy.</p>

    <ul class="blogPosts" style="padding: 0;">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
        <?php $_smarty_tpl->_subTemplateRender("file:templates/partials/post.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('post'=>$_smarty_tpl->tpl_vars['post']->value), 0, true);
?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>

    <?php $_smarty_tpl->_subTemplateRender("file:templates/partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
</div>
<?php }
}
