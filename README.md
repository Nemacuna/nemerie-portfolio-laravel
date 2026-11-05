# Nemerie Lesley Ann L. Acuña — Personal Portfolio

A personal single-page portfolio website built with Laravel and Blade. It showcases my
profile, educational background, certificates, projects, and contact information. The
site is a static, database-free Laravel application — all of the content is defined
directly in the routes file and rendered through Blade templates.

## Description

This portfolio serves as an online introduction and showcase for me, **Nemerie Lesley
Ann L. Acuña**, an Information Technology student. It presents who I am, where I have
studied, the certifications I have earned, the projects I have worked on, and the
different ways to reach me.

Because the site uses no database, it is lightweight and easy to run: the same content
is rendered on every request, and everything lives in the project's view files and one
routes file.

## Portfolio Sections

The site is a single scrollable page made up of the following sections:

- **Home / Hero** — A brief welcome, my name, role, tagline, and a profile picture, plus
  buttons to jump to my projects or contact section.
- **About / Who I Am** — A profile picture, a short bio, and my basic contact details
  (email, phone, and location).
- **Education** — A timeline of my educational background:

  * **Bachelor of Science in Information Technology (BSIT)** — Data Center College of
    the Philippines, Bangued, Abra (2023 – Present)
  * **Secondary Education (Junior & Senior High School)** — Luba-Tubo Catholic School
    Inc., Luba, Abra (2017-2023)

- **Certificates** — My earned credentials. Currently includes *Online Safety Through
  Nettiquette* (DICT, July 23, 2026). Clicking a certificate opens it in a lightbox with
  an **X** button to close it and return to the page.
- **Projects** — Cards describing my projects, each listing the technologies used:

  * **Grade Computation System** — tracks and computes student grades (VB.Net)
    ([GitHub](https://github.com/shainahblaza26-maker/grade-computation-system))
  * **Permanent Record System** — a digital record management system (VB.Net)
  * **Portfolio Website** — this very site (Laravel, Blade, CSS)
    ([GitHub](https://github.com/shainahblaza26-maker/portfolio))

- **Contact** — Clickable cards for Email, Phone, and GitHub, plus social links
  (Facebook, Instagram, Telegram) in the footer.

## Profile Information

The personal details shown across the site (name, role, bio, email, phone, location,
and social links) are defined once in `routes/web.php` and shared across all sections.

- **Name:** Nemerie Lesley Ann L. Acuña
- **Role:** Information Technology Student
- **Location:** Sabnangan, Luba, Abra
- **Email:** nemerielesleyann.acuna@gmail.com
- **Phone:** +63 967 203 2350

## Technologies Used

- **Laravel 9** — PHP web framework (PHP ^8.0.2)
- **Blade** — Laravel's templating engine for the views
- **HTML5 & CSS3** — custom, hand-written styles in `public/css/app.css`
- **JavaScript (vanilla)** — interactivity in `public/js/app.js` (theme toggle,
  certificate lightbox, mobile navigation)
- **Font Awesome 6.5.2** — icons (loaded via CDN)
- **Google Fonts (Poppins)** — typography (loaded via CDN)

## Project Structure

The portfolio content and layout are organized as follows:

```
routes/web.php                — Defines the "/" route and ALL portfolio content
resources/views/home.blade.php       — Main page that includes every section
resources/views/layouts/app.blade.php — Page shell: navbar, footer, theme toggle
resources/views/sections/
    home.blade.php            — Hero / welcome section
    about.blade.php           — Biography and basic contact info
    education.blade.php       — Education timeline
    certificates.blade.php    — Certificates (with lightbox)
    projects.blade.php        — Project cards
    contact.blade.php         — Contact cards
resources/views/partials/     — SVG icons (Facebook, GitHub, Instagram, Mail, Telegram)
public/css/app.css            — All custom styles
public/js/app.js              — All custom JavaScript
public/images/                — Profile picture, certificate, and project images
```

There are **no controllers, models, migrations, or database** — this is intentionally a
content-only portfolio. To add or edit any content (bio, education, certificates,
projects, or contact details), edit the arrays in `routes/web.php`.

## How to Run Locally

### Prerequisites

- **PHP** 8.0.2 or higher
- **Composer**

### Steps

```bash
# 1. Install PHP dependencies
composer install

# 2. Create and configure your environment file
cp .env.example .env
php artisan key:generate

# 3. Start the local development server
php artisan serve
```

The site will be available at `http://127.0.0.1:8000`.

> No database configuration, migrations, or seeders are required — the portfolio is
> fully static.

## License

This project is a personal student project. The Laravel framework is open-sourced under
the [MIT license](https://opensource.org/licenses/MIT).
