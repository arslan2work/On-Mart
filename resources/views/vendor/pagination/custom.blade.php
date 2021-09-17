@if ($paginator->hasPages())
<div class="pagination">
    <ul>
        @if ($paginator->onFirstPage())
                <li class="disabled next" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a aria-hidden="true">&lsaquo;</a>
                </li>
            @else
                <li class="next">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif
        @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><a href="#">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><a href="#">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
            <li class="next">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
            @else
                <li class="disabled next" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                </li>
            @endif        





{{-- 
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li class="next"><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i></a></li> --}}
    </ul>
</div>
@endif