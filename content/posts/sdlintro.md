This will be the first article in a series about learning SDL2 development. It is assumed that you have experience
with C or C++ in this guide.
I will be writing in C because SDL2 is written in C, and I think it makes for a simpler code to not mix lanaguages.

** Installing SDL2 **

The process of installing SDL is a bit different depending on your operating system and development environment.
I will show the easiest methods for some operatings systems.

** Simple Example **

<pre class="code code-block prettyprint">#include "SDL2.h";
#include &lt;stdio.h&gt;
#include &lt;string.h&gt;

int main(int argc, char* argv[]) {
    if (SDL_Init(SDL_INIT_VIDEO | SDL_INIT_AUDIO) != 0) {
        return 1;
    }

    SDL_Quit();

    return 0;
}</code></pre>