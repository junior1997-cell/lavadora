<?php namespace Config;

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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');
// requejo rutas
$routes->resource('activInsumo');
$routes->resource('ActivarPrenda');
$routes->resource('Acttipolavado');
$routes->resource('registros');
$routes->resource('clientes');
$routes->resource('insumos');
$routes->resource('Prendas');
$routes->resource('Delivery');
$routes->resource('TipoLavado');
<<<<<<< HEAD
$routes->resource('Tipopedido');
=======

// junior rutas
$routes->resource('Usuariopermiso');
$routes->resource('Distrito');
$routes->resource('Cargo'); 
$routes->resource('Permiso'); 
$routes->resource('Tipodoc');

>>>>>>> c64ca40ed851ed528d99e7982b405763a88454bb

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
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
