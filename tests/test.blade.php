<h1>Blade Syntax Highlighting Tests</h1>

{{-- Displaying Data --}}
Hello, {{ $name }}.
The current UNIX timestamp is {{ time() }}.

{{-- Escape Data --}}
Hello, {{{ $name }}}.

{{-- Echoing Data If It Exists --}}
{{ isset($name) ? $name : 'Default' }}
{{ $name or 'Default' }}

<div class="{{ $name }}" {{ isset($name) ? $name : 'Default' }}></div>

{{-- Displaying Unescaped Data --}}
Hello, {!! $name !!}.

{{--  Rendering JSON  --}}
<script>
    var app = @json($array);
    var app = @json($array, JSON_PRETTY_PRINT);
</script>

{{-- Blade & JavaScript Frameworks --}}
Hello, @{{ name }}.

{{-- Blade --}}
@@json()

<!-- HTML output -->
@json()

@verbatim
    <div class="container">
        Hello, {{ name }}.
    </div>
@endverbatim

{{-- Control Structures --}}

{{-- If Statements --}}
@if (count($records) === 1)
    I have one record!
@elseif (count($records) > 1)
    I have multiple records!
@else
    I don't have any records!
@endif

@unless (Auth::check())
    You are not signed in.
@endunless


@isset($records)
    // $records is defined and is not null...
@endisset

@empty($records)
    // $records is "empty"...
@endempty


{{-- Authentication Directives --}}

@auth
    // The user is authenticated...
@endauth

@guest
    // The user is not authenticated...
@endguest

@auth('admin')
    // The user is authenticated...
@endauth

@guest('admin')
    // The user is not authenticated...
@endguest


{{-- Section Directives --}}

@hasSection('navigation')
    <div class="pull-right">
        @yield('navigation')
    </div>

    <div class="clearfix"></div>
@endif

@sectionMissing('navigation')
    <div class="pull-right">
        @include('default-navigation')
    </div>
@endif


{{-- Environment Directives --}}

@production
    // Production specific content...
@endproduction

@env('staging')
    // The application is running in "staging"...
@endenv

@env(['staging', 'production'])
    // The application is running in "staging" or "production"...
@endenv


{{-- Section Directives --}}

@hasSection('navigation')
    <div class="pull-right">
        @yield('navigation')
    </div>

    <div class="clearfix"></div>
@endif

@sectionMissing('navigation')
    <div class="pull-right">
        @include('default-navigation')
    </div>
@endif


{{-- Switch Statements --}}

@switch($i)
    @case(1)
        First case...
        @break

    @case(2)
        Second case...
        @break

    @default
        Default case...
@endswitch


{{-- Loops --}}

@for ($i = 0; $i < 10; $i++)
    The current value is {{ $i }}
@endfor

@foreach ($users as $user)
    <p>This is user {{ $user->id }}</p>
@endforeach

@forelse ($users as $user)
    <li>{{ $user->name }}</li>
@empty
    <p>No users</p>
@endforelse

@while (true)
    <p>I'm looping forever.</p>
@endwhile

{{-- continue & break --}}
@foreach ($users as $user)

    @if ($user->type == 1)
        @continue
    @endif

    <li>{{ $user->name }}</li>

    @if ($user->number == 5)
        @break
    @endif

    @continue($user->type == 1)
    <li>{{ $user->name }}</li>
    @break($user->number == 5)

@endforeach

@foreach ($users as $user)
    @continue($user->type == 1)

    <li>{{ $user->name }}</li>

    @break($user->number == 5)
@endforeach


{{-- The Loop Variable --}}

@foreach ($users as $user)
    @if ($loop->first)
        This is the first iteration.
    @endif

    @if ($loop->last)
        This is the last iteration.
    @endif

    <p>This is user {{ $user->id }}</p>

    {{-- $loop->parent --}}
    @foreach ($user->posts as $post)
        @if ($loop->parent->first)
            This is the first iteration of the parent loop.
        @endif
    @endforeach
@endforeach


