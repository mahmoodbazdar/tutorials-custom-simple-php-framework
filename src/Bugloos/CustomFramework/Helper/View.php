<?php


namespace Bugloos\CustomFramework\Helper;


class View
{
    const FILES_PREFIX=".phtml";
    const VIEWS_PATH="/../Views/";
    public static function render($path,$params){
        $filePath=__DIR__.self::VIEWS_PATH.$path.self::FILES_PREFIX;
        if(file_exists($filePath)){
            foreach ($params as $key => $param){
                $$key=$param;
            }
            ob_start();
            include $filePath;
            $result=ob_get_clean();
            return $result;
        }
        else{
            throw new \InvalidArgumentException(sprintf("The View path is invalid: %s",$filePath));
        }
    }
}