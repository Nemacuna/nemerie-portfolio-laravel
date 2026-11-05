# Prompt Log — Nemerie Lesley Ann L. Acuña Portfolio

This document records every prompt used to build this Laravel portfolio, in the order
they were used from start to finish. Each prompt, if reused against a fresh Laravel
project, reproduces the corresponding part of this portfolio. A short agent report
("Result/Output") is included after each prompt.

Project type: **Laravel 10 / Blade / vanilla CSS & JS portfolio** (no database, all
content defined in `routes/web.php`).

---

### Task: Initial Setup & Web Server
- **Prompt used:** "Provided up to 2022 – 2023 change to '2017-2023' and remove this >_ in the left side of the name"
- **Result/Output:** Opencode changed the education `years` value from `2022 – 2023` to `2017-2023` in `routes/web.php`, and removed the terminal icon (`>_`, rendered via the FontAwesome `fa-terminal` icon) from the left of the navbar brand name in `resources/views/layouts/app.blade.php`.

---

### Task: Starting the Development Server
- **Prompt used:** "Unable to connect — Firefox can't connect to the server at 127.0.0.1:8000"
- **Result/Output:** Opencode confirmed no process was listening on port 8000 and started the Laravel dev server with `php artisan serve --host=127.0.0.1 --port=8000`, restoring the site at `http://127.0.0.1:8000`.

---

### Task: Certificate Lightbox + Project Centering + Fix Errors
- **Prompt used:** "certificate clickable with x button to back on the last page of web; project section must be centered and fixed all error"
- **Result/Output:** After clarifying questions, Opencode:
  1. Built a certificate lightbox/modal — clicking a certificate opens a full-screen overlay showing the image; an **X** button, backdrop click, or **Esc** key closes it and returns to the page (no more opening in a new tab).
  2. Center-aligned the **projects** grid/cards.
  3. **Fixed the page-breaking error:** "Permanent Record System" and "Portfolio Website" projects were missing the `link` key in `routes/web.php`, causing `Undefined array key "link"` (HTTP 500). Added the missing `link` values. Page returned to HTTP 200.

Files changed: `resources/views/sections/certificates.blade.php`, `public/css/app.css`, `public/js/app.js`, `routes/web.php`.

---

### Task: Center the Certificate Card
- **Prompt used:** "certificate card must be in center"
- **Result/Output:** Opencode constrained the certificate card width (`width: 360px`, `max-width: 100%`) and centered it by spanning the full grid (`grid-column: 1 / -1; justify-self: center`).

---

### Task: Center Certificate 1
- **Prompt used:** "certificate 1 must be in the center"
- **Result/Output:** Opencode centered the certificate card body content (award icon, title, issuer, detail) by adding `align-items: center` and `text-align: center` to `.certificate-body`, and changed `.certificate-top` from `space-between` to `justify-content: center` with a gap.

---

### Task: Center the Certificate Card (refined)
- **Prompt used:** "not in center please in the center"
- **Result/Output:** Opencode updated `.certificate-card` to use `grid-column: 1 / -1; justify-self: center; width: 360px; max-width: 100%` so the single card is truly centered horizontally across the page.

---

### Task: Remove Footer Source Code Link
- **Prompt used:** "remove footer source code on"
- **Result/Output:** Opencode removed the "Source code on GitHub" link block from the footer in `resources/views/layouts/app.blade.php`, leaving only the copyright line.

---

### Task: Remove Project Source Code Button
- **Prompt used:** "project cards remove source code"
- **Result/Output:** Opencode removed the "Source Code" button (the `.project-footer` with the GitHub icon) from every project card in `resources/views/sections/projects.blade.php`, and updated the projects section subtitle text to remove mention of the button.

---

## Agent (Big Pickle) Report

Big Pickle is **opencode**, an interactive CLI coding agent. In this session it acted
as the implementer for a Laravel portfolio: editing Blade views, vanilla CSS, vanilla
JavaScript, and the `routes/web.php` content arrays. It worked against a locally running
Laravel dev server and verified every change by curling the running site (checking for
HTTP 200 vs 500) and confirming the served CSS/JS contained the new rules.

Key behaviors:
- Reproduced and fixed the `Undefined array key "link"` error that caused a 500 on the projects section.
- Followed the existing stack (Laravel Blade + plain CSS/JS) rather than introducing new frameworks.
- Confirmed ambiguous requirements by asking targeted questions before large changes.

---

## Session 2 — November 5, 2026 (Antigravity Agent)

