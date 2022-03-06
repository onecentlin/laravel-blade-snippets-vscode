## 1.32.0

- Add `@disabled` directive and `b:disabled` snippet ([@JustinByrne](https://github.com/JustinByrne) - [PR #151](https://github.com/onecentlin/laravel-blade-snippets-vscode/pull/151))
- Add `b:class` snippet (PR #136 and PR #140 - Thanks to [@lakuapik](https://github.com/lakuapik) and [@wilsenhc](https://github.com/wilsenhc))

## 1.31.0

- Add `b:aware` and `b:js` snippet
- Add `@aware` directive ([Laravel 8.64](https://laravel-news.com/laravel-8-64-0))
- Add `@js` directive ([Laravel 8.71](https://laravel-news.com/laravel-8-71-0))
- Update `Blade::render` and `Blade::renderComponent` snippet

## 1.30.0

Add Laravel 9 features

- Add `b:checked` and `b:selected` snippet
- Add `@checked` and `@selected` directive syntax highlight
- Add `Blade::render` and `Blade::renderComponent` snippet

## 1.29.0

Happy New Year 2022!

- Add `b:canany` and `b:canany-cananyelse` snippet ([@JustinByrne](https://github.com/JustinByrne) - [PR #144](https://github.com/onecentlin/laravel-blade-snippets-vscode/pull/144))
- Fix snippet
- Update blade syntaxes
- Update packages

## 1.28.0

- Added support attribute expressions syntax highlighting ([@cpof-tea](https://github.com/cpof-tea) - [PR #138](https://github.com/onecentlin/laravel-blade-snippets-vscode/pull/138))

## 1.27.0

- Add `@class` directive syntax highlight
- Update blade syntaxes
- Fix snippet

## 1.26.0

- Add `b:once` snippet ([@lakuapik](https://github.com/lakuapik) - [PR #137](https://github.com/onecentlin/laravel-blade-snippets-vscode/pull/137))
- Add `Blade::stringable` snippet ([@lakuapik](https://github.com/lakuapik) - [PR #135](https://github.com/onecentlin/laravel-blade-snippets-vscode/pull/135))
- Update packages

## 1.25.0

- Add `@once` directive
- Fix ([#121](https://github.com/onecentlin/laravel-blade-snippets-vscode/issues/121) @php() highlighting
- Update blade syntaxes

## 1.24.0

- Update blade syntaxes

## 1.23.0

- Add `@livewireStyles`, `@livewireScripts`, `@livewire` directive (v8.x)
- Add `livewire:styles`, `livewire:scripts`, `livewire:component` snippets
- Cleanup snippets

## 1.22.0

- Add `@includeUnless` directive (v6.x)
- Add environment directives: `@production`, `@env` (v7.x)
- Rename language mode using `Blade` instead of `Laravel Blade`
- Enable language feature in blade language mode
- Reduce extension package size

## 1.21.0

- Add `b:error` snippets ([@CaddyDz](https://github.com/CaddyDz) - [PR #95](https://github.com/onecentlin/laravel-blade-snippets-vscode/pull/95))
- Add `b:props` snippets
- Add blade extensions snippets
    - `Blade::component`
    - `Blade::include`
    - `Blade::if`
    - `Blade::directive`

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
