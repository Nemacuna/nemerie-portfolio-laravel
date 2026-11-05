<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
| The routes are loaded via the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function () {
    $profile = [
        'name' => 'Nemerie Lesley Ann L. Acuna',
        'role' => 'Information Technology Student',
        'tagline' => 'Motivated IT student who loves learning new things and taking on new challenges.',
        'bio' => 'Hello! I am Nemerie Lesley Ann L. Acuna, an Information Technology student. I turn curiosity into hands-on project experience and keep sharpening my technical skills, while embracing challenges that push me toward real-world software and web development.',
        'email' => 'nemerielesleyann.acuna@gmail.com',
        'phone' => '+63 967 203 2350',
        'location' => 'Sabnangan, Luba, Abra',
        'avatar' => asset('images/nems.jpg'),
        'github' => 'https://github.com/shainahblaza26-maker',
        'facebook' => 'https://www.facebook.com/share/1HiH4NDC3C/',
        'instagram' => 'https://www.instagram.com/lesley__acuna',
        'telegram' => 'https://t.me/+639672032350',
    ];
    $education = [
        [
            'school' => 'Data Center College of the Philippines',
            'location' => 'Bangued, Abra',
            'degree' => 'Bachelor of Science in Information Technology (BSIT)',
            'years' => '2023 - Present',
            'detail' => '',
        ],
        [
            'school' => 'Luba-Tubo Catholic School Inc.',
            'location' => 'Luba, Abra',
            'degree' => 'Secondary Education (Junior & Senior High School)',
            'years' => '2017-2023',
            'detail' => '',
        ],
    ];
    $certificates = [
        [
            'title' => 'Online Safety Through Nettiquette',
            'issuer' => 'DICT',
            'year' => 'July 23, 2026',
            'detail' => '',
            'description' => 'Participated in a DICT webinar on online safety and netiquette.',
            'image' => asset('images/cert/cert.png'),
            'link' => asset('images/cert/cert.png'),
        ],
        [
            'title' => 'Cisco Networking Fundamentals',
            'issuer' => 'Cisco',
            'year' => '2026',
            'detail' => '',
            'description' => 'Completed Cisco networking fundamentals training.',
            'image' => asset('images/cert/Cisco.png'),
            'link' => asset('images/cert/Cisco.png'),
        ],
        [
            'title' => 'DOST ...',
            'issuer' => 'DOST',
            'year' => '2026',
            'detail' => '',
            'description' => 'Completed DOST certification training.',
            'image' => asset('images/cert/DOST.png'),
            'link' => asset('images/cert/DOST.png'),
        ],
    ];
    $projects = [
        [
            'title' => 'Grade Computation System',
            'description' => '',
            'tech' => ['VB. Net'],
            'github' => 'https://github.com/shainahblaza26-maker/grade-computation-system',
            'images' => [asset('images/proj/gradecomp_proj.jpg')],
            'thumbnail' => asset('images/proj/gradecomp_proj.jpg'),
            'link' => asset('images/proj/gradecomp_proj.jpg'),
        ],
        [
            'title' => 'Permanent Record System',
            'description' => '',
            'tech' => ['VB. Net'],
            'github' => '',
            'images' => [asset('images/proj/permanentrec_proj.jpg')],
            'thumbnail' => asset('images/proj/permanentrec_proj.jpg'),
            'link' => asset('images/proj/permanentrec_proj.jpg'),
        ],
        [
            'title' => 'Portfolio Website',
            'description' => '',
            'tech' => ['Laravel', 'Blade', 'CSS'],
            'github' => 'https://github.com/shainahblaza26-maker/portfolio',
            'images' => [asset('images/proj/portfolio.png')],
            'thumbnail' => asset('images/proj/portfolio.png'),
            'link' => asset('images/proj/portfolio.png'),
        ],
        [
            'title' => 'AbraKeeps',
            'description' => 'A habit-tracking and productivity web application that helps users build daily routines, set goals, and stay consistent.',
            'tech' => ['Laravel', 'Vue.js', 'MySQL'],
            'github' => 'https://github.com/shainahblaza26-maker/abrakeeps',
            'images' => [asset('images/proj/abrakeeps.png')],
            'thumbnail' => asset('images/proj/abrakeeps.png'),
            'link' => asset('images/proj/abrakeeps.png'),
        ],
        [
            'title' => 'Student Grade Tracker Mobile App',
            'description' => 'A cross-platform mobile application for tracking daily expenses and personal budgets, featuring real-time sync, category breakdowns, and spending insights.',
            'tech' => ['Flutter', 'Dart', 'Firebase'],
            'github' => '',
            'images' => [
                asset('images/proj/flutter/flutter1.jpe'),
                asset('images/proj/flutter/flutter2.jpe'),
                asset('images/proj/flutter/flutter3.jpe'),
            ],
            'thumbnail' => asset('images/proj/flutter/flutter1.jpe'),
            'link' => asset('images/proj/flutter/flutter1.jpe'),
        ],
        [
            'title' => 'Tech Support Ticketing System',
            'description' => 'A support ticketing system that allows users to submit, track, and resolve customer support requests.',
            'tech' => ['Laravel', 'PHP', 'MySQL'],
            'github' => '',
            'images' => [
                asset('images/proj/ticketing/ticketing-thumb.jpeg'),
                asset('images/proj/ticketing/ticket2.jpe'),
                asset('images/proj/ticketing/ticket3.jpe'),
                asset('images/proj/ticketing/ticket4.jpe'),
                asset('images/proj/ticketing/ticket5.jpe'),
                asset('images/proj/ticketing/ticket6.jpe'),
            ],
            'thumbnail' => asset('images/proj/ticketing/ticketing-thumb.jpeg'),
            'link' => asset('images/proj/ticketing/ticketing-thumb.jpeg'),
        ],
    ];
    $socials = [
        ['name' => 'Facebook', 'icon' => 'facebook', 'url' => $profile['facebook']],
        ['name' => 'Instagram', 'icon' => 'instagram', 'url' => $profile['instagram']],
        ['name' => 'Telegram', 'icon' => 'telegram', 'url' => $profile['telegram']],
        ['name' => 'Email', 'icon' => 'mail', 'url' => 'mailto:' . $profile['email']],
    ];

    return view('home', compact('profile', 'education', 'certificates', 'projects', 'socials'));
});
