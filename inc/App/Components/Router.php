<?php

namespace App\Components;

class Router
{

    private $routes;

    public function __construct($routesPath)
    {

        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }


    private function getURI()
    {   //получаем строку запроса
        return parse_url($_SERVER['REQUEST_URI']);

    }

    /**
     *
     */
    public function run()
    {
        $parts = parse_url($_SERVER['REQUEST_URI']);
        $uri = trim(@$parts['path'], '/');

        foreach ($this->routes as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {

                // Получаем внутренний путь из внешнего согласно правилу.

                //Определяем контролер,экшин и параметры
                $segments = explode('::', $path);
                $controllerName = array_shift($segments);
                $actionName = array_shift($segments);
                $path = implode('::', $segments);
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $parameters = explode('::', $internalRoute);

                //создаем объект, вызываем метод т.е. action
                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if ($result != null) {
                    break;
                }
            }
        }
    }
}

