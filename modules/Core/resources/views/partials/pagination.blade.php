@if ($paginator->hasPages())
    <nav class="pagination" role="navigation" aria-label="pagination">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="pagination-previous" title="This is the first page" disabled>
                <span class="icon">
                    <i class="mdi mdi-chevron-left"></i>
                </span>
                <span>Previous</span>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-previous" title="Goto previous page">
                <span class="icon">
                    <i class="mdi mdi-chevron-left"></i>
                </span>
                <span>Previous</span>
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-next">
                <span>Next</span>
                <span class="icon">
                    <i class="mdi mdi-chevron-right"></i>
                </span>
            </a>
        @else
            <span class="pagination-next" disabled>
                <span>Next</span>
                <span class="icon">
                    <i class="mdi mdi-chevron-right"></i>
                </span>
            </span>
        @endif

        {{-- Pagination Elements --}}
        <ul class="pagination-list">
        @foreach ($elements as $element)

            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li>
                    <span class="pagination-ellipsis">&hellip;</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                            <span class="pagination-link is-current" aria-label="Page {{ $page }}" aria-current="page">{{ $page }}</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="pagination-link" aria-label="Goto page {{ $page }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

    </nav>
@endif



