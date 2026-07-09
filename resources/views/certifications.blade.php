<x-layout>
    <div x-data="{ modalOpen: false, modalType: '', modalSrc: '', openModal(type, src) { this.modalType = type; this.modalSrc = src; this.modalOpen = true; document.body.style.overflow = 'hidden'; }, closeModal() { this.modalOpen = false; setTimeout(() => this.modalSrc = '', 300); document.body.style.overflow = ''; } }" @keydown.escape.window="closeModal()" class="mx-auto max-w-5xl px-6 relative">
        <!-- Header -->
        <section class="relative pt-20 pb-12 sm:pt-28 border-b border-gray-100/0">
            <h1 class="font-pixel text-[2.3rem] leading-[1.05] tracking-[-0.01em] text-ink sm:text-[3rem]">
                certifications
            </h1>
            <p class="mt-4 max-w-lg text-[0.95rem] leading-relaxed text-gray-700 sm:mt-5 sm:text-base">
                Achievements and recognitions earned through competitions, workshops, and community events.
            </p>
        </section>

        <!-- Content -->
        <div class="w-full pb-32 pt-10">
            <div class="flex flex-col gap-24">
                
                <!-- Category: AWARDS & CERTIFICATES -->
                <div>
                    <h3 class="font-mono text-[0.65rem] text-gray-400 uppercase tracking-widest mb-12 text-center sm:text-left">AWARDS & CERTIFICATES</h3>
                    
                    <div class="flex flex-wrap justify-center sm:justify-start gap-y-8 sm:-mx-2">
                        
                        <!-- FigmaFusion x Cor Jesu -->
                        <a href="/CertificationLogo/Award%20&%20Cert/figma_cert.jpg" @click.prevent="openModal('image', '/CertificationLogo/Award%20&%20Cert/figma_cert.jpg')" target="_blank" class="group relative z-10 hover:!z-50 my-2 sm:-mx-3 mx-2 transition-all duration-300 ease-out hover:scale-[1.05] hover:-translate-y-3 block">
                            <div class="bg-white border border-gray-200/60 rounded-[1.5rem] p-3 w-[17rem] flex flex-col rotate-1 group-hover:rotate-0 transition-all duration-300 shadow-[0_4px_20px_rgb(0,0,0,0.04)] hover:shadow-xl">
                                <div class="relative w-full mb-8">
                                    <div class="w-full h-32 rounded-xl overflow-hidden bg-gray-100 relative border border-gray-100/50">
                                        <img src="/CertificationLogo/Award%20&%20Cert/figma_cert.jpg" alt="Figma Certificate" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="absolute -bottom-5 left-4 flex items-center">
                                        <div class="w-12 h-12 rounded-full border-4 border-white overflow-hidden bg-gray-50 shadow-sm flex items-center justify-center relative z-10 p-1">
                                            <img src="/CertificationLogo/figma%20logo.png" alt="Figma Logo" class="w-full h-full object-contain">
                                        </div>
                                        <div class="w-12 h-12 rounded-full border-4 border-white overflow-hidden bg-white shadow-sm flex items-center justify-center -ml-4 relative z-0 p-0.5">
                                            <img src="/CertificationLogo/Corjesu.webp" alt="Cor Jesu Logo" class="w-full h-full object-contain">
                                        </div>
                                    </div>
                                </div>
                                <div class="px-3 pb-3 text-left">
                                    <h4 class="font-sans text-[14px] font-bold text-ink leading-snug mb-1">FigmaFusion x Cor Jesu</h4>
                                    <div class="font-mono text-[9px] uppercase tracking-widest text-gray-500 mb-1">Concept to Interface</div>
                                    <div class="font-mono text-[8px] uppercase tracking-widest text-[var(--color-brand-cyan)] text-blue-500 font-semibold flex items-center gap-1 mt-4">
                                        &lang; VIEW CERTIFICATE &rang;
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- OpenAI x Davao DeFi -->
                        <a href="/CertificationLogo/Award%20&%20Cert/openAI_cert.jpg" @click.prevent="openModal('image', '/CertificationLogo/Award%20&%20Cert/openAI_cert.jpg')" target="_blank" class="group relative z-20 hover:!z-50 my-2 sm:-mx-3 mx-2 transition-all duration-300 ease-out hover:scale-[1.05] hover:-translate-y-3 block">
                            <div class="bg-white border border-gray-200/60 rounded-[1.5rem] p-3 w-[17rem] flex flex-col -rotate-2 group-hover:rotate-0 transition-all duration-300 shadow-[0_4px_20px_rgb(0,0,0,0.04)] hover:shadow-xl">
                                <div class="relative w-full mb-8">
                                    <div class="w-full h-32 rounded-xl overflow-hidden bg-gray-100 relative border border-gray-100/50">
                                        <img src="/CertificationLogo/Award%20&%20Cert/openAI_cert.jpg" alt="OpenAI Certificate" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="absolute -bottom-5 left-4 flex items-center">
                                        <div class="w-12 h-12 rounded-full border-4 border-white overflow-hidden bg-white shadow-sm flex items-center justify-center p-1 relative z-10">
                                            <img src="/CertificationLogo/openxAI.png" alt="OpenxAI Logo" class="w-full h-full object-contain">
                                        </div>
                                        <div class="w-12 h-12 rounded-full border-4 border-white overflow-hidden bg-gray-50 shadow-sm flex items-center justify-center -ml-4 relative z-0">
                                            <img src="/CertificationLogo/Davao%20Defi.jpg" alt="Davao Defi Logo" class="w-full h-full object-cover">
                                        </div>
                                    </div>
                                </div>
                                <div class="px-3 pb-3 text-left">
                                    <h4 class="font-sans text-[14px] font-bold text-ink leading-snug mb-1">OpenxAI x Davao DeFi</h4>
                                    <div class="font-mono text-[9px] uppercase tracking-widest text-gray-500 mb-1">Workshop & Competition</div>
                                    <div class="font-mono text-[8px] uppercase tracking-widest text-[var(--color-brand-cyan)] text-blue-500 font-semibold flex items-center gap-1 mt-4">
                                        &lang; VIEW CERTIFICATE &rang;
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Base -->
                        <a href="/CertificationLogo/Award%20&%20Cert/base_cert.jpg" @click.prevent="openModal('image', '/CertificationLogo/Award%20&%20Cert/base_cert.jpg')" target="_blank" class="group relative z-30 hover:!z-50 my-2 sm:-mx-3 mx-2 transition-all duration-300 ease-out hover:scale-[1.05] hover:-translate-y-3 block">
                            <div class="bg-white border border-gray-200/60 rounded-[1.5rem] p-3 w-[17rem] flex flex-col rotate-2 group-hover:rotate-0 transition-all duration-300 shadow-[0_4px_20px_rgb(0,0,0,0.04)] hover:shadow-xl">
                                <div class="relative w-full mb-8">
                                    <div class="w-full h-32 rounded-xl overflow-hidden bg-gray-100 relative border border-gray-100/50">
                                        <img src="/CertificationLogo/Award%20&%20Cert/base_cert.jpg" alt="Base Certificate" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="absolute -bottom-5 left-4 w-12 h-12 rounded-full border-4 border-white overflow-hidden bg-blue-50 shadow-sm flex items-center justify-center p-1">
                                        <img src="/CertificationLogo/BASEPH%20logo.png" alt="Base Logo" class="w-full h-full object-contain">
                                    </div>
                                </div>
                                <div class="px-3 pb-3 text-left">
                                    <h4 class="font-sans text-[14px] font-bold text-ink leading-snug mb-1">Base Certificate</h4>
                                    <div class="font-mono text-[9px] uppercase tracking-widest text-gray-500 mb-1">Web3 / Blockchain</div>
                                    <div class="font-mono text-[8px] uppercase tracking-widest text-[var(--color-brand-cyan)] text-blue-500 font-semibold flex items-center gap-1 mt-4">
                                        &lang; VIEW CERTIFICATE &rang;
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- StellarX -->
                        <a href="/CertificationLogo/StellarX%20People.jpg" @click.prevent="openModal('image', '/CertificationLogo/StellarX%20People.jpg')" target="_blank" class="group relative z-20 hover:!z-50 my-2 sm:-mx-3 mx-2 transition-all duration-300 ease-out hover:scale-[1.05] hover:-translate-y-3 block">
                            <div class="bg-white border border-gray-200/60 rounded-[1.5rem] p-3 w-[17rem] flex flex-col rotate-3 group-hover:rotate-0 transition-all duration-300 shadow-[0_4px_20px_rgb(0,0,0,0.04)] hover:shadow-xl">
                                <div class="relative w-full mb-8">
                                    <div class="w-full h-32 rounded-xl overflow-hidden bg-gray-100 relative border border-gray-100/50">
                                        <img src="/CertificationLogo/StellarX%20People.jpg" alt="StellarX Certificate" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    <div class="absolute -bottom-5 left-4 w-12 h-12 rounded-full border-4 border-white overflow-hidden bg-gray-50 shadow-sm flex items-center justify-center p-1">
                                        <img src="/CertificationLogo/StellarX.jpg" alt="StellarX Logo" class="w-full h-full object-contain">
                                    </div>
                                </div>
                                <div class="px-3 pb-3 text-left">
                                    <h4 class="font-sans text-[14px] font-bold text-ink leading-snug mb-1">StellarX</h4>
                                    <div class="font-mono text-[9px] uppercase tracking-widest text-gray-500 mb-1">Blockchain & Crypto</div>
                                    <div class="font-mono text-[8px] uppercase tracking-widest text-[var(--color-brand-cyan)] text-blue-500 font-semibold flex items-center gap-1 mt-4">
                                        &lang; VIEW IMAGE &rang;
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

                <!-- Category: NETWORKING & SECURITY -->
                <div>
                    <h3 class="font-mono text-[0.65rem] text-gray-400 uppercase tracking-widest mb-12 text-center sm:text-left">NETWORKING & SECURITY</h3>
                    
                    <div class="flex flex-wrap justify-center sm:justify-start gap-y-8 sm:-mx-2">
                        
                        <!-- Network Defense -->
                        <a href="/CertificationLogo/Networking%20Cert/Network_Defense.pdf" @click.prevent="openModal('pdf', '/CertificationLogo/Networking%20Cert/Network_Defense.pdf')" target="_blank" class="group relative z-10 hover:!z-50 my-2 sm:-mx-3 mx-2 transition-all duration-300 ease-out hover:scale-[1.05] hover:-translate-y-3 block">
                            <div class="bg-white border border-gray-200/60 rounded-[1.5rem] p-3 w-[17rem] flex flex-col -rotate-1 group-hover:rotate-0 transition-all duration-300 shadow-[0_4px_20px_rgb(0,0,0,0.04)] hover:shadow-xl">
                                <div class="relative w-full mb-8">
                                    <div class="w-full h-32 rounded-xl overflow-hidden bg-gradient-to-br from-blue-50 to-cyan-50 relative border border-gray-100/50">
                                        <div class="absolute inset-0 flex items-center justify-center opacity-20">
                                            <svg viewBox="0 0 24 24" class="w-16 h-16 text-blue-500" fill="currentColor"><path d="M12 2L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-3z"></path></svg>
                                        </div>
                                    </div>
                                    <div class="absolute -bottom-5 left-4 w-12 h-12 rounded-full border-4 border-white overflow-hidden bg-blue-100 text-blue-600 shadow-sm flex items-center justify-center">
                                        <svg viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor"><path d="M12 2L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-3z"></path></svg>
                                    </div>
                                </div>
                                <div class="px-3 pb-3 text-left">
                                    <h4 class="font-sans text-[14px] font-bold text-ink leading-snug mb-1">Network Defense</h4>
                                    <div class="font-mono text-[9px] uppercase tracking-widest text-gray-500 mb-1">Cybersecurity</div>
                                    <div class="font-mono text-[8px] uppercase tracking-widest text-[var(--color-brand-cyan)] text-blue-500 font-semibold flex items-center gap-1 mt-4">
                                        &lang; VIEW PDF &rang;
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Cyber Threat Management -->
                        <a href="/CertificationLogo/Networking%20Cert/Cyber_Threat_Management.pdf" @click.prevent="openModal('pdf', '/CertificationLogo/Networking%20Cert/Cyber_Threat_Management.pdf')" target="_blank" class="group relative z-20 hover:!z-50 my-2 sm:-mx-3 mx-2 transition-all duration-300 ease-out hover:scale-[1.05] hover:-translate-y-3 block">
                            <div class="bg-white border border-gray-200/60 rounded-[1.5rem] p-3 w-[17rem] flex flex-col rotate-2 group-hover:rotate-0 transition-all duration-300 shadow-[0_4px_20px_rgb(0,0,0,0.04)] hover:shadow-xl">
                                <div class="relative w-full mb-8">
                                    <div class="w-full h-32 rounded-xl overflow-hidden bg-gradient-to-br from-red-50 to-orange-50 relative border border-gray-100/50">
                                        <div class="absolute inset-0 flex items-center justify-center opacity-20">
                                            <svg viewBox="0 0 24 24" class="w-16 h-16 text-red-500" fill="currentColor"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-1 6h2v5h-2V7zm0 7h2v2h-2v-2z"></path></svg>
                                        </div>
                                    </div>
                                    <div class="absolute -bottom-5 left-4 w-12 h-12 rounded-full border-4 border-white overflow-hidden bg-red-100 text-red-600 shadow-sm flex items-center justify-center">
                                        <svg viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-1 6h2v5h-2V7zm0 7h2v2h-2v-2z"></path></svg>
                                    </div>
                                </div>
                                <div class="px-3 pb-3 text-left">
                                    <h4 class="font-sans text-[14px] font-bold text-ink leading-snug mb-1">Cyber Threat Mgt.</h4>
                                    <div class="font-mono text-[9px] uppercase tracking-widest text-gray-500 mb-1">Cybersecurity</div>
                                    <div class="font-mono text-[8px] uppercase tracking-widest text-[var(--color-brand-cyan)] text-blue-500 font-semibold flex items-center gap-1 mt-4">
                                        &lang; VIEW PDF &rang;
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Endpoint Security -->
                        <a href="/CertificationLogo/Networking%20Cert/Endpoint_Security.pdf" @click.prevent="openModal('pdf', '/CertificationLogo/Networking%20Cert/Endpoint_Security.pdf')" target="_blank" class="group relative z-30 hover:!z-50 my-2 sm:-mx-3 mx-2 transition-all duration-300 ease-out hover:scale-[1.05] hover:-translate-y-3 block">
                            <div class="bg-white border border-gray-200/60 rounded-[1.5rem] p-3 w-[17rem] flex flex-col -rotate-3 group-hover:rotate-0 transition-all duration-300 shadow-[0_4px_20px_rgb(0,0,0,0.04)] hover:shadow-xl">
                                <div class="relative w-full mb-8">
                                    <div class="w-full h-32 rounded-xl overflow-hidden bg-gradient-to-br from-green-50 to-emerald-50 relative border border-gray-100/50">
                                        <div class="absolute inset-0 flex items-center justify-center opacity-20">
                                            <svg viewBox="0 0 24 24" class="w-16 h-16 text-green-500" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path></svg>
                                        </div>
                                    </div>
                                    <div class="absolute -bottom-5 left-4 w-12 h-12 rounded-full border-4 border-white overflow-hidden bg-green-100 text-green-600 shadow-sm flex items-center justify-center">
                                        <svg viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path></svg>
                                    </div>
                                </div>
                                <div class="px-3 pb-3 text-left">
                                    <h4 class="font-sans text-[14px] font-bold text-ink leading-snug mb-1">Endpoint Security</h4>
                                    <div class="font-mono text-[9px] uppercase tracking-widest text-gray-500 mb-1">Cybersecurity</div>
                                    <div class="font-mono text-[8px] uppercase tracking-widest text-[var(--color-brand-cyan)] text-blue-500 font-semibold flex items-center gap-1 mt-4">
                                        &lang; VIEW PDF &rang;
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Networking -->
                        <a href="/CertificationLogo/Networking%20Cert/Networking.pdf" @click.prevent="openModal('pdf', '/CertificationLogo/Networking%20Cert/Networking.pdf')" target="_blank" class="group relative z-10 hover:!z-50 my-2 sm:-mx-3 mx-2 transition-all duration-300 ease-out hover:scale-[1.05] hover:-translate-y-3 block">
                            <div class="bg-white border border-gray-200/60 rounded-[1.5rem] p-3 w-[17rem] flex flex-col rotate-1 group-hover:rotate-0 transition-all duration-300 shadow-[0_4px_20px_rgb(0,0,0,0.04)] hover:shadow-xl">
                                <div class="relative w-full mb-8">
                                    <div class="w-full h-32 rounded-xl overflow-hidden bg-gradient-to-br from-purple-50 to-indigo-50 relative border border-gray-100/50">
                                        <div class="absolute inset-0 flex items-center justify-center opacity-20">
                                            <svg viewBox="0 0 24 24" class="w-16 h-16 text-purple-500" fill="currentColor"><path d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9c2.12 0 4.07-.74 5.61-1.97l3.68 3.68 1.41-1.41-3.68-3.68C19.26 16.07 20 14.12 20 12c0-4.97-4.03-9-9-9zm0 16c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zm-1-11h2v6h-2V8zm0 8h2v2h-2v-2z"></path></svg>
                                        </div>
                                    </div>
                                    <div class="absolute -bottom-5 left-4 w-12 h-12 rounded-full border-4 border-white overflow-hidden bg-purple-100 text-purple-600 shadow-sm flex items-center justify-center">
                                        <svg viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor"><path d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9c2.12 0 4.07-.74 5.61-1.97l3.68 3.68 1.41-1.41-3.68-3.68C19.26 16.07 20 14.12 20 12c0-4.97-4.03-9-9-9zm0 16c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zm-1-11h2v6h-2V8zm0 8h2v2h-2v-2z"></path></svg>
                                    </div>
                                </div>
                                <div class="px-3 pb-3 text-left">
                                    <h4 class="font-sans text-[14px] font-bold text-ink leading-snug mb-1">Networking</h4>
                                    <div class="font-mono text-[9px] uppercase tracking-widest text-gray-500 mb-1">Infrastructure</div>
                                    <div class="font-mono text-[8px] uppercase tracking-widest text-[var(--color-brand-cyan)] text-blue-500 font-semibold flex items-center gap-1 mt-4">
                                        &lang; VIEW PDF &rang;
                                    </div>
                                </div>
                            </div>
                        </a>
                        
                        <!-- DICT-ITU DTC -->
                        <a href="/CertificationLogo/Networking%20Cert/DICT-ITU%20DTC.pdf" @click.prevent="openModal('pdf', '/CertificationLogo/Networking%20Cert/DICT-ITU%20DTC.pdf')" target="_blank" class="group relative z-20 hover:!z-50 my-2 sm:-mx-3 mx-2 transition-all duration-300 ease-out hover:scale-[1.05] hover:-translate-y-3 block">
                            <div class="bg-white border border-gray-200/60 rounded-[1.5rem] p-3 w-[17rem] flex flex-col rotate-2 group-hover:rotate-0 transition-all duration-300 shadow-[0_4px_20px_rgb(0,0,0,0.04)] hover:shadow-xl">
                                <div class="relative w-full mb-8">
                                    <div class="w-full h-32 rounded-xl overflow-hidden bg-gradient-to-br from-yellow-50 to-amber-50 relative border border-gray-100/50">
                                        <div class="absolute inset-0 flex items-center justify-center opacity-20">
                                            <svg viewBox="0 0 24 24" class="w-16 h-16 text-yellow-600" fill="currentColor"><path d="M12 2L1 21h22L12 2zm0 3.99L19.53 19H4.47L12 5.99zM11 16h2v2h-2v-2zm0-6h2v4h-2v-4z"></path></svg>
                                        </div>
                                    </div>
                                    <div class="absolute -bottom-5 left-4 w-12 h-12 rounded-full border-4 border-white overflow-hidden bg-yellow-100 text-yellow-600 shadow-sm flex items-center justify-center">
                                        <svg viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor"><path d="M12 2L1 21h22L12 2zm0 3.99L19.53 19H4.47L12 5.99zM11 16h2v2h-2v-2zm0-6h2v4h-2v-4z"></path></svg>
                                    </div>
                                </div>
                                <div class="px-3 pb-3 text-left">
                                    <h4 class="font-sans text-[14px] font-bold text-ink leading-snug mb-1">DICT-ITU DTC</h4>
                                    <div class="font-mono text-[9px] uppercase tracking-widest text-gray-500 mb-1">Training & Seminars</div>
                                    <div class="font-mono text-[8px] uppercase tracking-widest text-[var(--color-brand-cyan)] text-blue-500 font-semibold flex items-center gap-1 mt-4">
                                        &lang; VIEW PDF &rang;
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

            </div>
        </div>

        <!-- Modal Overlay -->
        <div x-show="modalOpen" 
             style="display: none;"
             class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 backdrop-blur-none"
             x-transition:enter-end="opacity-100 backdrop-blur-sm"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 backdrop-blur-sm"
             x-transition:leave-end="opacity-0 backdrop-blur-none">
            
            <!-- Backdrop -->
            <div class="fixed inset-0 bg-gray-900/40 transition-opacity" @click="closeModal()"></div>

            <!-- Modal Content Container -->
            <div x-show="modalOpen"
                 class="relative bg-white rounded-xl shadow-2xl overflow-hidden flex flex-col w-full max-w-4xl max-h-[90vh] z-10 transform transition-all border border-gray-200/50"
                 @click.stop
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                 x-transition:leave-end="opacity-0 scale-95 translate-y-4">
                 
                <!-- Close Button -->
                <button @click="closeModal()" class="absolute top-4 right-4 z-20 p-2 bg-black/40 hover:bg-black/60 text-white rounded-full backdrop-blur-md transition-colors focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>

                <!-- Image Viewer -->
                <template x-if="modalType === 'image'">
                    <div class="w-full h-full flex items-center justify-center p-2 bg-gray-100">
                        <img :src="modalSrc" class="max-w-full max-h-[85vh] object-contain rounded-lg shadow-sm" alt="Certificate">
                    </div>
                </template>

                <!-- PDF Viewer -->
                <template x-if="modalType === 'pdf'">
                    <div class="w-full aspect-[1.414/1] max-h-[85vh] flex flex-col bg-white rounded-xl overflow-hidden">
                        <iframe :src="modalSrc + '#toolbar=0&navpanes=0&scrollbar=0&view=Fit'" class="w-full h-full border-0 bg-white" title="PDF Certificate"></iframe>
                    </div>
                </template>
            </div>
        </div>
    </div>
</x-layout>
