<?php
/* Smarty version 3.1.36, created on 2020-11-06 21:22:46
  from 'C:\Users\Jim Christian\Google Drive\Projects\portfolio\templates\pages\post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fa5b096b83a27_08397391',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f07bfb4c7e15d8cc02dc9c82cfd5e219cda4eaa6' => 
    array (
      0 => 'C:\\Users\\Jim Christian\\Google Drive\\Projects\\portfolio\\templates\\pages\\post.tpl',
      1 => 1604694147,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/partials/nav.tpl' => 1,
  ),
),false)) {
function content_5fa5b096b83a27_08397391 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    .intro {
        position: relative;
        background-color: #fce4ec;
        padding: 0 25px;
        min-height: 400px;
        background: url("/assets/<?php echo $_smarty_tpl->tpl_vars['post']->value->get("image");?>
") no-repeat center center fixed;
        background-size: cover;
    }

    .intro h1 {
        color: #fff;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.4);
        position: absolute;
        bottom: 25px;
    }

    .intro p {
        color: #fff;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.4);
        position: absolute;
        bottom: 0;
    }
</style>

<div class="container">
    <?php $_smarty_tpl->_subTemplateRender("file:templates/partials/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<div class="contentBlog">
    <div class="container">
        <div class="intro">
            <h1><?php echo $_smarty_tpl->tpl_vars['post']->value->get("title");?>
</h1>
            <p><?php echo $_smarty_tpl->tpl_vars['post']->value->get("date");?>
</p>
        </div>

        <p><?php echo $_smarty_tpl->tpl_vars['post']->value->get("content");?>
</p>

        <div id="disqus_thread"></div>
        <?php echo '<script'; ?>
>
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://chrisdale-me.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
        <?php echo '</script'; ?>
>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    </div>
</div>
<?php }
}
