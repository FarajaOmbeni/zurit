<link href="{{ asset('paginate_res/style.css') }}" rel="stylesheet">
@if ($paginator->hasPages())
    <nav class="pagination-container">
        <div class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="pagination-newer disabled">&larr;</span>
            @else
                <a class="pagination-newer" href="{{ $paginator->previousPageUrl() }}">&larr;</a>
            @endif

            <span class="pagination-inner">
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span class="disabled">{{ $element }}</span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <a class="pagination-active" href="{{ $url }}">{{ $page }}</a>
                            @else
                                <a href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </span>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="pagination-older" href="{{ $paginator->nextPageUrl() }}">&rarr;</a>
            @else
                <span class="pagination-older disabled">&rarr;</span>
            @endif
        </div>
    </nav>
@endif