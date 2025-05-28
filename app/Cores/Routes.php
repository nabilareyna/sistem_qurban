<?php
namespace App\Cores;

class Routes
{
    protected $routes = [];
    protected $middleware = [];

    public function middleware($middleware = [])
    {
        $this->middleware[] = $middleware;
    }

    //method get
    public function get($route, $action, $middleware = [])
    {
        $newRoute = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[a-zA-Z0-9_/-]+)', $route);
        $this->routes['GET'][$newRoute] = compact('action', 'middleware');
    }

    public function post($route, $action, $middleware = [])
    {
        $newRoute = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[a-zA-Z0-9_/-]+)', $route);
        $this->routes['POST'][$newRoute] = compact('action', 'middleware');
    }

    public function run()
    {
        $url = $_SERVER['REQUEST_URI'];
        $method = strtoupper($_SERVER['REQUEST_METHOD']);

        foreach ($this->routes[$method] as $route => $value) {
            $regex = "#^{$route}$#";
            if (preg_match($regex, $url, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                foreach ($value['middleware'] as $middleware) {
                    $this->middleware[] = $middleware;
                }

                $this->action($value['action'], $params);
            }
        }
    }

    public function action($action, $params)
    {
        [$controller, $method] = explode('@', $action);
        $controller = "App\\Controllers\\{$controller}";

        if (class_exists($controller)) {
            $instance = new $controller();

            if (method_exists($instance, $method)) {
                //call_user_func_array([$instance,$method],$params);
                $next = fn() => $instance->$method(...$params); // php terbaru bisa pakai spread
                $terminate = function () {
                    return;
                };

                foreach ($this->middleware as $middlewareEntry) {
                    if (is_array($middlewareEntry)) {
                        [$middlewareClass, $params] = $middlewareEntry;

                        if (class_exists($middlewareClass)) {
                            $middlewareInst = new $middlewareClass(...$params);
                        } else {
                            throw new \Exception("Middleware class {$middlewareClass} not found.");
                        }
                    } else {
                        $middlewareClass = $middlewareEntry;

                        if (class_exists($middlewareClass)) {
                            $middlewareInst = new $middlewareClass();
                        } else {
                            throw new \Exception("Middleware class {$middlewareClass} not found.");
                        }
                    }

                    if (method_exists($middlewareInst, 'handle')) {
                        $next = function () use ($middlewareInst, $next) {
                            return $middlewareInst->handle($_REQUEST, $next);
                        };
                    }

                    if (method_exists($middlewareInst, 'terminate')) {
                        $terminate = function () use ($middlewareInst, $terminate) {
                            return $middlewareInst->terminate($_REQUEST, $terminate);
                        };
                    }
                }

                $next();
                $terminate();
            } else {
                echo "Method {$method} not found in controller {$controller}.\n";
            }
        } else {
            echo "Controller {$controller} not found.\n";
        }
    }
}