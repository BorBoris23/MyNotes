<?php
namespace App\Core;

use Closure;

class Route
{
    private string $method;
    private string $path;
    private Closure $callback;

    public function __construct(string $method, string $path, array $callback)
    {
        $this->method = $method;
        $this->path = $path;
        $this->callback = $this->prepareCallback($callback);
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    private function prepareCallback(array $callback): Closure
    {
        return function () use ($callback) {
            list($class, $method) = $callback;
            return (new $class)->{$method}();
        };
    }

    public function match(string $uri, string $method): bool
    {
        $uri = preg_replace('/\?.*/', '', $uri);
        return preg_match('/^' . str_replace(['*', '/'], ['\w+', '\/'], $this->getPath()) . '$/', $uri) && $this->getMethod() === $method;
//        $path = $this->getPath();
//        var_dump($path);
//
//        $pattern = $uri;
//        return preg_match('uri', $path) && $method === $this->getMethod();
    }

    public function run()
    {
        return call_user_func($this->callback);
    }
}