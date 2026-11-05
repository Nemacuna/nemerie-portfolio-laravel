<section id="contact" class="section contact">
    <div class="section-heading">
        <span class="section-kicker">Let's Talk</span>
        <h2 class="section-title">Contact</h2>
        <p class="section-subtitle">Have a project in mind or just want to say hello? Reach out through any channel below.</p>
    </div>

    <div class="contact-grid">
        <a href="mailto:{{ $profile['email'] }}" class="contact-card card">
            <div class="contact-icon">@include('partials.icon-mail')</div>
            <h3 class="contact-title">Email</h3>
            <p class="contact-value">{{ $profile['email'] }}</p>
        </a>
        <a href="tel:{{ $profile['phone'] }}" class="contact-card card">
            <div class="contact-icon"><i class="fas fa-phone" aria-hidden="true"></i></div>
            <h3 class="contact-title">Phone</h3>
            <p class="contact-value">{{ $profile['phone'] }}</p>
        </a>
        <a href="{{ $profile['github'] }}" target="_blank" rel="noopener" class="contact-card card">
            <div class="contact-icon">@include('partials.icon-github')</div>
            <h3 class="contact-title">GitHub</h3>
            <p class="contact-value">View my repositories</p>
        </a>
    </div>

    {{-- Resume Buttons + Inline PDF Viewer --}}
    <div x-data="{ resumeOpen: false }">

        <div class="resume-actions">
            <button type="button" @click="resumeOpen = true" class="resume-btn resume-btn--view">
                <i class="fas fa-eye" aria-hidden="true"></i>
                View Resume
            </button>
            <a href="{{ asset('resume/Acuna-Resume.pdf') }}" download="Acuna-Resume.pdf" class="resume-btn resume-btn--download">
                <i class="fas fa-download" aria-hidden="true"></i>
                Download Resume
            </a>
        </div>

        {{-- PDF Modal --}}
        <div
            x-show="resumeOpen"
            x-transition.duration.300ms
            x-on:keydown.escape.window="resumeOpen = false"
            x-on:click.self="resumeOpen = false"
            class="resume-modal-backdrop"
            role="dialog"
            aria-modal="true"
            aria-label="Resume preview"
        >
            <div class="resume-modal-box">
                {{-- Header --}}
                <div class="resume-modal-header">
                    <div class="resume-modal-title">
                        <i class="fas fa-file-pdf" aria-hidden="true"></i>
                        Acuna-Resume.pdf
                    </div>
                    <div class="resume-modal-actions">
                        <a href="{{ asset('resume/Acuna-Resume.pdf') }}" download="Acuna-Resume.pdf" class="resume-modal-dl-btn" title="Download">
                            <i class="fas fa-download" aria-hidden="true"></i>
                            <span>Download</span>
                        </a>
                        <button type="button" @click="resumeOpen = false" class="resume-modal-close" aria-label="Close resume preview">
                            <i class="fas fa-xmark" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

                {{-- PDF iframe --}}
                <iframe
                    src="{{ asset('resume/Acuna-Resume.pdf') }}#toolbar=0&navpanes=0&scrollbar=1"
                    class="resume-modal-iframe"
                    title="Resume preview"
                ></iframe>
            </div>
        </div>

    </div>
</section>
