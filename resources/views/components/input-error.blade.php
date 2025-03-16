@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => ' text-danger ']) }}>
        @foreach ((array) $messages as $message)
            <p>{{ $message }}</p>
        @endforeach
    </ul>
@endif
