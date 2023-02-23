import { Application, Router } from "https://deno.land/x/oak/mod.ts";
import * as Eta from "https://deno.land/x/eta@v1.12.3/mod.ts";
import { Marked } from "https://deno.land/x/markdown@v2.0.0/mod.ts";

Eta.configure({
  views: `${Deno.cwd()}/views/`
});

/** Fix for Deno Deploy */
Eta.config.includeFile = function(path, data) {
  return Eta.templates.get(path)(data, Eta.config);
};

Eta.templates.define("main", Eta.compile(
  await Deno.readTextFile(`${Deno.cwd()}/views/main.eta`)));

const router = new Router();

window.App = {
  currentLang: "no",
  lang(word: string) {

  }
}

router.get("/", async (ctx) => {
  const posts = [];

  for await (const post of Deno.readDir(`${Deno.cwd()}/posts/`)) {
    if (post.isFile && post.name.includes(".json")) {
      const postJson = JSON.parse(await Deno.readTextFile(`${Deno.cwd()}/posts/${post.name}`));

      if (postJson.draft == false) {
        posts.push(postJson);
      }
    }
  }

  ctx.response.body = await Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/home.eta`), {
    title: "Christian Dale",
    posts: posts.sort((a, b) => new Date(a.date) - new Date(b.date)).reverse().slice(0, 3)
  });
});

router.get("/my-work", async (ctx) => {
  ctx.response.body = await Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/mywork.eta`), {
    title: "Christian Dale - My Work"
  });
});

router.get("/music", async (ctx) => {
  ctx.response.body = await Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/music.eta`), {
    title: "Christian Dale - Music"
  });
});

router.get("/about", async (ctx) => {
  ctx.response.body = await Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/about.eta`), {
    title: "Christian Dale - About"
  });
});

router.get("/contact", async (ctx) => {
  ctx.response.body = await Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/contact.eta`), {
    title: "Christian Dale - Contact"
  });
});

router.get("/privacy", async (ctx) => {
  ctx.response.body = await Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/privacy.eta`), {
    title: "Christian Dale - Privacy Policy"
  });
});

router.get("/blog", async (ctx) => {
  const posts = [];

  for await (const post of Deno.readDir(`${Deno.cwd()}/posts/`)) {
    if (post.isFile && post.name.includes(".json")) {
      const postJson = JSON.parse(await Deno.readTextFile(`${Deno.cwd()}/posts/${post.name}`));

      if (postJson.draft == false) {
        posts.push(postJson);
      }
    }
  }

  ctx.response.body = await Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/blog.eta`), {
    title: "Christian Dale - Blog",
    posts: posts.sort((a, b) => new Date(a.date) - new Date(b.date)).reverse()
  });
});

router.get("/blog/:id", async (ctx) => {
  const post = await Deno.readTextFile(`${Deno.cwd()}/posts/${ctx.params.id}.md`);
  let postMeta = await Deno.readTextFile(`${Deno.cwd()}/posts/${ctx.params.id}.json`);

  postMeta = JSON.parse(postMeta);
  postMeta.attrib = Marked.parse(postMeta.attrib).content;

  ctx.response.body = await Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/post.eta`), {
    title: `Christian Dale - ${postMeta.title}`,
    post: {
      content: Marked.parse(post).content,
      meta: postMeta
    }
  });
});

const app = new Application();

app.use(router.routes());
app.use(router.allowedMethods());

app.use(async (context, next) => {
  try {
    await context.send({
      root: `${Deno.cwd()}/public`,
      index: "index.html",
    });
  } catch (err) {
    await next();
  }
});

app.use(async (ctx) => {
  ctx.response.type = "text/html; charset=utf-8";
  ctx.response.status = 404;
  ctx.response.body = await Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/404.eta`), {
    title: "Christian Dale"
  });
});

await app.listen({ port: 80 });
