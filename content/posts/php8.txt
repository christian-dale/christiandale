With the release of PHP 8, there are a number of new and powerful features that can
help simplify and improve your codebase, so let's get right to it. These are in no particular order.

## Named arguments

If you're like me, you may often forget the order of arguments to a function call.
Well, no more! With PHP 8 we now have named arguments. A powerful feature that lets
you specify function arguments by name instead of by order.

<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; grid-auto-rows: minmax(100px, auto);">
    <div style="grid-column: 1; grid-row: 1;">
Before PHP 8:
<pre class="code code-block prettyprint"><code>function square(num) {
    return num * num;
}

echo square(2);</code></pre>
    </div>
    <div style="grid-column: 2; grid-row: 1;">
After:
<pre class="code code-block prettyprint"><code>function square(num: num) {
    return num * num;
}

echo square(num: 2);
</code></pre>
    </div>
</div>

## Constructor property promotion

Constructor property promotion is a new way of defining properties of a class,
it removes a lot of duplicate code by letting you define and initialize properties
right in the constructor function.

<pre class="code code-block prettyprint"><code>class DB {
    public function __construct(
        public string $name = "";
        public string table = "";
    ) {}
}</code></pre>

## Union types

PHP 8 adds support for native union types, which lets you define multiple types for a single variable,
hence, union types.

<pre class="code code-block prettyprint"><code>class DB {
    public int|float $number;

    public function __construct() {

    }
}</code></pre>

## Match expressions

Match expressions are a simpler alternative to the original switch expression.
Compared to switch statements, matches are expressions and can therefore be stored in variables.
Also, match expressions do a strict comparison.

<pre class="code code-block prettyprint"><code>echo match(8.0) {
    "8.0" => "No match.",
    8.0 => "Match"
};</code></pre>

** Sources **
* https://www.php.net/releases/8.0/en.php