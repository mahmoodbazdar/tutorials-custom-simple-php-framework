<?php


namespace Bugloos\CustomFramework\Routing;


class Router
{
    const NAMESPACE_PREFIX = 'Bugloos\\CustomFramework\\Controllers\\';

    private static $pathes = [];

    function __construct()
    {
    }

    public static function get($path, $handler)
    {
        $handlers = explode("@", $handler);
        $controller = $handlers[1];
        $method = $handlers[0];
        if (class_exists(self::NAMESPACE_PREFIX.$controller)) {
            if (method_exists(self::NAMESPACE_PREFIX.$controller, $method)) {
                self::$pathes[] = [
                  "controller" => self::NAMESPACE_PREFIX.$controller,
                  "method" => $method,
                  "path" => $path,
                ];
            } else {
                throw new \InvalidArgumentException(sprintf("Route %s method dose not exist.",
                  $path));
            }
        } else {
            throw new \InvalidArgumentException(sprintf("Route %s controller dose not exist.",
              $path));
        }
    }

    public static function decide(){
        $uri=$_SERVER["REQUEST_URI"];
        foreach (self::$pathes as $path){
            if($path["path"]===$uri){
                $controllerObject=new $path["controller"]();
                $controllerObject->{$path["method"]}();
            }
        }
    }
}


/**
 * /contact
 *
 * Router::get("/contact","contact@ContactController");
 *
 * Bugloos\CustomFramework\Controllers\
 */