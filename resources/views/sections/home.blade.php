{{-- ============================================================
     HERO — Premium dark-mode redesign
     Scoped CSS is used so the section renders correctly with or
     without a Tailwind build. The markup keeps semantic classes,
     so it can be converted to Tailwind utilities later if needed.
     ============================================================ --}}
<style>
    /* ---------- Design tokens (scoped to the hero only) ---------- */
    .hero-v2 {
        --hero-bg: #0a0a0a;
        --hero-text: #f8f7ff;
        --hero-muted: #9ca3af;
        --hero-purple: #a855f7;
        --hero-blue: #3b82f6;
        --hero-cyan: #22d3ee;
        --hero-ring: rgba(168, 85, 247, 0.42);

        position: relative;
        isolation: isolate;
        display: flex;
        align-items: center;
        overflow: hidden;

        /* Full-bleed background inside the layout's centered container */
        margin-inline: calc(50% - 50vw);
        min-height: calc(100vh - 70px);
        padding: clamp(3.5rem, 7vw, 6rem)
                 max(5vw, calc((100vw - 1140px) / 2))
                 clamp(5rem, 8vw, 7rem);

        background: linear-gradient(135deg, #000000 0%, #0a0f2c 45%, #003B46 100%);
        color: var(--hero-text);
        font-family: "Inter", system-ui, -apple-system, sans-serif;
    }

    /* ---------- Atmospheric background layers ---------- */
    .hero-v2__mesh {
        position: absolute;
        inset: -15%;
        z-index: -2;
        pointer-events: none;
        background:
            radial-gradient(ellipse 55% 55% at 76% 42%, rgba(168, 85, 247, 0.22), transparent 70%),
            radial-gradient(ellipse 50% 50% at 90% 62%, rgba(59, 130, 246, 0.18), transparent 72%),
            radial-gradient(ellipse 45% 45% at 32% 78%, rgba(34, 211, 238, 0.07), transparent 75%);
        filter: blur(34px);
        animation: heroMeshDrift 14s ease-in-out infinite alternate;
    }

    .hero-v2__grid {
        position: absolute;
        inset: 0;
        z-index: -1;
        pointer-events: none;
        background-image:
            linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
        background-size: 52px 52px;
        -webkit-mask-image: radial-gradient(ellipse 72% 65% at 55% 45%, #000 20%, transparent 82%);
        mask-image: radial-gradient(ellipse 72% 65% at 55% 45%, #000 20%, transparent 82%);
    }

    /* Soft spotlight behind the portrait */
    .hero-v2__aura {
        position: absolute;
        top: 50%;
        right: 6%;
        z-index: -1;
        width: min(46vw, 560px);
        aspect-ratio: 1;
        transform: translateY(-50%);
        border-radius: 50%;
        pointer-events: none;
        background: radial-gradient(circle, rgba(168, 85, 247, 0.30) 0%, rgba(59, 130, 246, 0.12) 42%, transparent 70%);
        filter: blur(52px);
        animation: heroAuraPulse 6s ease-in-out infinite;
    }

    /* ---------- Layout ---------- */
    .hero-v2__inner {
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: minmax(0, 1.08fr) minmax(0, 0.92fr);
        align-items: center;
        gap: clamp(3rem, 7vw, 7rem);
        width: 100%;
        max-width: 1140px;
        margin-inline: auto;
    }

    .hero-v2__copy {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 660px;
    }

    /* Prevent long words / inline-blocks from expanding the grid track */
    .hero-v2__inner > * {
        min-width: 0;
    }

    /* ---------- Text ---------- */
    .hero-v2__eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.55rem;
        margin-bottom: 1.35rem;
        padding: 0.45rem 0.8rem;
        border: 1px solid rgba(168, 85, 247, 0.22);
        border-radius: 999px;
        background: rgba(168, 85, 247, 0.08);
        color: #d8b4fe;
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 0.16em;
        line-height: 1;
        text-transform: uppercase;
    }

    .hero-v2__eyebrow-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--hero-purple);
        box-shadow: 0 0 12px rgba(168, 85, 247, 0.95);
        animation: heroPulse 2s ease-in-out infinite;
    }

    .hero-v2__title {
        max-width: 100%;
        margin: 0;
        font-family: "Space Grotesk", "Inter", sans-serif;
        font-size: clamp(2.7rem, 5.4vw, 4.7rem);
        font-weight: 700;
        line-height: 1.02;
        letter-spacing: -0.045em;
        text-wrap: balance;
    }

    .hero-v2__hello {
        display: block;
        margin-bottom: 0.4rem;
        color: var(--hero-muted);
        font-family: "Inter", sans-serif;
        font-size: clamp(1rem, 1.5vw, 1.2rem);
        font-weight: 500;
        letter-spacing: 0;
        line-height: 1.4;
    }

    .hero-v2__name {
        display: inline-block;
        max-width: 100%;
        padding-bottom: 0.08em;
        overflow-wrap: break-word;
        background: linear-gradient(105deg, #c084fc 0%, #a855f7 34%, #6366f1 68%, #3b82f6 100%);
        background-size: 180% auto;
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        -webkit-text-fill-color: transparent;
        animation: heroGradientShift 9s ease-in-out infinite;
    }

    .hero-v2__role {
        display: flex;
        align-items: center;
        gap: 0.55rem;
        margin: 1rem 0 0;
        color: #c4b5fd;
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
        font-size: clamp(0.86rem, 1.15vw, 1rem);
        font-weight: 500;
        letter-spacing: 0.02em;
        line-height: 1.5;
    }

    .hero-v2__prompt {
        color: var(--hero-purple);
        font-weight: 700;
    }

    .hero-v2__cursor {
        display: inline-block;
        min-width: 0.62ch;
        color: var(--hero-purple);
        animation: heroBlink 1.05s steps(1, end) infinite;
    }

    .hero-v2__tagline {
        max-width: 35rem;
        margin: 1.2rem 0 0;
        color: #a1a1aa;
        font-size: clamp(0.98rem, 1.2vw, 1.075rem);
        line-height: 1.8;
    }

    /* ---------- Call-to-action buttons ---------- */
    .hero-v2__actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.9rem;
        margin-top: 2.25rem;
    }

    .hero-v2__btn {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.65rem;
        padding: 0.92rem 1.4rem;
        border: 1px solid transparent;
        border-radius: 12px;
        font-family: "Inter", sans-serif;
        font-size: 0.92rem;
        font-weight: 600;
        letter-spacing: 0.01em;
        line-height: 1;
        text-decoration: none;
        cursor: pointer;
        transition:
            transform 0.28s cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow 0.28s ease,
            background-color 0.28s ease,
            border-color 0.28s ease,
            color 0.28s ease;
    }

    .hero-v2__btn i {
        transition: transform 0.28s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .hero-v2__btn--primary {
        overflow: hidden;
        color: #fff;
        background: linear-gradient(135deg, #a855f7 0%, #6366f1 52%, #3b82f6 100%);
        border-color: rgba(255, 255, 255, 0.16);
        box-shadow:
            0 12px 30px -8px rgba(168, 85, 247, 0.68),
            inset 0 1px 0 rgba(255, 255, 255, 0.22);
    }

    /* Sheen that sweeps across the primary button on hover */
    .hero-v2__btn--primary::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(110deg, transparent 25%, rgba(255, 255, 255, 0.28) 48%, transparent 70%);
        transform: translateX(-130%);
        transition: transform 0.6s ease;
        pointer-events: none;
    }

    .hero-v2__btn--primary:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow:
            0 20px 46px -10px rgba(168, 85, 247, 0.9),
            0 0 24px rgba(99, 102, 241, 0.38),
            inset 0 1px 0 rgba(255, 255, 255, 0.28);
    }

    .hero-v2__btn--primary:hover::after {
        transform: translateX(130%);
    }

    .hero-v2__btn--primary:hover .hero-v2__btn-icon {
        transform: translateX(3px);
    }

    .hero-v2__btn--ghost {
        color: #e9d5ff;
        background: rgba(255, 255, 255, 0.02);
        border-color: var(--hero-ring);
    }

    .hero-v2__btn--ghost:hover {
        color: #fff;
        background: rgba(168, 85, 247, 0.12);
        border-color: rgba(168, 85, 247, 0.9);
        transform: translateY(-2px);
        box-shadow:
            0 0 24px rgba(168, 85, 247, 0.24),
            inset 0 0 20px rgba(168, 85, 247, 0.08);
    }

    .hero-v2__btn--ghost:hover .hero-v2__btn-icon {
        transform: translate(3px, -3px);
    }

    .hero-v2__btn:focus-visible,
    .hero-v2__scroll:focus-visible {
        outline: 2px solid var(--hero-purple);
        outline-offset: 4px;
    }

    /* ---------- Portrait ---------- */
    .hero-v2__visual {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 360px;
    }

    .hero-v2__avatar-float {
        position: relative;
        width: clamp(265px, 29vw, 370px);
        aspect-ratio: 1;
        animation: heroFloat 7s ease-in-out infinite;
    }

    .hero-v2__avatar-glow {
        position: absolute;
        inset: 8%;
        z-index: -1;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(168, 85, 247, 0.5) 0%, rgba(59, 130, 246, 0.2) 45%, transparent 70%);
        filter: blur(38px);
        opacity: 0.8;
        animation: heroGlowPulse 5s ease-in-out infinite;
        transition: opacity 0.45s ease, transform 0.45s ease;
    }

    /* Thin orbit ring + tiny satellite dots */
    .hero-v2__orbit {
        position: absolute;
        inset: -9%;
        border: 1px dashed rgba(168, 85, 247, 0.22);
        border-radius: 50%;
        pointer-events: none;
        animation: heroOrbit 28s linear infinite;
    }

    .hero-v2__orbit::before,
    .hero-v2__orbit::after {
        content: "";
        position: absolute;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--hero-purple);
        box-shadow: 0 0 14px rgba(168, 85, 247, 0.9);
    }

    .hero-v2__orbit::before {
        top: 7%;
        right: 20%;
    }

    .hero-v2__orbit::after {
        bottom: 12%;
        left: 13%;
        width: 4px;
        height: 4px;
        background: var(--hero-blue);
        box-shadow: 0 0 14px rgba(59, 130, 246, 0.9);
    }

    .hero-v2__avatar-frame {
        position: relative;
        display: grid;
        width: 100%;
        height: 100%;
        padding: 5px;
        border-radius: 50%;
        box-shadow:
            0 0 46px rgba(168, 85, 247, 0.28),
            0 0 96px rgba(59, 130, 246, 0.14);
        transition:
            transform 0.45s cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow 0.45s ease;
    }

    /* Rotating conic gradient = animated glowing border */
    .hero-v2__avatar-frame::before {
        content: "";
        position: absolute;
        inset: 0;
        z-index: 0;
        border-radius: inherit;
        background: conic-gradient(from 0deg, #a855f7, #3b82f6, #22d3ee, #a855f7);
        animation: heroBorderSpin 8s linear infinite;
    }

    /* Subtle inner highlight */
    .hero-v2__avatar-frame::after {
        content: "";
        position: absolute;
        inset: 5px;
        z-index: 2;
        border-radius: 50%;
        box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.18);
        pointer-events: none;
    }

    .hero-v2__avatar-inner {
        position: relative;
        z-index: 1;
        overflow: hidden;
        border-radius: 50%;
        background: #111114;
    }

    .hero-v2__avatar-inner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: scale(1.01);
        transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    }

    /* Hover: lift the portrait and turn the neon up */
    .hero-v2__visual:hover .hero-v2__avatar-frame {
        transform: scale(1.05);
        box-shadow:
            0 0 70px rgba(168, 85, 247, 0.55),
            0 0 140px rgba(59, 130, 246, 0.26);
    }

    .hero-v2__visual:hover .hero-v2__avatar-inner img {
        transform: scale(1.06);
    }

    .hero-v2__visual:hover .hero-v2__avatar-glow {
        opacity: 1;
        transform: scale(1.12);
    }

    /* ---------- Scroll cue ---------- */
    .hero-v2__scroll {
        position: absolute;
        bottom: 1.3rem;
        left: 50%;
        z-index: 3;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.45rem;
        color: #71717a;
        font-size: 0.6rem;
        font-weight: 600;
        letter-spacing: 0.22em;
        line-height: 1;
        text-decoration: none;
        text-transform: uppercase;
        transform: translateX(-50%);
        animation: heroBounce 2.2s ease-in-out infinite;
        transition: color 0.25s ease;
    }

    .hero-v2__scroll:hover {
        color: var(--hero-purple);
    }

    .hero-v2__scroll-ring {
        display: grid;
        width: 28px;
        height: 28px;
        place-items: center;
        border: 1px solid rgba(255, 255, 255, 0.14);
        border-radius: 50%;
        font-size: 0.62rem;
        transition: border-color 0.25s ease, box-shadow 0.25s ease;
    }

    .hero-v2__scroll:hover .hero-v2__scroll-ring {
        border-color: rgba(168, 85, 247, 0.55);
        box-shadow: 0 0 18px rgba(168, 85, 247, 0.3);
    }

    /* ---------- Entrance animation ---------- */
    .hero-v2__anim {
        opacity: 0;
        transform: translateY(20px);
        animation: heroFadeUp 0.9s cubic-bezier(0.16, 1, 0.3, 1) var(--delay, 0s) forwards;
    }

    /* ---------- Light-mode counterpart ----------
       The dark composition is the default. When the portfolio theme is
       switched to light, the same layout becomes a clean white canvas
       while keeping the purple/blue accent atmosphere. */
    html[data-theme="light"] .hero-v2 {
        --hero-bg: #ffffff;
        --hero-text: #18181b;
        --hero-muted: #71717a;
        --hero-purple: #7c3aed;
        --hero-blue: #2563eb;
        --hero-cyan: #0891b2;
        --hero-ring: rgba(124, 58, 237, 0.30);
        background: var(--hero-bg);
        color: var(--hero-text);
    }

    html[data-theme="light"] .hero-v2__mesh {
        background:
            radial-gradient(ellipse 55% 55% at 76% 42%, rgba(168, 85, 247, 0.16), transparent 70%),
            radial-gradient(ellipse 50% 50% at 90% 62%, rgba(59, 130, 246, 0.12), transparent 72%),
            radial-gradient(ellipse 45% 45% at 32% 78%, rgba(34, 211, 238, 0.06), transparent 75%);
    }

    html[data-theme="light"] .hero-v2__grid {
        background-image:
            linear-gradient(rgba(15, 23, 42, 0.045) 1px, transparent 1px),
            linear-gradient(90deg, rgba(15, 23, 42, 0.045) 1px, transparent 1px);
    }

    html[data-theme="light"] .hero-v2__aura {
        background: radial-gradient(circle, rgba(168, 85, 247, 0.20) 0%, rgba(59, 130, 246, 0.10) 42%, transparent 70%);
    }

    html[data-theme="light"] .hero-v2__eyebrow {
        border-color: rgba(124, 58, 237, 0.20);
        background: rgba(124, 58, 237, 0.06);
        color: #6d28d9;
    }

    html[data-theme="light"] .hero-v2__name {
        background-image: linear-gradient(105deg, #7c3aed 0%, #8b5cf6 32%, #4f46e5 68%, #2563eb 100%);
    }

    html[data-theme="light"] .hero-v2__role {
        color: #6d28d9;
    }

    html[data-theme="light"] .hero-v2__tagline {
        color: #52525b;
    }

    html[data-theme="light"] .hero-v2__btn--primary {
        box-shadow:
            0 12px 28px -10px rgba(124, 58, 237, 0.45),
            inset 0 1px 0 rgba(255, 255, 255, 0.22);
    }

    html[data-theme="light"] .hero-v2__btn--primary:hover {
        box-shadow:
            0 20px 42px -12px rgba(124, 58, 237, 0.60),
            0 0 24px rgba(99, 102, 241, 0.22),
            inset 0 1px 0 rgba(255, 255, 255, 0.28);
    }

    html[data-theme="light"] .hero-v2__btn--ghost {
        color: #5b21b6;
        background: rgba(124, 58, 237, 0.03);
        border-color: rgba(124, 58, 237, 0.38);
    }

    html[data-theme="light"] .hero-v2__btn--ghost:hover {
        color: #3b0764;
        background: rgba(124, 58, 237, 0.09);
        border-color: rgba(124, 58, 237, 0.72);
        box-shadow:
            0 0 24px rgba(124, 58, 237, 0.18),
            inset 0 0 20px rgba(124, 58, 237, 0.05);
    }

    html[data-theme="light"] .hero-v2__avatar-frame {
        box-shadow:
            0 0 46px rgba(168, 85, 247, 0.20),
            0 0 96px rgba(59, 130, 246, 0.10);
    }

    html[data-theme="light"] .hero-v2__visual:hover .hero-v2__avatar-frame {
        box-shadow:
            0 0 65px rgba(168, 85, 247, 0.38),
            0 0 130px rgba(59, 130, 246, 0.18);
    }

    html[data-theme="light"] .hero-v2__avatar-glow {
        opacity: 0.55;
    }

    html[data-theme="light"] .hero-v2__visual:hover .hero-v2__avatar-glow {
        opacity: 0.85;
    }

    html[data-theme="light"] .hero-v2__avatar-inner {
        background: #f4f4f5;
    }

    html[data-theme="light"] .hero-v2__orbit {
        border-color: rgba(124, 58, 237, 0.20);
    }

    html[data-theme="light"] .hero-v2__scroll-ring {
        border-color: rgba(15, 23, 42, 0.14);
    }

    /* ---------- Keyframes ---------- */
    @keyframes heroFadeUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes heroGradientShift {
        0%, 100% { background-position: 0% center; }
        50% { background-position: 100% center; }
    }

    @keyframes heroBlink {
        0%, 45% { opacity: 1; }
        46%, 100% { opacity: 0; }
    }

    @keyframes heroBorderSpin {
        to { transform: rotate(360deg); }
    }

    @keyframes heroOrbit {
        to { transform: rotate(360deg); }
    }

    @keyframes heroFloat {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    @keyframes heroGlowPulse {
        0%, 100% { opacity: 0.65; transform: scale(0.98); }
        50% { opacity: 0.95; transform: scale(1.06); }
    }

    @keyframes heroAuraPulse {
        0%, 100% { opacity: 0.75; transform: translateY(-50%) scale(1); }
        50% { opacity: 1; transform: translateY(-50%) scale(1.08); }
    }

    @keyframes heroMeshDrift {
        from { transform: translate3d(-1.5%, 1%, 0) scale(1); }
        to { transform: translate3d(1.5%, -1%, 0) scale(1.04); }
    }

    @keyframes heroPulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.55; transform: scale(0.78); }
    }

    @keyframes heroBounce {
        0%, 100% { transform: translate(-50%, 0); }
        50% { transform: translate(-50%, 7px); }
    }

    /* ---------- Responsive ---------- */
    @media (max-width: 900px) {
        .hero-v2 {
            min-height: auto;
            padding-top: 4rem;
            padding-bottom: 6.5rem;
        }

        .hero-v2__inner {
            grid-template-columns: 1fr;
            gap: 3.25rem;
            text-align: center;
        }

        .hero-v2__visual {
            order: -1;
            min-height: 310px;
        }

        .hero-v2__copy {
            margin-inline: auto;
        }

        .hero-v2__role,
        .hero-v2__actions {
            justify-content: center;
        }

        .hero-v2__tagline {
            margin-inline: auto;
        }

        .hero-v2__aura {
            top: 20%;
            right: 50%;
            width: min(78vw, 500px);
            transform: translate(50%, -50%);
        }

        @keyframes heroAuraPulse {
            0%, 100% { opacity: 0.75; transform: translate(50%, -50%) scale(1); }
            50% { opacity: 1; transform: translate(50%, -50%) scale(1.08); }
        }
    }

    @media (max-width: 576px) {
        .hero-v2 {
            padding-top: 3.25rem;
        }

        .hero-v2__title {
            font-size: clamp(2.35rem, 11vw, 3rem);
        }

        .hero-v2__avatar-float {
            width: min(72vw, 280px);
        }

        .hero-v2__visual {
            min-height: 275px;
        }

        .hero-v2__actions {
            flex-direction: column;
            align-items: stretch;
        }

        .hero-v2__btn {
            width: 100%;
        }

        .hero-v2__scroll {
            bottom: 0.85rem;
        }
    }

    /* Dark-mode design is intentional; honor reduced-motion preferences. */
    @media (prefers-reduced-motion: reduce) {
        .hero-v2 *,
        .hero-v2 *::before,
        .hero-v2 *::after {
            animation-duration: 0.001ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.001ms !important;
        }

        .hero-v2__anim {
            opacity: 1;
            transform: none;
        }
    }
