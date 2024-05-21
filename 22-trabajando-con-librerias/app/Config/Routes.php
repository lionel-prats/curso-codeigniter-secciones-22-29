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
    $routes->get('send-email', 'MyLibraries::form_email'); // (201)
    $routes->post('send-email', 'MyLibraries::send_email', ["as" => "send_email"]); // (201)
    $routes->get('encrypter', 'MyLibraries::encrypter'); // (v202)
    $routes->get('time', 'MyLibraries::time'); // (v203)
    $routes->get('uri', 'MyLibraries::uri'); // (v204)
    $routes->get('file', 'MyLibraries::file'); // (v205)
}); 

