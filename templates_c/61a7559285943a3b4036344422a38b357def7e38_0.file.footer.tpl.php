<?php
/* Smarty version 3.1.36, created on 2021-01-12 19:47:55
  from 'C:\Users\jim\Google Drive\Projects\portfolio\templates\partials\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ffdeedb070c98_04257800',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61a7559285943a3b4036344422a38b357def7e38' => 
    array (
      0 => 'C:\\Users\\jim\\Google Drive\\Projects\\portfolio\\templates\\partials\\footer.tpl',
      1 => 1610477139,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ffdeedb070c98_04257800 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    window.onload = function() {
        const date = document.createTextNode(new Date().getFullYear());
        document.querySelector(".footerCopyright").appendChild(date);
    };
<?php echo '</script'; ?>
>

<div class="footer">
    <p class="footerCopyright">&copy; Chrisdale </p>
</div>
<?php }
}
