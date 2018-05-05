@if($link)
    <a href="{{ route($link['route']) ?? '' }}" class="box {{ $color ?? ''}}">
@else
    <div class="box {{ $color ?? ''}}">
@endif

    <div class="has-text-centered">

            <div class="icon is-xlarge is-circle mt-6">
                <i class="mdi mdi-{{ $icon ?? 'file-document-box'}}"></i>
            </div>

            <div class="heading mt-5">{{ $heading ?? 'No heading set'}}</div>
            <div class="title">{{ $title ?? 'No title set' }}</div>

            @if($link)
                <div class="button is-white mb-6">
                    {{ __($link['title']) ?? 'No link title set'}}
                </div>
            @endif

    </div>

@if($link)
    </a>
@else
    </div>
@endif
