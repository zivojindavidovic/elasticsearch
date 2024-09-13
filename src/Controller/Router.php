<?php

namespace Controller;

use Controller\payload\Request;
use Controller\payload\Response;
use Function\Common\Common;

class Router
{
    const VALUE_V1_NAMESPACE = 'Controller\\v1\\';
    const VALUE_V2_NAMESPACE = 'Controller\\v2\\';

    private array $routes = [];
    private $activeRoute;

    public function post(string $version, string $path, string $className, string $classMethodName): void
    {
        $method = 'POST';
        $this->registerRoutes($version, $path, $className, $classMethodName, $method);
    }

    public function get(string $version, string $path, string $className, string $classMethodName): void
    {
        $method = 'GET';
        $this->registerRoutes($version, $path, $className, $classMethodName, $method);
    }

    public function registerRoutes(string $version, string $path, string $class, string $classMethodName, string $httpMethod): void
    {
        $this->routes[] = [
            'version' => $version,
            'path' => $path,
            'className' => $class,
            'classMethodName' => $classMethodName,
            'httpMethod' => $httpMethod,
        ];
    }

    public function run()
    {
        $requestUriPath = parse_url($_SERVER['REQUEST_URI'])['path'];

        foreach ($this->routes as $route) {
            $currentRoute = '/api/'.  $route['version'] . $route['path'];

            //TODO: Implement pattern check for params support
            if ($currentRoute === $requestUriPath) {
                $this->activeRoute['className'] = $route['className'];
                $this->activeRoute['classMethod'] = $route['classMethodName'];
                $this->activeRoute['version'] = $route['version'];
            }
        }

        if (!isset($this->activeRoute['version'])) {
            throw new \Exception("Route $requestUriPath not found");
        }

        $className = match ($this->activeRoute['version']) {
            'v1' => self::VALUE_V1_NAMESPACE . $this->activeRoute['className'],
            'v2' => self::VALUE_V2_NAMESPACE . $this->activeRoute['className'],
        };

        if (!class_exists($className) || !method_exists($className,$this->activeRoute['classMethod'])) {
            throw new \Exception("Route $requestUriPath not found");
        }

        //TODO: Implement DI so container decides what dependencies specific controller has
        $request = new Request();
        $response = new Response();

        $controller = new $className($request, $response);
        $method = $this->activeRoute['classMethod'];
        return call_user_func([$controller, $method]);
    }
}