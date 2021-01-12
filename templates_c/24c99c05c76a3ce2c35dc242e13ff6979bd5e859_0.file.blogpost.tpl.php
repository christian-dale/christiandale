<?php
/* Smarty version 3.1.36, created on 2020-05-17 23:13:49
  from 'C:\Users\Jim Christian\Google Drive\Projects\portfolio\templates\partials\blogpost.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ec1a90d13fd24_89713532',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24c99c05c76a3ce2c35dc242e13ff6979bd5e859' => 
    array (
      0 => 'C:\\Users\\Jim Christian\\Google Drive\\Projects\\portfolio\\templates\\partials\\blogpost.tpl',
      1 => 1589749923,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec1a90d13fd24_89713532 (Smarty_Internal_Template $_smarty_tpl) {
?><li>
    <h2><?php echo $_smarty_tpl->tpl_vars['post']->value->get("title");?>
</h2>
    <p><?php echo $_smarty_tpl->tpl_vars['post']->value->get("content");?>
</h2>
</li><?php }
}
