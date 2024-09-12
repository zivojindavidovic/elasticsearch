<?php

use Controller\Router;

$router = new Router();


//USER
$router->post('v1', '/user/save', 'UserController', 'save');
$router->get('v1', '/get/:id', 'UserController', 'get');

//SEARCH
$router->post('v1', '/search', 'SearchController', 'search');

$router->run();