---
{
    "title": "Getting Eta to work with Deno Deploy",
    "description": "Deno Deploy is a great service for hosting your Deno projects on the cloud for free. Unfortunately it does not work with the eta templating language.",
    "date": "2023-01-14",
    "dateUpdate": "2023-01-14",
    "permalink": "getting-eta-to-work-with-deno-deploy",
    "lang": "en",
    "draft": false,
    "categories": [
        "deno",
        "eta"
    ],
    "image": "/assets/img/blog/abstract1.jpg",
    "attrib": ""
}
---

Deno Deploy is a great service for hosting your Deno projects
on the cloud for free. Unfortunately it does not work with the eta templating language.

The reason for this is that eta uses the Deno.exists function, which is depreciated, and
removed on the Deno Deploy service.

After looking for a solution to this myself, but not finding any, I decided to try
to come up with my own fix, which has been posted on the eta github page.

[https://github.com/eta-dev/eta/issues/172](https://github.com/eta-dev/eta/issues/172)

Here is a temporary fix that allows you to at least use templates on Deno Deploy :)

```
Eta.config.includeFile = function(path, data) {
  return Eta.templates.get(path)(data, Eta.config);
};
```

I would then write something like this:

```
Eta.templates.define("main", Eta.compile(
  await Deno.readTextFile(`${Deno.cwd()}/views/main.eta`)));

const template = await Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/home.eta`), {
    title: "My webpage"
  });
```

And this in the templates:

```
// home.eta

<% layout("main") %>

<h1>Welcome to my home page</h1>
```

```
// main.eta

<!DOCTYPE html>
<html lang="en">
<head>
    <title><%= it.title %></title>
</head>
<body>
    <%~ it.body %>
</body>
</html>
```