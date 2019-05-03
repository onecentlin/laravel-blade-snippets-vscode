## 1.20.0

- Update blade formatter fixed for updated languageservice

## 1.19.0

- Append html format options to html formatter ([@ayatkyo](https://github.com/ayatkyo) - [PR #87](https://github.com/onecentlin/laravel-blade-snippets-vscode/pull/87))
- Update package dependencies

## 1.18.0

- Add `b:csrf`, `b:method`, `b:dump` snipptes ([@HasanAlyazidi](https://github.com/HasanAlyazidi) - [PR #60](https://github.com/onecentlin/laravel-blade-snippets-vscode/pull/60))
- Fix comment with extra spaces (#59)
- Fix formatting issue in url syntax (#57)
- Fix shorthand `@php()` for Roots/Sage WordPress Template with html tag syntax highlight (#53)

## 1.17.0

- Syntax highlighting enhancement
- Add syntax highlighting for class static method
- Add `b:lang` snippet (#52)

## 1.16.0

- Fix tag attributes completition (#24)
- Fix comment issue in `script`, `style`, `php` block with `Ctrl + /` or `⌘ + /` keymap shortcut (#25, #34)

## 1.15.0

- Support Envoy directives: `@setup`, `@servers`, `@task`, `@story`, `@finished`, `@slack` (#41)

## 1.14.2

- Fix error in Blade Language Server (#46)
- Fix extensionPath of undefined (#47)
- Emmet setting changed (#48)
> Settings below for blade is no longer needed.
>```json
>"emmet.includeLanguages": {
>   "blade": "html"
>},
>```

## 1.14.0

- Fix blade syntax broken with VSCode 1.20.0 release (#42)
- Modify the highlight, add to the style and script autocomplete ([@tiansin](https://github.com/tiansin) - [PR #43](https://github.com/onecentlin/laravel-blade-snippets-vscode/pull/43))
- Fix javascript autocompletion not working in script tag (#39)
- Add `b:unless` snippet

## 1.13.0

- Fix spaces on format (#40)
- Enable format selection (#10)
- Enhance blade format (#32, #36)

## 1.12.0

- Add `blade.format.enable` configuration setting for manual enable blade file format. (#30)
```json
"blade.format.enable": true,
```
- Add `@includeFirst` directive
- Add `b:includeFirst` snippet
- Fix minor syntax issue

## 1.11.0

- Fix indent issue #9, #35 ([@izcream](https://github.com/izcream) - [PR #38](https://github.com/onecentlin/laravel-blade-snippets-vscode/pull/38))
- Fix minor whitespace inconsistencies ([@raniesantos](https://github.com/raniesantos) - [PR #28](https://github.com/onecentlin/laravel-blade-snippets-vscode/pull/28/files))

## 1.10.0

- Update syntax highlighting
- Added `Document Highlight Provider` and `Document Format Provider` ([@TheColorRed](https://github.com/TheColorRed) - [PR #17](https://github.com/onecentlin/laravel-blade-snippets-vscode/pull/17))

## 1.9.0

Laravel 5.4 blade directives & snippets:

- Add `@isset`, `@empty`, `@includeWhen` directives
- Add `b:isset`, `b:empty`, `b:includeWhen` snippets

Laravel 5.5 blade directives & snippets:

- Add `@auth`, `@guest`, `@switch`, `@case`, `@default` directives
- Add `b:auth`, `b:guest`, `b:switch` snippets

Syntax Enhancement

- Change grammar of blade directive ([@mikebronner](https://github.com/mikebronner) - [PR #23](https://github.com/onecentlin/laravel-blade-snippets-vscode/pull/23))

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