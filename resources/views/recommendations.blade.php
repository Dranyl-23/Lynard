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
                    <div class="relative z-10 flex flex-col h-full">
                        <!-- Header: Avatar and Details -->
                        <div class="mb-5 flex items-start gap-4">
                            <div class="relative h-10 w-10 shrink-0 rounded-full border border-gray-200 dark:border-zinc-700 overflow-hidden bg-gray-50 dark:bg-zinc-800 flex items-center justify-center">
                                @if(!empty($rec['avatar']))
                                    <img src="{{ asset($rec['avatar']) }}" alt="{{ $rec['name'] }}" class="h-full w-full object-cover">
                                @else
                                    <span class="font-mono text-xs text-gray-400 dark:text-zinc-500">{{ substr($rec['name'], 0, 1) }}</span>
                                @endif
                            </div>
                            <div class="flex flex-col pt-0.5">
                                @if(!empty($rec['link']))
                                    <a href="{{ $rec['link'] }}" target="_blank" rel="noopener noreferrer" class="font-mono text-[13px] font-medium text-ink hover:underline transition-all truncate">
                                        {{ $rec['name'] }}
                                    </a>
                                @else
                                    <span class="font-mono text-[13px] font-medium text-ink truncate">
                                        {{ $rec['name'] }}
                                    </span>
                                @endif
                                <span class="font-mono text-[11px] text-gray-500 line-clamp-1 mt-0.5">
                                    {{ $rec['role'] }}
                                </span>
                                <span class="font-mono text-[10px] text-gray-400 mt-1 uppercase tracking-widest">
                                    {{ $rec['date'] }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="flex-grow">
                            <p class="font-mono text-[12px] leading-relaxed text-ink relative z-10">
                                {{ $rec['content'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-layout>
