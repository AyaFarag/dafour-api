<nav aria-label="Page navigation example">
    @if ($paginator->hasPages())
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="javascript:void(0);" tabindex="-1"><img src="{!! asset('site/images/arrowleft.png') !!}"/> </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1"><img src="{!! asset('site/images/arrowleft.png') !!}"/> </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled">
                        <a class="page-link" href="javascript:void(0);">{{ $element }}</a>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0);" style="background-color: #cc7834 !important">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><img src="{!! asset('site/images/arrowright.png') !!}"/> </a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="javascript:void(0);" tabindex="-1"><img src="{!! asset('site/images/arrowright.png') !!}"/> </a>
                </li>
            @endif
        </ul>
    @endif
</nav>