---
{
    "title": "Using Deno KV with Deno deploy guide",
    "description": "Deno KV is a new key-value storage system released with version 1.32 of the Deno runtime. It allows for persistant data storage, meaning that the date is stored on disk between system reboots.",
    "permalink": "using-deno-kv-with-deno-deploy-guide",
    "date": "2023-07-02",
    "dateUpdate": "2023-07-02",
    "draft": false,
    "lang": "en",
    "categories": ["programming", "deno"],
    "image": "/assets/img/blog/abstract3.jpg",
    "attrib": ""
}
---

Deno KV is a new key-value storage system released with version 1.32 of the Deno runtime.
It allows for persistant data storage, meaning that the data is stored on disk between system reboots.

At the time of writing, Deno KV is still experimental and the API is subject to change.
It is therefore recommened to keep data backed up, as is always advicable.
Deno KV is also designed to be very fast and optimized.

**Table of Contents**

<ul>
    <li><a href="#overview">Overview of Deno KV</a></li>
    <ul>
        <li><a href="#example">Example of a simple KV application</a></li>
        <li><a href="#advanced-example">More advanced example</a></li>
        <li><a href="#atomic-operations">Atomic operations</a></li>
    </ul>
    <li><a href="#deno-deploy-kv-beta">Getting access to Deno Deploy KV beta</a></li>
    <li><a href="#conclustion">Conclusion</a></li>
    <li><a href="#additional-resources">Additional resources</a></li>
</ul>

<div id="overview"></div>

## Overview of Deno KV

<i class="fa-solid fa-circle-info"></i> Because of Deno KV being experimental, it is only accessable by using the **<em>--unstable</em>** flag.

Deno KV can be accessed through the Deno.KV API. The API is simple, and concists of the following main methods:

* **const kv = Deno.OpenKv()** - Returns a new instance of the Deno KV object.
* **kv.set(key, val)** - Allows you set a value at the specified key.
* **kv.get(key)** - Allows you to get the value associated with the specified key.
* **kv.delete(key)** - Delete the specified key from the Database.
* **kv.list(selector)** - Receives a list of items matching the selector.
* **kv.atomic()** - Allows you to chain multiple methods to be saved on the datastore all in one go.
* **kv.close()** - Close the the database connection, which will prevent any further operatings from taking place and cancelling currently running operations.

There are also other more specialiced API methods which are beyond the scope of this article.
Please refer to the [Deno KV docs](https://deno.land/api@v1.34.3?unstable&s=Deno.Kv) for more info.

The keys in the key-value store are javascript types which means they can be strings, numbers or booleans.
The values can be arrays, objects or other javascript primitive types.

<div id="example"></div>

### Example of a simple KV application

Here is a simple example that shows how to use the API.
In this example we add a couple of users to a database.

```
const kv = await Deno.openKv(); // Create a new instance of the Deno KV API.
    
kv.set(["users", "jim"], "Jim"); // Sets the key "jim" with the prefix "users"
kv.set(["users", "peter"], "Peter"); // Sets the key "peter" with the prefix "users"

// Receives a list of all keys with "prefix" users.
for await (const res of kv.list({prefix: ["users"]})) {
  console.log(res.key);
}
```

What confused me at first about the kv.set() method is that it does not accept a string as its argument,
but instead expects an array as an argument.

Altough this might seem weird at first, it allows for a powerful way to categorize and query data.
For example when using the **<em>kv.list()</em>** we can query data with a **prefix** or a **range selector**.

<div id="advanced-example"></div>

### More advanced example

The simple example above shows the **prefix** selector, but it also support the **range** selector, which is used in a similar fashion:

```// Receives a list of all items with "prefix" users, and that has a key of j up to p.
kv.list({start: ["users", "j"], end: ["users", "p"]});
```

<div id="atomic operations"></div>

### Atomic operations

**Atomic operations** are a powerful way to combine multiple methods in one go. This can improve performance by letting the system combine operations. The order of which you call methods on an atomic operation is guaranteed to be executed in the same order.

The Deno.AtomicOperation object also contains a number of unique and useful methods:

* **check()**
* **commit()**
* **delete()**
* **enqueue()**
* **max()**
* **min()**
* **mutate()**
* **set()**
* **sum()**

You can read more on what these atomic methods does in the [Deno API Docs](https://deno.land/api@v1.34.3?s=Deno.AtomicOperation&unstable=).

Here is a simple example showing the use of Atomic:

```// Sets a certain key to a value, and then deletes key peter from users.
kv.atomic().set(key, value).delete(["users", "peter"]).commit();
```

<div id="deno-deploy-kv-beta"></div>

### Getting access to Deno Deploy KV beta

** <i class="fa-solid fa-circle-exclamation"></i> This is only applicable to those who wants to run Deno KV on Deno Deploy **

At the time of writing Deno Deploy KV is currently only available as a closed beta.

You can join the waitlist by visit this link: [https://deno.com/kv](https://deno.com/kv)

Once you have access you will see a new tab called "KV (beta)" in your Deno Deploy project dash.

![Deno Deploy dash](/assets/img/blog/deno_deploy.png)

<div id="conclusion"></div>

## Conclusion

The Deno Key-value storage API is useful and it´s nice to have it integrated into the language, and that it requires no configuration.
My only gripe with it is that it is too simple for advanced querying, altough that might not be negative if that´s all you need.
If you require more advanced querying I would recommend MySQL or MongoDB.

<div id="additional-resources"></div>

## Additional Resources

[https://deno.land/manual/runtime/kv](https://deno.land/manual/runtime/kv)

[https://deno.com/deploy/docs/kv](https://deno.com/deploy/docs/kv)

[https://deno.com/kv](https://deno.com/kv)

[https://deno.land/api@v1.34.3?unstable&s=Deno.Kv](https://deno.land/api@v1.34.3?unstable&s=Deno.Kv)
