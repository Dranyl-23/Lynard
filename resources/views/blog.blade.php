<x-layout>
    <div id="blog-wrapper" x-data="{ view: 'grid' }" class="mx-auto px-6 transition-all duration-300" :class="view === 'grid' ? 'max-w-5xl' : 'max-w-2xl'">
        <!-- Blog Header -->
        <section class="relative pt-20 pb-12 sm:pt-28 border-b border-gray-100/0">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="font-pixel text-[2.3rem] leading-[1.05] tracking-[-0.01em] text-ink sm:text-[3rem]">
                        blog
                    </h1>
                    <p class="mt-4 max-w-lg text-[0.95rem] leading-relaxed text-gray-700 sm:mt-5 sm:text-base">
                        Thoughts, tutorials, and notes on AI, engineering, and building things.
                    </p>
                </div>
                <!-- View Toggle Icons -->
                <div class="hidden sm:flex items-center gap-1 bg-transparent border border-gray-200/50 rounded-lg p-1">
                    <button @click="view = 'list'" 
                            :class="view === 'list' ? 'bg-gray-100 dark:bg-gray-800 text-ink shadow-sm' : 'text-gray-400 hover:text-ink'"
                            class="p-1.5 rounded-md transition-colors cursor-pointer" aria-label="List View">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    </button>
                    <button @click="view = 'grid'" 
                            :class="view === 'grid' ? 'bg-gray-100 dark:bg-gray-800 text-ink shadow-sm' : 'text-gray-400 hover:text-ink'"
                            class="p-1.5 rounded-md transition-colors cursor-pointer" aria-label="Grid View">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                    </button>
                </div>
            </div>
        </section>

        <!-- Blog Posts List -->
        <div class="w-full pb-20 pt-10">
            <div id="blog-container" :class="view === 'grid' ? 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12' : 'flex flex-col'">
                
                <!-- Post 1 -->
                <a href="#" class="blog-post group transition-colors"
                   :class="view === 'grid' ? 'flex flex-col gap-4' : 'py-8 border-b border-gray-100 flex flex-col sm:flex-row gap-6 sm:gap-8 hover:bg-gray-50/50 dark:hover:bg-gray-800/20 -mx-6 px-6 rounded-2xl'">
                    <div class="shrink-0" :class="view === 'grid' ? 'w-full aspect-[16/9]' : 'w-full sm:w-32 aspect-[16/9] sm:aspect-auto'">
                        <img src="{{ asset('images/blog/thumb1.jpg') }}" alt="Thumbnail" class="w-full h-full rounded-xl object-cover opacity-90 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div class="flex flex-col justify-center">
                        <span class="font-mono text-[0.65rem] text-gray-400 uppercase tracking-widest mb-2">Jul 2026</span>
                        <h3 class="font-sans text-[1.1rem] font-medium text-ink group-hover:opacity-70 transition-opacity mb-2">Building Scalable Web Apps with Laravel and React</h3>
                        <p x-show="view === 'list'" class="text-[0.9rem] text-gray-500 leading-relaxed mb-4 line-clamp-2">
                            A deep dive into how I architect modern web applications that can handle thousands of concurrent users without breaking a sweat.
                        </p>
                        <div class="flex items-center gap-3 font-mono text-[0.65rem] uppercase tracking-widest text-ink font-medium">
                            <span>Read</span>
                            <span class="text-gray-300">&middot;</span>
                            <span class="text-gray-400 font-normal">4 min</span>
                        </div>
                    </div>
                </a>

                <!-- Post 2 -->
                <a href="#" class="blog-post group transition-colors"
                   :class="view === 'grid' ? 'flex flex-col gap-4' : 'py-8 border-b border-gray-100 flex flex-col sm:flex-row gap-6 sm:gap-8 hover:bg-gray-50/50 dark:hover:bg-gray-800/20 -mx-6 px-6 rounded-2xl'">
                    <div class="shrink-0" :class="view === 'grid' ? 'w-full aspect-[16/9]' : 'w-full sm:w-32 aspect-[16/9] sm:aspect-auto'">
                        <img src="{{ asset('images/blog/thumb2.jpg') }}" alt="Thumbnail" class="w-full h-full rounded-xl object-cover opacity-90 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div class="flex flex-col justify-center">
                        <span class="font-mono text-[0.65rem] text-gray-400 uppercase tracking-widest mb-2">Jun 2026</span>
                        <h3 class="font-sans text-[1.1rem] font-medium text-ink group-hover:opacity-70 transition-opacity mb-2">Why I Still Choose Vanilla CSS over Frameworks</h3>
                        <p x-show="view === 'list'" class="text-[0.9rem] text-gray-500 leading-relaxed mb-4 line-clamp-2">
                            Tailwind is great, but there's a certain elegance to mastering pure CSS and CSS variables for completely custom design systems.
                        </p>
                        <div class="flex items-center gap-3 font-mono text-[0.65rem] uppercase tracking-widest text-ink font-medium">
                            <span>Read</span>
                            <span class="text-gray-300">&middot;</span>
                            <span class="text-gray-400 font-normal">3 min</span>
                        </div>
                    </div>
                </a>

                <!-- Post 3 -->
                <a href="#" class="blog-post group transition-colors"
                   :class="view === 'grid' ? 'flex flex-col gap-4' : 'py-8 border-b border-gray-100 flex flex-col sm:flex-row gap-6 sm:gap-8 hover:bg-gray-50/50 dark:hover:bg-gray-800/20 -mx-6 px-6 rounded-2xl'">
                    <div class="shrink-0" :class="view === 'grid' ? 'w-full aspect-[16/9]' : 'w-full sm:w-32 aspect-[16/9] sm:aspect-auto'">
                        <img src="{{ asset('images/blog/thumb3.jpg') }}" alt="Thumbnail" class="w-full h-full rounded-xl object-cover opacity-90 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div class="flex flex-col justify-center">
                        <span class="font-mono text-[0.65rem] text-gray-400 uppercase tracking-widest mb-2">May 2026</span>
                        <h3 class="font-sans text-[1.1rem] font-medium text-ink group-hover:opacity-70 transition-opacity mb-2">Integrating AI Assistants into Daily Workflows</h3>
                        <p x-show="view === 'list'" class="text-[0.9rem] text-gray-500 leading-relaxed mb-4 line-clamp-2">
                            How I use local LLMs and specialized agents to automate the boring parts of my freelance development business.
                        </p>
                        <div class="flex items-center gap-3 font-mono text-[0.65rem] uppercase tracking-widest text-ink font-medium">
                            <span>Read</span>
                            <span class="text-gray-300">&middot;</span>
                            <span class="text-gray-400 font-normal">5 min</span>
                        </div>
                    </div>
                </a>

                <!-- Post 4 -->
                <a href="#" class="blog-post group transition-colors"
                   :class="view === 'grid' ? 'flex flex-col gap-4' : 'py-8 border-b border-gray-100 flex flex-col sm:flex-row gap-6 sm:gap-8 hover:bg-gray-50/50 dark:hover:bg-gray-800/20 -mx-6 px-6 rounded-2xl'">
                    <div class="shrink-0" :class="view === 'grid' ? 'w-full aspect-[16/9]' : 'w-full sm:w-32 aspect-[16/9] sm:aspect-auto'">
                        <img src="{{ asset('images/blog/thumb4.jpg') }}" alt="Thumbnail" class="w-full h-full rounded-xl object-cover opacity-90 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div class="flex flex-col justify-center">
                        <span class="font-mono text-[0.65rem] text-gray-400 uppercase tracking-widest mb-2">Apr 2026</span>
                        <h3 class="font-sans text-[1.1rem] font-medium text-ink group-hover:opacity-70 transition-opacity mb-2">The Art of Minimalist UI/UX Design</h3>
                        <p x-show="view === 'list'" class="text-[0.9rem] text-gray-500 leading-relaxed mb-4 line-clamp-2">
                            Sometimes, less really is more. A look into how whitespace, typography, and contrast can make or break an interface.
                        </p>
                        <div class="flex items-center gap-3 font-mono text-[0.65rem] uppercase tracking-widest text-ink font-medium">
                            <span>Read</span>
                            <span class="text-gray-300">&middot;</span>
                            <span class="text-gray-400 font-normal">2 min</span>
                        </div>
                    </div>
                </a>

            </div>

            <!-- Pagination -->
            <div class="mt-16 flex items-center justify-between font-mono text-[0.75rem] text-gray-500">
                <a href="#" class="hover:text-ink transition-colors opacity-50 cursor-not-allowed">&larr; prev</a>
                <span>1 / 2</span>
                <a href="#" class="hover:text-ink transition-colors text-ink">next &rarr;</a>
            </div>

            <!-- Footer -->
            <div class="mt-24 pt-8 border-t border-gray-100 flex items-center justify-between font-mono text-[0.65rem] text-gray-400 uppercase tracking-widest">
                <span>&copy; {{ date('Y') }} Lynard</span>
                <a href="/" class="hover:text-ink transition-colors">&larr; back to site</a>
            </div>
        </div>
    </div>
</x-layout>
