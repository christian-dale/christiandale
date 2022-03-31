## Introduction

This will be a simple guide on connecting CloudFlare with GoDaddy.

## How it's done

Firstly you must set up a CloudFlare account and connect it to your domain,
which can be done at [cloudflare.com](https://cloudflare.com). CloudFlare will
guide you through the process of setting this up.

Once you have set up your account, you will find something named "cloudflare nameservers"
in the DNS tab. These are two values that look like this:

| Type   |  Value               |
| ------ | -------------------- |
| NS     | ...ns.cloudflare.com |
| NS     | ...ns.cloudflare.com |

Copy these values for later, we need them for GoDaddy. 
Now, in the DNS settings for GoDaddy, find the nameserver setting, and replace
the values with the copied values from CloudFlare, and press save.

And that's it, not too difficult right?