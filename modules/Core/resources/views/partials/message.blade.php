@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="notification
                    is-{{ $message['level'] }}
                    {{ $message['important'] ? 'is-important' : '' }}"
                    role="alert"
        >
            @if ($message['important'])
                <button class="delete"></button>
            @endif

            {!! $message['message'] !!}
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
