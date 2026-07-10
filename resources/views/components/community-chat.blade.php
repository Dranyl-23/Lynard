<div id="communityChat"
     x-show="isOpen" 
     @keydown.escape.window="isOpen = false" 
     x-effect="document.body.style.overflow = isOpen ? 'hidden' : ''"
     class="fixed inset-0 z-100 flex bg-white dark:bg-[#18181b]" 
     x-cloak>
    
    <!-- Instructions overlay -->
    <div class="absolute top-6 right-16 z-20 text-gray-400 font-mono text-[10px] tracking-widest uppercase hidden md:block">
        wasd / arrows to move
    </div>

    <!-- Fullscreen Game Canvas with Gradient Fade -->
    <div class="absolute inset-0 z-0 bg-white dark:bg-[#18181b] overflow-hidden">
        <canvas x-ref="gameCanvas" class="w-full h-full" role="img" aria-label="Community chat interactive canvas" @click="focusGame"></canvas>
        
        <!-- Seamless Fade Overlay (left side fades to background) -->
        <div class="absolute inset-y-0 left-0 w-full md:w-[60%] bg-linear-to-r from-white via-white/95 dark:from-[#18181b] dark:via-[#18181b]/95 pointer-events-none"></div>

        <!-- Click to play prompt -->
        <div class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 pointer-events-none" :class="{'opacity-0': gameActive}">
            <span class="font-mono text-xs text-ink tracking-widest bg-white/90 dark:bg-[#18181b]/90 px-4 py-2 rounded-full border border-gray-200 shadow-xl md:ml-[30%]">
                click to play - <kbd class="px-1 py-0.5 rounded border border-gray-200 bg-gray-100 ml-1">W</kbd> <kbd class="px-1 py-0.5 rounded border border-gray-200 bg-gray-100">A</kbd> <kbd class="px-1 py-0.5 rounded border border-gray-200 bg-gray-100">S</kbd> <kbd class="px-1 py-0.5 rounded border border-gray-200 bg-gray-100">D</kbd>
            </span>
        </div>
    </div>

    <!-- Mobile Touch Controls -->
    <div class="absolute inset-0 z-10 pointer-events-none md:hidden flex justify-between items-end p-6 pb-30" x-show="gameActive">
        <!-- D-Pad (Left) -->
        <div class="relative w-40 h-32 pointer-events-auto opacity-70 transition-opacity">
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
            <button @touchstart.prevent="triggerInteract()" class="w-16 h-16 bg-white backdrop-blur border border-gray-200 rounded-full flex items-center justify-center text-ink active:scale-95 transition-transform shadow-2xl">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </button>
        </div>
    </div>

    <!-- Floating Chat Section (Left Side) -->
    {{-- BUG FIX B7: Removed redundant x-show="isOpen" from this panel — the parent already controls visibility.
         This allows the x-transition slide-in animation to actually play when the chat opens. --}}
    <div x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 -translate-x-12"
        x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-0 -translate-x-12"
        @click="gameActive = false"
        class="relative z-10 w-full md:w-1/2 lg:w-112.5 h-full flex flex-col p-6 md:p-12 md:pl-24 pointer-events-none">
        
        <div class="flex items-center gap-3 text-gray-500 font-mono text-[11px] mb-6 pointer-events-auto">
            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <span x-text="messages.length + ' messages'"></span>
        </div>

        <!-- Messages Area -->
        <div class="flex-1 overflow-y-auto pr-4 space-y-6 scrollbar-none [&::-webkit-scrollbar]:hidden pointer-events-auto" 
             id="chat-messages" 
             style="-webkit-mask-image: linear-gradient(to bottom, transparent, black 15%, black 88%, transparent); mask-image: linear-gradient(to bottom, transparent, black 15%, black 88%, transparent);">
            <div class="h-8"></div> <!-- Spacer for top mask -->
            <button x-show="hasMore" @click="loadMore()" 
                class="text-[11px] font-mono text-gray-400 hover:text-ink mx-auto block mb-4 transition-colors pointer-events-auto"
                :class="{'opacity-50 cursor-wait': loadingMore}">
                <span x-text="loadingMore ? 'loading...' : '↑ load earlier messages'"></span>
            </button>
            <template x-for="msg in messages" :key="msg.id">
                <div class="flex items-start gap-3 reveal" style="animation-duration: 0.4s; animation-delay: 0s;">
                    
                    <img :src="msg.avatar" class="w-7 h-7 rounded-full bg-gray-200 shrink-0 object-cover mt-1" alt="Avatar">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center flex-wrap gap-x-2 gap-y-1 mb-1.5">
                            <span class="font-mono text-[11px] font-semibold text-ink" x-text="msg.username"></span>
                            <span class="text-gray-300 text-[10px]">·</span>
                            <span class="font-mono text-[10px] text-gray-500 flex items-center">
                                <span x-text="(msg.location || 'Unknown').replace('💻', '').replace('📱', '').trim()"></span>
                                <template x-if="(msg.location || '').includes('💻')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 inline-block ml-1 opacity-70 relative -top-px" viewBox="0 0 24 24" fill="currentColor"><path d="M4 6h16v10H4zm2 2v6h12V8H6zM2 18h20v2H2z"/></svg>
                                </template>
                                <template x-if="(msg.location || '').includes('📱')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 inline-block ml-1 opacity-70 relative -top-px" viewBox="0 0 24 24" fill="currentColor"><path d="M6 2h12v20H6V2zm2 2v14h8V4H8zm2 16h4v2h-4v-2z"/></svg>
                                </template>
                            </span>
                            <span class="text-gray-300 text-[10px]">·</span>
                            <span class="font-mono text-[10px] text-gray-500" x-text="formatTime(msg.created_at)"></span>
                        </div>
                        <div class="px-4 py-2 rounded-2xl bg-[#f4f4f5] dark:bg-[#27272a] inline-block text-xs font-mono text-black wrap-break-word max-w-full leading-relaxed" x-text="msg.content"></div>
                    </div>
                </div>
            </template>
            <div class="h-8"></div> <!-- Spacer for bottom mask -->
        </div>

        <!-- Input Area -->
        <div class="mt-6 pt-4 pointer-events-auto">
            <div class="flex items-center gap-2 text-[11px] font-mono text-gray-500 mb-3" x-show="currentUser.name">
                chatting as <span class="text-ink font-semibold" x-text="currentUser.name"></span>
            </div>
            <form @submit.prevent="sendMessage" class="flex gap-4 items-end">
                <textarea 
                    x-model="newMessage" 
                    @keydown.enter.prevent="sendMessage"
                    @focus="gameActive = false"
                    :placeholder="currentUser.name ? 'say something...' : 'enter a nickname to join...'" 
                    class="w-full bg-transparent border-none p-0 text-black placeholder-gray-400 focus:ring-0 focus:outline-none resize-none font-mono text-[11px] h-10 leading-10 m-0"
                    rows="1"
                ></textarea>
                <button type="submit" class="text-[11px] font-mono text-gray-400 hover:text-ink shrink-0 mb-3 transition-colors" :class="{'opacity-30 cursor-not-allowed': !newMessage.trim()}" :disabled="!newMessage.trim()">
                    <span x-text="currentUser.name ? 'send ↵' : 'join ↵'"></span>
                </button>
            </form>
        </div>
    </div>

</div>


