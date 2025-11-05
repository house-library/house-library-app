<?php

namespace Framework;

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

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                $controller = 'App\\Controllers\\' . $route['controller'];
                $controllerMethod = $route['controllerMethod'];

                $controllerInstance = new $controller();
                $controllerInstance->$controllerMethod();

                return;
            }
        }

        // Caso nenhuma rota combine
        $this->error();
    }
}
