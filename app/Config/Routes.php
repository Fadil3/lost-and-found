<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index');
// $routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/login', 'Pages::login');
$routes->get('/register', 'Register::index');
$routes->get('/cari_laporan', 'Pages::cari_laporan' ,['filter' => 'auth']);
$routes->get('/buat_laporan', 'Pages::buat_laporan' ,['filter' => 'auth']);
$routes->get('/edit_laporan/(:any)', 'Pages::edit_laporan/$1' ,['filter' => 'auth']);
$routes->get('/about','Pages::about');

//barang
$routes->get('/lap_kehilangan','Pages::lap_kehilangan');
$routes->get('/lap_penemuan','Pages::lap_penemuan');

//detail barang
$routes->get('/barang/detail/(:any)', 'Barang::detail/$1');

$routes->get('/detail_lap_kehilangan','Pages::detail_lap_kehilangan');
$routes->get('/profile','Profile::index');
$routes->get('/detail_lap_penemuan','Pages::detail_lap_penemuan');
$routes->get('/daftar_klaim','Pages::daftar_klaim');
$routes->get('/admin_lap_selesai','Pages::admin_lap_selesai');
$routes->get('/admin_lap_penemuan','Pages::admin_lap_penemuan');
$routes->get('/admin_lap_kehilangan','Pages::admin_lap_kehilangan');
$routes->get('/lap_acc_user','Pages::lap_acc_user');
$routes->get('/lap_x_acc_user','Pages::lap_x_acc_user');
$routes->get('/success','Pages::success');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
