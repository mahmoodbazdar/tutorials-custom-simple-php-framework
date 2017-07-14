<?php


namespace Bugloos\CustomFramework\Routing;


use Bugloos\CustomFramework\Request\Post;
use Bugloos\CustomFramework\Request\Request;

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
        $request=new Request($_GET,$_POST);
        foreach (self::$pathes as $path){
            if($path["path"]===$uri && $_SERVER["REQUEST_METHOD"]===$path["method"]){
                $controllerObject=new $path["controller"]();
                $index=self::hasRequest($controllerObject,$path["function"]);
                if($index!==-1){
                    if($index==0){
                        $controllerObject->{$path["function"]}($request);
                    }
                }
                else{
                    $controllerObject->{$path["function"]}();
                }
            }
        }
    }

    private static function hasRequest($obj,$method){
        $rm=new \ReflectionMethod(get_class($obj),$method);
        $index=-1;
        $exist=false;
        foreach($rm->getParameters() as $parameter){
            $index++;
            if($parameter->getClass()->getName() === Request::class){
                $exist=$index;
            }
        }
        return $exist!==false?$exist:-1;
    }
}


/**
 * /contact
 *
 * Router::get("/contact","contact@ContactController");
 *
 * Bugloos\CustomFramework\Controllers\
 */