{{-- Loop Variables --}}

    {{-- The index of the current loop iteration (starts at 0) --}}
    {{ $loop->index }}
    {{-- The current loop iteration (starts at 1) --}}
    {{ $loop->iteration }}
    {{-- The iteration remaining in the loop --}}
    {{ $loop->remaining }}
    {{-- The total number of items in the array being iterated --}}
    {{ $loop->count }}
    {{-- Whether this is the first iteration through the loop --}}
    {{ $loop->first }}
    {{-- Whether this is the last iteration through the loop --}}
    {{ $loop->last }}
    {{-- The nesting level of the current loop --}}
    {{ $loop->depth }}
    {{-- When in a nested loop, the parent's loop variable --}}
    {{ $loop->parent }}

@endforeach

{{-- Comments --}}
{{-- This comment will not be present in the rendered HTML --}}

{{--
This comment will not be in the rendered HTML
This comment will not be in the rendered HTML
This comment will not be in the rendered HTML
--}}

{{-- PHP --}}
<?php echo $name; ?>
<?= $name; ?>
<?php echo ($var)->format('m/d/Y H:i'); ?>

<?php
    foreach (range(1, 10) as $number) {
        echo $number;
    }
?>

@php ($hello = "hello world")

@php
    foreach (range(1, 10) as $number) {
        echo $number;
    }
@endphp


{{-- Conditional Classes : `@class` directive --}}

@php
    $isActive = false;
    $hasError = true;
@endphp

<span @class([
    'p-4',
    'font-bold' => $isActive,
    'text-gray-500' => ! $isActive,
    'bg-red' => $hasError,
])></span>

<span class="p-4 text-gray-500 bg-red"></span>


{{-- The @once Directive --}}

@once
    @push('scripts')
        <script>
            // Your custom JavaScript...
        </script>
    @endpush
@endonce

{{-- Forms --}}
<form method="POST" action="/foo/bar">
    @csrf
    @method('PUT')
</form>

{{-- Validation Errors --}}

<label for="title">Post Title</label>

<input id="title" type="text" class="@error('title') is-invalid @enderror">

@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


{{-- Components --}}
<x-package-alert />
<x-nightshade::calendar />
<x-nightshade::color-picker />
<x-inputs.button />
<x-test></x-test>
<x-alert type="error" :message="$message"/>
<x-dynamic-component :component="$componentName" class="mt-4" />

{{-- Component attribute expressions --}}
<x-test
    str="empty"
    :null="null"
    :bool-t="true"
    :bool-f="false"
    :num-dec-a="1234"
    :num-dec-b="12_34"
    :num-dec-c="0123"
    :num-hex="0x1A"
    :num-bin="0b101"
    :num-float-a="1.234"
    :num-float-b="1.2e3"
    :num-float-c="7E-10"
    :num-float-d="1_234.567"
    :expr-math-a="true + -2 - (3 * 40) / 5 % 6 ^ '7' ** $a"
    :expr-bit="$a & $b | $a ^ $b << $a >> $b"
    :expr-str="1 . 'test' . '\\' . $a . true"
    :expr-arr="[] + []"
    :expr-func-call="func()"
    :expr-func-arrow="fn($a) => $a"
    :expr-cond="$a ? !$b : $c || $a ?: $b || $a ?? $b and $a or $a xor $b"
    :expr-comp-a="$a == $b"
    :expr-comp-b="$a === $b"
    :expr-comp-c="$a != $b"
    :expr-comp-d="$a <> $b"
    :expr-comp-e="$a !== $b"
    :expr-comp-f="$a < $b"
    :expr-comp-g="$a > $b"
    :expr-comp-h="$a >= $b"
    :expr-comp-i="$a <= $b"
    :expr-comp-j="$a <=> $b"
    :expr-type="$a instanceof MyClass"
    :expr-class-a="new MyClass()"
    :expr-class-b="(new MyClass())->prop"
    :expr-class-c="(new MyClass())->do()"
    :expr-class-d="MyClass::class"
    :expr-class-e="MyClass::$prop"
    :expr-class-f="MyClass::do()"
    :expr-class-g="$this->prop"
    :expr-class-h="$this->do()"
    :expr-class-i="$instance->prop"
    :expr-class-j="$instance->do()"
    :arr="['valueA', true, 0 => 'valueB', 'keyC' => 'valueC']"
/>


{{-- Including Sub-Views --}}
<div>
    @include('shared.errors')
    <form>
        <!-- Form Contents -->
    </form>
</div>

@include('view.name')
@include('view.name', ['some' => 'data'])
@includeIf('view.name', ['some' => 'data'])
@includeWhen($boolean, 'view.name', ['some' => 'data'])
@includeUnless($boolean, 'view.name', ['some' => 'data'])
@includeFirst(['custom.admin', 'admin'], ['some' => 'data'])

{{-- Rendering Views For Collections --}}
@each('view.name', $jobs, 'job')
@each('view.name', $jobs, 'job', 'view.empty')

{{-- Stacks --}}
@push('scripts')
    <script src="/example.js"></script>
@endpush

@stack('scripts')

@prepend('scripts')
    This will be first...
@endprepend

{{-- Service Injection --}}
@inject('metrics', 'App\Services\MetricsService')
<div>
    Monthly Revenue: {{ $metrics->monthlyRevenue() }}.
</div>


{{-- Retrieving Translation Strings --}}
@lang('messages.welcome')

{{-- 5.3 --}}
{{ trans('messages.welcome') }}
{{-- 5.4 --}}
{{ __('messages.welcome') }}

{{-- Pluralization --}}
@choice('messages.apples', 10)

{{-- 'apples' => '{0} There are none|[1,19] There are some|[20,Inf] There are many', --}}
{{ trans_choice('messages.apples', 10) }}

{{-- Replacing Parameters In Translation Strings --}}
{{-- 'greeting' => 'Welcome, :name', --}}
{{ __('messages.greeting', ['name' => 'Winnie']) }}


{{-- Authorizing --}}

@can('update', $post)
    <!-- The Current User Can Update The Post -->
@elsecan('create', App\Models\Post::class)
    <!-- The Current User Can Create New Post -->
@endcan

@canany(['update'], $post)
    <!-- The Current User Can Update The Post -->
@elsecanany(['create'], App\Models\Post::class)
    <!-- The Current User Can Create New Post -->
@endcanany

@cannot('update', $post)
    <!-- The Current User Can't Update The Post -->
@elsecannot('create', App\Models\Post::class)
    <!-- The Current User Can't Create New Post -->
@endcannot

@if (Auth::user()->can('update', $post))
    <!-- The Current User Can Update The Post -->
@endif

@unless (Auth::user()->can('update', $post))
    <!-- The Current User Can't Update The Post -->
@endunless

@can('create', App\Models\Post::class)
    <!-- The Current User Can Create Posts -->
@endcan

@canany(['create'], App\Models\Post::class)
    <!-- The Current User Can Create Posts -->
@endcanany

@cannot('create', App\Models\Post::class)
    <!-- The Current User Can't Create Posts -->
@endcannot

{{--  Retrieving Translation Strings  --}}

{{ __('messages.welcome') }}
@lang('messages.welcome')

@props(['type' => 'info', 'message'])


{{--  Envoy  --}}

@setup
require __DIR__.'/vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__);
@endsetup

@servers(['web' => $server])

@task('init')
if [ ! -d {{ $path }}/current ]; then
cd {{ $path }}
@endtask

@story('deploy')
deployment_start
deployment_composer
deployment_finish
@endstory

{{-- Livewire --}}

@livewireStyles
@livewireScripts

@livewire('user-profile', ['user' => $user], key($user->id))

{{-- Checked / Selected / Disabled Blade Directives (9.x) --}}

<input type="checkbox"
        name="active"
        value="active"
        @checked(old('active', $user->active)) />

<select name="version">
    @foreach ($product->versions as $version)
        <option value="{{ $version }}" @selected(old('version') == $version)>
            {{ $version }}
        </option>
    @endforeach
</select>

<button type="submit" @disabled($errors->isNotEmpty())>
    Submit
</button>