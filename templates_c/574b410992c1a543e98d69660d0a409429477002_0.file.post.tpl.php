<?php
/* Smarty version 3.1.36, created on 2021-01-12 16:33:04
  from 'C:\Users\jim\Google Drive\Projects\portfolio\templates\partials\post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ffdc130904019_55430110',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '574b410992c1a543e98d69660d0a409429477002' => 
    array (
      0 => 'C:\\Users\\jim\\Google Drive\\Projects\\portfolio\\templates\\partials\\post.tpl',
      1 => 1603878236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ffdc130904019_55430110 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    .blogPosts li {
        list-style: none;
        background-color: #f1f1f1;
        padding: 15px;
        margin: 25px 0;
    }

    .blogPosts li img {
        width: 100%;
        background-size: cover;
        max-height: 400px;
        object-fit: cover;
    }

    .blogPosts .postContent {
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 400px;
        white-space: nowrap;
    }
</style>

<li>
    <!--<img src="<?php if ($_smarty_tpl->tpl_vars['post']->value->get('image')) {
echo $_smarty_tpl->tpl_vars['post']->value->get('image');
} else { ?>http://via.placeholder.com/800x600<?php }?>">-->
    <h2 class="postHeader"><?php echo $_smarty_tpl->tpl_vars['post']->value->get("title");?>
</h2>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['post']->value->get("categories"), 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
        <a href="#" class="postCategory badge"><?php echo $_smarty_tpl->tpl_vars['category']->value;?>
</a>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <p class="postContent"><?php echo strip_tags($_smarty_tpl->tpl_vars['post']->value->get("content"));?>
</p>
    <a href="/post/<?php echo $_smarty_tpl->tpl_vars['post']->value->get("id");?>
" class="articleLink">Read article ...</a>
</li>
<?php }
}
