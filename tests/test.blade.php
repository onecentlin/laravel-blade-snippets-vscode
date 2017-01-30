<h1>Blade Syntax Highlighting Tests</h1>

{{-- Displaying Data --}}
Hello, {{ $name }}.
The current UNIX timestamp is {{ time() }}.

{{-- Escape Data --}}
Hello, {{{ $name }}}.

{{-- Echoing Data If It Exists --}}
{{ isset($name) ? $name : 'Default' }}
{{ $name or 'Default' }}

{{-- Displaying Unescaped Data --}}
Hello, {!! $name !!}.

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
