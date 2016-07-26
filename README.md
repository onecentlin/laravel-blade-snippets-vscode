# Laravel Blade Snippets

Laravel blade snippets and syntax highlight support for Visual Studio Code.

## Screenshot

![Demo](https://github.com/onecentlin/laravel-blade-snippets-vscode/raw/master/images/screenshot.gif)

## Features

* Blade syntax highlight
* Laravel blade snippets
* Emmet works in blade template

## Installation

* Press `Ctrl + Shift + P` or `⌘ + Shift + P`
* Pick `Extensions: Install Extensions`
* Search `Laravel Blade Snippets` and Install

## Blade Syntax Hightlight

* Auto detected with `.blade.php` extension
* Manually switch language mode to `Laravel Blade` (`Ctrl + K, M` or `⌘ + K, M`)

## Laravel Blade Snippets

| Trigger        | Snippet                         |
|----------------|---------------------------------|
| b:extends      | @extends                        |
| b:yield        | @yield                          |
| b:section      | @section...@endsection          |
| b:section-show | @section...@show                |
| b:if           | @if...@endif                    |
| b:if-else      | @if...@else...@endif            |
| b:has-section  | @hasSection...@else...@endif    |
| b:for          | @for...@endfor                  |
| b:foreach      | @foreach...@endforeach          |
| b:forelse      | @forelse...@empty...@endforelse |
| b:while        | @while...@endwhile              |
| b:each         | @each                           |
| b:push         | @push...@endpush                |
| b:stack        | @stack                          |
| b:inject       | @inject                         |
| b:comment      | {{-- comment --}} or `Ctrl+/`   |
| b:echo         | {{ $data }}                     |
| b:echo-html    | {!! $html !!}                   |
| b:echo-raw     | @{{ variable }}                 |

## Laravel Helper Snippets for Blade

| Trigger         | Laravel Helper                  |
|-----------------|---------------------------------|
| lv:elixir       | elixir()                        |
| lv:trans        | trans()                         |
| lv:action       | action()                        |
| lv:secure_asset | secure_asset()                  |
| lv:url          | url()                           |
| lv:asset        | asset()                         |
| lv:route        | route()                         |
| lv:csrf-field   | csrf_field()                    |
| lv:csrf-token   | csrf_token()                    |

## Contact

Please file any [issues](https://github.com/onecentlin/laravel-blade-snippets-vscode/issues) or have a suggestion please tweet me [@onecentlin](https://twitter.com/onecentlin).

## Credits

* Blade language grammar is based on [Medalink syntax definition](https://github.com/Medalink/laravel-blade) for Sublime Text.
* Textmate language format file is based on [Textmate bundle for Laravel 5](https://github.com/loranger/Laravel.tmbundle).

## License

Please read [License](https://github.com/onecentlin/laravel-blade-snippets-vscode/blob/master/LICENSE.md) for more information