<?php

use Controller\Router;

$router = new Router();


//USER
$router->post('v1', '/user/save', 'UserController', 'save');
$router->get('v1', '/get/:id', 'UserController', 'get');

//SEARCH
$router->post('v1', '/search', 'SearchController', 'search');

try {
    echo $router->run();
}catch (\Throwable $e) {
    echo $e->getMessage();
}
