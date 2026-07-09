<x-layout>
    <div class="mx-auto max-w-5xl px-6">
        <!-- Header -->
        <section class="relative pt-20 pb-12 sm:pt-28">
            <h1 class="font-pixel text-[2.3rem] leading-[1.05] tracking-[-0.01em] text-ink sm:text-[3rem]">
                collabs
            </h1>
            <p class="mt-4 max-w-lg text-[0.95rem] leading-relaxed text-gray-600 sm:mt-5 sm:text-[15px]">
                As a software engineer and creative, I partner with brands and organizations on projects, education, and development. A few I've worked with:
            </p>
        </section>

        <!-- Content -->
        <div class="w-full pb-32 pt-6">
            <!-- Logos Row -->
            <div class="flex flex-wrap items-center gap-10 sm:gap-12 mb-20 text-ink" style="align-items: center;">
                <!-- Figma -->
                <img src="/CertificationLogo/figma%20logo.png" style="height: 28px; width: auto;" class="object-contain grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-300 mix-blend-multiply dark:mix-blend-screen dark:invert" alt="Figma">
                
                <!-- Cisco -->
                <svg viewBox="0 0 100 50" fill="currentColor" style="height: 24px; width: auto; flex-shrink: 0;" class="opacity-40 hover:opacity-100 transition-opacity duration-300 cursor-pointer"><text x="0" y="44" font-family="Arial, sans-serif" font-weight="bold" font-size="28" letter-spacing="-1">CISCO</text><path d="M10,20 v-8 M22,20 v-14 M34,20 v-8 M46,20 v-5 M58,20 v-12 M70,20 v-5 M82,20 v-10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/></svg>
                
                <!-- OpenAI -->
                <img src="/CertificationLogo/openxAI.png" style="height: 26px; width: auto;" class="object-contain grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-300 mix-blend-multiply dark:mix-blend-screen dark:invert" alt="OpenAI">
                
                <!-- Base -->
                <img src="/CertificationLogo/BASEPH%20logo.png" style="height: 20px; width: auto;" class="object-contain grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-300 mix-blend-multiply dark:mix-blend-screen dark:invert" alt="Base">
                
                <!-- StellarX (Black BG natively) -->
                <img src="/CertificationLogo/StellarX.jpg" style="height: 24px; width: auto;" class="object-contain grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-300 invert dark:invert-0 mix-blend-multiply dark:mix-blend-screen" alt="StellarX">
                
                <span class="font-mono text-[11px] text-gray-400 opacity-60 ml-2">...and more</span>
            </div>

            <!-- Map -->
            <style>
                .map-container {
                    mix-blend-mode: multiply;
                    -webkit-mask-image: radial-gradient(ellipse at center, rgba(0,0,0,1) 40%, rgba(0,0,0,0) 75%);
                    mask-image: radial-gradient(ellipse at center, rgba(0,0,0,1) 40%, rgba(0,0,0,0) 75%);
                }
                .dark .map-container {
                    mix-blend-mode: screen;
                }
                .magic-map {
                    /* Light mode: Increase contrast to push light ocean dots to white */
                    filter: grayscale(1) contrast(300%);
                    opacity: 0.85;
                }
                .dark .magic-map {
                    /* Dark mode: Invert to make it white dots on black */
                    filter: grayscale(1) contrast(300%) invert(1);
                    opacity: 0.7;
                }
            </style>
            
            <div class="relative w-full aspect-[2.2/1] bg-transparent flex flex-col items-center justify-center overflow-hidden map-container">
                <img src="/WorldMap/worldmap.jpg" class="z-10 w-full h-full object-cover sm:object-contain transition-opacity duration-500 magic-map hover:opacity-100" alt="World Map">
            </div>
            
            <p class="text-center font-mono text-[10px] uppercase tracking-widest text-gray-400 -mt-6 sm:-mt-8 opacity-70 relative z-20">WORKING WITH BRANDS & TEAMS WORLDWIDE</p>

            <!-- CTA Card -->
            <div class="mt-10 rounded-2xl border border-gray-200 dark:border-white/10 bg-transparent p-8 sm:p-10 flex flex-col sm:flex-row sm:items-center justify-between gap-10">
                <div class="flex-1">
                    <h2 class="text-[17px] font-mono tracking-tighter mb-4 text-ink">let's work together</h2>
                    <p class="text-gray-500 dark:text-gray-400 text-[14px] leading-[1.65]">
                        Open to brand collaborations, sponsored content, creative projects,<br class="hidden sm:block">
                        and university talks & speaking. Reach me directly and let's make<br class="hidden sm:block">
                        something.
                    </p>
                </div>
                <div class="flex flex-col items-start gap-3 shrink-0">
                    <a href="mailto:alfielynard23@gmail.com" class="w-full sm:w-auto bg-ink text-white dark:bg-white dark:text-black hover:opacity-80 transition-opacity font-medium text-[13.5px] px-5 py-2.5 rounded-lg text-center flex items-center justify-center gap-2.5">
                        <svg viewBox="0 0 24 24" fill="none" class="h-4 w-4 shrink-0"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" stroke="currentColor" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Get in touch
                    </a>
                    <span class="font-mono text-[11px] text-gray-400">alfielynard23@gmail.com</span>
                </div>
            </div>
        </div>
    </div>
</x-layout>
