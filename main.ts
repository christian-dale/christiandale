import { Application, Router, Cookies, Status } from "https://deno.land/x/oak/mod.ts";
import * as Eta from "https://deno.land/x/eta@v1.12.3/mod.ts";
import { marky } from "https://deno.land/x/marky@v1.1.6/mod.ts";
import { Bson, MongoClient } from "https://deno.land/x/mongo@v0.31.1/mod.ts";

Eta.configure({views: `${Deno.cwd()}/views/`});

/** Fix for Deno Deploy */
Eta.config.includeFile = (path: string, data: Record<string, unknown>) => Eta.templates.get(path)(data, Eta.config);

Eta.templates.define("main", Eta.compile(
  await Deno.readTextFile(`${Deno.cwd()}/views/main.eta`)));

const router = new Router();

declare global {
  interface Window {
    App: Record<string, unknown>
  }
}

window.App = {
  title: "Christian Dale",
  
  async renderTemplate(template: string, options: object) {
    return await Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/${template}.eta`), options);
  }
}

router.redirect("/set-lang", "/", Status.PermanentRedirect).get("/", async (ctx) => {
  const posts = [];

  for await (const post of Deno.readDir(`${Deno.cwd()}/posts/`)) {
    if (post.isFile && post.name.includes(".md")) {
      const fileContent = await Deno.readTextFile(`${Deno.cwd()}/posts/${post.name}`);
      const match = fileContent.match(/---\n({[\s\S]*})\n---/);

      if (match != null) {
        const postJson = JSON.parse(match[1]);

        if (postJson.draft == false) {
          posts.push(postJson);
        }
      }
    }
  }

  ctx.response.body = await App.renderTemplate("home", {
    title: "Christian Dale",
    posts: posts.sort((a, b) => new Date(a.date) - new Date(b.date)).reverse().slice(0, 3)
  });
});

router.get("/music", async (ctx) => {
  ctx.response.body = await App.renderTemplate("music", { title: "Christian Dale - Music" });
});

router.get("/shop", async (ctx) => {
  ctx.response.body = await App.renderTemplate("shop", { title: "Christian Dale - Shop" });
});

router.redirect("/projects", "/about#section-work", Status.PermanentRedirect).get("/about", async (ctx) => {
  ctx.response.body = await App.renderTemplate("about", { title: "Christian Dale - About" });
});

router.get("/contact", async (ctx) => {
  ctx.response.body = await App.renderTemplate("contact", { title: "Christian Dale - Contact" });
});

router.get("/privacy", async (ctx) => {
  ctx.response.body = await App.renderTemplate("privacy", { title: "Christian Dale - Privacy Policy" });
});

router.get("/blog", async (ctx) => {
  const posts = [];

  for await (const post of Deno.readDir(`${Deno.cwd()}/posts/`)) {
    if (post.isFile && post.name.includes(".md")) {
      const fileContent = await Deno.readTextFile(`${Deno.cwd()}/posts/${post.name}`);
      const match = fileContent.match(/---\n({[\s\S]*})\n---/);

      if (match != null) {
        const postJson = JSON.parse(match[1]);

        if (postJson.draft == false) {
          posts.push(postJson);
        }
      }
    }
  }

  ctx.response.body = await App.renderTemplate("blog", {
    title: "Christian Dale - Blog",
    posts: posts.sort((a, b) => new Date(a.date) - new Date(b.date)).reverse()
  });
});

router.get("/blog/:id", async (ctx) => {
  const post = await Deno.readTextFile(`${Deno.cwd()}/posts/${ctx.params.id}.md`);
  const postJson = post.match(/---\n({[\s\S]*})\n---/);
  const postMd = post.match(/---\n{[\s\S]*}\n---([\s\S*]+)/);

  if (postJson != null) {
    const postMeta = JSON.parse(postJson[1]);
    postMeta.attrib = marky(postMeta.attrib);

    ctx.response.body = await App.renderTemplate("post", {
      title: `Christian Dale - ${postMeta.title}`,
      post: {
        content: marky(postMd[1]),
        meta: postMeta
      }
    });
  }
});

router.post("/mailing-list", async (ctx) => {
  const body = ctx.request.body({type: "form"});
  const value = await body.value;

  interface Email {
    _id: { $oid: string };
    email: string;
  }

  const client = new MongoClient();
  await client.connect({
    db: "christiandale",
    tls: true,
    servers: [
      {
        host: Deno.env.get("DBHOST") as string,
        port: 27017,
      },
    ],
    credential: {
      username: Deno.env.get("DBUSER"),
      password: Deno.env.get("DBPASS"),
      db: "christiandale",
      mechanism: "SCRAM-SHA-1",
    },
  });

  const db = client.database("christiandale");
  const emails = db.collection<Email>("emails");

  emails.insertOne({
    email: value.get("email")!
  });

  ctx.response.body = `<html><head></head><body><p>Thank you for subscribing. <a href="/">Continue ...</a></p></body></html>`;
});

const app = new Application();

app.use(router.routes());
app.use(router.allowedMethods());

app.use(async (ctx, next) => {
  try {
    ctx.response.headers.set("Cache-Control", "max-age=7890000");

    await ctx.send({
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
  ctx.response.body = await App.renderTemplate("404", { title: "Christian Dale" });
});

await app.listen({ port: 80 });
