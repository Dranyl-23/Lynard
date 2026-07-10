@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between font-mono text-[0.75rem] text-gray-500 w-full">
        
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="text-gray-300 cursor-not-allowed opacity-50">&larr; prev</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="hover:text-ink transition-colors">&larr; prev</a>
        @endif

        {{-- Current Page / Last Page --}}
        <span class="tracking-widest">
            {{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}
        </span>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="hover:text-ink transition-colors">next &rarr;</a>
        @else
            <span class="text-gray-300 cursor-not-allowed opacity-50">next &rarr;</span>
        @endif

    </nav>
@endif
