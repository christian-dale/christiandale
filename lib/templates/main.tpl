{* 
    INTERNAL PAGE DO NOT EDIT!
    If you wish to modify this page, please create
    a copy in content -> pages, and change pages.json to
    the newly created template.
*}

<!doctype html>
<html lang="{$lang->getLang()}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{$description}">
    <meta http-equiv="content-language" content="{$lang->getLang()}">

    <title>{$title}</title>

    <link rel="icon" type="image/png" href="/lib/assets/media/favicon.png">
    <link rel="stylesheet" href="/lib/assets/styles/normalize.css">
    <link rel="stylesheet" href="/lib/assets/styles/main.css">

    {foreach $css_paths as $css_path}
        <link rel="stylesheet" href="{$css_path}">
    {/foreach}

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9RX98F0117"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-9RX98F0117');
    </script>
</head>

<body>
    {$content}

    {foreach $js_paths as $js_path}
        <script src="{$js_path}"></script>
    {/foreach}
</body>

</html>
