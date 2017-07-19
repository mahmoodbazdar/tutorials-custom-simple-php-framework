<?php
/**
 * Created by PhpStorm.
 * User: mahmood
 * Date: 7/18/17
 * Time: 3:28 PM
 */

namespace Bugloos\CustomFramework\Helper;


class Helper
{
    /**
     * @param string $message
     * @param array $replaceData
     * @return string
     */
    public static function compileMessage($message,$replaceData){
        foreach ($replaceData as $key => $data){
            $message=str_replace("{{".$key."}}",$data,$message);
        }
        return $message;
    }
}