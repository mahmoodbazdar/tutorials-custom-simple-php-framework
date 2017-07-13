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
       self::addRoute($path,$handler,"GET");
    }
    public static function post($path,$handler){
       self::addRoute($path,$handler,"POST");
    }
    public static function put($path,$handler){
        self::addRoute($path,$handler,"PUT");
    }
    public static function patch($path,$handler){
        self::addRoute($path,$handler,"PATCH");
    }
    public static function delete($path,$handler){
        self::addRoute($path,$handler,"DELETE");
    }

    private static function addRoute($path, $handler,$method){
        $handlers = explode("@", $handler);
        $controller = $handlers[1];
        $function = $handlers[0];
        if (class_exists(self::NAMESPACE_PREFIX.$controller)) {
            if (method_exists(self::NAMESPACE_PREFIX.$controller, $function)) {
                self::$pathes[] = [
                  "controller" => self::NAMESPACE_PREFIX.$controller,
                  "function" => $function,
                  "path" => $path,
                  "method"=>$method
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
            if($path["path"]===$uri && $_SERVER["REQUEST_METHOD"]===$path["method"]){
                $controllerObject=new $path["controller"]();
                $controllerObject->{$path["function"]}();
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