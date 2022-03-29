<!doctype html>
<html lang="{$lang->getLang()}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{$description}">
    <meta http-equiv="content-language" content="{$lang->getLang()}">

    <!-- Open Graph -->
    <meta property="og:title" content="{$title}">
    <meta property="og:description" content="{$description}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{$title}">
    <meta name="twitter:description" content="{$description}">

    {if isset($blogpost)}
        <meta name="twitter:image" content="{$smarty.server.HTTP_HOST}{$blogpost->get('image')}">
    {/if}

    <title>{$title}</title>

    <link rel="icon" type="image/png" href="/assets/favicon.png">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4919922704535736" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/styles/normalize.css">
    <link rel="stylesheet" href="/assets/styles/main.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9RX98F0117"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-9RX98F0117');
    </script>
</head>

<body>
    {$content}
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>