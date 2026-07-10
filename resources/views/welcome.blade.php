<x-layout>
    <div class="mx-auto max-w-2xl px-6">
            <!-- Hero -->
            <section class="relative pt-20 pb-16 sm:pt-28">
                <div class="grid gap-9 sm:grid-cols-[18rem_1fr] sm:items-start sm:gap-10">
                    
                    <!-- Image column (Left) -->
                    <div class="reveal d1 mx-auto w-48 shrink-0 sm:w-full sm:order-first">
                        <div class="halftone-portrait relative">
                            <img src="{{ asset('profile.png') }}" alt="Lynard" class="h-auto w-full">
                            <div class="halftone-overlay pointer-events-none absolute inset-0" style="-webkit-mask-image: url('{{ asset('profile.png') }}'); mask-image: url('{{ asset('profile.png') }}'); -webkit-mask-size: 100% 100%; mask-size: 100% 100%;"></div>
                        </div>
                    </div>

                    <!-- Text column (Right) -->
                    <div class="reveal d2 flex flex-col justify-center sm:pt-4">
                        <h1 class="font-pixel text-[2.3rem] leading-[1.05] tracking-[-0.01em] text-ink sm:text-[3rem]">
                            Lynard
                        </h1>
                        <!-- Bio -->
                        <p class="mt-4 max-w-lg text-[0.95rem] leading-relaxed text-gray-700 dark:text-gray-400 sm:mt-5 sm:text-base">
                            I'm a full-stack developer with a keen eye for design. I blend technical expertise with creative thinking to build seamless user experiences.
                        </p>
                        <p class="mt-4 max-w-lg text-[0.95rem] leading-relaxed text-gray-700 dark:text-gray-400 sm:text-base">
                            When I'm not coding, I'm exploring new technologies, contributing to open-source, or sketching UI concepts.
                        </p>

                        <!-- Social Links -->
                        <div class="mt-8 flex items-center gap-3 font-mono text-[0.75rem] text-gray-500 dark:text-gray-500 sm:gap-4">
                            <a href="https://github.com/Dranyl-23" class="hover:text-ink transition-colors whitespace-nowrap">github ↗</a>
                            <a href="https://linkedin.com/in/alfielynard" class="hover:text-ink transition-colors whitespace-nowrap">linkedin ↗</a>
                            <a href="https://facebook.com/alfielynard" class="hover:text-ink transition-colors whitespace-nowrap">facebook ↗</a>
                            <a href="#" @click.prevent="$dispatch('open-email-modal')" class="hover:text-ink transition-colors whitespace-nowrap">email</a>
                        </div>

                    </div>
                </div>

                <!-- Stats Section -->
                <div class="reveal d3 mt-16 sm:mt-24 w-full">
                    <div class="grid grid-cols-2 sm:grid-cols-4 border-y border-gray-100">
                        <!-- Stat 1 -->
                        <div class="py-6 sm:pr-6 border-b sm:border-b-0 border-r border-gray-100">
                            <div class="font-pixel text-xl sm:text-[1.4rem] flex items-start gap-1">
                                3+ <span class="text-[0.65rem] text-gray-400 font-sans mt-1.5">↗</span>
                            </div>
                            <div class="mt-2 text-[0.65rem] font-mono text-gray-500 uppercase tracking-widest whitespace-nowrap">Yrs Exp</div>
                        </div>
                        <!-- Stat 2 (Clickable) -->
                        <a href="/projects" class="group block cursor-pointer py-6 pl-6 sm:px-6 border-b sm:border-b-0 sm:border-r border-gray-100">
                            <div class="font-pixel text-xl sm:text-[1.4rem] flex items-start gap-1">
                                10+ <span class="inline-block text-[0.65rem] text-gray-300 font-sans mt-1.5 transition-all duration-300 group-hover:text-ink group-hover:scale-125 group-hover:-translate-y-px group-hover:translate-x-px group-hover:font-bold">↗</span>
                            </div>
                            <div class="mt-2 text-[0.65rem] font-mono text-gray-500 uppercase tracking-widest whitespace-nowrap transition-colors group-hover:text-ink">Projects</div>
                        </a>
                        <!-- Stat 3 (Clickable) -->
                        <div role="button" tabindex="0" onclick="openHackathonModal()" onkeydown="if(event.key === 'Enter' || event.key === ' ') { event.preventDefault(); openHackathonModal(); }" class="group cursor-pointer py-6 pr-6 sm:px-6 border-r border-gray-100">
                            <div class="font-pixel text-xl sm:text-[1.4rem] flex items-start gap-1">
                                1<span class="text-[1rem] text-gray-400 font-sans font-medium mt-[0.15rem]">x</span> <span class="inline-block text-[0.65rem] text-gray-300 font-sans mt-1.5 transition-all duration-300 group-hover:text-ink group-hover:scale-125 group-hover:-translate-y-px group-hover:translate-x-px group-hover:font-bold">↗</span>
                            </div>
                            <div class="mt-2 text-[0.65rem] font-mono text-gray-500 uppercase tracking-widest whitespace-nowrap transition-colors group-hover:text-ink">StellarX</div>
                        </div>
                        <!-- Stat 4 -->
                        <div class="py-6 pl-6">
                            <div class="font-pixel text-xl sm:text-[1.4rem] flex items-start gap-1">
                                999+
                            </div>
                            <div class="mt-2 text-[0.65rem] font-mono text-gray-500 uppercase tracking-widest whitespace-nowrap">Cups of Coffee</div>
                        </div>
                    </div>

                    <!-- Dotted Divider -->
                    <div class="mt-8 mb-12 border-b border-gray-100/0">
                        <div class="halftone halftone-wide h-6.5 w-full opacity-30"></div>
                    </div>
                    
                    <!-- Blog Section -->
                    <div id="blog" class="reveal d4 w-full pb-16 pt-8">
                        <div class="flex items-center justify-between font-mono text-[0.65rem] text-gray-500 uppercase tracking-widest mb-10">
                            <span>01 — blog</span>
                            <a href="/blog" class="hover:text-ink transition-colors">ALL POSTS &rarr;</a>
                        </div>

                        <div class="flex flex-col gap-10">
                            @foreach($posts as $post)
                            <a href="/blog/{{ $post->slug }}" class="group block">
                                <div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-2">
                                    <h3 class="font-sans text-[1.05rem] font-medium text-ink dark:text-gray-200 group-hover:text-gray-500 dark:group-hover:text-gray-400 transition-colors">{{ $post->title }}</h3>
                                    <span class="font-mono text-[0.65rem] text-gray-400 uppercase tracking-widest shrink-0">{{ $post->date }}</span>
                                </div>
                                <p class="mt-2 text-[0.9rem] text-gray-500 dark:text-gray-400 leading-relaxed max-w-2xl group-hover:text-gray-400 transition-colors">
                                    {{ $post->excerpt }}
                                </p>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Dotted Divider -->
                    <div class="mt-8 mb-12 border-b border-gray-100/0">
                        <div class="halftone halftone-wide h-6.5 w-full opacity-30"></div>
                    </div>

                    <!-- Projects Section (Overlapping Cards) -->
                    <div id="projects" class="w-full pb-16 pt-8 overflow-visible">
                        <div class="flex items-center justify-between font-mono text-[0.65rem] text-gray-500 uppercase tracking-widest mb-10">
                            <span>01 &mdash; Projects</span>
                            <a href="/projects" class="hover:text-ink transition-colors">ALL PROJECTS &rarr;</a>
                        </div>
                           <!-- Cards Container -->
                        <div class="relative w-full h-112.5 sm:h-125 flex items-center justify-center mt-12 mb-8">
                            
                            <!-- Left Card (Chainbudget) -->
                            <div onclick="window.open('https://github.com/Dranyl-23/Chainbudget', '_blank')" class="absolute left-1/2 top-1/2 -ml-30 sm:-ml-40 mt-5 w-65 sm:w-70 -translate-x-1/2 -translate-y-1/2 -rotate-10 z-10 hover:z-40! group/card cursor-pointer">
                                <div class="bg-white border border-gray-200 rounded-[1.25rem] p-5 shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all duration-500 ease-out opacity-85 group-hover/card:translate-x-[-20%] group-hover/card:rotate-[-4deg] group-hover/card:-translate-y-4 group-hover/card:scale-[1.05] group-hover/card:opacity-100">
                                    <div class="flex flex-wrap gap-2 mb-5">
                                        <div class="bg-gray-600 rounded-full px-2.5 py-1 font-mono text-[9px] text-white uppercase tracking-widest flex items-center gap-1">
                                            &lt; TOP BUDGET TOOL &gt;
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4 mb-4">
                                        <img src="/ProjectLogos/Chainbudget.png" alt="Chainbudget Logo" class="w-12 h-12 rounded-[0.8rem] object-cover shadow-sm border border-gray-100">
                                        <h4 class="font-sans text-[16px] font-medium text-ink">Chainbudget</h4>
                                    </div>
                                    <p class="text-[12px] text-gray-500 mb-6 leading-relaxed line-clamp-2">
                                        A Blockchain-Based Budget Management System for Transparent Organizational Fund Monitoring.
                                    </p>
                                    <div class="flex gap-2">
                                        <a href="#" onclick="event.stopPropagation();" class="bg-ink border border-transparent rounded-lg px-2.5 py-1.5 flex items-center gap-1.5 hover:opacity-80 transition-opacity">
                                            <svg class="w-4 h-4 text-white" viewBox="0 0 384 512" fill="currentColor"><path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 24 184.8 8 273.5q-19 104.9 31.9 193.3c15 25.5 35 55 62.5 56.4 25.6 1.4 36.4-13.6 67.2-13.6 30.8 0 40.5 13.6 67.2 13.6 29.5 0 46.5-27.9 61.5-53.5 20.2-34.6 28-66.7 28.5-68.5-1.1-.4-47.9-17.5-48.1-72.5zM259.6 100.9C278.4 78 288.7 46 285.3 14c-28.7 1.1-61.6 19.3-81.2 41.8-17.5 19.7-29.6 51.6-25.5 83.2 31.6 2.4 62.1-18.4 81-40.1z"/></svg>
                                            <div class="flex flex-col">
                                                <span class="text-[7px] text-gray-300 leading-none">Download on the</span>
                                                <span class="text-[10px] font-medium text-white leading-tight mt-0.5">App Store</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Card (Report-Davao) -->
                            <div onclick="window.open('https://github.com/Dranyl-23/Report-Davao', '_blank')" class="absolute left-1/2 top-1/2 ml-30 sm:ml-40 mt-5 w-65 sm:w-70 -translate-x-1/2 -translate-y-1/2 rotate-10 z-10 hover:z-40! group/card cursor-pointer">
                                <div class="bg-white border border-gray-200 rounded-[1.25rem] p-5 shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all duration-500 ease-out opacity-85 group-hover/card:translate-x-[20%] group-hover/card:rotate-[4deg] group-hover/card:-translate-y-4 group-hover/card:scale-[1.05] group-hover/card:opacity-100">
                                    <div class="flex flex-wrap gap-2 mb-5">
                                        <div class="bg-gray-500 rounded-full px-2.5 py-1 font-mono text-[9px] text-white uppercase tracking-widest flex items-center gap-1">
                                            &lt; CIVIC PLATFORM &gt;
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4 mb-4">
                                        <img src="/ProjectLogos/ReportDavao.png" alt="Report-Davao Logo" class="w-12 h-12 rounded-[0.8rem] object-cover shadow-sm border border-gray-100">
                                        <h4 class="font-sans text-[16px] font-medium text-ink">Report-Davao</h4>
                                    </div>
                                    <p class="text-[12px] text-gray-500 mb-6 leading-relaxed line-clamp-2">
                                        Civic issue reporting platform for local communities to track and solve problems.
                                    </p>
                                    <div class="flex gap-2">
                                        <a href="#" onclick="event.stopPropagation();" class="bg-ink border border-transparent rounded-lg px-2.5 py-1.5 flex items-center gap-1.5 hover:opacity-80 transition-opacity">
                                            <svg class="w-4 h-4 text-white" viewBox="0 0 384 512" fill="currentColor"><path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 24 184.8 8 273.5q-19 104.9 31.9 193.3c15 25.5 35 55 62.5 56.4 25.6 1.4 36.4-13.6 67.2-13.6 30.8 0 40.5 13.6 67.2 13.6 29.5 0 46.5-27.9 61.5-53.5 20.2-34.6 28-66.7 28.5-68.5-1.1-.4-47.9-17.5-48.1-72.5zM259.6 100.9C278.4 78 288.7 46 285.3 14c-28.7 1.1-61.6 19.3-81.2 41.8-17.5 19.7-29.6 51.6-25.5 83.2 31.6 2.4 62.1-18.4 81-40.1z"/></svg>
                                            <div class="flex flex-col">
                                                <span class="text-[7px] text-gray-300 leading-none">Download on the</span>
                                                <span class="text-[10px] font-medium text-white leading-tight mt-0.5">App Store</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Center Card (4PS-Nexus) -->
                            <div onclick="window.open('https://github.com/Dranyl-23/4PS-Nexus', '_blank')" class="absolute left-1/2 top-1/2 w-72.5 sm:w-82.5 -translate-x-1/2 -translate-y-1/2 z-30 hover:z-40! group/card cursor-pointer">
                                <div class="bg-white border border-gray-200 rounded-3xl p-6 sm:p-7 shadow-[0_20px_60px_rgb(0,0,0,0.1)] transition-all duration-500 ease-out group-hover/card:-translate-y-6 group-hover/card:scale-[1.03]">
                                    <div class="flex flex-wrap gap-2 mb-6">
                                        <div class="bg-ink rounded-full px-3 py-1 font-mono text-[9px] text-white uppercase tracking-widest flex items-center gap-1">
                                            &lt; #1 BLOCKCHAIN APP &gt;
                                        </div>
                                        <div class="border border-gray-200 rounded-full px-3 py-1 font-mono text-[9px] text-gray-500 uppercase tracking-widest">
                                            GOVTECH
                                        </div>
                                        <div class="border border-gray-200 rounded-full px-3 py-1 font-mono text-[9px] text-gray-500 uppercase tracking-widest">
                                            MADE IN THE PHILIPPINES
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-4 mb-5">
                                        <img src="/ProjectLogos/4Ps-Nexus.jpg" alt="4PS-Nexus Logo" class="w-14 h-14 rounded-2xl object-cover shadow-sm border border-gray-100">
                                        <h4 class="font-sans text-[18px] font-medium text-ink">4PS-Nexus</h4>
                                    </div>
                                    <p class="text-[13.5px] text-gray-500 mb-8 leading-relaxed line-clamp-3">
                                        A blockchain-based disbursement system for the Philippine 4Ps program using programmable money.
                                    </p>
                                    <div class="flex gap-3">
                                        <a href="#" onclick="event.stopPropagation();" class="bg-ink border border-transparent hover:opacity-80 transition-opacity rounded-xl px-3 py-2 flex items-center gap-2">
                                            <svg class="w-5 h-5 text-white" viewBox="0 0 384 512" fill="currentColor"><path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 24 184.8 8 273.5q-19 104.9 31.9 193.3c15 25.5 35 55 62.5 56.4 25.6 1.4 36.4-13.6 67.2-13.6 30.8 0 40.5 13.6 67.2 13.6 29.5 0 46.5-27.9 61.5-53.5 20.2-34.6 28-66.7 28.5-68.5-1.1-.4-47.9-17.5-48.1-72.5zM259.6 100.9C278.4 78 288.7 46 285.3 14c-28.7 1.1-61.6 19.3-81.2 41.8-17.5 19.7-29.6 51.6-25.5 83.2 31.6 2.4 62.1-18.4 81-40.1z"/></svg>
                                            <div class="flex flex-col items-start">
                                                <span class="text-[8px] text-gray-300 leading-none">Download on the</span>
                                                <span class="text-[12px] font-medium text-white leading-tight mt-0.5">App Store</span>
                                            </div>
                                        </a>
                                        <a href="#" onclick="event.stopPropagation();" class="bg-ink border border-transparent hover:opacity-80 transition-opacity rounded-xl px-3 py-2 flex items-center gap-2">
                                            <svg class="w-5 h-5 text-white" viewBox="0 0 512 512" fill="currentColor"><path d="M325.3 234.3L104.6 13l280.8 161.2-60.1 60.1zM47 0C34 6.8 25.3 19.2 25.3 35.3v441.3c0 16.1 8.7 28.5 21.7 35.3l256.6-256L47 0zm425.2 225.6l-58.9-34.1-65.7 64.5 65.7 64.5 60.1-34.1c18-14.3 18-46.5-1.2-60.8zM104.6 499l280.8-161.2-60.1-60.1L104.6 499z"/></svg>
                                            <div class="flex flex-col items-start">
                                                <span class="text-[8px] text-gray-300 leading-none">GET IT ON</span>
                                                <span class="text-[12px] font-medium text-white leading-tight mt-0.5">Google Play</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>                       </div>
                    </div>

                    <!-- Dotted Divider -->
                    <div class="mt-8 mb-12 border-b border-gray-100/0">
                        <div class="halftone halftone-wide h-6.5 w-full opacity-30"></div>
                    </div>

                    <!-- Experience Section -->
                    <div id="experience" class="w-full pb-10 pt-8">
                        <div class="flex items-center justify-between font-mono text-[0.65rem] text-gray-500 uppercase tracking-widest mb-10">
                            <span>03 — experience</span>
                            <a href="/experience" class="hover:text-ink transition-colors">FULL HISTORY &rarr;</a>
                        </div>

                        <div class="flex flex-col gap-1">
                            @foreach(array_slice(config('portfolio.experience'), 0, 4) as $job)
                            @php 
                                $firstRole = $job['roles'][0]; 
                                $startDate = explode(' - ', $firstRole['duration'])[0]; 
                                $year = substr($startDate, -4);
                            @endphp
                            <a href="/experience" class="group grid grid-cols-[3rem_1fr_auto] sm:grid-cols-[4rem_1fr_auto] gap-4 items-center py-2.5 sm:py-3 border-b border-gray-100/0 hover:border-gray-100 hover:bg-gray-50 transition-all px-2 sm:px-4 -mx-2 sm:-mx-4 rounded-lg">
                                <div class="font-mono text-[12px] sm:text-[13px] text-gray-400">{{ $year }}</div>
                                <div class="font-sans text-[13.5px] sm:text-[14px] font-medium text-ink group-hover:text-gray-500 transition-colors">{{ $firstRole['title'] }}</div>
                                <div class="font-sans text-[12.5px] sm:text-[13px] text-gray-500 text-right">{{ $job['company'] }}</div>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Stack Section -->
                    <div id="stack" class="w-full pb-32 pt-2">
                        <div class="flex items-center justify-between font-mono text-[0.65rem] text-gray-500 uppercase tracking-widest mb-6">
                            <span>STACK</span>
                            <a href="/stack" class="hover:text-ink transition-colors">VIEW ALL &rarr;</a>
                        </div>

                        <div class="flex flex-wrap gap-2.5 sm:gap-3">
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">TypeScript</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">React</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">Next.js</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">Vue.js</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">Nuxt.js</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">TailwindCSS</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">Node.js</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">Python</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">Laravel</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">Rust</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">PostgreSQL</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">MongoDB</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">Firebase</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">Supabase</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">Flutter</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">Dart</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">PyTorch</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">Docker</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">AWS</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">Vercel</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">CI/CD</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">Git</div>
                            <div class="rounded-xl border border-gray-200 px-3.5 py-1.5 font-mono text-[13px] text-ink hover:bg-gray-50 transition-colors cursor-default">GitHub</div>
                        </div>
                </div>
            </section>
        </div>
    </main>

    <script>
    document.addEventListener('alpine:init', () => {
    });
    </script>
</x-layout>
