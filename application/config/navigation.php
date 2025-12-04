<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config['navigation'] = [
    [
        'label' => 'Dashboard',
        'icon' => 'fas fa-notes-medical',
        'url' => 'dashboard',
        'active' => ['dashboard'],
        'role' => ['admin'],
    ],
    [
        'label' => 'Rules',
        'icon' => 'fas fa-notes-medical',
        'url' => 'rules',
        'active' => ['rules'],
        'role' => ['admin'],
    ],
    [
        'label' => 'Gejala',
        'icon' => 'fas fa-notes-medical',
        'url' => 'gejala',
        'active' => ['gejala'],
        'role' => ['admin'],
    ],
    [
        'label' => 'Gangguan',
        'icon' => 'fas fa-virus',
        'url' => 'penyakit',
        'active' => ['penyakit'],
        'role' => ['admin'],
    ],
    [
        'label' => 'Bobot Nilai CF',
        'icon' => 'fas fa-stethoscope',
        'url' => 'bobot',
        'active' => ['bobot'],
        'role' => ['admin'],
    ],
    [
        'label' => 'Rekam Psikologis',
        'icon' => 'fas fa-stethoscope',
        'url' => 'hasil',
        'active' => ['hasil'],
        'role' => ['admin'],
    ],
    [
        'label' => 'Manajemen Admin',
        'icon' => 'fas fa-users-cog', // Ikon manajemen pengguna
        'url' => 'manajemen',
        'active' => ['manajemen'],
        'role' => ['admin'],
    ],
    [
        'label' => 'Manajemen User',
        'icon' => 'fas fa-users-cog', // Ikon manajemen pengguna
        'url' => 'user',
        'active' => ['user'],
        'role' => ['admin'],
    ],
    [
        'label' => 'Logout',
        'icon' => 'fas fa-sign-out-alt',
        'url' => 'logout',
        'active' => ['logout'],
        'role' => ['admin', 'user'],
    ]
];
