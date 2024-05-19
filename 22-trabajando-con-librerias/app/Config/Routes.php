<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// librerias (v198)
// $routes->get('lib/curl_get', 'MyLibraries::curl_get'); // (v198)
// $routes->get('lib/curl_get2', 'MyLibraries::curl_get2'); // (v198)
// $routes->get('lib/curl_remove', 'MyLibraries::curl_remove'); // (v198)

// librerias v199 (en el v199 crea este grupo "lib" para agrupar las 3 rutas creadas de arriba en v198 con las de este video)
$routes->group('lib', function($routes){
    $routes->get('curl_get', 'MyLibraries::curl_get'); // (v198)
    $routes->get('curl_get2', 'MyLibraries::curl_get2'); // (v198)
    $routes->get('curl_post', 'MyLibraries::curl_post'); // (v199)
    $routes->get('curl_put', 'MyLibraries::curl_put'); // (v199)
    $routes->get('curl_remove', 'MyLibraries::curl_remove'); // (v198)
    
    $routes->get('agent', 'MyLibraries::agent'); // (v200)

    $routes->get('_email', 'MyLibraries::_email'); // (v199)
    $routes->get('_encrypt', 'MyLibraries::_encrypt'); // (v199)
    $routes->get('_time', 'MyLibraries::_time'); // (v199)
    $routes->get('_uri', 'MyLibraries::_uri'); // (v199)
    $routes->get('_file', 'MyLibraries::_file'); // (v199)
}); 

