Lately I have been interested in learning about hacking,
in order to improve the security of my own applications.

So let's get started.

In this part we will look at what reverse engineering is,
how to reverse engineer an executable, and how to make the reverse engineered
code more readable.

## Example 1, simple password.

Let's say we have an executable that uses an api where the password is stored in the executable.
You may think that this is secure because the password is obsfucated when it is compiled.
This is not the case, and I will show you how we can retrieve this password.

<pre class="code code-block prettyprint"><code>
#include <stdio.h>

void use_api(char* password) {

}

int main() {
    char* password = "2xYhsgdBfdsuih";

    use_api(password);

    return 0;
}
</code></pre>

On Linux we can use the "strings" utility, which checks the executable for any set of bytes that can be encoded as strings.

<img src="/assets/img/blog/strings.png" style="width: 100%;">

And we can see the password string here in strings result.

## Example 2, more complex program.

This is a more complex example where the string is not stored directly,
but there is instead a specific algorithm that decodes the password.

If we use the strings util again, we see a string "dmfhmddq", which is not the correct password,
but this string will be useful when we read the code.

Here we will use a piece of software called Ghirda, which gives us the source code of an application.

You may wonder what the hex number 0x7164646d68666d64 means. If we cast this number to a string, we can see that
this represents "dmfhmddq".

<img src="/assets/img/blog/decode.png" style="width: 100%;">

We can see that the important piece of code here is: <pre class="code code-block prettyprint"><code>password[i] = password[i] + 1</code></pre>

The character '\x01' is the number 1 in decimal.

By using this information we can deduce that the password is "engineer".