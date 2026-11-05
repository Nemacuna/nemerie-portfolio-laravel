<section id="education" class="section education">
    <div class="section-heading">
        <span class="section-kicker">Background</span>
        <h2 class="section-title">Education</h2>
    </div>

    <div class="timeline">
        @foreach ($education as $edu)
            <div class="timeline-item">
                <div class="timeline-marker"></div>
                <div class="timeline-card card">
                    <span class="timeline-years">{{ $edu['years'] }}</span>
                    <h3 class="timeline-degree">{{ $edu['degree'] }}</h3>
                    <p class="timeline-school">{{ $edu['school'] }} — {{ $edu['location'] }}</p>
                    <p class="timeline-detail">{{ $edu['detail'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
