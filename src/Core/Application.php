<?php
namespace App\Core;

class Application
{
    public Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run(string $url, string $method)
    {
        try {
            $this->router->dispatch($url, $method);
        } catch (\Exception $e) {
            $this->renderException($e);
        }

    }

    private function renderException(\Exception $e)
    {
        echo $e->getMessage();
    }
}
