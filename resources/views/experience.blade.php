<x-layout>
    <div class="mx-auto max-w-2xl px-6">
        <!-- Experience Header -->
        <section class="relative pt-20 pb-12 sm:pt-28 border-b border-gray-100/0">
            <h1 class="font-pixel text-[2.3rem] leading-[1.05] tracking-[-0.01em] text-ink sm:text-[3rem]">
                Experience
            </h1>
            <p class="mt-4 max-w-lg text-[0.95rem] leading-relaxed text-gray-700 sm:mt-5 sm:text-base">
                8+ years in building various UI engineering and full-stack development — from internal tools to planet scale gateways processing 100+ million daily per-second requests.
            </p>
        </section>

        <!-- Timeline Section -->
        <div class="w-full pb-32 pt-10">
            <div class="flex flex-col gap-12">
                
                @foreach(config('portfolio.experience') as $job)
                <div class="group flex gap-5">
                    <div class="shrink-0 mt-1">
                        <div class="w-8 h-8 rounded-full bg-ink text-white flex items-center justify-center font-mono text-[11px] font-bold">
                            {{ $job['logo_text'] }}
                        </div>
                    </div>
                    <div class="flex-1 pb-10 border-b border-gray-100/0 relative before:absolute before:left-[-1.65rem] before:top-10 before:bottom-0 before:w-px before:bg-gray-200">
                        <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-1 mb-6">
                            <h3 class="font-sans text-[1.1rem] font-medium text-ink">{{ $job['company'] }}</h3>
                            <span class="font-mono text-[0.7rem] text-gray-400 uppercase tracking-widest shrink-0">{{ $job['location'] }}</span>
                        </div>
                        
                        @foreach($job['roles'] as $role)
                        <div class="mb-{{ $loop->last ? '2' : '8' }}">
                            <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-1 mb-3">
                                <h4 class="font-sans text-[1rem] font-medium text-gray-700">{{ $role['title'] }}</h4>
                                <span class="font-mono text-[0.65rem] text-gray-400 uppercase tracking-widest shrink-0">{!! $role['duration'] !!}</span>
                            </div>
                            <div class="text-[0.9rem] text-gray-500 leading-relaxed mb-4 space-y-3">
                                @foreach($role['description'] as $desc)
                                <p>{{ $desc }}</p>
                                @endforeach
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @foreach($role['skills'] as $skill)
                                <span class="rounded-lg border border-gray-200 px-2.5 py-1 font-mono text-[10px] text-gray-600">{{ $skill }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</x-layout>
