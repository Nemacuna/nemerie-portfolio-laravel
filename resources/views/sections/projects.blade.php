<section id="projects" class="section projects">
    <div class="section-heading">
        <span class="section-kicker">My Work</span>
        <h2 class="section-title">Projects</h2>
        <p class="section-subtitle">A selection of things I have built.</p>
    </div>

    <div x-data="{ project: null, imgIndex: 0 }">
        <div class="projects-grid">
            @foreach ($projects as $project)
                <article class="project-card card" @click="project = {{ json_encode($project) }}; imgIndex = 0">
                    <a href="{{ $project['link'] }}" @click.prevent="project = {{ json_encode($project) }}; imgIndex = 0" class="project-image-link">
                        <img src="{{ $project['thumbnail'] }}" alt="{{ $project['title'] }}" class="project-image">
                    </a>
                    <div class="project-body">
                        <h3 class="project-title">{{ $project['title'] }}</h3>
                        <p class="project-desc project-description">{{ $project['description'] }}</p>
                        <div class="project-tech">
                            @foreach ($project['tech'] as $tech)
                                <span class="tech-tag">{{ $tech }}</span>
                            @endforeach
                        </div>
                        <button type="button" @click.stop="project = {{ json_encode($project) }}; imgIndex = 0" class="certificate-view-btn mt-4 inline-flex w-full items-center justify-center gap-2 rounded-lg border border-cyan-500/50 bg-cyan-500/10 px-4 py-2 text-sm font-medium text-cyan-300 transition-colors hover:bg-cyan-500/20 hover:text-white">
                            <i class="fas fa-folder-open text-sm" aria-hidden="true"></i>
                            View Project
                        </button>
                    </div>
                </article>
            @endforeach
        </div>

        <div x-show="!!project" x-transition.duration.300ms x-on:click.self="project = null" x-on:keydown.escape.window="project = null" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-md" role="dialog" aria-modal="true" aria-labelledby="projectModalTitle">
            <div class="certificate-modal w-full max-w-3xl rounded-2xl border border-cyan-500/30 bg-[#0d1226]/95 shadow-[0_0_60px_rgba(0,255,255,0.15)] p-6">
                <div class="flex items-start justify-between gap-4 mb-6">
                    <div>
                        <h3 id="projectModalTitle" class="text-2xl font-bold text-white" x-text="project ? project.title : ''"></h3>
                        <p class="text-cyan-300 text-sm font-medium mt-1" x-text="project ? project.description : ''"></p>
                    </div>
                    <button type="button" @click="project = null" class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-cyan-500/30 text-cyan-300 transition-all duration-300 hover:bg-cyan-500/10 hover:shadow-[0_0_20px_rgba(0,255,255,0.35)]" aria-label="Close project modal">
                        <i class="fas fa-xmark" aria-hidden="true"></i>
                    </button>
                </div>

                {{-- Image Gallery --}}
                <div class="proj-gallery-wrap relative flex items-center justify-center rounded-xl bg-black/50 overflow-hidden" style="min-height: 240px;">
                    {{-- Main image --}}
                    <img
                        :src="project && project.images ? project.images[imgIndex] : ''"
                        :alt="project ? project.title : ''"
                        class="proj-gallery-img max-h-[60vh] w-auto object-contain"
                    >

                    {{-- Prev button (only shown when more than 1 image) --}}
                    <button
                        type="button"
                        x-show="project && project.images && project.images.length > 1"
                        @click.stop="imgIndex = (imgIndex - 1 + project.images.length) % project.images.length"
                        class="proj-gallery-btn proj-gallery-btn--prev"
                        aria-label="Previous image"
                    >
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    {{-- Next button --}}
                    <button
                        type="button"
                        x-show="project && project.images && project.images.length > 1"
                        @click.stop="imgIndex = (imgIndex + 1) % project.images.length"
                        class="proj-gallery-btn proj-gallery-btn--next"
                        aria-label="Next image"
                    >
                        <i class="fas fa-chevron-right"></i>
                    </button>

                    {{-- Dot indicators --}}
                    <div
                        class="proj-gallery-dots"
                        x-show="project && project.images && project.images.length > 1"
                    >
                        <template x-for="(img, i) in (project ? project.images : [])" :key="i">
                            <button
                                type="button"
                                @click.stop="imgIndex = i"
                                :class="i === imgIndex ? 'proj-gallery-dot proj-gallery-dot--active' : 'proj-gallery-dot'"
                                :aria-label="'Go to image ' + (i + 1)"
                            ></button>
                        </template>
                    </div>

                    {{-- Image counter --}}
                    <span
                        class="proj-gallery-counter"
                        x-show="project && project.images && project.images.length > 1"
                        x-text="project ? (imgIndex + 1) + ' / ' + project.images.length : ''"
                    ></span>
                </div>

                <div class="project-tech mt-4" x-show="project">
                    <template x-for="t in (project ? project.tech : [])" :key="t">
                        <span class="tech-tag" x-text="t"></span>
                    </template>
                </div>

                <div class="mt-6 flex flex-wrap items-center justify-end gap-3">
                    <a :href="project ? project.github : '#'" target="_blank" rel="noopener" class="project-modal-btn">
                        <i class="fab fa-github" aria-hidden="true"></i>
                        View GitHub Repo
                    </a>
                    <a :href="project ? project.link : '#'" target="_blank" rel="noopener" class="project-modal-btn">
                        <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                        Open Live Demo
                    </a>
                </div>

                <div class="mt-6 flex items-center justify-between">
                    <p class="font-mono text-xs text-slate-400">Press ESC to close</p>
                </div>
            </div>
        </div>
    </div>
</section>
