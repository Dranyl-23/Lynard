<x-layout>
    <div class="mx-auto max-w-3xl px-6 py-12 sm:py-24">
        
        <h1 class="text-3xl font-pixel text-ink mb-6 reveal d1">projects</h1>
        <p class="text-[0.85rem] text-gray-500 font-mono leading-relaxed max-w-2xl reveal d2">
            Blockchain solutions, AI assistants, civic technology, and consumer apps that I've built and deployed.
        </p>

        <!-- Featured Projects Cards -->
        <div class="mt-12 space-y-6 reveal d3">
            @foreach(config('portfolio.projects.featured') as $project)
            <div onclick="window.open('{{ $project['github_url'] !== '#' ? $project['github_url'] : ($project['live_url'] ?? '#') }}', '_blank')" class="block cursor-pointer rounded-3xl bg-gray-50 border border-gray-100 p-6 sm:p-8 transition-all hover:-translate-y-1 hover:shadow-xl hover:shadow-gray-200/50 group">
                <div class="flex flex-col sm:flex-row gap-6 items-start">
                    <!-- Icon -->
                    <img src="{{ asset($project['image']) }}" alt="{{ $project['title'] }} Logo" class="w-16 h-16 shrink-0 rounded-2xl object-cover shadow-inner bg-gray-100 border border-gray-200/50">
                    <!-- Content -->
                    <div class="flex-1">
                        <div class="flex items-center gap-3 flex-wrap mb-3">
                            <span class="px-3 py-1 rounded-full border border-gray-200 bg-gray-100/50 text-[9px] font-mono uppercase tracking-widest text-gray-500 flex items-center gap-1.5">
                                <svg class="w-3 h-3 text-{{ $project['badge_color'] }}" fill="currentColor" viewBox="0 0 24 24">{!! $project['badge_svg'] !!}</svg>
                                {{ $project['badge'] }}
                            </span>
                            <span class="text-[9px] font-mono uppercase tracking-widest text-gray-400">
                                {!! $project['tags'] !!}
                            </span>
                        </div>
                        <h3 class="text-2xl font-sans font-medium text-ink mb-2 group-hover:text-{{ $project['badge_color'] }} transition-colors">{{ $project['title'] }}</h3>
                        <p class="text-sm text-gray-500 font-sans max-w-lg leading-relaxed">
                            {{ $project['description'] }}
                        </p>
                        
                        <div class="mt-6 flex flex-wrap items-center gap-3">
                            @if(!empty($project['github_url']) && $project['github_url'] !== '#')
                            <a href="{{ $project['github_url'] }}" target="_blank" onclick="event.stopPropagation();" class="px-4 py-2 rounded-xl border border-gray-200 bg-white text-[10px] font-mono uppercase tracking-wider text-gray-500 flex items-center gap-2 hover:bg-gray-100 transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.463-1.11-1.463-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.831.092-.646.35-1.086.636-1.336-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0112 6.836c.85.004 1.705.114 2.504.336 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C19.138 20.161 22 16.418 22 12c0-5.523-4.477-10-10-10z"/></svg>
                                GitHub Repo
                            </a>
                            @endif
                            @if(!empty($project['live_url']))
                            <a href="{{ $project['live_url'] }}" target="_blank" onclick="event.stopPropagation();" class="px-4 py-2 rounded-xl border border-gray-200 bg-white text-[10px] font-mono uppercase tracking-wider text-gray-500 flex items-center gap-2 hover:bg-gray-100 transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                Live App
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Other Projects List -->
        <div class="mt-16 sm:mt-24 reveal d4">
            <div class="flex flex-col border-t border-gray-100">
                @foreach(config('portfolio.projects.other') as $project)
                <a href="{{ $project['github_url'] }}" target="_blank" class="group flex flex-col sm:flex-row items-start sm:items-center justify-between py-7 border-b border-gray-100 hover:bg-gray-50/50 transition-colors -mx-4 px-4 sm:mx-0 sm:px-2 rounded-xl sm:rounded-none sm:hover:bg-transparent">
                    <div class="w-full sm:w-1/3 mb-2 sm:mb-0">
                        <h4 class="text-sm font-sans font-medium text-ink group-hover:text-gray-500 transition-colors">{{ $project['title'] }}</h4>
                    </div>
                    <div class="w-full sm:w-2/3 flex items-center justify-between">
                        <div class="flex flex-col pr-4">
                            <span class="text-[9px] font-mono uppercase tracking-widest text-gray-400 mb-1.5">{!! $project['tags'] !!}</span>
                            <p class="text-xs text-gray-500 font-sans max-w-sm leading-relaxed">{{ $project['description'] }}</p>
                        </div>
                        <span class="text-gray-300 font-sans group-hover:text-ink group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform">↗</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

    </div>
</x-layout>
