## 1.5

Support new directive added in Laravel 5.3

### PHP

In some situations, it's useful to embed PHP code into your views. You can use the Blade `@php` directive to execute a block of plain PHP within your template:

```
@php
    //
@endphp
```

### Include Sub-views

If you attempt to `@include` a view which does not exist, Laravel will throw an error. If you would like to include a view that may or may not be present, you should use the `@includeIf` directive:

```
@includeIf('view.name', ['some' => 'data'])
```

## 1.4

Update language mode recognition and emmet setting for VS Code 1.5+

## 1.3

Support Laravel 5.3 blade syntax

* `@verbatim` - displaying JavaScript variables in a large portion in template

```
@verbatim
    <div class="container">
        Hello, {{ name }}.
    </div>
@endverbatim
```

* `$loop` variable : index, remaining, count, first, last, depth, parent

```
$loop->index
$loop->remaining
$loop->count
$loop->first
$loop->last
$loop->depth
$loop->parent
```

* Add pagination links helper snippet: `lv:pagination-links`
