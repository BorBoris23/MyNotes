<?php
namespace App\Core;

use App\Exceptions\NotFoundException;

class Router
{
    private array $routes = [];

    public function addRoute(string $method, string $pattern, array $callback)
    {
        $this->routes[] = new Route($method, $pattern, $callback);
    }

    public function get(string $pattern, array $callback)
    {
        $this->addRoute('get', $pattern, $callback);
    }

    public function post(string $pattern, array $callback)
    {
        $this->addRoute('post', $pattern, $callback);
    }

    public function delete(string $pattern, array $callback)
    {
        $this->addRoute('delete', $pattern, $callback);
    }

    public function patch(string $pattern, array $callback)
    {
        $this->addRoute('patch', $pattern, $callback);
    }

    public function dispatch(string $url, string $method)
    {
        $uri = trim($url, '/');
        foreach ($this->routes as $route) {
            if ($route->match($uri, strtolower($method))) {
                return $route->run();
            }
        }
        throw new NotFoundException('Ошибка 404. Страница не найдена');
    }
}
