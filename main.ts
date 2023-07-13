import { Application, Router, Cookies, Status } from "https://deno.land/x/oak/mod.ts";
import * as Eta from "https://deno.land/x/eta@v1.12.3/mod.ts";
import { render } from "https://deno.land/x/gfm/mod.ts";

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
    currentLang: "en",
    baseURL: Deno.env.get("BASE_URL") ?? "localhost",
    langObject: {},

    lang(word: string) {
        return App.langObject[word] ?? word;
    },
  
    async renderTemplate(template: string, options: object) {
        return await Eta.render(await Deno.readTextFile(`${Deno.cwd()}/views/${template}.eta`), options);
    }
}

for await (const lang of Deno.readDir(`${Deno.cwd()}/lang/`)) {
    if (lang.isFile && lang.name.includes(".json") && lang.name.split(".")[0] == App.currentLang) {
        App.langObject = JSON.parse(await Deno.readTextFile(`${Deno.cwd()}/lang/${lang.name}`));
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

                if (postJson.draft == false && postJson.lang == App.currentLang) {
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

                if (postJson.draft == false && postJson.lang == App.currentLang) {
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
        postMeta.attrib = render(postMeta.attrib);

        if (postMeta.lang == "en" && App.currentLang == "no") {
            ctx.response.redirect("https://christiandale.me/blog/" + ctx.params.id);
        }

        ctx.response.body = await App.renderTemplate("post", {
            title: `Christian Dale - ${postMeta.title}`,
            post: {
                content: render(postMd[1], {
                    disableHtmlSanitization: true
                }),
                meta: postMeta
            }
        });
    }
});

router.get("/sitemap.xml", async (ctx) => {
    const lang = App.currentLang == "no" ? "_no" : "";
    const sitemap = await Deno.readTextFile(`${Deno.cwd()}/public/sitemap/sitemap${lang}.xml`);

    console.log(`${Deno.cwd()}/public/sitemap${lang}.xml`);

    ctx.response.headers.set("Content-Type", "text/xml");
    ctx.response.body = sitemap;
});

const app = new Application();

app.use(router.routes());
app.use(router.allowedMethods());

app.use(async (ctx, next) => {
    try {
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
