## 1.9.0

Laravel 5.4 blade directives & snippets:

- Add `@isset`, `@empty`, `@includeWhen` directives
- Add `b:isset`, `b:empty`, `b:includeWhen` snippets

Laravel 5.5 blade directives & snippets:

- Add `@auth`, `@guest`, `@switch`, `@case`, `@default` directives
- Add `b:auth`, `b:guest`, `b:switch` snippets
## 1.8.2

- Update README ([#18](https://github.com/onecentlin/laravel-blade-snippets-vscode/issues/18), [#19](https://github.com/onecentlin/laravel-blade-snippets-vscode/pull/19))

## 1.8.1

- Fix syntax parse failed [#5](https://github.com/onecentlin/laravel-blade-snippets-vscode/issues/5)

## 1.8.0

- Add `@can` and `@cannot` related directives ([#4](https://github.com/onecentlin/laravel-blade-snippets-vscode/issues/4))
- Add `b:can`, `b:can-elsecan`, `b:cannot`, `b:cannot-elsecannot` authorizing snippets ([#4](https://github.com/onecentlin/laravel-blade-snippets-vscode/issues/4))
- Add `lv:mix` helper
- Fix for loop snippet

## 1.7.0

- Enhance blade syntax highlighting
- Fix loop snippets

## 1.6.1

- Fix extra slashes in `lv:*` helper snippets

## 1.6

- Support `@component` and `@slot` directive added in Laravel 5.4
- Fix [#3](https://github.com/onecentlin/laravel-blade-snippets-vscode/issues/3) issue

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