<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Bo\Auth::index');

$routes->group('/auth', function ($routes) {
    $routes->get('login', 'Bo\Auth::index');
    $routes->post('login', 'Bo\Auth::login');
    $routes->get('logout', 'Bo\Auth::logout');
});

$routes->group('/dashboard', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('', 'Bo\Dashboard::index');
});

$routes->group('/transaction', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('', 'Bo\Transaction::index');

    $routes->get('transaction_create', 'Bo\Transaction::transaction_create');
    $routes->get('transaction_add/(:segment)', 'Bo\Transaction::transaction_add/$1');
    $routes->post('transaction_add_process', 'Bo\Transaction::transaction_add_process');
    $routes->get('transaction_delete/(:segment)', 'Bo\Transaction::transaction_delete/$1');
});

$routes->group('/product', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('', 'Bo\Product::index');
    $routes->get('search', 'Bo\Product::search');
    $routes->get('product_image', 'Bo\Product::product_image');
    $routes->get('product_add', 'Bo\Product::product_add');
    $routes->post('product_add_proces', 'Bo\Product::product_add_proces');
    $routes->get('product_edit/(:segment)', 'Bo\Product::product_edit/$1');
    $routes->post('product_edit_proces', 'Bo\Product::product_edit_proces');
    $routes->get('product_delete/(:segment)', 'Bo\Product::product_delete/$1');
});

$routes->group('/user', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('admin', 'Bo\User::admin');
    $routes->get('employees', 'Bo\User::employees');
    $routes->get('user_image', 'Bo\User::user_image');
    $routes->post('user_add', 'Bo\User::user_add');
    $routes->post('user_edit', 'Bo\User::user_edit');
    $routes->get('user_delete/(:segment)', 'Bo\User::user_delete/$1');
});

$routes->group('/master', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('suplier', 'Bo\Master::suplier');
    $routes->post('suplier_add', 'Bo\Master::suplier_add');
    $routes->post('suplier_edit', 'Bo\Master::suplier_edit');
    $routes->get('suplier_delete/(:segment)', 'Bo\Master::suplier_delete/$1');

    $routes->get('type', 'Bo\Master::type');
    $routes->post('type_add', 'Bo\Master::type_add');
    $routes->post('type_edit', 'Bo\Master::type_edit');
    $routes->get('type_delete/(:segment)', 'Bo\Master::type_delete/$1');
});
