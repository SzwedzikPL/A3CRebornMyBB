<?php

namespace A3C;

use A3C\Core\Http\Controller;
use A3C\Core\Http\Response;
use MyBB;

class Application
{
    /**
     * Name of parameter with route information
     */
    const ROUTE_PARAMETER_NAME = 'r';
    const ROUTES_FILE = __DIR__ . DIRECTORY_SEPARATOR . 'routes.php';

    /**
     * @var
     */
    private MyBB $mybb;

    /**
     * @var array|mixed
     */
    private array $routes;

    /**
     * Application constructor.
     * @param $mybb
     */
    public function __construct(MyBB $mybb)
    {
        $this->mybb = $mybb;
        $this->routes = require_once self::ROUTES_FILE;
    }

    /**
     * @return Response
     * @throws \ReflectionException
     */
    public function dispatchRequest(): Response
    {
        /**
         * We are getting the route information
         */
        $route = $this->getRoute();

        /**
         * Next, checking that controller class and route method exists
         */
        if(
            !$route
            || !class_exists($route[0])
            || !method_exists($route[0], $route[1])
        ) {
            return (new Response())->setStatus(404);
        }

        /**
         * Next, creating controller object and inject required services
         */
        list($className, $methodName) = $route;
        $reflection = new \ReflectionMethod($className, $methodName);

        $parameters = [];

        foreach ($reflection->getParameters() as $param) {
            $name =  $param->getClass()->getName();
            $parameters[] = new $name;
        }

        return (new $className)->{$methodName}(...$parameters);
    }

    /**
     * @return mixed
     */
    private function getRoute()
    {
        $route = $this->mybb->input[self::ROUTE_PARAMETER_NAME];
        $method = $this->mybb->request_method;

        return $this->routes[$route][$method];
    }
}
