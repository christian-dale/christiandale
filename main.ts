import { Application, Router } from "https://deno.land/x/oak/mod.ts";
import * as Eta from "https://deno.land/x/eta@v1.12.3/mod.ts";
import { Marked } from "https://deno.land/x/markdown@v2.0.0/mod.ts";

Eta.configure({
  views: `${Deno.cwd()}/views/`
});

const router = new Router();

router.get("/", async (ctx) => {
  const templateMain = Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/main.eta`), {
    mainContent: Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/home.eta`)),
    meta: {
      title: "Christian Dale"
    }
  });

  ctx.response.body = templateMain;
});

router.get("/my-work", async (ctx) => {
  const templateMain = Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/main.eta`), {
    mainContent: Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/mywork.eta`)),
    meta: {
      title: "Christian Dale - My Work"
    }
  });

  ctx.response.body = templateMain;
});

router.get("/blog", async (ctx) => {
  const posts = [];

  for await (const post of Deno.readDir(`${Deno.cwd()}/posts/`)) {
    if (post.isFile && post.name.includes(".json")) {
      posts.push(JSON.parse(await Deno.readTextFile(`${Deno.cwd()}/posts/${post.name}`)));
    }
  }

  const templateMain = Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/main.eta`), {
    mainContent: Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/blog.eta`), {posts: posts}),
    meta: {
      title: "Christian Dale - Blog"
    }
  });

  ctx.response.body = templateMain;
});

router.get("/blog/:id", async (ctx) => {
  const post = await Deno.readTextFile(`${Deno.cwd()}/posts/${ctx.params.id}.md`);
  let postMeta = await Deno.readTextFile(`${Deno.cwd()}/posts/${ctx.params.id}.json`);

  postMeta = JSON.parse(postMeta);
  postMeta.attrib = Marked.parse(postMeta.attrib).content;

  const templateMain = Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/main.eta`), {
    mainContent: Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/post.eta`), {
      post: {
        content: Marked.parse(post).content,
        meta: postMeta
      }
    }),
    meta: {
      title: `Christian Dale - ${postMeta.title}`
    }
});

  ctx.response.body = templateMain;  
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

await app.listen({ port: 80 });