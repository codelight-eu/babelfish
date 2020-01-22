# Babelfish
Babelfish is a lightweight string registry package. 
It allows you to use string aliases in your codebase instead of using the actual strings.
This makes it much easier to find and edit the strings themselves.

## Installation
```composer require codelight/babelfish```

## Usage
Register aliases and corresponding strings:
```php
<?php

babelfish()->register([
    'button.payment' => __('Complete payment',     'your_text_domain'),
    'button.cta'     => __('Buy now for only %s!', 'your_text_domain'),
]);
```

Get the strings:
```php
<button>
  <?php echo _t('button.payment'); // Complete payment! ?>
</button>
<button>
  <?php echo _t('button.cta', '$420.69'); // Buy now for only $420.69!  ?>
</button>
```
As you can see from the above example, the translation function also supports sprintf-style variable substitution.
You can use any number of variables in your `_t()` function.

---
[Babelfish](https://www.goodreads.com/quotes/1187961-the-babel-fish-is-small-yellow-and-leech-like-and-probably)
