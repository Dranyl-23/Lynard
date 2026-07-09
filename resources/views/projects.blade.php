<x-layout>
    <div class="mx-auto max-w-3xl px-6 py-12 sm:py-24">
        
        <h1 class="text-3xl font-pixel text-ink mb-6 reveal d1">projects</h1>
        <p class="text-[0.85rem] text-gray-500 font-mono leading-relaxed max-w-2xl reveal d2">
            Blockchain solutions, AI assistants, civic technology, and consumer apps that I've built and deployed.
        </p>

        <!-- Featured Projects Cards -->
        <div class="mt-12 space-y-6 reveal d3">
            
            <!-- Card 1: 4PS-Nexus -->
            <a href="https://github.com/Dranyl-23/4PS-Nexus" target="_blank" class="block rounded-3xl bg-gray-50 border border-gray-100 p-6 sm:p-8 transition-all hover:-translate-y-1 hover:shadow-xl hover:shadow-gray-200/50 group">
                <div class="flex flex-col sm:flex-row gap-6 items-start">
                    <!-- Icon -->
                    <img src="{{ asset('ProjectLogos/4Ps-Nexus.jpg') }}" alt="4PS-Nexus Logo" class="w-16 h-16 shrink-0 rounded-2xl object-cover shadow-inner bg-gray-100 border border-gray-200/50">
                    <!-- Content -->
                    <div class="flex-1">
                        <div class="flex items-center gap-3 flex-wrap mb-3">
                            <span class="px-3 py-1 rounded-full border border-gray-200 bg-gray-100/50 text-[9px] font-mono uppercase tracking-widest text-gray-500 flex items-center gap-1.5">
                                <svg class="w-3 h-3 text-emerald-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                                GOV TECH APP
                            </span>
                            <span class="text-[9px] font-mono uppercase tracking-widest text-gray-400">
                                BLOCKCHAIN &middot; TS
                            </span>
                        </div>
                        <h3 class="text-2xl font-sans font-medium text-ink mb-2 group-hover:text-emerald-500 transition-colors">4PS-Nexus</h3>
                        <p class="text-sm text-gray-500 font-sans max-w-lg leading-relaxed">
                            A blockchain-based disbursement system for the Philippine 4Ps program. Powered by Stellar and Soroban smart contracts to enforce transparency.
                        </p>
                        
                        <div class="mt-6 flex flex-wrap items-center gap-3">
                            <div class="px-4 py-2 rounded-xl border border-gray-200 bg-white text-[10px] font-mono uppercase tracking-wider text-gray-500 flex items-center gap-2 group-hover:bg-gray-100 transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.463-1.11-1.463-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.831.092-.646.35-1.086.636-1.336-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0112 6.836c.85.004 1.705.114 2.504.336 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C19.138 20.161 22 16.418 22 12c0-5.523-4.477-10-10-10z"/></svg>
                                GitHub Repo
                            </div>
                            <div class="px-4 py-2 rounded-xl border border-gray-200 bg-white text-[10px] font-mono uppercase tracking-wider text-gray-500 flex items-center gap-2 group-hover:bg-gray-100 transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                Live App
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Card 2: Chainbudget -->
            <a href="https://github.com/Dranyl-23/Chainbudget" target="_blank" class="block rounded-3xl bg-gray-50 border border-gray-100 p-6 sm:p-8 transition-all hover:-translate-y-1 hover:shadow-xl hover:shadow-gray-200/50 group">
                <div class="flex flex-col sm:flex-row gap-6 items-start">
                    <!-- Icon -->
                    <img src="{{ asset('ProjectLogos/Chainbudget.png') }}" alt="Chainbudget Logo" class="w-16 h-16 shrink-0 rounded-2xl object-cover shadow-inner bg-gray-100 border border-gray-200/50">
                    <!-- Content -->
                    <div class="flex-1">
                        <div class="flex items-center gap-3 flex-wrap mb-3">
                            <span class="px-3 py-1 rounded-full border border-gray-200 bg-gray-100/50 text-[9px] font-mono uppercase tracking-widest text-gray-500 flex items-center gap-1.5">
                                <svg class="w-3 h-3 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87 1.96 0 2.4-1.15 2.4-1.92 0-1.28-.97-1.93-3.08-2.6-2.52-.78-3.79-2.07-3.79-3.9 0-1.83 1.34-3.1 3.12-3.48V3.1h2.67v1.79c1.55.33 2.76 1.48 2.91 3.1h-1.96c-.15-1.04-.9-1.59-2.28-1.59-1.39 0-2.32.74-2.32 1.8 0 1.25 1.25 1.77 3.29 2.45 2.46.81 3.58 2.07 3.58 4.04 0 1.91-1.35 3.16-3.22 3.4z"/></svg>
                                DEFI PLATFORM
                            </span>
                            <span class="text-[9px] font-mono uppercase tracking-widest text-gray-400">
                                ENTERPRISE &middot; TS
                            </span>
                        </div>
                        <h3 class="text-2xl font-sans font-medium text-ink mb-2 group-hover:text-blue-500 transition-colors">Chainbudget</h3>
                        <p class="text-sm text-gray-500 font-sans max-w-lg leading-relaxed">
                            A Blockchain-Based Budget Management System for Transparent Organizational Fund Monitoring. Ensures financial integrity across departments.
                        </p>
                        
                        <div class="mt-6 flex flex-wrap items-center gap-3">
                            <div class="px-4 py-2 rounded-xl border border-gray-200 bg-white text-[10px] font-mono uppercase tracking-wider text-gray-500 flex items-center gap-2 group-hover:bg-gray-100 transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.463-1.11-1.463-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.831.092-.646.35-1.086.636-1.336-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0112 6.836c.85.004 1.705.114 2.504.336 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C19.138 20.161 22 16.418 22 12c0-5.523-4.477-10-10-10z"/></svg>
                                GitHub Repo
                            </div>
                            <div class="px-4 py-2 rounded-xl border border-gray-200 bg-white text-[10px] font-mono uppercase tracking-wider text-gray-500 flex items-center gap-2 group-hover:bg-gray-100 transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                Live App
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Card 3: Report-Davao -->
            <a href="https://github.com/Dranyl-23/Report-Davao" target="_blank" class="block rounded-3xl bg-gray-50 border border-gray-100 p-6 sm:p-8 transition-all hover:-translate-y-1 hover:shadow-xl hover:shadow-gray-200/50 group">
                <div class="flex flex-col sm:flex-row gap-6 items-start">
                    <!-- Icon -->
                    <img src="{{ asset('ProjectLogos/ReportDavao.png') }}" alt="Report-Davao Logo" class="w-16 h-16 shrink-0 rounded-2xl object-cover shadow-inner bg-gray-100 border border-gray-200/50">
                    <!-- Content -->
                    <div class="flex-1">
                        <div class="flex items-center gap-3 flex-wrap mb-3">
                            <span class="px-3 py-1 rounded-full border border-gray-200 bg-gray-100/50 text-[9px] font-mono uppercase tracking-widest text-gray-500 flex items-center gap-1.5">
                                <svg class="w-3 h-3 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                                CIVIC TECH
                            </span>
                            <span class="text-[9px] font-mono uppercase tracking-widest text-gray-400">
                                PUBLIC SERVICE &middot; TS
                            </span>
                        </div>
                        <h3 class="text-2xl font-sans font-medium text-ink mb-2 group-hover:text-red-500 transition-colors">Report-Davao</h3>
                        <p class="text-sm text-gray-500 font-sans max-w-lg leading-relaxed">
                            A modern civic issue reporting platform. Empowers citizens to report, track, and resolve community problems in real-time.
                        </p>
                        
                        <div class="mt-6 flex flex-wrap items-center gap-3">
                            <div class="px-4 py-2 rounded-xl border border-gray-200 bg-white text-[10px] font-mono uppercase tracking-wider text-gray-500 flex items-center gap-2 group-hover:bg-gray-100 transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.463-1.11-1.463-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.831.092-.646.35-1.086.636-1.336-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0112 6.836c.85.004 1.705.114 2.504.336 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C19.138 20.161 22 16.418 22 12c0-5.523-4.477-10-10-10z"/></svg>
                                GitHub Repo
                            </div>
                            <div class="px-4 py-2 rounded-xl border border-gray-200 bg-white text-[10px] font-mono uppercase tracking-wider text-gray-500 flex items-center gap-2 group-hover:bg-gray-100 transition-colors">
                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                Live App
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            
        </div>

        <!-- Other Projects List -->
        <div class="mt-16 sm:mt-24 reveal d4">
            <div class="flex flex-col border-t border-gray-100">
                
                <!-- ai-assistant-workflows -->
                <a href="https://github.com/Dranyl-23/ai-assistant-workflows" target="_blank" class="group flex flex-col sm:flex-row items-start sm:items-center justify-between py-7 border-b border-gray-100 hover:bg-gray-50/50 transition-colors -mx-4 px-4 sm:mx-0 sm:px-2 rounded-xl sm:rounded-none sm:hover:bg-transparent">
                    <div class="w-full sm:w-1/3 mb-2 sm:mb-0">
                        <h4 class="text-sm font-sans font-medium text-ink group-hover:text-gray-500 transition-colors">ai-assistant-workflows</h4>
                    </div>
                    <div class="w-full sm:w-2/3 flex items-center justify-between">
                        <div class="flex flex-col pr-4">
                            <span class="text-[9px] font-mono uppercase tracking-widest text-gray-400 mb-1.5">PRODUCTIVITY &middot; TS</span>
                            <p class="text-xs text-gray-500 font-sans max-w-sm leading-relaxed">Your personal AI assistant mapped to your daily work routines.</p>
                        </div>
                        <span class="text-gray-300 font-sans group-hover:text-ink group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform">↗</span>
                    </div>
                </a>

                <!-- Brgy-app -->
                <a href="https://github.com/Dranyl-23/Brgy-app" target="_blank" class="group flex flex-col sm:flex-row items-start sm:items-center justify-between py-7 border-b border-gray-100 hover:bg-gray-50/50 transition-colors -mx-4 px-4 sm:mx-0 sm:px-2 rounded-xl sm:rounded-none sm:hover:bg-transparent">
                    <div class="w-full sm:w-1/3 mb-2 sm:mb-0">
                        <h4 class="text-sm font-sans font-medium text-ink group-hover:text-gray-500 transition-colors">Brgy-app</h4>
                    </div>
                    <div class="w-full sm:w-2/3 flex items-center justify-between">
                        <div class="flex flex-col pr-4">
                            <span class="text-[9px] font-mono uppercase tracking-widest text-gray-400 mb-1.5">WEB APP &middot; TS</span>
                            <p class="text-xs text-gray-500 font-sans max-w-sm leading-relaxed">Local government unit (Barangay) management and operations portal.</p>
                        </div>
                        <span class="text-gray-300 font-sans group-hover:text-ink group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform">↗</span>
                    </div>
                </a>

                <!-- Sleep_Optimizer -->
                <a href="https://github.com/Dranyl-23/Sleep_Optimizer" target="_blank" class="group flex flex-col sm:flex-row items-start sm:items-center justify-between py-7 border-b border-gray-100 hover:bg-gray-50/50 transition-colors -mx-4 px-4 sm:mx-0 sm:px-2 rounded-xl sm:rounded-none sm:hover:bg-transparent">
                    <div class="w-full sm:w-1/3 mb-2 sm:mb-0">
                        <h4 class="text-sm font-sans font-medium text-ink group-hover:text-gray-500 transition-colors">Sleep_Optimizer</h4>
                    </div>
                    <div class="w-full sm:w-2/3 flex items-center justify-between">
                        <div class="flex flex-col pr-4">
                            <span class="text-[9px] font-mono uppercase tracking-widest text-gray-400 mb-1.5">MOBILE APP &middot; DART</span>
                            <p class="text-xs text-gray-500 font-sans max-w-sm leading-relaxed">A mobile application built with Flutter for optimizing user sleep patterns.</p>
                        </div>
                        <span class="text-gray-300 font-sans group-hover:text-ink group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform">↗</span>
                    </div>
                </a>

                <!-- Lynard Portfolio -->
                <a href="https://github.com/Dranyl-23/Lynard" target="_blank" class="group flex flex-col sm:flex-row items-start sm:items-center justify-between py-7 border-b border-gray-100 hover:bg-gray-50/50 transition-colors -mx-4 px-4 sm:mx-0 sm:px-2 rounded-xl sm:rounded-none sm:hover:bg-transparent">
                    <div class="w-full sm:w-1/3 mb-2 sm:mb-0">
                        <h4 class="text-sm font-sans font-medium text-ink group-hover:text-gray-500 transition-colors">Lynard</h4>
                    </div>
                    <div class="w-full sm:w-2/3 flex items-center justify-between">
                        <div class="flex flex-col pr-4">
                            <span class="text-[9px] font-mono uppercase tracking-widest text-gray-400 mb-1.5">PORTFOLIO &middot; BLADE</span>
                            <p class="text-xs text-gray-500 font-sans max-w-sm leading-relaxed">This very portfolio. A sleek, minimal showcase built with Laravel and Tailwind CSS.</p>
                        </div>
                        <span class="text-gray-300 font-sans group-hover:text-ink group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform">↗</span>
                    </div>
                </a>

            </div>
        </div>

    </div>
</x-layout>
