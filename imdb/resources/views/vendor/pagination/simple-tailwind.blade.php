@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="relative inline-flex items-center px-3 py-1 my-1 text-sm font-bold text-black bg-yellow-600 cursor-default leading-5 rounded-xl">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-3 py-1 my-1 text-sm font-bold text-black bg-yellow-500  leading-5 rounded-xl hover:bg-yellow-600 active:bg-yellow-600">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-3 py-1 my-1 text-sm font-bold text-black bg-yellow-500 leading-5 rounded-xl hover:bg-yellow-600 active:bg-yellow-600">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="relative inline-flex items-center px-3 py-1 my-1 text-sm font-bold text-black bg-yellow-600 cursor-default leading-5 rounded-xl">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