</style>

<section id="home" class="section hero-v2">
    {{-- Background: mesh gradient, blueprint grid, and portrait aura --}}
    <div class="hero-v2__mesh" aria-hidden="true"></div>
    <div class="hero-v2__grid" aria-hidden="true"></div>
    <div class="hero-v2__aura" aria-hidden="true"></div>

    <div class="hero-v2__inner">
        {{-- Left: headline and calls to action --}}
        <div class="hero-v2__copy">
            <span class="hero-v2__eyebrow hero-v2__anim" style="--delay: 0.05s;">
                <span class="hero-v2__eyebrow-dot" aria-hidden="true"></span>
                Welcome to my portfolio
            </span>

            <h1 class="hero-v2__title hero-v2__anim" style="--delay: 0.12s;">
                <span class="hero-v2__hello">Hi, I'm</span>
                <span class="hero-v2__name">{{ $profile['name'] }}</span>
            </h1>

            {{-- Terminal-style role with a blinking cursor --}}
            <p class="hero-v2__role hero-v2__anim" style="--delay: 0.22s;">
                <span class="hero-v2__prompt" aria-hidden="true">&gt;</span>
                <span>{{ $profile['role'] }}</span>
                <span class="hero-v2__cursor" aria-hidden="true">_</span>
            </p>

            <p class="hero-v2__tagline hero-v2__anim" style="--delay: 0.3s;">
                {{ $profile['tagline'] }}
            </p>

            <div class="hero-v2__actions hero-v2__anim" style="--delay: 0.38s;">
                <a href="#projects" class="hero-v2__btn hero-v2__btn--primary">
                    <i class="fas fa-code hero-v2__btn-icon" aria-hidden="true"></i>
                    <span>View Projects</span>
                    <i class="fas fa-arrow-right hero-v2__btn-icon" aria-hidden="true"></i>
                </a>

                <a href="#contact" class="hero-v2__btn hero-v2__btn--ghost">
                    <i class="fas fa-paper-plane hero-v2__btn-icon" aria-hidden="true"></i>
                    <span>Get in Touch</span>
                </a>
            </div>
        </div>

        {{-- Right: animated portrait with glowing gradient ring --}}
        <div class="hero-v2__visual hero-v2__anim" style="--delay: 0.3s;">
            <div class="hero-v2__avatar-float">
                <div class="hero-v2__avatar-glow" aria-hidden="true"></div>
                <div class="hero-v2__orbit" aria-hidden="true"></div>

                <div class="hero-v2__avatar-frame">
                    <div class="hero-v2__avatar-inner">
                        <img src="{{ $profile['avatar'] }}" alt="Portrait of {{ $profile['name'] }}">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <a href="#about" class="hero-v2__scroll" aria-label="Scroll to About section">
        <span>Scroll</span>
        <span class="hero-v2__scroll-ring">
            <i class="fas fa-chevron-down" aria-hidden="true"></i>
        </span>
    </a>
</section>
