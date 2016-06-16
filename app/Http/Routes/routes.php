<?php
/** @var $router \Phroute\Phroute\RouteCollector */

$router->filter('auth', [\App\Http\Middleware\Auth::class, 'handle']);


$router->get(['/admin', 'admin_index'], ['App\Http\Controllers\Admin', 'index']);
$router->any(['/admin/'.\Lib\Http\Router::ROUTE_WILDCARD_MATCH, 'index'], ['App\Http\Controllers\Admin', 'index']);

$router->any(['/'.\Lib\Http\Router::ROUTE_WILDCARD_MATCH, 'index'], ['App\Http\Controllers\Home', 'index']);



$router->group(['prefix' => 'api/admin/v1'], function(\Phroute\Phroute\RouteCollector $router){

    $router->post(['/sessions/create', 'admin::login'], ['App\Http\Controllers\Admin\LoginController', 'login']);

    $router->group(['before' => 'auth'], function(\Phroute\Phroute\RouteCollector $router){
        $router
            ->post(['/user/{name}', 'user'], ['App\Http\Controllers\Home', 'user'])
            ->get(['/page/{id:\d+}', 'page'], ['App\Http\Controllers\Home', 'page']);
    });
});