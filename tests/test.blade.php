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
</script>

{{-- Blade & JavaScript Frameworks --}}
Hello, @{{ name }}.

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

@error('field')
    {{ $message }}
@enderror

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
            This is first iteration of the parent loop.
        @endif
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

@php
    foreach (range(1, 10) as $number) {
        echo $number;
    }
@endphp

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
@elsecan('create', $post)
    <!-- The Current User Can Create New Post -->
@endcan

@cannot('update', $post)
    <!-- The Current User Can't Update The Post -->
@elsecannot('create', $post)
    <!-- The Current User Can't Create New Post -->
@endcannot

@if (Auth::user()->can('update', $post))
    <!-- The Current User Can Update The Post -->
@endif

@unless (Auth::user()->can('update', $post))
    <!-- The Current User Can't Update The Post -->
@endunless

@can('create', Post::class)
    <!-- The Current User Can Create Posts -->
@endcan

@cannot('create', Post::class)
    <!-- The Current User Can't Create Posts -->
@endcannot

{{--  Authentication Shortcuts  --}}
@auth
    // The user is authenticated...
@endauth

@guest
    // The user is not authenticated...
@endguest

{{--  Switch Statements  --}}
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

{{--  Retrieving Translation Strings  --}}

{{ __('messages.welcome') }}
@lang('messages.welcome')

@props(['type' => 'info', 'message'])

@production
    production section
@endproduction

@env('staging')
    staging section
@endenv

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
