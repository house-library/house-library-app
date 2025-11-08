<?php

namespace Framework;

use App\Controllers\ErrorController;

class Router
{
    protected $routes = [];

    public function registerRoutes(
        string $method,
        string $uri,
        string $action,
    ): void {
        [$controller, $controllerMethod] = explode('@', $action);

        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod,
        ];
    }

    public function error(int $httpCode = 404)
    {
        http_response_code($httpCode);
        loadView("error/{$httpCode}");
        exit();
    }

    public function get(string $uri, string $controller): void
    {
        $this->registerRoutes('GET', $uri, $controller);
    }

    public function post(string $uri, string $controller): void
    {
        $this->registerRoutes('POST', $uri, $controller);
    }

    public function put(string $uri, string $controller): void
    {
        $this->registerRoutes('PUT', $uri, $controller);
    }

    public function delete(string $uri, string $controller): void
    {
        $this->registerRoutes('DELETE', $uri, $controller);
    }

    public function route(string $uri, Database $db)
    {
        // 1. Pega o método
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        // Verifica se existe o input _method
        if ($requestMethod === 'POST' && isset($_POST['_method'])) {
            $requestMethod = strtoupper($_POST['_method']);
        }

        foreach ($this->routes as $route) {
            $uriSegments = explode('/', trim($uri, '/'));
            $routeSegments = explode('/', trim($route['uri'], '/'));

            if (
                count($uriSegments) === count($routeSegments) &&
                strtoupper($route['method']) === $requestMethod
            ) {
                $params = [];
                $match = true;

                for ($i = 0; $i < count($uriSegments); $i++) {
                    // Se os segmentos não batem e não é um placeholder
                    if (
                        $routeSegments[$i] !== $uriSegments[$i] &&
                        !preg_match('/\{(.+?)}/', $routeSegments[$i])
                    ) {
                        $match = false; //
                        break;
                    }

                    // Se for um placeholder capture o valor
                    if (
                        preg_match('/\{(.+?)}/', $routeSegments[$i], $matches)
                    ) {
                        $params[$matches[1]] = $uriSegments[$i]; //
                    }
                }

                if ($match) {
                    $controller = 'App\\Controllers\\' . $route['controller'];
                    $controllerMethod = $route['controllerMethod'];

                    $controllerInstance = new $controller($db);
                    $controllerInstance->$controllerMethod($params);
                    return; // Rota encontrada
                }
            }
        }

        $this->error();
    }
}
