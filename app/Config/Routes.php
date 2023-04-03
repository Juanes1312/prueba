<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('/login/logout', 'Login::logout');
$routes->post("autenticar", "Ajax\Autenticacion::autenticar");

$routes->group('backoffice', ['filter' => 'authGuard'], function ($routes) {
    $routes->add('/', 'Panel::index');
    // $routes->add('producto/listado', 'Producto::index');
    // $routes->add('producto/crear', 'Producto::crear');
    $routes->add('cliente/listado', 'Cliente::index');
    $routes->add('cliente/crear', 'Cliente::crear');
    
    // horarios
    $routes->add('horarios/crear', 'Horarios::index');

    // $routes->add('producto/gestionar', 'Producto::crear');
    // $routes->add('producto/editar', 'Producto::obtenerProducto');

    // clientes
    // $routes->add('cliente/listado', 'Cliente::index');
    // $routes->add('cliente/gestionar', 'Cliente::crear');
    // $routes->add('cliente/editar', 'Cliente::obtenerCliente');
    // $routes->add('cliente/reasignar', 'Cliente::reasignar');

});

$routes->group('ajax', ['filter' => 'authGuard'], function ($routes) {
    $routes->post('cliente', 'Ajax\Cliente::crear');
    $routes->post('horarios', 'Ajax\Horarios::crear');
});
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
