<x-layout :title="$post->title . ' — Alfie Lynard'" :description="$post->excerpt" :image="$post->image">
    <div class="mx-auto max-w-2xl px-6 pb-20 pt-16 sm:pt-24">
        
        <!-- Back Link -->
        <a href="/blog" class="inline-flex items-center gap-2 font-mono text-[0.7rem] uppercase tracking-widest text-gray-400 hover:text-ink transition-colors mb-12">
            <span>&larr;</span> all posts
        </a>

        <article>
            <!-- Header -->
            <header class="mb-12">
                <div class="font-mono text-[0.65rem] uppercase tracking-widest text-gray-500 mb-4 flex items-center gap-2">
                    <span>{{ $post->date }}</span>
                    <span>&middot;</span>
                    <span>{{ $post->readTime }} read</span>
                </div>
                
                <h1 class="font-sans text-[2rem] sm:text-[2.5rem] leading-[1.1] font-medium text-ink mb-6 tracking-tight">
                    {{ $post->title }}
                </h1>
                
                <p class="text-[1.1rem] leading-relaxed text-gray-500 mb-8">
                    {{ $post->excerpt }}
                </p>

                <div class="flex items-center gap-3">
                    <img src="https://api.dicebear.com/9.x/pixel-art/svg?seed=Alfie" alt="Alfie Lynard" class="w-8 h-8 rounded-full bg-gray-100">
                    <span class="font-sans text-[0.9rem] font-medium text-ink">Alfie Lynard</span>
                </div>
            </header>

            <!-- Main Image -->
            <div class="w-full aspect-video mb-12 rounded-xl overflow-hidden">
                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
            </div>

            <!-- Content -->
            <div class="prose prose-zinc dark:prose-invert max-w-none prose-p:leading-relaxed prose-p:text-[1.05rem] prose-a:text-ink prose-a:decoration-gray-300 hover:prose-a:decoration-ink prose-a:underline-offset-4 prose-headings:font-medium prose-headings:tracking-tight">
                {!! Str::markdown($post->body) !!}
            </div>
        </article>

        <!-- Footer -->
        <div class="mt-24 pt-8 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4 font-mono text-[0.65rem] text-gray-400 uppercase tracking-widest">
            <a href="/blog" class="hover:text-ink transition-colors">&larr; back to all posts</a>
            <span>&copy; {{ date('Y') }} Lynard</span>
        </div>
    </div>
</x-layout>