---

### Task: Project Modal Image Gallery
- **Prompt used:** "The Projects modal works perfectly, but for the 'Ticketing System' project, I have multiple screenshots I want to showcase. Update the Projects section to support an image gallery inside the modal."
- **Result/Output:** Antigravity:
  1. Changed the `image` key to an `images` array for all projects in `routes/web.php`, and added a `thumbnail` key (first image) so the card still shows a single cover image.
  2. Fixed a pre-existing PHP syntax error on the Ticketing System entry (`'MySQL]` → `'MySQL']`).
  3. Updated `resources/views/sections/projects.blade.php` — the project card uses `thumbnail`, and the modal now has a full Alpine.js-powered gallery: Prev/Next chevron buttons (circular wrapping, only shown when `images.length > 1`), clickable dot indicators, and a monospace image counter badge (e.g. `1 / 6`). `imgIndex` resets to `0` each time a new project is opened.
  4. Added `.proj-gallery-*` CSS classes to `public/css/app.css`: neon-circle chevron buttons overlaid left/right, glowing active dot, counter badge top-right.

  Files changed: `routes/web.php`, `resources/views/sections/projects.blade.php`, `public/css/app.css`.

---

### Task: Add Flutter Project
- **Prompt used:** "I added a new project to my portfolio. It is a Flutter application, and the screenshots are located at public/images/proj/flutter/. Use flutter1.jpeg as the thumbnail. Add all three images to the images array so the modal gallery works."
- **Result/Output:** Antigravity verified the actual filenames on disk (`.jpe`, not `.jpeg`) and added a new project entry — **AbraTrack Mobile App** — to the `$projects` array in `routes/web.php` with a realistic title, description (`A cross-platform mobile application for tracking daily expenses...`), tech stack (`Flutter`, `Dart`, `Firebase`), `thumbnail` set to `flutter1.jpe`, and all three screenshots in the `images` array. PHP syntax verified clean.

  Files changed: `routes/web.php`.

---

### Task: View Resume & Download Resume Buttons
- **Prompt used:** "under contact implement a 'View Resume' and 'Download Resume' button to view the resume I added located at public/resume/Acuna-Resume.pdf"
- **Result/Output:** Antigravity added a `.resume-actions` row beneath the contact cards in `resources/views/sections/contact.blade.php` with two pill buttons: **View Resume** (opens a PDF modal inline) and **Download Resume** (triggers browser download via the `download` attribute). Added `.resume-btn`, `.resume-btn--view`, and `.resume-btn--download` CSS with neon hover glow effects and full light-mode overrides to `public/css/app.css`.

  Files changed: `resources/views/sections/contact.blade.php`, `public/css/app.css`.

---

### Task: Resume Preview — Same-Page Modal with ESC / X to Close
- **Prompt used:** "instead of adding a new tab when viewing the resume make sure that it stays in the same tab and use esc or an x button to exit the resume preview"
- **Result/Output:** Antigravity converted the **View Resume** button from an `<a target="_blank">` to a `<button>` that sets Alpine state `resumeOpen = true`. An Alpine-powered modal renders an `<iframe>` displaying the PDF inline. Close options: ✕ button (top-right, turns red on hover), `ESC` key (`x-on:keydown.escape.window`), or clicking the dark backdrop. A download icon sits in the modal header.

  Files changed: `resources/views/sections/contact.blade.php`, `public/css/app.css`.

---

### Task: Resume Preview — Contained Modal (Readable Pages)
- **Prompt used:** "dont make it the resume preview fully fullscreen just make the page inside to be readable each page and add x button to exit the preview"
- **Result/Output:** Antigravity changed the modal from an edge-to-edge fullscreen layout to a centered box (`max-width: 820px`, `height: 90vh`) with a blurred dark backdrop visible around it. The iframe fills the box height and scrolls internally so all PDF pages are readable. Click outside or press ESC still closes it. ✕ and Download pill remain in the header bar.

  Files changed: `resources/views/sections/contact.blade.php`, `public/css/app.css`.

---

### Task: Favicon Update
- **Prompt used:** "make the preview to full screen a single page and add the favicon located at public/images/favicon.png" *(favicon portion)*
- **Result/Output:** Antigravity updated the `<link rel="icon">` in `resources/views/layouts/app.blade.php` from `favicon.svg` to `favicon.png` pointing to `public/images/favicon.png`.

  Files changed: `resources/views/layouts/app.blade.php`.
