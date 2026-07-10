<div x-show="isOpen" 
     @keydown.escape.window="isOpen = false" 
     x-effect="document.body.style.overflow = isOpen ? 'hidden' : ''"
     class="fixed inset-0 z-100 flex" 
     x-cloak>
    
    <!-- Instructions overlay -->
    <div class="absolute top-6 right-16 z-20 text-gray-400 font-mono text-[10px] tracking-widest uppercase">
        wasd / arrows to move
    </div>

    <!-- Fullscreen Game Canvas (Background) -->
    <div class="absolute inset-0 z-0 bg-[#fbfbfb] dark:bg-zinc-950 overflow-hidden" @click="focusGame">
        <canvas x-ref="gameCanvas" class="w-full h-full" role="img" aria-label="Community chat interactive canvas"></canvas>
        
        <!-- Click to play prompt -->
        <div class="absolute inset-0 flex items-center justify-center bg-white/30 dark:bg-black/30 backdrop-blur-sm transition-opacity duration-300" :class="{'opacity-0 pointer-events-none': gameActive}">
            <span class="font-mono text-xs text-ink dark:text-white tracking-widest bg-white/90 dark:bg-zinc-900/90 px-4 py-2 rounded-full border border-gray-200 dark:border-zinc-800 shadow-xl">
                click to play - <kbd class="px-1 py-0.5 rounded border border-gray-200 dark:border-zinc-700 bg-gray-100 dark:bg-zinc-800 ml-1">W</kbd> <kbd class="px-1 py-0.5 rounded border border-gray-200 dark:border-zinc-700 bg-gray-100 dark:bg-zinc-800">A</kbd> <kbd class="px-1 py-0.5 rounded border border-gray-200 dark:border-zinc-700 bg-gray-100 dark:bg-zinc-800">S</kbd> <kbd class="px-1 py-0.5 rounded border border-gray-200 dark:border-zinc-700 bg-gray-100 dark:bg-zinc-800">D</kbd>
            </span>
        </div>
    </div>

    <!-- Mobile Touch Controls -->
    <div class="absolute inset-0 z-10 pointer-events-none md:hidden flex justify-between items-end p-6 pb-30" x-show="gameActive">
        <!-- D-Pad (Left) -->
        <div class="relative w-32 h-32 pointer-events-auto opacity-70 transition-opacity">
            <button @touchstart.prevent="handleTouch('w', true)" @touchend.prevent="handleTouch('w', false)" @touchcancel.prevent="handleTouch('w', false)" class="absolute top-0 left-10 w-12 h-12 bg-zinc-900/50 backdrop-blur border border-white/10 rounded-full flex items-center justify-center text-white/50 active:bg-zinc-800/80">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
            </button>
            <button @touchstart.prevent="handleTouch('a', true)" @touchend.prevent="handleTouch('a', false)" @touchcancel.prevent="handleTouch('a', false)" class="absolute top-10 left-0 w-12 h-12 bg-zinc-900/50 backdrop-blur border border-white/10 rounded-full flex items-center justify-center text-white/50 active:bg-zinc-800/80">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button @touchstart.prevent="handleTouch('d', true)" @touchend.prevent="handleTouch('d', false)" @touchcancel.prevent="handleTouch('d', false)" class="absolute top-10 left-20 w-12 h-12 bg-zinc-900/50 backdrop-blur border border-white/10 rounded-full flex items-center justify-center text-white/50 active:bg-zinc-800/80">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
            <button @touchstart.prevent="handleTouch('s', true)" @touchend.prevent="handleTouch('s', false)" @touchcancel.prevent="handleTouch('s', false)" class="absolute top-20 left-10 w-12 h-12 bg-zinc-900/50 backdrop-blur border border-white/10 rounded-full flex items-center justify-center text-white/50 active:bg-zinc-800/80">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
        </div>

        <!-- Action Button (Right) -->
        <div class="relative pointer-events-auto transition-opacity" x-show="nearbyInteract" x-transition>
            <button @touchstart.prevent="triggerInteract()" class="w-16 h-16 bg-white dark:bg-zinc-800 backdrop-blur border border-gray-200 dark:border-zinc-700 rounded-full flex items-center justify-center text-ink dark:text-white active:scale-95 transition-transform shadow-2xl">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </button>
        </div>
    </div>

    <!-- Floating Chat Section (Left Side) -->
    <div x-show="isOpen"
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 -translate-x-12"
        x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-0 -translate-x-12"
        class="relative z-10 w-full max-w-md h-full flex flex-col p-6 md:p-12 pointer-events-none">
        
        <div class="flex items-center gap-3 text-gray-500 font-mono text-xs mb-6 pointer-events-auto">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <span x-text="messages.length + ' messages'"></span>
        </div>

        <!-- Messages Area -->
        <div class="flex-1 overflow-y-auto pr-4 space-y-6 scrollbar-thin scrollbar-thumb-gray-300 dark:scrollbar-thumb-zinc-700 scrollbar-track-transparent pointer-events-auto" id="chat-messages" style="mask-image: linear-gradient(to bottom, transparent, black 10%, black 90%, transparent);">
            <div class="h-10"></div> <!-- Spacer for top mask -->
            <button x-show="hasMore" @click="loadMore()" 
                class="text-xs font-mono text-gray-400 hover:text-ink dark:hover:text-white mx-auto block mb-4 transition-colors pointer-events-auto"
                :class="{'opacity-50 cursor-wait': loadingMore}">
                <span x-text="loadingMore ? 'loading...' : '↑ load earlier messages'"></span>
            </button>
            <template x-for="msg in messages" :key="msg.id || Math.random()">
                <div class="flex items-start gap-4"
                    x-data="{ show: false }" x-init="setTimeout(() => show = true, 50)"
                    x-show="show"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-x-4"
                    x-transition:enter-end="opacity-100 translate-x-0">
                    
                    <img :src="msg.avatar" class="w-8 h-8 rounded-full bg-gray-200 dark:bg-zinc-800 shrink-0 object-cover" alt="Avatar">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-baseline gap-2 mb-1">
                            <span class="font-mono text-sm text-ink dark:text-gray-200 truncate" x-text="msg.username"></span>
                            <span class="font-mono text-[10px] text-gray-500 truncate" x-text="msg.location || 'Unknown'"></span>
                            <span class="font-mono text-[10px] text-gray-400 dark:text-zinc-500 ml-auto" x-text="formatTime(msg.created_at)"></span>
                        </div>
                        <div class="px-0 py-1 text-sm font-mono text-ink dark:text-gray-300 break-all" x-text="msg.content"></div>
                    </div>
                </div>
            </template>
            <div class="h-10"></div> <!-- Spacer for bottom mask -->
        </div>

        <!-- Input Area -->
        <div class="mt-6 pt-4 pointer-events-auto">
            <div class="flex items-center gap-2 text-xs font-mono text-gray-500 mb-3" x-show="currentUser.name">
                chatting as <span class="text-ink dark:text-gray-200 font-medium" x-text="currentUser.name"></span>
            </div>
            <form @submit.prevent="sendMessage" class="flex gap-4 items-end">
                <textarea 
                    x-model="newMessage" 
                    @keydown.enter.prevent="sendMessage"
                    @focus="gameActive = false"
                    :placeholder="currentUser.name ? 'say something...' : 'enter a nickname to join...'" 
                    class="w-full bg-transparent border-none p-0 text-ink dark:text-white placeholder-gray-400 focus:ring-0 resize-none font-mono text-sm h-10 leading-10 m-0"
                    rows="1"
                ></textarea>
                <button type="submit" class="text-xs font-mono text-gray-400 hover:text-ink dark:hover:text-white shrink-0 mb-3" :class="{'opacity-50 cursor-not-allowed': !newMessage.trim()}" :disabled="!newMessage.trim()">
                    <span x-text="currentUser.name ? 'send ↵' : 'join ↵'"></span>
                </button>
            </form>
        </div>
    </div>

    <style>
        [x-cloak] { display: none !important; }
    </style>
</div>
