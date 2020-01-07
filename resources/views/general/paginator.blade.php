@if ($paginator->hasPages())
    <nav class="pagination justify-content-center paginate">
        @if ($paginator->onFirstPage())
            <li class="page-item"><a class="page-link disabled"><i class="fas fa-chevron-left"></i></a></li>
        @else
            <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-link"><i class="fas fa-chevron-left arrow"></i></a></li>
        @endif

        <ul class="pagination">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span class="pagination-ellipsis"><span>{{ $element }}</span></span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item"><a class="page-link active">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>

        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fas fa-chevron-right"></i></a></li>
        @else
            <li class="page-item"><a class="page-link disabled"><i class="fas fa-chevron-right"></i></a></li>
        @endif

    </nav>
@endif
