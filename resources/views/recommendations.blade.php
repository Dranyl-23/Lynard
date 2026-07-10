<x-layout>
    <x-slot name="title">Recommendations</x-slot>

    <div class="mb-12 space-y-4">
        <h1 class="font-pixel text-[20px] text-ink dark:text-white">Recommendations</h1>
        <p class="font-mono text-[13px] leading-relaxed text-gray-500 dark:text-zinc-400">
            What leaders, teammates, and mentees say about working with me.
        </p>
    </div>

    @if($recommendations->isEmpty())
        <div class="text-center py-20">
            <p class="font-mono text-xs text-gray-400 dark:text-zinc-500">No recommendations available yet.</p>
        </div>
    @else
        <div class="columns-1 sm:columns-2 lg:columns-3 gap-6 space-y-6">
            @foreach($recommendations as $rec)
                <div class="break-inside-avoid relative overflow-hidden rounded-xl border border-gray-200 dark:border-zinc-800 bg-white/50 dark:bg-zinc-900/50 p-6 backdrop-blur-sm transition-all hover:border-gray-300 dark:hover:border-zinc-700 hover:shadow-lg dark:hover:shadow-xl dark:hover:shadow-black/20 group">
                    <!-- Quote Icon -->
                    <div class="absolute top-6 right-6 text-gray-200 dark:text-zinc-800 transition-colors group-hover:text-gray-300 dark:group-hover:text-zinc-700">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                    </div>

                    <div class="relative z-10 flex flex-col h-full">
                        <div class="flex-grow">
                            <p class="font-mono text-[12px] leading-loose text-ink dark:text-gray-300 relative z-10">
                                "{{ $rec['content'] }}"
                            </p>
                        </div>
                        
                        <div class="mt-8 flex items-center gap-4">
                            <div class="relative h-10 w-10 shrink-0 rounded-full border border-gray-200 dark:border-zinc-700 overflow-hidden bg-gray-50 dark:bg-zinc-800 flex items-center justify-center">
                                @if(!empty($rec['avatar']))
                                    <img src="{{ asset($rec['avatar']) }}" alt="{{ $rec['name'] }}" class="h-full w-full object-cover">
                                @else
                                    <span class="font-mono text-xs text-gray-400 dark:text-zinc-500">{{ substr($rec['name'], 0, 1) }}</span>
                                @endif
                            </div>
                            <div class="flex flex-col">
                                @if(!empty($rec['link']))
                                    <a href="{{ $rec['link'] }}" target="_blank" rel="noopener noreferrer" class="font-mono text-[12px] font-medium text-ink dark:text-gray-200 hover:underline transition-all truncate">
                                        {{ $rec['name'] }}
                                    </a>
                                @else
                                    <span class="font-mono text-[12px] font-medium text-ink dark:text-gray-200 truncate">
                                        {{ $rec['name'] }}
                                    </span>
                                @endif
                                <span class="font-mono text-[10px] text-gray-500 dark:text-zinc-500 line-clamp-1">
                                    {{ $rec['role'] }}
                                </span>
                                <span class="font-mono text-[9px] text-gray-400 dark:text-zinc-600 mt-0.5 uppercase tracking-widest">
                                    {{ $rec['date'] }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-layout>
