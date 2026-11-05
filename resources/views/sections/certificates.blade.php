<section id="certificates" class="section certificates">
    <div class="section-heading">
        <span class="section-kicker">Credentials</span>
        <h2 class="section-title">Certificates</h2>
        <p class="section-subtitle">Professional certifications and courses I have completed. Click a certificate to view it.</p>
    </div>

    <div x-data="{ cert: null }">
        <div class="certificates-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            @foreach ($certificates as $cert)
                <div class="certificate-card group relative flex flex-col overflow-hidden rounded-2xl border border-white/5 bg-white dark:bg-[#1e2030] text-slate-800 dark:text-white shadow-xl transition-all duration-300 hover:-translate-y-2 hover:border-cyan-400/50 hover:shadow-[0_0_35px_rgba(0,255,255,0.25)]"
                     @click="cert = {{ json_encode($cert) }}">
                    <div class="relative h-52 w-full overflow-hidden rounded-t-2xl">
                        <img src="{{ $cert['image'] }}" alt="{{ $cert['title'] }}" class="certificate-image h-full w-full object-contain" onerror="this.src='{{ asset('images/cert/placeholder.png') }}';">
                        <button type="button" @click.stop="cert = {{ json_encode($cert) }}" class="absolute inset-0 flex items-center justify-center bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity" aria-label="View Full Screen">
                            <span class="flex items-center gap-2 rounded-full bg-cyan-500/90 px-5 py-2 text-sm font-semibold text-black backdrop-blur-sm">
                                <i class="fas fa-expand text-base" aria-hidden="true"></i>
                                Full Screen
                            </span>
                        </button>
                    </div>

                    <div class="flex flex-1 flex-col p-6">
                        <div class="flex items-center justify-between gap-3 mb-4">
                            <div class="certificate-icon">
                                <i class="fas fa-award" aria-hidden="true"></i>
                            </div>
                            <span class="text-slate-400 text-sm">{{ $cert['year'] }}</span>
                        </div>

                        <h3 class="certificate-title text-xl font-bold text-white mb-1">{{ $cert['title'] }}</h3>
                        <p class="certificate-issuer text-cyan-300 text-sm mb-3">{{ $cert['issuer'] }}</p>
                        @if ($cert['description'])
                            <p class="certificate-detail text-slate-300 text-sm mb-6">{{ $cert['description'] }}</p>
                        @endif

                        <button type="button" @click.stop="cert = {{ json_encode($cert) }}" class="certificate-view-btn mt-auto inline-flex w-full items-center justify-center gap-2 rounded-lg border border-cyan-500/50 bg-cyan-500/10 px-4 py-2 text-sm font-medium text-cyan-300 transition-colors hover:bg-cyan-500/20 hover:text-white">
                            <i class="fas fa-expand text-sm" aria-hidden="true"></i>
                            View Full Screen
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <div x-show="!!cert" x-transition.duration.300ms x-on:click.self="cert = null" x-on:keydown.escape.window="cert = null" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-md" role="dialog" aria-modal="true" aria-labelledby="certModalTitle">
            <div class="certificate-modal w-full max-w-3xl rounded-2xl border border-cyan-500/30 bg-[#0d1226]/95 shadow-[0_0_60px_rgba(0,255,255,0.15)] p-6">
                <div class="flex items-start justify-between gap-4 mb-6">
                    <div>
                        <h3 id="certModalTitle" class="text-2xl font-bold text-white" x-text="cert ? cert.title : ''"></h3>
                        <p class="text-cyan-300 text-sm font-medium mt-1" x-text="cert ? cert.issuer : ''"></p>
                        <span class="inline-block mt-2 text-xs font-semibold px-3 py-1 rounded-full bg-cyan-500/10 text-cyan-300" x-text="cert ? cert.year : ''"></span>
                    </div>
                    <button type="button" @click="cert = null" class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-cyan-500/30 text-cyan-300 transition-all duration-300 hover:bg-cyan-500/10 hover:shadow-[0_0_20px_rgba(0,255,255,0.35)]" aria-label="Close certificate modal">
                        <i class="fas fa-xmark" aria-hidden="true"></i>
                    </button>
                </div>

                <div class="relative flex items-center justify-center rounded-xl bg-black/50 p-6 overflow-hidden">
                    <img :src="cert ? cert.image : ''" :alt="cert ? cert.title : ''" class="max-h-[60vh] w-auto object-contain">
                    <div class="absolute bottom-4 right-4">
                        <a :href="cert ? cert.link : '#'" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full border border-cyan-500/40 bg-cyan-500/10 px-4 py-2 text-sm font-semibold text-cyan-300 transition-all duration-300 hover:bg-cyan-500/20 hover:shadow-[0_0_20px_rgba(0,255,255,0.25)]">
                            <i class="fas fa-external-link-alt text-sm" aria-hidden="true"></i>
                            Open Original Image
                        </a>
                    </div>
                </div>

                <p class="mt-4 text-sm text-slate-300" x-text="cert ? cert.description : ''"></p>

                <div class="mt-6 flex items-center justify-between">
                    <p class="font-mono text-xs text-slate-400">Press ESC to close</p>
                </div>
            </div>
        </div>
    </div>
</section>
