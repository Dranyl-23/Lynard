<x-layout>
    <div id="blog-wrapper" class="mx-auto max-w-2xl px-6 transition-all duration-300">
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
                <div class="hidden sm:flex items-center gap-1 bg-gray-50 border border-gray-200 rounded-lg p-1">
                    <button id="btn-view-list" class="p-1.5 bg-white shadow-sm rounded-md text-ink cursor-default" aria-label="List View">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    </button>
                    <button id="btn-view-grid" class="p-1.5 text-gray-400 hover:text-ink transition-colors cursor-pointer" aria-label="Grid View">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                    </button>
                </div>
            </div>
        </section>

        <!-- Blog Posts List -->
        <div class="w-full pb-20 pt-10">
            <div id="blog-container" class="flex flex-col">
                
                <!-- Post 1 -->
                <a href="#" class="blog-post group py-8 border-b border-gray-100 flex flex-col sm:flex-row gap-6 sm:gap-8 hover:bg-gray-50/50 transition-colors -mx-6 px-6 rounded-2xl">
                    <div class="blog-post-img-wrap shrink-0 w-full sm:w-32">
                        <img src="https://placehold.co/400x250/111111/444444?text=Thumbnail" alt="Thumbnail" class="blog-post-img w-full h-auto rounded-xl object-cover grayscale opacity-90 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
                    </div>
                    <div class="flex flex-col justify-center">
                        <span class="font-mono text-[0.65rem] text-gray-400 uppercase tracking-widest mb-2">Jul 2026</span>
                        <h3 class="font-sans text-[1.1rem] font-medium text-ink group-hover:text-gray-500 transition-colors mb-2">The Stateless Mandate: Architectural Purity in Scalable Infrastructure</h3>
                        <p class="blog-post-desc text-[0.9rem] text-gray-500 leading-relaxed mb-4 line-clamp-2">
                            In the evolution of system design, we often find ourselves fighting the gravity of "state." The most elegant infrastructures are those that treat state not as a...
                        </p>
                        <div class="flex items-center gap-3 font-mono text-[0.65rem] uppercase tracking-widest text-ink font-medium">
                            <span>Read</span>
                            <span class="text-gray-300">&middot;</span>
                            <span class="text-gray-400 font-normal">2 min</span>
                        </div>
                    </div>
                </a>

                <!-- Post 2 -->
                <a href="#" class="blog-post group py-8 border-b border-gray-100 flex flex-col sm:flex-row gap-6 sm:gap-8 hover:bg-gray-50/50 transition-colors -mx-6 px-6 rounded-2xl">
                    <div class="blog-post-img-wrap shrink-0 w-full sm:w-32">
                        <img src="https://placehold.co/400x250/111111/444444?text=Thumbnail" alt="Thumbnail" class="blog-post-img w-full h-auto rounded-xl object-cover grayscale opacity-90 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
                    </div>
                    <div class="flex flex-col justify-center">
                        <span class="font-mono text-[0.65rem] text-gray-400 uppercase tracking-widest mb-2">Jun 2026</span>
                        <h3 class="font-sans text-[1.1rem] font-medium text-ink group-hover:text-gray-500 transition-colors mb-2">My Setup: Poke, MCPs, and a Local Mac Bridge</h3>
                        <p class="blog-post-desc text-[0.9rem] text-gray-500 leading-relaxed mb-4 line-clamp-2">
                            I finally got my automation stack to a place where it actually works for me instead of the other way around...
                        </p>
                        <div class="flex items-center gap-3 font-mono text-[0.65rem] uppercase tracking-widest text-ink font-medium">
                            <span>Read</span>
                            <span class="text-gray-300">&middot;</span>
                            <span class="text-gray-400 font-normal">1 min</span>
                        </div>
                    </div>
                </a>

                <!-- Post 3 -->
                <a href="#" class="blog-post group py-8 border-b border-gray-100 flex flex-col sm:flex-row gap-6 sm:gap-8 hover:bg-gray-50/50 transition-colors -mx-6 px-6 rounded-2xl">
                    <div class="blog-post-img-wrap shrink-0 w-full sm:w-32">
                        <img src="https://placehold.co/400x250/111111/444444?text=Thumbnail" alt="Thumbnail" class="blog-post-img w-full h-auto rounded-xl object-cover grayscale opacity-90 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
                    </div>
                    <div class="flex flex-col justify-center">
                        <span class="font-mono text-[0.65rem] text-gray-400 uppercase tracking-widest mb-2">Jun 2026</span>
                        <h3 class="font-sans text-[1.1rem] font-medium text-ink group-hover:text-gray-500 transition-colors mb-2">AI Products Need More Than a Good Demo</h3>
                        <p class="blog-post-desc text-[0.9rem] text-gray-500 leading-relaxed mb-4 line-clamp-2">
                            What I think about when turning AI demos into products people can trust and use.
                        </p>
                        <div class="flex items-center gap-3 font-mono text-[0.65rem] uppercase tracking-widest text-ink font-medium">
                            <span>Read</span>
                            <span class="text-gray-300">&middot;</span>
                            <span class="text-gray-400 font-normal">3 min</span>
                        </div>
                    </div>
                </a>

                <!-- Post 4 -->
                <a href="#" class="blog-post group py-8 border-b border-gray-100 flex flex-col sm:flex-row gap-6 sm:gap-8 hover:bg-gray-50/50 transition-colors -mx-6 px-6 rounded-2xl">
                    <div class="blog-post-img-wrap shrink-0 w-full sm:w-32">
                        <img src="https://placehold.co/400x250/111111/444444?text=Thumbnail" alt="Thumbnail" class="blog-post-img w-full h-auto rounded-xl object-cover grayscale opacity-90 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300">
                    </div>
                    <div class="flex flex-col justify-center">
                        <span class="font-mono text-[0.65rem] text-gray-400 uppercase tracking-widest mb-2">Jun 2026</span>
                        <h3 class="font-sans text-[1.1rem] font-medium text-ink group-hover:text-gray-500 transition-colors mb-2">What Small Mobile Apps Taught Me About Taste</h3>
                        <p class="blog-post-desc text-[0.9rem] text-gray-500 leading-relaxed mb-4 line-clamp-2">
                            What focused apps like budget, fitness, and travel tools taught me about product taste.
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

    <!-- Layout Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btnList = document.getElementById('btn-view-list');
            const btnGrid = document.getElementById('btn-view-grid');
            const wrapper = document.getElementById('blog-wrapper');
            const container = document.getElementById('blog-container');
            const posts = document.querySelectorAll('.blog-post');
            const postImgWraps = document.querySelectorAll('.blog-post-img-wrap');
            const postImages = document.querySelectorAll('.blog-post-img');
            const postDescs = document.querySelectorAll('.blog-post-desc');

            if (!btnList || !btnGrid || !container) return;

            btnList.addEventListener('click', () => {
                // Update buttons
                btnList.className = 'p-1.5 bg-white shadow-sm rounded-md text-ink cursor-default';
                btnGrid.className = 'p-1.5 text-gray-400 hover:text-ink transition-colors cursor-pointer';
                
                // Update wrapper and container
                wrapper.className = 'mx-auto max-w-2xl px-6 transition-all duration-300';
                container.className = 'flex flex-col';
                
                // Update posts
                posts.forEach(post => {
                    post.className = 'blog-post group py-8 border-b border-gray-100 flex flex-col sm:flex-row gap-6 sm:gap-8 hover:bg-gray-50/50 transition-colors -mx-6 px-6 rounded-2xl';
                });
                
                // Update descriptions (show them)
                postDescs.forEach(desc => {
                    desc.style.display = 'block';
                });
                
                // Update image wrappers
                postImgWraps.forEach(wrap => {
                    wrap.className = 'blog-post-img-wrap shrink-0 w-full sm:w-32';
                });
                
                // Update images
                postImages.forEach(img => {
                    img.className = 'blog-post-img w-full h-auto rounded-xl object-cover grayscale opacity-90 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300';
                });
            });

            btnGrid.addEventListener('click', () => {
                // Update buttons
                btnGrid.className = 'p-1.5 bg-white shadow-sm rounded-md text-ink cursor-default';
                btnList.className = 'p-1.5 text-gray-400 hover:text-ink transition-colors cursor-pointer';
                
                // Update wrapper and container
                wrapper.className = 'mx-auto max-w-5xl px-6 transition-all duration-300';
                container.className = 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12';
                
                // Update posts
                posts.forEach(post => {
                    post.className = 'blog-post group flex flex-col gap-4';
                });
                
                // Update descriptions (hide them)
                postDescs.forEach(desc => {
                    desc.style.display = 'none';
                });
                
                // Update image wrappers
                postImgWraps.forEach(wrap => {
                    wrap.className = 'blog-post-img-wrap shrink-0 w-full aspect-[16/9]';
                });
                
                // Update images
                postImages.forEach(img => {
                    img.className = 'blog-post-img w-full h-full rounded-xl object-cover grayscale opacity-90 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300';
                });
            });
        });
    </script>
</x-layout>
