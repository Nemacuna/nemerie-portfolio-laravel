<section id="about" class="section about">
    <style>
        #about {
            position: relative;
        }

        #about .about-grid {
            position: relative;
            z-index: 1;
        }

        #about .portrait-frame {
            border: 3px solid transparent;
            background: linear-gradient(45deg, #00ffff 0%, #22d3ee 50%, #0ea5e9 100%);
            background-origin: border-box;
            box-shadow: 0 0 24px rgba(0, 255, 255, 0.75), 0 0 90px rgba(34, 211, 238, 0.45);
            animation: neonFramePulse 2.4s ease-in-out infinite;
        }

        #about .portrait-frame img {
            display: block;
            border-radius: 50%;
        }

        #about .section-title,
        #about .about-name {
            color: var(--text-main);
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.65), 0 0 30px rgba(34, 211, 238, 0.45);
        }

        html[data-theme="light"] #about .section-title,
        html[data-theme="light"] #about .about-name {
            color: #0f172a;
            text-shadow: none;
        }

        #about .contact-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.85rem 1.4rem;
            border-radius: 9999px;
            border: 1px solid rgba(0, 255, 255, 0.45);
            color: #dffcff;
            background: rgba(0, 255, 255, 0.06);
            box-shadow: 0 0 18px rgba(0, 255, 255, 0.18), inset 0 0 14px rgba(0, 255, 255, 0.08);
            transition: all 0.35s ease;
        }

        #about .contact-btn:hover {
            color: #ffffff;
            border-color: rgba(0, 255, 255, 0.85);
            box-shadow: 0 0 26px rgba(0, 255, 255, 0.55), inset 0 0 18px rgba(0, 255, 255, 0.12);
            transform: translateY(-2px);
        }

        @keyframes neonFramePulse {
            0%, 100% {
                box-shadow: 0 0 24px rgba(0, 255, 255, 0.75), 0 0 90px rgba(34, 211, 238, 0.45);
            }
            50% {
                box-shadow: 0 0 34px rgba(0, 255, 255, 0.95), 0 0 120px rgba(34, 211, 238, 0.65);
            }
        }
    </style>

    <div class="section-heading">
        <span class="section-kicker">About Me</span>
        <h2 class="section-title" id="about-title">Who I Am</h2>
    </div>

    <div class="about-grid">
        <div class="about-portrait">
            <div class="portrait-frame portrait-frame-large">
                <img src="{{ $profile['avatar'] }}" alt="Portrait of {{ $profile['name'] }}">
            </div>
        </div>
        <div class="about-content">
            <h3 class="about-name">{{ $profile['name'] }}</h3>
            <p class="about-role">{{ $profile['role'] }}</p>
            <p class="about-bio">
                Hello! I am {{ $profile['name'] }}, an Information Technology student. I turn curiosity into hands-on project experience and keep sharpening my technical skills, while embracing challenges that push me toward real-world software and web development.
            </p>

            <ul class="about-details">
                <li>
                    <span class="detail-label">Email:</span>
                    <a href="mailto:{{ $profile['email'] }}" class="contact-btn">{{ $profile['email'] }}</a>
                </li>
                <li>
                    <span class="detail-label">Phone:</span>
                    <a href="tel:{{ $profile['phone'] }}" class="contact-btn">{{ $profile['phone'] }}</a>
                </li>
                <li>
                    <span class="detail-label">Location:</span>
                    {{ $profile['location'] }}
                </li>
            </ul>
        </div>
    </div>
</section>
