(function () {
    'use strict';

    // Theme toggle with localStorage persistence
    var root = document.documentElement;
    var themeToggle = document.getElementById('themeToggle');

    function applyTheme(theme) {
        root.setAttribute('data-theme', theme);
        try {
            localStorage.setItem('portfolio-theme', theme);
        } catch (e) { /* ignore */ }
    }

    function getSavedTheme() {
        try {
            var saved = localStorage.getItem('portfolio-theme');
            if (saved === 'light' || saved === 'dark') {
                return saved;
            }
        } catch (e) { /* ignore */ }
        return 'dark';
    }

    applyTheme(getSavedTheme());

    if (themeToggle) {
        themeToggle.addEventListener('click', function () {
            var current = root.getAttribute('data-theme');
            applyTheme(current === 'dark' ? 'light' : 'dark');
        });
    }

    // Starfield parallax
    var starLayer = document.querySelector('.starfield');
    var stars = [];

    if (starLayer) {
        var starCount = 150;
        for (var i = 0; i < starCount; i++) {
            var star = document.createElement('span');
            star.className = 'star';
            star.style.left = (Math.random() * 100) + '%';
            star.style.top = (Math.random() * 100) + '%';
            star.style.opacity = (0.35 + Math.random() * 0.65).toFixed(2);
            star.style.background = Math.random() < 0.18 ? 'rgba(0, 255, 255, 0.9)' : 'rgba(255, 255, 255, 0.9)';
            star.style.boxShadow = Math.random() < 0.18 ? '0 0 8px rgba(0, 255, 255, 0.9)' : '0 0 6px rgba(255, 255, 255, 0.8)';
            starLayer.appendChild(star);
            stars.push(star);
        }

        var lastScrollY = window.scrollY;
        var ticking = false;

        function updateStars() {
            var scrollY = window.scrollY;
            var direction = scrollY >= lastScrollY ? 1 : -1;
            var offset = scrollY * 0.25 * direction;
            // Direction-aware parallax: stars drift up while scrolling up and down while scrolling down.
            stars.forEach(function (star, i) {
                var depth = 0.25 + ((i * 29) % 40) / 100;
                var speed = depth * 0.25;
                star.style.transform = 'translate3d(0, ' + (scrollY * speed * direction).toFixed(2) + 'px, 0)';
            });
            lastScrollY = scrollY;
            ticking = false;
        }

        function scheduleUpdateStars() {
            if (!ticking) {
                ticking = true;
                window.requestAnimationFrame(updateStars);
            }
        }

        window.addEventListener('scroll', scheduleUpdateStars, { passive: true });
        window.addEventListener('resize', scheduleUpdateStars);
        updateStars();
    }

    // Mobile navigation toggle
    var navToggler = document.getElementById('navToggler');
    var navMenu = document.getElementById('navMenu');

    if (navToggler && navMenu) {
        navToggler.addEventListener('click', function () {
            var isActive = navMenu.classList.toggle('active');
            navToggler.classList.toggle('active', isActive);
            navToggler.setAttribute('aria-expanded', isActive ? 'true' : 'false');
        });

        // Close menu when a link is clicked
        navMenu.querySelectorAll('.nav-link').forEach(function (link) {
            link.addEventListener('click', function () {
                navMenu.classList.remove('active');
                navToggler.classList.remove('active');
                navToggler.setAttribute('aria-expanded', 'false');
            });
        });
    }

    // Certificate lightbox
    var lightbox = document.getElementById('certLightbox');
    var lightboxImage = document.getElementById('certLightboxImage');
    var lightboxTitle = document.getElementById('certLightboxTitle');
    var lightboxClose = document.getElementById('certLightboxClose');
    var bodyEl = document.body;

    function openLightbox(image, title) {
        lightboxImage.setAttribute('src', image);
        lightboxTitle.textContent = title;
        lightbox.classList.add('open');
        lightbox.setAttribute('aria-hidden', 'false');
        bodyEl.style.overflow = 'hidden';
        lightboxClose.focus();
    }

    function closeLightbox() {
        lightbox.classList.remove('open');
        lightbox.setAttribute('aria-hidden', 'true');
        bodyEl.style.overflow = '';
    }

    document.querySelectorAll('.js-cert-open').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            openLightbox(link.getAttribute('data-image'), link.getAttribute('data-title'));
        });
    });

    if (lightboxClose) {
        lightboxClose.addEventListener('click', function (e) {
            e.stopPropagation();
            closeLightbox();
        });
    }

    if (lightbox) {
        lightbox.addEventListener('click', function (e) {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });
    }

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && lightbox && lightbox.classList.contains('open')) {
            closeLightbox();
        }
    });
})();
