<?php

namespace Engine\Core\Router;

class Router
{
    /**
     * @var array
     */
    private $routes = [];

    /**
     * @var $dispatcher
     */
    private $dispatcher;

    /**
     * @var $host
     */
    private $host;

    /**
     * Router constructor
     * @param $host
     */
    public function __construct($host)
    {
        $this->host = $host;
    }

    /**
     * Добавление роутов
     *
     * @param $key
     * @param $pattern
     * @param $controller
     * @param string $method
     * @return void
     */
    public function add($key, $pattern, $controller, $method = "GET")
    {
        $this->routes[$key] = [
            "pattern"    => $pattern,
            "controller" => $controller,
            "method"     => $method,
        ];
    }

    public function dispatch($method, $uri)
    {
        return $this->getDispatcher()->dispatch($method, $uri);
    }

    /**
     * @return UrlDispatcher
     */
    public function getDispatcher()
    {
        if ($this->dispatcher == null)
        {
            $this->dispatcher = new UrlDispatcher();

            foreach($this->routes as $route) {
                $this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
            }
        }

        return $this->dispatcher;
    }
}