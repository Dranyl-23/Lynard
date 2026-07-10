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
                        @foreach(config('portfolio.certifications.awards') as $award)
                        <a href="{{ $award['file'] }}" @click.prevent="openModal('{{ $award['modal_type'] }}', '{{ $award['file'] }}')" target="_blank" class="group relative {{ $award['z_index'] }} hover:z-50! my-2 sm:-mx-3 mx-2 transition-all duration-300 ease-out hover:scale-[1.05] hover:-translate-y-3 block">
                            <div class="bg-white border border-gray-200/60 rounded-3xl p-3 w-68 flex flex-col {{ $award['rotation'] }} group-hover:rotate-0 transition-all duration-300 shadow-[0_4px_20px_rgb(0,0,0,0.04)] hover:shadow-xl">
                                <div class="relative w-full mb-8">
                                    <div class="w-full h-32 rounded-xl overflow-hidden bg-gray-100 relative border border-gray-100/50">
                                        <img src="{{ $award['image'] }}" alt="{{ $award['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                    @if(count($award['logos']) === 1)
                                    <div class="absolute -bottom-5 left-4 w-12 h-12 rounded-full border-4 border-white overflow-hidden {{ $award['logos'][0]['classes'] }} shadow-sm flex items-center justify-center">
                                        <img src="{{ $award['logos'][0]['src'] }}" alt="Logo" class="w-full h-full object-contain">
                                    </div>
                                    @else
                                    <div class="absolute -bottom-5 left-4 flex items-center">
                                        @foreach($award['logos'] as $logo)
                                        <div class="w-12 h-12 rounded-full border-4 border-white overflow-hidden {{ $logo['classes'] }} shadow-sm flex items-center justify-center relative">
                                            <img src="{{ $logo['src'] }}" alt="Logo" class="w-full h-full object-contain">
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                                <div class="px-3 pb-3 text-left">
                                    <h4 class="font-sans text-[14px] font-bold text-ink leading-snug mb-1">{{ $award['title'] }}</h4>
                                    <div class="font-mono text-[9px] uppercase tracking-widest text-gray-500 mb-1">{{ $award['subtitle'] }}</div>
                                    <div class="font-mono text-[8px] uppercase tracking-widest text-(--color-brand-cyan) text-blue-500 font-semibold flex items-center gap-1 mt-4">
                                        {!! $award['action_text'] !!}
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Category: NETWORKING & SECURITY -->
                <div>
                    <h3 class="font-mono text-[0.65rem] text-gray-400 uppercase tracking-widest mb-12 text-center sm:text-left">NETWORKING & SECURITY</h3>
                    
                    <div class="flex flex-wrap justify-center sm:justify-start gap-y-8 sm:-mx-2">
                        @foreach(config('portfolio.certifications.networking') as $cert)
                        <a href="{{ $cert['file'] }}" @click.prevent="openModal('{{ $cert['modal_type'] }}', '{{ $cert['file'] }}')" target="_blank" class="group relative {{ $cert['z_index'] }} hover:z-50! my-2 sm:-mx-3 mx-2 transition-all duration-300 ease-out hover:scale-[1.05] hover:-translate-y-3 block">
                            <div class="bg-white border border-gray-200/60 rounded-3xl p-3 w-68 flex flex-col {{ $cert['rotation'] }} group-hover:rotate-0 transition-all duration-300 shadow-[0_4px_20px_rgb(0,0,0,0.04)] hover:shadow-xl">
                                <div class="relative w-full mb-8">
                                    <div class="w-full h-32 rounded-xl overflow-hidden bg-linear-to-br {{ $cert['gradient'] }} relative border border-gray-100/50">
                                        <div class="absolute inset-0 flex items-center justify-center opacity-20">
                                            <svg viewBox="0 0 24 24" class="w-16 h-16 {{ $cert['icon_color'] }}" fill="currentColor">{!! $cert['svg'] !!}</svg>
                                        </div>
                                    </div>
                                    <div class="absolute -bottom-5 left-4 w-12 h-12 rounded-full border-4 border-white overflow-hidden {{ $cert['badge_color'] }} shadow-sm flex items-center justify-center">
                                        <svg viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor">{!! $cert['svg'] !!}</svg>
                                    </div>
                                </div>
                                <div class="px-3 pb-3 text-left">
                                    <h4 class="font-sans text-[14px] font-bold text-ink leading-snug mb-1">{{ $cert['title'] }}</h4>
                                    <div class="font-mono text-[9px] uppercase tracking-widest text-gray-500 mb-1">{{ $cert['subtitle'] }}</div>
                                    <div class="font-mono text-[8px] uppercase tracking-widest text-(--color-brand-cyan) text-blue-500 font-semibold flex items-center gap-1 mt-4">
                                        {!! $cert['action_text'] !!}
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal Overlay -->
        <div x-show="modalOpen" 
             style="display: none;"
             class="fixed inset-0 z-100 flex items-center justify-center p-4 sm:p-6"
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
