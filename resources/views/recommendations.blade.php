<x-layout>
    <x-slot name="title">Recommendations</x-slot>

    <div class="mx-auto max-w-5xl px-6 py-12 sm:py-24">
        <div class="mb-12 space-y-4">
            <h1 class="font-pixel text-[20px] text-ink">Recommendations</h1>
            <p class="font-mono text-[13px] leading-relaxed text-gray-500">
                What leaders, teammates, and mentees say about working with me.
            </p>
        </div>

        @if($recommendations->isEmpty())
            <div class="text-center py-20">
                <p class="font-mono text-xs text-gray-400">No recommendations available yet.</p>
            </div>
        @else
            <div class="columns-1 sm:columns-2 lg:columns-3 gap-6 space-y-6">
                @foreach($recommendations as $rec)
                    <div class="break-inside-avoid relative overflow-hidden rounded-2xl border border-gray-200 dark:border-zinc-800 bg-transparent p-8 md:p-10 transition-all hover:border-gray-300 dark:hover:border-zinc-700 hover:shadow-lg dark:hover:shadow-xl dark:hover:shadow-black/20 group flex flex-col gap-6">
                        <!-- Small Quote Icon -->
                        <div class="text-gray-200 dark:text-zinc-800 transition-colors group-hover:text-gray-300 dark:group-hover:text-zinc-700">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                        </div>

                        <!-- Content -->
                        <div class="flex-grow">
                            <p class="font-sans text-[14px] leading-loose text-ink relative z-10">
                                {{ $rec['content'] }}
                            </p>
                        </div>

                        <!-- Footer: Avatar and Details -->
                        <div class="flex items-center gap-4 mt-2">
                            <div class="relative h-10 w-10 shrink-0 rounded-full border border-gray-200 dark:border-zinc-700 overflow-hidden bg-gray-50 dark:bg-zinc-800 flex items-center justify-center">
                                @if(!empty($rec['avatar']))
                                    <img src="{{ asset($rec['avatar']) }}" alt="{{ $rec['name'] }}" class="h-full w-full object-cover">
                                @else
                                    <span class="font-mono text-xs text-gray-400">{{ substr($rec['name'], 0, 1) }}</span>
                                @endif
                            </div>
                            <div class="flex flex-col pt-0.5">
                                @if(!empty($rec['link']))
                                    <a href="{{ $rec['link'] }}" target="_blank" rel="noopener noreferrer" class="font-sans text-[14px] font-medium text-ink hover:underline transition-all truncate">
                                        {{ $rec['name'] }}
                                    </a>
                                @else
                                    <span class="font-sans text-[14px] font-medium text-ink truncate">
                                        {{ $rec['name'] }}
                                    </span>
                                @endif
                                <span class="font-mono text-[11px] text-gray-500 line-clamp-1 mt-0.5">
                                    {{ $rec['role'] }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
