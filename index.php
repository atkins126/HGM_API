<?php

require_once __DIR__ . '/Autoload.php';


ini_set('display_errors', 1);
error_reporting(E_ALL);

$router = HGM_API\Router::fromGlobals();

$router->add([
    '/auth' => ['HGM_API\Controllers\MainController@auth', False],
    '/radios' => ['HGM_API\Controllers\RadiosController@list', False],
    '/users' => 'HGM_API\Controllers\UsersController@list',
    '/second/:any' => 'HGM_API\Controllers\ExampleController@secondAction',
]);

if ($router->isFound()) {
    $router->executeHandler(
            $router->getRequestHandler(),
            $router->getParams()
    );
} else {
    Response::Error(404, 'Not found');
}