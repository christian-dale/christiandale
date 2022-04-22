## Introduction

Connecting an Heroku app to has been difficult for me, and probably for many other,
so I made this tutorial to clarify a few things. This article assumes you already have a
Heroku project set up and ready, and a domain name with DNS configuration support.

### Note on GoDaddy domain hosting

It is important to note that **GoDaddy does not support CNAME DNS records for the root domain**, and
can only be used with the www subdomain.
I managed to fix this problem by using CloudFlare as a middle-man.
You can check out [this guide](/blog/connecting-cloudflare-with-godaddy) on how to set up cloudflare with GoDaddy.

## Adding a new domain in Heroku

In order to add a new domain in Heroku, go to the settings page for the project, where you can find
a Domains section. Once here, press the **"Add domain" button**, and then enter your domain name, ie "example.com".
After this is done, you will receive a **DNS target** string, this looks something like "cold-frog-...".
Copy this string and keep it for when we are going to setup the DNS.

### Extra step for www subdomains

If you wish to use a www subdomain, just repeat the steps above, but use "www.example.com" instead for domain name.

### A note on https

You may be asked to setup a https certificate when adding a domain in Heroku. I usually just press
Automatic Certificate Management (ACM) here, as this will work just fine. But the option is available for you
if you wish to supply your own certificates.

## Connecting the domain in DNS settings

Now we have come to the main part, connecting the domain itself to Heroku. Now, this will vary depending
on which domain name service provider you have, but the process is mostly the same.

The steps are as follows:

* Add a new CNAME record in your DNS, with name set to "@" for root domain, and value set to the string
we saved from Heroku add domain earlier, the string that looks something like "cold-frog...".

The other steps are optional, and only neccesarry if you wish to have a www subdomain.
If you wish to use another subdomain just replace "www" with what you need.

* Add another CNAME record in your DNS, with name set to "www" and value set to the same Heroku string.

If you wish to redirect the www subdomain to the root domain, please follow the next step.

* Add a URL redirect in your domain name service. In Cloudflare this can be done in Rules -> Page Rules and Create page rule,
where you can create a Forwarding URL,
but the steps are similar for other providers. The URL should redirect from "www.example.com/*" to, depending on if you want http
or https support: "http://example.com/$1", or "https://example.com/$1".

## Closing remarks

If you have any questions, you are welcome to comment them down in the comments section on this page,
or email me on [inquiry@christiandale.me](mailto:inquiry@christiandale.me).