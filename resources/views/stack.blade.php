<x-layout>
    <div class="mx-auto max-w-2xl px-6">
        <!-- Stack Header -->
        <section class="relative pt-20 pb-12 sm:pt-28 border-b border-gray-100/0">
            <h1 class="font-pixel text-[2.3rem] leading-[1.05] tracking-[-0.01em] text-ink sm:text-[3rem]">
                tech stack
            </h1>
            <p class="mt-4 max-w-lg text-[0.95rem] leading-relaxed text-gray-700 sm:mt-5 sm:text-base">
                The tools, frameworks, and platforms I reach for — across the front end, back end, infrastructure, and AI.
            </p>
        </section>

        <!-- Tech Categories -->
        <div class="w-full pb-32 pt-10">
            <div class="flex flex-col gap-12">
                
                @foreach(config('portfolio.stack') as $category => $technologies)
                <div>
                    <h3 class="font-mono text-[0.65rem] text-gray-400 uppercase tracking-widest mb-6">{{ $category }}</h3>
                    <div class="flex flex-wrap gap-2.5 sm:gap-3">
                        @foreach($technologies as $tech)
                        <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">{{ $tech }}</div>
                        @endforeach
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</x-layout>
