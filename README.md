# [Laravel Blade Snippets](https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel-blade)

Laravel blade snippets and syntax highlight support for Visual Studio Code.

> Suggest Laravel related extension: [Laravel Snippets](https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel5-snippets)

## Screenshot

![Demo](https://github.com/onecentlin/laravel-blade-snippets-vscode/raw/master/images/screenshot.gif)

## User Settings

Open `Preferences` -> `Settings`

```json
"emmet.triggerExpansionOnTab": true, // enable tab to expanse emmet tags
"blade.format.enable": true,         // if you would like to enable blade format
```

Specific settings for blade language

```json
"[blade]": {
    "editor.autoClosingBrackets": "always"
},
```

## Features

- Blade syntax highlight
- Blade snippets
- Emmet works in blade template
- Blade formatting

## Blade Syntax Hightlight

- Auto detected with `.blade.php` extension
- Manually switch language mode to `Blade` (`Ctrl + K, M` or `⌘ + K, M`)

## Laravel Blade Snippets

| Trigger             | Snippet                                   |
| ------------------- | ----------------------------------------- |
| b:extends           | @extends                                  |
| b:yield             | @yield                                    |
| b:section           | @section...@endsection                    |
| b:section-show      | @section...@show                          |
| b:if                | @if...@endif                              |
| b:if-else           | @if...@else...@endif                      |
| b:unless            | @unless...@endunless                      |
| b:has-section       | @hasSection...@else...@endif              |
| b:for               | @for...@endfor                            |
| b:foreach           | @foreach...@endforeach                    |
| b:forelse           | @forelse...@empty...@endforelse           |
| b:while             | @while...@endwhile                        |
| b:each              | @each                                     |
| b:push              | @push...@endpush                          |
| b:stack             | @stack                                    |
| b:inject            | @inject                                   |
| b:comment           | {{-- comment --}} (`Ctrl + /` or `⌘ + /`) |
| b:echo              | {{ $data }}                               |
| b:echo-html         | {!! $html !!}                             |
| b:echo-raw          | @{{ variable }}                           |
| b:can               | @can...@endcan (v5.1)                     |
| b:can-elsecan       | @can...@elsecan...@endcan (v5.1)          |
| b:canany            | @canany...@endcanany (v5.8)               |
| b:canany-elsecanany | @canany...@elsecanany...@endcanany (v5.8) |
| b:cannot            | @cannot...@endcannot (v5.3)               |
| b:cannot-elsecannot | @cannot...@elsecannot...@endcannot (v5.3) |
| b:verbatim          | @verbatim...@endverbatim (v5.3)           |
| b:php               | @php...@endphp (v5.3)                     |
| b:includeIf         | @includeIf (v5.3)                         |
| b:includeWhen       | @includeWhen (v5.4)                       |
| b:includeFirst      | @includeFirst (v5.5)                      |
| b:includeUnless     | @includeUnless (v6.x)                     |
| b:component         | @component...@endcomponent (v5.4)         |
| b:slot              | @slot...@endslot (v5.4)                   |
| b:isset             | @isset...@endisset (v5.4)                 |
| b:empty             | @empty...@endempty (v5.4)                 |
| b:auth              | @auth...@endauth (v5.5)                   |
| b:guest             | @guest...@endguest (v5.5)                 |
| b:switch            | @switch...@case...@endswitch (v5.5)       |
| b:lang              | @lang                                     |
| b:csrf              | @csrf (v5.6)                              |
| b:method            | @method(...) (v5.6)                       |
| b:dump              | @dump(...) (v5.6)                         |
| b:error             | @error...@enderror (v5.8)                 |
| b:props             | @props (v7.4)                             |
| b:production        | @production...@endproduction              |
| b:env               | @env...@endenv                            |
| b:once              | @once...@endonce                          |
| b:class             | @class (v8.51)                            |
| b:aware             | @aware (v8.64)                            |
| b:js                | @js (v8.71)                               |
| b:checked           | @checked (v9.x)                           |
| b:selected          | @selected (v9.x)                          |
| b:disabled          | @disabled (v9.x)                          |

### $loop variable (Laravel v5.3+)

| Trigger      | Snippet                                                |
| ------------ | ------------------------------------------------------ |
| b:loop       | $loop->(index,remaining,count,first,last,depth,parent) |
| b:loop-first | @if($loop->first)...@endif                             |
| b:loop-last  | @if($loop->last)...@endif                              |

## Laravel Helper Snippets for Blade

| Trigger             | Laravel Helper        |
| ------------------- | --------------------- |
| lv:elixir           | elixir() - deprecated |
| lv:mix              | mix() (v5.4)          |
| lv:trans            | trans()               |
| lv:action           | action()              |
| lv:secure-asset     | secure_asset()        |
| lv:url              | url()                 |
| lv:asset            | asset()               |
| lv:route            | route()               |
| lv:csrf-field       | csrf_field()          |
| lv:csrf-token       | csrf_token()          |
| lv:pagination-links | $collection->links()  |

## Blade extensions

Register in the `boot` method of `ServiceProvider`

- `Blade::component`
- `Blade::include`
- `Blade::if`
- `Blade::directive`
- `Blade::stringable`

Rendering inline blade templates

- `Blade::render`
- `Blade::renderComponent`

## Contact

Please file any [issues](https://github.com/onecentlin/laravel-blade-snippets-vscode/issues) or have a suggestion please tweet me [@onecentlin](https://twitter.com/onecentlin).

## Credits

- Blade language grammar is based on [Medalink syntax definition](https://github.com/Medalink/laravel-blade) for Sublime Text; Converted from [Blade templating support in Atom](https://github.com/jawee/language-blade)
- Textmate language format file is based on [Textmate bundle for Laravel 5](https://github.com/loranger/Laravel.tmbundle).

## License

Please read [License](https://github.com/onecentlin/laravel-blade-snippets-vscode/blob/master/LICENSE.md) for more information
