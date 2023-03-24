<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

service('auth')->routes($routes);



$routes->group('dashboard', ['namespace' => 'App\Controllers\Dashboard'], function ($routes) {    
    $routes->get('usuario', 'Usuario::index', ['as' => 'usuario.index']);
    $routes->get('usuario/(:num)', 'Usuario::show/$1', ['as' => 'usuario.show']);
    $routes->post('usuario/manejarPermiso/(:num)', 'Usuario::manejarPermiso/$1', ['as' => 'usuario.manejarPermiso']);
    $routes->post('usuario/manejarGrupo/(:num)', 'Usuario::manejarGrupo/$1', ['as' => 'usuario.manejarGrupo']);
});

$routes->get('contacto', 'Other::contacto');

$routes->presenter('other');
$routes->presenter('regular');
$routes->presenter('admin');




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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
