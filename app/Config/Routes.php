<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Tugas::index');

$routes->get('/tugas', 'Tugas::index');

// routes grup
$routes->group('tugas', ['filter' => 'login'], static function ($routes) {

    $routes->get('tambah', 'Tugas::tambah');
    $routes->post('simpan', 'Tugas::simpan');

    $routes->get('edit/(:num)', 'Tugas::edit/$1');
    $routes->post('update/(:num)', 'Tugas::update/$1');

    $routes->get('selesai/(:num)', 'Tugas::selesai/$1');

    $routes->post('hapus/(:num)', 'Tugas::hapus/$1');
});

$routes->get('login', '\Myth\Auth\Controllers\AuthController::login');
$routes->post('login', '\Myth\Auth\Controllers\AuthController::attemptLogin');
$routes->get('logout', '\Myth\Auth\Controllers\AuthController::logout');



