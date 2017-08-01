<?php


namespace Bugloos\CustomFramework\Helper;


use Bugloos\CustomFramework\Validator\ValidationError;

class FlashMessages
{
    public static function set($errors){
        @session_start();
        $_SESSION["errors"]=json_encode($errors);
    }

    public static function get(){
        @session_start();
        $data= isset($_SESSION["errors"])? json_decode($_SESSION["errors"]):null;
        unset($_SESSION["errors"]);
        return $data;
    }
}