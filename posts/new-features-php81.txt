PHP 8.1 will be released later this year, but there have already been several features added to the RFC for PHP 8.1.
This is not a complete list, and there will probably be more features added before it's release later this year.

## Array unpacking with string keys

Array unpacking did not previously support unpacking arrays with string keys, but this will now be supported.
The reason for this not being supported before was because of uncertainty regarding semantics and because
of limitations to how array unpacking worked before.

## New function array_is_list

PHP 8.1 will include a new function array_is_list that checks if an arrays keys are in numerical order,
and returns a bool. It works in like this.

<pre class="code code-block prettyprint"><code>echo array_is_list([1, 2, 3, 4]); // true.
echo array_is_list([1, 4, 3, 2]); // false.
</code></pre>

## Explicit octal integer literal notation

A new literal notation for defining octal integers will be added in PHP 8.1.
The method for defining octals will be by appending "0o" to an integer that should be represented in octal.

<pre class="code code-block prettyprint"><code>0o16 == 14 // true
</code></pre>

## Restrictions to $GLOBALS usage

This change will restrict directly assigning the $GLOBALS variable to a new value. This will allow for some performance
benefits in all array operations of PHP. As this change is backward incompatible, you may want to
check if your code is compatible before updating, but this change won't affect too many codebases.
