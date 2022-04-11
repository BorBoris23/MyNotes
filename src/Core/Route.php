<?php
namespace App\Core;

use Closure;

class Route
{
    private string $method;
    private string $pattern;
    private Closure $callback;

    public function __construct(string $method, string $pattern, array $callback)
    {
        $this->method = $method;
        $this->pattern = $pattern;
        $this->callback = $this->prepareCallback($callback);
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getPattern(): string
    {
        return $this->pattern;
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
        return preg_match($this->getPattern(), $uri) && $this->getMethod() === $method;
    }

    public function run()
    {
        return call_user_func($this->callback);
    }
}