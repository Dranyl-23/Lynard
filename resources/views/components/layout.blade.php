@props([
    'title' => 'Alfie Lynard — Software Engineer',
    'description' => 'I\'m Alfie Lynard — a software engineer building modern applications.',
    'image' => 'og-image.jpg'
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- BUG FIX B2: [x-cloak] must be in <head> so it applies before Alpine loads.
         Having it inside a conditionally-hidden div means it was never parsed at page load. --}}
    <style>[x-cloak] { display: none !important; }</style>

    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:image" content="{{ asset($image) }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ asset($image) }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=2">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v=2">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Geist+Mono:wght@300..600&family=Source+Serif+4:wght@400;500;600&display=swap" rel="stylesheet">

    <script>
        window.Laravel = {
            pusherAppKey: "{{ config('broadcasting.connections.pusher.key') }}",
            pusherCluster: "{{ config('broadcasting.connections.pusher.options.cluster') }}",
        };
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative overflow-x-hidden bg-white font-sans text-ink antialiased" x-data="communityChat" x-init="initEcho()">

    <!-- Page-wide halftone backdrop -->
    <div aria-hidden="true" class="pointer-events-none fixed inset-0 z-0">
        <div class="halftone halftone-wide mask-tr absolute right-0 top-0 h-[70vh] w-[65vw] opacity-[0.16]"></div>
        <div class="halftone mask-bl absolute bottom-0 left-0 h-[60vh] w-[55vw] opacity-[0.13]"></div>
    </div>

    <!-- Fixed left sidebar (lg+) -->
    <nav class="fixed inset-y-0 left-0 z-50 hidden w-64 flex-col border-r border-gray-200 bg-white px-6 py-8 lg:flex">
        <a href="/" class="shrink-0 font-pixel text-[15px] leading-none hover:opacity-60">Lynard</a>

        <div class="mt-9 flex flex-1 flex-col font-mono text-[13px] justify-between pb-8">
            <div class="flex flex-col gap-8">
                <!-- Group 1: Icons -->
                <div class="flex flex-col gap-2.5">
                    <a href="/blog" class="group relative inline-flex w-fit items-center gap-2.5 {{ request()->is('blog') ? 'text-ink font-medium' : 'text-gray-500 hover:text-ink' }}">
                        @if(request()->is('blog'))
                            <span class="absolute -left-5 text-ink">&rarr;</span>
                        @endif
                        <svg viewBox="0 0 24 24" fill="none" class="h-[1.15em] w-[1.15em] shrink-0"><path d="M4 5.5A1.5 1.5 0 015.5 4H11v15.5H6a2 2 0 00-2 1.2V5.5z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M20 5.5A1.5 1.5 0 0018.5 4H13v15.5h5a2 2 0 012 1.2V5.5z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
                        Blog
                    </a>
                    <a href="/gear" class="group relative inline-flex w-fit items-center gap-2.5 {{ request()->is('gear') ? 'text-ink font-medium' : 'text-gray-500 hover:text-ink' }}">
                        @if(request()->is('gear'))
                            <span class="absolute -left-5 text-ink">&rarr;</span>
                        @endif
                        <svg viewBox="0 0 24 24" fill="none" class="h-[1.15em] w-[1.15em] shrink-0"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" stroke="currentColor" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        Gear
                    </a>
                    <a href="/resources" class="group relative inline-flex w-fit items-center gap-2.5 {{ request()->is('resources') ? 'text-ink font-medium' : 'text-gray-500 hover:text-ink' }}">
                        @if(request()->is('resources'))
                            <span class="absolute -left-5 text-ink">&rarr;</span>
                        @endif
                        <svg viewBox="0 0 24 24" fill="none" class="h-[1.15em] w-[1.15em] shrink-0"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" stroke="currentColor" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                        Resources
                    </a>
                </div>
                
                <div class="h-px bg-gray-200 w-full my-1"></div>
                
                <div class="flex flex-col gap-2.5">
                    <a href="/collabs" class="group relative inline-flex w-fit items-center gap-2.5 {{ request()->is('collabs') ? 'text-ink font-medium' : 'text-gray-500 hover:text-ink' }}">
                        @if(request()->is('collabs'))
                            <span class="absolute -left-5 text-ink">&rarr;</span>
                        @endif
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" class="h-[1.15em] w-[1.15em] shrink-0"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        Collabs
                    </a>
                    <a href="/recommendations" class="group relative inline-flex w-fit items-center gap-2.5 {{ request()->is('recommendations') ? 'text-ink font-medium' : 'text-gray-500 hover:text-ink' }}">
                        @if(request()->is('recommendations'))
                            <span class="absolute -left-5 text-ink">&rarr;</span>
                        @endif
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" class="h-[1.15em] w-[1.15em] shrink-0"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        Recommendations
                    </a>
                </div>
                
                <div class="h-px bg-gray-200 w-full my-1"></div>
                
                <!-- Group 2: No Icons -->
                <div class="flex flex-col gap-2.5">
                    <a href="/projects" class="group relative inline-flex w-fit items-center {{ request()->is('projects') ? 'text-ink font-medium' : 'text-gray-500 hover:text-ink' }}">
                        @if(request()->is('projects'))
                            <span class="absolute -left-5 text-ink">&rarr;</span>
                        @endif
                        Projects
                    </a>
                    <a href="/experience" class="group relative inline-flex w-fit items-center {{ request()->is('experience') ? 'text-ink font-medium' : 'text-gray-500 hover:text-ink' }}">
                        @if(request()->is('experience'))
                            <span class="absolute -left-5 text-ink">&rarr;</span>
                        @endif
                        Experience
                    </a>
                    <a href="/stack" class="group relative inline-flex w-fit items-center {{ request()->is('stack') ? 'text-ink font-medium' : 'text-gray-500 hover:text-ink' }}">
                        @if(request()->is('stack'))
                            <span class="absolute -left-5 text-ink">&rarr;</span>
                        @endif
                        Stack
                    </a>
                    <a href="/certifications" class="group relative inline-flex w-fit items-center {{ request()->is('certifications') ? 'text-ink font-medium' : 'text-gray-400 hover:text-gray-500' }}">
                        @if(request()->is('certifications'))
                            <span class="absolute -left-5 text-ink">&rarr;</span>
                        @endif
                        Certifications
                    </a>
                </div>
            </div>

            <!-- Bottom Section -->
            <div class="flex flex-col gap-4 mt-12">
                <div class="h-px bg-gray-200 w-full mb-2"></div>
                
                <!-- Presence Indicators -->
                <div class="flex items-center gap-2 mb-2">
                    <div class="flex -space-x-2">
                        <template x-for="(viewer, index) in viewers.slice(0, 3)" :key="viewer.id">
                            <img :src="viewer.user_info?.avatar" class="w-6 h-6 shrink-0 rounded-full border-2 border-white bg-gray-200 object-cover" alt="Avatar">
                        </template>
                        <div x-show="viewers.length > 3" class="w-6 h-6 shrink-0 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-[8px] font-mono font-medium text-gray-500" x-text="'+' + (viewers.length - 3)"></div>
                        <div x-show="viewers.length === 0" class="w-6 h-6 shrink-0 rounded-full border-2 border-white bg-gray-200 flex items-center justify-center text-[10px]">?</div>
                    </div>
                    <span class="font-mono text-[10px] text-gray-500"><strong class="text-ink" x-text="Math.max(1, viewers.length)"></strong> people viewing now</span>
                </div>

                <!-- Community Chat Button -->
                <button type="button" @click="isOpen = true" class="group flex items-center gap-2 font-mono text-[11px] text-gray-500 hover:text-ink transition-colors text-left w-fit mb-2">
                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    community chat
                </button>

                <div class="h-px bg-gray-200 w-full mb-2"></div>
                <div class="mb-2">
                    <div class="theme-switch" role="group" aria-label="Theme">
                        <button type="button" data-theme-opt="system" onclick="setTheme('system', event)" class="theme-opt" title="System" aria-label="System theme">
                            <svg viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="13" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M9 21h6M12 17v4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                        </button>
                        <button type="button" data-theme-opt="light" onclick="setTheme('light', event)" class="theme-opt" title="Light" aria-label="Light theme">
                            <svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.7"/><path d="M12 2v2M12 20v2M2 12h2M20 12h2M5 5l1.4 1.4M17.6 17.6L19 19M19 5l-1.4 1.4M6.4 17.6L5 19" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                        </button>
                        <button type="button" data-theme-opt="dark" onclick="setTheme('dark', event)" class="theme-opt" title="Dark" aria-label="Dark theme">
                            <svg viewBox="0 0 24 24" fill="none"><path d="M20 13.6A8 8 0 1 1 10.4 4a6.2 6.2 0 0 0 9.6 9.6z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg>
                        </button>
                    </div>
                </div>
                <p class="text-[11px] text-gray-500 leading-relaxed pr-4">
                    For work, collabs & everything else, reach me at
                </p>
                <a href="#" @click.prevent="$dispatch('open-email-modal')" class="inline-flex w-fit items-center gap-2 text-ink hover:opacity-70 transition-opacity text-[12px] font-medium">
                    <svg viewBox="0 0 24 24" fill="none" class="h-3.5 w-3.5 shrink-0"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" stroke="currentColor" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    alfielynard23@gmail.com
                </a>
            </div>
        </div>
    </nav>

    <!-- Mobile top bar (below lg) -->
    <header class="sticky top-0 z-50 border-b border-gray-200/70 bg-white/90 backdrop-blur-md lg:hidden">
        <div class="mx-auto flex max-w-3xl items-center justify-between px-6 py-3">
            <a href="/" class="font-pixel text-[14px]">Lynard</a>
            <button type="button" onclick="openMobileNav()" aria-label="Open menu" class="-mr-1 p-1 text-gray-700 hover:text-ink">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
            </button>
        </div>
    </header>

    <!-- Mobile full-screen menu -->
    <div id="mobileNav" class="fixed inset-0 z-60 hidden flex-col bg-white lg:hidden">
        <div class="flex items-center justify-between border-b border-gray-200 px-6 py-3">
            <a href="/" class="font-pixel text-[14px]">Lynard</a>
            <button type="button" onclick="closeMobileNav()" aria-label="Close menu" class="-mr-1 p-1 text-gray-700 hover:text-ink">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"><path d="M5 5l14 14M19 5L5 19" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
            </button>
        </div>

        <div class="flex flex-1 flex-col overflow-y-auto px-7 py-8 font-mono text-[16px]">
            <div class="flex flex-col gap-8">
                <!-- Group 1: Icons -->
                <div class="mnav-group flex flex-col gap-4" style="transition-delay: 0.05s">
                    <a href="/blog" onclick="closeMobileNav()" class="relative inline-flex w-fit items-center gap-3 {{ request()->is('blog') ? 'text-ink font-medium' : 'text-gray-700 hover:text-ink' }}">
                        @if(request()->is('blog'))
                            <span class="absolute -left-6 text-ink">&rarr;</span>
                        @endif
                        <svg viewBox="0 0 24 24" fill="none" class="h-[1.15em] w-[1.15em] shrink-0"><path d="M4 5.5A1.5 1.5 0 015.5 4H11v15.5H6a2 2 0 00-2 1.2V5.5z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M20 5.5A1.5 1.5 0 0018.5 4H13v15.5h5a2 2 0 012 1.2V5.5z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
                        Blog
                    </a>
                    <a href="/gear" onclick="closeMobileNav()" class="relative inline-flex w-fit items-center gap-3 {{ request()->is('gear') ? 'text-ink font-medium' : 'text-gray-700 hover:text-ink' }}">
                        @if(request()->is('gear'))
                            <span class="absolute -left-6 text-ink">&rarr;</span>
                        @endif
                        <svg viewBox="0 0 24 24" fill="none" class="h-[1.15em] w-[1.15em] shrink-0"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" stroke="currentColor" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        Gear
                    </a>
                    <a href="/resources" onclick="closeMobileNav()" class="relative inline-flex w-fit items-center gap-3 {{ request()->is('resources') ? 'text-ink font-medium' : 'text-gray-700 hover:text-ink' }}">
                        @if(request()->is('resources'))
                            <span class="absolute -left-6 text-ink">&rarr;</span>
                        @endif
                        <svg viewBox="0 0 24 24" fill="none" class="h-[1.15em] w-[1.15em] shrink-0"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" stroke="currentColor" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                        Resources
                    </a>
                </div>
                
                <div class="h-px bg-gray-200 w-full mnav-group my-2" style="transition-delay: 0.1s"></div>
                
                <div class="mnav-group flex flex-col gap-4" style="transition-delay: 0.12s">
                    <a href="/collabs" onclick="closeMobileNav()" class="relative inline-flex w-fit items-center gap-3 {{ request()->is('collabs') ? 'text-ink font-medium' : 'text-gray-700 hover:text-ink' }}">
                        @if(request()->is('collabs'))
                            <span class="absolute -left-6 text-ink">&rarr;</span>
                        @endif
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" class="h-[1.15em] w-[1.15em] shrink-0"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        Collabs
                    </a>
                    <a href="/recommendations" onclick="closeMobileNav()" class="relative inline-flex w-fit items-center gap-3 {{ request()->is('recommendations') ? 'text-ink font-medium' : 'text-gray-700 hover:text-ink' }}">
                        @if(request()->is('recommendations'))
                            <span class="absolute -left-6 text-ink">&rarr;</span>
                        @endif
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" class="h-[1.15em] w-[1.15em] shrink-0"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        Recommendations
                    </a>
                </div>
                
                <div class="h-px bg-gray-200 w-full mnav-group my-2" style="transition-delay: 0.14s"></div>
                
                <!-- Group 2: No Icons -->
                <div class="mnav-group flex flex-col gap-4" style="transition-delay: 0.15s">
                    <a href="/projects" onclick="closeMobileNav()" class="relative inline-flex w-fit items-center {{ request()->is('projects') ? 'text-ink font-medium' : 'text-gray-700 hover:text-ink' }}">
                        @if(request()->is('projects'))
                            <span class="absolute -left-6 text-ink">&rarr;</span>
                        @endif
                        Projects
                    </a>
                    <a href="/experience" onclick="closeMobileNav()" class="relative inline-flex w-fit items-center {{ request()->is('experience') ? 'text-ink font-medium' : 'text-gray-500 hover:text-gray-700' }}">
                        @if(request()->is('experience'))
                            <span class="absolute -left-6 text-ink">&rarr;</span>
                        @endif
                        Experience
                    </a>
                    <a href="/stack" onclick="closeMobileNav()" class="relative inline-flex w-fit items-center {{ request()->is('stack') ? 'text-ink font-medium' : 'text-gray-500 hover:text-gray-700' }}">
                        @if(request()->is('stack'))
                            <span class="absolute -left-6 text-ink">&rarr;</span>
                        @endif
                        Stack
                    </a>
                    <a href="/certifications" onclick="closeMobileNav()" class="relative inline-flex w-fit items-center {{ request()->is('certifications') ? 'text-ink font-medium' : 'text-gray-500 hover:text-gray-700' }}">
                        @if(request()->is('certifications'))
                            <span class="absolute -left-6 text-ink">&rarr;</span>
                        @endif
                        Certifications
                    </a>
                </div>
            </div>
            
            <div class="my-5 h-px bg-gray-200"></div>
            <div class="mnav-group flex flex-col gap-5" style="transition-delay: 0.23s">
                <!-- Mobile Community Chat Button -->
                <button type="button" @click="closeMobileNav(); isOpen = true" class="group flex items-center gap-2 font-mono text-[14px] text-gray-700 hover:text-ink transition-colors text-left w-fit">
                    <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    community chat
                </button>
                <div>
                    <div class="mb-4">
                        <div class="theme-switch" role="group" aria-label="Theme">
                            <button type="button" data-theme-opt="system" onclick="setTheme('system', event)" class="theme-opt" title="System" aria-label="System theme">
                                <svg viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="13" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M9 21h6M12 17v4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                            </button>
                            <button type="button" data-theme-opt="light" onclick="setTheme('light', event)" class="theme-opt" title="Light" aria-label="Light theme">
                                <svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.7"/><path d="M12 2v2M12 20v2M2 12h2M20 12h2M5 5l1.4 1.4M17.6 17.6L19 19M19 5l-1.4 1.4M6.4 17.6L5 19" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                            </button>
                            <button type="button" data-theme-opt="dark" onclick="setTheme('dark', event)" class="theme-opt" title="Dark" aria-label="Dark theme">
                                <svg viewBox="0 0 24 24" fill="none"><path d="M20 13.6A8 8 0 1 1 10.4 4a6.2 6.2 0 0 0 9.6 9.6z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg>
                            </button>
                        </div>
                    </div>
                    <p class="text-[11px] text-gray-500 leading-relaxed pr-4">
                        For work, collabs & everything else, reach me at
                    </p>
                    <a href="#" @click.prevent="$dispatch('open-email-modal')" class="inline-flex w-fit items-center gap-2 text-ink hover:opacity-70 transition-opacity text-[12px] font-medium mt-3">
                        <svg viewBox="0 0 24 24" fill="none" class="h-3.5 w-3.5 shrink-0"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" stroke="currentColor" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        alfielynard23@gmail.com
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
    #mobileNav { opacity: 0; transition: opacity .3s ease; }
    #mobileNav.is-open { opacity: 1; }
    #mobileNav .mnav-group { opacity: 0; transform: translateY(12px); transition: opacity .45s ease, transform .45s cubic-bezier(.16,1,.3,1); }
    #mobileNav.is-open .mnav-group { opacity: 1; transform: none; }
    </style>

    <!-- Main content area -->
    <main id="top" class="relative z-10 min-h-screen lg:pl-64">
        {{ $slot }}
    </main>

    <!-- Hackathon Modal -->
    <div id="hackathonModal" class="fixed inset-0 z-100 hidden items-center justify-center">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-gray-900/40 backdrop-blur-sm transition-opacity" onclick="closeHackathonModal()"></div>
        
        <!-- Modal Content -->
        <div class="relative w-full max-w-2xl transform overflow-hidden rounded-3xl bg-white p-8 text-left align-middle shadow-2xl transition-all sm:p-10 mx-4 border border-gray-100">
            <!-- Close button -->
            <button type="button" onclick="closeHackathonModal()" class="absolute right-6 top-6 text-gray-400 hover:text-ink transition-colors">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round"/></svg>
            </button>

            <!-- Header -->
            <div class="flex items-center justify-between font-mono text-[0.65rem] text-gray-500 uppercase tracking-widest">
                <span>Hackathons</span>
                <span>1 Entered</span>
            </div>

            <!-- Title -->
            <h2 class="mt-5 font-pixel text-2xl text-ink sm:text-3xl">1x Participant</h2>

            <!-- Featured Card -->
            <div class="mt-8 rounded-2xl bg-ink p-6 sm:p-8 text-white border border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2 text-[10px] font-mono text-gray-400 uppercase tracking-wider">
                        <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                        Participant &middot; 2023
                    </div>
                    <div class="rounded-full border border-gray-700 bg-gray-800/50 px-2.5 py-0.5 text-[0.6rem] font-mono uppercase tracking-wider text-gray-300">
                        Featured
                    </div>
                </div>
                
                <h3 class="mt-4 font-sans text-xl font-medium sm:text-2xl">StellarX Hackathon</h3>
                
                <a href="#" class="mt-6 inline-flex items-center gap-2 font-mono text-xs text-gray-400 hover:text-white transition-colors">
                    Read about the experience ↗
                </a>
            </div>
        </div>
    </div>

    <script>
        function openHackathonModal() {
            const modal = document.getElementById('hackathonModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden'; // prevent scrolling behind
        }

        function closeHackathonModal() {
            const modal = document.getElementById('hackathonModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }
    </script>

    <x-community-chat />

    <!-- Email Modal -->
    <div x-data="{ emailModalOpen: false }" @open-email-modal.window="emailModalOpen = true">
        <div x-show="emailModalOpen" style="display: none; z-index: 100;" class="fixed inset-0 flex items-center justify-center bg-gray-900/40 backdrop-blur-sm" x-transition.opacity>
            <div @click.away="emailModalOpen = false" style="max-width: 360px;" class="bg-white border border-gray-200 text-ink w-full rounded-2xl p-6 shadow-2xl relative mx-4" x-transition.scale.95>
                <button @click="emailModalOpen = false" class="absolute top-5 right-5 text-gray-400 hover:text-ink transition-colors">
                    <svg viewBox="0 0 24 24" fill="none" class="w-4 h-4" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
                <div class="font-mono text-[9px] uppercase tracking-widest text-gray-500 mb-2">get in touch</div>
                <h2 class="text-[1.35rem] font-medium font-serif mb-1.5 leading-none text-ink">say hello</h2>
                <p class="text-[12.5px] text-gray-600 mb-6 font-mono">For work, collabs, or just to say hi &mdash; drop me a line.</p>
                
                <div class="flex items-center justify-between bg-gray-50 border border-gray-200 rounded-lg p-1.5 mb-3">
                    <span class="font-mono text-[11px] text-gray-600 ml-3">alfielynard23@gmail.com</span>
                    <button onclick="navigator.clipboard.writeText('alfielynard23@gmail.com'); this.innerText='Copied!'; setTimeout(() => this.innerText='Copy', 2000)" class="bg-ink text-white font-medium text-[11px] px-3.5 py-1.5 rounded-md hover:opacity-80 transition-opacity">Copy</button>
                </div>
                
                <a href="mailto:alfielynard23@gmail.com" class="block w-full text-center border border-gray-200 hover:bg-gray-50 transition-colors rounded-lg py-2.5 text-[12.5px] font-medium font-mono text-gray-600">Open mail app</a>
            </div>
        </div>
    </div>
</body>
</html>
